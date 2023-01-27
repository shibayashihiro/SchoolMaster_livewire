<div>
    <x-shared.general.box class="p-3">
        <x-shared.general.box-title tag="h6">
            <b>{{ __('general.text_notifications') }}</b>
        </x-shared.general.box-title>
        <div>
            @for ($i = 1; $i <= 5; $i++)
                <a class="d-flex align-items-center mb-2" href="#">
                    <i class="fas fa-lg fa fa-bell me-2 light_blue_color"></i>
                    <small class="text-dark">
                        Lorem ipsum dolor sit amet, abr consectetur adipisicing elit.
                    </small>
                </a>
            @endfor
        </div>
    </x-shared.general.box>
</div>
