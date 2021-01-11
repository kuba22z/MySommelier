<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;

use App\Models\Drink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class CreateDrink extends Controller
{
    public function create(Request $req)
    {
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
        } else
            return redirect()->back()->withErrors(['drinkImage' => "The image field is required."]);

        //to modify the req->get('image')
        $req->merge([
            'image' => $imagePath
        ]);


        if (Drink::createDrink($this->formatSubstances($req->get('substances')), $req) === false)
            File::delete($imagePath);
        return redirect()->route('search_drink');
    }

    public function check(Request $req)
    {
        $message = [

        ];
        $rules = [
            // Zahlen und Sonder Zeichen wie ( ) sind nicht erlaubt sind
            'name' => ['required', 'string', ' max:40 ', "regex:/(^[a-zäöüßÖÄÜ +,.'-]+$)/i"],

            // ean can have only 8 or 13 numbers
            'ean' => ['required', 'numeric', 'regex:(^(\d{8}|\d{13})$)'],
            'origin' => ['required', 'max:40', "regex:/(^[a-zäöüßÖÄÜ ,.'-]+$)/i"],

            'substances' => ['required', "regex:/(^([a-zäöüßÖÄÜ '-]+)(,[a-zäöüßÖÄÜ '-]+)*$)/i"],
            "alcoholContent" => 'required| numeric | between:0,99.99',
            "image" => 'image | file',
        ];

        //Validator schickt die Daten direkt zurück zu der Geschaefteseite wenn es Fehler gab
        Validator::make($req->all(), $rules)->validate();

    }

    public function formatSubstances(string $substances)
    {

        //Formatierung der Inhaltstoffe so, dass Inhaltstoffe und zugehörige Allergen gespeichert werden können
        $substances = explode(',', $substances);

        //entfernen der Leerzeichen zwischen Inhaltstoffen und Allergenen
        foreach ($substances as $key => $substance) {
            //preg_split splits $substance if on the end there is A
            //left result will be pushed to $substancesA[$key][0] and the right to $substancesA[$key][1]
            $substancesA[] = preg_split('/\s+A/', $substance);
            if (isset($substancesA[$key][1]))
                $substancesA[$key][1] = true;
            else
                $substancesA[$key][1] = false;
        }
        return $substancesA;

    }

    public function createByCsv(Request $req)
    {
        Validator::make($req->all(), ["csv" => 'file ',])->validate();
        if (empty($req->file('csv')))
            return redirect()->back()->withErrors(['csv' => "The csv field is required."]);


        $attributes = [
            'name',
            'ean',
            'product',
            'type',
            'origin',
            'alcoholContent'
        ];
        //get Full file as string
        $csv = explode("\n", file_get_contents($req->file('csv')));

        foreach ($csv as $row)
            $table [] = explode(';', $row);

        $substances = [];

        //Format substances in a seperate array
        foreach ($table as $key => $record) {
            if (count($record) === 7) {
                $substances [] = $this->formatSubstances($record[5]);
                //remove substance row from the table
                unset($table[$key][5]);

                //set required indexes for the table(without this insert is impossible)
                $table[$key] = array_combine($attributes, $table[$key]);

            } else
                unset($table[$key]);
        }

        if ($table !== []) {
            $i = 0;
            foreach ($table as $key => $record) {

                Drink::createDrinkSeeder($substances[$i], $record);
                $i++;
            }
        } else
            return redirect()->back()->withErrors(['csv' => "The csv format is invalid."]);

        return view('provider.business', ['openSearch' => true]);
    }


}
