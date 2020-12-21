<?php


namespace App\Http\View\Composers;


use App\Models\CaptchaImage;
use App\Models\Drink;
use App\Models\Provider;
use Carbon\Laravel\ServiceProvider;

use Illuminate\Support\Facades\View;

class HomeServiceProvider extends ServiceProvider
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

        View::composer(['home.home','client.callBusiness'], function ($view) {
           //Alle variablen sind nur in der home view zugänglich
            $drinks=Drink::all();
            $image = new CaptchaImage();
            $randImage = $image->getCaptchaImage(rand(1, 20));

            $data = [
                'drinks' => $drinks,
                ];
            $view->with('randImage',$randImage);

            View::share($data); //durch share kann die Variable $drinks in der view überschireben werden
        });
    }
}


