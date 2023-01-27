<?php

namespace App\Actions\Universities;

use App\Models\Institutes\University;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;

class BuildUniversityQuery
{
    use AsAction;

    /**
     * @param Request $request
     * @return Builder
     */
    public function handle(Request $request): Builder
    {
        $call_back = BuildUniversitySearchCallBack::run($request);
        return University::query()
            ->with(['country', 'city','domains','universityStatus'])
            ->when($call_back, fn(Builder $query, $call_back) => $query->where($call_back))->orderBy('id');
    }

}
