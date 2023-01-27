<?php

namespace App\Http\Livewire\User\Tabs;

use App\Models\User;
use Livewire\Component;

class UserSubAccounts extends Component
{
    public $sub_accounts;
    public $confirmingUserDeletion = false;

    public function mount(){
        $this->sub_accounts = \Auth::user()->subAccounts()->with('schools')->get();
    }
    public function render()
    {
        return view('livewire.user.tabs.user-sub-accounts');
    }

    public function confirmDelete(User $user){
        $this->dispatchBrowserEvent('confirming-delete-user');
        $this->confirmingUserDeletion = true;
    }
}
