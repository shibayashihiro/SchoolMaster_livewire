<?php

namespace App\Helpers;

use App\Models\General\Continents;
use App\Models\General\Countries;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

class Helpers
{

    /**
     * @return Collection|null
     */
    public function continentsWithoutCountries(): ?EloquentCollection
    {
        return Cache::remember(\AppConst::CONTINENTS_WITHOUT_COUNTRIES_CACHE, now()->addDays(30), function () {
            $dontLoad = ['European Union', 'EECA', 'East Asia', 'Arabian Gulf'];
            return Continents::whereNotIn('name', $dontLoad)->get();
        });
    }

    /**
     * @param $continent_id
     * @return Collection|null
     */
    public function continentCountries($continent_id): ?EloquentCollection
    {
        return Cache::remember(\AppConst::CONTINENT_COUNTRIES_CACHE . "-{$continent_id}", now()->addDays(30),
            function () use ($continent_id) {
                return Countries::query()
                    ->when($continent_id, function ($query, $continent_id) {
                        $query->where('continent_id_1', $continent_id)
                            ->orWhere('continent_id_2', $continent_id)
                            ->orWhere('continent_id_3', $continent_id);
                    })->orderBy('country_name')->get();
            });
    }

    /**
     * @param $continent_name
     * @return Collection|null
     */
    public function getContinentCountriesUsingName($continent_name): ?EloquentCollection
    {
        $continent_id = $this->findContinentUsingName($continent_name)?->id ?? "";
        return $this->continentCountries($continent_id);
    }

    /**
     * @param $continent_name
     * @return Continents|null
     */
    public function findContinentUsingName($continent_name): ?Continents
    {
        $title = \AppConst::CONTINENT_CACHE_BY_NAME . "-{$continent_name}";
        $time = now()->addDays(30);
        return Cache::remember($title, $time, fn() => Continents::whereName($continent_name)->first());
    }

    /**
     * @param $country_name
     * @return Countries|null
     */
    public function findCountryUsingName($country_name): ?Countries
    {
        $title = \AppConst::COUNTRIES_CACHE_BY_NAME . "-{$country_name}";
        $time = now()->addDays(30);
        return Cache::remember($title, $time, fn() => Countries::whereCountryName($country_name)->first());
    }

    /**
     * @return Collection|null
     */
    public function continents(): ?EloquentCollection
    {
        return Cache::remember(\AppConst::CONTINENTS_CACHE, now()->addDays(30), function () {
            $dontLoad = ['European Union', 'EECA', 'East Asia', 'Arabian Gulf'];
            $continents = Continents::with('countries.cities')->whereNotIn('name', $dontLoad)->get();
            $continents[5]->countries = Countries::where('continent_id_3', $continents[5]->id)->with('cities')->get();
//            $continents[3]->countries = Countries::where('continent_id_2', $continents[3]->id)->with('cities')->get();
//            $continents[6]->countries = Countries::where('continent_id_2', $continents[6]->id)->with('cities')->get();
//            $continents[8]->countries = Countries::where('continent_id_2', $continents[8]->id)->with('cities')->get();
//            $continents[9]->countries = Countries::where('continent_id_3', $continents[9]->id)->with('cities')->get();
            return $continents;
        });
    }

    public function dayDateTimeFormat($timestamp){
        return \Carbon\Carbon::parse($timestamp)->toDayDateTimeString();
    }

    /**
     * @return string
     */
    public function upcomingFairsIds(): string
    {
        return \Auth::user()->selected_school->fairs()->upcoming()->pluck('id');
    }

    public /**
     * @param Collection|EloquentCollection $sessionsCollection
     * @return Collection
     */
    function transformUserSessions(Collection | EloquentCollection $sessionsCollection): Collection
    {

        return $sessionsCollection->map(function ($session) {
            $agent = tap(new Agent, function ($agent) use ($session) {
                $agent->setUserAgent($session->user_agent);
            });

            return (object) [
                'agent' => [
                    'is_desktop' => $agent->isDesktop(),
                    'platform' => $agent->platform(),
                    'browser' => $agent->browser(),
                ],
                'ip_address' => $session->ip_address,
                'is_current_device' => $session->id === \Request::session()->getId(),
                'last_active' => Carbon::createFromTimestamp($session->last_activity)->diffForHumans(),
            ];
        });
    }
}
