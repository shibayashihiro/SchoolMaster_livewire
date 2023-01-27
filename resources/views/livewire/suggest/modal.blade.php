<div>
    {{-- Suggest School and University Modal. --}}
    <x-jet-modal wire:model="isInvitationModelOpen">
        <x-slot name="title">
            {{ __("Suggest a $type") }}
        </x-slot>
        <x-slot name="description">
            <div class="row">
                <div class="col-12">
                    <div class="gray paragraph-style2">
                        {{ __("Suggest a {$type} to be listed in UNIRANKS") }}
                    </div>
                </div>
            </div>
        </x-slot>
            <div class="row mt-md-3">
                <div class="col-12 col-md-6 mobile-marg-2">
                    <input type="text" wire:model="name" placeholder="{{__("Enter {$type} name")}}"
                           class="form-control input-field">
                    <x-jet-input-error for="name" class="mt-2" />
                </div>
                <div class="col-12 col-md-6 mobile-marg-2">
                    <input type="text" wire:model="website" placeholder="{{__("Enter {$type} website url")}}"
                           class="form-control input-field">
                    <x-jet-input-error for="website" class="mt-2" />
                </div>
            </div>
            <div class="row mt-md-3">
                <div class="col-12 col-md-6 mobile-marg-2">
                    <input wire:model="contact_name" class="form-control input-field" placeholder="{{__("Contact name")}}"/>
                    <x-jet-input-error for="contact_name" class="mt-2" />
                </div>
                <div class="col-12 col-md-6 mobile-marg-2">
                    <input wire:model="contact_email" type="email" class="form-control input-field" placeholder="{{__("Contact email")}}"/>
                    <x-jet-input-error for="contact_email" class="mt-2" />
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <div class="gray paragraph-style2">
                        {{ __("an invitation from your ShoolsMaster account will be sent to this {$type}
                        inviting them to register and update their {$type} profile, once this done school's students
                        will be able to choose this university as a study option") }}
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <button type="submit" wire:click="sendInvitation"  class="button-dark-blue width-25 button-sm mobile-btn"
                            wire:loading.attr="disabled">@lang('Send Invitation')
                    </button>
                </div>
                <div class="row mt-3">
                    <div class="col-12 d-flex justify-content-center">
                        <div wire:loading.block wire:target="sendInvitation"><i class="fas fa-spinner fa-pulse" aria-hidden="true"></i>
                            @lang('Sending Invitation')...
                        </div>
                    </div>
                </div>
                </form>
            </div>
    </x-jet-modal>
</div>
