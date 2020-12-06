<?php

namespace App\Http\Controllers\Account;
use App\Http\Controllers\Controller;

use App\Models\Drink;
use Illuminate\Http\Request;


class SearchDrink extends Controller
{
    public function search(Request $req){

        if(empty($req->get('name')))
           return view('providerAccount.addDrink',['row'=> []]);
        $drink =new Drink();

        return view('providerAccount.addDrink',['row'=> $drink->getLikeName($req->get('name'))]);
    }
}
/*
$keywords = $request->get('keywords');

$suggestions = Search::where('keywords', 'LIKE', '%'.$keywords.'%')->get();

return $suggestions;
*/
