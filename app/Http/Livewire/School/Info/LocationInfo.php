<?php

namespace App\Http\Livewire\School\Info;

use App\Models\General\Cities;
use App\Models\General\Countries;
use App\Models\General\CountryState;
use App\Models\Institutes\School;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class LocationInfo extends Component
{
    public School $school;
    public $countries;
    public $cities;
    public $states;
    public $country_id;
    public $city_id;
    public $state_id;
    public $address1;
    public $showStates;
    public $branch_id = null;
    public $user_schools = null;

//    protected $queryString = ['branch_id'=>['except'=>'','as'=>'b']];

    public function mount()
    {
        $this->showStates = false;
        $this->setData();
        $this->loadUserSchools();
        $this->countries = Countries::orderBy('country_name')->get(['id', 'country_name', 'translated_name']);
        $this->loadStates();
        $this->loadCities();
    }

    public function render()
    {
        return view('livewire.school.info.location-info');
    }

    public function loadStatesAndCities(){
        $this->state_id = null;
        $this->loadStates();
        $this->loadCities();
    }

    public function setData()
    {
        $school_id = $this->branch_id ?? \Auth::user()->selected_school->id;
        $this->school = \Auth::user()->schools()->findOrFail($school_id);
        $this->country_id = $this->school?->country_id;
        $this->state_id = $this->school?->state_id;
        $this->city_id = $this->school?->city_id;
        $this->address1 = $this->school?->address1;
    }

    public function loadCities()
    {
        $this->cities = [];
        if (empty($this->country_id)) return;
        $this->cities = Cities::query()
            ->whereCountryId($this->country_id)
            ->when(!empty($this->state_id),fn(Builder $q)=>$q->where('state_id',$this->state_id))
            ->orderBy('city_name')->get(['id', 'city_name', 'translated_name']);
    }

    public function loadStates(){
        $this->states = [];
        if (empty($this->country_id)) return;
        $this->states = CountryState::whereCountryId($this->country_id)->get(['id', 'name', 'translated_name']);
        $this->showStates = count($this->states) > 0;
    }

    protected function rules()
    {
        return [
            'country_id' => ['required'],
            'city_id' => ['required'],
            'address1' => ['required'],
            'state_id'=>['sometimes'],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $validatedData = $this->validate();
        $this->school->update($validatedData);
        $this->branch_id = null;
        $this->setData();
        $this->loadCities();
        $this->loadUserSchools();
        session()->flash('status', 'School Information Updated!');
    }

    public function edit($id=null){
        $this->branch_id = $id;
        $this->setData();
        $this->loadStates();
        $this->loadCities();
        $this->gotoTop();
    }

    public function loadUserSchools(){
        $this->user_schools = \Auth::user()->schools()->with(['country','city','state'])->get();
    }
    public function gotoTop(){
        $this->emit('goToTop');
    }
}
