<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('clients')->attempt($credentials)) {
            Auth::guard('clients')->loginUsingId(1);
            return redirect('welcome');
        }
        else if (Auth::guard('providers')->attempt($credentials)) {
            Auth::guard('providers')->loginUsingId(1);
            return "Meine Geschäftsseite";
        }
        else{
            $email=$request->input("email");
            $password=$request->input("password");
            $request->session()->flash("email",$email);
            $request->session()->flash("password",$password);
            $request->session()->flash('NotRegistered',true);
            return redirect('login');
        }

    }


    public function login2(Request $req)
    {


        $messages = [
            'email' =>'Sie müssen eine E-mail angeben',
            'required' => 'Sie müssen ein Passwort angeben',
        ];

        //valiadate the input with rules in a array
        //username must be the name=".." of the intput
        /*exists:table,column
        The field under validation must exist on a given database table.
        */
        // Login and "remember" the given user...
        //Auth::loginUsingId(1, true);


        $rules =[
            'email' => 'email | string | required | max:255 | exists:users' ,
            'password' => 'required | string | confirmed | exists:users'
        ];
        $validator = Validator::make($req->except('csrf-token'),$rules,$messages);

       if($validator->fails()){

           $email=$req->input("email");
           $password=$req->input("password");

           return redirect("login")->withErrors($validator);
       }

    Auth::loginUsingId(1);
    return redirect("welcome");
    }

}

// The token varaible is _token
/*
 * If you need to sanitize any data from the request before you apply
 * your validation rules, you can use the prepareForValidation method:
use Illuminate\Support\Str;

/**
 * Prepare the data for validation.
 *
 * @return void

protected function prepareForValidation()
{
    $this->merge([
        'slug' => Str::slug($this->slug),
    ]);
}
Um errors in html anzuzeigen

<span style="color: red">@error('email'){{$message}}@enderror</span><br>
  <span style="color: red">@error('password'){{$message}}@enderror</span>

 */


/*
Auth::loginUsingId(1);

// Login and "remember" the given user...
Auth::loginUsingId(1, true);
*/

/**
 * Handle an authentication attempt.
 *
 * @param  \Illuminate\Http\Request $request
 *
 * @return Response

public function authenticate(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // Authentication passed...
        return redirect()->intended('dashboard');
    }
}
*/
