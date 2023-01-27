<?php


namespace App\Http\Controllers\Admin\School\Info;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fairs\Fair;
use App\Models\Institutes\School;
use App\Models\General\Gender;


class FairListController extends Controller
{
    public function index()
    {
        $fairs = Fair::paginate(10);
        $school = \Auth::user()->selected_school;
        $user = \Auth::user()->userBio;
        $country_code = $school->countries->code;
        $curriculums = School::CURRICULUMS;
        $genders = Gender::all();
        $fee_ranges = School::FEE_RANGES[$country_code] ?? School::FEE_RANGES['ae'];
        return view('pages.school.info.fair-list', compact('fairs', 'school', 'curriculums', 'fee_ranges', 'genders', 'user'));
    }


    public function delete($id)
    {
        $fair = Fair::find($id);
        $fair->status = $fair->status == Fair::FAIR_STATUS_ACTIVE ? Fair::FAIR_STATUS_DEACTIVE :  Fair::FAIR_STATUS_ACTIVE;
        $fair->save();
        return back()->with('status', 'Operation Successful');
    }
}
