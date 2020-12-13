<?php


use App\Http\Controllers\Account\Account;
use App\Http\Controllers\Account\AddDrink;
use App\Http\Controllers\Account\Business;
use App\Http\Controllers\Account\CreateDrink;
use App\Http\Controllers\Account\SearchDrink;
use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Register;
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


Route::group(['middleware' => ['guests']], function () {      //redirection -> /welcome in Middleware RedirectifAuth
    //******* Here only Routes for Guest  ***********
    Route::view('/login', 'home.home')->name('login_view');
    Route::post('/login', [Login::class, 'login'])->name('login');


    Route::view('/registration', 'home.home')->name('registration_view');

    Route::post('/registration', [Register::class, 'store'])->name('register');  //redirection ->login

    Route::view('/passwort-reset', 'home.home')->name('pswreset_view');
});

//logout kann nur von einem eingeloggten Nutzer(auth.all) ausgeführt werden
Route::get('/logout', [Login::class, 'logout'])->name('logout')
    ->middleware("auth.all");

//'auth' is the name of this Middleware set in Kernel and 'provider' is the guard
Route::group(['middleware' => ['auth:provider']], function () {   //redirection -> /welcome in Middleware Authenticate
    //******* Here only Routes for Providers   ***********
    Route::view('/Anbieter/Geschaeft/einrichten','provider.business')->name('business_view');

    Route::post('/Anbieter/Geschaeft/einrichten', [Business::class, 'store'])->name('business_save');

    Route::get('/Anbieter/Geschaeft/Getraenk/suchen', [SearchDrink::class, 'search'])->name('search_drink');

    Route::post('/Anbieter/Geschaeft/Getraenk/suchen', [AddDrink::class, 'add'])->name('addDrink');

    Route::view('/Anbieter/Geschaeft/Getraenk/erstellen', 'provider.createDrink')->name('create_drink_view');

    Route::post('/Anbieter/Geschaeft/Getraenk/erstellen',[CreateDrink::class,'create'])->name('create_drink');

    Route::view('/Anbieter/Geschaeft/Getraenk/EANscan','provider.business')->name('EANscan_view');

    Route::view('/Anbieter/Konto', 'provider.accountP')->name('provider_account_view');

    Route::post('/Anbieter/Konto', [Account::class,'change'])->name('provider_account_change');

    Route::view('/Anbieter/Konto/Passwort/aendern', 'provider.accountP')->name('provider_changePsw_view');

    Route::post('/Anbieter/Konto/Passwort/aendern', [Account::class,'changePsw'])->name('provider_changePsw');

});


//'auth' is the name of this Middleware set in Kernel and 'client' is the guard
Route::group(['middleware' => ['auth:client']], function () {  //redirection -> /welcome in Middleware Authenticate
    //******* Here only Routes for Clients  ***********
    Route::view('/Kunde/Konto', 'client/accountC')->name('client_account_view');

    Route::post('/Kunde/Konto', [Account::class,'change'])->name('client_account_change');

    Route::view('/Kunde/Konto/Passwort/aendern', 'client.accountC')->name('client_changePsw_view');

    Route::post('/Kunde/Konto/Passwort/aendern', [Account::class,'changePsw'])->name('client_changePsw');

});


Route::view('/', 'home.home');

Route::get('/', [DrinkController::class, 'getDrinkToName']);
Route::post('/', [DrinkController::class, 'searchButton']);


Route::get('/getr_details', [function () {
    return view('home.getr_details');
}]);

Route::get('/filter_options', function () {
    return view('home.filter_options', []);
});

Route::get('/anb', function () {
    return view('home.anbieter_getr_liste', []);
});




