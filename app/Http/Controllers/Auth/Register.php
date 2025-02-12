<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\CaptchaImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;


class Register extends Controller
{

    protected $guard;

    public function store(Request $request,
                          CreateNewUser $creator)
    {
        if(!$this->check($request))
            return redirect()->back();

        if ($request->get('rolle') == 'kunde') {

            $creator->createClient($request->all());  //create a Client and fill a record
        } else {
             $creator->createProvider($request->all()); //create a Provider and fill a record
        }

        $request->session()->flash('Registered', true);

        return redirect()->back();

    }
public static function check(Request $request): bool
{
    //regeln für die Validation
    $rules = [
        //already registered provider cant register as client and vice versa
        'email' => 'email | string | required | max:100 | unique:App\Models\Client,email|
               unique:App\Models\Provider,email',// connect to the table and look only in the email column
        'password' => 'required | string | confirmed',
    ];

    $validator = Validator::make($request->all(), $rules);

    //den vorher zufällig generierten Captcha aus der Datenbank holen
    $image= new CaptchaImage();
    $row = $image->getCaptchaImage($request->get("captchaID"));
    $captchaResult = (integer)Crypt::decrypt($row->result);
    if ($validator->fails() || $captchaResult != (integer)$request->get('result')) {
        $request->session()->flash('Registered', false);
      return false;
    }
    return true;
}


}
