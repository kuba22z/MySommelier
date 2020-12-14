<?php

namespace Database\Seeders;

use App\Models\Drink;
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

        //***++++++++Bier
            Drink::createDrinkSeeder(
                [['Wasser',false],     //Inhaltstoffe für das Getränk eintragen
                    ['Gerstenmalz',false],
                    ['Hopfen',false],
                ['Sulfite',true]
                ],


                ['name' => 'Astra Urtyp',
                'EAN' => '42140849',
                'product' => 'Bier',
                'type' => 'Pils',
                'origin' => 'Hamburg, Deutschland',
                'alcoholContent' => 4.9,
                'image' => "storage/drinksImage/beer/astra_urtyp__0879.jpg"]
            );
        Drink::createDrinkSeeder(
            [['Wasser',false],     //Inhaltstoffe für das Getränk eintragen
                ['Gerstenmalz',false],
                ['Hopfen',false],
                ['Hefe',false],
                ['Sulfite',true]
            ],

            ['name' => 'Augustiner Weißbier',
                'EAN' => '42140848', //Random EAN
                'product' => 'Bier',
                'type' => 'Weissbier',
                'origin' => 'München, Deutschland',
                'alcoholContent' => 5.4,
                'image' => "storage/drinksImage/beer/augustiner_weissbier.jpg"]
        );
        Drink::createDrinkSeeder(
            [['Wasser',false],     //Inhaltstoffe für das Getränk eintragen
                ['Gerstenmalz',false],
                ['Hopfen',false]
            ],

            ['name' => 'Budweiser',
                'EAN' => '42140847',
                'product' => 'Bier',
                'type' => 'Pils',
                'origin' => 'Budweis, Tschechien',
                'alcoholContent' => 5,
                'image' => "storage/drinksImage/beer/1607_budweiser_budvar_05l.jpg"]
        );



        //**********Wein
        Drink::createDrinkSeeder(
            [['Wasser',false],     //Inhaltstoffe für das Getränk eintragen
                ['Muskattrauben',false],
                ['Sulfite',true]
            ],

            ['name' => 'Voga Moscato',
                'EAN' => '42140846',
                'product' => 'Wein',
                'type' => 'Weisswein',
                'origin' => 'Italien',
                'alcoholContent' => 6.5,
                'image' => "storage/drinksImage/wine/voga_-_moscato.jpg"]
        );

        Drink::createDrinkSeeder(
            [['rote Trauben',false],
                ['schwarze Waldbeeren',false],                        //Inhaltstoffe für das Getränk eintragen
                ['Farbstoffe',false],
                ['Sulfite',true]
            ],

            ['name' => 'Evel Reserva Tinto',
                'EAN' => '42140845',
                'product' => 'Wein',
                'type' => 'Rotwein',
                'origin' => 'Portugal',
                'alcoholContent' => 14,
                'image' => "storage/drinksImage/wine/5114_evel_reserva_tinto.jpg"]
        );
        Drink::createDrinkSeeder(
            [                           //Inhaltstoffe für das Getränk eintragen
                ['Sulfite',true]
            ],

            ['name' => 'Christkindl Glühwein',
                'EAN' => '42140844',
                'product' => 'Wein',
                'type' => 'Glühwein',
                'origin' => 'Kolbermoor, Deutschland',
                'alcoholContent' => 9,
                'image' => "storage/drinksImage/wine/5981_christkindl_gluehwein.jpg"]
        );


        DB::table('drinks')->insert([
            [  'name' => 'Bitburger',
                'EAN' => '133523252',
                'product' => 'Bier',
                'type' =>   'Pils',
                'origin' =>  'Bremen, Deutschland',
                'alcoholContent' => 4.1,
                'image'=>"https://upload.wikimedia.org/wikipedia/commons/thumb/8/82/Bitburger_Premium_Beer.JPG/245px-Bitburger_Premium_Beer.JPG"
            ],
            [
                'name' => 'Weihenstephaner Hefe Weissbier',
                'EAN' => '149466422',
                'product' => 'Bier',
                'type' => 'Weissbier',
                'origin' => 'Hamburg, Deutschland',
                'alcoholContent' => 5.4,
                'image' => "https://imgix.ranker.com/node_img/13/253101/original/weihenstephaner-hefe-weissbier-beers-photo-1?fit=crop&fm=pjpg&q=60&w=144&h=144&dpr=2"
            ],
            [
                'name' => 'Weihenstephaner Kristall Weissbier',
                'EAN' => '158427422',
                'product' => 'Bier',
                'type' => 'Weissbier',
                'origin' => 'Stuttgart, Deutschland',
                'alcoholContent' => 5.4,
                'image' => "https://imgix.ranker.com/node_img/13/253576/original/weihenstephaner-kristall-weissbier-beers-photo-1?fit=crop&fm=pjpg&q=60&w=144&h=144&dpr=2"
            ],
            [
                'name' => 'Paulaner Original Münchner Premium Lager',
                'EAN' => '154475422',
                'product' => 'Bier',
                'type' => 'Pils',
                'origin' => 'München, Deutschland',
                'alcoholContent' => 4.9,
                'image' => "https://imgix.ranker.com/node_img/13/253737/original/paulaner-original-m-nchner-premium-lager-beers-photo-1?fit=crop&fm=pjpg&q=60&w=144&h=144&dpr=2"
            ],
            [
                'name' => 'Franziskaner Hefe-Weisse Hell',
                'EAN' => '124499992',
                'product' => 'Bier',
                'type' => 'Weissbier',
                'origin' => 'Köln, Deutschland',
                'alcoholContent' => 5.0,
                'image' => "https://imgix.ranker.com/node_img/3162/63234595/original/franziskaner-hefe-weisse-hell-beers-photo-1?fit=crop&fm=pjpg&q=60&w=144&h=144&dpr=2"
            ],
            [
                'name' => 'Spaten Münchner Hell',
                'EAN' => '124493442',
                'product' => 'Bier',
                'type' => 'Vollbier',
                'origin' => 'Bremen, Deutschland',
                'alcoholContent' => 5.2,
                'image' => "https://imgix.ranker.com/node_img/13/251489/original/spaten-m-nchner-hell-beers-photo-1?fit=crop&fm=pjpg&q=60&w=144&h=144&dpr=2"
            ]

        ]);


    }
}

