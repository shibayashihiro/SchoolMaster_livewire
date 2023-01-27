<div class="mb-4">
    <!-- An unexamined life is not worth living. - Socrates -->
    <x-shared.general.box class="p-3 pb-0">
        <x-shared.general.box-title tag="h6">
            <b> {{ __('general.text_quick_links') }} </b>
        </x-shared.general.box-title>

        <div>
            @foreach ([
                __('general.text_undergraduate'),
                __('general.text_postgraduate'),
                __('general.text_where_to_study'),
                __('general.text_what_to_study'),
                __('general.text_meet_schools'),
                __('general.text_methodology'),
            ] as $link)
                <a class="d-flex align-items-center text-dark mb-3 disable-link" href="#">
                    <p class="flex-fill mb-0">{{ $link }}</p>
                    <i class="fas fa-angle-right" aria-hidden="true"></i>
                </a>
            @endforeach
        </div>
    </x-shared.general.box>
</div>
