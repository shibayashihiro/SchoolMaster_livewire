<div>
    <div class="row">
        <div class="col-12">
            <div class="h4 text-blue">@lang('Connect or Create School Branch')</div>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="w-100">
                        {{--                        <x-jet-validation-errors class="mb-4 alert alert-danger"/>--}}
                        @if (session('status'))
                            <div class="mb-4 font-medium alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @php
                            /**
                            * @var \Illuminate\Database\Eloquent\Collection<\App\Models\General\Countries> $countries
                            * @var \Illuminate\Database\Eloquent\Collection<\App\Models\General\Cities> $cities
                            */
                        @endphp
                        <div class="row">
                            <div @class(['col-md-4 mt-3 mt-md-0', 'col-md-6' => !$showStates ])>
                                <select wire:model="country_id" id="country_id"
                                        class="text-start form-control input-field" aria-label=""
                                        wire:change="loadStatesAndCities">
                                    <option value="">@lang('Select Country')</option>
                                    @foreach($countries as $country)
                                        <option value="{{$country->id}}">{{$country->country_name}}</option>
                                    @endforeach
                                </select>
                                <x-jet-input-error for="country_id" class="mt-2" />
                            </div>
                            @if($showStates)
                                <div class="col-md-4 mt-3 mt-md-0">
                                    <p wire:loading.block wire:target="loadStatesAndCities"
                                       class="start form-control input-field" aria-label=""
                                       style="font-size: small ">
                                        <i class="fas fa-spinner fa-pulse" aria-hidden="true"></i>
                                        @lang('Loading')...
                                    </p>
                                    <div wire:loading.class="d-none" wire:change="loadCities"
                                         wire:target="loadStatesAndCities">
                                        <select wire:model="state_id" name="state_id"
                                                class="start form-control input-field" aria-label="">
                                            <option value="">@lang('Select State')</option>
                                            @foreach($states as $state)
                                                <option value="{{$state->id}}">{{$state->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <x-jet-input-error for="state_id" class="mt-2" />
                                </div>
                            @endif
                            <div @class(['col-md-4 mt-3 mt-md-0', 'col-md-6' => !$showStates ])>
                                <p wire:loading.block
                                   wire:target="{{!$showStates ? 'loadStatesAndCities':'loadCities'}}"
                                   class="start form-control input-field" aria-label=""
                                   style="font-size: small ">
                                    <i class="fas fa-spinner fa-pulse" aria-hidden="true"></i> Loading...
                                </p>
                                <div wire:loading.class="d-none"
                                     wire:target="{{!$showStates ? 'loadStatesAndCities':'loadCities'}}">
                                    <select wire:model="city_id" name="city_id"
                                            class="start form-control input-field" aria-label="">
                                        <option value="">@lang('Select City')</option>
                                        @foreach($cities ?? [] as $city)
                                            <option value="{{$city->id}}">{{$city->city_name}}</option>
                                        @endforeach
                                    </select>
                                    <x-jet-input-error for="city_id" class="mt-2" />
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3" >
                            <div class="col">
                                <div class="form-group mb-3" wire:ignore>
                                    <select id="institute_id">
                                    </select>
                                    <div id="adminExist">

                                    </div>
                                </div>
                                <x-general.input-error for-input="school_id"/>
                                <x-jet-input-error for="school_name" class="mt-2" />
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-lg-12">
                                <div class="text-center">
                                    <button type="button" wire:click="save"
                                            class="button-dark-blue width-25 button-sm mobile-btn"
                                            wire:loading.attr="disabled">@lang('Add New School')
                                    </button>
                                    <button type="button" class="button-red width-25 button-sm mobile-btn"
                                            wire:loading.attr="disabled"
                                            wire:click="resetData">@lang('Cancel')</button>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 d-flex justify-content-center">
                                <div wire:loading.block wire:target="save"><i class="fas fa-spinner fa-pulse"
                                                                              aria-hidden="true"></i> Saving Data...
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-school-created-alert-message/>
    @push(AppConst::PUSH_JS)
        <script>
            $("#institute_id").select2({
                ajax: {
                    url: '{{route('ajax.get-schools')}}',
                    type: "post",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN, // constant deifined in layout/guest
                            search: params.term, // search term
                            country_id: $('#country_id').val(),
                        };
                    },
                    processResults: function (response) {
                        return {
                            results: response
                        };
                    },
                    cache: true
                },
                templateResult: formatInstitute,
                placeholder: "{{__('Select School')}}",
                // allowClear: true,
                tags: true,
                width: '100%',
                // minimumInputLength: 1,
            })

            $('#institute_id').on('change', function (e) {
                let school_name = $('#institute_id').select2("val");
                if(!school_name) return;
            @this.set('school_name', school_name);
            });

            Livewire.on('schoolAttached', () => {
                $('#institute_id').val(null).trigger('change');
                const alertMessage = new bootstrap.Modal($('#alertMessage'));
                alertMessage.show();
            })


            $('#institute_id').one('select2:open', function (e) {
                $('input.select2-search__field').prop('placeholder', '{{__('Start typing')}}...');
            });

            function formatInstitute(institute) {
                if (!institute.id) {
                    return institute.text;
                }
                var image = `${institute.image}`;
                if (institute.image == undefined) {
                    image = "{{ asset('assets/img/icons/school.png')}}"
                }

                var $company = $(`
                    <div class="row w-100">
                    <div class="col-sm-2">
                    <img class="img-thumbnail" src="${image}" alt="Card image"/>
                    </div>
                    <div class="col-sm-10">
                      <p class="mt-2">${institute.text}</p>
                     </div>
                    `);
                return $company;
            }

            $("#institute_id").on('change', function () {
                $.get(`{{route('ajax.school-availability')}}?q=${$("#institute_id").val()}`, function (data) {
                    if (data.adminExist) {
                        var html = `<p class="text-danger mt-2">{{__('This school is already claimed by')}} ${data.name} {{__('and')}} ${data.email} .<span>
                        <a href="https://schoolsmaster.com/" target="_blank" class="btn btn-primary btn-sm custom-btn" style="background: #2c2f57 !important;" >Report this school to reclaim the profile </a></span></p>`;
                        $('#adminExist').empty();
                        $("#adminExist").append(html);
                    } else {
                        $('#adminExist').empty();
                    }
                });
            })
        </script>
    @endpush
</div>
