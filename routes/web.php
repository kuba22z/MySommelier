<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
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
})  ->name('welcome');
  //-> now you can use the /welcome onyl if the user is authenticated



Route::group(['middleware' =>['guests']],function () {      //redirection -> /welcome in Middleware RedirectifAuthenticated
    //******* Here only Routes for Guest  ***********
    Route::view('/login', 'auth/login')->name('login_view');
    Route::post('/login', [LoginController::class, 'login'])->name('login');

    Route::view('/passwort/reset', 'auth/pswreset')->name('pswreset_view');

    Route::view('/registration', 'auth/registration')->name('registration_view');
    Route::post('/registration', [RegisterController::class, 'store'])->name('register');

});

//'auth' is the name of this Middleware set in Kernel and 'provider' is the guard
Route::group(['middleware' =>['auth:provider']],function (){   //redirection -> /welcome in Middleware Authenticate
  //******* Here only Routes for Providers   ***********
    Route::get('/logout',[LoginController::class,'logout'])->name('logout');  // redirection -> /welcome
    Route::view('/Geschaeft/einrichten','account/providerBusiness')->name('Business_view');
});

//'auth' is the name of this Middleware set in Kernel and 'client' is the guard
Route::group(['middleware' =>['auth:client']],function (){  //redirection -> /welcome in Middleware Authenticate
    //******* Here only Routes for Clients  ***********
    Route::get('/logout',[LoginController::class,'logout'])->name('logout');
});

/*
Route::get('flights', function () {
    // Only authenticated users may enter...
})->middleware('auth');
*/
