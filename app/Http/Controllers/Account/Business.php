<?php

namespace App\Http\Controllers\Account;


use App\Http\Controllers\Controller;
use App\Models\DrinksOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class Business extends Controller
{
    public function store(Request $req)
    {

        if (!empty($req->get('removeIt'))) {
            DrinksOffer::removeOffer(Auth::id(), $req->get('removeIt'));
            return view('provider.business');
        }
        $this->updateRecommendedOffer($req);

        $this->check($req);

        $imagePath = null;
        //saves the file/image in laravel storage folder and returns
        // /providersImage/{name of this file} as path
        if (!empty($req->file('image'))) {
            $image_path = $req->file('image')->store('public/providersImage');
            //In Laravel werden Dateien automatisch in storage/app gespeichert (ab da gilt der Pfad)

            $imagePath = substr($image_path, 7);
            $imagePath = "storage/" . $imagePath;
            //da in Laravel sich der Pfad für den Zugriff einer Datei von dem Pfad der Speicherung unterscheidet muss
            // man den das public/ in $image_path abschneiden und durch ein storage/ ersetzen
        }
        $changes = [
            'businessName' => $req->get('name'),

            'zip' => $req->get('zip'),
            'city' => $req->get('city'),
            'street' => $req->get('street'),

            'website' => $req->get('website'),
            'openingHours' => $req->get('openHours'),
            'phoneNumber' => $req->get('telNr'),
            'description' => $req->get('description'),
            'image' => $imagePath
        ];
        //filtert alle Einträge im Array die null sind damit dann
        // nix in der Db überschrieben wird
        $changes = array_filter($changes);

        $provider = Auth::user();
        // Get the currently authenticated user...
        //alternative Get the currently authenticated user...
        //  $provider=Provider::find(Auth::id());

        $provider->update($changes);
        return redirect()->back();
    }

    public function check(Request $req)
    {
        $message = [
            'openHours.regex' => "use this format: Mo-Fr:08:00-16:00;So:08:00-15:59;"
        ];

        $rules = [

            'name' => [
                Rule::requiredIf(function () {
                    $r = Auth::user();
                    return empty($r->businessName);
                }),
                // Zahlen und Sonder Zeichen wie (,) sind nicht erlaubt sind
                'nullable', 'string', ' max:40 ', "regex:/(^[a-zäöüßÖÄÜ ,.'-]+$)/i"],


            'city' => [
                Rule::requiredIf(function () {
                    $r = Auth::user();
                    return empty($r->city);
                }),
                'nullable', 'max:40', "regex:/(^[a-zäöüßÖÄÜ ,.'-]+$)/i"],
            //Muss eine Hausnr enthalten mit leerzeichen als Trennung
            'street' => [
                Rule::requiredIf(function () {
                    $r = Auth::user();
                    return empty($r->street);
                }),
                'nullable', 'max:40', "regex:/(^[a-zäöüßÖÄÜ ,.'-]+ [0-9]{1,3}[a-z]?$)/i"],


            'zip' => [Rule::requiredIf(function () {
                $r = Auth::user();
                return empty($r->zip);
            }), 'nullable', 'digits_between:4,5'],

            'website' => 'url | nullable',
            'openHours' => ['nullable', 'regex:(^((Mo|Di|Mi|Do|Fr|Sa|So)(-(Mo|Di|Mi|Do|Fr|Sa|So)){0,1}:(([0-2]\d:[0-5]\d-[0-2]\d:[0-5]\d)|geschlossen);){1,7}$)'],
            'telNr' => ['nullable', 'regex:(^\+?\d{6,14}$)'],
            'description' => 'string | max:500 | nullable',
            'image' => 'image | file | nullable'
        ];

        //Validator schickt die Daten direkt zurück zu der Geschaefteseite wenn es Fehler gab
        Validator::make($req->all(), $rules, $message)->validate();

    }

    // aktualisiert die Datenbank mit Empfehlungen und macht die Checkboxen persistent
    public function updateRecommendedOffer(Request $req)
    {
        $count = $req->get('OffersCount');
        $trueDrinkids = [];

        //if checkbox was unchecked -> req->get(NumberOfThisCheckBox) will be empty else the nummber of the drink_id
        for ($i = 0, $j=0; $i < $count && $j<3; $i++) {
            if (!empty($req->get($i))) {
                $trueDrinkids[] = $req->get($i);
                $j++; //damit maximal nur drei Getränke als empfohlen gesetzt werden können
            }
        }
        DrinksOffer::updateRecommended(Auth::id(), $trueDrinkids);
    }
}
