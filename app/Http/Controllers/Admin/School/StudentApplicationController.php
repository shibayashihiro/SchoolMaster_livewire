<?php

namespace App\Http\Controllers\Admin\School;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class StudentApplicationController extends Controller
{
    /**
     * @return Factory|View|Application
     */
    public function showList(): Factory|View|Application
    {
        return view('pages.students.students-applications');
    }

    /**
     * @param User $user
     * @return Factory|View|Application
     */
    public function viewApplication(User $user): Factory|View|Application
    {
        return view('pages.students.students-applications',compact('user'));
    }

    /**
     * @param User $user
     * @return Factory|View|Application
     */
    public function showRecommendationLetters(User $user): Factory|View|Application
    {
        return view('students-application-attach-recommendation-letters',compact('user'));
    }
}
