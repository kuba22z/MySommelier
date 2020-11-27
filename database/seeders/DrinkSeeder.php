<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DrinkSeeder extends Seeder
{
    /**
     * Run the database seeds with php artisan db:seed --class=DrinkSeeder
     *
     * @return void
     */
    public function run()
    {
        DB::table('drinks')->insert([
            [  'name' => 'Bitburger',
                'EAN' => '133523252',
                'product' => 'Bier',
                'type' =>   'Pils',
                'origin' =>  'Deutschland',
                'alcoholContent' => 4.1,
                'description' => "schmeckt",
                'image'=>""

            ]
        ]);
    }
}
