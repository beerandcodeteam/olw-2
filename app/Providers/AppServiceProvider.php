<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

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
        // $proxy_url = config('route.proxy_url');
        // $proxy_scheme = config('route.proxy_scheme');

        // if (!empty($proxy_url)) {
        //     URL::forceRootUrl($proxy_url);
        // }

        // if (!empty($proxy_scheme)) {
        //     URL::forceScheme($proxy_scheme);
        // }
    }
}
