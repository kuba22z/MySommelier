<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Provider;
use Illuminate\Support\Facades\Hash;

class CreateNewUser extends Controller
{
    /**
     * Create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\Provider
     */
    public function createProvider(array $input)
    {
        return Provider::create([
            'email' => $input['email'],
            'password' => Hash::make($input['password'],[MHASH_SHA224]),
            'timestamps' => time(),

        ]);

    }
    public function createClient(array $input)
    {
        return Client::create([
            'email' => $input['email'],
            'password' => Hash::make($input['password'],[MHASH_SHA224]),
            'timestamps' => time(),

        ]);

    }


}
