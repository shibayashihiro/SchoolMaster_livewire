<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Institutes\School;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class SelectSchoolController extends Controller
{
    /**
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        $user = \Auth::user();
        $user_schools = $user->schools;
        return view('auth.select-school',compact('user_schools'));
    }

    public function setSchool(School $school): Redirector|Application|RedirectResponse
    {
        if (!\Auth::user()->schools->contains('id',$school->id)){
            return redirect()->back()->with('error','Invalid school');
        }

        \Session::forget(\AppConst::USER_SCHOOL_KEY);
        \Session::put(\AppConst::USER_SCHOOL_KEY,$school);
        return redirect('/');
    }
}
