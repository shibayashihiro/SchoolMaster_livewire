<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\General\Countries;
use App\Models\General\Major;
use App\Models\Institutes\University;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class StatisticsCards extends Component
{
    public $statistics = [];
    public $total_students;

    public $school;

    public function mount()
    {
        $this->school = \Auth::user()->selected_school;
        $school_id = $this->school->id;
        $this->total_students = $this->userBaseQuery()->count();
        $student_attended_fair = $this->userBaseQuery()->has('attendedFairs')->count();
        $registered_students = $this->userBaseQuery()->where('register_by_app', 1)->count();
        $student_g_11 = $this->userBaseQuery()->whereRelation('userBio', 'study_level_id', \AppConst::GRADE_11)->count();
        $student_g_12 = $this->userBaseQuery()->whereRelation('userBio', 'study_level_id', \AppConst::GRADE_12)->count();

        $this->statistics = [
            //row
            [
                [
                    'title' => 'Registrations',
                    'count' => $registered_students,
                    'students' => $registered_students,
                ],
                [
                    'title' => 'Majors',
                    'count' => Major::whereRelation('students', 'campus_id', $school_id)->count(),
                    'students' => $this->userBaseQuery()->has('majors')->count()
                ],
                [
                    'title' => 'Universities',
                    'count' => University::whereRelation('students', 'campus_id', $school_id)->count(),
                    'students' => $this->userBaseQuery()->has('preferredUniversities')->count()
                ],
                [
                    'title' => 'Destinations',
                    'count' => Countries::whereRelation('students', 'campus_id', $school_id)->count(),
                    'students' => $this->userBaseQuery()->has('studyDestinations')->count()
                ],
                [
                    'title' => 'Applications',
                    'count' => 0,
                    'students' => 0,
                ]
            ],
            //row
            [
                [
                    'title' => 'School Events',
                    'count' => $this->school->fairs()->count(),
                    'students' => $student_attended_fair,
                ],
                [
                    'title' => 'University Events',
                    'count' => $this->school->universityEvents()->count(),
                    'students' => $this->userBaseQuery()->has('attendedUniversityEvents')->count(),
                ],
                [
                    'title' => 'Grade 11',
                    'count' => $student_g_11,
                    'students' => $student_g_11
                ],
                [
                    'title' => 'Grade 12',
                    'count' => $student_g_12,
                    'students' => $student_g_12
                ],
                [
                    'title' => 'Attendance',
                    'count' => $student_attended_fair,
                    'students' => $student_attended_fair,
                ]
            ],
            //row
            [
                [
                    'title' => 'Total SM Credit',
                    'count' => $this->school->pointsHistory()->sum('points_in'),
                    'students' => 0,
                ],
                [
                    'title' => 'School Cr.',
                    'count' => $this->school->pointsHistory()
                        ->whereRelation('pointType', 'source_id', \AppConst::SCHOOL_EVENTS)
                        ->sum('points_in'),
                    'students' => 0,
                ],
                [
                    'title' => 'University Cr.',
                    'count' => $this->school->pointsHistory()
                        ->whereRelation('pointType', 'source_id', \AppConst::UNIVERSITY_EVENTS)
                        ->sum('points_in'),
                    'students' => 0
                ],
                [
                    'title' => 'Students Cr.',
                    'count' => $this->school->pointsHistory()
                        ->whereRelation('pointType', 'source_id', \AppConst::STUDENT_ACTIVITY)
                        ->sum('points_in'),
                    'students' => 0
                ],
                [
                    'title' => 'Enrollment Cr.',
                    'count' => $this->school->pointsHistory()
                        ->whereRelation('pointType', 'source_id', \AppConst::ENROLLMENT_CREDIT)
                        ->sum('points_in'),
                    'students' => 0,
                ]
            ],
        ];
    }

    /**
     * @return Builder|User
     */
    protected function userBaseQuery(): \Illuminate\Database\Eloquent\Builder|User
    {
        $school_id = $this->school->id;
        return User::where([['campus_id', $school_id], ['role_id', \AppConst::STUDENT]]);
    }

    public function render()
    {
        return view('livewire.dashboard.statistics-cards');
    }
}
