<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body row">
                <div class="col-12 d-flex justify-content-between align-items-center">
                    <div class="h5 blue">@lang('School Students List')</div>
                </div>
                <div class="row align-items-center my-3 d-md-flex d-none">
                    <div class="col">
                        <select wire:model="search_destination" name="search_destination" class="text-start form-control input-field" aria-label="" wire:change="loadStudents">
                            <option value="">@lang('Select Destination choice')</option>
                            @foreach($select_destination as $destination)
                                <option value="{{ $destination->id }}">{{ $destination->country_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-100 d-block d-md-none my-1"></div><!--to force new line-->
                    <div class="col">
                        <select wire:model="search_major" name="search_major" class="text-start form-control input-field" aria-label="" wire:change="loadStudents">
                            <option value="">@lang('Select Major choice')</option>
                            @foreach($select_major as $major)
                                <option value="{{ $major->id }}">{{ $major->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-100 d-block d-md-none my-1"></div><!--to force new line-->
                    <div class="col">
                        <select wire:model="search_university" name="search_university" class="text-start form-control input-field" aria-label="" wire:change="loadStudents">
                            <option value="">@lang('Select University choice')</option>
                            @foreach($select_university as $university)
                                <option value="{{ $university->id }}">{{ $university->university_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-100 d-block d-md-none my-1"></div><!--to force new line-->
                    <div class="col">
                        <select wire:model="budget_id" name="budget_id" class="text-start form-control input-field" aria-label="" wire:change="loadStudents">
                            <option value="">@lang('Student Budget')</option>
                        </select>
                    </div>
                    <div class="col">
                        <button class="button-sm button-blue d-none d-md-block">@lang('Register Student')</button>
                    </div>
                </div>
                <div class="col-12 table-responsive">
                    <table class="table" wire:model="" wire:target="loadStudents">
                        <thead class="primary-text">
                            <th class="align-top primary-text text-center">#</th>
                            <th class="align-top primary-text text-center" style="font-size:13px">@lang('SID')</th>
                            <th class="align-top primary-text text-center" style="font-size:13px">@lang('Photo')</th>
                            <th class="align-top primary-text text-center" style="font-size:13px">@lang('Name')</th>
                            <th class="align-top primary-text text-center" style="font-size:13px">@lang('Curriculum')</th>
                            <th class="align-top primary-text text-center" style="font-size:13px">@lang('School Fees')</th>
                            <th class="align-top primary-text text-center" style="font-size:13px">@lang('Grade')</th>
                            <th class="align-top primary-text text-center" style="font-size:13px">@lang('Nationality')</th>
                            <th class="align-top primary-text text-center" style="font-size:13px">@lang('Hobby')</th>
                            <th class="align-top primary-text text-center" style="font-size:13px">@lang('Study Destination')</th>
                            <th class="align-top primary-text text-center" style="font-size:13px">@lang('Major')</th>
                            <th class="align-top primary-text text-center" style="font-size:13px">@lang('University')</th>
                            <th class="align-top primary-text text-center" style="font-size:13px">@lang('Profile')</th>
                            <th class="align-top primary-text text-center" style="font-size:13px">@lang('Select')</th>
                        </thead>
                        <tbody class="align-center">
                        @forelse($students as $student)
                            <tr>
                                <td class="align-center text-center" style="width: 30px">{{ $loop->iteration + ($students->currentPage() - 1) * 10 }}</td>
                                <td class="align-center text-center" style="width: 30px">{{ $student->id }}</td>
                                <td class="align-center text-center" style="width: 30px"><img src="{{ $student->profile_photo_url }}" class="navbar-user-avatar" alt="{{ $student->name }}"></td>
                                <td class="align-center text-center" style="width: 50px">{{ $student->name }}</td>
                                <td class="align-center text-center" style="width: 10px">{{ $student->userBio?->curriculum_id ?? 'N/A' }}</td>
                                <td class="align-center text-center" style="width: 30px">{{ $student->userBio?->fee_range ?? 'N/A' }}</td>
                                <td class="align-center text-center" style="width: 30px">{{ $student->userBio?->grades ?? 'N/A' }}</td>
                                <td class="align-center text-center" style="width: 30px">{{ $student->userBio?->country->country_name ?? 'N/A' }}</td>
                                <td class="align-center text-center" style="width: 30px">{{ "no Hobby table" }}</td>
                                <td class="align-center text-center" style="width: 130px">{{ $student->studyDestinations->count().'|'. implode(", ", $student->studyDestinations->pluck('country_name')->all()) }}</td>
                                <td class="align-center text-center" style="width: 130px">{{ $student->majors->count().'|'. implode(", ", $student->majors->pluck('title')->all()) }}</td>
                                <td class="align-center text-center" style="width: 130px">{{ $student->preferredUniversities->count().'|'. implode(", ", $student->preferredUniversities->pluck('university_name')->all()) }}</td>
                                <td class="align-center text-center" style="width: 30px">{{ $student->userBio->profile_completion_status != 6 ? 'Not Completed' : 'Completed' }}</td>
                                <td class="align-center text-center" style="width: 30px"><input value="{{ $student->id }}" type="checkbox" wire:model="selectedStudents"></td>
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
                    <div class="row justify-content-between" style="margin-top: 20px">
                        <div class="col-3 h6 mt-2 align-items-center" style="padding-left: 30px">
                            <p class="paragraph-style2 blue">{{$students->total()}} @lang('results found')</p>
                        </div>
                        <div class="col-9 col-md-6 d-flex  align-items-center justify-content-md-end">
                            <label class="primary-text">{{ __('you have selected') }} {{ $selectedStudent_count }} {{ __('students') }} </label>
                            <button wire:click="sendReminder" class="button-sm button-dark-blue">{{ __('Send Registration Link!') }}</button>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px">
                        <div class="col-12">
                            <div class="d-flex justify-content-center mobile-pagination">
                                <p class="paragraph-style2 blue">{{ $students->links() }}</p>
                            </div>
                        </div>
                    </div>
                @endunless
            </div>
        </div>
    </div>
</div>
