<div>
    <div class="w-100" x-data="{ showFilters:false }">
        <div class="row mt-3 mt-md-0">
            <div class="col-12 d-flex justify-content-between blue">
                <div class="h4 blue">Fair&nbsp;{{ucfirst($status)}} Universities</div>
                <i class="d-md-none fas fa-filter pointer blue blue" @click="showFilters = !showFilters"></i>
            </div>
        </div>
        <div class="row mt-3 align-items-center d-md-flex" x-cloak :class="showFilters ? '':'d-none'">
            <div class="col-12 col-md-3">
                <livewire:pages.components.countries-dropdown/>
            </div>
            <div class="col-12 col-md-3 mobile-marg">
                <livewire:fairs.components.invitations-status-filter/>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="w-100">
                        {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
                        <div wire:loading.inline>
                            <h6 class="text-center mt-2">
                                Loading Universities
                                <i class="fas fa-spinner fa-pulse" aria-hidden="true"></i>
                            </h6>
                        </div>
                        @php
                            /*** @var \App\Models\Institutes\University $university
                            * @var \Illuminate\Database\Eloquent\Collection | \App\Models\Fairs\Invitation[] $universities*/
                        @endphp

                        @forelse($universities as $key=>$invitation)
                            @php
                                $university = $invitation->university;
                            @endphp
                            <div class="row mx-0 align-items-center mt-3 border rounded p-2 bg-white" :wire:key="'row-lg-'.$university->id">
                                <div class="col-lg-2 px-0">
                                    <img src="{{$university->logo_url}}" alt="{{$university->university_name}}" style="max-width: 100px">
                                </div>
                                <div class="col-lg-7">
                                    <div class="pe-3">
                                        <p class="h5 primary-text">{{$university->translated_name ?? $university->university_name }}</p>
                                        <p class="paragraph-style2 primary-text">
                                            {{Str::limit($university->description, 160)}}
                                            <a href="#" class="text-light-blue">read more.</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-3 text-end pe-1">
                                    <div class="d-flex justify-content-end align-items-center mt-1">
                                        <img src="{{AppConst::ICONS.'/ur-icon-stars.png'}}" alt="UR logo"
                                             style="width:30px">
                                        <div class="primary-text">
                                            <p class="small5 mb-0">
                                                World Rank
                                                #{{$university->rankingPositions?->world_rank ?? "N/A"}}
                                            </p>
                                            <p class="small5 mb-0">
                                                Local Rank
                                                #{{$university->rankingPositions?->country_rank ?? "N/A"}}
                                            </p>
                                        </div>
                                    </div>
                                    <p class="small5 text-light-blue fw-bold"></p>
                                    <div class="btn3">
                                        @if(in_array($invitation->accepted_by_school,[AppConst::REGISTARTION_PENDING,AppConst::REGISTARTION_ACCEPTED]))
                                            <button class="button-red button-sm d-inline w-45"
                                                    wire:click="rejected({{$invitation->id}})">Reject
                                            </button>
                                        @endif
                                        @if(in_array($invitation->accepted_by_school,[AppConst::REGISTARTION_PENDING,AppConst::REGISTARTION_REJECTED]))
                                            <button class="button-blue button-sm d-inline w-45"
                                                    wire:click="accepted({{$invitation->id}})">Accept
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @empty
                            <h6 class="text-center mt-4 no-records">
                                No Record Found !
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
