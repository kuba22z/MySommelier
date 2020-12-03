<?php


use App\Http\Controllers\Account\AddDrink;
use App\Http\Controllers\Account\Business;
use App\Http\Controllers\Account\SearchDrink;
use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Register;
use App\Models\CaptchaImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\DrinkController;


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
   Route::view('/login','home.home')->name('login_view');
   Route::post('/login', [Login::class, 'login'])->name('login');


    Route::view('/registration','home.home')->name('registration_view');

    Route::post('/registration', [Register::class, 'store'])->name('register');  //redirection ->login

    Route::view('/passwort-reset', 'home.home')->name('pswreset_view');
});

//logout kann nur von einem eingeloggten Nutzer(auth.all) ausgeführt werden
Route::get('/logout', [Login::class, 'logout'])->name('logout')
    ->middleware("auth.all");

//'auth' is the name of this Middleware set in Kernel and 'provider' is the guard
Route::group(['middleware' => ['auth:provider']], function () {   //redirection -> /welcome in Middleware Authenticate
    //******* Here only Routes for Providers   ***********
    Route::get('/Anbieter/Geschaeft/einrichten', function () {
        $provider = Auth::user();
        return view('providerAccount.business')->with('provider', $provider);})->name('business_view');

    Route::post('/Anbieter/Geschaeft/einrichten', [Business::class, 'store'])->name('save');

    Route::get('/Anbieter/Geschaeft/Getraenk/suchen', function () {
        $provider = Auth::user();
        return view('providerAccount/business')->with('provider', $provider);})->name('search_drink_view');

    Route::get('/Anbieter/Geschaeft/Getraenk/suchen', [SearchDrink::class, 'search'])->name('search_drink');

    Route::post('/Anbieter/Geschaeft/Getraenk/suchen', [AddDrink::class, 'add'])->name('addDrink');


    Route::get('/Anbieter/Geschaeft/Getraenk/EANscan', function () {
        $provider = Auth::user();
        return view('providerAccount/business')->with('provider', $provider);})->name('EANscan_view');


    Route::view('/Anbieter/Konto', 'providerAccount/accountP')->name('provider_account_view');

});


//'auth' is the name of this Middleware set in Kernel and 'client' is the guard
Route::group(['middleware' => ['auth:client']], function () {  //redirection -> /welcome in Middleware Authenticate
    //******* Here only Routes for Clients  ***********
    Route::view('/Kunde/Konto', 'clientAccount/accountC')->name('client_account_view');

});


Route::view('/','home.home') ;

Route::get('/', [DrinkController::class, 'getDrinkToName']);
Route::post('/', [DrinkController::class, 'searchButton']);


Route::get('/getr_details', [function(){
    return view('home.getr_details');
}]);

Route::get('/filter_options', function(){
    return view('home.filter_options',[]);
});

Route::get('/anb', function(){
    return view('home.anbieter_getr_liste',[]);
});




