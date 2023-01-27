<?php

namespace App\Http\Livewire\Pages\Points;

use App\Models\School\SchoolPointHistory;
use Livewire\Component;

class SchoolActivitySmCredit extends Component
{
    /**
     * @var \App\Models\School\SchoolPointHistory $histories;
     * @var float $credit_total;
     * @var float $school_total ;
     * @var float $points_out_total;
     * @var float $points_in_total;
     **/
    public $histories;
    public $credit_total;
    public $points_out_total;
    public $points_in_total;

    public function mount()
    {
        $this->points_in_total = SchoolPointHistory::whereSchoolId(\Auth::user()->campus_id)
            ->sum('points_in');
        $this->points_out_total = SchoolPointHistory::whereSchoolId(\Auth::user()->campus_id)
            ->sum('points_out');

        $this->credit_total = $this->points_in_total - $this->points_out_total;

        $query = SchoolPointHistory::whereSchoolId(\Auth::user()->campus_id)
            ->whereRelation('pointType', 'source_id', \AppConst::SCHOOL_EVENTS);

        $this->histories = $query->groupBy('school_point_type_id')
            ->selectRaw("count(*) as transaction_count, school_point_type_id, sum(points_in) as transaction_sum")
            ->with('pointType')
            ->get();
    }

    public function render()
    {
        return view('livewire.pages.points.school-activity-sm-credit');
    }
}
