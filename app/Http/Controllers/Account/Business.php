<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;


class Business extends Controller
{
    public function store(Request $req)
    {
        //to get all providers of a certain column
        //$provider =Provider::all();
        //$provider =Provider::all('this column');

        //alternative Get the currently authenticated user...
        //  $provider=Provider::find(Auth::id());
        //$provider->name; to get the current name in the database


        // Get the currently authenticated user...
        $provider = Auth::user();

        $changes = [
            'name' => $req->get('name'),
            'address' => $req->get('address'),
            'website' => $req->get('website'),
            'openingHours' => $req->get('openHours'),
            'phoneNumber' => $req->get('telNr'),
            'description' => $req->get('description')
        ];

        $provider->update($changes);
    }


}
