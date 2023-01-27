<?php

namespace App\Helpers\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface HelpersInterface
{
    /**
     * @return Collection|null
     */
    public function continentsWithoutCountries(): ?Collection;

    /**
     * @param $continent_id
     * @return Collection|null
     */
    public function continentCountries($continent_id): ?Collection;

    /**
     * @param $continent_name
     * @return Collection|null
     */
    public function getContinentCountriesUsingName($continent_name): ?Collection;

    /**
     * @param $continent_name
     * @return mixed
     */
    public function findContinentUsingName($continent_name): ?Collection;

    /**
     * @param $country_name
     * @return mixed
     */
    public function findCountryUsingName($country_name): ?Collection;

    /**
     * @return Collection|null
     */
    public function continents(): ?Collection;
}
