<div>
    @props(['disabled' => false])
<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-control input-field datetime']) !!}>
@pushOnce(AppConst::PUSH_CSS)
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endPushOnce
@pushOnce(AppConst::PUSH_JS)
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script type="text/javascript">
        $('.datetime').flatpickr({
            enableTime: true,
            allowInput: true,
        });
    </script>
@endPushOnce
</div>
