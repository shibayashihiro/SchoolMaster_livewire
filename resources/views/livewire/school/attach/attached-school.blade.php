<div>
    <div class="row mt-3">
        <div class="col-12">
            <div class="h4 text-blue">@lang('Assign new user to school')</div>
        </div>
    </div>
    @php
        /**
        * @var \App\Models\Institutes\School $user_school
        **/
    @endphp
    @foreach($user_schools as $user_school)
        <div class="row my-2">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3 d-flex justify-content-between">
                        {{$user_school->school_name}}
                        <a class="light-blue" href="javascript:void(0)"
                           onclick="attachUserWithSchool('{{$user_school->id}}','{{$user_school->school_name}}')">@lang('Link user to this school')</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
{{--Model For New User--}}
    <div class="modal" wire:ignore.self id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title h4 blue" id="staticBackdropLabel">@lang('Link Account With School')</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="ps-4 pe-4">
                    <div class="ps-2 pe-2">
                        <hr>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="h5 primary-text" id="school_name" wire:ignore></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="h-100">
                                <input type="text" wire:model.lazy="user_account_state.first_name"
                                       class="form-control input-field" placeholder="@lang('First Name')">
                                <x-jet-input-error for="user_account_state.first_name" class="mt-2" />

                            </div>
                        </div>
                        <div class="col-lg-6 mobile-marg-2">
                            <div class="h-100">
                                <div class="input-group">
                                    <input type="text" wire:model.lazy="user_account_state.last_name"
                                           class="form-control input-field" placeholder="@lang('Last Name')">
                                    <x-jet-input-error for="user_account_state.last_name" class="mt-2" />

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div @class(['col-md-6'])>
                            <select wire:model="user_account_state.country_id"
                                    class="text-start form-control input-field" aria-label=""
                                    wire:change="loadCitiesForUser">
                                <option value="">@lang('Select Country')</option>
                                @foreach($countries as $country)
                                    <option value="{{$country->id}}">{{$country->country_name}}</option>
                                @endforeach
                            </select>
                            <x-jet-input-error for="user_account_state.country_id" class="mt-2" />

                        </div>
                        <div @class(['col-md-6'])>
                            <p wire:loading.block
                               wire:target="loadCitiesForUser"
                               class="start form-control input-field" aria-label=""
                               style="font-size: small ">
                                <i class="fas fa-spinner fa-pulse" aria-hidden="true"></i> Loading...
                            </p>
                            <div wire:loading.class="d-none"
                                 wire:target="loadCitiesForUser">
                                <select wire:model="user_account_state.city_id" name="city_id"
                                        class="start form-control input-field" aria-label="">
                                    <option value="">@lang('Select City')</option>
                                    @foreach($cities ?? [] as $city)
                                        <option value="{{$city->id}}">{{$city->city_name}}</option>
                                    @endforeach
                                </select>
                                <x-jet-input-error for="user_account_state.city_id" class="mt-2" />

                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <div class="h-100">
                                <input type="email" wire:model.lazy="user_account_state.email"
                                       class="form-control input-field"
                                       placeholder="Email">
                                <x-jet-input-error for="user_account_state.email" class="mt-2" />

                            </div>
                        </div>
                        <div class="col-lg-6 mobile-marg-2">
                            <div class="h-100">
                                <input type="text" wire:model.lazy="user_account_state.position"
                                       class="form-control input-field" placeholder="Position">
                                <x-jet-input-error for="position" class="mt-2" />
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <div class="h-100">
                                <input type="password" wire:model.lazy="user_account_state.password"
                                       class="form-control input-field"
                                       placeholder="Password">
                                <x-jet-input-error for="user_account_state.password" class="mt-2" />

                            </div>
                        </div>
                        <div class="col-lg-6 mobile-marg-2">
                            <div class="h-100">
                                <input type="password"
                                       wire:model.lazy="user_account_state.password_confirmation"
                                       class="form-control input-field"
                                       placeholder="Confirm Password">
                                <x-jet-input-error for="user_account_state.password_confirmation" class="mt-2" />

                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col text-end">
                            <button type="button" wire:click="saveNewUser"
                                    class="button-dark-blue width-25 button-sm mobile-btn"
                                    wire:loading.attr="disabled">@lang('Link Account')
                            </button>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 d-flex justify-content-center">
                            <div wire:loading.block wire:target="saveNewUser"><i class="fas fa-spinner fa-pulse"
                                                                                 aria-hidden="true"></i> Saving Data...
                            </div>
                        </div>
                    </div>
                    <p class="primary-text small">@lang('An email wil be sent to user')</p>
                </div>
            </div>
        </div>
    </div>
    @push(AppConst::PUSH_JS)
        <script>
            const attach_user_model = new bootstrap.Modal($('#staticBackdrop2'));
            function attachUserWithSchool(school_id, school_name) {
                $('#school_name').html(school_name);
            @this.set('user_account_state.school_id', school_id);
                attach_user_model.show();
            }

            Livewire.on('userSaved', () => {
                attach_user_model.hide();
            })

        </script>
    @endpush
</div>
