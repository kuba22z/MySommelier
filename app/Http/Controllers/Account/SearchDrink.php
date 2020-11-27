<?php

namespace App\Http\Controllers\Account;
use App\Http\Controllers\Controller;

use App\Models\Drink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SearchDrink extends Controller
{
    public function search(Request $req){

        //to get all drinks of a certain column
       $row =Drink::all();
     // 3 Ways how u can get records where the request name contains(is Equal)
      //  return Drink::where('name', '=', $req->get('name'))->get();
        //return DB::table('drinks')->where('name', '=',$req->get('name'))->get();
    $row=DB::table('drinks')->select('name','type','alcoholContent')->where('name','LIKE',$req->get('name'))->get();

        return view('providerAccount.addDrink',['row'=>$row]);
    }
}
/*
$keywords = $request->get('keywords');

$suggestions = Search::where('keywords', 'LIKE', '%'.$keywords.'%')->get();

return $suggestions;
*/
