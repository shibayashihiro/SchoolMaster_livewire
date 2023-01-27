<div>
    <div class="card">
        <div class="card-body">
            <div class="w-100">
                <div class="row">
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <!--Heading Row-->
                            <tr>
                                <td>#</td>
                                <td class="w-40">{{ __('Majors') }}</td>
                                <td class="w-40">{{ __('Percentage') }}</td>
                                <td>%</td>
                                <td>{{ __('No') }}</td>
                                <td>{{ __('View') }}</td>
                            </tr>
                            <!--End Heading row-->
                            <!--Row Start-->
                            <tr wire:loading.flex>
                                {{-- <td colspan="10" style="width: 100%; display: block; text-align: center">
                                    {{ __('Loading') }}...
                                </td> --}}
                            </tr>
                            @forelse ($majors as $key => $major)
                                <tr>
                                    <td>{{ $loop->iteration + ($majors->currentPage() - 1) * 10 }}</td>
                                    <td>
                                        <label class="primary-text">
                                            {{ $major->title }}
                                        </label>
                                    </td>
                                    <td>
                                        @php
                                            $percentage = round(($major->students_count * $total_Count) ? round($major->students_count / $total_Count * 100, 1) : 0 , 1) ;
                                        @endphp
                                        <div class="progress ">
                                            <div class="progress-bar bg-dark-blue" role="progressbar"
                                                style="width: {{ $percentage }}%;" aria-valuenow="{{ $percentage }}" aria-valuemin="0"
                                                aria-valuemax="100">
                                                {{ $percentage }}%
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $percentage }}%</td>
                                    <td>{{ $major->students_count }}</td>
                                    <td><a href="{{route('admin.school.statistics.majors.selectedByStudent')}}?major_id={{$major->id}}" class="primary-text"><i class="fa-solid fa-eye"></i></a></td>
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

    <div class="d-flex justify-content-between align-items-center flex-wrap my-2 small5">
        <label class="primary-text">{{ $majors->total() }} {{ __('Different Majors Info') }}</label>
    </div>

    <div class="d-flex justify-content-center mt-4 mobile-pagination">
        {!! $majors->links() !!}
    </div>
</div>
