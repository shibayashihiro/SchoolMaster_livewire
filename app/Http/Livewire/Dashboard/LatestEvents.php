<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class LatestEvents extends Component
{
    public $fairs = [];
    public $university_events = [];
    public function mount(){
        $school = \Auth::user()->school;
        $this->fairs = $school->fairs()->upcoming()->with('eventType')->get();
        $this->university_events = $school->universityEvents()->upcoming()->with(['type','university'])->get();
    }
    public function render()
    {
        return view('livewire.dashboard.latest-events');
    }
}
