<div>
    <div class="mt-3 mt-md-0"  x-data="{ showFilters:false }">
        <div class="row">
            <div class="col-lg-12 col-12 d-flex justify-content-between">
                <h4 class="h4 text-blue d-inline">@lang('Career Talk Registered Universities')</h4>
                <i class="d-md-none fas fa-filter pointer blue blue" @click="showFilters = !showFilters"></i>
            </div>
        </div>
        <div class="row mt-3 align-items-center d-md-flex" x-cloak :class="showFilters ? '':'d-none'">
            <div class="col-lg-4">
                <livewire:pages.components.countries-dropdown/>
            </div>
            <div class="col-lg-4 mobile-marg">
                <select id="sessions-filter" class="h-100 text-start form-control input-field"
                        aria-label="filter university by status"
                        wire:model="session_id">
                    <option value="" selected>@lang('All Sessions')</option>
                    @foreach($fair->sessions as $session)
                        <option value="{{$session->id}}">{{$loop->iteration}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-4 mobile-marg">
                <select id="major-filter" class="h-100 text-start form-control input-field"
                        aria-label="filter university by status"
                        wire:model="major_id">
                    <option value="" selected>@lang('All Majors')</option>
                    @foreach($fair->majors as $major)
                        <option value="{{$major->id}}">{{$major->title}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">

                @php
                    /**
                    * @var \App\Models\Institutes\University $university
                    * @var \App\Models\Fairs\FairSession $session
                    * @var \Illuminate\Database\Eloquent\Collection<\App\Models\Fairs\FairReserveSessionRequest> $universities
                    * @var \App\Models\Fairs\Fair $fair
                    * @var \App\Models\General\Major $major
                    */
                @endphp
                <div class="card-body">
                    <div class="w-100">
                        {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
                        <div wire:loading.inline>
                            <h6 class="text-center mt-2">
                                @lang('Loading Universities')
                                <i class="fas fa-spinner fa-pulse" aria-hidden="true"></i>
                            </h6>
                        </div>
                        @forelse($universities as $key=>$invitation)
                            @php
                                $university = $invitation->university;
                                $session = $invitation->session;
                            @endphp
                            <div class="row mx-0 align-items-center mt-3 border rounded p-2 bg-white"
                                 :wire:key="'row-lg-'.$university->id">
                                <div class="col-lg-2 px-0">
                                    <img src="{{$university->logo_url}}" alt="{{$university->university_name}}" style="max-width: 100px">
                                </div>
                                <div class="col-lg-7">
                                    <div class="pe-3">
                                        <p class="h5 primary-text">{{$university->translated_name ?? $university->university_name }}</p>
                                        <p class="paragraph-style2 primary-text">
                                            {{Str::limit($university->description, 160)}}
                                            <a href="#" class="text-light-blue">@lang('read more').</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-3 text-end pe-1">
                                    <div class="d-flex justify-content-end align-items-center mt-1">
                                        <img src="{{AppConst::ICONS.'/ur-icon-stars.png'}}" alt="UR logo"
                                             style="width:30px">
                                        <div class="primary-text">
                                            <p class="small5 mb-0">
                                                @lang('World Rank')
                                                #{{$university->rankingPositions?->world_rank ?? "N/A"}}
                                            </p>
                                            <p class="small5 mb-0">
                                                @lang('Local Rank')
                                                #{{$university->rankingPositions?->country_rank ?? "N/A"}}
                                            </p>
                                        </div>
                                    </div>
                                    <p class="small5 text-light-blue">Slot {{$session->hall_number}}
                                        , {{$session->major->title}}</p>
                                    <div class="btn3">
                                        @if($fair->active_status == \App\Models\Fairs\Fair::PAST)
                                            <span class="small5 text-danger">
                                    @lang('Session Expired')
                                </span>
                                        @else
                                            @empty($session->university_id)
                                                @if(in_array($invitation->status,[AppConst::REGISTARTION_PENDING]))
                                                    <button class="button-red button-sm d-inline w-45"
                                                            wire:click="rejected({{$invitation->id}})">@lang('Reject')
                                                    </button>
                                                    <button class="button-blue button-sm d-inline w-45"
                                                            wire:click="accepted({{$invitation->id}})">@lang('Accept')
                                                    </button>
                                                @endif
                                            @else
                                                @if(in_array($invitation->status,[AppConst::REGISTARTION_ACCEPTED]))
                                                    <button class="button-warning button-sm btn-sm d-inline w-45"
                                                            wire:click="revoke({{$invitation->id}})">@lang('Revoke')
                                                    </button>
                                                    <button class="button-green button-sm d-inline w-45">@lang('Taken')</button>
                                                @else
                                                    <span class="small5 text-danger">@lang('Slot Taken') </span>
                                                @endif
                                            @endempty
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @empty
                            <h6 class="text-center mt-4 no-records">
                                @lang('No Record Found')!
                            </h6>
                        @endforelse

                    </div>
                    <!--data slot end-->
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <div class="d-flex justify-content-center mt-4 mobile-pagination">
                {!! $universities->links() !!}
            </div>
        </div>
    </div>
</div>
