<?php

namespace App\Http\Livewire\School\Form;

use App\Models\General\Cities;
use App\Models\General\Countries;
use App\Models\General\Country;
use Livewire\Component;

class Location extends Component
{
    protected $countries;
    protected $cities;
    public $country_id;
    public $city_id;
    public $latitude;
    public $longitude;

    public function mount(){
        $school = \Auth::user()->selected_school;
        $this->country_id = $school->country_id;
        $this->city_id = $school->city_id;
        $this->longitude = $school->longitude;
        $this->latitude = $school->latitude;
        $this->countries = Countries::get(['id','country_name','translated_name']);
        $this->loadCities();
    }

    public function render()
    {
        $this->countries = Countries::get(['id','country_name','translated_name']);
        $this->loadCities();
        return view('livewire.school.form.location',['countries'=>$this->countries,'cities'=>$this->cities]);
    }

    public function loadCities(){
        $this->cities = [];
        if (empty($this->country_id)) return;
        $this->cities = Cities::whereCountryId($this->country_id)->orderBy('city_name')->get(['id','city_name','translated_name']);
    }
}
