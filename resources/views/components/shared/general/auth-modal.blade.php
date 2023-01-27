<!-- Simplicity is the essence of happiness. - Cedric Bledsoe -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body p-0 " dir="ltr">
                <div class="d-flex">
                    <div class="auth_sidebar d-none d-md-block">
                        <div class="auth_overlay p-4">
                            <div class="d-flex">

                                <img  loading="lazy"  class="auth_logo" src="{{ AppConst::SITE_LOGOS.'/uniranks-auth.png' }}" />
                                <p>
{{--                                {{  __('auth-modal.text_interested') }}--}}
                                {{__(nl2br("Interested  in these  universities?"))}}
                            </div>
                            <hr class="auth_separator" />
                            <p class="font-weight-bold">{!! __('auth-modal.text_signup_message') !!} </p>
                            <ul>
                                <li>{{ __('auth-modal.text_find_message') }}</li>
                                <li>{{ __('auth-modal.text_meet_message') }}</li>
                                <li>{{ __('auth-modal.text_connect_message') }}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="auth_main flex-fill">
                        <div class="mb-5">
                            <button onclick="closeAuthModal()" class="btn modal_close" type="button" data-bs-dismiss="modal" aria-label="Close" ><i class="fas fa-times"></i></button>
                        </div>
                        <div class="nav nav-tabs btn-group w-50 m-auto" role="group">
                        <a type="button" class="btn btn-primary active" id="login-tab" data-bs-toggle="tab" href="#auth_form_login_tab" role="tab">{{ __('auth-modal.text_login') }}</a>
                            <a type="button" class="btn btn-primary" id="signup-tab" data-bs-toggle="tab" href="#auth_form_signup_tab" role="tab">{{ __('auth-modal.text_signup') }}</a>
                        </div>
                        <div class="tab-content p-4">
                            <div id="auth_form_login_tab" class="tab-pane fade show active" role="tabpanel">
                                @livewire('auth.user.login')
                            </div>
                            <div id="auth_form_signup_tab" class="tab-pane fade" role="tabpanel">
{{--                                <x-shared.general.signup-form />--}}
                                @livewire('auth.user.register')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
