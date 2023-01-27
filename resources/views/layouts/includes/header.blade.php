<!--TOP NAV OPEN-->
<!-- Nav Mobile -->
<nav class="navbar navbar-expand-lg navbar-dark  px-md-0 bg-dark-blue container-fluid">
    <div class="container-fluid container px-md-0">
        <div class="d-flex gap-1">
            <button id="btn-hamburger" class="navbar-toggler p-0 m-0 ps-2" type="button" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active padding-left-0" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="#">@lang('Ranking')</a></li>
                <li class="nav-item"><a class="nav-link" href="#">@lang('Events')</a></li>
                <li class="nav-item"><a class="nav-link" href="#">@lang('Discover')</a></li>
                <li class="nav-item"><a class="nav-link" href="#">@lang('Prepare')</a></li>
                <li class="nav-item"><a class="nav-link" href="#">@lang('Apply')</a></li>
                <li class="nav-item"><a class="nav-link" href="#">@lang('Careers')</a></li>
                <li class="nav-item"><a class="nav-link" href="#">@lang('Community')</a></li>
            </ul>
            @include('layouts.includes.header.main-auth-menu')
        </div>
        <div class="mobile-nav menu-close-state">
            <a class="navbar-brand" href="#">
                <img src="{{ AppConst::SM_LOGOS_CDN . '/SM-logo-white-horizontal.png' }}" style="width: 255px"
                     alt="Schools Master"/>
            </a>
        </div>
        <div class="mobile-nav align-items-center gap-2 toast-news">
            @auth
                <button class="btn p-0 m-0 position-relative">
                    <img src="{{AppConst::ICONS}}/bell-regula-Wr.svg" alt="" width="20">
                    <span class="css-q8emij position-absolute">14</span>
                </button>
            @endauth
        </div>
    </div>
    @auth
        @if(!empty(Auth::user()->selected_school))
            <div class="mobile-nav-container px-md-0 mt-3 mobile-nav menu-close-state">
                <div class="d-flex align-items-end">
                    <div class="m-2">
                        <img src="{{Auth::user()->selected_school->logo_url}}" alt="School Logo" width="65"/>
                    </div>
                    <div class="">
                        <h4 class="fw-light">{{Auth::user()->selected_school->school_name}}</h4>
                    </div>
                </div>
            </div>
        @endif
        <div class="hidden flex-column align-items-center justify-content-center mt-3 w-100 menu-open-state">
            <a class="navbar-brand" href="#">
                <img src="{{Auth::user()->profile_photo_url}}" alt="Avatar" class="rounded-circle" id="nav-logo"
                     width="100">
            </a>
            <p class="m-0">{{Auth::user()->userBio->first_name}}</p>
            <div class="dropdown">
                <a class="d-flex align-items-center text-white mx-2 dropdown-toggle text-decoration-none" href="#"
                   id="user_account_dropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="mx-3">{{Auth::user()->email}}</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="user_account_dropdown">
                    <li><a class="dropdown-item" href="{{route('admin.user.profile')}}">Account</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button type="submit" class="dropdown-item">
                                {{ __('Logout') }}
                            </button>
                        </form>
                    </li>
                </ul>
            </div>

        </div>
    @endauth
