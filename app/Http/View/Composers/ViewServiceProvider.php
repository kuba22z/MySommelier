<?php

namespace App\Http\View\Composers;

use App\Models\DrinksOffer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
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
        View::composer('providerAccount.business', function ($view) {
            $provider = Auth::user();
            $view->with(
                ['providerImage'=> $provider->image,
                'offer' =>DrinksOffer::getDrinkOffers($provider->id)]
            );
        });

    }
}
