<?php

namespace App\Helpers\Providers;

use App\Helpers\Facades\HelperFacades;
use App\Helpers\Helpers;
use Illuminate\Support\ServiceProvider;

class CustomHelpersServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        \App::bind('helpers', fn()=> new Helpers);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
