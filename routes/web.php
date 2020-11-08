<?php



use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


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

})  ->name('welcome')
    ->middleware('auth:client');  //-> now you can use the /welcome onyl if the user is authenticated



Route::get('/user',[UserController::class,'index'])->name('user.index');


Route::view('/login','auth/login')->name('login_view');
//if I press on Submit than the function loginSubmit and the login in website will be executed
Route::post('/login',[LoginController::class,'login'])->name('login');
//Route::post('/login',[UserController::class,'store'])->name('login.store');
//Route::post('/login',[LoginController::class,'showEmail'])->name('login.email');
Route::view('/passwort/reset','auth/pswreset')->name('pswreset_view');


Route::view('/registration','auth/registration')->name('registration_view');
Route::post('/registration',[RegisterController::class,'store'])->name('register');

Route::get('/logout',[RegisterController::class,'logout'])->name('logout');

/*
Route::get('flights', function () {
    // Only authenticated users may enter...
})->middleware('auth');
*/
//'auth:client' is the name of this Middleware set in Kernel
Route::group(['middleware' =>['auth:client']],function (){
  //******* Here only Routes for Providers   ***********
    Route::view('/Geschäft_einrichten','account/providerBusiness')->name('Business_view');


});

Route::group(['middleware' =>['auth:client']],function (){
    //******* Here only Routes for Clients  ***********



});

