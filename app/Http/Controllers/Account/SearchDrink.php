<?php

namespace App\Http\Controllers\Account;
use App\Http\Controllers\Controller;

use App\Models\Drink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class SearchDrink extends Controller
{
    public function search(Request $req){
            $rule=['livesearch'=>['numeric', 'regex:(^(\d{8}|\d{13})$)'  ]] ;

$drinksID=$req->get('livesearch');


        if(empty($req->get('livesearch')))
           return view('provider.addDrink',['row'=> []]);
        else if(Validator::make($req->all(),$rule)->fails()) {
            return view('provider.addDrink', ['row' => Drink::getThisName($drinksID)]);
        }
        else
            return view('provider.addDrink',['row'=> Drink::getLikeEAN($drinksID)]);
    }
    public function autocomplete(Request $req)
    {
        $rule=['livesearch'=>'numeric' ] ;

        $list = [];
        $searchName = $req->q;

        if ($req->has('q')) {

         if(Validator::make(['livesearch' => $searchName ],$rule)->fails()) {
             $list = Drink::getLikeName($searchName);
         }
         else
          $list=Drink::getLikeEAN($searchName);

        }
        return response()->json($list);

    }

}
