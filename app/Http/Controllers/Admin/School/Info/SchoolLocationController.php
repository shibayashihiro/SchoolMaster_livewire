<?php

namespace App\Http\Controllers\Admin\School\Info;

use App\Http\Controllers\Controller;
use App\Http\Requests\School\Info\SaveSchoolLocationRequest;

class SchoolLocationController extends Controller
{
    public function index(){
        $school = \Auth::user()->selected_school;
        return view('pages.school.info.location',compact('school'));
    }

    public function save(SaveSchoolLocationRequest $request){
        $user = \Auth::user();
        $user->selected_school->update($request->validated());
        return back()->with('status','Operation Successful');
    }
}
