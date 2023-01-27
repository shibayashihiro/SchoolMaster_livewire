<div class="mt-5">
    <section class="mb-4">
        <h2 class="h2 blue">@lang('Latest Events and Updates')</h2>
        <p class="paragraph-style1 gray font-normal mt-3">@lang('Monitor students registration, applications,
            transactions with universities, enrollments and more')</p>
    </section>
    <div class="row">
        @php
            /**
            * @var  \App\Models\Fairs\Fair[] $fairs
            * @var \App\Models\University\UniversityEvent $uni_event
            **/
            $school = Auth::user()->selected_school;
        @endphp
        @foreach($fairs as $fair)
            <div @class(['col-12', 'mt-2'=>!$loop->first])>
                <div class="card">
                    <div class="p-3">
                        <div class="d-flex justify-content-between">
                            <div class="col-sm-7 col-md-9 align-self-center">
                                <p class="paragraph-style1 blue">{{$fair->eventType?->name}}: {{$fair->fair_name ?? $school->school_name}}</p>
                            </div>
                            <div class="col-md-2 col-sm-3 text-end paragraph-style1 blue align-self-center">{{Helpers::dayDateTimeFormat($fair->start_date)}}</div>
                            <div class="col-md-1 col-sm-2 align-self-center"><h4 class="light-blue text-end"><i
                                        class="fa-solid fa-angle-right mt-2"></i></h4></div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        @foreach($university_events as $uni_event)
            <div @class(['col-12', 'mt-2'=>!$loop->first])>
                <div class="card">
                    <div class="p-3">
                        <div class="d-flex justify-content-between">
                            <div class="col-sm-7 col-md-9 align-self-center">
                                <p class="paragraph-style1 blue">{{$uni_event->type->title}}: {{$uni_event?->title ?? $uni_event->university?->university_name}}</p>
                            </div>
                            <div class="col-md-2 col-sm-3 text-end paragraph-style1 blue align-self-center">{{Helpers::dayDateTimeFormat($uni_event->start_datetime)}}</div>
                            <div class="col-md-1 col-sm-2 align-self-center"><h4 class="light-blue text-end"><i
                                        class="fa-solid fa-angle-right mt-2"></i></h4></div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
