<div class="container d-flex align-items-center top-menu-container mb-4">
    <!-- Example single danger button -->
    <div class="dropdown menu-item">
        <a class="btn dropdown-toggle" href="#" role="button"  data-bs-toggle="dropdown"
           aria-expanded="false">
            @lang('Dashboard')
        </a>

        <ul class="dropdown-menu1 shadow-sm dropdown-menu dropdown-menu-header" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item font-1 font-light" href="{{route('admin.dashboard')}}">
                    @lang('Home Page')</a></li>
            <div class="dropdown-divider"></div>
            <li><a class="dropdown-item font-1 font-light" href="{{route('admin.school.statistics.show')}}">
                    @lang('Statistics and Analysis')</a></li>
            <div class="dropdown-divider"></div>
            <li>
                <div class="pt-3  font-1 font-normal">
                    @lang('School account')</div>
            </li>
            <li>
                <div class="font-light gray">
                    @lang('Manage School Detail')</div>
            </li>
            <li><a class="dropdown-item font-light pt-3 font-1" href="{{route('admin.school.information')}}?t=basic_info">
                    @lang('School Basic Info')</a></li>
            <div class="dropdown-divider"></div>
            <li><a class="dropdown-item font-1 font-light" href="{{route('admin.school.information')}}?t=student_info">
                    @lang('Schools Students')</a></li>
            <div class="dropdown-divider"></div>
            <li><a class="dropdown-item font-1 font-light" href="{{route('admin.school.information')}}?t=location_info">
                    @lang('Location and branches')</a></li>
            <div class="dropdown-divider"></div>
            <li>
                <div class="font-1 pt-3 font-normal">
                    @lang('School Counselor Profile')</div>
            </li>
            <li>
                <div class="font-light gray">
                    @lang('Counselor Profile account setting')</div>
            </li>
            <li><a class="dropdown-item pt-3 font-1 font-light" href="#">
                    @lang('Primary Email address')</a></li>
            <div class="dropdown-divider"></div>
            <li><a class="dropdown-item font-1 font-light" href="#">
                    @lang('Phone numbers')</a></li>
            <div class="dropdown-divider"></div>
            <li><a class="dropdown-item font-1 font-light" href="#">
                    @lang('Change Password')</a></li>
            <div class="dropdown-divider"></div>
            <li>
                <div class="font-1 pt-3 font-normal">
                    @lang('Counselor Support')</div>
            </li>
            <li>
                <div class="font-light gray">
                    @lang('Development and support center')</div>
            </li>
            <li><a class="dropdown-item font-1 pt-3 font-light" href="{{route('admin.counselor.courses')}}">
                    @lang('Courses')</a></li>
            <div class="dropdown-divider"></div>
            <li><a class="dropdown-item font-1 font-light" href="{{route('admin.counselor.workshops')}}">
                    @lang('Workshops')</a></li>
            <div class="dropdown-divider"></div>
            <li><a class="dropdown-item font-1 font-light" href="{{route('admin.counselor.events')}}">
                    @lang('Events')</a></li>
            <div class="dropdown-divider"></div>
            <li><a class="dropdown-item font-1 font-light" href="{{route('admin.counselor.international')}}">
                    @lang('International Trips')</a></li>
            <li><a class="dropdown-item font-1 font-light" href="{{route('admin.counselor.conferences')}}">
                    @lang('Conferences')</a></li>
            <div class="dropdown-divider"></div>
{{--            <li><a class="dropdown-item font-1 font-light" href="{{route('admin.counselor.trips')}}">--}}
{{--                    @lang('Trips')</a></li>--}}
            <div class="dropdown-divider"></div>
            <li><a class="dropdown-item font-1 font-light" href="{{route('admin.counselor.visits')}}">
                    @lang('Visits')</a></li>
        </ul>
    </div>
    <div class="dropdown  menu-item">
        <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
           aria-expanded="false">
            School
        </a>

        <ul class="dropdown-menu shadow-sm  dropdown-menu-header dropdown-menu2" aria-labelledby="dropdownMenuLink">
            <li>
                <div class="font-1 font-normal">
                    @lang('Create an Event')</div>
            </li>
            <li>
                <div class="font-light gray">
                    @lang('Create and manage events')</div>
            </li>
            <li><a class="dropdown-item font-light pt-3 font-1" href="{{route('admin.school.fair.list')}}">
                    @lang('University Fair')</a></li>
            <div class="dropdown-divider"></div>
            <li><a class="dropdown-item font-1 font-light" href="{{route('admin.school.career-talk.list')}}">
                    @lang('Career Talk')</a></li>
            <div class="dropdown-divider"></div>
            <li><a class="dropdown-item font-1 font-light" href="{{route('admin.school.requestMeeting')}}">
                    @lang('Request a Meeting S2U')</a></li>
            <div class="dropdown-divider"></div>
            <li><a class="dropdown-item font-1 font-light" href="{{route('admin.school.requestPresentation')}}">
                    @lang('Request For Presentation')</a></li>
            <div class="dropdown-divider"></div>
            <li><a class="dropdown-item font-1 font-light" href="{{route('admin.school.sponsoredEvents')}}">
                    @lang('Request Event Sponsor')</a></li>
            <div class="dropdown-divider"></div>
            <li><a class="dropdown-item font-1 font-light" href="{{route('admin.school.studentTour.list')}}">
                    @lang('Student Tour')</a></li>
{{--            <div class="dropdown-divider"></div>--}}

