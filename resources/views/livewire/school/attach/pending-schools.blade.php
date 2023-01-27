<div>
    @if($user_schools->count() > 0)
    <div class="row mt-3">
        <div class="col-12">
            <div class="h4 text-blue">@lang('Pending link school requests')</div>
        </div>
    </div>
    @php
        /**
        * @var \App\Models\Institutes\School $user_school
        **/
    @endphp
    @foreach($user_schools as $user_school)
        <div class="row my-2">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3 d-flex justify-content-between">
                        {{$user_school->school_name}}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @endif
</div>
