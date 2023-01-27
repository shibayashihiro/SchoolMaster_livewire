<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body row">
                <div class="col-12 d-flex justify-content-between align-items-center">
                    <div class="h5 blue">@lang('New Student Application')</div>
                </div>
                <div class="col-12 table-responsive">
                    <table class="table">
                        <thead class="primary-text">
                            <th class="align-top primary-text text-center">#</th>
                            <th class="align-top primary-text text-center" style="font-size:13px">@lang('Name')</th>
                            <th class="align-top primary-text text-center" style="font-size:13px">@lang('Photo')</th>
                            <th class="align-top primary-text text-center" style="font-size:13px">@lang('Country')</th>
                            <th class="align-top primary-text text-center" style="font-size:13px">@lang('Program')</th>
                            <th class="align-top primary-text text-center" style="font-size:13px">@lang('University')</th>
                        </thead>
                        <tbody class="align-center">
                        @forelse($students as $student)
                            <tr>
                                <td class="align-center text-center" style="width: 5%">{{ $loop->iteration + ($students->currentPage() - 1) * 10 }}</td>
                                <td class="align-center text-center" style="width: 20%">{{ $student->name }}</td>
                                <td class="align-center text-center" style="width: 5%">
                                    <img src="{{ $student->profile_photo_url }}" class="navbar-user-avatar" alt="{{ $student->name }}">
                                </td>
                                <td class="align-center text-center" style="width: 20%">{{ $student->studyDestinations?->first()->country_name ?? 'N/A'}}</td>
                                <td class="align-center text-center" style="width: 20%">{{ $student->majors?->first()->title ?? 'N/A'}}</td>
                                <td class="align-center" style="width: 30%">
                                    <img class="thumbnail" src="{{ $student->preferredUniversities?->first()->logo_url ?? '' }}" alt="{{ $student->preferredUniversities?->first()->university_name ?? ''}}">&nbsp;&nbsp;&nbsp;&nbsp;{{ $student->preferredUniversities?->first()->university_name ?? 'N/A'}}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="14">
                                    <h6 class="text-center mt-4 no-records">
                                        @lang('No Record Found!')
                                    </h6>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                @unless(empty($students))
                    <div class="row">
                        <div class="col-lg-6 mt-2">
                            <p class="text-muted small2">{{$students->total()}} @lang('results found')</p>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="d-flex justify-content-center mt-4 mobile-pagination">
                                {{ $students->links() }}
                            </div>
                        </div>
                    </div>
                @endunless
            </div>
        </div>
    </div>
</div>
