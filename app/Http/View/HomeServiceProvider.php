<?php


namespace App\Http\View;


use App\Models\CaptchaImage;
use App\Models\Drink;
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

        $drinks=Drink::all();
        $image = new CaptchaImage();
        $randImage = $image->getCaptchaImage(rand(1, 20));


        $data = [
            'randImage' => $randImage,
            'drinks' => $drinks,
        ];

        View::share($data); //damit kann man randImage u. drinks in jeder view benutzen
    }

/*

*/
    }


