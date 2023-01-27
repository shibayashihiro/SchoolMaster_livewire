<div class="w-100">
    <div class="row">
        <div class="col-12">
            <div class="h4 text-blue">@lang('School Student Information')</div>
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
                            * @var \Illuminate\Database\Eloquent\Collection<\App\Models\General\Countries> $countries
                            * @var \Illuminate\Database\Eloquent\Collection<\App\Models\General\Cities> $cities
                            */
                        @endphp
                        <form class="mt-3" method="post" wire:submit.prevent="">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12 d-flex flex-column justify-content-center align-items-center" x-data="{photoName: null, photoPreview: null}">
                                    <input type="file" class="d-none" wire:model="photo" x-ref="photo" x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />


                                    <!-- Current Profile Photo -->
                                    <div class="mt-2" x-show="!photoPreview">
                                        <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-circle" style="width:200px; height:200px;">
                                    </div>

                                    <!-- New Profile Photo Preview -->
                                    <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="d-block rounded-circle"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\'); width:200px; height:200px; background-repeat: no-repeat;background-size: cover;' ">
                    </span>
                                    </div>
                                    <div>
                                        <button class="mt-2 me-2 button-dark-blue button-sm mobile-btn" type="button" x-on:click.prevent="$refs.photo.click()">
                                            {{ __('Select A New Photo') }}
                                        </button>

                                        @if ($this->user->profile_photo_path)
                                            <button type="button" class="mt-2 button-red button-sm mobile-btn" wire:click="deleteProfilePhoto">
                                                {{ __('Remove Photo') }}
                                            </button>
                                        @endif
                                    </div>

                                    <x-jet-input-error for="photo" class="mt-2" />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-6">
                                    <div class="h-100">
                                        <input type="text" id="first_name" name="first_name" wire:model.defer="first_name"
                                               class="form-control input-field"
                                               placeholder="First Name">
                                    </div>
                                </div>
                                <div class="col-lg-6 mobile-marg-2">
                                    <div class="h-100">
                                        <input type="text" id="last_name" name="last_name" wire:model.defer="last_name"
                                               class="form-control input-field"
                                               placeholder="Last Name">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-12">
                                    <div class="h-100">
                                        <input type="text" id="position" name="position" wire:model.defer="position"
                                               class="form-control input-field"
                                               placeholder="Position">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-6">
                                    <div class="h-100">
                                        <select wire:model="country_id" name="country_id" class="text-start form-control input-field"
                                                aria-label="" wire:change="loadCities">
                                            <option value="">@lang('Select Country')</option>
                                            @foreach($countries as $country)
                                                <option value="{{$country->id}}">{{$country->country_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 mobile-marg-2">
                                    <p wire:loading.block wire:target="loadCities" class="start form-control input-field mb-0" aria-label=""
                                       style="font-size: small ">
                                        <i class="fas fa-spinner fa-pulse" aria-hidden="true"></i> Loading Cities...
                                    </p>
                                    <div wire:loading.class="d-none" wire:target="loadCities">
                                        <select wire:model="city_id" name="city_id" class="start form-control input-field" aria-label="">
                                            <option value="">@lang('Select City')</option>
                                            @foreach($cities as $city)
                                                <option value="{{$city->id}}">{{$city->city_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-12">
                                    <div class="h-100">
                    <textarea rows="4" id="position" name="position" wire:model.defer="about"
                              class="form-control input-secondary" placeholder="Description">
                    </textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-lg-12">
                                    <div class="text-center mt-5">
                                        <button type="submit" wire:click="save" class="button-dark-blue width-25 button-sm mobile-btn">Save</button>
                                        <button wire:click="setData" class="button-red width-25 button-sm mobile-btn">Cancel</button>
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
</div>
