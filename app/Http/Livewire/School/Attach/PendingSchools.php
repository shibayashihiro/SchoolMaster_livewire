<?php

namespace App\Http\Livewire\School\Attach;

use Livewire\Component;

class PendingSchools extends Component
{
    public $user_schools = null;
    protected $listeners = ['schoolAttached'=>'loadUserSchools'];

    public function mount(){
        $this->loadUserSchools();
    }

    public function loadUserSchools(){
        $this->user_schools = \Auth::user()->pendingSchools()->with(['country','city','state'])->get();
    }

    public function render()
    {
        return view('livewire.school.attach.pending-schools');
    }
}
