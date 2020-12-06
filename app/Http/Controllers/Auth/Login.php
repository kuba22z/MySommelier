<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


class Login extends Controller
{
    public function login(Request $request)
    {
/*
        guard authenticate the specific user so that if you use guard('client') the methods/and  will be
        work on the database of this client
        ->for this functionilities I have modify auth.php which is in the configuration folder so
        that these guards are available

        attempt schaut ob es die Email und Password in einem Datensatz gibt und wenn ja wird dieser User als guard('client') eingeloggt
      */

        $credentials = $request->only('email', 'password');

        if (Auth::guard('client')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/');
        } else if (Auth::guard('provider')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('business_view');
        } else {
            $email = $request->input("email");
            $password = $request->input("password");
            $request->session()->flash("email", $email);
            // damit diese Email in der view angezeigt wird
            $request->session()->flash("password", $password);
            $request->session()->flash('LoggedIn', false);
            return redirect()->route('login_view');
        }

    }

    public function logout()
    {
        if(Auth::guard("client")->check())
        Auth::guard('client')->logout();
        elseif(Auth::guard("provider")->check())
        Auth::guard('provider')->logout();

    return redirect('/');
    }
}



