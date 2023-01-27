<div>
    <div class="row">
        <div class="col-12">
            <div class="h4 text-blue">@lang('School Student Information')</div>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="w-100">
                        <x-jet-validation-errors class="mb-4 alert alert-danger"/>
                        @if (session('status'))
                            <div class="mb-4 font-medium alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @php
                            /**
                            * @var \App\Models\Institutes\School $school;                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  */
                        @endphp
                        <form class="mt-3" method="post"  wire:submit.prevent="save">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <select class="h-100 text-start form-control input-field"
                                            id="curriculum_id" name="curriculum_id" aria-label="" wire:model="curriculum_id">
                                        <option value=""> @lang('School Curriculum') </option>
                                        @foreach ($curriculums as $value => $text)
                                            <option value="{{ $text }}">{{ $text }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @php
                                    /**
                                    * @var \Illuminate\Database\Eloquent\Collection<\App\Models\General\Gender> $genders                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   */
                                @endphp
                                <div class="col-lg-6 mobile-marg-2">
                                    <div class="h-100">
                                        <select class="h-100 text-start form-control input-field"
                                                aria-label="" id="gender_id" name="gender_id" wire:model="gender_id">
                                            <option value="">@lang('Gender')</option>
                                            @foreach ($genders as $gender)
                                                <option value="{{ $gender->id }}">
                                                    {{ $gender->gender }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-6">

                                    <div class="h-100">
                                        <input type="text" class="form-control input-field"
                                               name="number_grade12" id="number_grade12" wire:model.lazy="number_grade12"
                                               placeholder="Number of Grade 12 students')">
                                    </div>
                                </div>

                                <div class="col-lg-6 mobile-marg-2">
                                    <div class="h-100">
                                        <select class="h-100 text-start form-control input-field"
                                                id="fees_grade12" name="fees_grade12" wire:model="fees_grade12" aria-label="">
                                            <option value="">@lang('Grade 12 Fee')</option>
                                            @foreach ($fee_ranges as $fee_range)
                                                <option value="{{ $fee_range }}">
                                                    {{ $fee_range }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-6">

                                    <div class="h-100">
                                        <input type="text" class="form-control input-field"
                                               name="number_grade11" id="number_grade11"  wire:model.lazy="number_grade11"
                                               placeholder="@lang('Number of Grade 11 students')">
                                    </div>
                                </div>

                                <div class="col-lg-6 mobile-marg-2">
                                    <div class="h-100">
                                        <select class="h-100 text-start form-control input-field"
                                                id="fees_grade11" name="fees_grade11" wire:model="fees_grade11" aria-label="">
                                            <option value="">@lang('Grade 11 Fee')</option>
                                            @foreach ($fee_ranges as $fee_range)
                                                <option value="{{ $fee_range }}"
                                                    @selected($fee_range == $school->fees_grade11)>
                                                    {{ $fee_range }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div @class(['d-none'=>$curriculum_id !='British'])>

                                <div class="row mt-3">
                                    <div class="col-lg-6">
                                        <h4>@lang('British Curriculum')</h4>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-lg-6">

                                        <div class="h-100">
                                            <input type="text" class="form-control input-field"
                                                   name="grade_13" id="grade_13" wire:model.lazy="grade_13"
                                                   placeholder="@lang('Number of Grade 13 students')">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 mobile-marg-2">
                                        <div class="h-100">
                                            <select class="h-100 text-start form-control input-field"
                                                    id="grade_13_fee" name="grade_13_fee" wire:model="grade_13_fee" aria-label="">
                                                <option value="">@lang('Grade 13 Fee')</option>
                                                @foreach ($fee_ranges as $fee_range)
                                                    <option value="{{ $fee_range }}">
                                                        {{ $fee_range }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row mt-3">
                                <div class="col-lg-12">
                                    <div class="text-center">
                                        <button type="submit" class="button-dark-blue width-25 button-sm mobile-btn" wire:loading.attr="disabled">@lang('Save')
                                        </button>
                                        <button type="button" class="button-red width-25 button-sm mobile-btn" wire:loading.attr="disabled"
                                                wire:click="setData">@lang('Cancel')</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 d-flex justify-content-center">
                                    <div wire:loading.block wire:target="save"><i class="fas fa-spinner fa-pulse" aria-hidden="true"></i>
                                        @lang('Saving Data')...
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
