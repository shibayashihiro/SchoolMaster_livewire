<?php

namespace App\Http\Controllers\Admin\School\Info;

use App\Http\Controllers\Controller;
use App\Http\Requests\School\Info\SaveFairInformation;
use Illuminate\Http\Request;
use App\Models\Fairs\FairType;
use App\Models\Fairs\Fair;
use App\Models\Institutes\School;
use App\Models\General\Gender;
use Illuminate\Support\Carbon;

class NewFairController extends Controller
{
    public function index()
    {
        $fairs = FairType::all();
        $school = \Auth::user()->selected_school;
        $user = \Auth::user()->userBio;
        $country_code = $school->countries->code;
        $curriculums = School::CURRICULUMS;
        $genders = Gender::all();
        $fee_ranges = School::FEE_RANGES[$country_code] ?? School::FEE_RANGES['ae'];
        return view('pages.school.info.new-fair', compact('fairs', 'school', 'curriculums', 'fee_ranges', 'genders', 'user'));
    }

    public function save(SaveFairInformation $request)
    {
        $validated = $request->all();
        $validated['approval_status'] = Fair::AWAITING;;
        $validated['school_id'] = \Auth::user()->selected_school->id;
        $validated['start_date'] = Carbon::parse($validated['start_date']);
        $validated['end_date'] = Carbon::parse($validated['end_date']);
        $user = \Auth::user();
        $user->selected_school->fairs()->create($validated);
        return back()->with('status', 'Operation Successful');
    }


    public function update(SaveFairInformation $request,$id)
    {
        $fair = Fair::find($id);
        $validated = request()->except(['_token']);
        $validated['approval_status'] = Fair::AWAITING;;
        $validated['school_id'] = \Auth::user()->selected_school->id;
        $validated['start_date'] = Carbon::parse($validated['start_date']);
        $validated['end_date'] = Carbon::parse($validated['end_date']);
        $fair->update($validated);
        return back()->with('status', 'Operation Successful');
    }

    public function edit($id)
    {
        $fairs = Fair::find($id);
        $fairtype = FairType::all();
        $school = \Auth::user()->selected_school;
        $user = \Auth::user()->userBio;
        $country_code = $school->countries->code;
        $curriculums = School::CURRICULUMS;
        $genders = Gender::all();
        $fee_ranges = School::FEE_RANGES[$country_code] ?? School::FEE_RANGES['ae'];
        return view('pages.school.info.edit-new-fair', compact('fairs', 'fairtype', 'school', 'curriculums', 'fee_ranges', 'genders', 'user'));
    }
}