{{--            <li>--}}
{{--                <div class="pt-3 font-1 font-normal">--}}
{{--                    @lang('Join Events')</div>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <div class="font-light gray">--}}
{{--                    @lang('Find and join events')</div>--}}
{{--            </li>--}}
{{--            <li><a class="dropdown-item pt-3 font-1 font-light" href="{{route('admin.school.join.universityEvents.openDay')}}">--}}
{{--                    @lang('University Open day')</a></li>--}}
{{--            <div class="dropdown-divider"></div>--}}
{{--            <li><a class="dropdown-item font-1 font-light" href="#">--}}
{{--                    @lang('Workshops')</a></li>--}}
{{--            <div class="dropdown-divider"></div>--}}
{{--            <li><a class="dropdown-item font-1 font-light" href="#">--}}
{{--                    @lang('Student for a day')</a></li>--}}
{{--            <div class="dropdown-divider"></div>--}}
{{--            <li><a class="dropdown-item font-1 pt-1 font-light" href="#">--}}
{{--                    @lang('Competition')</a></li>--}}
{{--            <div class="dropdown-divider"></div>--}}
{{--            <li><a class="dropdown-item font-1 font-light" href="{{route('admin.school.tours.show')}}">--}}
{{--                    @lang('International Visit')</a></li>--}}
{{--            <div class="dropdown-divider"></div>--}}
{{--            <li><a class="dropdown-item font-1 font-light" href="{{route('admin.school.join.u2c-meetings.show')}}">--}}
{{--                    @lang('One to One Meeting U2C')</a></li>--}}
{{--            <div class="dropdown-divider"></div>--}}
{{--            <li><a class="dropdown-item font-1 font-light" href="#">--}}
{{--                    @lang('Exhibitions & Fairs')</a></li>--}}
        </ul>
    </div>
    <div class="dropdown menu-item">
        <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
           aria-expanded="false">
            @lang('Students')
        </a>

        <ul class="dropdown-menu shadow-sm dropdown-menu-header dropdown-menu3" aria-labelledby="dropdownMenuLink">
            <li>
                <div class="font-1 font-normal">
                    @lang('My students')</div>
            </li>
            <li>
                <div class="font-light gray">
                    @lang('Manage student\'s registration')</div>
            </li>
            <li><a class="dropdown-item font-light pt-3 font-1" href="{{route('admin.school.students.list')}}">
                    @lang('My Students')</a></li>
            <div class="dropdown-divider"></div>
            <li><a class="dropdown-item font-1 font-light" href="{{route('admin.school.students.add')}}">
                    @lang('Add New Student')</a></li>
            <div class="dropdown-divider"></div>
            <li><a class="dropdown-item font-1 font-light" href="{{route('admin.school.students.addBulk')}}">
                    @lang('Add Bulk Students')</a></li>
            <div class="dropdown-divider"></div>
            <li><a class="dropdown-item font-1 font-light" href="{{route('admin.school.students.registartion.link')}}">
                    @lang('Registration Link')</a></li>
            <div class="dropdown-divider"></div>
            <li><a class="dropdown-item font-1 font-light" href="{{route('admin.school.students.registartion.qr')}}">
                    @lang('Registration QR Code')</a></li>
            <div class="dropdown-divider"></div>
            <li>
                <div class="font-1 pt-3 font-normal">
                    @lang('Students Applications')</div>
            </li>
            <li>
                <div class="font-light gray">
                    @lang('Manage students Applications')</div>
            </li>
            <li><a class="dropdown-item pt-3 font-1 font-light" href="{{route('admin.school.students.application.list')}}">
                    @lang('Applications List')</a></li>
            <div class="dropdown-divider"></div>
{{--            <li><a class="dropdown-item font-1 font-light" href="{{route('admin.school.students.application.attachLetter')}}">--}}
{{--                    @lang('Recommendation Letters')</a></li>--}}
        </ul>
    </div>
    <div class="dropdown menu-item">
        <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
           aria-expanded="false">
            @lang('Universities')
        </a>

        <ul class="dropdown-menu shadow-sm dropdown-menu-header dropdown-menu4" aria-labelledby="dropdownMenuLink">
            <li>
                <div class="font-1 font-normal">
                    @lang('Join Events')</div>
            </li>
            <li>
                <div class="font-light gray">
                    @lang('Find & join Universities events')'</div>
            </li>
            <li><a class="dropdown-item font-light pt-3 font-1" href="{{route('admin.school.tours.show')}}">
                    @lang('Internation Tours Visit List')</a></li>
            <div class="dropdown-divider"></div>
            <li><a class="dropdown-item font-1 font-light" href="{{route('admin.school.join.universityEvents.openDay')}}">
                    @lang('Open day')</a></li>
            <div class="dropdown-divider"></div>
            <li><a class="dropdown-item font-1 font-light" href="javascript:void(0)">
                    @lang('Workshop')</a></li>
            <div class="dropdown-divider"></div>
            <li><a class="dropdown-item font-1 font-light" href="javascript:void(0)">
                    @lang('Student for a day')</a></li>
            <div class="dropdown-divider"></div>
            <li><a class="dropdown-item font-1 font-light" href="{{route('admin.school.join.studentTour.show')}}">
                    @lang('Student tour')</a></li>
            <div class="dropdown-divider"></div>
            <li><a class="dropdown-item font-1 font-light" href="javascript:void(0)">
                    @lang('Competition')</a></li>
            <div class="dropdown-divider"></div>
            <li><a class="dropdown-item font-1 font-light" href="{{route('admin.university.list')}}">
                    @lang('Universities List')</a></li>
            <div class="dropdown-divider"></div>
            <li><a class="dropdown-item font-1 font-light" href="{{route('admin.school.join.u2c-meetings.show')}}">
                    @lang('One to One Meeting')</a></li>
        </ul>
    </div>
    <div class="currency-select">
        <button class="blue" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">USD</button>
    </div>
</div>

