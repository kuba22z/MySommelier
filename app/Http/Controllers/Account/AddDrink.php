<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;

use App\Models\DrinksOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddDrink extends Controller
{
    public function add(Request $req)
    {
        $drink_id = $req->get('id');
        //wenn es einen duplikat gibt wird die Exception gefangen und
        // ignoriert ohne etwas in der Datenbank zu verändern
        try {
            DrinksOffer::insertOffer($drink_id, Auth::id());
        } catch (\Exception $e) {
        }
        return redirect()->route('business_view');
    }
    public function create(Request $req){

        return redirect()->back();
    }

}
