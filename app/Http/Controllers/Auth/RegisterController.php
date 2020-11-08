<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;



class RegisterController extends Controller
{

    protected $guard;

    /*
    public function __construct( $guard)
    {
        $this->guard = $guard;
    }
*/
    public function store(Request $request,
                          CreateNewUser $creator)
    {
        $rules = [
            //allready registered provider cant register as client and vice versa
            'email' => 'email | string | required | max:255 | unique:App\Models\Client,email|
               unique:App\Models\Provider,email',// connect to the table and look only in the email column
            'password' => 'required | string | confirmed',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect('login')->withErrors($validator, 'fromRegister');
        }

        if ($request->get('rolle') == 'kunde') {
            $creator->createClient($request->all());
            Auth::guard()->loginUsingId(1, true);
        }
        else {
            $creator->createProvider($request->all());
            Auth::guard('provider')->loginUsingId(1, true);
        }
        // Login and "remember" the given user...


        return redirect("login"); // The user is logged in...

    }

    public function logout()
    {
        Auth::logout();
    }

    //$this->guard->login($user);


    /*
            Auth::guard('admin')->login($user);


            Auth::loginUsingId(1);

    // Login and "remember" the given user...
            Auth::loginUsingId(1, true);
    */

}


