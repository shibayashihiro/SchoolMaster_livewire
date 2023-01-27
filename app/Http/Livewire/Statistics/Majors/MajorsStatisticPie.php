<?php

namespace App\Http\Livewire\Statistics\Majors;

use App\Models\User;
use AppConst;
use Livewire\Component;
use Auth;

class MajorsStatisticPie extends Component
{

    public $totalStudents_count;
    public $students_hasMajor_count;
    public $students_noMajor_count;
    public $hasMajors_percentage;
    public $noMajors_percentage;

    public function mount(){
        $this->totalStudents_count = $this->getStudentCount();
        $this->students_hasMajor_count = $this->studentsHasMajorCount();
        $this->hasMajors_percentage = 0;
        $this->noMajors_percentage = 0;
        $this->students_noMajor_count = $this->totalStudents_count - $this->students_hasMajor_count;
        if($this->totalStudents_count > 0){
            $this->hasMajors_percentage = round($this->students_hasMajor_count / $this->totalStudents_count * 100, 1) ;
            $this->noMajors_percentage = round($this->students_noMajor_count / $this->totalStudents_count * 100, 1) ;
        }
    }

    public function render()
    {
        return view('livewire.statistics.majors.majors-statistic-pie');
    }

    public function studentsHasMajorCount(){
        return User::where([
                ['role_id', '=', AppConst::STUDENT],
                ['campus_id', '=', Auth::user()->selected_school->id]
            ])->has('majors')->count();
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
        return redirect(route('admin.school.statistics.majors.coverage'));
    }
}
