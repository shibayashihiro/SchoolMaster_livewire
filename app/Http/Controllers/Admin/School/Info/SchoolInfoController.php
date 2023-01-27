<?php

namespace App\Http\Controllers\Admin\School\Info;

use App\Http\Controllers\Controller;
use App\Http\Requests\School\Info\SaveSchoolBasicInfoRequest;
use App\Models\General\Country;
use App\Http\Requests\School\Info\SaveSchoolStudentsInfoRequest;
use App\Models\General\Gender;
use App\Models\Institutes\School;

class SchoolInfoController extends Controller
{
    public function index()
    {
        $user = \Auth::user();
        $school = $user->selected_school;
        $country_code = $school?->countries?->code;
        $curriculums = School::CURRICULUMS;
        $fee_ranges = School::FEE_RANGES[$country_code] ?? School::FEE_RANGES['ae'];
        $genders = Gender::all();
        $country = $school?->countries;
        return view('pages.school.info.basic-info', compact('school','country','curriculums','fee_ranges','genders'));
    }

    public function save(SaveSchoolBasicInfoRequest $request)
    {
        $user = \Auth::user();
        $user->selected_school->update($request->validated());
        return back()->with('status', 'Operation Successful');
    }
}
