<?php

namespace App\Http\Livewire\Pages\Components;

use Livewire\Component;

class ContinentsDropdown extends Component
{
    public $continents;
    public $region = '';
    public $queryString = ['region' => ['except' => '']];

    public function mount()
    {
        $this->continents = \Helpers::continentsWithoutCountries();
    }

    public function continentChanged()
    {
        $this->emit('continentChanged', $this->region);
    }

    public function render()
    {
        return view('livewire.pages.components.continents-dropdown');
    }
}
