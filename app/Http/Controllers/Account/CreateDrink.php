<?php

namespace App\Http\Controllers\Account;
use App\Http\Controllers\Controller;

use App\Models\Drink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CreateDrink extends Controller
{
    public function create(Request $req){

        $this->check($req);


        //saves the file/image in laravel storage folder and returns
        // /providersImage/{name of this file} as path

        $imagePath = null;
        if (!empty($req->file('drinkImage'))) {
            if ($req->get('product') === 'Wein')
                $image_path = $req->file('drinkImage')->store('public/drinksImage/wine');
            else
                $image_path = $req->file('drinkImage')->store('public/drinksImage/beer');
            //In Laravel werden Dateien automatisch in storage/app gespeichert (ab da gilt der Pfad)


            $imagePath = substr($image_path, 7);
            $imagePath = "storage/" . $imagePath;
            //da in Laravel sich der Pfad für den Zugriff einer Datei von dem Pfad der Speicherung unterscheidet muss
            // man den das public/ in $image_path abschneiden und durch ein storage/ ersetzen
        }
        else
            return redirect()->back()->withErrors(['drinkImage'=>"The image field is required."]);

        //to modify the req->get('image')
        $req->merge([
            'image'=>$imagePath
        ]);



    Drink::createDrink($this->formatSubstances($req->get('substances')),$req);


            return redirect()->route('search_drink');
    }
    public function check(Request $req)
    {
        $message = [

        ];
        $rules = [
            // Zahlen und Sonder Zeichen wie ( ) sind nicht erlaubt sind
            'name' => ['required', 'string', ' max:40 ', "regex:/(^[a-zäöüßÖÄÜ ,.'-]+$)/i"],


            'ean' => ['required', 'digits_between:8,13'],
            'origin' => ['required', 'max:40', "regex:/(^[a-zäöüßÖÄÜ ,.'-]+$)/i"],

            'substances' =>['required',"regex:/(^([a-zäöüßÖÄÜ '-]+)(,[a-zäöüßÖÄÜ '-]+)*$)/i"],
            "alcoholContent" => 'required| numeric | between:0,99.99',
            "image" => 'image | file',
            ];

        //Validator schickt die Daten direkt zurück zu der Geschaefteseite wenn es Fehler gab
        Validator::make($req->all(), $rules)->validate();

    }
   public function formatSubstances(String $substances){

       //Formatierung der Inhaltstoffe so, dass Inhaltstoffe und zugehörige Allergen gespeichert werden können
       $substances=explode(',',$substances);

       //entfernen der Leerzeichen zwischen Inhaltstoffen und Allergenen
       foreach ($substances as $key  => $substance) {
           $substancesA[] = preg_split('/\s+/', $substance);
           if(isset($substancesA[$key][1]))
               $substancesA[$key][1]=true;
           else
               $substancesA[$key][1]=false;
       }
        return $substancesA;

   }

}
