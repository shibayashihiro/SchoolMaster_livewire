<?php

namespace App\Http\Livewire\Counselor;

use App\Models\Counselor\CounselorEvent;
use App\Models\Counselor\CounselorEventType;
use App\Models\General\Cities;
use App\Models\General\Countries;
use Livewire\Component;
use AppConst;

use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\WithPagination;

class CounselorEvents extends Component
{
    use WithPagination;
    protected string $paginationTheme = 'bootstrap';

    public $countries;
    public $locations;
    public $country_id =  '';
    public $location_id = '';
    public $dateRange = '';
    public $type = '';
    public $type_id = AppConst::COUNSELOR_COURSES;
    protected $queryString = [
        'country_id' => ['except' => ''],
        'location_id' => ['except' => ''],
        'dateRange' => ['except' => '']
    ];

    public function mount()
    {
        $this->countries = Countries::whereRelation('counselorEvents', 'counselor_event_type_id', $this->type_id)->get();
        $this->type = CounselorEventType::find($this->type_id,'title')?->title;
        // $this->locations = Cities::whereRelation('counselorEvents', 'counselor_event_type_id', $this->type_id)->get();
        $this->locations = [];
    }

    public function render()
    {
        $counselorCourses = $this->loadCounselor();
        return view('livewire.counselor.counselor-events', compact('counselorCourses'));
    }

    public function loadCounselor() : LengthAwarePaginator
    {
        if($this->dateRange){
            $rawDate = explode('to', $this->dateRange);
        }
        if($this->country_id){
            $this->locations = Countries::find($this->country_id)->cities()->whereRelation('counselorEvents', 'counselor_event_type_id', $this->type_id)->get();
        }
        return CounselorEvent::with(['country', 'city'])
                    ->whereCounselorEventTypeId($this->type_id)
                    ->when($this->country_id, fn($query)=>$query->where('country_id', $this->country_id))
                    ->when($this->location_id, fn($query)=>$query->where('city_id', $this->location_id))
                    ->when(!empty($this->dateRange), fn($query)=>$query->whereBetween('start_datetime',$rawDate))
                    ->paginate(10);
    }
}


