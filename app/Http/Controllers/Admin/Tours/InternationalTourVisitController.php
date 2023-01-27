<?php

namespace App\Http\Controllers\Admin\Tours;

use App\Http\Controllers\Controller;
use App\Models\Tours\InternationalTourVisit;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class InternationalTourVisitController extends Controller
{
    function tourDetails(InternationalTourVisit $tour): Factory|View|Application
    {
        return view('pages.tours.more-info-road-map',compact($tour));
    }
}
