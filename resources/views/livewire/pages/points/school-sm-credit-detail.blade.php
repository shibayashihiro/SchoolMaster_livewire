<div>
    @php
        /**
         * @var float $school_activity_credit;
         * @var float $university_activity_credit;
         * @var float $students_activity_credit;
        **/
    @endphp
    <div class="d-flex justify-content-between" style="padding: 0px 30px">
        <div>
            <div class="h5 text-blue">@lang('School SM Credit Detail')</div>
        </div>
        <div>
            <span class="h5 text-blue">@lang('Total Credit '. $credit_total)</span>
        </div>
    </div>
    <div class="col-12" style="padding: 0px 30px">
        <div class="text-grey">@lang('SM Credit Overview')</div>
    </div>
    <div class="row my-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body d-flex justify-content-between">
                    <div>
                        @lang('School Events SM Credit')
                    </div>
                    <div>
                        {{ $school_activity_credit }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body d-flex justify-content-between">
                    <div>
                        @lang('University Events SM Credit')
                    </div>
                    <div>
                        {{ $university_activity_credit }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body d-flex justify-content-between">
                    <div>
                        @lang('Students Activity SM Credit')
                    </div>
                    <div>
                        {{ $students_activity_credit }}
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
