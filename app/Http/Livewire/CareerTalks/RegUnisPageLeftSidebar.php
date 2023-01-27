<?php

namespace App\Http\Livewire\CareerTalks;

use App\Models\Fairs\Fair;
use Livewire\Component;

class RegUnisPageLeftSidebar extends Component
{
    public Fair $fair;
    public $sessions;
    public $reserevedSessions;

    protected $listeners = ['registeredUniversitiesListUpdated'];

    public function mount(){
        $this->loadData();
    }

    public function render()
    {
        return view('livewire.career-talks.reg-unis-page-left-sidebar');
    }

    public function loadData(){
        $this->sessions = $this->fair->sessions;
        $this->reserevedSessions = $this->fair->sessions()->whereNot('university_id')->with(['university','major'])->get();
    }

    public function registeredUniversitiesListUpdated(){
        $this->loadData();
    }
}
