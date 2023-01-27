<?php

namespace App\Http\Livewire\Fairs;

use App\Models\Fairs\Fair;
use App\Models\Fairs\FairRating;
use App\Models\Fairs\FairStudentAttendance;
use App\Models\General\Countries;
use App\Models\General\Major;
use App\Models\Institutes\University;
use App\Models\User;
use App\Models\User\UserMajor;
use App\Models\User\UserPossibleUniversity;
use Illuminate\Database\Query\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class Performance extends Component
{
    use WithPagination;
    public Fair $fair;
    public $school_students_count = 0;
    public $stats = [];
    public $event_rank  = 'Excellent';
    public $sm_credit = [];



    public function mount()
    {
        $this->fair->loadCount(['arrivedUniversities','universitiesNotArrived', 'invitation', 'attendance','ratedBy']);
        $this->school_students_count = User::selectedSchoolStudents()->count();
        $this->sm_credit = [
            'earned'=> $this->fair->schoolCreditEarned()->sum('points_in'),
            'student_transactions'=>$this->fair->schoolCreditEarned()
                ->whereRelation('pointType','source_id',\AppConst::STUDENT_ACTIVITY)->count(),
            'event_transactions'=>$this->fair->schoolCreditEarned()
                ->whereRelation('pointType','source_id',\AppConst::SCHOOL_EVENTS)->count(),
        ];
        $user_query = $this->fair->attendance()->select('users.id');
        $this->stats = [
            'majors' => [
                'selected_count' => Major::whereIn('id', UserMajor::select('major_id')
                    ->whereIn('user_id', $user_query))->count(),
                'students_not_select' => $this->fair->attendance()->whereDoesntHave('majors')->count()
            ],
            'universities' => [
                'selected_count' => University::whereIn('id', UserPossibleUniversity::select('university_id')
                    ->whereIn('user_id', $user_query))->count(),
                'students_not_select' => $this->fair->attendance()->whereDoesntHave('preferredUniversities')->count()
            ],
            'destinations' => [
                'selected_count' => Countries::whereIn('id', User\UserStudyDestination::select('country_id')
                    ->whereIn('user_id', $user_query))->count(),
                'students_not_select' => $this->fair->attendance()->whereDoesntHave('studyDestinations')->count()
            ],
        ];
        $this->rating_stars = $this->fair->ratings()->withAvg('ratings as avg_rating','rating')->get()
            ->avg('avg_rating') ?? 0;
    }

    public function render()
    {
        $arrived_universities = $this->fair->arrivedUniversities()->withCount(['leads'=>function ($q){
            return $q->where('event_id',$this->fair->id);
        }])->paginate(10);

        return view('livewire.fairs.performance',compact('arrived_universities'));
    }


}
