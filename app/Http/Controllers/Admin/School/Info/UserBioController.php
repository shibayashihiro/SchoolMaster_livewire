<?php

namespace App\Http\Controllers\Admin\School\Info;

use App\Http\Controllers\Controller;
use App\Http\Requests\School\Info\SaveSchoolBasicInfoRequest;
use App\Models\General\Country;
use App\Http\Requests\School\Info\SaveSchoolStudentsInfoRequest;
use App\Http\Requests\School\Info\SaveStudentinfoRequest;
use App\Models\General\Gender;
use App\Models\Institutes\School;

class UserBioController extends Controller
{
   
    public function save(SaveStudentinfoRequest $request)
    {
        $user = \Auth::user();
        $user->userBio()->update($request->validated());
        return back()->with('status', 'Operation Successful');
    }
}
