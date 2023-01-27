<div class="mt-2">
    <!-- Simplicity is an acquired taste. - Katharine Gerould -->
    <div class="row px-2">
        <div class="col-10 mx-1">
            <div class="row bg-primary p-2 top-round">
                <div class="col-12 text-white text-uppercase"><span class="h6 sidebar-card mb-0">{{ __('general.text_follow_university') }}</span></div>
            </div>
        </div>
    </div>
    <x-shared.general.box class="mt-0">
        {{-- <x-shared.general.box-title tag="h6" class="pt-3 ps-3">
            <b>{{ __('general.text_follow_university') }}</b>
        </x-shared.general.box-title> --}}

        <div class="p-3 d-flex flex-fill justify-content-between">
            <a rel="noreferrer" href="{!! $university?->socialMedia?->facebook !!}" target="_blank" class="">
                <i class="fab fa-facebook-square fa-2x facebook-icon"></i>
            </a>
            <a rel="noreferrer" href="{!! $university?->socialMedia?->youtube !!}" target="_blank" class="">
                <i class="fab fa-youtube-square fa-2x youtube-icon"></i>
            </a>
            <a rel="noreferrer" href="{!! $university?->socialMedia?->twitter !!}" target="_blank" class="">
                <i class="fab fa-twitter-square fa-2x twitter-icon"></i>
            </a>
            <a rel="noreferrer" href="{!! $university?->socialMedia?->instagram !!}" target="_blank" class="">
                <i class="fab fa-instagram fa-2x instagram-icon"></i>
            </a>
            <a rel="noreferrer" href="{!! $university?->socialMedia?->linkedin !!}" target="_blank" class="">
                <i class="fab fa-linkedin fa-2x linkedin-icon"></i>
            </a>
        </div>

    </x-shared.general.box>

</div>
