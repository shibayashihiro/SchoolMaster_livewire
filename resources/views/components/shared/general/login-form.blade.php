<div>
    <!-- It is quality rather than quantity that matters. - Lucius Annaeus Seneca -->
    <p class="text-center dark_blue_text"> {{ __('login-form.text_login_using') }}</p>
    <div class="d-flex mb-2 mx-auto justify-content-center">
        <button class="btn btn-social btn-facebook me-2" type="button" name="button"><i
                class="fab fa-facebook-f me-2"></i>{{ __('login-form.text_facebook') }}</button>
        <button class="btn btn-social btn-google" type="button" name="button"><i
                class="fab fa-google me-2"></i>{{ __('login-form.text_google') }}</button>
    </div>
    <div class="d-flex mb-2 mx-auto justify-content-center">
        <button class="btn btn-social btn-linkedin me-2" type="button" name="button"><i
                class="fab fa-linkedin-in me-2"></i>{{ __('login-form.text_linkedin') }}</button>
        <button class="btn btn-social btn-twitter" type="button" name="button"><i
                class="fab fa-twitter me-2"></i>{{ __('login-form.text_twitter') }}</button>
    </div>
    <div class="auth_or_seprator">or</div>
    <form method="POST" action={{ url('login') }}>
        @csrf
        <input class="form-control mb-3" type="email" name="email" placeholder="Email"/>
        <input class="form-control mb-3" type="password" name="password" autocomplete placeholder="Password"/>
        <input class="btn btn-block btn-primary" type="submit" value="Log in"/>
        <div class="d-flex justify-content-between mt-2">
            <a class="auth_helper" href={{ route('password.request') }}>{{ __('login-form.text_forget_password') }}</a>
            <a class="auth_helper" href="#">Not a member?</a>
            {{-- <a class="auth_helper" data-bs-toggle="tab" href="#register" role="tab">Not a member?</a> TODO: make this work --}}
        </div>
    </form>
</div>
