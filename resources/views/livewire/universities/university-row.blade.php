@php
    /** @var \App\Models\Institutes\University $university */
@endphp
<div class="py-2 card border mt-3">
    <div class="d-flex">
        <div class="d-none d-md-flex listing-left-side ms-2">
            <div class="uni-logo">
                <a href="javascript:void(0)"  data-bs-toggle="modal" data-bs-target="#visit-profile-modal">
                    <div class="row-listing-new-image" style="min-width: 120px; height: 120px">
                        <img class="rounded" loading="lazy" alt="{{$university->translated_name}}"
                             src="{{$university->logo_url}}"/>
                    </div>
                </a>
            </div>
        </div>

        <div class="flex-fill listing-row-main-content">
            <div class="d-flex">
                <div class="" style="width: 99%">
                    <a href="javascript:void(0)" class="pointer text-decoration-none" data-bs-toggle="modal" data-bs-target="#visit-profile-modal">
                        <h4 class="primary-text">
                            {!! (!empty($university->short_name) ? $university->short_name." | ":"")!!}
                            {!!(!empty($university->translated_name)? $university->translated_name :$university->university_name) !!}
                        </h4>
                    </a>
                </div>
            </div>
            <div class="mb-2">
                <i class="fas fa-map-marker-alt text-primary"></i>
                <span class="text-muted">{!! $university->address1 ?? $university->country?->country_name !!}</span>
                @if(!empty($university->universityStatus))
                    <span class="mx-1">|</span>
                    <span
                        style="color: {{$university->universityStatus->text_color}}">{!! $university->universityStatus->title!!}</span>
                @endif
            </div>

            <div class="d-flex justify-content-between items-center me-2">
                <div>
                    <div class="buttons_list_area ranking_info">
                        @if((!empty($university->universityStatus) && !$university->universityStatus->show_rank) ||  empty($university->rankingPositions))
                            <p class="county">Country # N/A</p>
                            <p class="region">Region # N/A</p>
                            <p class="world bg-light-grey primary-text">World # N/A</p>
                        @else
                            <p class="county">Country # {{$university->rankingPositions->country_rank}}</p>
                            <p class="region">{{$university->country->region->name}}
                                # {{$university->rankingPositions->continent_rank}}</p>
                            @if(!empty($university->country->region_2))
                                <p class="county">{{$university->country->region_2->name}}
                                    # {{$university->rankingPositions->continent_2_rank}}</p>
                            @endif
                            @if(!empty($university->country->region_3))
                                <p class="region">{{$university->country->region_3->name}}
                                    # {{$university->rankingPositions->continent_3_rank}}</p>
                            @endif
                            <p class="world bg-light-grey primary-text">
                                World # {{$university->rankingPositions->world_rank}}
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @if($university?->elite)
            <div class="d-none d-md-block elite_logo me-2">
                <img style="cursor: pointer" title="Uniranks {{$university?->elite?->package?->title}} Award"
                     src="{{$university?->elite?->package?->image_url}}"
                     alt="{{$university?->elite?->package->title}}"
                     onclick="openFullImage('{{$university?->elite?->package?->full_image_url}}')"/>
            </div>
        @endif
    </div>
</div>
