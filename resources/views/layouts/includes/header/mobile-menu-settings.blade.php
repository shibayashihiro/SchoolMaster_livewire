@guest
    <a href="{{route('login')}}" >
        <i class="fa fa-user-plus" aria-hidden="true"></i>{{ __('menu.signup') }}
    </a>
    <a href="javascript:void(0)">
        <i class="fa fa-sign-in" aria-hidden="true"></i>{{__('menu.login')}}
    </a>
@elseauth
    <a href="javascript:void(0)">
        <i class="fa fa-user" aria-hidden="true"></i>{{ auth()->user()->userBio->first_name }}</a>
    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <button type="submit" class="dropdown-item">
            <i class="fa fa-sign-out" aria-hidden="true"></i> {{ __('Logout') }}
        </button>
    </form>
@endguest
<a href="javascript:void(0)" onclick="openAuthModal('signup')">
    <i class="fa fa-language" aria-hidden="true"></i>{{__('menu.language')}}</a>
