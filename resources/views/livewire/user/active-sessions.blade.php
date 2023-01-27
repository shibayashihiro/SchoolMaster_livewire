<div>
    <div class="row">
        <div class="col-12">
            <div class="h5 blue">{{ __('Active Sessions') }}</div>
            <p class="paragraph-style2 blue">{{ __('This location listed below are an estimate of where IP address may be located within your country, region and city. The accuracy of look-up varies by providers and location ofthe device. This should only be used as rough guideline.') }}</p>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-body">
            <div class="w-100">
                <div class="row">
                    @php
                        /**
                        *@var \App\Models\Session $activeSession
                        *@var \App\Models\Session $current_session
                        **/
                        $current_session = $activeSessions->where('is_current_device',true)->first();
                    @endphp
                    <div class="">
                        <div
                            class="h5 blue">{{ __("Your're signed into ". $activeSessions ->count()." sessions") }}</div>
                        <div class="gray">{{ __('Current session') }}</div>

                        @php
                            $geoInfo = geoip($current_session->ip_address);
                        @endphp
                        <div class="row p-2">
                            <p class="paragraph-style2 blue font-light">{{ __('Details') }}</p>
                            <p class="paragraph-style2 blue font-light mt-3">{{ $geoInfo->city . ' , ' . $geoInfo->country }}</p>
                            <p class="paragraph-style2 blue font-light mt-3">({{ __('Approximate Location') }})</p>
                            <p class="paragraph-style2 blue font-light mt-3">{{ $current_session->agent['browser'] }} {{ __('on') }}
                                {{ $current_session->agent['platform'] }}</p>
                            <p class="paragraph-style2 blue font-light mt-3">{{ __('IP Address') }}:</p>
                            <p class="paragraph-style2 blue font-light mt-3">{{ $current_session->ip_address }}</p>
                        </div>

                        @if($activeSessions->where('is_current_device',false)->count())

                        <hr class="mt-2">
                        <div class="d-flex justify-content-between">
                            <div class="gray">{{ __('Other active sessions') }}</div>
                            <div><a href="javascript:void(0)" wire:click="confirmLogout" wire:loading.attr="disabled"
                                    class="light-blue">{{ __('End other active sessions') }}</a></div>
                        </div>
                        @foreach ( $activeSessions->where('is_current_device',false) as $activeSession )
                            @php
                                $geoInfo = geoip($activeSession->ip_address);
                            @endphp
                            <div class="row p-2">
                                <p class="paragraph-style2 blue font-normal">{{ __('Last accessed') }}</p>
                                <p class="paragraph-style2 blue font-normal mt-3">{{ $activeSession->last_active }}</p>
                                <p class="paragraph-style2 blue font-normal mt-3">{{ __('Details') }}</p>
                                <p class="paragraph-style2 blue font-normal mt-3">{{ $geoInfo->city . ' , ' . $geoInfo->country }}</p>
                                <p class="paragraph-style2 blue font-normal mt-3">({{ __('Approximate location') }})</p>
                                <p class="paragraph-style2 blue font-normal mt-3">{{ $activeSession->agent['browser'] }} {{ __('on') }} {{ $activeSession->agent['platform'] }}</p>
                                <p class="paragraph-style2 blue font-normal mt-3">{{ __('IP Address') }}:</p>
                                <p class="paragraph-style2 blue font-normal mt-3">{{ $activeSession->ip_address }}</p>
                            </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
    {{--Logout confirmation--}}
    <x-jet-modal wire:model="confirmingLogout">
        <x-slot name="title">
            {{ __('Log Out Other Browser Sessions') }}
        </x-slot>

        <x-slot name="description">
            <div class="row">
                <div class="col-12">
                    {{ __('Please enter your password to confirm you would like to log out of your other browser sessions across all of your devices.') }}
                </div>
            </div>
        </x-slot>
        <div class="row mt-3">
            <div class="col-12" x-data="{}" x-on:confirming-logout-other-browser-sessions.window="setTimeout(() => $refs.password.focus(), 250)">
                <x-jet-input type="password" class=""
                             placeholder="{{ __('Password') }}"
                             x-ref="password"
                             wire:model.defer="password"
                             wire:keydown.enter="logoutOtherBrowserSessions" />

                <x-jet-input-error for="password" class="mt-2" />
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-12">
                <button wire:click="logoutOtherBrowserSessions" wire:loading.attr="disabled"
                        class="button-dark-blue button-sm mobile-btn">
                    {{ __('Log Out Other Browser Sessions') }}
                </button>
                <button wire:click="$toggle('confirmingLogout')" wire:loading.attr="disabled"
                        class="button-red width-25 button-sm mobile-btn">
                    {{ __('Cancel') }}
                </button>
            </div>
        </div>
    </x-jet-modal>
</div>
