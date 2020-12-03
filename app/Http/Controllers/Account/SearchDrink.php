<?php

namespace App\Http\Controllers\Account;
use App\Http\Controllers\Controller;

use App\Models\Drink;
use Illuminate\Http\Request;


class SearchDrink extends Controller
{
    public function search(Request $req){

        //  $row =Drink::all();   // nimmt alle Daten von der Tablle drink und speichert es in row
        //    $row =Drink::all('name');  // wie select name from drinks
        // Verschieden möglichkeiten um sich einen bestimmten namen aus der Datenbank zu holen
        //  return Drink::where('name', '=', $req->get('name'))->get();
        //return DB::table('drinks')->where('name', '=',$req->get('name'))->get();
        //$row=DB::table('drinks')->select('name','type','alcoholContent')->where('name','LIKE',$req->get('name'))->get();
        $drink =new Drink();
        return view('providerAccount.addDrink',['row'=> $drink->getLikeName($req->get('name'))]);
    }
}
/*
$keywords = $request->get('keywords');

$suggestions = Search::where('keywords', 'LIKE', '%'.$keywords.'%')->get();

return $suggestions;
*/
