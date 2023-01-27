<?php

namespace App\Http\Livewire\User;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Livewire\Component;

class SessionsHistory extends Component
{
    public function render()
    {
        $sessionHistories = $this->getSessionHistories();
        return view('livewire.user.sessions-history', compact('sessionHistories'));
    }



    public function getSessionHistories(): LengthAwarePaginator
    {
        return \Auth::user()->sessionHistory()->paginate(10);
    }
}
