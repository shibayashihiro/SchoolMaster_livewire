@props(['submit'])

<div {{ $attributes->merge(['class' => '']) }}>
    @if(isset($title))
    <x-jet-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-jet-section-title>
    @endif
    <div class="row mt-3">
        <div class="col-12">
            <form wire:submit.prevent="{{ $submit }}">
                <div class="card">
                    <div class="card-body">
                        {{ $form }}
                        @if (isset($actions))
                            <div class="row mt-3">
                                <div class="col-lg-12">
                                    <div class="text-center">
                                        {{ $actions }}
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 d-flex justify-content-center">
                                    <div wire:loading.block wire:target="{{$submit}}">
                                        <i class="fas fa-spinner fa-pulse" aria-hidden="true"></i>
                                        {{__('Saving Data')}}...
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
