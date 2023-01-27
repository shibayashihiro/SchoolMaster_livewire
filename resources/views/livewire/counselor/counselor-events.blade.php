<div x-data="{ showFilters: false }" class="w-100">
    <div class="d-flex justify-content-between pb-2 pe-3">
        <h5 class="blue h5">{{__('Upcoming Counselor '.$type)}}</h5>
    </div>
    <div class="row align-items-center my-3 d-md-flex small5" :class="showFilters ? '' : 'd-none'">
        <div class="col-12 col-md-3">
            <select wire:model="country_id" name="country_id" class="input-field form-control me-2" aria-label=""
                wire:change='loadCounselor'>
                <option value=""> {{ __('All Country') }}</option>
                @foreach ($countries as $country)
                    <option value="{{ $country->id }}">
                        {{ !empty($country?->translated_name) ? $country?->translated_name : $country->country_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="w-100 d-block d-md-none my-1"></div>
        <!--to force new line-->
        <div class="col-12 col-md-3">
            <select wire:model="location_id" name="location_id" class="input-field form-control me-2" aria-label=""
                wire:change="loadCounselor">
                <option value=""> {{ __('All Cities') }}</option>
                @foreach ($locations as $location)
                    <option value="{{ $location->id }}">
                        {{ !empty($location?->translated_name) ? $location?->translated_name : $location->city_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-12 col-md-3">
            <x-elements.date-range-picker wire:model="dateRange" wire:change='loadCounselor'
                placeholder="Select Period" />
        </div>
        <div class="w-100 d-block d-md-none my-1"></div>
        <!--to force new line-->
        <div class="col-12 col-md-3 ">
            <label class="primary-text float-end">
                <input type="checkbox" class="ur-checkbox"> {{ __('Show Only SchoolsMater Events') }}
            </label>
        </div>
    </div>
    <!-- Body Body Top End-->
    <!-- Card 1 start -->
    <div wire:loading.inline>
        <h6 class="text-center mt-2">
            @lang('Loading...')
            <i class="fas fa-spinner fa-pulse" aria-hidden="true"></i>
        </h6>
    </div>
    @php
        use Carbon\Carbon;
    @endphp
    @foreach ($counselorCourses as $counselorCourse)
        <div class="row my-2">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <img src="{{ $counselorCourse->image }}" class="w-100">
                            </div>
                            <div class="col-lg-9">
                                <h5 class="h5 blue">{{ $counselorCourse->title }}</h5>
                                <p class="paragraph-style2 blue">{{ $counselorCourse->description }}<span
                                        style="margin-left: 1rem"><a class="light-blue" href="{{$counselorCourse->url}}" target="_blank">{{ __('Read More') }}</a></span></p>
                            </div>

                        </div>
                        @php
                            $start_date = Carbon::create($counselorCourse->start_datetime)->toFormattedDateString();
                            $end_date = Carbon::create($counselorCourse->end_datetime)->toFormattedDateString();
                            $countryName = !empty($counselorCourse->country?->translated_name) ? $counselorCourse->country?->translated_name : $counselorCourse->country->country_name;
                            $cityName = !empty($counselorCourse->city?->translated_name) ? $counselorCourse->city?->translated_name : $counselorCourse->city?->city_name;
                        @endphp
                        <div class="row lower-light-blue-div ">
                            <div class="col-lg-3 light-blue light-blue-text text-start">{{ __('Event Location') }}:
                                {{ $cityName . ' , ' . $countryName }}</div>
                            <div class="col-lg-2 light-blue light-blue-text">{{ $start_date }} - {{ $end_date }}
                            </div>
                            <div class="col-lg-2 light-blue light-blue-text">
                                {{ __('Price') }}:{{ $counselorCourse->fee }}</div>
                            <div class="col-lg-2 light-blue light-blue-text">{{ __('Source') }}:
                                {{ $counselorCourse->source }}</div>
                            <div class="col-lg-3 light-blue light-blue-text"><a class="light-blue"
                                    href="{{ $counselorCourse->url }}">{{ __('More Information and Booking') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Card 2 close -->
    @unless(empty($counselorCourses))
        <div class="row mt-3">
            <div class="col-lg-6 mt-2">
                <p class="text-muted small2">{{ $counselorCourses->total() }} @lang('results found')</p>
            </div>
            <div class="col-12">
                <div class="d-flex justify-content-center mt-4 mobile-pagination">
                    {{ $counselorCourses->links() }}
                </div>
            </div>
        </div>
    @endunless
</div>
