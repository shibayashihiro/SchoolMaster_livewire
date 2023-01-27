<x-shared.general.main>
    <x-shared.general.content>
        <div class="col-12">
            <div class="my-5 p-0 m-auto modal-dialog modal-lg">
                <div class="modal-content border-0 shadow">
                    <div class="d-flex">
                        <div class="auth-card-sidebar d-none d-md-block">
                            <div class="auth-card-overlay p-4">
                                <div class="d-flex">
                                    <x-jet-authentication-card-logo/>
                                </div>
                                <div class="mt-5">
                                    <div>
                                        <h6 class="ms-3">{{__('Create')}}</h6>
                                        <ul>
                                            <li>{{ __('University Fair') }}</li>
                                            <li>{{ __('University Talk') }}</li>
                                        </ul>
                                    </div>

                                    <div>
                                        <h6 class="ms-3">{{__('Join')}}</h6>
                                        <ul>
                                            <li>{{ __('University Open day') }}</li>
                                            <li>{{ __('Workshop') }}</li>
                                            <li>{{ __('Student for a day') }}</li>
                                        </ul>
                                    </div>

                                    <div>
                                        <h6 class="ms-3">{{__('Manage')}}</h6>
                                        <ul>
                                            <li>{{ __('Create Counseling') }}</li>
                                            <li>{{ __('Student Applications') }}</li>
                                            <li>{{ __('Student Enrolments') }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="auth-card-main flex-fill p-5">
                            {{$slot}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-shared.general.content>
</x-shared.general.main>
