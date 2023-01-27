<div>
    <!-- Simplicity is the consequence of refined emotions. - Jean D'Alembert -->
    <div class="row">
        @if($type == 'modal')
        <div wire:loading.class="cover-spin"   wire:target="{{$target}}" class="text-center mt-2">
{{--            <h5 class="text-success">Processing Request.. <i class="fas fa-spinner fa-pulse" aria-hidden="true"></i></h5>--}}
        </div>
        @else
            <div wire:loading.inline   wire:target="{{$target}}" class="text-center mt-2">
                            <h5 class="text-success">Processing Request.. <i class="fas fa-spinner fa-pulse" aria-hidden="true"></i></h5>
            </div>
            @endif

    </div>
</div>
