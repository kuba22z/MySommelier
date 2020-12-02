<?php

namespace App\Http\Controllers\Account;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class Business extends Controller
{
    public function store(Request $req)
    {
        $this->validator($req);

        $imagePath=null;
        //saves the file/image in laravel storage folder and returns
        // /providersImage/{name of this file} as path
        if(!empty($req->file('image'))) {
            $image_path = $req->file('image')->store('public/providersImage');
            //In Laravel werden Dateien automatisch in storage/app gespeichert (ab da gilt der Pfad)

            $imagePath = substr($image_path, 7);
            $imagePath = "storage/".$imagePath;
            //da in Laravel sich der Pfad für den Zugriff einer Datei von dem Pfad der Speicherung unterscheidet muss
            // man den das public/ in $image_path abschneiden und durch ein storage/ ersetzen
        }
        $changes = [
            'name' => $req->get('name'),
            'address' => $req->get('address'),
            'website' => $req->get('website'),
            'openingHours' => $req->get('openHours'),
            'phoneNumber' => $req->get('telNr'),
            'description' => $req->get('description'),
            'image' => $imagePath
        ];
        //filtert alle Einträge im Array die null sind damit dann
        // nix in der Db überschrieben wird
        $changes=array_filter($changes);

        $provider = Auth::user();
        // Get the currently authenticated user...
        //alternative Get the currently authenticated user...
        //  $provider=Provider::find(Auth::id());

        $provider->update($changes);
        return redirect()->back();
    }

    public function validator(Request $request)
    {
        $rules = [
            'name' => ' string | max:40 | required',
            'address' => 'string | max:100 | required',
            'website' => 'url | nullable',
            'openHours' => 'string |max:400 | nullable ',
            'telNr' => 'digits_between:6,20 | nullable',
            'description' => 'string | max:500 | nullable',
            'image' => 'image | file | nullable'
        ];

        //Validator schickt die Daten direkt zurück zu der Geschaefteseite wenn es Fehler gab
        Validator::make($request->all(), $rules)->validate();
    }

}
