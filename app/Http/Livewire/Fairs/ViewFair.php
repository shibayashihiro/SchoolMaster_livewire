<?php

namespace App\Http\Livewire\Fairs;

use App\Models\Fairs\FairType;
use Livewire\Component;

class ViewFair extends Component
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
        return view('livewire.fairs.view-fair');
    }
}
