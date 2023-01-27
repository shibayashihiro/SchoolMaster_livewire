<x-base-layout>
    <x-shared.general.breadcrumb-bar>
        <h4 class="ps-4 mb-0">@lang('School Registration')</h4>
    </x-shared.general.breadcrumb-bar>
    <x-general.authentication-card>
        <x-general.auth-button-group/>
        <div class="d-flex flex-column justify-content-end mt-3 h-100">
            <div id="auth_form_login_tab">
                <h4 class="primary-text">@lang('Signup')</h4>
                <p class="mb-4 primary-text">
                    @lang('Select the country first and then school, enter email and password or')
                    <span><a href="{{ route('login') }}" class="secondary-text">@lang('Sign in')</a></span> @lang('to get
                    started.')
                </p>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-row">
                        <div class="col">
                            @php
                               $user_country =  session('country_info')['id'] ?? null;
                            @endphp
                            <select id="country_id" name="country_id" class="form-control mb-3 input-field">
                                <option selected disabled>@lang('Pick a Country')</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}"
                                        @selected($country->id == old('country_id',$user_country))>
                                        {{ $country->country_name }}</option>
                                @endforeach
                            </select>
                            <x-general.input-error for-input="country_id"/>
                        </div>
                        <div class="col">
                            <div class="form-group mb-3">
                                <select id="institute_id" class="" name="school_id">
                                </select>
                                <div id="adminExist">

                                </div>
                            </div>
                            <x-general.input-error for-input="school_id"/>
                        </div>
                        <div class="col">
                            <input
                                class="form-control mb-3 input-field {{$errors?->has('email')?'border-danger':''}}"
                                required name="email" type="email"
                                placeholder="Email" value="{{old('email')}}"/>
                            <x-general.input-error for-input="email"/>
                        </div>
                        <div class="col">
                            <input
                                class="form-control mb-3 input-field {{$errors?->has('password') || $errors->has('wrong_credentials')?'border-danger':''}}"
                                required type="password" name="password" autocomplete
                                placeholder="Password"/>
                            <x-general.input-error for-input="password"/>
                        </div>
                        <div class="col">
                            <input
                                class="form-control mb-3 input-field"
                                required type="password" name="password_confirmation" autocomplete
                                placeholder="Confirm Password"/>
                        </div>
                    </div>
                    <button class="btn btn-block btn-secondary" type="submit">{{__("Submit")}}</button>
                </form>
                <p class="mt-2 paragraph primary-text">@lang('By signing up I agree to share my data and according to')
                    <a class="secondary-text" href="">@lang('User agreement,') </a>
                    <a href="" class="secondary-text">@lang('Cookie policy') </a>
                    and <a href="" class="secondary-text">@lang('Privacy policy')</a>
                </p>
                <div class="w-100 d-flex justify-content-end mt-4">
                    @lang('Already have an account?')
                    <a class="auth_helper secondary-text ms-1" href="{{ route('login') }}"> {{__("login")}}</a>
                </div>
            </div>
        </div>
    </x-general.authentication-card>
    @push(AppConst::PUSH_JS)
        <script>
            $("#institute_id").select2({
                ajax: {
                    url: "api/get-schools",
                    type: "post",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN, // constant deifined in layout/guest
                            search: params.term, // search term
                            country_id: $('#country_id').val(),
                        };
                    },
                    processResults: function (response) {
                        return {
                            results: response
                        };
                    },
                    cache: true
                },
                templateResult: formatInstitute,
                placeholder: "{{__('Select School')}}",
                // allowClear: true,
                tags: true,
                width: '100%',
                // minimumInputLength: 1,
            })

            $('#institute_id').one('select2:open', function (e) {
                $('input.select2-search__field').prop('placeholder', '{{__('Start typing')}}...');
            });

            function formatInstitute(institute) {
                if (!institute.id) {
                    return institute.text;
                }
                var image = `${institute.image}`;
                if (institute.image == undefined) {
                    image = "{{ asset('assets/img/icons/school.png')}}"
                }

                var $company = $(`
                    <div class="row w-100">
                    <div class="col-sm-2">
                    <img class="img-thumbnail" src="${image}" alt="Card image"/>
                    </div>
                    <div class="col-sm-10">
                      <p class="mt-2">${institute.text}</p>
                     </div>
                    `);
                return $company;
            }

            $("#institute_id").on('change', function () {
                $.get(`api/check-school` + `?q=${$("#institute_id").val()}`, function (data) {
                    if (data.adminExist) {
                        var html = `<p class="text-danger mt-2">{{__('This school is already claimed by')}} ${data.name} {{__('and')}} ${data.email} .<span>
                        <a href="https://schoolsmaster.com/" target="_blank" class="btn btn-primary btn-sm custom-btn" style="background: #2c2f57 !important;" >Report this school to reclaim the profile </a></span></p>`;
                        $('#adminExist').empty();
                        $("#adminExist").append(html);
                    } else {
                        $('#adminExist').empty();
                    }
                });
            })
        </script>
    @endpush
</x-base-layout>
