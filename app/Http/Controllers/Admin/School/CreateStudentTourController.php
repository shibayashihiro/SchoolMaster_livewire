<?php

namespace App\Http\Controllers\Admin\School;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CreateStudentTourController extends Controller
{
    /**
     * @return Factory|View|Application
     */
    public function showList(): Factory|View|Application
    {
        return view('pages.create-event.students-tour-list');
    }

    /**
     * @return Factory|View|Application
     */
    public function showCreate(): Factory|View|Application
    {
        return view('pages.create-event.students-tour-create');
    }

    /**
     * @param $tour
     * @return Factory|View|Application
     */
    public function showConfirmedUniversities($tour): Factory|View|Application
    {
        return view('pages.create-event.students-tour-confirmed-universities');
    }
}
