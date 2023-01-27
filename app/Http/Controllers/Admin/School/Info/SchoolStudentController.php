<?php

namespace App\Http\Controllers\Admin\School\Info;

use App\Http\Controllers\Controller;
use App\Http\Requests\School\Info\SaveSchoolStudentsInfoRequest;
use App\Models\General\Gender;
use App\Models\Institutes\School;

class SchoolStudentController extends Controller
{
    public function index()
    {
        $school = \Auth::user()->selected_school;
        $country_code = $school->countries->code;
        $curriculums = School::CURRICULUMS;
        $fee_ranges = School::FEE_RANGES[$country_code] ?? School::FEE_RANGES['ae'];
        $genders = Gender::all();
        return view('pages.school.info.students', compact('school','curriculums','fee_ranges','genders'));
    }
    public function save(SaveSchoolStudentsInfoRequest $request)
    {
        $user = \Auth::user();
        $user->selected_school->update($request->validated());
        return back()->with('status', 'Operation Successful');
    }
}
