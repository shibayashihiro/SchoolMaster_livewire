<x-jet-form-section submit="save">
    <x-slot name="title">
        {{ __('Update Phone Number') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Phone number you provide will not show on your profile') }}
    </x-slot>
    @php
        /**
        * @var \App\Models\General\Countries $country
        *
        */
    @endphp
    <x-slot name="form">
        <div class="row">
            <div class="col-2 pe-0">
                <select wire:model.defer="mobile_country_id" class="text-start form-control input-field">
                    <option value="">@lang('Code')</option>
                    @foreach($countries as $country)
                        <option value="{{$country->country_code}}"><img src="{{$country->flag_url}}"> +{{$country->country_code}}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="mobile_country_id" class="mt-2"/>
            </div>
            <div class="col-10">
                <x-jet-input id="phone_number" type="text" placeholder="{{ __('Enter Phone Number') }}"
                             wire:model.defer="mobile" autocomplete="phone_number"/>
                <x-jet-input-error for="mobile" class="mt-2"/>
            </div>
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="col-12 mb-1" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>
        <button type="submit" class="button-dark-blue width-25 button-sm mobile-btn"
                wire:loading.attr="disabled">@lang('Save')
        </button>
        <button type="reset" class="button-red width-25 button-sm mobile-btn"
                wire:loading.attr="disabled">@lang('Cancel')</button>
    </x-slot>
</x-jet-form-section>
