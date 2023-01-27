<?php

namespace App\Http\Livewire\School\Info;

use App\Models\Institutes\School;
use Illuminate\Validation\Rule;
use Livewire\Component;

class BasicInfo extends Component
{
    /**
     * @var \App\Models\Institutes\School $school ;
     * */

    public $school_name;
    public $phone;
    public $email;
    public $facebook_url;
    public $website;
    public $linkedin_url;
    public $country_code;

    public function mount(){
        $this->setData();
    }

    public function render()
    {
        return view('livewire.school.info.basic-info');
    }

    protected function rules()
    {
        return [
            'school_name' => ['required'],
            'phone' => ['required'],
            'email' => ['email', Rule::unique(School::class, 'email')->ignore(\Auth::user()->selected_school->id)],
            'website' => ['required'],
            'facebook_url' => ['required'],
            'linkedin_url' => ['required'],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function setData()
    {
        $school = \Auth::user()->selected_school;
        $this->school_name = $school->school_name;
        $this->email = $school->email;
        $this->phone = $school->phone;
        $this->website = $school->website;
        $this->facebook_url = $school->facebook_url;
        $this->linkedin_url = $school->linkedin_url;
        $this->country_code = $school->country->code;
    }

    public function save(){
        $validatedData = $this->validate();
        $user = \Auth::user();
        $user->selected_school->update($validatedData);
        session()->flash('status', 'School Information Updated!');
        $this->emit('loadPhoneSelection');
    }


}
