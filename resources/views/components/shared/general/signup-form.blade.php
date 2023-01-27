<div>
    <!-- Let all your things have their places; let each part of your business have its time. - Benjamin Franklin -->
    <p class="text-center dark_blue_text">{{ __('login-form.text_signup_using') }}</p>
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
    <form method="POST" action={{ url('register') }}>
        @csrf
        <div class="form-row">
            <div class="col">
                <input type="text" placeholder="First name *" class="form-control mb-3" name="first_name" required
                       autofocus>
            </div>
            <div class="col">
                <input type="text" placeholder="Last name *" class="form-control mb-3" name="last_name" required
                       autofocus>
            </div>
        </div>
        <input type="email" placeholder="Email *" class="form-control mb-3" name="email" required autocomplete="email">
        <div class="form-row">
            <div class="col">
                <input type="password" autocomplete placeholder="Password *" class="form-control mb-3" name="password"
                       required>
            </div>
            <div class="col">
                <input placeholder="Confirm Password *" type="password" autocomplete class="form-control mb-3"
                       name="password_confirmation" required>
            </div>
        </div>
        <small class="required_helper dark_blue_text"><i
                class="fas fa-info-circle"></i> {{ __('login-form.text_password_message') }}</small>
        <small class="required_helper mb-0 mt-2">{{ __('login-form.text_newsletters_message') }}</small>
        <div class="d-flex mt-2 mb-4 w-25">
            <label class="checkbox-label ms-0 me-5">
                <input type="radio" name="privacy_consent" value="Yes">
                <span class="checkbox-custom circular"></span>
                <div class="checkbox-custom-label">{{ __('login-form.text_yes') }}</div>
            </label>
            <label class="checkbox-label ms-0">
                <input type="radio" name="privacy_consent" value="No">
                <span class="checkbox-custom circular"></span>
                <div class="checkbox-custom-label">{{ __('login-form.text_no') }}</div>
            </label>
        </div>
        <small class="required_helper">{{ __('login-form.text_receive_info_message') }}</small>
        <div class="d-flex mt-2 mb-4 w-25">
            <label class="checkbox-label ms-0 me-5">
                <input type="radio" name="receiving_consent" value="Yes">
                <span class="checkbox-custom circular"></span>
                <div class="checkbox-custom-label">{{ __('login-form.text_yes') }}</div>
            </label>
            <label class="checkbox-label ms-0">
                <input type="radio" name="receiving_consent" value="No">
                <span class="checkbox-custom circular"></span>
                <div class="checkbox-custom-label">{{ __('login-form.text_no') }}</div>
            </label>
        </div>
        <hr class="auth_dark_separator"/>
        <div class="d-flex align-items-center">
            <a class="auth_helper me-2" href="#">{{ __('login-form.text_user_agreement') }}</a>
            <span>|</span>
            <a class="auth_helper mx-2" href="#">{{ __('login-form.text_user_agreement') }}</a>
            <span>|</span>
            <a class="auth_helper ms-2" href="#">{{ __('login-form.text_cookie_policy') }}</a>
            <small class="flex-fill text-right dark_blue_text">{{ __('login-form.text_required') }}</small>
        </div>
        <input class="btn btn-block btn-primary mt-3" type="submit" value="Sign up"/>
        <div class="text-right mt-2">
            <a class="auth_helper" href="#">{{ __('login-form.text_already_registered') }}</a>
            {{-- TODO: make this change to login --}}
        </div>
    </form>
</div>
