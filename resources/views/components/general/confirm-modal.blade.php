<div>
    <!-- An unexamined life is not worth living. - Socrates -->
    <div class="modal fade" id="disconnect-{{$service}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{__('Confirm')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{$message}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__("No")}}</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" wire:click="{{$target."('".$service."')"}}">{{__("Confirm")}}</button>
                </div>
            </div>
        </div>
    </div>
</div>
