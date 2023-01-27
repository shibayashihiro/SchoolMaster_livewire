@props(['id', 'maxWidth'])

@php
$id = $id ?? md5($attributes->wire('model'));
$modelValue = $attributes->wire('model')->value;
$maxWidth = [
    'sm' => 'sm:max-w-sm',
    'md' => 'sm:max-w-md',
    'lg' => 'sm:max-w-lg',
    'xl' => 'sm:max-w-xl',
    '2xl' => 'sm:max-w-2xl',
][$maxWidth ?? '2xl'];
@endphp
<div
    x-data="{show: @entangle($attributes->wire('model')).defer,model_instance:new bootstrap.Modal($('#{{$id}}'))}"
    x-init="$watch('show', value => {
    if(value){
     model_instance.show()
    }else{
    $wire.emit('onModelClose');
    model_instance.hide()
    }
    })"
    x-on:close.stop="show = false"
    x-on:keydown.escape.window="show = false"
    x-show="show"
>
    <div class="modal" x-show="show"
         id="{{ $id }}" wire:ignore.self data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                @if(isset($title))
                <div class="modal-header">
                    <h4 class="modal-title h4 blue" id="staticBackdropLabel">{!! $title !!}</h4>
                    <button type="button" class="btn-close" @click="show=false" aria-label="Close"></button>
                </div>
                @endif
                <div class="ps-4 pe-4">
                    <div class="ps-2 pe-2">
                        <hr>
                    </div>
                </div>
                <div class="modal-body pt-0">
                    <div>
                        {{$description}}

                    </div>
                    <div>
                        {{$slot}}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
