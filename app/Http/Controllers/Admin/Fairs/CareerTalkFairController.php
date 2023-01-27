<?php

namespace App\Http\Controllers\Admin\Fairs;

use App\Http\Controllers\Controller;
use App\Models\Fairs\Fair;
use App\Models\Fairs\FairType;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CareerTalkFairController extends Controller
{
    public function index(): RedirectResponse
    {
        return redirect()->route('admin.school.career-talk.list');
    }

    /**
     * @return Factory|View|Application
     */
    public function fairList(): Factory|View|Application
    {
        return view('pages.career-talk.career-talk-list');
    }

    /**
     * @return Factory|View|Application
     */
    public function create(): Factory|View|Application
    {
        return view('pages.career-talk.career-talk-create');
    }

    /**
     * @param Fair $fair
     * @return Application|Factory|View|RedirectResponse
     */
    public function edit(Fair $fair): View|Factory|RedirectResponse|Application
    {
        //Validate if fair is related to user school.
        $user_fair_ids = \Auth::user()->selected_school->fairs()->upcoming()->pluck('id')->toArray();

        if (!in_array($fair->id, $user_fair_ids)) {
            return redirect()->route('admin.school.career-talk.list')->with('status', 'You can not edit Past or Active Fairs!')->with('status-type', 'danger');
        }

        return view('pages.career-talk.career-talk-edit', compact('fair'));
    }

    /**
     * @param Fair $fair
     * @return Application|Factory|View|RedirectResponse
     */
    public function view(Fair $fair): View|Factory|RedirectResponse|Application
    {
        //Validate if fair is related to user school.
        $user_fair_ids = \Auth::user()->selected_school->fairs()->pluck('id')->toArray();

        if (!in_array($fair->id, $user_fair_ids)) {
            return redirect()->route('admin.school.career-talk.list')->with('status', 'Invalid Fair!')->with('status-type', 'danger');
        }

        $fair->load(['history', 'editRequests', 'fairType','sessions.major']);
        return view('pages.career-talk.career-talk-view', compact('fair'));
    }


    /**
     * @param Fair $fair
     * @return View|Factory|RedirectResponse|Application
     */
    public function registeredUniversities(Fair $fair): View|Factory|RedirectResponse|Application
    {
        //Validate if fair is related to user school.
        $user_fair_ids = \Auth::user()->selected_school->fairs()->pluck('id')->toArray();

        if (!in_array($fair->id, $user_fair_ids)) {
            return redirect()->route('admin.school.career-talk.list')->with('status', 'Invalid Fair!')->with('status-type', 'danger');
        }

        $fair->load('sessions','majors');
        return view('pages.career-talk.career-talk-registered-universities',compact('fair'));
    }
}
