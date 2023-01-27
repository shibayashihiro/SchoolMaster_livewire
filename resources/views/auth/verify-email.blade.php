<x-base-layout>
    <x-shared.general.breadcrumb-bar>
        <h4 class="ps-4 mb-0">@lang('Verify Your Email')</h4>
    </x-shared.general.breadcrumb-bar>
    <x-general.authentication-card>
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div class="mt-5">
                <h2 class="font-300 primary-text text-center mb-0">Verify Email</h2>
                <p class="paragraph primary-text mt-4">
                    {{ __('Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                </p>
            </div>
            <x-jet-validation-errors class="mb-4 alert alert-danger" />
            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 alert alert-success">
                    {{ __('A new verification link has been sent to the email address you provided in your profile settings.') }}
                </div>
            @endif

            <div class="mt-4 text-center">

                <button type="submit" class="btn btn-block btn-secondary">
                    {{ __('Resend Verification') }}</button>
            </div>

        </form>
        <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            <div class="d-flex justify-content-center align-items-center mt-4">
                <button type="submit"
                        style="background: none; border: none; text-decoration: underline;"
                        class="secondary-text">
                    {{ __('Log Out') }}
                </button>
            </div>
        </form>
    </x-general.authentication-card>
</x-base-layout>
