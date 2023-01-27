@props(['disabled' => false])
@php
$modelValue = $attributes->wire('model')->value;
$id  = $attributes['id'] ?? $modelValue;
$start = \Carbon\Carbon::today()->toDateString();
$end = \Carbon\Carbon::today()->toDateString();
if(!empty($this->{$modelValue})){
    $range = explode(' to ', $this->{$modelValue});
    $start = $range[0];
    $end = $range[1];
}
@endphp
<input {{ $disabled ? 'disabled' : '' }} id="{{$id}}" {!! $attributes->merge(['class' => 'form-control input-field']) !!}>

@push(AppConst::PUSH_CSS)
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endpush
@push(AppConst::PUSH_JS)
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script class="">

        $('#{{$id}}').daterangepicker({
            startDate:'{{$start}}',
            endDate:'{{$end}}',
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            "locale": {
                "direction": "ltr",
                "format": "YYYY-MM-DD",
                "separator": " to ",
                "applyLabel": "Apply",
                "cancelLabel": "Cancel",
                "fromLabel": "From",
                "toLabel": "To",
                "customRangeLabel": "Custom",
                "daysOfWeek": [
                    "Su",
                    "Mo",
                    "Tu",
                    "We",
                    "Th",
                    "Fr",
                    "Sa"
                ],
                "monthNames": [
                    "January",
                    "February",
                    "March",
                    "April",
                    "May",
                    "June",
                    "July",
                    "August",
                    "September",
                    "October",
                    "November",
                    "December"
                ],
                "firstDay": 1,
            },
            "alwaysShowCalendars": true,
        },(start, end)=>{
            setTimeout(()=>{
                @this.set('{{$modelValue}}',`${start.format('YYYY-MM-DD')} to ${end.format('YYYY-MM-DD')}`)
            },200);
        });
    </script>
@endpush
