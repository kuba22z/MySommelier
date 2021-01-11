<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client=Client::create([
            'email' => 'client@gmx.de',
            'password' => Hash::make(1),
        ]);
        $changes = [
            'firstName' => "Peter",
            'secondName' => "Müller",
            'birthDate' => date("Y-m-d", strtotime("1990-08-10")),

        ];
        $client->update($changes);
    }
}
