<x-base-layout>
    <x-shared.general.breadcrumb-bar>
        <h4 class="ps-4 mb-0">@lang('School Login')</h4>
    </x-shared.general.breadcrumb-bar>
    <x-general.authentication-card>
        <x-general.auth-button-group/>
        <div class="d-flex flex-column justify-content-end mt-3 h-100">
            @if (session('status'))
                <div class="mt-3 mb-3 alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <x-jet-validation-errors class="mt-3 mb-3 alert alert-danger"/>
            <div id="auth_form_login_tab">
                <h4 class="primary-text">@lang('Sign In')</h4>
                <p class="mb-4 primary-text">@lang('Enter your registered email to sign in, or') <a href="{{route('register')}}" class="secondary-text">@lang('signup')</a> @lang('to continue.')</p>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-row">
                        <div class="col">
                            <input
                                class="form-control mb-3 input-field {{$errors?->has('email')?'border-danger':''}}"
                                required name="email" type="email"
                                placeholder="Email"  value="{{old('email')}}"/>
                            <x-general.input-error for-input="email" />
                        </div>
                        <div class="col">
                            <input
                                class="form-control mb-3 input-field {{$errors?->has('password') || $errors->has('wrong_credentials')?'border-danger':''}}"
                                required type="password" name="password" autocomplete
                                placeholder="Password"/>
                            <x-general.input-error for-input="password" />
                        </div>
                    </div>
                    <button class="btn btn-block btn-secondary" type="submit">{{__("Submit")}}</button>
                </form>
                <div class="d-flex justify-content-between mt-4">
                    <a class="auth_helper" href="{{ route('password.request') }}">{{ __('Forget password') }}</a>
                    <a class="auth_helper" href="{{ route('register') }}" >{{__("Don't have an account?")}}</a>
                </div>
            </div>
        </div>
    </x-general.authentication-card>
</x-base-layout>
