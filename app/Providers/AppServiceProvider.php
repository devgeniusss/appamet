<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Route::macro('subdomain', function ($name, $parameters = [], $absolute = true) {
            $subdomain = request()->getHost();
            $sub = explode('.', $subdomain)[0];

            return route($name, array_merge($parameters, ['sub' => $sub]), $absolute);
        });
    }
}
