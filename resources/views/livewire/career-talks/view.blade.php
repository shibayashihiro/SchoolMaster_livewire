<div>
    <div class="row">
        <div class="col-12">
            <div class="h4 blue">@lang('View Career Talk')
                - @lang('Fair Details')</div>
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
                            * @var \App\Models\Fairs\FairSession $session
                            */
                        @endphp
                        <div class="mt-3">
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
                                    <label class="blue align-center mt-1">@lang('Fair Date and Time')
                                        : </label>
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
                                    <label class="blue align-center mt-1">@lang('Number of Halls'): </label>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" value="{{$fair->number_of_halls}}" disabled=""
                                           readonly=""
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
                                    <label class="blue align-center mt-1">@lang('School Curriculums')
                                        : </label>
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
                        </div>

                        <div class="row mt-3">
                            <div class="col-lg-12">
                                <hr>
                                <div class="h4 blue">@lang('Create Sessions')</div>
                            </div>
                        </div>
                        @forelse($fair->sessions as $session )
                            <div class="row mt-3">
                                <div class="col-lg-1">
                                    <input type="text" class="form-control input-field" id="inputPassword2"
                                           placeholder=""
                                           value="{{$loop->iteration}}" disabled="" readonly="">
                                </div>
                                <div class="col-lg">
                                    <div class="h-100">
                                        <input type="text"
                                               value="{{$session->start_at}}"
                                               class="form-control input-field datetime"
                                               readonly disabled>
                                    </div>
                                </div>
                                <div class="col">
                                    <input type="text"
                                           value="{{$session->duration}} {{Str::plural('Min',$session->duration)}}"
                                           class="form-control input-field datetime"
                                           readonly disabled>
                                </div>

                                <div class="col">
                                    <input type="text"
                                           value="{{$session->hall_number}}"
                                           class="form-control input-field datetime"
                                           readonly disabled>
                                </div>


                                <div class="col">
                                    <input type="text"
                                           value="{{$session->major->title}}"
                                           class="form-control input-field datetime"
                                           readonly disabled>
                                </div>
                            </div>
                        @empty
                            <div class="row mt-3">
                                <div class="col-12 text-center text-secondary">No Sessions Added.</div>
                            </div>
                        @endforelse
                        @if($fair->is_editable)
                            <div class="row mt-3">
                                <div class="col-lg-12">
                                    <div class="text-center mt-5">
                                        <a href="{{route('admin.school.career-talk.edit',$fair->id)}}"
                                           class="btn btn-primary w-25 p-2">@lang('Edit Career Talk')</a>
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
                <div class="text-light-blue">@lang('Number of Halls'): <span
                        class="p-col">{{$details['number_of_halls']}}</span>
                </div>
                @if(!empty($details['sessions']))
                    @php
                        $major_ids = collect($details['sessions'])->pluck('major_id')->toArray();
                        $majors = \App\Models\General\Major::whereIn('id',$major_ids)->pluck('title','id')->toArray();
                    @endphp
                    <div class="secondary-text">@lang('Sessions'):</div>
                    <div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="secondary-text">#</th>
                                <th class="secondary-text">@lang('Start At')</th>
                                <th class="secondary-text">@lang('Duration')</th>
                                <th class="secondary-text">@lang('Hall Number')</th>
                                <th class="secondary-text">@lang('Major')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($details['sessions'] as $detail)
                                <tr>
                                    <td class="p-col">{{$loop->iteration}}</td>
                                    <td class="p-col">{{$detail['start_at']}}</td>
                                    <td class="p-col">{{$detail['duration']}} {{Str::plural('Min',$detail['duration'])}}</td>
                                    <td class="p-col">{{$detail['hall_number']}}</td>
                                    <td class="p-col">{{$majors[$detail['major_id']] ?? '---'}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    @endforeach
</div>
