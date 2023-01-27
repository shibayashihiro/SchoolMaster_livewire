<x-base-layout>
    <x-shared.general.breadcrumb-bar>
        <h4 class="ps-4 mb-0">@lang('Rest Password')</h4>
    </x-shared.general.breadcrumb-bar>
    <x-general.authentication-card>
        <div class="d-flex flex-column justify-content-end h-100">
            <div class="">
                <h4 class="mb-0" >@lang('Welcome back') {{$user_name == 'Update Profile'?'':$user_name}}!</h4>
                <span>@lang('Please rest your password here, in order to login.')</span>
            </div>
            @if (session('status'))
                <div class="mt-3 mb-3 alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <x-jet-validation-errors class="mt-3 mb-3 alert alert-danger"/>
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email"
                         :value="old('email', $request->email)" required autofocus hidden/>
            <div class="mt-5">
                <input class="form-control mb-3 input-field" placeholder="Password"
                       type="password" name="password" value="{{old('password')}}">
            </div>

            <div class="mt-3 mb-5">
                <input class="form-control mb-3 input-field" placeholder="Confirm Password"
                       type="password" name="password_confirmation"
                       value="{{old('password_confirmation')}}"
                       autofocus>
            </div>
            <div class="d-flex align-items-center ">
                <button type="submit" class="btn btn btn-block btn-secondary">@lang('Reset password')
                </button>
            </div>
        </form>

            <div class="w-100 d-flex justify-content-end mt-4">
                <a class="auth_helper primary-text ms-1" href="{{ route('login') }}">@lang('Go back to login!') </a>
            </div>
        </div>
    </x-general.authentication-card>
</x-base-layout>
