<?php
namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;

use App\Models\DrinksOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AddDrink extends Controller
{
    public function add(Request $req){
      $drink_id= $req->get('id');

       if($this->check($req)) {
           DrinksOffer::insertOffer($drink_id, Auth::id());
           // push Names of drinks to an array
           $req->session()->push('drinksOffer',[ $drink_id =>$req->get('name')]);
       }


     return redirect()->route('business_view');
    }
    public function check(Request $req):bool{


        $validator = Validator::make($req->all(), [
            'id' => 'exists:App\Models\DrinksOffer,drink_id'
        ]);
        return $validator->fails();

    }
}
