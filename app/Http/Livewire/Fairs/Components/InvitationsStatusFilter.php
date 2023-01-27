<?php

namespace App\Http\Livewire\Fairs\Components;

use Livewire\Component;

class InvitationsStatusFilter extends Component
{
    public $status = 'pending';
    public $statuses;
    protected $queryString = ['status' => ['except' => 'pending']];

    public function mount()
    {
        $this->statuses = \AppConst::INVITATION_STATUSES;
    }

    public function render()
    {
        return view('livewire.fairs.components.invitations-status-filter');
    }

    public function statusUpdated()
    {
        $this->emit('filterUniversitiesByInvitationStatus', $this->status);
    }
}