</nav>
<!-- NAV Mobile Close -->
<!-- NAV PC  -->
<div class="hidden" id="navbarSupportedContent">
    <nav class="sidebar card mb-4">
        <ul class="nav flex-column gap-3" id="nav_accordion">
            <li class="nav-item has-submenu">
                <a class="nav-link fs-3 fw-bold accordion-btn" href="#"> Notifications </a>
                <ul class="submenu collapse">
                    <li><a class="nav-link submenu-item fs-4" href="#">Students inquiries</a></li>
                    <li><a class="nav-link submenu-item fs-4" href="#">Messages</a></li>
                    <li><a class="nav-link submenu-item fs-4" href="#">New Events</a></li>
                    <li><a class="nav-link submenu-item fs-4" href="#">Students Chat</a></li>
                    <li><a class="nav-link submenu-item fs-4" href="#">Application</a></li>
                    <li><a class="nav-link submenu-item fs-4" href="#">My Schedule</a></li>
                    <li><a class="nav-link submenu-item fs-4" href="#">My Calendar</a></li>
                </ul>
            </li>
            <li class="nav-item has-submenu">
                <a class="nav-link fs-3 fw-bold accordion-btn" href="#"> Dashboard </a>
                <ul class="submenu collapse">
                    <li><a class="nav-link submenu-item fs-4" href="#">School Basic Info</a></li>
                    <li><a class="nav-link submenu-item fs-4" href="#">Schools Students</a></li>
                    <li><a class="nav-link submenu-item fs-4" href="#">Location and branches</a></li>
                </ul>
            </li>
            <li class="nav-item has-submenu">
                <a class="nav-link fs-3 fw-bold accordion-btn" href="#"> Counselor </a>
                <ul class="submenu collapse">
                    <li><a class="nav-link submenu-item fs-4" href="#">Primary Email address </a></li>
                    <li><a class="nav-link submenu-item fs-4" href="#">Phone numbers </a></li>
                    <li><a class="nav-link submenu-item fs-4" href="#">Change Password </a></li>
                    <li><a class="nav-link submenu-item fs-4" href="#">Counselor Courses </a></li>
                    <li><a class="nav-link submenu-item fs-4" href="#">Counselor Workshops </a></li>
                    <li><a class="nav-link submenu-item fs-4" href="#">Counselor Events </a></li>
                    <li><a class="nav-link submenu-item fs-4" href="#">International Trips </a></li>
                    <li><a class="nav-link submenu-item fs-4" href="#">Conferences </a></li>
                </ul>
            </li>
            <li class="nav-item has-submenu">
                <a class="nav-link fs-3 fw-bold accordion-btn" href="#"> Create an Event </a>
                <ul class="submenu collapse">
                    <li><a class="nav-link submenu-item fs-4" href="#">University Fair </a></li>
                    <li><a class="nav-link submenu-item fs-4" href="#">Career Talk </a></li>
                    <li><a class="nav-link submenu-item fs-4" href="#">Request a Meeting S2U </a></li>
                    <li><a class="nav-link submenu-item fs-4" href="#">Request For Presentation U2S </a></li>
                </ul>
            </li>
            <li class="nav-item has-submenu">
                <a class="nav-link fs-3 fw-bold accordion-btn" href="#">Join Events </a>
                <ul class="submenu collapse">
                    <li><a class="nav-link submenu-item fs-4" href="#">International Tours Visit List </a></li>
                    <li><a class="nav-link submenu-item fs-4" href="#">Open day </a></li>
                    <li><a class="nav-link submenu-item fs-4" href="#">Workshop </a></li>
                    <li><a class="nav-link submenu-item fs-4" href="#">Student for a day </a></li>
                    <li><a class="nav-link submenu-item fs-4" href="#">Competition </a></li>
                    <li><a class="nav-link submenu-item fs-4" href="#">Universities List </a></li>
                    <li><a class="nav-link submenu-item fs-4" href="#">One to One Meeting </a></li>
                </ul>
            </li>
            <li class="nav-item has-submenu">
                <a class="nav-link fs-3 fw-bold accordion-btn" href="#">Students Applications </a>
                <ul class="submenu collapse">
                    <li><a class="nav-link submenu-item fs-4" href="#">Applications List </a></li>
                    <li><a class="nav-link submenu-item fs-4" href="#">Recommendation Letters </a></li>
                </ul>
            </li>
            <li class="nav-item has-submenu">
                <a class="nav-link fs-3 fw-bold accordion-btn" href="#">My students </a>
                <ul class="submenu collapse">
                    <li><a class="nav-link submenu-item fs-4" href="#">My students </a></li>
                    <li><a class="nav-link submenu-item fs-4" href="#">My Students </a></li>
                    <li><a class="nav-link submenu-item fs-4" href="#">Add New Student </a></li>
                    <li><a class="nav-link submenu-item fs-4" href="#">Add Bulk Students </a></li>
                    <li><a class="nav-link submenu-item fs-4" href="#">Registration Link </a></li>
                    <li><a class="nav-link submenu-item fs-4" href="#">Registration QR Code </a></li>
                </ul>
            </li>
            <li class="nav-item has-submenu">
                <a class="nav-link fs-3 fw-bold accordion-btn" href="#">Counselor Support </a>
                <ul class="submenu collapse">
                    <li><a class="nav-link submenu-item fs-4" href="#">Workshops </a></li>
                    <li><a class="nav-link submenu-item fs-4" href="#">Courses </a></li>
                    <li><a class="nav-link submenu-item fs-4" href="#">Events </a></li>
                    <li><a class="nav-link submenu-item fs-4" href="#">Conferences </a></li>
                    <li><a class="nav-link submenu-item fs-4" href="#">International Trips </a></li>
                    <li><a class="nav-link submenu-item fs-4" href="#">University Visit </a></li>
                </ul>
            </li>
            <li class="nav-item has-submenu">
                <a class="nav-link fs-3 fw-bold accordion-btn" href="#">School SM Credit </a>
                <ul class="submenu collapse">
                    <li><a class="nav-link submenu-item fs-4" href="#">SM credit over view </a></li>
                    <li><a class="nav-link submenu-item fs-4" href="#">School activity SM credit </a></li>
                    <li><a class="nav-link submenu-item fs-4" href="#">University activity SM credit </a></li>
                    <li><a class="nav-link submenu-item fs-4" href="#">Student activity SM credit </a></li>
                    <li><a class="nav-link submenu-item fs-4" href="#">Convert SM credit </a></li>
                    <li><a class="nav-link submenu-item fs-4" href="#">SM credit history </a></li>
                </ul>
            </li>
            <li class="nav-item has-submenu">
                <a class="nav-link fs-3 fw-bold accordion-btn" href="#">Support </a>
                <ul class="submenu collapse">
                    <li><a class="nav-link submenu-item fs-4" href="#">Create a ticket </a></li>
                    <li><a class="nav-link submenu-item fs-4" href="#">Request Call Back </a></li>
                    <li><a class="nav-link submenu-item fs-4" href="#">Chat with us </a></li>
                </ul>
            </li>
            <li class="nav-item has-submenu">
                <a class="nav-link fs-3 fw-bold accordion-btn" href="#">Share & Suggest </a>
                <ul class="submenu collapse">
                    <li><a class="nav-link submenu-item fs-4" href="#">Suggest University </a></li>
                    <li><a class="nav-link submenu-item fs-4" href="#">Suggest to School </a></li>
                </ul>
            </li>
            <li class="nav-item has-submenu">
                <a class="nav-link fs-3 fw-bold accordion-btn" href="#">Statistics and Analyses </a>
                <ul class="submenu collapse">
                    <li><a class="nav-link submenu-item fs-4" href="#">Destinations Statistics </a></li>
                    <li><a class="nav-link submenu-item fs-4" href="#">Student Destinations List </a></li>
                    <li><a class="nav-link submenu-item fs-4" href="#">Destinations Coverage </a></li>
                    <li><a class="nav-link submenu-item fs-4" href="#">Universities statistics </a></li>
                    <li><a class="nav-link submenu-item fs-4" href="#">Student Universities List </a></li>
                    <li><a class="nav-link submenu-item fs-4" href="#">Universities Coverage </a></li>
                    <li><a class="nav-link submenu-item fs-4" href="#">Majors statistics </a></li>
                    <li><a class="nav-link submenu-item fs-4" href="#">Student Majors List </a></li>
                    <li><a class="nav-link submenu-item fs-4" href="#">Majors Coverage </a></li>
                    <li><a class="nav-link submenu-item fs-4" href="#">Registration List </a></li>
                    <li><a class="nav-link submenu-item fs-4" href="#">Registration Coverage </a></li>
                    <li><a class="nav-link submenu-item fs-4" href="#">Applications Statistics </a></li>
                    <li><a class="nav-link submenu-item fs-4" href="#">Applications Coverage </a></li>
                </ul>
            </li>
            <li class="nav-item mb-3">
                <a class="nav-link fs-3 fw-bold" href="#"> Universities </a>
            </li>
        </ul>
    </nav>
</div>
<!-- Community Nave -->
@include('layouts.includes.header.community-main-menu')
<!-- Community nav closed -->
<!--TOP NAV CLOSED-->
