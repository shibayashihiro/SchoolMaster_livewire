<?php

namespace App\Http\Livewire\School;

use Livewire\Component;

class InformationTabs extends Component
{
    public $tab = 'basic_info';
    protected $queryString = ['tab' => ['except' => 'basic_info', 'as' => 't']];
    protected $listeners = ['schoolInfoTabChanged'];

    public function render()
    {
        if (!in_array($this->tab, ['basic_info', 'location_info', 'student_info', 'user-personal-info', 'user-emails',
            'user-phone-number', 'user-password', 'user-devices', 'user-two-step'])) {
            abort(404);
        }
        return view('livewire.school.information-tabs');
    }

    public function schoolInfoTabChanged($tab)
    {
        if ($this->tab == $tab) {
            return;
        }

        $this->tab = $tab;
    }
}


