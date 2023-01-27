<ul class="navbar-nav">
    <li class="nav-item ps-0 active">
        <a class="nav-link ps-0" href="{{ url('/') }}">
            <i class="fa fa-home fa-fw d-md-none" aria-hidden="true"></i>
            {{ __('menu.home') }}
        </a>
    </li>
    <li class="nav-item ">
        <a class="nav-link" href="{{ url('/') }}">
            <i class="fa fa-star fa-fw  d-md-none" aria-hidden="true"></i>
            {{ __('menu.ranking') }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link coming-soon" href="#">
            <i class="fa fa-calendar fa-fw d-md-none" aria-hidden="true"></i>
            {{ __('menu.events') }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link coming-soon" href="#">
            <i class="fa fa-eye fa-fw  d-md-none"  aria-hidden="true"></i>
            {{ __('menu.discover') }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link coming-soon" href="#">
            <i class="fa fa-briefcase fa-fw d-md-none" aria-hidden="true" ></i>
            {{ __('menu.prepare') }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link coming-soon" href="#">
            <i class="fa fa-mouse-pointer fa-fw  d-md-none" aria-hidden="true"></i>
            {{ __('menu.apply') }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link coming-soon" href="#">
            <i class="fa fa-briefcase fa-fw  d-md-none" aria-hidden="true"></i>
            {{ __('menu.careers') }}
        </a>
    </li>
    <li class="nav-item d-none d-md-inline">
        <a class="nav-link coming-soon" target="_blank"
           href="{{ config('custom.links.ask') }}">
            {{ __('menu.community') }}
        </a>
    </li>
    <li class="nav-item d-md-none">
        <a class="dropdown-btn"><i class="fa fa-users fa-fw" aria-hidden="true"></i> Community
            <i class="fa fa-caret-down fa-fw"></i>
        </a>
        <div class="dropdown-container">
            <a href="#"><i class="fa fa-home fa-fw" aria-hidden="true"></i>
                Community Home</a>
            <a href="#"><i class="fa fa-user-plus fa-fw" aria-hidden="true"></i>
                Following</a>
            <a href="#"><i class="fa fa-question-circle fa-fw" aria-hidden="true"></i>
                Questions</a>
            <a href="#"><i class="fa fa-stack-exchange fa-fw" aria-hidden="true"></i>
                Answers</a>
            <a href="#"><i class="fa fa-users fa-fw" aria-hidden="true"></i>
                Groups</a>
            <a href="#"><i class="fa fa-exclamation-triangle fa-fw" aria-hidden="true"></i>
                Notifications</a>
            <a href="#"><i class="fa fa-comments fa-fw" aria-hidden="true"></i>
                Messages</a>
        </div>
    </li>
</ul>
