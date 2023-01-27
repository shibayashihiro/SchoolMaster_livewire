<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class UserProfileTabsContent extends Component
{
    public $tab = 'user-basic-info';
    protected $queryString = ['tab' => ['except' => 'user-basic-info', 'as' => 't']];
    protected $listeners = ['userInfoTabChanged'];

    public function render()
    {
        if (!in_array($this->tab, ['user-basic-info', 'user-emails', 'user-phone-number', 'user-password', 'user-devices', 'user-two-step'])) {
            abort(404);
        }
        return view('livewire.user.user-profile-tabs-content');
    }

    public function userInfoTabChanged($tab)
    {
        if ($this->tab == $tab) {
            return;
        }

        $this->tab = $tab;
    }
}
