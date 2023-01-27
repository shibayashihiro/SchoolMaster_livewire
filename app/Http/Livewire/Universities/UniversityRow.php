<?php

namespace App\Http\Livewire\Universities;

use Livewire\Component;

class UniversityRow extends Component
{
    public  $university;
    public function render()
    {
        return view('livewire.universities.university-row');
    }
}
