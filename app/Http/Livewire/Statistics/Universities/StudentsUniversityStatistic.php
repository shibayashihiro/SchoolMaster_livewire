<?php

namespace App\Http\Livewire\Statistics\Universities;

use App\Models\User;
use AppConst;
use Livewire\Component;
use Auth;

class StudentsUniversityStatistic extends Component
{

    public $totalStudent_count;
    public $students_selectUniversity_count;
    public $students_noUniversity_count;
    public $selectUniversities_percentage;
    public $noUniversities_percentage;

    public function mount(){
        $this->totalStudent_count = $this->getStudentCount();
        $this->students_selectUniversity_count = $this->studentsSelectUniversityCount();
        $this->students_noUniversity_count = $this->totalStudent_count - $this->students_selectUniversity_count;
        $this->selectUniversities_percentage = 0;
        $this->notUniversities_percentage = 0;
        if($this->totalStudent_count > 0){
            $this->selectUniversities_percentage =round($this->students_selectUniversity_count / $this->totalStudent_count * 100, 1) ;
        $this->notUniversities_percentage =round($this->students_noUniversity_count / $this->totalStudent_count * 100, 1) ;
        }
    }

    public function render()
    {
        return view('livewire.statistics.universities.students-university-statistic');
    }

    public function studentsSelectUniversityCount(){
        return User::where([
                ['role_id', '=', AppConst::STUDENT],
                ['campus_id', '=', Auth::user()->selected_school->id]
            ])->has('preferredUniversities')->count();
    }

    public function getStudentCount()
    {
        return User::where([
            ['role_id', '=', AppConst::STUDENT],
            ['campus_id', '=', Auth::user()->selected_school->id]
        ])->count();
    }

    public function sendEmail()
    {
        return redirect(route('admin.school.statistics.universities.coverage'));
    }
}
