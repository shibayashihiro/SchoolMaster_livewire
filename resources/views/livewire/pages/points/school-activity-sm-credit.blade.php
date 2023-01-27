<div>
    @php
        /**
        * @var \Illuminate\Database\Eloquent\Collection | \App\Models\School\SchoolPointHistory $histories;
        * @var float $credit_total;
        **/
    @endphp
    <div class="d-flex justify-content-between" style="padding: 0px 30px">
        <div>
            <div class="h5 text-blue">@lang('School SM Credit Detail(school)')</div>
        </div>
        <div>
            <span class="h5 text-blue">@lang('Total Credit '. $credit_total)</span>
        </div>
    </div>
    <div class="col-12" style="padding: 0px 30px">
        <div class="text-grey">@lang('School Events SM Credit')</div>
    </div>

    @foreach($histories as $history)
    <div class="row my-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body d-flex justify-content-between">
                    <div>
                        {{ $history->pointType->title }}
                    </div>
                    <div>
                        {{ $history->pointType->points }} @lang('*') {{ $history->transaction_count }} = {{ $history->transaction_sum }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="d-flex justify-content-between" style="padding: 0px 30px">
        <div class="text-grey">@lang('Total SM Credit '. $credit_total)</div>
        <a class="light-blue" href="{{route('admin.school.schoolPoints.creditHistory')}}">@lang('Credit Transaction History')</a>
    </div>
</div>
