<x-base-layout>
    <x-shared.general.breadcrumb-bar>
        <h4 class="ps-4 mb-0">@lang('Request Rest Password Link')</h4>
    </x-shared.general.breadcrumb-bar>
    <x-general.authentication-card>
        <div class="d-flex flex-column justify-content-end h-100">
            <div class="">
                <h4 class="mb-0" >@lang('Forget Password')</h4>
                <span>@lang('Please enter your registered email id to reset your password.')</span>
            </div>
            @if (session('status'))
                <div class="mt-3 mb-3 alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <x-jet-validation-errors class="mt-3 mb-3 alert alert-danger"/>
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="mt-5">
                    <input class="form-control mb-3 input-field" placeholder="Email"
                           type="email" name="email" value="{{old('email')}}" autofocus>
                </div>
                <div class="d-flex align-items-center ">
                    <button type="submit" class="btn btn btn-block btn-secondary">@lang('Send link to reset password')
                    </button>
                </div>
            </form>

            <div class="d-flex justify-content-between mt-4">
                <a class="auth_helper" href="{{ route('login') }}">{{ __('Go back to login') }}</a>
                <a class="auth_helper" href="{{ route('register') }}" >{{__("Don't have an account?")}}</a>
            </div>
        </div>
    </x-general.authentication-card>
</x-base-layout>
