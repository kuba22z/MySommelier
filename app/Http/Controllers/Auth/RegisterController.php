<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller
{

    protected $guard;

    public function store(Request $request,
                          CreateNewUser $creator)
    {
        //regeln für die Validation
        $rules = [
            //allready registered provider cant register as client and vice versa
            'email' => 'email | string | required | max:255 | unique:App\Models\Client,email|
               unique:App\Models\Provider,email',// connect to the table and look only in the email column
            'password' => 'required | string | confirmed',
        ];

        $validator = Validator::make($request->all(), $rules);

        $captchaResult = (integer)Crypt::decrypt($request->get("captchaResult"));

        if ($validator->fails() || $captchaResult != (integer)$request->get('result')) {
            $request->session()->flash('Registered', false);
            return redirect('login')->withErrors($validator, 'fromRegister');
        }

        if ($request->get('rolle') == 'kunde') {

            $newClient = $creator->createClient($request->all());  //create a Client and fill a record
            Auth::guard('client')->login($newClient);  //login newClient a 'client'
        } else {
            $newProvider = $creator->createProvider($request->all()); //create a Provider and fill a record
            Auth::guard('provider')->login($newProvider); //login newProvider a 'provider'
        }

        $request->session()->flash('Registered', true);

        return redirect("login");

    }


    //$this->guard->login($user);


    /*
            Auth::guard('admin')->login($user);


            Auth::loginUsingId(1);

    // Login and "remember" the given user...
            Auth::loginUsingId(1, true);
    */

}

/*
namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Register2Controller extends Controller
{

    protected $guard;

    public function addNewUser(Request $req)
    {

        //valiadate the input with rules in a array
        //username must be the name=".." of the intput
        //exists:table,column
        //The field under validation must exist on a given database table.

        $rules = [
            'email' => 'email | string | required | max:255 | unique:users',
            'password' => 'required | string | confirmed'
        ];
        $validator = Validator::make($req->except('csrf-token'), $rules);

        if ($validator->fails()) {

            $req->session()->push("Isregistered", false);
            return redirect("login")->withErrors($validator);
        }


        Client::create([
            // Email and Password are the columns in the Table
            'email' => $req->input('email'),
            'password' => hash("sha224", $req->input('password')),
            'rememberToken' => $req->input('token'),
            'timestamps' => time(),
        ]);
        $req->session()->push("Isregistered", true);


        $credentials = $req->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('dashboard');
        }


        return redirect()->route('welcome');

    }
}

*/
