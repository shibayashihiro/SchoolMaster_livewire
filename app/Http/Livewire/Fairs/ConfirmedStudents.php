<?php

namespace App\Http\Livewire\Fairs;

use App\Models\General\Countries;
use App\Models\User;
use App\Models\General\Major;
use App\Models\Institutes\University;
use App\Models\Fairs\Fair;

use Livewire\Component;

use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\WithPagination;

class ConfirmedStudents extends Component
{
    use WithPagination;

    public $majors, $universities, $destinations;
    public  $fair;

    /** @var integer $major_id */
    /** @var integer $university_id */
    /** @var integer $destination_id */
    public $major_id =  '';
    public $university_id = '';
    public $destination_id = '';

    public $selected_major;
    public $selected_university;
    public $selected_destination;

    protected $queryString = [
        'major_id' => ['except' => ''],
        'university_id' => ['except' => ''],
        'destination_id' => ['except' => '']
    ];

    protected string $paginationTheme = 'bootstrap';

    public function mount(){
        $this->majors = Major::whereHas('students', fn($query) => $query->whereRoleId(\AppConst::STUDENT)->whereRelation('attendedFairs','fair_id',$this->fair->id))
            ->get(['id', 'title']);

        $this->universities = University::whereHas('students', fn($query) => $query->whereRoleId(\AppConst::STUDENT)->whereRelation('attendedFairs','fair_id',$this->fair->id))
            ->get(['id', 'translated_name', 'university_name', 'slug']);

        $this->destinations = Countries::whereHas('students', fn($query) => $query->whereRoleId(\AppConst::STUDENT)->whereRelation('attendedFairs','fair_id',$this->fair->id))
        ->get(['id', 'translated_name', 'country_name']);
    }

    public function render()
    {
        $students = $this->loadStudents();
        $this->selected_university = University::find($this->university_id);
        $this->selected_major = Major::find($this->major_id);
        $this->selected_destination = Countries::find($this->destination_id);

        return view('livewire.fairs.confirmed-students', compact('students'));
    }

    public function loadStudents(): LengthAwarePaginator
    {
        return $this->fair->attendance()
            ->with(['studyDestinations','majors','preferredUniversities'])
            ->when(!empty($this->destination_id), fn($q) => $q->whereRelation('studyDestinations','country_id',$this->destination_id))
            ->when(!empty($this->major_id), fn($q) => $q->whereRelation('majors','major_id',$this->major_id))
            ->when(!empty($this->university_id), fn($q) => $q->whereRelation('preferredUniversities','university_id',$this->university_id))
            ->paginate(10);
    }
}
