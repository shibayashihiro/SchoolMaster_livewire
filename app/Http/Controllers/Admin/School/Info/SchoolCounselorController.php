<?php

namespace App\Http\Controllers\Admin\School\Info;

use App\Http\Controllers\Controller;
use App\Http\Requests\School\Info\SaveSchoolCounselorRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class SchoolCounselorController extends Controller
{
    public function index()
    {
        $school = \Auth::user()->selected_school;
        return view('pages.school.info.counselor', compact('school'));
    }

    public function save(SaveSchoolCounselorRequest $request)
    {
        $input = $request->validated();
        $input['password'] = \Hash::make($input['password']);
        $input['role_id'] =  \AppConst::SCHOOL_COUNSELOR;
        DB::transaction(function () use ($input) {
            return tap(User::create($input), function (User $user) use ($input) {
                $user->userBio()->create([
                    'first_name' => $input['name'],
                    'mobile' => $input['mobile'] ?? null,
                    'facebook_url' => $input['facebook_url'],
                ]);
                $user->roles()->attach(\AppConst::SCHOOL_COUNSELOR);
            });
        });
        return back()->with('status', 'Operation Successful');
    }
}
