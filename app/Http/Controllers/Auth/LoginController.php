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


        /* We have multiple users(clients and providers ) tables or models you should configure multiple
        sources which represent each model / table. These sources may then
        be assigned to any extra authentication guards you have defined.

        guard authenticate the specific user so that if you use guard('client') the methods/and  will be
        work on the database of this client

        ->for this functionilities a I have modify auth.php which is in the configuration folder so
        that these guard are available


        attempt schaut ob es die Email und Password in einem Datensatz gibt und wenn ja wird dieser User als guard('client') eingeloggt
        */

        if (Auth::guard('client')->attempt($credentials)) {

            return redirect('welcome');
        }
        else if (Auth::guard('provider')->attempt($credentials)) {
            return redirect('/Geschäft_einrichten');
        }
        else{
            $email=$request->input("email");
            $password=$request->input("password");
            $request->session()->flash("email",$email);
            $request->session()->flash("password",$password);
            $request->session()->flash('LoggedIn',false);
            return redirect('login');
        }

    }
    public function logout()
    {

        Auth::guard("provider")->logout();
        Auth::guard("client")->logout();
        Auth::logout();
        return redirect("welcome");
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
