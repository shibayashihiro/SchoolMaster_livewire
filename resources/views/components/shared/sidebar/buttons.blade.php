<div class="button-com mb-4">

    @if (Route::is('university.profile') || Route::is('university.info'))

        <a href="{{ route('suggest.similar-universities', [request()->segment(count(request()->segments()))]) }}"
           class="btn btn-primary w-100 mb-2 py-2 coming-soon">
            {{ __('general.text_suggest_similar') }}
        </a>

    @endif
    <div class="{{ Route::is('university.profile') || Route::is('university.info') ? '' : '' }}">
        {{--        <button type="button" class="btn btn-primary w-100 mb-2 py-2" data-bs-toggle="modal" data-bs-target="#search_modal">--}}
        {{--            {{ __('general.text_search') }}--}}
        {{--        </button> --}}
        <button type="button" class="btn w-100 mb-2 py-2 coming-soon" style="background-color: #1c345a !important; color: white">
            {{ __('general.text_search') }}
        </button>
    </div>

    <button class="btn btn-application w-100 mb-2 py-2 sidebar-btn coming-soon" >
        {{ __('general.text_student_application') }}
    </button>

    <a href="https://committee.uniranks.com/register"
       class="btn btn-secondary-outline w-100 my-2 sidebar-btn" target="_blank">
        {{ __('general.text_ranking_committee') }}
    </a>
    <a href="https://uniadmin.uniranks.com/register" class="btn btn-secondary-outline w-100 my-2 sidebar-btn"
       target="_blank">
        {{ __('general.text_university_claim') }}
    </a>
    <a href="{{route('profile.demo')}}"
       class="btn btn-secondary-outline w-100 my-2 sidebar-btn">
        {{ __('general.text_demo_profile') }}
    </a>
    <a href="{{route('profile.demo.ranking')}}" class="btn btn-secondary-outline w-100 my-2 sidebar-btn">
        {{ __('general.text_demo_ranking') }}
    </a>
    <a href="https://uniadmin.uniranks.com/register-university" class="btn btn-secondary-outline w-100 my-2 sidebar-btn"
       target="_blank">
        {{ __('general.text_university_register') }}
    </a>
    <a href="https://www.uniranks.com/issues-feedback" class="btn btn-primary w-100 my-2 sidebar-btn secondary-bg border-0" target="_blank">
        {{ __('general.text_report') }}
    </a>

    <x-shared.search.modal/>

</div>
