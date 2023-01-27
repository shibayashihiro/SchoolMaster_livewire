<div>
    @php
        /**
         * @var float $credit_total;
         * @var float $cash_out;
        **/
    @endphp
    <div class="d-flex justify-content-between" style="padding: 0px 30px">
        <div class="h5 text-blue">@lang('Convert Credit')</div>
        <span class="h5 text-blue">@lang('Total Credit '. $credit_total)</span>
    </div>
    <div class="col-12" style="padding: 0px 30px">
        <div class="text-grey">@lang('SM Credit Overview')</div>
    </div>

    <div class="row my-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body d-flex justify-content-between">
                    @lang('Request Credit Cash Out')
                    <div>
                        {{ $credit_total }}
                        <a class="light-blue" href="#">@lang('Request')</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-between" style="padding: 0px 30px">
        <div class="text-grey">@lang('Total SM Credit '. $credit_total)</div>
        <a class="light-blue" href="{{route('admin.school.schoolPoints.creditHistory')}}">@lang('Credit Transaction History')</a>
    </div>
</div>
