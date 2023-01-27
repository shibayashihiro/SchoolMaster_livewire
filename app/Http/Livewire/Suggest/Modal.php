<?php

namespace App\Http\Livewire\Suggest;

use App\Models\Notifications\Notification;
use App\Models\Suggestions\SuggestedContact;
use App\Notifications\Invitation\InviteUsingSendGrid;
use Livewire\Component;

class Modal extends Component
{
    public $contact_name;
    public $contact_email;
    public $website;
    public $name;
    public $type;

    public $isInvitationModelOpen = false;

    protected $listeners = ['openInvitationModal','onModelClose'];

    public function openInvitationModal($type){
        $this->type = $type;
        $this->isInvitationModelOpen = true;
    }

    public function closeInvitationModal(){
        $this->isInvitationModelOpen = false;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function onModelClose(){
        $this->resetForm();
        $this->closeInvitationModal();
    }

    protected function rules(){
        return [
          'name'=>['required'],
          'website'=>['present'],
          'contact_name'=>['required'],
          'contact_email'=>['required','email','unique:suggested_contacts,contact_email']
        ];
    }

    protected function validationAttributes()
    {
     return [
         'name' => "{$this->type} name",
         'website'=>"{$this->type} website"
     ];
    }
    protected function messages()
    {
     return [
         'contact_email.unique' => "Invitation already sent this contact.",
     ];
    }
    public function sendInvitation(){
        $validated = $this->validate();
        $validated['user_id'] = \Auth::id();
        SuggestedContact::create($validated);
        //TODO: ACTIVATE SEND GRID INVITATION
//        \Notification::route('sendGrid',[
//            $this->contact_email => $this->contact_name,
//        ])->notify(new InviteUsingSendGrid());
        $this->resetForm();
        $this->closeInvitationModal();
    }

    public function resetForm(){
        $this->name = null;
        $this->type = null;
        $this->website = null;
        $this->contact_name = null;
        $this->contact_email = null;
    }

    public function render()
    {
        return view('livewire.suggest.modal');
    }
}
