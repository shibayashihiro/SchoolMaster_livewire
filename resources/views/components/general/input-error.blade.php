@props(['forInput'=>''])
<div>
    @error($forInput)
    <small class="required_helper text-danger"><i
            class="fas fa-info-circle"></i> {!! $message !!}
    </small>
    @enderror
</div>
