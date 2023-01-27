<div>
    <div class="row">
        <div class="col-12">
            <h5 class="h5 mb-3">
                <span class="primary-text">@lang('University Fair list')</span>
                <span class="font-light light-gray">&nbsp;|&nbsp;</span>
                <a href="{{route('admin.school.fair.create')}}" class="secondary-text text-heading-light"
                   style="text-decoration: underline ">@lang('Create a New Fair')</a>
            </h5>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="my-3 font-medium alert alert-{{session('status-type') ?? 'success'}}">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="table-responsive mt-4">
                        <table class="table">
                            <thead class="primary-text">
                            <tr>
                                <td class="align-top primary-text" style="font-size:13px">#</td>
                                <td class="align-top primary-text" style="font-size:13px">@lang('Id')</td>
                                <td class="align-top primary-text" style="font-size:13px">@lang('Name')</td>
                                <td class="align-top primary-text" style="font-size:13px">@lang('Start at')</td>
                                <td class="align-top primary-text" style="font-size:13px">@lang('End at')</td>
                                <td class="align-top primary-text" style="font-size:13px">@lang('G12')</td>
                                <td class="align-top primary-text" style="font-size:13px">@lang('G11')</td>
                                <td class="align-top primary-text" style="font-size:13px" title="Registered Students">Reg.Students</td>

                                <td class="align-top primary-text" style="font-size:13px" title="@lang('Max Number Of Universities')">
                                    @lang('No.Unis')
                                </td>
                                <td class="align-top primary-text" style="font-size:13px" title="@lang('Registered Universities')">@lang('Reg.Unis')
                                </td>
                                <td class="align-top primary-text" style="font-size:13px">@lang('Action')</td>
                            </tr>
                            </thead>
                            <tbody class="text-muted align-middle">
                            <tr wire:loading.flex>
                                <td colspan="10" style="width: 100%; display: block; text-align: center">
                                    @lang('Loading')...
                                </td>
                            </tr>
                            @php
                                /**
                                * @var \App\Models\Institutes\University $university
                                * @var \Illuminate\Database\Eloquent\Collection | \Illuminate\Contracts\Pagination\LengthAwarePaginator | \App\Models\Fairs\Fair[] $fairs
                                **/
                                $school = Auth::user()->selected_school;
                            @endphp

                            @forelse($fairs as $key=>$fair)
                                <tr>
                                    <td class="align-top" style="font-size:13px">{{$loop->iteration + ($fairs->currentPage() - 1) * 10}}</td>
                                    <td class="align-top" style="font-size:13px">{{$fair->id}}</td>
                                    <td class="align-top" style="font-size:13px">{{$fair->fair_name ?? $fair->school->school_name }}</td>
                                    <td class="align-top"
                                        style="font-size:13px">{{Helpers::dayDateTimeFormat($fair->start_date)}}</td>
                                    <td class="align-top"
                                        style="font-size:13px">{{Helpers::dayDateTimeFormat($fair->start_date)}}</td>
                                    <td class="align-top" style="font-size:13px">{{$fair->school->number_grade11}}</td>
                                    <td class="align-top" style="font-size:13px">{{$fair->school->number_grade12}}</td>
                                    <td class="align-top" style="font-size:13px">
                                        <a class="primary-text" href="{{route('admin.school.fair.confirmedStudents',$fair->id)}}"
                                           title="Click to view full list">
                                            {{$fair->attendance_count}}
                                        </a>
                                    </td>
                                    <td class="align-top" style="font-size:13px">{{$fair->max}}</td>
                                    <td class="align-top" style="font-size:13px">
                                        <a class="primary-text" href="{{route('admin.school.fair.registeredUniversities',$fair->id)}}"
                                           title="Click to view full list">
                                            {{$fair->invitation_count}}
                                        </a>
                                    </td>
                                    <td class="align-center">
                                        @if($fair->is_editable)
                                            <a href="{{route('admin.school.fair.edit',$fair->id)}}" class="primary-text"><i
                                                    class="fa-solid fa-pen-to-square ic_style1"></i></a>
                                        @endif
                                        <a href="{{route('admin.school.fair.view',$fair->id)}}" class="primary-text"><i
                                                class="fa-solid fa-eye ic_style1"></i></a>
                                        <a href="{{route('admin.school.fair.performance',$fair->id)}}"
                                           title="@lang('Check Performance')" class="primary-text">
                                            <i class="fa-solid fa-dashboard ic_style1"></i></a>
                                    </td>
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
                    <div class="row">
                        <div class="col-lg-6 mt-2">
                            <p class="text-muted small2">{{$fairs->total()}} @lang('results found')</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-center mt-4 mobile-pagination">
                {!! $fairs->links() !!}
            </div>
        </div>
    </div>
</div>
