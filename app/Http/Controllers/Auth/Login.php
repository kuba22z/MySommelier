<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class Login extends Controller
{


    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        /* We have multiple users(clients and providers ) tables and models you should configure multiple
        sources which represent each model / table. These sources may then
        be assigned to any extra authentication guards you have defined.

        guard authenticate the specific user so that if you use guard('client') the methods/and  will be
        work on the database of this client

        ->for this functionilities I have modify auth.php which is in the configuration folder so
        that these guards are available

        attempt schaut ob es die Email und Password in einem Datensatz gibt und wenn ja wird dieser User als guard('client') eingeloggt */

        if (Auth::guard('client')->attempt($credentials)) {

            return redirect(route('welcome'));
        } else if (Auth::guard('provider')->attempt($credentials)) {
            return redirect(route('business_view'));
        } else {
            $email = $request->input("email");
            $password = $request->input("password");
            $request->session()->flash("email", $email);
            $request->session()->flash("password", $password);
            $request->session()->flash('LoggedIn', false);
            return redirect(route('login_view'));
        }

    }

    //logout all users
    public function logout()
    {

        Auth::guard("provider")->logout();
        Auth::guard("client")->logout();
        Auth::logout();
        return redirect(route("welcome"));
    }

}



