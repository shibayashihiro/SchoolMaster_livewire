<?php

namespace App\Http\Livewire\User\Tabs;

use App\Models\General\Cities;
use App\Models\General\Countries;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserPersonalInfoTabContent extends Component
{
    use WithFileUploads;
    public $first_name;
    public $last_name;
    public $country_id;
    public $city_id;
    public $position;
    public $about;
    public $photo;

    public $countries = [];
    public $cities = [];
    public User $user;

    public function mount(){
        $this->user = \Auth::user();
        $this->countries  = Countries::orderBy('country_name')->get(['id','country_name','translated_name']);
        $this->setData();
    }

    public function rules(){
        return [
            'first_name'=>['required'],
            'last_name'=>['required'],
            'country_id'=>['required'],
            'city_id'=>['present'],
            'position'=>['present'],
            'about'=>['present','max:500'],
            'photo'=>['nullable', 'mimes:jpg,jpeg,png', 'max:1024']
        ];
    }

    public function render()
    {
        return view('livewire.user.tabs.user-personal-info-tab-content');
    }

    public function loadCities(){
        $this->cities = [];
        if (empty($this->country_id)) return;
        $this->cities = Cities::whereCountryId($this->country_id)->orderBy('city_name')->get(['id','city_name','translated_name']);
    }

    public function save(){
        $validated = $this->validate();
        if (isset($validated['photo'])) {
            $this->user->updateProfilePhoto($validated['photo']);
        }
        $user_bio = $this->user->userBio;
        $user_bio->update($validated);
        session()->flash('status', 'Information Updated!');
    }

    public function deleteProfilePhoto(){
        \Auth::user()->deleteProfilePhoto();
        $this->user = \Auth::user();
        session()->flash('status', 'Profile Photo Removed!');

    }

    public function setData(){
        $user_bio = \Auth::user()->userBio;
        $this->first_name = $user_bio?->first_name;
        $this->last_name = $user_bio?->last_name;
        $this->country_id = $user_bio?->country_id;
        $this->city_id  = $user_bio?->city_id;
        $this->position = $user_bio?->position;
        $this->about = $user_bio?->about;
        $this->loadCities();
    }
}
