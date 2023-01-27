<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Institutes\School;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class SchoolController extends Controller
{
    public function searchSchool(Request $request): JsonResponse
    {
        $search = $request->get('search');
        $country_id = $request->get('country_id');
        $schools = School::query()->when($search, function ($query) use ($search) {
            $query->where('school_name', 'like', '%' . $search . '%');
        })->when($country_id, function ($query) use ($country_id) {
            $query->where('country_id', $country_id);
        })->limit(30)->get();
        $response = [];
        foreach ($schools as $school) {
            $response[] = [
                "id" => $school?->id,
                "text" => $school?->school_name,
                'image' => $school?->logo_url,
            ];
        }

        return response()->json($response);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function checkSchoolAvailability(Request $request): JsonResponse
    {
        $adminExist = false;

        $school = School::where('id', $request->get('q', ''))->with('admin.userBio')
            ->whereRelation('admin', 'role_id', '=', \AppConst::SCHOOL_ADMINISTRATOR)->first();
        if (!is_null($school)) {
            $adminExist = true;
        }
        return response()->json([
            'adminExist' => $adminExist,
            'name' => $school?->admin?->userBio?->first_name . ' ' . $school?->admin?->userBio?->last_name,
            'email' => $school?->admin?->email,
            'id' => $school?->id,
        ]);
    }
}
