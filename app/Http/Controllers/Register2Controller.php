<?php

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
        /*exists:table,column
        The field under validation must exist on a given database table.
        */
        $rules =[
            'email' => 'email | string | required | max:255 | unique:users' ,
            'password' => 'required | string | confirmed'
        ];
        $validator = Validator::make($req->except('csrf-token'),$rules);

        if($validator->fails()){

            $req->session()->push("Isregistered",false);
            return redirect("login")->withErrors($validator);
        }



        Client::create([
            // Email and Password are the columns in the Table
            'email' => $req->input('email'),
        'password' => hash("sha224",$req->input('password')),
        'rememberToken' => $req->input('token'),
        'timestamps'=> time(),
        ]);
        $req->session()->push("Isregistered",true);



        $credentials = $req->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('dashboard');
        }


            return redirect()->route('welcome');

    }
}
