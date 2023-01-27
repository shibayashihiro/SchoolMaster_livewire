<div>
    <div class="row">
        <div class="col-12">
            <div class="h4 text-blue">@lang('School Basic Information')</div>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="w-100">

                        <x-jet-validation-errors class="mb-4 alert alert-danger"/>
                        @if (session('status'))
                            <div class="mb-4 font-medium alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        @php
                            /**
                            * @var \App\Models\Institutes\School $school;                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  */
                        @endphp
                        <form class="mt-3" method="post" wire:submit.prevent="save">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="h-100">
                                        <label for="email"
                                               class="visually-hidden">{{ __('school_name') }}</label>
                                        <input type="text" id="school_name" name="school_name" wire:model.lazy="school_name"
                                               class="form-control input-field" placeholder="School Name">
                                    </div>
                                </div>
                                <div class="col-lg-6 mobile-marg-2">

                                    <div class="h-100">
                                        <div class="input-group">
                                            <label for="phone" class="visually-hidden">{{ __('Phone') }}}</label>
                                            <input type="tel" id="phone" name="phone2"
                                                   wire:model.lazy="phone" class="form-control input-field">
                                        </div>

                                    </div>

                                </div>

                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-6">
                                    <div class="h-100">
                                        <label for="email"
                                               class="visually-hidden">{{ __('Email') }}</label>
                                        <input type="email" id="email" name="email" wire:model.lazy="email"
                                               class="form-control input-field"
                                               placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-lg-6 mobile-marg-2">
                                    <div class="h-100">
                                        <label for="facebook"
                                               class="visually-hidden">{{ __('Facebook') }}</label>
                                        <input type="text" name=" facebook_url" id="facebook" wire:model.lazy="facebook_url"
                                               class="form-control input-field" placeholder="Facebook">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-6">
                                    <div class="h-100">
                                        <label for="website"
                                               class="visually-hidden">{{ __('Website') }}</label>
                                        <input type="text" id="website" name="website" wire:model.lazy="website"
                                               class="form-control input-field"
                                               placeholder="Website">
                                    </div>
                                </div>
                                <div class="col-lg-6 mobile-marg-2">
                                    <div class="h-100">
                                        <label for="linkedin" class="visually-hidden">Linkedin</label>
                                        <input type="text" id="linkedin_url" name="linkedin_url" wire:model.lazy="linkedin_url"
                                               class="form-control input-field" placeholder="Linkedin">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" id="c_country" wire:model.lazy="country_code">
                            <div class="row mt-3">
                                <div class="col-lg-12">
                                    <div class="text-center">
                                        <button type="submit" class="button-dark-blue width-25 button-sm mobile-btn" wire:loading.attr="disabled">@lang('Save')
                                        </button>
                                        <button type="button" class="button-red width-25 button-sm mobile-btn" wire:loading.attr="disabled"
                                                wire:click="setData">@lang('Cancel')</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 d-flex justify-content-center">
                                    <div wire:loading.block wire:target="save"><i class="fas fa-spinner fa-pulse" aria-hidden="true"></i>
                                        Saving Data...
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push(AppConst::PUSH_JS)
        <script>
            attachIntlPhone();
            Livewire.on('loadPhoneSelection', () => {
                attachIntlPhone();
            })

            function attachIntlPhone() {
                let input = document.querySelector("#phone");
                let title = $("#c_country").val();
                if (title) {
                    title = $("#country").val();
                }
                window.intlTelInput(input, {
                    hiddenInput: "phone",
                    initialCountry: title,
                    utilsScript: '{{ asset('assets/js/utils.js') }}',
                });
            }
        </script>
    @endpush
</div>
