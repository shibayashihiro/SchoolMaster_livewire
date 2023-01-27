<div x-data="{ showFilters: false }" class="w-100">
    <div class="d-flex justify-content-between ps-3 pb-2 pe-3">
        <h5 class="blue h5">{{ __('Upcoming University Open Day') }}</h5>
    </div>
    <div class="row align-items-center my-3 d-md-flex small5" :class="showFilters ? '' : 'd-none'">
        <div class="col-12 col-md-3">
            <select wire:model="country_id" name="country_id" class="input-field form-control me-2" aria-label=""
                    wire:change='loadEvents'>
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
            <x-elements.date-range-picker wire:model="dateRange" wire:change='loadEvents'
                placeholder="Select Period" />
        </div>
    </div>

    <!-- Card 1 start -->

    <div class="row my-2">
        <div class="col-12">

            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-self-start">
                        <div class="university-img-div">
                            <img src="./assets/oxford.png" class="univeristy-img">
                        </div>
                        <div class="align-self-center ms-3">
                            <div class="top-content">
                                <div class="col-lg-4">
                                    <h5 class="h5 blue">Hariot-watt University Malaysia</h5>
                                </div>
                                <div class="col-lg-3 light-blue light-blue-text text-end">2-10-2022 from 1PM-3PM
                                </div>
                                <div class="col-lg-3 light-blue light-blue-text text-end">Grade 10,11,12,13
                                </div>
                                <div class="col-lg-2 light-blue light-blue-text text-end">10 Students Max</div>
                            </div>
                            <div class="top-content align-items-end">
                                <div class="col-lg-7">
                                    <p class="paragraph-style2 blue regsiter-content-div">Lorem Ipsum is simply
                                        dummy text of the printing and typesetting industry. Lorem
                                        Ipsum has been the industry's standard dummy.Lorem Ipsum is simply dummy
                                        text of the printing and typesetting industry.
                                        <span>
                                            <a href="javascript:void(0)"
                                                class="secondary-text" data-bs-toggle="modal"
                                                data-bs-target="#readmore">Read
                                                More</a>
                                        </span>
                                    </p>
                                </div>
                                <div class="col-lg-3"></div>
                                <div class="col-lg-2 text-end">
                                    <button class="button-sm button-blue m-0 regsiter-button-div">Register</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Card 1 Close -->
</div>
<!-- modal -->
<div class="modal fade" id="readmore" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="Read More" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h5 blue" id="staticBackdropLabel">Upcoming University Open Day</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <div class="d-flex align-self-start">
                        <div class="university-img-div">
                            <img src="./assets/oxford.png" class="univeristy-img">
                        </div>
                        <div class="align-self-center ms-3">
                            <div class="top-content">
                                <div class="col-lg-6">
                                    <h5 class="h5 blue">Hariot-watt University Malaysia</h5>
                                </div>
                            </div>
                            <div class="align-self-center ms-3">
                                <div class="top-content">

                                    <div class="col-lg-6 light-blue light-blue-text">2-10-2022 from 1PM-3PM</div>
                                </div>
                                <div class="top-content">
                                    <div class="col-lg-6 light-blue light-blue-text">Grade 10,11,12,13</div>

                                </div>
                                <div class="top-content">

                                    <div class="col-lg-6 light-blue light-blue-text">10 Students Max</div>
                                </div>

                                <div class="top-content align-items-end">
                                    <div class="col-lg-10">
                                        <p class="paragraph-style2 blue regsiter-content-div">Lorem Ipsum is simply
                                            dummy text of the printing and typesetting industry. Lorem
                                            Ipsum has been the industry's standard dummy.Lorem Ipsum is simply dummy
                                            text of the printing and typesetting industry.</p>
                                        <p class="paragraph-style2 blue regsiter-content-div">Lorem Ipsum is simply
                                            dummy text of the printing and typesetting industry. Lorem Ipsum has been
                                            the industry's standard dummy text ever since the 1500s, when an unknown
                                            printer took a galley of type and scrambled it to make a type specimen book.
                                            It has survived not only five centuries, but also the leap into electronic
                                            typesetting, remaining essentially unchanged. It was popularised in the
                                            1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                                            and more recently with desktop publishing software like Aldus PageMaker
                                            including versions of Lorem Ipsum.</p>
                                        <p class="paragraph-style2 blue regsiter-content-div"></p>
                                    </div>
                                </div>
                                <div>
                                    <div class="col-lg-5">
                                        <button class="button-sm button-blue m-0 regsiter-button-div">Register</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End-modal -->
