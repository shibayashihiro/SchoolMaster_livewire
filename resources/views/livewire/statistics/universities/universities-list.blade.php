<div>
    <div class="row">
        <div class="col-12 d-flex justify-content-between blue">
            <div class="h5 blue">{{ __('Selected Universities by Students') }}</div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="w-100">
                <div class="row"></div>

                <div class="table-responsive">
                    <table width="100%">
                        <tbody>
                            <!--Heading Row-->
                            <tr>
                                <td class="w-5">#</td>
                                <td class="w-45">{{ __('University') }}</td>
                                <td class="w-5">{{ __('No') }}</td>
                                <td class="w-40">%</td>
                                <td class="w-5 text-end">{{ __('View') }}</td>
                            </tr>
                            <!--End Heading row-->
                            <!--Row Start-->
                            <tr wire:loading.flex>
                                {{-- <td colspan="10" style="width: 100%; display: block; text-align: center">
                                    {{ __('Loading') }}...
                                </td> --}}
                            </tr>
                            @forelse ($universities as $key => $university)
                                <tr>
                                    <td>{{ $loop->iteration + ($universities->currentPage() - 1) * 10 }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <img src="{{ $university->logo_url }}"
                                                alt="logo" class="thumbnail">
                                            <div class="mx-2">
                                                <p class="primary-text m-0">{{ !empty($university->translated_name) ? $university->translated_name : $university->university_name }}</p>
                                                {{-- <p class="primary-text m-0"><img src="{{AppConst::ICONS.'/ur-icon-stars.png'}}" alt="UR" style="width: 20px"> {{ __('World Rank') }}# {{ $loop->iteration + ($universities->currentPage() - 1) * 10 }}, {{ __('Country Rank') }}# </p> --}}
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $university->students_count }}</td>
                                    @php
                                        $percentage = round(($university->students_count * $total_Students) ? $university->students_count / $total_Students * 100 : 0 , 1) ;
                                    @endphp
                                    <td>
                                        <div class="progress ">
                                            <div class="progress-bar bg-dark-blue" role="progressbar" style="width: {{ $percentage }}%;"
                                                aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100">{{ $percentage }}%
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-end"><a href="{{route('admin.school.statistics.universities.selectedByStudent')}}?university_id={{$university->id}}" class="primary-text"><i class="fa-solid fa-eye"></i></a></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10">
                                        <h6 class="text-center mt-4 no-records">
                                            @lang('No Record Found!')
                                        </h6>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="d-flex justify-content-between align-items-center flex-wrap my-2 small5">
        <label class="primary-text">{{ $majors->total() }} Different Majors Info</label>
    </div> --}}

    <div class="d-flex justify-content-center mt-4 mobile-pagination">
        {!! $universities->links() !!}
    </div>
</div>
