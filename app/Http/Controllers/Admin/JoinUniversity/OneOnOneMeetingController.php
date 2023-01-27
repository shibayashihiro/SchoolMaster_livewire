<?php

namespace App\Http\Controllers\Admin\JoinUniversity;

use App\Http\Controllers\Controller;
use App\Models\User\UserOneOnOneMeeting;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class OneOnOneMeetingController extends Controller
{
    /**
     * @param UserOneOnOneMeeting $meeting
     * @return Factory|View|Application
     */
    public function bookingPage(UserOneOnOneMeeting $meeting): Factory|View|Application
    {
        return view('pages.join-university.u2c-one-on-one-meeting-booking',$meeting);
    }
}
