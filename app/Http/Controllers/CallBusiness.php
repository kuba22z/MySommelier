<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CallBusiness extends Controller
{

    public function index(Request $req, $id)
    {
        $id = (int)$id;
        if ($req->get('Getraenkekarte') === "1") {
            $provider = Provider::getProviderByIdWithAllDrinks($id);
            $text = "Getränkekarte";
            $button = "Empfohlene Getränke";
            $showAllDrinks = "0";
        } else {
            $provider = Provider::getProviderByIdWithRecommend($id);
            $text = "Empfohlene Getränke";
            $button = "Getränkekarte";
            $showAllDrinks = "1";
        }
        if ($provider->isNotEmpty())
            return view('client.callBusiness', ['provider' => $provider,
                'id' => $id,
                'text' => $text,
                'showAllDrinks' => $showAllDrinks,
                'button' => $button,]);
        abort(404);
    }


}
