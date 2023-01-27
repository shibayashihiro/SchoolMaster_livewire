<?php

namespace App\Http\Middleware\User;

use Closure;
use Illuminate\Http\Request;

class SchoolSelected
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = \Auth::user();

        if (!empty($user->selected_school)){
            return $next($request);
        }

        $user_schools = $user->schools;

        if ($user_schools->count() > 1){
            return \Redirect::route('admin.selectSchool');
        }

        session()->put('user-school', $user_schools->first());
        return $next($request);

    }
}
