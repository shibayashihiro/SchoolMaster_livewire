<div>
    <div class="row">
        <div class="col-12">
            <div class="h4 text-blue">@lang('School Location Information')</div>
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
                            * @var \App\Models\Institutes\School $school
                            **/
                        @endphp
                        <form class="mt-3" method="post" wire:submit.prevent="save"
                              onkeydown="return event.key != 'Enter';">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <div class="row">
                                        <div class="h7 text-blue mb-3">@lang('School location and branches location')</div>
                                        <div class="h6 text-blue mb-3">{{$school->school_name}}</div>
                                    </div>
                                    @php
                                        /**
                                        * @var \Illuminate\Database\Eloquent\Collection<\App\Models\General\Countries> $countries
                                        * @var \Illuminate\Database\Eloquent\Collection<\App\Models\General\Cities> $cities
                                        */
                                    @endphp
                                    <div class="row">
                                        <div @class(['col-md-4 mt-3 mt-md-0', 'col-md-6' => !$showStates ])>
                                            <select wire:model="country_id" name="country_id"
                                                    class="text-start form-control input-field" aria-label=""
                                                    wire:change="loadStatesAndCities">
                                                <option value="">@lang('Select Country')</option>
                                                @foreach($countries as $country)
                                                    <option value="{{$country->id}}">{{$country->country_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @if($showStates)
                                            <div class="col-md-4 mt-3 mt-md-0">
                                                <p wire:loading.block wire:target="loadStatesAndCities"
                                                   class="start form-control input-field" aria-label=""
                                                   style="font-size: small ">
                                                    <i class="fas fa-spinner fa-pulse" aria-hidden="true"></i>
                                                    @lang('Loading')...
                                                </p>
                                                <div wire:loading.class="d-none" wire:change="loadCities" wire:target="loadStatesAndCities">
                                                    <select wire:model="state_id" name="state_id"
                                                            class="start form-control input-field"  aria-label="">
                                                        <option value="">@lang('Select State')</option>
                                                        @foreach($states as $state)
                                                            <option value="{{$state->id}}">{{$state->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        @endif
                                        <div  @class(['col-md-4 mt-3 mt-md-0', 'col-md-6' => !$showStates ])>
                                            <p wire:loading.block wire:target="{{!$showStates ? 'loadStatesAndCities':'loadCities'}}"
                                               class="start form-control input-field" aria-label=""
                                               style="font-size: small ">
                                                <i class="fas fa-spinner fa-pulse" aria-hidden="true"></i> Loading...
                                            </p>
                                            <div wire:loading.class="d-none" wire:target="{{!$showStates ? 'loadStatesAndCities':'loadCities'}}">
                                                <select wire:model="city_id" name="city_id"
                                                        class="start form-control input-field" aria-label="">
                                                    <option value="">@lang('Select City')</option>
                                                    @foreach($cities as $city)
                                                        <option value="{{$city->id}}">{{$city->city_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="input-container">
                                                <input name="address1" id="address1" wire:model.lazy="address1" type="text"
                                                       placeholder="Pick Location or Start Typing"
                                                       class="input-field form-control input-field mt-3">
                                                <i class="fa fa-location-pin icon"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" id="latitude" name="latitude" wire:model="latitude"
                                           class="form-control">

                                    <input type="hidden" name="longitude" id="longitude"
                                           class="form-control" wire:model="longitude">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-12">
                                    <div class="text-center">
                                        <button type="submit" class="button-dark-blue width-25 button-sm mobile-btn"
                                                wire:loading.attr="disabled">@lang('Save')
                                        </button>
                                        <button type="button" class="button-red width-25 button-sm mobile-btn"
                                                wire:loading.attr="disabled"
                                                wire:click="edit()">@lang('Cancel')</button>
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if($user_schools->count() > 1)
    <div class="row mt-4">
        <div class="col-12">
            <div class="h4 text-blue">@lang('Branches')</div>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="w-100">
                        <div class="table-responsive mt-4">
                            <table class="table">
                                <thead class="primary-text">
                                <tr>
                                    <td class="align-top primary-text" style="font-size:13px">#</td>
                                    <td class="align-top primary-text" style="font-size:13px">@lang('Branch Name')</td>
                                    <td class="align-top primary-text" style="font-size:13px">@lang('County')</td>
                                    <td class="align-top primary-text" style="font-size:13px">@lang('City')</td>
                                    <td class="align-top primary-text" style="font-size:13px">@lang('State')</td>
                                    <td class="align-top primary-text" style="font-size:13px">@lang('Address')</td>
                                    <td class="align-top primary-text" style="font-size:13px">@lang('Action')</td>
                                </tr>
                                </thead>
                                <tbody class="text-muted align-middle">
                                @php
                                    /**
                                    * @var \App\Models\Institutes\School $user_school
                                    **/
                                @endphp
                                @foreach($user_schools as $user_school)
                                    <tr>
                                        <td class="align-top" style="font-size:13px">
                                            {{$loop->iteration}}</td>
                                        <td class="align-top" style="font-size:13px">
                                            {{$user_school->translated_name ? $user_school->translated_name :  $user_school->school_name }}</td>
                                        <td class="align-top" style="font-size:13px">
                                            {{$user_school->country?->translated_name ? $user_school->country?->translated_name: $user_school->country?->country_name}}
                                        </td>
                                        <td class="align-top" style="font-size:13px">
                                            {{$user_school->city?->translated_name ? $user_school->city?->translated_name: $user_school->city?->city_name}}</td>
                                        <td class="align-top" style="font-size:13px">
                                            {{$user_school->state?->translated_name ?$user_school->state?->translated_name: $user_school->state?->name}}</td>
                                        <td class="align-top" style="font-size:13px">
                                            {{$user_school->address1}}</td>
                                        <td class="align-center">
                                            <i class="fa-solid fa-pen-to-square ic_style1" style="cursor: pointer"
                                               wire:click="edit('{{$user_school->id}}')"></i>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @push(AppConst::PUSH_JS)
        <script type="text/javascript"
                src="https://maps.google.com/maps/api/js?key={{ config('services.google.map.key') }}&libraries=places"></script>
        <script>
            loadMap();


            Livewire.on('loadMap', () => {
                loadMap();
            })

            function loadMap() {
                google.maps.event.addDomListener(window, 'load', initialize);
            }

            function initialize() {

                var input = document.getElementById('address1');
                var autocomplete = new google.maps.places.Autocomplete(input);
                autocomplete.addListener('place_changed', function () {
                    var place = autocomplete.getPlace();
                    $('#latitude').val(place.geometry['location'].lat());
                    $('#longitude').val(place.geometry['location'].lng());
                });
            }
        </script>
    @endPush
</div>

