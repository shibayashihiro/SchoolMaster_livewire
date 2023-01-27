<?php

namespace App\Http\Livewire\Statistics\Universities;
use App\Models\Institutes\University;

use App\Models\User;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;

class UniversitiesInfo extends Component
{
    use WithPagination;

    /** @var integer $university_id */
    public $university_id =  '';

    public $universities;
    public $selected_university;

    protected string $paginationTheme = 'bootstrap';
    protected $queryString = ['university_id' => ['except'=>'']];

    public function mount()
    {
        /** @var integer $universities */
        $this->universities = University::whereRelation('students', 'campus_id', \Auth::user()->selected_school->id)
                    ->get(['id', 'translated_name', 'university_name', 'slug']);
    }

    public function render()
    {
        $this->selected_university = University::find($this->university_id);
        $students = $this->loadStudents();
        return view('livewire.statistics.universities.universities-info', ['students' => $students]);
    }

    public function loadStudents(): LengthAwarePaginator
    {
        return User::with(['preferredUniversities'])
        ->whereRoleId(\AppConst::STUDENT)
        ->whereCampusId(\Auth::user()->selected_school->id)
        ->when(!empty($this->university_id),fn($query)=>$query->whereRelation('preferredUniversities','university_id',$this->university_id), fn($query)=>$query->whereHas('preferredUniversities'))->paginate(10);
    }
}
