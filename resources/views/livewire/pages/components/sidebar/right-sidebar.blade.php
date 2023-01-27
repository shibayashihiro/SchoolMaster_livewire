<div class="col mobile-hidden pe-0">
    <div class="card">
        <div class="card-body">
            <h5 class="h5 blue">@lang('Notifications')</h5>
            <h6 class="h6 gray">@lang('Stay in touch, Stay connected')</h6>
            <hr>
            <ul class="sidebar-ul">
                <li class="mb-2"><a @class(['a-underline blue','light-blue' => Route::is('admin.notification.studentInquiries')])
                                    href="{{route('admin.notification.studentInquiries')}}">@lang('Students inquiries')</a>
                    <span class="badge rounded-pill bg-danger align-right float-end">14</span>
                </li>
                <li class="mb-2"><a @class(['a-underline blue','light-blue' => Route::is('admin.notification.messages')])
                                    href="{{route('admin.notification.messages')}}">@lang('Messages')</a>
                    <span class="badge rounded-pill bg-danger align-right float-end">14</span>
                </li>
                <li class="mb-2"><a @class(['a-underline blue','light-blue' => Route::is('admin.notification.newEvents')])
                                    href="{{route('admin.notification.messages')}}">@lang('New Events')</a>
                    <span class="badge rounded-pill bg-danger align-right float-end">15</span>
                </li>
                <li class="mb-2"><a @class(['a-underline blue','light-blue' => Route::is('admin.notification.studentChat')])
                                    href="{{route('admin.notification.studentChat')}}">@lang('Students Chats')</a>
                    <span class="badge rounded-pill bg-danger align-right float-end">7</span>
                </li>
                <li class="mb-2"><a @class(['a-underline blue','light-blue' => Route::is('admin.notification.application')])
                                    href="{{route('admin.notification.application')}}">@lang('Application')</a>
                    <span class="badge rounded-pill bg-danger align-right float-end">5</span>
                </li>
                <li class="mb-2"><a @class(['a-underline blue','light-blue' => Route::is('admin.notification.schedule')])
                                    href="{{route('admin.notification.schedule')}}">@lang('My Schedule')</a>
                    <span class="badge rounded-pill bg-danger align-right float-end">5</span>
                </li>
                <li><a @class(['a-underline blue','light-blue' => Route::is('admin.calander')])
                       href="{{route('admin.calander')}}">@lang('My Calendar')
                    </a>
                    <span class="badge rounded-pill bg-danger align-right float-end">5</span>
                </li>
            </ul>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-body">
            <h5 class="h5 blue">@lang('Create an Event')</h5>
            <h6 class="h6 gray">@lang('Create and manage events')</h6>
            <hr>
            <ul class="sidebar-ul">
                <li class="mb-2"><a @class(['a-underline blue','light-blue' => Route::is('admin.school.fair.list')])
                                    href="{{route('admin.school.fair.list')}}">@lang('University Fair')</a></li>
                <li class="mb-2"><a @class(['a-underline blue','light-blue' => Route::is('admin.school.career-talk.list')])
                                    href="{{route('admin.school.career-talk.list')}}">@lang('Career Talk')</a></li>
                <li class="mb-2"><a @class(['a-underline blue','light-blue' => Route::is('admin.school.requestMeeting')])
                                    href="{{route('admin.school.requestMeeting')}}" title="*S2U: School to University">@lang('Request a Meeting S2U')</a></li>
                <li class="mb-2"><a @class(['a-underline blue','light-blue' => Route::is('admin.school.requestPresentation')])
                                    href="{{route('admin.school.requestPresentation')}}" title="*U2S: University to School">@lang('Request For Presentation U2S')</a></li>
                <li class="mb-2"><a @class(['a-underline blue','light-blue' => Route::is('admin.school.sponsoredEvents')])
                        href="{{route('admin.school.sponsoredEvents')}}">@lang('Request Event Sponsor')</a></li>
                <li ><a @class(['a-underline blue','light-blue' => Route::is('admin.school.studentTour.list')])
                        href="{{route('admin.school.studentTour.list')}}">@lang('Student Tour')</a></li>
            </ul>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-body">
            <h5 class="h5 blue">@lang('Join Events')</h5>
            <h6 class="h6 gray">@lang('Find & join Universities events')</h6>
            <hr>
            <ul class="sidebar-ul">
                <li class="mb-2">
                    <a @class(['a-underline blue','light-blue' => Route::is('admin.school.tours.show')])
                                    href="{{route('admin.school.tours.show')}}">@lang('Internation Tours Visit List')
                    </a>
                </li>
                <li class="mb-2"><a @class(['a-underline blue','light-blue' => Route::is('admin.school.join.universityEvents.openDay')])
                                    href="{{route('admin.school.join.universityEvents.openDay')}}">@lang('Open day')</a></li>
                <li class="mb-2"><a class="a-underline blue" href="javascript:void(0)">@lang('Workshop')</a></li>
                <li class="mb-2"><a class="a-underline blue" href="javascript:void(0)">@lang('Student for a day')</a></li>
                <li class="mb-2"><a @class(['a-underline blue','light-blue' => Route::is('admin.school.join.studentTour.show')])
                                    href="{{route('admin.school.join.studentTour.show')}}">@lang('Student tour')</a></li>
                <li class="mb-2"><a class="a-underline blue" href="javascript:void(0)">@lang('Competition')</a></li>
                <li class="mb-2"><a @class(['a-underline blue','light-blue' => Route::is('admin.university.list')])
                                    href="{{route('admin.university.list')}}">@lang('Universities List')</a></li>
                <li><a @class(['a-underline blue','light-blue' => Route::is('admin.school.join.u2c-meetings.show')])
                       href="{{route('admin.school.join.u2c-meetings.show')}}">@lang('One to One Meeting')</a></li>
            </ul>
        </div>
    </div>
    {{--TODO:--}}
    <div class="card mt-3">
        <div class="card-body">
            <h5 class="h5 blue">Support</h5>
            <h6 class="h6 gray">We are here to help</h6>
            <hr>
            <ul class="sidebar-ul">
                <li class="mb-2"><a class="a-underline blue active" href="javascript:void(0)">Creat a ticket</a></li>
                <li class="mb-2"><a class="a-underline blue" href="javascript:void(0)">Request Call Back</a></li>
                <li><a class="a-underline blue" href="javascript:void(0)">Chat with us</a></li>
            </ul>
        </div>
    </div>
    {{--ENDTODO--}}
    <div class="card mt-3">
        <div class="card-body">
            <h5 class="h5 blue">@lang('Share & Suggest')</h5>
            <h6 class="h6 gray">@lang('Invite Colleagues, & Universities')</h6>
            <hr>
            <ul class="sidebar-ul" x-data="{}">
                @foreach(['school','university'] as $type)
                <li class="mb-2"><a @class(['a-underline blue']) @click="$wire.emit('openInvitationModal','{{$type}}')"
                                    href="javascript:void(0)">
                        @lang("Suggest ".ucfirst($type))</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
