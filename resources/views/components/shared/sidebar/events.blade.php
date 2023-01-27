<div class="mb-4">
    <x-shared.general.box class="p-3">

        <x-shared.general.box-title tag="h6">
            <b> {{ __('general.text_upcoming_events') }} </b>
        </x-shared.general.box-title>

        <div>
            @foreach (json_decode($events) as $event)
                <div class="d-flex align-items-center mb-3">

                    <div class="me-2">
                        <img src="{{ AppConst::PLACEHOLDER_IMAGES . '/' . $event->img }}" loading="lazy" class="rounded-circle square-45" />
                    </div>

                    <div>
                        {{-- <h6><strong> {{ $event->title }} </strong></h6> --}}
                        {{-- <p class="text-primary"> {{ $event->event_date }} </p> --}}
                        <small>
                            <div>
                                <b> Friday, 24<sup>th</sup> June </b>
                            </div>
                            <div> {{ $event->short_details }} </div>
                        </small>

                        <a class="btn-link disable-link" href="#">Register Now</a>
                    </div>
                </div>
            @endforeach

            <a class="p-2 btn btn-outline-primary w-100 mt-3 disable-link" href="#">
                View All
            </a>

        </div>
    </x-shared.general.box>
</div>
