<?php

namespace App\Http\Livewire\School\Attach;

use App\Actions\User\AddNewUser;
use App\Models\General\Cities;
use App\Models\General\Countries;
use Livewire\Component;

class AttachedSchool extends Component
{
    public $user_schools = null;
    protected $listeners = ['schoolAttached'=>'loadUserSchools'];

    public $user_account_state = [];
    public $countries;

    public function mount(){
        $this->loadUserSchools();
        $this->initUserForm();
        $this->countries = Countries::orderBy('country_name')->get(['id', 'country_name', 'translated_name']);
    }

    public function loadUserSchools(){
        $this->user_schools = \Auth::user()->schools()->with(['country','city','state'])->get();
    }
    public function initUserForm()
    {
        $this->user_account_state = [
            'school_id' => '',
            'first_name' => '',
            'last_name' => '',
            'email' => '',
            'country_id' => '',
            'city_id' => '',
            'position' => '',
            'password' => '',
            'password_confirmation' => '',
        ];
    }

    public function saveNewUser()
    {
        $this->resetErrorBag();
        AddNewUser::run(['user_account_state' => $this->user_account_state]);
        $this->initUserForm();
        $this->emit('userSaved');
    }

    public function loadCitiesForUser()
    {
        $this->cities = [];
        if (empty($this->user_account_state['country_id'])) return;
        $this->cities = Cities::query()
            ->whereCountryId($this->user_account_state['country_id'])
            ->orderBy('city_name')->get(['id', 'city_name', 'translated_name']);
    }
    public function render()
    {
        return view('livewire.school.attach.attached-school');
    }

}
