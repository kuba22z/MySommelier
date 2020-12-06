<?php

namespace App\Http\Controllers\Account;


use App\Http\Controllers\Controller;
use App\Models\DrinksOffer;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class Business extends Controller
{
    public function store(Request $req)
    {
        if(!empty($req->get('removeIt'))) {
         $this->removeDrinkOffer($req);
            return redirect()->back();
        }
        $this->updateRecommendedOffer($req);

        $this->check($req);

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
            'firstName' => $req->get('firstName'),
            'secondName' => $req->get('secondName'),

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
        $changes=array_filter($changes);

        $provider = Auth::user();
        // Get the currently authenticated user...
        //alternative Get the currently authenticated user...
        //  $provider=Provider::find(Auth::id());

        $provider->update($changes);
        return redirect()->back();
    }
    public function check(Request $req)
    {

        $message=[
            'openHours.regex' =>"Fehler: verwenden Sie dieses Format: Mo:08:00-15:59;"
        ];

        $rules = [
            // Zahlen und Sonder Zeichen wie (,) sind nicht erlaubt sind
            'firstName' => ['string' ,' max:40 ', 'required',"regex:/(^[a-zäöüßÖÄÜ ,.'-]+$)/i"],
            'secondName' => [ 'string',' max:40 ', 'required',"regex:/(^[a-zäöüßÖÄÜ ,.'-]+$)/i"],
            //Nur länge von 5 oder 4 erlaubt
            'zip' => ['required','digits_between:4,5'],
            'city' =>['required','max:40',"regex:/(^[a-zäöüßÖÄÜ ,.'-]+$)/i"],
            //Muss eine Hausnr enthalten mit leerzeichen als Trennung
            'street' => ['required','max:40',"regex:/(^[a-zäöüßÖÄÜ ,.'-]+ [0-9]{1,3}[a-z]?$)/i"],


            'website' => 'url | nullable',
            'openHours' => ['nullable','regex:(^((Mo|Di|Mi|Do|Fr|Sa|So):[0-2]\d:[0-5]\d-[0-2]\d:[0-5]\d;){1,7}$)'],
            'telNr' => [ 'nullable' , 'regex:(^\+?\d{6,14}$)'],
            'description' => 'string | max:500 | nullable',
            'image' => 'image | file | nullable'
        ];

        //Validator schickt die Daten direkt zurück zu der Geschaefteseite wenn es Fehler gab
        Validator::make($req->all(), $rules,$message)->validate();


    }
    // aktualisiert die Datenbank mit Empfehlungen und macht die Checkboxen persistent
    public function updateRecommendedOffer(Request $req) {
        $req->session()->forget('recommendedOffer');
            $falseDrinkids=[];
            $trueDrinkids=[];
            $i=0;
        //if checkbox was unchecked -> req->get(NumberOfThisCheckBox) will be empty else true
        //recommendedOffer is for the controll of checkboxes
            foreach (session('drinksOffer') as $row ){
                foreach ($row as $drink_id => $name) {
                    if (!empty($req->get($i))) {
                        $req->session()->push('recommendedOffer', true);
                        $trueDrinkids[] = $drink_id;
                    } else {
                        $req->session()->push('recommendedOffer', false);
                        $falseDrinkids[] = $drink_id;
                    }
                    $i++;
                }
            }

            DrinksOffer::updateRecommended(Auth::id(),$falseDrinkids,$trueDrinkids);
    }
    public function removeDrinkOffer(Request $req){
       $keys= explode(';',$req->get('removeIt'));
       $drink_id=$keys[0];
       $row=$keys[1];

       $newDrinksOffer=$this->deleteDrink((array)session('drinksOffer'),$drink_id);
        $req->session()->forget('drinksOffer');
        $req->session()->put('drinksOffer', $newDrinksOffer);

        $newRecommendedOffer=$this->deleteRecommendation((array)session('recommendedOffer'),$row);
        $req->session()->forget('recommendedOffer');
        $req->session()->put('recommendedOffer', $newRecommendedOffer);

        DrinksOffer::removeOffer(Auth::id(),$drink_id);
    }
    public function deleteRecommendation(array $array,int $key_row) :array{
        $temp=[];
        foreach ($array as $key => $row)
        {
            if($key_row==$key)
            continue;
            $temp[]= $row;
        }
            return $temp;

    }
    public function deleteDrink(array $array,int $this_drink_id) :array{
        $temp=[];
        foreach ($array as $key => $row ) {
           foreach ($row as $drink_id => $name ) {
               if ($this_drink_id == $drink_id)
                   continue;
               $temp[]=$row;
           }

        }

       return $temp;
    }




}
