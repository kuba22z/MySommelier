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
                'origin' =>  'Bremen, Deutschland',
                'alcoholContent' => 4.1,
                'description' => "schmeckt",
                'image'=>"https://upload.wikimedia.org/wikipedia/commons/thumb/8/82/Bitburger_Premium_Beer.JPG/245px-Bitburger_Premium_Beer.JPG"
            ],
            [
                'name' => 'Weihenstephaner Hefe Weissbier',
                'EAN' => '149466422',
                'product' => 'Bier',
                'type' => 'Weissbier',
                'origin' => 'Hamburg, Deutschland',
                'alcoholContent' => 5.4,
                'description' => "sehr gut",
                'image' => "https://imgix.ranker.com/node_img/13/253101/original/weihenstephaner-hefe-weissbier-beers-photo-1?fit=crop&fm=pjpg&q=60&w=144&h=144&dpr=2"
            ],
            [
                'name' => 'Weihenstephaner Kristall Weissbier',
                'EAN' => '158427422',
                'product' => 'Bier',
                'type' => 'Weissbier',
                'origin' => 'Stuttgart, Deutschland',
                'alcoholContent' => 5.4,
                'description' => "toll",
                'image' => "https://imgix.ranker.com/node_img/13/253576/original/weihenstephaner-kristall-weissbier-beers-photo-1?fit=crop&fm=pjpg&q=60&w=144&h=144&dpr=2"
            ],
            [
                'name' => 'Paulaner Original Münchner Premium Lager',
                'EAN' => '154475422',
                'product' => 'Bier',
                'type' => 'Pils',
                'origin' => 'München, Deutschland',
                'alcoholContent' => 4.9,
                'description' => "wow",
                'image' => "https://imgix.ranker.com/node_img/13/253737/original/paulaner-original-m-nchner-premium-lager-beers-photo-1?fit=crop&fm=pjpg&q=60&w=144&h=144&dpr=2"
            ],
            [
                'name' => 'Franziskaner Hefe-Weisse Hell',
                'EAN' => '124499992',
                'product' => 'Bier',
                'type' => 'Weissbier',
                'origin' => 'Köln, Deutschland',
                'alcoholContent' => 5.0,
                'description' => "unglaublich",
                'image' => "https://imgix.ranker.com/node_img/3162/63234595/original/franziskaner-hefe-weisse-hell-beers-photo-1?fit=crop&fm=pjpg&q=60&w=144&h=144&dpr=2"
            ],
            [
                'name' => 'Spaten Münchner Hell',
                'EAN' => '124493442',
                'product' => 'Bier',
                'type' => 'Vollbier',
                'origin' => 'Bremen, Deutschland',
                'alcoholContent' => 5.2,
                'description' => "krass",
                'image' => "https://imgix.ranker.com/node_img/13/251489/original/spaten-m-nchner-hell-beers-photo-1?fit=crop&fm=pjpg&q=60&w=144&h=144&dpr=2"
            ]

        ]);
    }
}
