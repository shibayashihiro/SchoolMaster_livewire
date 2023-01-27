<div>
    <div class="row">
        <div class="col-12">
            <div class="h4 text-blue">@lang('Students Selected ') {{!empty($selected_university?->translated_name) ? $selected_university?->translated_name : $selected_university?->university_name}}</div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form method="post" wire:submit.prevent="save" onkeydown="return event.key != 'Enter';">
                @csrf
                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <select wire:model="university_id" name="university_id" class="text-start form-control input-field" aria-label="" wire:change="loadStudents">
                        <option value=""> @lang('All Universities')</option>
                            @foreach($universities as $university)
                                <option value="{{$university->id}}">{{!empty($university?->translated_name) ? $university?->translated_name : $university->university_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <!--Heading Row-->
                                <tr>
                                    <td class="w-5">#</td>
                                    <td class="w-5">@lang('SId')</td>
                                    <td class="w-5">@lang('Photo')</td>
                                    <td class="w-35">@lang('Name')</td>
                                    <td class="w-50">@lang('University Name')</td>
                                </tr>
                                <!--End Heading row-->
                                @forelse($students as $student)
                                    @php
                                        $university = $student->preferredUniversities->first();
                                        $studentUniversity = !empty($selected_university) ? $selected_university : $university;
                                    @endphp
                                    <tr>
                                        <td>{{$loop->index + 1 + ($students->currentPage()-1) * $students->perPage()}}</td>
                                        <td>{{$student->id}}</td>
                                        <td><img src="{{$student->profile_photo_url}}" class="student-photo"></td>
                                        <td>{{$student->name}}</td>
                                        <td>{{ !empty($studentUniversity?->translated_name) ? $studentUniversity?->translated_name : $studentUniversity->university_name }}</td>
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
            <div class="col-12 my-2 small5">
                <label class="primary-text">{{$students->total()}} @lang('students has select') {{!empty($selected_university?->translated_name) ? $selected_university?->translated_name : $selected_university?->university_name}}</label>
            </div>
            <div class="d-flex justify-content-center mt-4 mobile-pagination">
                {!! $students->links() !!}
            </div>
        </div>
    </div>
</div>

