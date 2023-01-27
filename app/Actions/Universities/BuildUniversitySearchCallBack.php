<?php

namespace App\Actions\Universities;

use App\Models\General\Countries;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;

class BuildUniversitySearchCallBack
{
    use AsAction;

    /**
     * @param Request $request
     * @return bool|\Closure
     */
    public function handle(Request $request): bool|\Closure
    {
        $search = $request->input("query", false);
        $country_id = $request->input("country_id", false);
        $continent_id = $request->input("continent_id", false);
        $status = $request->input("status", "-1");
        if (!$search && !$country_id && !$continent_id && ($status === "-1")) return false;
        $status = ($status =="null"?null:$status);
        return SearchCallBack::run($search, $continent_id, $country_id,$status);
    }
}
