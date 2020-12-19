<?php

namespace Database\Seeders;

use App\Models\Provider;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provider=Provider::create([
        'email' => 'provider@gmail.com',
        'password' => Hash::make(1),
    ]);
        $changes = [
            'firstName' => "ds",
            'secondName' => "ds",
            'birthDate' => date("Y-m-d", strtotime("2010-08-10")),

            'businessName' => "dd",

            'zip' => "d",
            'city' => "d",
            'street' =>  "",

            'website' => "",
            'openingHours' => "",
            'phoneNumber' => "",
            'description' => "",
            'image' => ""
            ];
        $provider->update($changes);


    }
}
