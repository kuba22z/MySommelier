<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //Selbst definierte If statements in Blade
        Blade::if('guest', function () {
            return (!(Auth::guard('client')->check() || Auth::guard('provider')->check()));
        });

        Blade::if('auth', function ($expression) {
            if ($expression === "all")
                return ((Auth::guard('client')->check() || Auth::guard('provider')->check()));
            else if ($expression === "provider")
                return Auth::guard('provider')->check();
            else if ($expression === "client")
                return (Auth::guard('client')->check());
            else
                return false;
        });
    }
}
