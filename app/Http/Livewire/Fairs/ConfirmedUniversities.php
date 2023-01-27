<?php

namespace App\Http\Livewire\Fairs;

use App\Models\Fairs\Invitation;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class ConfirmedUniversities extends Component
{
    use WithPagination;

    protected string $paginationTheme = 'bootstrap';

    public $fair;
    public $status_id = '';

    public function mount()
    {
        $this->showButtons = false;
    }

    public function render()
    {
        $confirmedUniversities = $this->loadUniversities();
        return view('livewire.fairs.confirmed-universities', compact('confirmedUniversities'));
    }

    public function loadUniversities()
    {
        return $this->fair->invitation()->with('university')
            ->when(!($this->status_id == ''), fn($q)=>$q->where('university_attendance_status', '=', $this->status_id))
            ->get();
    }

    public function showButtons(Invitation $invitation)
    {
        $invitation->update(['university_attendance_status' => null]);
    }

    public function notArrived(Invitation $invitation)
    {
        $invitation->update(['university_attendance_status' => \AppConst::UNIVERSITY_ATTENDANCE_NOT_ARRIVED]);
        session()->flash('status', "Status updated into Didn't show up.");
   }

    public function arrived(Invitation $invitation)
    {
        $status = (Carbon::parse($invitation->fair->start_date)->isPast() ? \AppConst::UNIVERSITY_ATTENDANCE_LATE : \AppConst::UNIVERSITY_ATTENDANCE_ARRIVED
        );
        $invitation->update(['university_attendance_status' => $status]);
        session()->flash('status', 'Status updated into Arrived.');
    }
}
