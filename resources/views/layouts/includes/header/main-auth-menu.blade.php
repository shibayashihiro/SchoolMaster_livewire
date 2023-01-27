@guest
    <a href="{{route('login')}}" class="button-sm  button-light-blue text-light ms-2 text-decoration-none" style="width: 60px">{{ __('menu.login') }}</a>
    <a href="{{route('register')}}" class="button-sm button-red text-decoration-none ms-2"   style="width: 60px">{{ __('menu.signup') }}</a>
@elseauth
    <div class="dropdown">
        <a class="d-flex align-items-center text-white mx-2 dropdown-toggle text-decoration-none" href="#"
           id="user_account_dropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img class="navbar-user-avatar" src="{{ auth()->user()->profile_photo_url }}"
                 alt="Profile Picture"/>
            <span class="mx-3">
                {{ auth()->user()->userBio->first_name }}
            </span>
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
@endguest
