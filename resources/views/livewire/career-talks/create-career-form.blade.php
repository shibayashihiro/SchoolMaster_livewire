<div>
    <div class="row mt-3 mt-md-0">
        <div class="col-12">
            <div class="h4 blue">@lang($title)</div>
        </div>
    </div>
    <div class="row mt-3">
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
                        <form class="mt-3" wire:submit.prevent="">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" wire:model.lazy="fair_name" class="form-control input-field"
                                           placeholder="Name the fair (By default wiil be school name fair)">
                                </div>
                                <div class="col-lg-6 mobile-marg">
                                    <input type="text" wire:model.lazy="start_date" class="form-control input-field datetime"
                                           placeholder="Start Date and Time">
                                </div>
                            </div>
                            @php
                                /**
                                * @var \Illuminate\Database\Eloquent\Collection<\App\Models\Fairs\FairType>$fair_types
                                * @var \App\Models\Institutes\School $school
                                * @var \Illuminate\Database\Eloquent\Collection<\App\Models\General\Major> $majors
                                */
                            @endphp
                            <div class="row mt-3">
                                <div class="col-lg-6">
                                    <select wire:model="type" class="h-100 form-control input-field" aria-label="">
                                        <option value=""> Fair Type</option>
                                        @foreach($fair_types as $fair_type)
                                            <option value="{{$fair_type->id}}">{{$fair_type->fair_type_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-6 mobile-marg">
                                    <input type="text" wire:model.lazy="end_date" class="form-control input-field datetime"
                                           placeholder="Start Date and Time">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-6">
                                    <input type="number" wire:model.lazy="max" class="form-control input-field"
                                           placeholder="Maximum number of attending university">
                                </div>
                                <div class="col-lg-6 mobile-marg">
                                    <input type="number" wire:model.lazy="number_of_halls" class="form-control input-field"
                                           placeholder="Number of Halls">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-12">
                                    <hr>
                                    <div class="h4 blue">@lang('Create Sessions')</div>
                                </div>
                            </div>
                            @for($i = 0;$i<count($sessions);$i++)
                                <div class="row mt-3" wire:key="session-{{ $i }}">
                                    {{--                    <div class="col-lg-1">--}}
                                    {{--                        <input type="text" class="form-control input-field" id="inputPassword2" placeholder=""--}}
                                    {{--                               value="{{$i+1}}" disabled="" readonly="">--}}
                                    {{--                    </div>--}}
                                    <div class="col-lg">
                                        <div class="h-100">
                                            <input type="text" wire:model.defer="sessions.{{$i}}.start_at" class="form-control input-field datetime"
                                                   placeholder="Start Date and Time">
                                        </div>
                                    </div>
                                    <div class="col-lg mobile-marg">
                                        <input type="number" wire:model.defer="sessions.{{$i}}.duration"  class="form-control input-field"  placeholder="@lang('Duration in Mins')">
                                    </div>

                                    <div class="col mobile-marg">
                                        <select wire:model.defer="sessions.{{$i}}.hall_number"   class="h-100 form-control input-field" aria-label="">
                                            <option>@lang('Select Hall')</option>
                                            @for($hall = 1;$hall<=$number_of_halls;$hall++)
                                                <option value="{{$hall}}">{{$hall}}</option>
                                            @endfor
                                        </select>
                                    </div>


                                    <div class="col-lg mobile-marg">
                                        <select wire:model.defer="sessions.{{$i}}.major_id" class="h-100 form-control input-field" aria-label="">
                                            <option>@lang('Select Major')</option>
                                            @foreach($majors as $major)
                                                <option value="{{$major->id}}">{{$major->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-1 text-center">
                                        <button class="btn btn-sm btn-danger" wire:click="removeSession({{$i}})">&times;</button>
                                    </div>
                                </div>
                            @endfor
                            <div class="row mt-2 mb-3">
                                <div class="col-lg-12">
                                    <button wire:click.prevent="addASession"  class="btn btn-blue d-inline-block float-start p-2 mt-2">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                        @lang('Add the Next Session')
                                    </button>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-lg-12">
                                    <hr>
                                    <div class="h4 blue mb-3">@lang('Review and Confirm')</div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-5">
                                    <label class="blue align-center mt-1">@lang('Fair Name'): </label>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" value="{{!empty($fair_name)?$fair_name : $school->school_name}}" disabled=""
                                           readonly="" class="form-control form-control-sm txt2"
                                           aria-label="My Fair">
                                </div>
                            </div>


                            <div class="row mt-3">
                                <div class="col-lg-5">
                                    <label class="blue align-center mt-1">@lang('Fair Date and Time'): </label>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text"
                                           value="{{\Helpers::dayDateTimeFormat($start_date)}} -  {{Helpers::dayDateTimeFormat($end_date)}}"
                                           disabled="" readonly="" class="form-control form-control-sm txt2"
                                           aria-label="My Fair">
                                </div>
                            </div>


                            <div class="row mt-3">
                                <div class="col-lg-5">
                                    <label class="blue align-center mt-1">Location: </label>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" value="{{$school->address1}}" disabled="" readonly=""
                                           class="form-control form-control-sm txt2">
                                </div>
                            </div>


                            <div class="row mt-3">
                                <div class="col-lg-5">
                                    <label class="blue align-center mt-1">@lang('Universities can attend this fair'): </label>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" value="{{$max}}" disabled="" readonly=""
                                           class="form-control form-control-sm txt2"
                                           aria-label="My Fair">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-lg-5">
                                    <label class="blue align-center mt-1">@lang('Number of Halls'): </label>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" value="{{$number_of_halls}}" disabled="" readonly=""
                                           class="form-control form-control-sm txt2"
                                           aria-label="My Fair">
                                </div>
                            </div>


                            <div class="row mt-3">
                                <div class="col-lg-5">
                                    <label class="blue align-center mt-1">@lang('Fair Type'): </label>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" value="{{$fair_types?->where('id',$type)->value('fair_type_name')}}"
                                           disabled="" readonly="" class="form-control form-control-sm txt2" aria-label="My Fair">
                                </div>
                            </div>


                            <div class="row mt-3">
                                <div class="col-lg-5">
                                    <label class="blue align-center mt-1">@lang('Number of Grade 12 Students'):</label>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" value="{{$school->number_grade12}}" disabled=""
                                           class="form-control form-control-sm txt2">
                                </div>
                            </div>


                            <div class="row mt-3">
                                <div class="col-lg-5">
                                    <label class="blue align-center mt-1">@lang('Number of Grade 11 Students'): </label>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" value="{{$school->number_grade11}}" disabled="" readonly=""
                                           class="form-control form-control-sm txt2">
                                </div>
                            </div>


                            <div class="row mt-3">
                                <div class="col-lg-5">
                                    <label class="blue align-center mt-1">@lang('Grade 12 Fee'): </label>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" value="{{$school->fees_grade12}}" disabled="" readonly=""
                                           class="form-control form-control-sm txt2"
                                           aria-label="My Fair">
                                </div>
                            </div>


                            <div class="row mt-3">
                                <div class="col-lg-5">
                                    <label class="blue align-center mt-1">@lang('School Curriculum'): </label>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" value="{{$school->curriculum_id}}" disabled="" readonly=""
                                           class="form-control form-control-sm txt2">
                                </div>
                            </div>


                            <div class="row mt-3">
                                <div class="col-lg-5">
                                    <label class="blue align-center mt-1">@lang('Map Location'): </label>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" value="{{$school->map_link}}" disabled="" readonly=""
                                           class="form-control form-control-sm txt2">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-12">
                                    <div class="text-center">
                                        <button wire:click="save" class="button-dark-blue width-25 button-sm mobile-btn"
                                                wire:loading.attr="disabled">@lang('Save')
                                        </button>
                                        <button wire:click="save({{true}})" class="button-light-blue width-25 button-sm mobile-btn"
                                                wire:loading.attr="disabled">@lang('Save & Close')</button>
                                        <button type="button" class="button-red width-25 button-sm mobile-btn" wire:loading.attr="disabled"
                                                wire:click="resetForm">@lang('Cancel')</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 d-flex justify-content-center">
                                    <div wire:loading.block wire:target="save"><i class="fas fa-spinner fa-pulse"
                                                                                  aria-hidden="true"></i>
                                        @lang('Saving Data')...
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
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
</div>
