<div>
    <!--data slot start-->
    @php
        /**
        * @var \App\Models\Institutes\School $school
        */
    @endphp
    <div class="w-100" x-data="{ showFilters:false }">
        <div class="row mt-3 mt-md-0">
            <div class="col-12 d-flex justify-content-between blue">
                <div class="h4 blue">@lang('Universities')</div>
                <i class="d-md-none fas fa-filter pointer blue blue" @click="showFilters = !showFilters"></i>
            </div>
        </div>
        <div class="row mt-3 align-items-center d-md-flex" x-cloak :class="showFilters ? '':'d-none'">
            <div class="col-12 col-md-3">
                <livewire:pages.components.continents-dropdown/>
            </div>
            <div class="col-12 col-md-3 mobile-marg">
                <livewire:pages.components.countries-dropdown />
            </div>
        </div>
    </div>

    <div class="w-100">
        <div wire:loading.inline>
            <h6 class="text-center mt-2">
                @lang('Loading Universities')
                <i class="fas fa-spinner fa-pulse" aria-hidden="true"></i>
            </h6>
        </div>
        @php
            /** @var \App\Models\Institutes\University $university */
        @endphp

        @forelse($universities as $key=>$university)

            <!-- row # {{$loop->iteration}} start -->
            <livewire:universities.university-row :university="$university" :wire:key="'row-lg-'.$university->id" />
            <!-- row # {{$loop->iteration}} end -->
        @empty
            <h6 class="text-center mt-4 no-records"> @lang('No Record Found !') </h6>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-4 mobile-pagination">
        {!! $universities->links() !!}
    </div>

    <!--data slot end-->
    @push(AppConst::PUSH_JS)
        <script>
            Livewire.on('goToTop', () => {
                window.scrollTo({
                    top: 350,
                    left: 15,
                    behaviour: 'smooth'
                })
            })
        </script>
    @endpush
</div>
