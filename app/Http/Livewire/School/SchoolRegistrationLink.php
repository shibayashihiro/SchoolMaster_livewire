<?php

namespace App\Http\Livewire\School;

use App\Actions\School\GenerateSlugForUserSchool;
use App\Models\Institutes\School;
use Livewire\Component;

class SchoolRegistrationLink extends Component
{
    public School $school;
    public $registartion_link;
    public function mount(){
        $this->school = \Auth::user()->selected_school;
        $this->registartion_link = GenerateSlugForUserSchool::run();
    }
    public function render()
    {
        return view('livewire.school.school-registration-link');
    }
}
