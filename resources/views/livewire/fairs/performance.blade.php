<div>
@push(AppConst::PUSH_CSS)
        <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=63b698813d4c89001a1d4d9a&product=inline-share-buttons' async='async'></script>
@endpush
    @php
    /**@var \App\Models\Fairs\Fair $fair*/
    @endphp
    <div class="mt-3 mb-3">
        <div class="d-flex justify-content-between">
            <div class="h4 blue d-flex">
                {{ $fair->fair_name ?? $fair->school->school_name }}
                <div class="blue sharethis-inline-share-buttons ms-2"><i class="fa-solid fa-share-nodes tab_title"></i></div>
            </div>
            <div class="d-flex col-lg-6 justify-content-end">
                <div class="blue text-place-end">{{\Carbon\Carbon::parse($fair->start_date)->toDayDateTimeString()}}</div>
            </div>
        </div>
        <div class="d-flex justify-content-between">
            <div class="blue">{{$fair->eventType->name}} , {{$fair->fairType->fair_type_name}}</div>
            <div class="blue">{{$fair->school->address1}}</div>
        </div>
        <p class="paragraph-style2 blue font-normal mt-2">{{$fair->description}}</p>
        <div class="h4 blue mt-3">{{__('Event Statistics')}}</div>
    </div>
    <div class="row g-2">
        <!--to force new line-->
        <div class="col-lg-3 col-md-4">
            <div class="card">
                <div class="p-3">
                    <div class="row">
                        <h5 class="h5 blue">{{__('Universities Attended')}}</h5>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6">
                            <h3 class="h2 blue">{{$fair->arrived_universities_count}}</h3>
                        </div>
                        <div class="col-6">
                            <h4 class="h4 light-blue text-end"><i class="fa-solid fa-angle-right"></i></h4>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <p class="blue paragraph-style2">{{$fair->invitation_count}} {{__('universities were invited')}}</p>
                    </div>
                    <div class="row mt-2">
                        <p class="blue paragraph-style2">{{$fair->arrived_universities_count}} {{__('universities attended')}}</p>
                    </div>
                </div>
            </div>
        </div>
        <!--to force new line-->
        <div class="col-lg-3 col-md-4">
            <div class="card">
                <div class="p-3">
                    <div class="row">
                        <h5 class="h5 blue">@lang('Students')</h5>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6">
                            <h3 class="h2 blue">{{$fair->attendance_count}}</h3>
                        </div>
                        <div class="col-6">
                            <h4 class="h4 light-blue text-end"><i class="fa-solid fa-angle-right"></i></h4>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <p class="blue paragraph-style2">{{$school_students_count}} @lang('students were invited')</p>
                    </div>
                    <div class="row mt-2">
                        <p class="blue paragraph-style2">{{$fair->attendance_count}} @lang('students attended')</p>
                    </div>
                </div>
            </div>
        </div>
        <!--to force new line-->
        <div class="col-lg-3 col-md-4">
            <div class="card">
                <div class="p-3">
                    <div class="row">
                        <h5 class="h5 blue">{{__('Selected Destinations')}}</h5>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6">
                            <h3 class="h2 blue">{{$stats['destinations']['selected_count']}}</h3>
                        </div>
                        <div class="col-6">
                            <h4 class="h4 light-blue text-end"><i class="fa-solid fa-angle-right"></i></h4>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <p class="blue paragraph-style2">{{$stats['destinations']['selected_count']}} {{__('destinations were selected')}}</p>
                    </div>
                    <div class="row mt-2">
                        <p class="blue paragraph-style2">{{$stats['destinations']['students_not_select']}} {{__("students didn't select")}}</p>
                    </div>
                </div>
            </div>
        </div>
        <!--to force new line-->
        <div class="col-lg-3 col-md-4">
            <div class="card">
                <div class="p-3">
                    <div class="row">
                        <h5 class="h5 blue">{{__('Selected Universities')}}</h5>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6">
                            <h3 class="h2 blue">{{$stats['universities']['selected_count']}}</h3>
                        </div>
                        <div class="col-6">
                            <h4 class="h4 light-blue text-end"><i class="fa-solid fa-angle-right"></i></h4>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <p class="blue paragraph-style2">{{$stats['universities']['selected_count']}} {{__('universities were selected')}}</p>
                    </div>
                    <div class="row mt-2">
                        <p class="blue paragraph-style2">{{$stats['universities']['students_not_select']}} {{__("students didn't select")}}</p>
                    </div>
                </div>
            </div>
        </div>
        <!--to force new line-->
        <div class="col-lg-3 col-md-4">
            <div class="card">
                <div class="p-3">
                    <div class="row">
                        <h5 class="h5 blue">{{__('Selected Majors')}}</h5>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6">
                            <h3 class="h2 blue">{{$stats['majors']['selected_count']}}</h3>
                        </div>
                        <div class="col-6">
                            <h4 class="h4 light-blue text-end"><i class="fa-solid fa-angle-right"></i></h4>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <p class="blue paragraph-style2">{{$stats['majors']['selected_count']}} {{__('majors were selected')}}</p>
                    </div>
                    <div class="row mt-2">
                        <p class="blue paragraph-style2">{{$stats['majors']['students_not_select']}} {{__("students didn't select")}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4">
            <div class="card">
                <div class="p-3">
                    <div class="row">
                        <h5 class="h5 blue">{{__('Performance')}}</h5>
                    </div>

                    @php
                        $percentage = 0;
                        $not_registered = 0;
                        $event_rank = 'Not Good';
                        if ($school_students_count > 0){
                            $percentage = ($fair->attendance_count * 100)/$school_students_count;
                            $not_registered = $school_students_count - $fair->attendance_count;
                        }

                        if ($percentage >= 80){
                            $event_rank = 'Excellent';
                        }elseif ($percentage >= 70 ){
                            $event_rank = 'Good';
                        }elseif ($percentage >= 50 ){
                            $event_rank = 'Average';
                        }elseif ($percentage >= 30 ){
                            $event_rank = 'Below Average';
                        }

                    @endphp
                    <div class="row mt-2">
                        <div class="col">
                            <h3 class="h2 blue">{{__($event_rank)}}</h3>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <p class="blue paragraph-style2">{{$percentage}}% {{__('of total the')}} {{$school_students_count}} {{__('students')}}</p>
                    </div>
                    <div class="row mt-2">
                        <p class="blue paragraph-style2">{{$not_registered}} {{__('students did not register')}}</p>
                    </div>
                </div>
            </div>
        </div>
        <!--to force new line-->
        <div class="col-lg-3 col-md-4">
            <div class="card">
                <div class="p-3">
                    <div class="row">
                        <h5 class="h5 blue">@lang('Rated')</h5>
                    </div>
                    @if($rating_stars < 1)
                    <div class="row mt-2">
                        <div class="col">
                            <h3 class="h2 blue">{{__('No Ratings')}}</h3>
                        </div>
                    </div>
                    @else
                    <div class="row mt-4">
                        <div class="col mt-2">
                            <div class=" paragraph-style1 d-flex">

                                @for($i=1; $i<=$rating_stars;$i++ )
                                <span class="fa fa-star checked" aria-hidden="true"></span>
                                @endfor
                            </div>
                        </div>
                    </div>

                    @endif
                    <div class="row mt-4">
                        <p class="blue paragraph-style2 mt-2">Rated by {{$fair->rated_by_count}} Users</p>
                    </div>
                </div>
            </div>
        </div>
        <!--to force new line-->
        <div class="col-lg-3 col-md-4">
            <div class="card">
                <div class="p-3">
                    <div class="row">
                        <h5 class="h5 blue">{{__('QR Code Scanned')}}</h5>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6">
                            <h3 class="h2 blue">{{$fair->attendance_count}}</h3>
                        </div>
                        <div class="col-6">
                            <h4 class="h4 light-blue text-end"><i class="fa-solid fa-angle-right"></i></h4>
                        </div>
                    </div>
                    @php
                    $avg = $fair->arrived_universities_count > 0 ? ($fair->attendance_count/$fair->arrived_universities_count) * 100:0;
                    $not_scanned = $school_students_count - $fair->attendance_count;
                    @endphp
                    <div class="row mt-2">
                        <p class="blue paragraph-style2">{{$avg}} @lang('times Average scanned')</p>
                    </div>
                    <div class="row mt-2">
                        <p class="blue paragraph-style2">{{$not_scanned}} @lang("Students didn't offer to scan")</p>
                    </div>
                </div>
            </div>
        </div>
        <!--to force new line-->
        <div class="col-lg-3 col-md-4">
            <div class="card">
                <div class="p-3">
                    <div class="row">
                        <h5 class="h5 blue">@lang('Applications')</h5>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6">
                            <h3 class="h2 blue">0</h3>
                        </div>
                        <div class="col-6">
                            <h4 class="h4 light-blue text-end"><i class="fa-solid fa-angle-right"></i></h4>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <p class="blue paragraph-style2">@lang('Average connection per student') 0</p>
                    </div>
                    <div class="row mt-2">
                        <p class="blue paragraph-style2">@lang('students did not register')</p>
                    </div>
                </div>
            </div>
        </div>
        <!--to force new line-->
        <div class="col-lg-3 col-md-4">
            <div class="card">
                <div class="p-3">
                    <div class="row">
                        <h5 class="h5 blue">@lang('Credit Earned')</h5>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6">
                            <h3 class="h2 blue">{{$sm_credit['earned']}}</h3>
                        </div>
                        <div class="col-6">
                            <h4 class="h4 light-blue text-end"><i class="fa-solid fa-angle-right"></i></h4>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <p class="blue paragraph-style2">{{$sm_credit['event_transactions']}} @lang('Event transaction')</p>
                    </div>
                    <div class="row mt-2">
                        <p class="blue paragraph-style2">{{$sm_credit['student_transactions']}} @lang('Student transaction')</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="h4 blue mt-5">@lang('Event Performance')</div>
    <p class="paragraph-style2 blue mt-3">@lang('Event Performance based on each university rating')</p>
    <div>
        <div>
            @php
            /**
            * @var \App\Models\Institutes\University $university;
            **/
            @endphp
            @foreach($arrived_universities as $university)
            <div class="card mt-4">
                <div class="p-2">
                    <div class="d-flex justify-content-between">
                        <div class="col-sm-2 col-md-1">
                            <img src="{{$university->logo_url}}" class="university-imge2" alt="logo">
                        </div>
                        <div class="ms-1 col-sm-7 col-md-9 align-self-stretch row">
                            <div class="h5 blue mt-1">{{$university->university_name}}</div>
                            <p class="paragraph-style1 light-blue align-self-end">
                                @lang("Student's QR code scanned by representative:") {{$university->leads_count}}
                            </p>
                        </div>
                        <div class="col-sm-2 text-end light-blue row  align-self-center">
                            <div class="h5 blue text-center ps-2">@lang('Event Rating')</div>
                            <div class="paragraph-style1 d-flex justify-content-end mt-1">
                                <span class="fa fa-star checked ms-1" aria-hidden="true"></span>
                                <span class="fa fa-star checked ms-1" aria-hidden="true"></span>
                                <span class="fa fa-star checked ms-1" aria-hidden="true"></span>
                                <span class="fa fa-star checked ms-1" aria-hidden="true"></span>
                                <span class="fa fa-star checked ms-1" aria-hidden="true"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-between align-items-center flex-wrap my-2 small5">
            <label class="blue paragraph-style2">
                {{$fair->arrived_universities_count}} @lang('representative arrived')
                {{$fair->arrived_universities_count}} @lang("didn't show up")</label>
        </div>
        <div class="mt-5">
            {!! $arrived_universities->links() !!}
        </div>
    </div>
</div>
