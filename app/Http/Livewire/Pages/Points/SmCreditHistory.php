<?php

namespace App\Http\Livewire\Pages\Points;

use App\Models\School\SchoolPointHistory;
use App\Models\School\SchoolPointType;
use App\Models\School\SchoolPointSource;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class  SmCreditHistory extends Component
{
    use WithPagination;
    /**
     * @var \App\Models\School\SchoolPointType $select_transaction ;
     * @var \App\Models\School\SchoolPointSource $select_source;
     * @var \App\Models\School\SchoolPointHistory $histories;
     * @var float $earned_credit;
     * @var float $consumed_credit;
     * @var float $balance;
     * @var float $credit_total;
     * @var float $balance_total;
     * @var float $points_out_total;
     * @var float $points_in_total;
     **/

    public $select_transaction;
    public $select_source;

    public $search_source = '';
    public $search_transaction = '';
    public $search_period;

    public $credit_total;
    public $balance_total;
    public $points_out_total;
    public $points_in_total;
    public $earned_credit = 0.00;
    public $consumed_credit = 0.00;
    public $balance = 0.00;


    protected string $paginationTheme = 'bootstrap';

    protected $queryString = ['search_source' => ['except' => ''],'search_transaction' => ['except' => ''], 'search_period' => ['except' => '']];

    public function mount()
    {
        $this->points_in_total = SchoolPointHistory::whereSchoolId(\Auth::user()->campus_id)
            ->sum('points_in');
        $this->points_out_total = SchoolPointHistory::whereSchoolId(\Auth::user()->campus_id)
            ->sum('points_out');

        $this->credit_total = $this->points_in_total - $this->points_out_total;

        $this->balance_total = $this->credit_total - $this->points_out_total;
        $this->select_source = SchoolPointSource::whereHas('schoolPointTypes')->get();
    }

    public function render()
    {
        $balance = $this->balance;
        $earned_credit = $this->earned_credit;
        $consumed_credit = $this->consumed_credit;
        $histories = $this->loadHistory();
        $this->select_transaction = SchoolPointType::when(!empty($this->search_source), fn($query)=>$query->whereRelation('source', 'source_id', $this->search_source), fn($query)=>$query->whereHas('source'))
            ->get();
        return view('livewire.pages.points.sm-credit-history',
            compact('histories', 'balance', 'earned_credit', 'consumed_credit')
        );
    }

    public function loadHistory()
    {
        /*
         * create $dataRange for searching by period
        */
        if (!empty($this->search_period)) {
            $dataRange = explode(' to ',$this->search_period);
        }

        $currentPage = Paginator::resolveCurrentPage();
        $query = SchoolPointHistory::with(['forStudent', 'forUniversity', 'forFair', 'pointType'])
            ->whereSchoolId(\Auth::user()->campus_id)
            ->when(!empty($this->search_source), fn($query)=>$query->whereRelation('pointType', 'source_id', $this->search_source), fn($query)=>$query->whereHas('pointType'))
            ->when(!empty($this->search_transaction), fn($query)=>$query->whereSchoolPointTypeId($this->search_transaction), fn($query)=>$query->whereHas('pointType'))
            ->when(!empty($this->search_period), fn($query)=>$query->whereBetween('updated_at', $dataRange))
            ->orderBy('updated_at');

        if ($currentPage == 1) {
            $this->earned_credit = 0.00;
            $this->consumed_credit = 0.00;
            $this->balance = 0.00;
        } else {
            $this->earned_credit = $query->take(10 * ($currentPage - 1))->get()
                ->sum('points_in');
            $this->consumed_credit = $query->take(10 * ($currentPage - 1))->get()
                ->sum('points_out');
            $this->balance = $this->earned_credit - $this->consumed_credit;
        }
        return $query->paginate(10);
    }
}
