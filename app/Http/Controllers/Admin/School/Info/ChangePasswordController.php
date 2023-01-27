<?php

namespace App\Http\Controllers\Admin\School\Info;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;


class ChangePasswordController extends Controller
{
    public function save(Request $request, UpdatesUserPasswords $updater)
    {
        $updater->update($request->user(), $request->all());
        
        return back()->with('status', 'Operation Successful');
    }
}
