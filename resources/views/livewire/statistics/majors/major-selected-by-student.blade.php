<div>
    <div>
        @php
            /**
            * @var \Illuminate\Database\Eloquent\Collection | \App\Models\General\Major $major
            * @var \Illuminate\Database\Eloquent\Collection | \App\Models\General\Major[] $selectMajors
            * @var \Illuminate\Database\Eloquent\Collection | \Illuminate\Contracts\Pagination\LengthAwarePaginator | \App\Models\User[] $students
            * @var \Illuminate\Database\Eloquent\Collection | \App\Models\Institutes\University $university
            **/
        @endphp
        <div class="col-12">
            <div class="h4 text-blue">@lang('Students Select ') {{!empty($major?->translated_name) ? $major?->translated_name : $major?->title}}</div>
        </div>
        <div class="col-6">
            <select wire:model="major_id" name="major_id" class="text-start form-control input-field" aria-label="" wire:change="loadStudents">
                <option value=""> @lang('All Majors')</option>
                @foreach($selectMajors as $selectMajor)
                    <option value="{{ $selectMajor->id }}">
                        {{ !empty($selectMajor?->translated_name) ? $selectMajor?->translated_name : $selectMajor->title }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="w-100">
                        <div class="row my-3">
                            <div class="col-12 table-responsive">
                                <div wire:model="major_id" wire:target="loadStudents">
                                    <table class="table">
                                        <thead class="primary-text">
                                        <th class="align-top primary-text text-center" style="font-size:13px">#</th>
                                        <th class="align-top primary-text text-center" style="font-size:13px">@lang('SId')</th>
                                        <th class="align-top primary-text text-center" style="font-size:13px">@lang('Photo')</th>
                                        <th class="align-top primary-text text-center" style="font-size:13px">@lang('Name')</th>
                                        <th class="align-top primary-text text-center" style="font-size:13px">@lang('Major')</th>
                                        </thead>
                                        <tbody class="text-muted align-center">
                                        @forelse($students as $student)
                                            @php
                                                $university = $student->preferredUniversities->first();
                                                $studentMajor = $major ? $major : $student->majors->first();
                                            @endphp
                                            <tr>
                                                <td class="align-center text-center" style="font-size:13px; width: 10%">{{ $loop->iteration + ($students->currentPage() - 1) * 10 }}</td>
                                                <td class="align-center text-center" style="font-size:13px; width: 10%">{{ $student->id }}</td>
                                                <td class="align-center text-center" style="font-size:13px; width: 20%"><img src="{{ $student->profile_photo_url }}" class="navbar-user-avatar" alt="{{ $student->name }}"></td>
                                                <td class="align-center text-center" style="font-size:13px; width: 20%">{{ $university->translated_name ?? $university->university_name }}</td>
                                                <td class="align-center text-center" style="font-size:13px; width: 40%">{{ !empty($studentMajor?->translated_name) ? $studentMajor->translated_name : $studentMajor->title }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5">
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
                </div>
            </div>
        </div>
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
