<?php

namespace App\Http\Livewire\Pages\Points;

use App\Models\School\SchoolPointHistory;
use Livewire\Component;

class SchoolSmCreditDetail extends Component
{
    /**
     * @var float $school_activity_credit;
     * @var float $university_activity_credit;
     * @var float $students_activity_credit ;
     * @var float $credit_total;
     * @var float $points_out_total;
     * @var float $points_in_total;
     **/

    public $credit_total;
    public $school_activity_credit;
    public $university_activity_credit;
    public $students_activity_credit;
    public $points_out_total;
    public $points_in_total;

    public function mount()
    {
        $this->points_in_total = SchoolPointHistory::whereSchoolId(\Auth::user()->campus_id)
            ->sum('points_in');
        $this->points_out_total = SchoolPointHistory::whereSchoolId(\Auth::user()->campus_id)
            ->sum('points_out');

        $this->credit_total = $this->points_in_total - $this->points_out_total;

        $this->school_activity_credit = SchoolPointHistory::whereRelation('pointType', 'source_id', \AppConst::SCHOOL_EVENTS)
            ->whereSchoolId(\Auth::user()->selected_school->id)
            ->sum('points_in');

        $this->university_activity_credit = SchoolPointHistory::whereRelation('pointType', 'source_id', \AppConst::UNIVERSITY_EVENTS)
            ->whereSchoolId(\Auth::user()->selected_school->id)
            ->sum('points_in');

        $this->students_activity_credit = SchoolPointHistory::whereRelation('pointType', 'source_id', \AppConst::STUDENT_ACTIVITY)
            ->whereSchoolId(\Auth::user()->selected_school->id)
            ->sum('points_in');

    }

    public function render()
    {
        return view('livewire.pages.points.school-sm-credit-detail');
    }
}
