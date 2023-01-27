<div class="col-lg-12 col-sm-12">
    <div class="card">
        <div id="event_lead">
            <div class="card-body">
                <div class="w-100">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="h5 blue">Import Students from Excel Sheet</div>
                            <div class="d-flex mt-3">
                                <div class="col-8">
                                    <fieldset disabled="">
                                        <input type="text" class="input-field form-control" id="disabledTextInput" placeholder="{{$fileName}}">
                                    </fieldset>
                                </div>
                                <div class="col-4 align-self-center">
                                    <form wire:submit.prevent="">
                                        <label class="button-blue button-sm m-0 ms-2" for="miofile" style="cursor: pointer" wire:click="resetCount">Upload & Import</label>
                                        <input id="miofile" type="file" wire:model="miofile" hidden/>
                                        @error('file') <span class="error">{{ $message }}</span> @enderror
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="w-100 d-block d-md-none my-1"></div>
                        <div class="col-lg-6 col-md-12">
                            <div class="h5 blue">@lang('Import Result')</div>
                            <div>
                                <p class="paragraph-style2 blue">{{ $newStudent_count }} @lang('students were imported successfully')</p>
                            </div>
                            <div>
                                <p class="paragraph-style2 blue"><input type="hidden" id="test" value="{{ $existStudent_count }}">{{ $existStudent_count }} @lang('students already exist in the system')
                                    <span>
                                        <a href="#" class="light-blue" data-bs-toggle="modal" data-bs-target="#existStudent">Click here to found out</a>
                                    </span>
                                </p>
                            </div>
                            <div>
                                <p class="paragraph-style2 blue">{{ $invalidStudent_count }} @lang('students email or phone number is invalid or missing some important record')
                                    <span>
                                        <a href="#" class="light-blue" data-bs-toggle="modal" data-bs-target="#invalidStudent">Click here to found out</a>
                                    </span>
                                </p>
                            </div>
                        </div>
                        <div class="col-12">
                            @if (session()->has('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mt-3">
        <div id="event_lead">
            <div class="card-body">
                <div class="w-100">
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="h5 blue">
                                @lang('Save uploaded records')
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="primary-text">
                            <th class="align-top primary-text text-center" style="font-size:13px">#</th>
                            <th class="align-top primary-text text-center" style="font-size:13px">@lang('Name')</th>
                            <th class="align-top primary-text text-center" style="font-size:13px">@lang('Student Email Address')</th>
                            <th class="align-top primary-text text-center" style="font-size:13px">@lang('Parent Email Address')</th>
                            <th class="align-top primary-text text-center" style="font-size:13px">@lang('Phone Number')</th>
                            <th class="align-top primary-text text-center" style="font-size:13px">@lang('Parent Phone Number')</th>
                            <th class="align-top primary-text text-center" style="font-size:13px">@lang('Curriculum')</th>
                            <th class="align-top primary-text text-center" style="font-size:13px">@lang('Grade')</th>
                            <th class="align-top primary-text text-center" style="font-size:13px">@lang('Nationality')</th>
                            </thead>
                            <tbody class="text-muted align-center">
                            @forelse($students as $student)
                                <tr>
                                    <td class="align-center text-center" style="font-size:13px; width: 5%">{{ $loop->iteration + ($students->currentPage() - 1) * 10 }}</td>
                                    <td class="align-center text-center" style="font-size:13px; width: 10%">{{ $student->name }}</td>
                                    <td class="align-center text-center" style="font-size:13px; width: 20%">{{ $student->email }}</td>
                                    <td class="align-center text-center" style="font-size:13px; width: 20%">{{ $student->guardian?->email ?? 'N/A' }}</td>
                                    <td class="align-center text-center" style="font-size:13px; width: 10%">{{ $student->userBio?->mobile ?? 'N/A' }}</td>
                                    <td class="align-center text-center" style="font-size:13px; width: 10%">{{ $student->guardian?->mobile_number ?? 'N/A' }}</td>
                                    <td class="align-center text-center" style="font-size:13px; width: 10%">{{ $student->userBio?->curriculum_id ?? 'N/A' }}</td>
                                    <td class="align-center text-center" style="font-size:13px; width: 5%">{{ $student->userBio?->grades ?? 'N/A' }}</td>
                                    <td class="align-center text-center" style="font-size:13px; width: 10%">{{ $student->userBio?->country->country_name ?? 'N/A' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9">
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
{{--Exist Student Modal--}}
    <div class="modal fade" id="existStudent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">@lang('Exist Students')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                            <table class="table">
                                <thead class="primary-text">
                                <th class="align-top primary-text text-center" style="font-size:13px">#</th>
                                <th class="align-top primary-text text-center" style="font-size:13px">@lang('Name')</th>
                                <th class="align-top primary-text text-center" style="font-size:13px">@lang('Student Email Address')</th>
                                <th class="align-top primary-text text-center" style="font-size:13px">@lang('Parent Email Address')</th>
                                <th class="align-top primary-text text-center" style="font-size:13px">@lang('Phone Number')</th>
                                <th class="align-top primary-text text-center" style="font-size:13px">@lang('Parent Phone Number')</th>
                                <th class="align-top primary-text text-center" style="font-size:13px">@lang('Curriculum')</th>
                                <th class="align-top primary-text text-center" style="font-size:13px">@lang('Grade')</th>
                                <th class="align-top primary-text text-center" style="font-size:13px">@lang('Nationality')</th>
                                </thead>
                                <tbody class="text-muted align-center">
                                @forelse($exist_students as $exist_student)
                                    <tr>
                                        <td class="align-center text-center" style="font-size:13px; width: 5%">{{ $loop->iteration }}</td>
                                        <td class="align-center text-center" style="font-size:13px; width: 10%">{{ $exist_student['name'] }}</td>
                                        <td class="align-center text-center" style="font-size:13px; width: 20%">{{ $exist_student['student_email_address'] }}</td>
                                        <td class="align-center text-center" style="font-size:13px; width: 20%">{{ $exist_student['parent_email_address'] }}</td>
                                        <td class="align-center text-center" style="font-size:13px; width: 10%">{{ $exist_student['phone_number'] }}</td>
                                        <td class="align-center text-center" style="font-size:13px; width: 10%">{{ $exist_student['parent_phone_number'] }}</td>
                                        <td class="align-center text-center" style="font-size:13px; width: 10%">{{ $exist_student['curriculum'] }}</td>
                                        <td class="align-center text-center" style="font-size:13px; width: 5%">{{ $exist_student['grade'] }}</td>
                                        <td class="align-center text-center" style="font-size:13px; width: 10%">{{ $exist_student['nationality'] }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9">
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('Close')</button>
                </div>
            </div>
        </div>
    </div>
{{--Invalid Student Modal--}}
    <div class="modal fade" id="invalidStudent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">@lang('Invalid Students')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="primary-text">
                            <th class="align-top primary-text text-center" style="font-size:13px">#</th>
                            <th class="align-top primary-text text-center" style="font-size:13px">@lang('Name')</th>
                            <th class="align-top primary-text text-center" style="font-size:13px">@lang('Student Email Address')</th>
                            <th class="align-top primary-text text-center" style="font-size:13px">@lang('Parent Email Address')</th>
                            <th class="align-top primary-text text-center" style="font-size:13px">@lang('Phone Number')</th>
                            <th class="align-top primary-text text-center" style="font-size:13px">@lang('Parent Phone Number')</th>
                            <th class="align-top primary-text text-center" style="font-size:13px">@lang('Curriculum')</th>
                            <th class="align-top primary-text text-center" style="font-size:13px">@lang('Grade')</th>
                            <th class="align-top primary-text text-center" style="font-size:13px">@lang('Nationality')</th>
                            </thead>
                            <tbody class="text-muted align-center">
                            @forelse($invalid_students as $invalid_student)
                                <tr>
                                    <td class="align-center text-center" style="font-size:13px; width: 5%">{{ $loop->iteration }}</td>
                                    <td class="align-center text-center" style="font-size:13px; width: 10%">{{ $invalid_student['name'] }}</td>
                                    <td class="align-center text-center" style="font-size:13px; width: 20%">{{ $invalid_student['student_email_address'] }}</td>
                                    <td class="align-center text-center" style="font-size:13px; width: 20%">{{ $invalid_student['parent_email_address'] }}</td>
                                    <td class="align-center text-center" style="font-size:13px; width: 10%">{{ $invalid_student['phone_number'] }}</td>
                                    <td class="align-center text-center" style="font-size:13px; width: 10%">{{ $invalid_student['parent_phone_number'] }}</td>
                                    <td class="align-center text-center" style="font-size:13px; width: 10%">{{ $invalid_student['curriculum'] }}</td>
                                    <td class="align-center text-center" style="font-size:13px; width: 5%">{{ $invalid_student['grade'] }}</td>
                                    <td class="align-center text-center" style="font-size:13px; width: 10%">{{ $invalid_student['nationality'] }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9">
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('Close')</button>
                </div>
            </div>
        </div>
    </div>
</div>
