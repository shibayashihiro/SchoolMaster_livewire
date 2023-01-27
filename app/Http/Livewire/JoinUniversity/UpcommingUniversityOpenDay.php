<?php

namespace App\Http\Livewire\JoinUniversity;

use Livewire\Component;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\WithPagination;
use AppConst;
use Auth;

use App\Models\Institutes\School;
use App\Models\General\Countries;
use Illuminate\Database\Eloquent\Builder;

class UpcommingUniversityOpenDay extends Component
{
    use WithPagination;
    protected string $paginationTheme = 'bootstrap';

    public $countries;

    public $country_id =  '';
    public $dateRange = '';
    public $type = '';
    public $type_id = AppConst::UNIVERSITY_EVENT_TYPE_OPENDAY;

    protected $queryString = [
        'country_id' => ['except' => ''],
        'dateRange' => ['except' => '']
    ];

    public function mount(){
        // $this->countries = School::with('country')->whereRelation('universityEvents', 'university_event_id', $this->type_id)->get();
        // $this->countries = Countries::whereRelation('school', 'university_event_id', $this->type_id)->get();
        $typeId = $this->type_id;
        $this->countries = Countries::with('school')
                    ->whereHas('school', function (Builder $fn) use($typeId){
                        $fn->whereRelation('universityEvents', 'university_event_id', $typeId);
                    })->get();
    }

    public function render()
    {
        $openDayEvents = $this->loadEvents();
        return view('livewire.join-university.upcomming-university-open-day', compact('openDayEvents'));
    }

    public function loadEvents() : LengthAwarePaginator
    {
        if($this->dateRange){
            $rawDate = explode('to', $this->dateRange);
        }
        return Auth::user()->school
            ->universityEvents()
            ->when($this->country_id, fn($query)=>$query->where('country_id', $this->country_id))
            ->when(!empty($this->dateRange), fn($query)=>$query->whereBetween('start_datetime',$rawDate))
            ->when(empty($this->dateRange), fn($query)=>$query->where('start_datetime', '>', date('Y-m-d H:i:s')))
            ->where('university_event_type_id', $this->type_id)->paginate(10);
    }

}
