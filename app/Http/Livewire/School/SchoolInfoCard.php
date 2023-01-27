<?php

namespace App\Http\Livewire\School;

use Livewire\Component;

class SchoolInfoCard extends Component
{
    public $school;

    public function mount(){
        $this->school = \Auth::user()->selected_school;
    }
    public function render()
    {
        return view('livewire.school.school-info-card');
    }
}
