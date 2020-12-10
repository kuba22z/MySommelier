<?php
namespace App\Http\Controllers\Account;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

//Dieser Controller wird von Client und Provider geteilt

class Account extends Controller
{
    public function change(Request $req){
        $this->check($req);

        $changes = [
            'firstName' => $req->get('firstName'),

            'secondName' => $req->get('secondName'),
            'email' => $req->get('email'),
            'birthDate' => date("Y-m-d", strtotime( $req->get('birthDate'))),
        ];

        //filtert alle Einträge im Array die null sind damit dann
        // nix in der Db überschrieben wird
        $changes = array_filter($changes);

        $provider = Auth::user();

        $provider->update($changes);
        return redirect()->back();
    }

    public function check(Request $req)
    {
        $rules = [
            'firstName' => [
                // Zahlen und Sonder Zeichen wie (,) sind nicht erlaubt sind
                'nullable', 'string', ' max:40 ', "regex:/(^[a-zäöüßÖÄÜ ,.'-]+$)/i"],

            'secondName' => [
                // Zahlen und Sonder Zeichen wie (,) sind nicht erlaubt sind
                'nullable', 'string', ' max:40 ', "regex:/(^[a-zäöüßÖÄÜ ,.'-]+$)/i"],

            'email' => 'nullable |email | string | max:100',
            'birthDate' => 'nullable | date | max:40',
        ];

        //Validator schickt die Daten direkt zurück zu der Geschaefteseite wenn es Fehler gab
        Validator::make($req->all(), $rules)->validate();

    }

    public function changePsw(Request $req){
        $provider=Auth::user();
        $newPassword=$req->get('password');
        $newPassword2=$req->get('password_confirm');
        $actualPassword=$req->get('actualPsw');



        if(Hash::check($actualPassword, $provider->getAuthPassword()) && $newPassword===$newPassword2 && $newPassword!==$actualPassword ){

            $changes = ['password' => Hash::make($newPassword)];

            $provider->update($changes);
            $req->session()->flash('successful', true);
            return redirect()->back();

        }
        else {
            $req->session()->flash('successful', false);
               return redirect()->back();
        }
    }




}
