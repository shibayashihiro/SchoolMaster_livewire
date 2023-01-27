<div class="btn-group m-auto" role="group" style="width: 250px;">
    <a type="button" class="btn btn-secondary {{Route::is('login') ? 'active':''}}"   id="login-tab"
       href="{{route('login')}}">{{ __('Login') }}</a>
    <a type="button" class="btn btn-secondary {{Route::is('register') ? 'active':''}} "
       href="{{route('register')}}" >{{ __('Sign Up') }}</a>
</div>
