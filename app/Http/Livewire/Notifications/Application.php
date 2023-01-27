<?php

namespace App\Http\Livewire\Notifications;

use App\Models\General\Countries;
use App\Models\General\Major;
use App\Models\Institutes\University;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Application extends Component
{
    use WithPagination;
    protected string $paginationTheme = 'bootstrap';

    public $school_id;

    public function mount()
    {
        $this->school_id = \Auth::user()->selected_school->id;
    }

    public function render()
    {
        $students = User::with(['studyDestinations', 'majors', 'preferredUniversities'])
            ->whereCampusId($this->school_id)
            ->whereRoleId(\AppConst::STUDENT)
            ->paginate(10);
        return view('livewire.notifications.application', compact('students'));
    }
}
