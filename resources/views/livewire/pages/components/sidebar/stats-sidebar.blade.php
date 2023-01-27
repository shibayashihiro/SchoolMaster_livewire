<div class="col mobile-hidden ps-0">
    <div class="card">
        <div class="card-body">
            <h5 class="h5 blue">@lang('Statistics and Analysis')</h5>
            <h6 class="h6 gray">@lang('a very good look at everything')</h6>
            <hr>
            <ul class="sidebar-ul">
                <li class="mb-2">
                    <a @class(['a-underline blue','light-blue disabled'=> Route::is('admin.school.statistics.registrations.list') ])
                       href="{{route('admin.school.statistics.registrations.list')}}">
                        @lang('Registration List')
                    </a>
                </li>
                <li class="mb-2">
                    <a @class(['a-underline blue','light-blue disabled'=> Route::is('admin.school.statistics.registrations.coverage') ])
                       href="{{route('admin.school.statistics.registrations.coverage')}}">
                        @lang('Coverage Percentage')
                    </a>
                </li>
                <hr>
                <li class="mb-2">
                    <a @class(['a-underline blue','light-blue disabled'=> Route::is('admin.school.statistics.universities.show') ])
                                    href="{{route('admin.school.statistics.universities.show')}}">
                        @lang('Universities Statistics')
                    </a>
                </li>
                <li class="mb-2">
                    <a @class(['a-underline blue','light-blue disabled'=> Route::is('admin.school.statistics.universities.studentList') ])
                       href="{{route('admin.school.statistics.universities.studentList')}}">
                        @lang('Student List')
                    </a>
                </li>
                <li class="mb-2">
                    <a @class(['a-underline blue','light-blue disabled'=> Route::is('admin.school.statistics.universities.coverage') ])
                       href="{{route('admin.school.statistics.universities.coverage')}}">
                        @lang('Coverage Percentage')
                    </a>
                </li>
                <hr>
                <li class="mb-2">
                    <a @class(['a-underline blue','light-blue disabled'=> Route::is('admin.school.statistics.majors.show') ])
                       href="{{route('admin.school.statistics.majors.show')}}">
                        @lang('Major Statistics')
                    </a>
                </li>
                <li class="mb-2">
                    <a @class(['a-underline blue','light-blue disabled'=> Route::is('admin.school.statistics.majors.studentList') ])
                       href="{{route('admin.school.statistics.majors.studentList')}}">
                        @lang('Student List')
                    </a>
                </li>
                <li class="mb-2">
                    <a @class(['a-underline blue','light-blue disabled'=> Route::is('admin.school.statistics.majors.coverage') ])
                       href="{{route('admin.school.statistics.majors.coverage')}}">
                        @lang('Coverage Percentage')
                    </a>
                </li>
                <hr>
                <li class="mb-2">
                    <a @class(['a-underline blue','light-blue disabled'=> Route::is('admin.school.statistics.destinations.show') ])
                       href="{{route('admin.school.statistics.destinations.show')}}">
                        @lang('Destinations & Statistics')
                    </a>
                </li>
                <li class="mb-2">
                    <a @class(['a-underline blue','light-blue disabled'=> Route::is('admin.school.statistics.destinations.studentList') ])
                       href="{{route('admin.school.statistics.destinations.studentList')}}">
                        @lang('Student List')
                    </a>
                </li>
                <li class="mb-2">
                    <a @class(['a-underline blue','light-blue disabled'=> Route::is('admin.school.statistics.destinations.coverage') ])
                       href="{{route('admin.school.statistics.destinations.coverage')}}">
                        @lang('Coverage Percentage')
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

