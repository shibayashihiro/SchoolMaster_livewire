<?php

namespace App\Http\Livewire\Statistics\Majors;

use App\Models\User;
use App\Models\General\Major;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class MajorSelectedByStudent extends Component
{
    use WithPagination;

    /** @var integer $major_id */
    public $major_id =  '';
    public $selectMajors;

    protected $queryString = ['major_id' => ['except' => '']];

    protected string $paginationTheme = 'bootstrap';

    public function mount()
    {
        /** @var Major $selectMajors */
        $this->selectMajors = Major::whereRelation('students', 'campus_id', Auth::user()->selected_school->id)->get();
    }

    public function render()
    {
        $major = Major::find($this->major_id);
        $students = $this->loadStudents();
        return view('livewire.statistics.majors.major-selected-by-student', compact('students', 'major'));
    }
    public function loadStudents()
    {
        return User::with(['preferredUniversities', 'majors'])
            ->whereRoleId(\AppConst::STUDENT)
            ->whereCampusId(\Auth::user()->selected_school->id)
            ->when(!empty($this->major_id),fn($query)=>$query->whereRelation('majors','major_id',$this->major_id), fn($query)=>$query->whereHas('majors'))->paginate(10);
    }
}
