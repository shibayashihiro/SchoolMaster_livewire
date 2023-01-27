<div>
    <div class="row">
        <div class="col-12 d-flex justify-content-between">
            <div class="h4 text-blue">@lang('Share School Registration Link')</div>
            <div class="d-flex align-items-center">
                <select class="form-select input-field">
                    <option value="">Select Size</option>
                </select>
                <i class="fas fa-print primary-text mx-2"></i>
            </div>
        </div>
    </div>
    @php
        /**
        * @var \App\Models\Institutes\School $school;                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  */
    @endphp
    <div class="row my-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="w-100">
                        <div class="d-flex justify-content-center align-items-center flex-column">
                            <img src="{{AppConst::SITE_LOGOS}}/Logo-stars-v1.png" class="w-75 mb-3">
                            <p class="h2 primary-text mb-3">@lang('Your future begin here')</p>
                            <div class="school-qr">
                                {!! QrCode::size(300)->color(28, 52, 90)->generate($qr_data)  !!}
                            </div>
                            <p class="h2 primary-text mt-3">@lang('Scan Me')</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
