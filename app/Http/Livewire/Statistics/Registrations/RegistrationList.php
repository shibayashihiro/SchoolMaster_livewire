<?php

namespace App\Http\Livewire\Statistics\Registrations;

use App\Models\Fairs\Fair;
use App\Models\User;
use App\Models\General\Major;
use Livewire\Component;
use Auth;
use AppConst;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\WithPagination;

class RegistrationList extends Component
{
    use WithPagination;
    public $majors, $events;

/** @var integer $major_id */
/** @var integer $event_id */
    public $major_id =  '';
    public $event_id = '';

    public $selected_count = 0;
    public $unregistered_count = 0;
    public $display_flag = false;

    protected $queryString = [
        'major_id' => ['except' => ''],
        'event_id' => ['except' => '']
    ];

	protected string $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->majors = Major::whereRelation('students', [
            ['role_id', '=', AppConst::STUDENT],
            ['campus_id', '=', \Auth::user()->selected_school->id]
        ])->get(['id', 'title']);
        $this->events = Fair::whereRelation('attendance', [
            ['role_id', '=', AppConst::STUDENT],
            ['campus_id', '=', Auth::user()->selected_school->id]
        ])->get();
        $this->unregistered_count = User::where([['campus_id',Auth::user()->selected_school->id],['role_id',AppConst::STUDENT],['register_by_app', 0]])->count();
    }

    public function render()
    {
        $students = $this->loadStudents();
        $selected_major = Major::find($this->major_id);
        $selected_event = Fair::find($this->event_id);
        return view('livewire.statistics.registrations.registration-list', compact('students', 'selected_major', 'selected_event'));
    }

    public function change_list(){
        $this->display_flag = !$this->display_flag;
    }

    public function selectedCount($flag){
        if($flag){
            $this->selected_count--;
        }else{
            $this->selected_count++;
        }
    }

    public function loadStudents() : LengthAwarePaginator
    {
        return User::with(['majors', 'attendedFairs'])
                ->whereRoleId(\AppConst::STUDENT)
                ->whereCampusId(\Auth::user()->selected_school->id)
                ->when($this->display_flag, fn($query)=>$query->where('register_by_app', 0))
                ->when(!empty($this->major_id),fn($query)=>$query->whereRelation('majors','major_id',$this->major_id))
                ->when(!empty($this->event_id),fn($query)=>$query->whereRelation('attendedFairs','fair_id',$this->event_id))
                ->paginate(10);
    }

    public function sendReminder()
    {
        // $this->message = "You clicked on button";
    }


}


