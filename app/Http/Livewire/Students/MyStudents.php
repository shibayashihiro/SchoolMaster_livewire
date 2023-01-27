<?php

namespace App\Http\Livewire\Students;

use App\Models\General\Countries;
use App\Models\General\Major;
use App\Models\Institutes\University;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class MyStudents extends Component
{
    /**
     * @var \App\Models\School\SchoolPointHistory $histories ;
     * @var \App\Models\General\Countries
     * @var float $cash_out;
     * @var float $points_out_total;
     * @var float $points_in_total;
     * @var array $selectedStudents;
     * @var int $school_id;
     **/

    use WithPagination;

    protected string $paginationTheme = 'bootstrap';

    public $select_destination;
    public $select_major;
    public $select_university;

    public $search_destination = '';
    public $search_major = '';
    public $search_university = '';
    public $school_id;

    public $selectedStudents = [];

    protected $queryString = ['search_destination' => ['except' => ''], 'search_major' => ['except' => ''], 'search_university' => ['except' => '']];

    public function mount()
    {
        $this->school_id = \Auth::user()->selected_school->id;
        $this->select_destination = Countries::whereRelation('students', 'campus_id', $this->school_id)->get();
        $this->select_major = Major::whereRelation('students', 'campus_id', $this->school_id)->get();
        $this->select_university = University::whereRelation('students', 'campus_id', $this->school_id)->get();
    }

    public function render()
    {
        $students = $this->loadStudents();
        $selectedStudent_count = $this->updatedSelectedStudents();
        return view('livewire.students.my-students', compact('students', 'selectedStudent_count'));
    }

    public function loadStudents()
    {
        return User::with(['studyDestinations', 'majors', 'preferredUniversities'])
            ->whereCampusId($this->school_id)
            ->when(!empty($this->search_destination), fn($query) => $query->whereRelation('studyDestinations', 'country_id', $this->search_destination), fn($query) => $query->whereHas('studyDestinations'))
            ->when(!empty($this->search_major), fn($query) => $query->whereRelation('majors', 'major_id', $this->search_major), fn($query) => $query->whereHas('majors'))
            ->when(!empty($this->search_university), fn($query) => $query->whereRelation('preferredUniversities', 'university_id', $this->search_university), fn($query) => $query->whereHas('preferredUniversities'))
            ->orderBy('id')
            ->paginate(10);
    }

    public function updatedSelectedStudents()
    {
        return count($this->selectedStudents);
    }

}
