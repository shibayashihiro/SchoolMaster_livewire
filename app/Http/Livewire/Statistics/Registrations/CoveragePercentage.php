<?php

namespace App\Http\Livewire\Statistics\Registrations;

use App\Models\User;
use App\Models\General\Major;
use Livewire\Component;
use Auth;
use AppConst;

class CoveragePercentage extends Component
{
    public $total_students_count;
    public $registered_students_count;
    public $unregistered_students_count;
    public $registered_students_percentage;
    public $unregistered_students_percentage;
    public $message = '';

    public function mount()
    {
       $this->total_students_count = User::where([['campus_id',Auth::user()->selected_school->id],['role_id',AppConst::STUDENT]])->count();
        $this->registered_students_count = User::where([['campus_id',Auth::user()->selected_school->id],['role_id',AppConst::STUDENT],['register_by_app', 1]])->count();

        $this->unregistered_students_count = $this->total_students_count - $this->registered_students_count;
        $this->registered_students_percentage  = 0;
        $this->unregistered_students_percentage = 0;
        if ($this->total_students_count > 0) {
            $this->registered_students_percentage = ($this->registered_students_count / $this->total_students_count) * 100;
            $this->unregistered_students_percentage = ($this->unregistered_students_count / $this->total_students_count) * 100;
        }
    }

    public function render()
    {
        return view('livewire.statistics.registrations.coverage-percentage');
    }

    public function sendReminder()
    {
        $this->message = "You clicked on button";
    }


}


