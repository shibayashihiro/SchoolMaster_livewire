<div class="mb-4">
    <!-- An unexamined life is not worth living. - Socrates -->
    <x-shared.general.box class="p-3 pb-0">
        <x-shared.general.box-title tag="h6">
            <b> {{ __('general.text_featured') }} </b>
        </x-shared.general.box-title>

        <div class="">
            @for ($i = 1; $i <= 5; $i++)
                <div class="d-flex flex-column mb-4">

                    <p class="mb-1">
                        <b> University of Oxford </b>
                    </p>

                    <img loading="lazy" class="rounded featured_university_cover mb-2 w-full" src="https://loremflickr.com/233/72/skyline?random={{ uniqid() }}" alt="University Featured cover" />

                    <div class="featured_university_logo d-flex align-items-end justify-content-between">

                        <img loading="lazy" class="img-thumbnail me-2" src="https://loremflickr.com/64/64/logo?random={{ uniqid() }}" alt="featured university logo" />

                        <a class="btn btn-sm btn-outline-primary me-1 disable-link d-none" href="#">
                            <i class="fas fa-sm fa-play"></i>
                            {{ __('general.text_videos') }}
                        </a>

                        <a class="btn btn-sm btn-primary disable-link" href="#">
                            {{ __('general.text_explore') }}
                        </a>

                    </div>
                </div>
            @endfor
        </div>

    </x-shared.general.box>
</div>
