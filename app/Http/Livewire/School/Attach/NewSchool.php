<?php

namespace App\Http\Livewire\School\Attach;

use App\Models\General\Cities;
use App\Models\General\Countries;
use App\Models\General\CountryState;
use App\Models\Institutes\School;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class NewSchool extends Component
{
    public $countries;
    public $cities;
    public $states;
    public $country_id;
    public $city_id;
    public $state_id;
    public $showStates;
    public $school_name;


    public function mount()
    {
        $this->showStates = false;
        $this->countries = Countries::orderBy('country_name')->get(['id', 'country_name', 'translated_name']);
    }

    public function loadStatesAndCities()
    {
        $this->state_id = null;
        $this->loadStates();
        $this->loadCities();
    }

    protected function addSchoolRules(): array
    {
        return [
            'country_id' => ['required'],
            'city_id' => ['required'],
            'school_name' => ['required'],
            'state_id' => ['sometimes'],
        ];
    }

    protected function schoolValidatedData(): array
    {
        return $this->validate($this->addSchoolRules(), [
            'school_name.required' => 'Please Select :attribute',
            'country_id.required' => 'Please Select :attribute',
            'city_id.required' => 'Please Select :attribute',
        ], [
            'country_id' => 'Country',
            'city_id' => 'City',
            'school_name' => 'School',
        ]);
    }

    public function save()
    {
        $validatedData = $this->schoolValidatedData();
        $school_id = $validatedData['school_name'];
        if (!School::whereId($school_id)->exists()) {
            $validatedData ['institute_id'] = 1;
            $school_id = School::create($validatedData)?->id;
        }
        $this->attachSchool($school_id);
        $this->resetData();
        $this->emit('schoolAttached');
    }


    public function attachSchool($school_id): bool
    {
        $user = \Auth::user();
        $user->schools()->syncWithoutDetaching([$school_id => ['approval_status' => \AppConst::PENDING]]);
        return true;
    }

    public function loadCities()
    {
        $this->cities = [];
        if (empty($this->country_id)) return;
        $this->cities = Cities::query()
            ->whereCountryId($this->country_id)
            ->when(!empty($this->state_id), fn(Builder $q) => $q->where('state_id', $this->state_id))
            ->orderBy('city_name')->get(['id', 'city_name', 'translated_name']);
    }


    public function loadStates()
    {
        $this->states = [];
        if (empty($this->country_id)) return;
        $this->states = CountryState::whereCountryId($this->country_id)->get(['id', 'name', 'translated_name']);
        $this->showStates = count($this->states) > 0;
    }

    public function resetData()
    {
        $this->school_name = null;
        $this->city_id = null;
        $this->state_id = null;
        $this->country_id = null;
        $this->states = [];
        $this->cities = [];
        $this->states = false;
    }

    public function render()
    {
        return view('livewire.school.attach.new-school');
    }
}
