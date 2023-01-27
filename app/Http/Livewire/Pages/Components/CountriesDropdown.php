<?php

namespace App\Http\Livewire\Pages\Components;

use Livewire\Component;

class CountriesDropdown extends Component
{
    public $country = '';
    public $countries;
    public $region = '';
    protected $queryString = ['region' => ['except' => ''], 'country' => ['except' => '']];
    protected $listeners = ['continentChanged'];

    public function mount()
    {
        $this->loadCountries();
    }

    public function render()
    {
        return view('livewire.pages.components.countries-dropdown');
    }

    public function continentChanged($continent)
    {
        $this->country = '';
        $this->region = $continent;
        $this->loadCountries();
    }

    private function loadCountries()
    {
        $this->countries = \Helpers::getContinentCountriesUsingName($this->region);

    }


    public function changeCountry()
    {
        $this->emit('countryChanged', $this->country);
    }
}
