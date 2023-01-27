<?php

namespace App\Providers;

use App\Models\General\Countries;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFive();
        Schema::defaultStringLength(191);
        $this->countryInfo();
    }

    private function countryInfo()
    {
        if (!empty(session('country_info'))) return session('country_info');

        if (session()->get('user-ip') == null) {
            session()->put(['user-ip' => geoip(Request::getClientIp())]);
        }

        if (!Schema::hasTable('countries')) return [];


        $user_country = Str::lower(session('user-ip')?->country);
        $country = Countries::whereRaw('Lower(country_name)  = ?', [$user_country])->first();
        $suggested_language = "";
        if (Schema::hasTable('languages') && Schema::hasTable('country_languages') && !empty($country)) {
            $country?->load(['languages' => fn($q) => $q->where('name', '!=', 'english')]);
            $suggested_language = $country?->languages->first();
        }

        $data = [
            'name' => Str::upper($user_country),
            'id' => $country?->id,
            'suggested_language' => $suggested_language,
        ];
        session()->put('country_info', $data);
        return $data;
    }
}
