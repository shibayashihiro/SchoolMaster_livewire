<div>
    <x-shared.general.box class="p-3">

        <x-shared.general.box-title tag="h6">
            <b> {{ __('general.text_upcoming_fairs') }} </b>
        </x-shared.general.box-title>

        @for ($i = 1; $i <= 5; $i++)
            <div class="mb-3">
                <div class=""><strong>Fair Title</strong></div>
                <small>
                    <div>
                        <b> Friday, 25<sup>th</sup> Jan </b>
                    </div>
                    <div class="">Lorem ipsum sit dolores et...</div>
                </small>
                <a class="btn-link" href="#">Register Now</a>
            </div>
        @endfor

        <a class="p-2 btn btn-outline-primary w-100 mt-3" href="#">
            {{ __('general.text_view_all') }}
        </a>

    </x-shared.general.box>
</div>
