<?php

namespace App\Http\Livewire\CareerTalks;

use App\Models\Fairs\FairType;
use Livewire\Component;

class View extends Component
{
    public  $fair;
    public  $school;
    public $fair_types;

    public function mount(){
        $this->school = \Auth::user()->selected_school;
        $this->fair_types = FairType::pluck('fair_type_name', 'id')->toArray();
    }

    public function render()
    {
        return view('livewire.career-talks.view');
    }
}
