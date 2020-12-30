<?php

namespace App\Http\Controllers\Home;

use App\Models\CaptchaImage;
use App\Models\Drink;
use App\Models\Provider;
use http\Url;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class DrinkController extends Controller
{


    public function getDrinkToName(Request $req){
        $noProvider=false;
        $providers=null;
        $drinks=null;
       if(!empty($req->request->get("id"))) {
           $drink_id = $req->request->get("id");
          $drink_id=(int)$drink_id;

           DB::beginTransaction();
            try {
                if ($req->request->get('moreDrinks') === "true") {
                    $numOfProviders = 20;
                    $drinks = Drink::getDrinkByIDWithSubstances($drink_id);
                } else {
                    $drinks = Drink::getDrinkByID($drink_id);
                    $numOfProviders = 3;
                }


                $providers = Provider::getProvidersWithDrinksByDrinkId($drink_id, $numOfProviders);
            DB::commit();
            } catch (\Exception $e) {
                DB::rollback();
            }

           if(count($providers)===0)
               $noProvider=true;
       }
       else{
           $drinks = Drink::all();
       }
        return view('home.home', ['drinks' => $drinks,
                                       'providers' => $providers,
                                         'noProvider' => $noProvider,
                                      ]);
    }

    public function searchButton(Request $req){


        //$name = request()->route()->parameter('info');

        $name = $req->request->get("search_input");
        $product = $req->request->get("prod_select");
        $type = $req->request->get("art_select");
        $origin = $req->request->get("herkunft_input");
        $substances= $req->get('inhaltsstoffe_input');
        $allergen =$req->request->get("keineAllergene");
        $alk=explode("-",str_replace(["%"," "],"",$req->request->get('alcoholContent')));

        $alk_low = $alk[0];
        $alk_high = $alk[1];

        $where_clausel = [
            ['drinks.name', 'LIKE', "%{$name}%"],
            ['origin', 'LIKE', "%{$origin}%"],
            ['alcoholContent', '>=', $alk_low],
           ['alcoholContent', '<=', $alk_high]
            //[] <-- Muss noch nach Bewertung gefiltert werden
        ];
            if($product !== "all"){
                array_push($where_clausel,['product', '=', $product]);
            }
            if($type !== "all"){
                array_push($where_clausel,['type', '=', $type]);
            }
            if(!empty($substances))
                $substances =explode(',',$substances);
                else
            $substances=[];

             if($allergen==="false")
                 $allergen = false;
            else
                $allergen = true;

                $drinks = Drink::getDrinkByWhereClauselWithSubstances($where_clausel,$substances,$allergen);

        return view('home.home', ['drinks' => $drinks,
                                        'allergen' => $allergen,
                                         'substancesInput' =>$substances]);
    }

}
