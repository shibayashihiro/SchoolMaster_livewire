<div>
    @php
        /**
        * @var  \App\Models\Fairs\Fair $fair
        **/
    @endphp
    <div x-data="{ showFilters: false }" class="w-100">
        <div class="row">
            <div class="col-12 d-flex justify-content-between blue">
                <div class="h5 blue">{{ __('Students that attended') }} :  {{ $fair->fair_name ?? $fair->school?->school_name }} {{$fair->eventType?->name}}</div>
                <i class="d-md-none fas fa-filter pointer blue" @click="showFilters = !showFilters"></i>
            </div>
        </div>
        <div class="row align-items-center my-3 small5 d-md-flex" :class="showFilters ? '' : 'd-none'">
            <div class="col-12 col-md-3">
                <select wire:model="major_id" name="major_id" wire:change='loadStudents' class="input-field form-control me-2" aria-label="">
                    <option value=""> {{ __('All Majors') }}</option>
                    @foreach ($majors as $major)
                        <option value="{{ $major->id }}">{{ $major?->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="w-100 d-block d-md-none my-1"></div>
            <div class="col-12 col-md-3">
                <select wire:model="university_id" name="university_id" wire:change='loadStudents' class="input-field form-control me-2" aria-label="">
                    <option value=""> {{ __('All Universities') }}</option>
                    @foreach ($universities as $university)
                        <option value="{{ $university->id }}">{{ !empty($university?->translated_name) ? $university?->translated_name : $university->university_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="w-100 d-block d-md-none my-1"></div>
            <div class="col-12 col-md-3">
                <select wire:model="destination_id" name="destination_id" wire:change='loadStudents' class="input-field form-control me-2" aria-label="">
                    <option value=""> {{ __('All Destinations') }}</option>
                    @foreach ($destinations as $destination)
                        <option value="{{ $destination->id }}">{{ !empty($destination?->translated_name) ? $destination?->translated_name : $destination->country_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-1 mobile-hidden"></div>
            <div class="w-100 d-block d-md-none my-1"></div>
            <!--to force new line-->
            <div class="col-12 d-flex col-md-5">
            </div>
        </div>
        <div class="card">
            <div id="event_lead">
                <div class="card-body">


                    <div class="table-responsive">
                        <table width="100%" class="table">
                            <tbody>
                                <!--Heading Row-->
                                <tr>
                                    <td class="w-1">#</td>
                                    <td class="w-2">{{ __('SID') }}</td>
                                    <td class="w-5">{{ __('Photo') }}</td>
                                    <td class="w-20">{{ __('Name') }}</td>
                                    <td class="w-20">{{ __('Major') }}</td>
                                    <td class="w-27">{{ __('University') }}</td>
                                    <td class="w-15">{{ __('Destination') }}</td>
                                </tr>
                                <!--End Heading row-->
                                <!--Row Start-->
                                @foreach ( $students as $student )
                                    @php
                                        $major = $selected_major ?? $student->majors->first();
                                        $university = $selected_university ?? $student->preferredUniversities->first();
                                        $destination = $selected_destination ?? $student->studyDestinations->first();
                                    @endphp
                                    <tr>
                                        <td>{{$loop->index + 1 + ($students->currentPage()-1) * $students->perPage()}}</td>
                                        <td>{{ $student->id }}</td>
                                        <td><img src="{{ $student->profile_photo_url }}" class="student-photo" alt="{{ $student->name }}"></td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ empty($major) ? '' : (!empty($major->translated_name) ? $major->translated_name : $major->title) }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <img src="{{ $university->logo_url }}"
                                                    alt="{{ !empty($university?->translated_name) ? $university?->translated_name : $university->university_name }}" class="thumbnail">
                                                <div class="mx-2 align-self-center">
                                                    <p class="primary-text m-0">{{ !empty($university->translated_name) ? $university->translated_name : $university->university_name }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td><img src="{{ $destination->flag_url }}" class="rounded-circle"> {{ !empty($destination->translated_name) ? $destination->translated_name : $destination->country_name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <div>
        <p></p>
    </div>
    <div class="d-flex justify-content-center mt-4 mobile-pagination">
        {!! $students->links() !!}
    </div>
</div>
