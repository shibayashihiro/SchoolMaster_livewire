<div class="col mobile-hidden ps-0">
    <div class="card">
        <div class="card-body">
            <h5 class="h5 blue">@lang('School Menu')</h5>
            <h6 class="h6 gray">@lang('Manage school detail')</h6>
            <hr>
            <ul class="sidebar-ul">
                @foreach ($routes as $count => $route)
                    <li @class(['mb-2'])>
                        <a class="a-underline blue @if ($tab == $route['name'] && $is_on_page) light-blue disabled @endif"
                           onclick="changeSchoolInfoTab('{{ $route['name'] }}')" href="javascript:void(0)">
                            {{ __($route['title']) }}
                        </a>
                    </li>
                @endforeach
                <li class="">
                    <a @class(['a-underline blue','light-blue disabled'=>Route::is('admin.school.newBranch')])
                       href="{{route('admin.school.newBranch')}}"> @lang('School New Branch')
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-body">
            <h5 class="h5 blue">@lang('Profile Menu')</h5>
            <h6 class="h6 gray">@lang('Counselor profile account setting')</h6>
            <hr>
            <ul class="sidebar-ul">
                @foreach ($profileroutes as $count => $route)
                    <li @class(['mb-2'])>
                        <a class="a-underline blue @if ($tab == $route['name'] && $is_on_page) light-blue disabled @endif"
                           onclick="changeSchoolInfoTab('{{ $route['name'] }}')" href="javascript:void(0)">
                            {{ __($route['title']) }}
                        </a>
                    </li>
                @endforeach
                    <li class=""><a
                            @class(['a-underline blue','light-blue' => Route::is('admin.sessions')])
                            href="{{route('admin.sessions')}}">@lang("Where you're signed in")</a></li>
            </ul>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-body">
            <h5 class="h5 blue">@lang('Students Applications') </h5>
            <h6 class="h6 gray">@lang('Manage students Applications')</h6>
            <hr>
            <ul class="sidebar-ul">
                <li class="mb-2"><a
                        @class(['a-underline blue','light-blue' => Route::is('admin.school.students.application.list')])
                        href="{{route('admin.school.students.application.list')}}">@lang('Applications List')</a></li>
                <li><a class="a-underline blue" href="#">Recommendations Letters</a></li>
            </ul>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-body">
            <h5 class="h5 blue">@lang('My Students')</h5>
            <h6 class="h6 gray">@lang('Manage students registration')</h6>
            <hr>
            <ul class="sidebar-ul">
                <li class="mb-2"><a @class(['a-underline blue','light-blue' => Route::is('admin.school.students.list')])
                                    href="{{route('admin.school.students.list')}}">@lang('My Students')</a></li>
                <li class="mb-2"><a @class(['a-underline blue','light-blue' => Route::is('admin.school.students.add')])
                                    href="{{route('admin.school.students.add')}}">@lang('Add New Student')</a></li>
                <li class="mb-2"><a
                        @class(['a-underline blue','light-blue' => Route::is('admin.school.students.addBulk')])
                        href="{{route('admin.school.students.addBulk')}}">@lang('Add Bulk Students')</a></li>
                <li class="mb-2"><a
                        @class(['a-underline blue','light-blue' => Route::is('admin.school.students.registartion.link')])
                        href="{{route('admin.school.students.registartion.link')}}">@lang('Registration Link')</a></li>
                <li><a @class(['a-underline blue','light-blue' => Route::is('admin.school.students.registartion.qr')])
                       href="{{route('admin.school.students.registartion.qr')}}">@lang('Registration QR Code')</a></li>
            </ul>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-body">
            <h5 class="h5 blue">@lang('Counselor Support')</h5>
            <h6 class="h6 gray">@lang('Development and Support Center')</h6>
            <hr>
            <ul class="sidebar-ul">
                <li class="mb-2"><a @class(['a-underline blue','light-blue' => Route::is('admin.counselor.workshops')])
                                    href="{{route('admin.counselor.workshops')}}">@lang('Courses')</a></li>
                <li class="mb-2"><a @class(['a-underline blue','light-blue' => Route::is('admin.counselor.courses')])
                                    href="{{route('admin.counselor.courses')}}">@lang('Workshops')</a></li>
                <li class="mb-2"><a @class(['a-underline blue','light-blue' => Route::is('admin.counselor.events')])
                                    href="{{route('admin.counselor.events')}}">@lang('Events')</a></li>
                <li class="mb-2"><a
                        @class(['a-underline blue','light-blue' => Route::is('admin.counselor.conferences')])
                        href="{{route('admin.counselor.conferences')}}">@lang('Conferences')</a></li>
                <li class="mb-2"><a
                        @class(['a-underline blue','light-blue' => Route::is('admin.counselor.international')])
                        href="{{route('admin.counselor.international')}}">@lang('International Trips')</a></li>
                <li><a @class(['a-underline blue','light-blue' => Route::is('admin.counselor.visits')])
                       href="{{route('admin.counselor.visits')}}">@lang('University Visit')</a></li>
            </ul>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-body">
            <h5 class="h5 blue">@lang('School SM Credit')</h5>
            <h6 class="h6 gray">@lang('Earn SM credit from every activity')</h6>
            <hr>
            <ul class="sidebar-ul">
                <li class="mb-2"><a @class(['a-underline blue','light-blue' => Route::is('admin.school.schoolPoints.creditDetail')])
                                    href="{{route('admin.school.schoolPoints.creditDetail')}}">@lang('SM credit overview')</a></li>
                <li class="mb-2"><a @class(['a-underline blue','light-blue' => Route::is('admin.school.schoolPoints.schoolActivity')])
                                    href="{{route('admin.school.schoolPoints.schoolActivity')}}">@lang('School activity SM credit')</a></li>
                <li class="mb-2"><a @class(['a-underline blue','light-blue' => Route::is('admin.school.schoolPoints.universityActivity')])
                                    href="{{route('admin.school.schoolPoints.universityActivity')}}">@lang('University activity SM')</a></li>
                <li class="mb-2"><a @class(['a-underline blue','light-blue' => Route::is('admin.school.schoolPoints.studentActivity')])
                                    href="{{route('admin.school.schoolPoints.studentActivity')}}">@lang('Student activity SM credit')</a></li>
                <li class="mb-2"><a @class(['a-underline blue','light-blue' => Route::is('admin.school.schoolPoints.convertCredit')])
                                    href="{{route('admin.school.schoolPoints.convertCredit')}}">@lang('Convert SM credit')</a></li>
                <li class="mb-2"><a @class(['a-underline blue','light-blue' => Route::is('admin.school.schoolPoints.creditHistory')])
                                    href="{{route('admin.school.schoolPoints.creditHistory')}}">@lang('SM credit History')</a></li>
            </ul>
        </div>
    </div>

    @push(AppConst::PUSH_JS)
        <script type="text/javascript">

            function changeSchoolInfoTab(tab_name) {
                let on_page = '{{$is_on_page}}';
                let base_url = '{{route('admin.school.information', false)}}';
                if (!on_page) {
                    return window.location = `${base_url}?t=${tab_name}`
                }
                Livewire.emit('schoolInfoTabChanged', tab_name);
                changeActiveLink();
            }

            function changeActiveLink() {
                tablinks = document.getElementsByClassName("a-underline");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace("light-blue disabled", "");
                }
                event.currentTarget.className += " light-blue disabled";
            }
        </script>
    @endpush
</div>
