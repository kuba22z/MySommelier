<?php

use App\Http\Controllers\Account\Business;
use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\Auth\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');
//-> now you can use the /welcome onyl if the user is authenticated


Route::group(['middleware' => ['guests']], function () {      //redirection -> /welcome in Middleware RedirectifAuth
    //******* Here only Routes for Guest  ***********
    Route::view('/login', 'auth/login')->name('login_view');
    Route::post('/login', [Login::class, 'login'])->name('login');

    Route::view('/passwort-reset', 'auth/pswreset')->name('pswreset_view');

    Route::get('/registration', function (){
        //Datensatz mit einem zufälligen Bild aus der Datenbank holen
        $row = DB::table('captchaImages')->find(rand(1, 20));
        return view('auth.registration')->with('row',$row);
    })->name('registration_view');

    Route::post('/registration', [Register::class, 'store'])->name('register');  //redirection ->login

});

//logout kann nur von einem eingeloggten Nutzer(auth.all) ausgeführt werden
Route::get('/logout', [Login::class, 'logout'])->name('logout')
    ->middleware("auth.all");

//'auth' is the name of this Middleware set in Kernel and 'provider' is the guard
Route::group(['middleware' => ['auth:provider']], function () {   //redirection -> /welcome in Middleware Authenticate
    //******* Here only Routes for Providers   ***********
    Route::get('/Anbieter/Geschaeft/einrichten', function () {
        $provider = Auth::user();
        return view('account.providerBusiness')->with('provider', $provider);

    })->name('business_view');
    Route::post('/Anbieter/Geschaeft/einrichten', [Business::class, 'store'])->name('save');

    Route::view('/Anbieter/Konto', 'account/providerAccount')->name('provider_account_view');

});


//'auth' is the name of this Middleware set in Kernel and 'client' is the guard
Route::group(['middleware' => ['auth:client']], function () {  //redirection -> /welcome in Middleware Authenticate
    //******* Here only Routes for Clients  ***********
    Route::view('/Kunde/Konto', 'account/clientAccount')->name('client_account_view');

});

/*
Route::get('flights', function () {
    // Only authenticated users may enter...
})->middleware('auth');
*/
