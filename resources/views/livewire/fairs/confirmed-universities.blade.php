<div class="col-lg-12 col-sm-12">
    <div class="w-100">
        <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <div class="h5 blue">@lang('Report Representative Attendance')</div>
                <a href="" class="light-blue d-none d-md-block" data-bs-toggle="modal"
                   data-bs-target="#staticBackdrop2">@lang('Announce an Update')</a>
            </div>
        </div>
        <div class="row align-items-center my-3 d-md-flex d-none">
            <div class="col-md-4">
                <select class="input-field form-control" aria-label="" wire:model="status_id" wire:change="loadUniversities">
                    <option value="">@lang('Status')</option>
                    <option value="{{ \AppConst::UNIVERSITY_ATTENDANCE_NOT_ARRIVED }}">@lang('Didnt show')</option>
                    <option value="{{ \AppConst::UNIVERSITY_ATTENDANCE_ARRIVED }}">@lang('Arrived')</option>
                </select>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-12">
                @if (session('status'))
                    <div class="mb-4 font-medium alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                @forelse($confirmedUniversities as $key=>$invitation)
                    @php
                        $confirmedUniversity = $invitation->university;
                    @endphp
                    <div class="card mt-3">
                        <div class="row p-2">
                            <div class="col-lg-2 col-md-2">
                                <div class=""><img src="{{ $confirmedUniversity?->logo_url ?? '' }}" width="95px"></div>
                            </div>
                            @if(!is_null($invitation->university_attendance_status))
                            <div id="reset_div_{{ $confirmedUniversity->id }}" class="col-lg-10 col-md-10">
                                <div class="d-flex flex-column justify-content-between">
                                    <div class="w-100 d-block d-md-none my-1"></div>
                                    <div class="row">
                                        <div
                                            class="h5 blue col-lg-8">{{ $confirmedUniversity?->university_name ?? 'N/A' }}</div>
                                        <div class="col-lg-4 text-place-end" style="cursor: pointer">
                                            <a class="light-blue" wire:click="showButtons({{ $invitation->id }})">reset</a>
                                        </div>
                                    </div>
                                    <div class="row d-flex justify-content-end" style="margin-top: 30px">
                                        @if($invitation->university_attendance_status == \AppConst::UNIVERSITY_ATTENDANCE_NOT_ARRIVED)
                                            <div class="red h5 text-place-end">@lang("Didn't show up")</div>
                                        @elseif($invitation->university_attendance_status == \AppConst::UNIVERSITY_ATTENDANCE_ARRIVED)
                                            <div class="green h5 text-place-end">@lang("Arrived")</div>
                                        @elseif($invitation->university_attendance_status == \AppConst::UNIVERSITY_ATTENDANCE_LATE)
                                            <div class="orange h5 text-place-end">@lang("Late")</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if(is_null($invitation->university_attendance_status))
                            <div id="btn_div_{{ $confirmedUniversity->id }}" class="col-lg-10 col-md-10">
                                <div class="d-flex flex-column justify-content-between">
                                    <div class="w-100 d-block d-md-none my-1"></div>
                                    <div class="row">
                                        <div class="h5 blue">{{ $confirmedUniversity?->university_name ?? 'N/A' }}</div>
                                    </div>
                                    <div class="row" style="margin-top: 20px">
                                        <div class="col-md-4 col-12 mobile-button-padding">
                                            <div class="w-100 d-block d-md-none my-1"></div>
                                            <button class="button-sm button-blue w-100"><a href="tel:{{$confirmedUniversity->admin->user_bio?->mobile_number ?? ''}}">Call The Representative</a></button>
                                        </div>
                                        <div class="col-md-3 col-12 mobile-button-padding">
                                            <div class="w-100 d-block d-md-none my-1"></div>
                                            <button class="button-sm button-red w-100">@lang('Send Reminder')</button>
                                        </div>
                                        <div class="col-md-3  col-12 mobile-button-padding">
                                            <div class="w-100 d-block d-md-none my-1"></div>
                                            <button class="button-sm button-red w-100" wire:click="notArrived({{ $invitation->id }})">@lang("Didn't show up")</button>
                                        </div>
                                        <div class="col-md-2  col-12 mobile-button-last">
                                            <div class="w-100 d-block d-md-none my-1"></div>
                                            <button class="button-sm button-green w-100" wire:click="arrived({{ $invitation->id }})">@lang('Arrived')</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    @empty
                        <h6 class="text-center mt-4 no-records">
                            No Record Found !
                        </h6>
                    @endforelse
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h5 blue" id="staticBackdropLabel">Send an update to universities
                    representative</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="ps-4 pe-4">
                <div class="ps-2 pe-2">
                    <hr>
                </div>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="h-100">
                                <textarea class="form-control input-textarea" rows="3"
                                          placeholder="write and update"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="text-place-end mt-3">
                                <button class="button-blue w-16 button-sm mobile-btn">Send</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
