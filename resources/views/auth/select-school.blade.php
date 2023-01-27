<x-base-layout>
    <x-shared.general.breadcrumb-bar>
        <h4 class="ps-4 mb-0">@lang('Select School')</h4>
    </x-shared.general.breadcrumb-bar>
    <x-general.authentication-card>
        @php
        /**
        * @var \App\Models\User $user
        * @var \Illuminate\Database\Eloquent\Collection<\App\Models\Institutes\School> $user_schools
        **/
        @endphp
        <div class="d-flex flex-column justify-content-end mt-3 h-100">
            @if (session('status'))
                <div class="mt-3 mb-3 alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <x-jet-validation-errors class="mt-3 mb-3 alert alert-danger"/>
            <div id="auth_form_login_tab">
                <div class="d-flex flex-column justify-content-end h-100">
                    <div class="">
                        <h4 class="mb-0">@lang('Welcome school you want to login with')</h4>
                    </div>
                    @if (session('status'))
                        <div class="mt-3 mb-3 alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <x-jet-validation-errors class="mt-3 mb-3 alert alert-danger"/>
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        @foreach($user_schools as $school)
                            <div class="row mt-2">
                                <div class="col-12">
                                    <a href="{{route('admin.setSchool',$school->id)}}" class="card text-decoration-none primary-text">
                                        <div class="card-body p-3">
                                            <div class="d-flex justify-content-between">
                                                <label>{{$school->school_name}}</label>
                                                <i class="light-blue fas fa-angle-right"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </form>
                    <div class="d-flex justify-content-end mt-4">
                        <label>
                            @lang('Wrong Account?')
                            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                @csrf
                                <button type="submit"
                                        style="background: none; border: none; text-decoration: underline;"
                                        class="secondary-text">
                                    {{ __('Logout') }}
                                </button>
                            </form>
                        </label>
                    </div>
                </div>
            </div>
    </x-general.authentication-card>
</x-base-layout>
