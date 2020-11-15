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

}
