<div>
    <div class="row">
        <div class="col-12">
            <div class="h4 blue">@lang('View University Fair') - @lang('Fair Details')</div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="w-100">
                        @php
                            /**
                            * @var \App\Models\Fairs\Fair $fair
                            * @var \App\Models\Institutes\School $school
                            * @var \App\Models\Fairs\FairEditHistory $history
                            */
                        @endphp
                        <div class="row">
                            <div class="col-lg-5">
                                <label class="blue align-center mt-1">@lang('Fair Name'): </label>
                            </div>
                            <div class="col-lg-7">
                                <input type="text"
                                       value="{{!empty($fair->fair_name)?$fair->fair_name : $school->school_name}}"
                                       disabled=""
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
                                       value="{{\Helpers::dayDateTimeFormat($fair->start_date)}} -  {{Helpers::dayDateTimeFormat($fair->end_date)}}"
                                       disabled="" readonly="" class="form-control form-control-sm txt2"
                                       aria-label="My Fair">
                            </div>
                        </div>


                        <div class="row mt-3">
                            <div class="col-lg-5">
                                <label class="blue align-center mt-1">@lang('Location'): </label>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" value="{{$school->address1}}" disabled="" readonly=""
                                       class="form-control form-control-sm txt2">
                            </div>
                        </div>


                        <div class="row mt-3">
                            <div class="col-lg-5">
                                <label class="blue align-center mt-1">@lang('Universities can attend thi
                                                    fair'): </label>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" value="{{$fair->max}}" disabled="" readonly=""
                                       class="form-control form-control-sm txt2"
                                       aria-label="My Fair">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-lg-5">
                                <label class="blue align-center mt-1">@lang('Fair Type'): </label>
                            </div>
                            <div class="col-lg-7">
                                <input type="text"
                                       value="{{$fair->fairType->fair_type_name}}"
                                       disabled="" readonly="" class="form-control form-control-sm txt2"
                                       aria-label="My Fair">
                            </div>
                        </div>


                        <div class="row mt-3">
                            <div class="col-lg-5">
                                <label class="blue align-center mt-1"> @lang('Number of Grade 12
                                                    Students'): </label>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" value="{{$school->number_grade12}}" disabled=""
                                       class="form-control form-control-sm txt2">
                            </div>
                        </div>


                        <div class="row mt-3">
                            <div class="col-lg-5">
                                <label class="blue align-center mt-1">@lang('Number of Grade 11
                                                    Students'): </label>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" value="{{$school->number_grade11}}" disabled=""
                                       readonly=""
                                       class="form-control form-control-sm txt2">
                            </div>
                        </div>


                        <div class="row mt-3">
                            <div class="col-lg-5">
                                <label class="blue align-center mt-1">@lang('Grade 12 Fee'): </label>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" value="{{$school->fees_grade12}}" disabled=""
                                       readonly=""
                                       class="form-control form-control-sm txt2"
                                       aria-label="My Fair">
                            </div>
                        </div>


                        <div class="row mt-3">
                            <div class="col-lg-5">
                                <label class="blue align-center mt-1">@lang('School Curriculums'): </label>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" value="{{$school->curriculum_id}}" disabled=""
                                       readonly=""
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
                        @if($fair->is_editable)
                            <div class="row mt-3">
                                <div class="col-lg-12">
                                    <div class="text-center mt-5">
                                        <a href="{{route('admin.school.career-talk.edit',$fair->id)}}"
                                           class="btn btn-primary w-25 p-2">@lang('Edit Fair')</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="h4 blue">{{$school->school_name}} @lang('Fair History')</div>
        </div>
    </div>
    @foreach($fair->history as $history)
        @php
            $details = $history->details;
        @endphp
        <div class="gray-div p-3 mt-3">
            <div class="row mt-2">
                <div class="p-col">@lang('Fair') {{$details['fair_name'] ?? $school->school_name}}<span
                        class="text-light-blue"> @lang($history->operation_name)</span>
                    @lang('on') {{ Helpers::dayDateTimeFormat($history->created_at)  }}
                </div>
                <div class="text-light-blue mt-1">@lang('Name'): <span
                        class="p-col">{{$details['fair_name'] ?? $school->school_name}}</span>
                </div>
                <div class="text-light-blue">@lang('Fair type'): <span
                        class="p-col">{{$fair_types[$details['type']] ?? '---'}}</span></div>
                <div class="text-light-blue">@lang('Start Date and Time'): <span
                        class="p-col">{{Helpers::dayDateTimeFormat($details['start_date'])}}</span>
                </div>
                <div class="text-light-blue">@lang('End Date and Time'): <span
                        class="p-col">{{Helpers::dayDateTimeFormat($details['end_date'])}}</span>
                </div>
                <div class="text-light-blue">@lang('Number of universities can attend'): <span
                        class="p-col">{{$details['max']}}</span>
                </div>
            </div>
        </div>
    @endforeach
</div>
