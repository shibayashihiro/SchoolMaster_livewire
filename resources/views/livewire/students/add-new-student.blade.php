<div class="col-12">
    <div class="card">
        <div class="card-body">
            <div class="w-100">
                <div class="row">
                    <div class="">
                        <div class="h4 blue">@lang('School Students')</div>
                    </div>
                </div>
                <x-jet-validation-errors class="mb-4 alert alert-danger"/>
                @if (session('status'))
                    <div class="mb-4 font-medium alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <form class="mt-3" wire:submit.prevent="">
                    <div class="row ">
                        <div class="col-lg-3">
                            <label for="" class="h6 blue">@lang('Personal Information')</label>
                            <div class="mt-2">
                                <input type="text" class=" input-field form-control" name="first_name" wire:model.lazy="first_name" placeholder="First Name">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label class="h6 text-light">P</label>
                            <div class="mt-2">
                                <input type="text" class=" input-field form-control" name="last_name" wire:model.lazy="last_name" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="col-lg-3 mobile-marg">
                            <label class="h6 blue">@lang('Date of birth')</label>
                            <div class="row mt-2">
                                <div class="input-group mb-4">
                                    <i class="fa fa-calendar input-group-text input-field date-calendar-icon"></i>
                                    <input wire:model.lazy="birthday" type="text" class="form-control input-field datetime" placeholder="Select Birthday">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label class="h6 blue">@lang('Select Budget')</label>
                            <select wire:model="fee_range" class="mt-2  input-field form-control" aria-label="">
                                <option value="">@lang('Select Budget')</option>
                                @foreach($all_fee_rages as $fee_range)
                                    <option value="{{ $fee_range->id }}">{{ $fee_range->range }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-3">
                            <div class="d-flex">
                                <div class="col-lg-5 w-30">
                                    <select wire:model="country_code" class="input-field form-control" aria-label="" wire:change="loadUniversities">
                                        <option value="">@lang('Select Mobile Number')</option>
                                        @foreach($all_destinations as $mobile_number)
                                            @if($mobile_number->country_code != null)
                                                <option value="{{ $mobile_number?->country_code }}">{{ $mobile_number?->country_code }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-7 mobile-field ms-3">
                                    <input wire:model.lazy="mobile" type="text" class=" input-field form-control" placeholder="Mobile Number">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <input wire:model.lazy="email" type="text" class="input-field form-control" placeholder="Email Address">
                        </div>
                        <div class="col-lg-3">
                        </div>
                        <div class="col-lg-3">
                            <select wire:model="study_fundings" class="input-field form-control" aria-label="">
                                <option value="">@lang('Select Study funding')</option>
                                @foreach($all_fundings as $funding)
                                    <option value="{{ $funding->id }}">{{ $funding->funding_source }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="row">
                            <div class="col-lg-4">
                                <label class="h6 blue mt-3 mb-3">@lang('What do you want to study ?')</label>
                            </div>
                            <div class="col-lg-4">
                                <label class="h6 blue mt-3 mb-3">@lang('Where do you want to study ?')</label>
                            </div>
                            <div class="col-lg-4">
                                <label class="h6 blue mt-3 mb-3">@lang('Select possible university')</label>
                            </div>
                        </div>
                        @for($i=0;$i<5;$i++)
                            <div class="row">
                                <div class="col-lg-4">
                                    <select wire:model="user_majors.{{$i}}" class="input-field form-control mt-3" aria-label="">
                                        <option value="">@lang('Select Major')</option>
                                        @foreach($all_majors as $major)
                                            <option value="{{ $major->id }}">{{ $major->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <select wire:model="user_destinations.{{$i}}" class="input-field form-control  mt-3" aria-label="">
                                        <option value="">@lang('Select Destination')</option>
                                        @foreach($all_destinations as $destination)
                                            <option value="{{ $destination->id }}">{{ $destination->country_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <select wire:model="user_universities.{{$i}}" class="input-field form-control  mt-3" aria-label="">
                                        <option value="">@lang('Select University')</option>
                                        @foreach($all_universities as $university)
                                            <option value="{{ $university->id }}">{{ $university->university_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @endfor
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-12 text-center">
                            <button wire:click="save" class="button-dark-blue width-23 button-sm mobile-btn" wire:loading.attr="disabled">@lang('Save')</button>
                            <button wire:click="save({{true}})" class="button-light-blue width-23 button-sm mobile-btn" wire:loading.attr="disabled">@lang('Save & Close')</button>
                            <button wire:click="save" class="button-green width-23 button-sm mobile-btn" wire:loading.attr="disabled">@lang('Save & Add Next Student')</button>
                            <button type="button" class="button-red width-23 button-sm mobile-btn" wire:loading.attr="disabled" wire:click="redirectStudentList">@lang('Cancel')</button>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 d-flex justify-content-center">
                            <div wire:loading.block wire:target="save"><i class="fas fa-spinner fa-pulse" aria-hidden="true"></i>
                                @lang('Saving Data')...
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push(AppConst::PUSH_CSS)
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush
@push(AppConst::PUSH_JS)
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script type="text/javascript">
        addDatePicker()
        Livewire.on('saved', addDatePicker)

        function addDatePicker() {
            $('.datetime').flatpickr({
                enableTime: true,
                allowInput: true,
            });
        }
    </script>
@endpush
