<div>
    <div class="row">
        <div class="col-12 d-flex justify-content-between blue">
            <div class="h5 blue">{{ __('List of Destinations Selected by Students') }}</div>
        </div>
    </div>

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
                                <td class="w-40">{{ __('Country') }}</td>
                                <td class="w-40">{{ __('Percentage') }}</td>
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
                            @forelse ($destinations as $key => $destination)
                                <tr>
                                    <td>{{ $loop->iteration + ($destinations->currentPage() - 1) * 10 }}</td>
                                    <td>
                                        <label class="primary-text">
                                            <img src="{{ $destination->flag_url }}"> {{ !empty($destination?->translated_name) ? $destination?->translated_name : $destination->country_name }}
                                        </label>
                                    </td>
                                    @php
                                        $percentage = round(($destination->students_count * $total_Count) ? $destination->students_count / $total_Count * 100 : 0, 1);
                                    @endphp

                                    <td>
                                        <div class="progress ">
                                            <div class="progress-bar bg-dark-blue" role="progressbar"
                                                style="width: {{ $percentage }}%;" aria-valuenow="{{ $percentage }}" aria-valuemin="0"
                                                aria-valuemax="100">
                                                {{ $percentage }}%
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $destination->students_count }}</td>
                                    <td><a href="{{route('admin.school.statistics.destinations.selectedByStudent')}}?destination_id={{$destination->id}}" class="primary-text"><i class="fa-solid fa-eye"></i></a></td>
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

    @unless(empty($destinations))
    <div>
        <div class="d-flex justify-content-between align-items-center flex-wrap my-2 small5">
            <label class="primary-text">{{ $destinations->total() }} {{ __('Different Selected Destinations Info') }}</label>
        </div>

        <div class="d-flex justify-content-center mt-4 mobile-pagination">
            {!! $destinations->links() !!}
        </div>
    </div>
    @endunless
</div>
