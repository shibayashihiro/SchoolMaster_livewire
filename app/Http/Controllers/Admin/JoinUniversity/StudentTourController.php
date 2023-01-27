<?php

namespace App\Http\Controllers\Admin\JoinUniversity;

use App\Http\Controllers\Controller;
use App\Models\University\UniversityEvent;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class StudentTourController extends Controller
{
    public function detailsPage(UniversityEvent $event): Factory|View|Application
    {
        return view('pages.join-university.student-tour-details');
    }
}
