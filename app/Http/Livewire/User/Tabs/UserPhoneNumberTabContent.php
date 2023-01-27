<?php

namespace App\Http\Livewire\User\Tabs;

use App\Models\General\Countries;
use Livewire\Component;

class UserPhoneNumberTabContent extends Component
{
    public $mobile;
    public $mobile_country_id;

    public $countries;

    public function mount(){
        $this->mobile = \Auth::user()->userBio->mobile;
        $this->mobile_country_id = \Auth::user()->userBio->mobile_country_id;
        $this->countries = Countries::whereNotNull('country_code')->get();
    }
    public function render()
    {
        return view('profile.update-phone-number-form');
    }

    public function rules(){
        return [
            'mobile'=>['required','numeric','digits:10'],
            'mobile_country_id'=>['required'],
        ];
    }


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save(){
        $inputs = $this->validate();
        \Auth::user()->userBio->update($inputs);
        \Auth::user()->refresh();
        $this->emit('saved');
    }
}
