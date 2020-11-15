<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Provider;
use Illuminate\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        //valiadate the input with rules in a array
        //username must be the name=".." of the intput
        /*exists:table,column
        The field under validation must exist on a given database table.
        */

/*
        return Client::create([
            // Email and Password are the columns in the Table
            'email' => $input['email'],
            'password' => hash("sha224",$input['password']),
            'rememberToken' => $input['token'],
            'timestamps'=> time(),
        ]);*/




        return Client::create([
            'email' => $input['email'],
            'password' => Hash::make($input['password'],[MHASH_SHA224]),
            'timestamps' => time(),

        ]);

    }


}

/**
 * transaction method on the DB facade to run a set of
 * operations within a database transaction. If an exception
 * is thrown within the transaction Closure, the transaction
 * will automatically be rolled back. If the Closure executes
 * successfully, the transaction will automatically be committed.
 * You don't need to worry about manually rolling back or committing
 * while using the transaction method:
 *
 */
