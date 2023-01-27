<?php

namespace App\Actions\Universities;

use App\Models\General\Countries;
use Closure;
use Illuminate\Database\Eloquent\Builder;
use Lorisleiva\Actions\Concerns\AsAction;

class SearchCallBack
{
    use AsAction;

    /**
     * @param string|null $search
     * @param string|null $continent_id
     * @param string|null $country_id
     * @param string|null $status
     * @return Closure|null
     */
    public function handle(?string $search = null, ?string $continent_id = null, ?string $country_id = null , ?string $status = "-1"): ?Closure
    {
        if (empty($search) && empty($continent_id) &&  empty($country_id) &&  $status === '-1'){
            return  null;
        }

        return function (Builder $query) use ($search, $country_id, $continent_id,$status) {
            return $query
                ->when($search, fn($query, $search) => $query->where('university_name', 'like', "%{$search}%"))
                ->when($status !== '-1', fn($query) => $query->where('status',$status))
                ->when($country_id, fn($query, $country_id) => $query->where('country_id', $country_id))
                ->when($continent_id, function($query) use ($continent_id) {
                    $query->whereIn('country_id', Countries::select('id')
                        ->where('continent_id_1', $continent_id)
                        ->orWhere('continent_id_2', $continent_id)
                        ->orWhere('continent_id_3', $continent_id));
                });
        };
    }
}
