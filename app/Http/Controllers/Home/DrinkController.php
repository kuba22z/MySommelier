<?php

namespace App\Http\Controllers\Home;

use App\Models\CaptchaImage;
use App\Models\Drink;
use App\Models\Provider;
use http\Url;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class DrinkController extends Controller
{


    public function getDrinkToName(Request $req){
        //$name = request()->route()->parameter('info');


        if($req->request->get('moreDrinks')==="true")
            $numOfProviders=20;
        else
            $numOfProviders=3;

       $name = $req->request->get("info");

        $noProvider=false;
        $providers=null;
       if(!empty($req->request->get("id"))) {
           $drink_id = $req->request->get("id");
          $drink_id=(int)$drink_id;
           $providers=Provider::getProvidersWithDrinksByDrinkId($drink_id,$numOfProviders);
           if(count($providers)===0)
               $noProvider=true;
       }
        //$bew = $req->request->get("bew");

        if (!empty($req->request->all())){
            $drinks = Drink::all()->where('name', 'IS', $name);
        }else{
            $drinks = Drink::all();
        }

        return view('home.home', ['drinks' => $drinks,
                                       'providers' => $providers,
                                         'noProvider' => $noProvider]);
    }

    public function searchButton(Request $req){


        //$name = request()->route()->parameter('info');

        $name = $req->request->get("search_input");
        $product = $req->request->get("prod_select");
        $type = $req->request->get("art_select");
        $origin = $req->request->get("herkunft_input");

        $alk1 = $req->request->get("alkoholgehalt1");
        $alk2 = $req->request->get("alkoholgehalt2");

        $where_clausel = [
            ['name', 'LIKE', "%{$name}%"],
            ['origin', 'LIKE', "%{$origin}%"],
         //   ['alcoholContent', '>=', $alk1],
         //   ['alcoholContent', '<=', $alk2]
            //[] <-- Muss noch nach Bewertung gefiltert werden
            //[] <-- Muss noch nach Inhaltsstoffe gefiltert werden
        ];

        if (!empty($req->request->all())){
            if($product !== "all"){
                array_push($where_clausel,['product', '=', $product]);
            }
            if($type !== "all"){
                array_push($where_clausel,['type', '=', $type]);
            }

            $drinks = Drink::where($where_clausel)->get();
        }else{
            $drinks = Drink::all();
        }

        return view('home.home', ['drinks' => $drinks]);
    }

}
