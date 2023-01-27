<nav class="navbar navbar-expand-lg  navbar-light bg-white px-md-0 mobile-nav-hidden">
    <div class="container-fluid container px-md-0">
        <a href="{{url('/')}}"  class="navbar-brand" style="align-self: center">
            <img class="header-logo d-none d-lg-inline-block pointer" style="width: 250px; height: auto; "
                 src="{{ AppConst::SM_LOGOS_CDN. '/logo.png' }}" alt="Unirank"/>
        </a>
        <div class="collapse navbar-collapse ms-5">
            <ul class="navbar-nav new-nav me-auto align-items-center">

                <li class="nav-item">
                    <a class="nav-link" href="#"><img src="{{AppConst::ICONS}}/home.svg" class="ur-icon-navbar" alt="home"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><img src="{{AppConst::ICONS}}/following.svg" class="ur-icon-navbar" alt="following"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><img src="{{AppConst::ICONS}}/question.svg" class="ur-icon-navbar" alt="question"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><img src="{{AppConst::ICONS}}/answer.svg" class="ur-icon-navbar" alt="question"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><img src="{{AppConst::ICONS}}/groups.svg" class="ur-icon-navbar" alt="groups"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><img src="{{AppConst::ICONS}}/notifications.svg" class="ur-icon-navbar"
                                                      alt="notifications"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><img src="{{AppConst::ICONS}}/messages.svg" class="ur-icon-navbar" alt="messages"></a>
                </li>
            </ul>
            <div class="d-flex">
                <ul class="navbar-nav">
                    <li class="nav-link">
                        <a class="nav-link" href="#"><img src="{{AppConst::ICONS}}/facebook.svg" class="ur-icon-navbar" alt="FB"></a>
                    </li>
                    <li class="nav-link">
                        <a class="nav-link" href="#"><img src="{{AppConst::ICONS}}/twitter.svg" class="ur-icon-navbar" alt="TW"></a>
                    </li>
                    <li class="nav-link">
                        <a class="nav-link" href="#"><img src="{{AppConst::ICONS}}/instegram.svg" class="ur-icon-navbar" alt="Insta"></a>
                    </li>
                    <li class="nav-link pe-0">
                        @include('layouts.includes.header.main-languages-menu')
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
