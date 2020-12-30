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
                ['Sulfite',true]],


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
        Drink::createDrinkSeeder(
            [['Wasser',false],     //Inhaltstoffe für das Getränk eintragen
                ['Gerstenmalz',false],
                ['Hopfen',false],
                ['Mais',false],
                ['Reis',false],
                ['Sulfite',true]
            ],

            ['name' => 'Estrella Damm',
                'EAN' => '42140855',
                'product' => 'Bier',
                'type' => 'Pils',
                'origin' => 'Barcelona, Spanien',
                'alcoholContent' => 4.8,
                'image' => "storage/drinksImage/beer/Estrella_Damm.jpeg"]
        );
        Drink::createDrinkSeeder(
            [['Wasser',false],     //Inhaltstoffe für das Getränk eintragen
                ['Hefe',false],
                ['Hopfen',false],
                ['Malz',true],
                ['Sulfite',true]
            ],

            ['name' => 'Lemke India Pale Ale',
                'EAN' => '42140858',
                'product' => 'Bier',
                'type' => 'Pils',
                'origin' => 'Berlin, Deutschland',
                'alcoholContent' => 6.5,
                'image' => "storage/drinksImage/beer/87462_lemke_india_pale_ale_0_33l_.jpeg"]
        );
        Drink::createDrinkSeeder(
            [['Wasser',false],     //Inhaltstoffe für das Getränk eintragen
                ['Gerstenmalz',false],
                ['Hopfen',false],
                ['Hopfenextrakt',false],
            ],

            ['name' => 'Hansa Pils',
                'EAN' => '42140859',
                'product' => 'Bier',
                'type' => 'Pils',
                'origin' => 'Dortmund, Deutschland',
                'alcoholContent' => 4.8,
                'image' => "storage/drinksImage/beer/Hansa_Pils.png"]
        );
        Drink::createDrinkSeeder(
            [['Wasser',false],     //Inhaltstoffe für das Getränk eintragen
                ['Gerstenmalz',false],
                ['Hopfen',false],
                ['Hopfenextrakt',false],
            ],

            ['name' => 'Bitburger',
                'EAN' => '42140860',
                'product' => 'Bier',
                'type' => 'Pils',
                'origin' => 'Bitburg, Deutschland',
                'alcoholContent' => 4.8,
                'image' => "storage/drinksImage/beer/Bitburger.png"]
        );
        Drink::createDrinkSeeder(
            [['Wasser',false],     //Inhaltstoffe für das Getränk eintragen
                ['Gerstenmalz',false],
                ['Hopfen',false],
                ['Glukosesirup',false],
                ['Hopfenextrakt',false],
            ],

            ['name' => 'Tyskie',
                'EAN' => '42140861',
                'product' => 'Bier',
                'type' => 'Pils',
                'origin' => 'Posen, Polen',
                'alcoholContent' => 5.5,
                'image' => "storage/drinksImage/beer/Tyskie.png"]
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
                ['Hopfen',false],
                ['Hefe',false],
                ['Farbtoffe',false],
                ['Sulfite',true]
            ],

            ['name' => 'Franziskaner Weissbier',
                'EAN' => '42140854',
                'product' => 'Bier',
                'type' => 'Weissbier',
                'origin' => 'München, Deutschland',
                'alcoholContent' => 5,
                'image' => "storage/drinksImage/beer/Franziskaner_Weißbier.jpeg"]
        );


        Drink::createDrinkSeeder(
            [['Wasser',false],     //Inhaltstoffe für das Getränk eintragen
                ['Gerstenmalz',false],
                ['Tequila',false],
                ['Farbtoffe',false],
                ['Sulfite',true]
            ],

            ['name' => 'Desperados',
                'EAN' => '42140850',
                'product' => 'Bier',
                'type' => 'Mischbier',
                'origin' => 'Frankreich',
                'alcoholContent' => 4.5,
                'image' => "storage/drinksImage/beer/desperados_033l_05_2016_1_.jpeg"]
        );
        Drink::createDrinkSeeder(
            [['Wasser',false],     //Inhaltstoffe für das Getränk eintragen
                ['Gerstenmalz',false],
                ['Hopfen',false],
                ['Hefe',false],
                ['Mais',false],
                ['Farbtoffe',false],
                ['Sulfite',true]
            ],

            ['name' => 'Corona Extra Mexican Beer',
                'EAN' => '42140851',
                'product' => 'Bier',
                'type' => 'Mischbier',
                'origin' => 'Mexiko',
                'alcoholContent' => 4.5,
                'image' => "storage/drinksImage/beer/corona_extra_beer.jpeg"]
        );
        Drink::createDrinkSeeder(
            [['Wasser',false],     //Inhaltstoffe für das Getränk eintragen
                ['Gerstenmalz',false],
                ['Hopfen',false],
                ['Limetten',false],
                ['Zitronen',false],
                ['Tequila',false],
                ['Farbtoffe',false],
                ['Sulfite',true]
            ],

            ['name' => 'Salitos Ice',
                'EAN' => '42140852',
                'product' => 'Bier',
                'type' => 'Mischbier',
                'origin' => 'Paderborn, Deutschland',
                'alcoholContent' => 6,
                'image' => "storage/drinksImage/beer/0342_salitos_ice_-_0_33l_glasbottle_1_.jpeg"]
        );
        Drink::createDrinkSeeder(
            [['Wasser',false],     //Inhaltstoffe für das Getränk eintragen
                ['Gerstenmalz',false],
                ['Hopfen',false],
                ['Zucker',false],
                ['Zitronensäure',false],
                ['Farbtoffe',false],
                ['Sulfite',true]
            ],

            ['name' => 'Salitos Mojito Beer',
                'EAN' => '42140857',
                'product' => 'Bier',
                'type' => 'Mischbier',
                'origin' => 'Paderborn, Deutschland',
                'alcoholContent' => 5.9,
                'image' => "storage/drinksImage/beer/1399_salitos_mojito_beer_0_33_l.jpeg"]
        );


        Drink::createDrinkSeeder(
            [['Wasser',false],     //Inhaltstoffe für das Getränk eintragen
                ['Gerstenmalz',false],
                ['Weizenmalz',false],
                ['Hopfen',false],
                ['Hefe',false],
                ['Farbtoffe',false],
                ['Sulfite',true]
            ],

            ['name' => 'König Ludwig Weizen Hell',
                'EAN' => '42140853',
                'product' => 'Bier',
                'type' => 'Weizen',
                'origin' => 'Fürstenfeldbruck, Deutschland',
                'alcoholContent' => 5.5,
                'image' => "storage/drinksImage/beer/König_Ludwig_Weizen_Hell.jpeg"]
        );
        Drink::createDrinkSeeder(
            [['Wasser',false],     //Inhaltstoffe für das Getränk eintragen
                ['Gerstenmalz',false],
                ['Hopfen',false],
                ['Farbstoffe',false],
                ['Sulfite',true]
            ],

            ['name' => 'Augustiner Dunkel',
                'EAN' => '42140856',
                'product' => 'Bier',
                'type' => 'Dunkelbier',
                'origin' => 'München, Deutschland',
                'alcoholContent' => 5.6,
                'image' => "storage/drinksImage/beer/augustiner_dunkel.jpeg"]
        );









        //**********Wein
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
        Drink::createDrinkSeeder(
            [['rote Trauben',false],
                ['schwarze Waldbeeren',false],
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
            [['Himbeere',false],
                ['Banane',false],
                ['Pflaume',false],
                ['Farbstoffe',false],
                ['Sulfite',true]
            ],

            ['name' => 'Simonsvlei Pinotage',
                'EAN' => '42140843',
                'product' => 'Wein',
                'type' => 'Rotwein',
                'origin' => 'Südafrika',
                'alcoholContent' => 13,
                'image' => "storage/drinksImage/wine/simonsvlei_pinotage.jpeg"]
        );
        Drink::createDrinkSeeder(
            [['Brombeere',false],
                ['Blaubeeren',false],
                ['Sulfite',true]
            ],

        ['name' => 'Paolo Monti Barolo D.O.C.G.',
                'EAN' => '42140842',
                'product' => 'Wein',
                'type' => 'Rotwein',
                'origin' => 'Italien',
                'alcoholContent' => 14,
                'image' => "storage/drinksImage/wine/paolo_monti_barolo.jpeg"]
        );
       Drink::createDrinkSeeder(
            [['rote Trauben',false],
                ['Farbstoffe',false],
                ['Sulfite',true]
            ],

            ['name' => 'Duoro DOC',
                'EAN' => '42140841',
                'product' => 'Wein',
                'type' => 'Rotwein',
                'origin' => 'Porto e Douro, Portugal',
                'alcoholContent' => 13,
                'image' => "storage/drinksImage/wine/3654_douro_doc_0_75_l.jpeg"]
        );

        Drink::createDrinkSeeder(
            [['Garganegatrauben',false],
                ['Trebbianotrauben',false],
                ['Farbstoffe',false],
                ['Sulfite',true]
            ],

            ['name' => 'Soave Classico DOC',
                'EAN' => '42140840',
                'product' => 'Wein',
                'type' => 'Weisswein',
                'origin' => 'Italien',
                'alcoholContent' =>  12,
                'image' => "storage/drinksImage/wine/Soave_Classico_DOC.jpeg"]
        );
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
            [['weisse Trauben',false],
                ['Farbstoffe',false],
                ['Sulfite',true]
            ],

            ['name' => 'Voga Pinot Grigio',
                'EAN' => '42140839',
                'product' => 'Wein',
                'type' => 'Weisswein',
                'origin' => 'Venetien, Italien',
                'alcoholContent' =>  12,
                'image' => "storage/drinksImage/wine/voga-pinot-grigio.jpeg"]
        );
        Drink::createDrinkSeeder(
            [['weisse Trauben',false],
                ['Farbstoffe',false],
                ['Sulfite',true]
            ],

            ['name' => 'Evel Branco Weisswein',
                'EAN' => '42140838',
                'product' => 'Wein',
                'type' => 'Weisswein',
                'origin' => 'Alto Douro, Portugal',
                'alcoholContent' =>  13,
                'image' => "storage/drinksImage/wine/5112_evel_branco_wei_wein_1.jpeg"]
        );
        Drink::createDrinkSeeder(
            [['Bananen',false],
                ['Honigmelone',false],
                ['gelber Apfel',false],
                ['Pfirsich',false],
                ['Farbstoffe',false],
                ['Sulfite',true]
            ],

            ['name' => 'La Motte Chardonnay',
                'EAN' => '42140837',
                'product' => 'Wein',
                'type' => 'Weisswein',
                'origin' => 'Südafrika',
                'alcoholContent' =>  13,
                'image' => "storage/drinksImage/wine/5885_la_motte_chardonnay.jpeg"]
        );
        Drink::createDrinkSeeder(
            [['Bananen',false],
                ['Wintermelone',false],
                ['grüner Apfel',false],
                ['Zitrone',false],
                ['Farbstoffe',false],
                ['Sulfite',true]
            ],

            ['name' => 'La Motte Sauvignon Blanc',
                'EAN' => '42140836',
                'product' => 'Wein',
                'type' => 'Weisswein',
                'origin' => 'Südafrika',
                'alcoholContent' =>  12,
                'image' => "storage/drinksImage/wine/5884_la_motte_sauvignon_blanc.jpeg"]
        );
        Drink::createDrinkSeeder(
            [['Pfirsich',false],
                ['Zitrusfrüchte',false],
                ['Farbstoffe',false],
                ['Sulfite',true]
            ],

            ['name' => 'Mouton Cadet Blanc',
                'EAN' => '42140835',
                'product' => 'Wein',
                'type' => 'Weisswein',
                'origin' => 'Frankreich',
                'alcoholContent' =>  12,
                'image' => "storage/drinksImage/wine/6438_mouton_cadet_blanc_edition_cannes_0_75l.jpeg"]
        );
        Drink::createDrinkSeeder(
            [['Johannisbeere',false],
                ['Kirsche',false],
                ['Farbstoffe',false],
                ['Sulfite',true]
            ],

            ['name' => 'Mouton Cadet Rose',
                'EAN' => '42140834',
                'product' => 'Wein',
                'type' => 'Rose',
                'origin' => 'Bordeaux, Frankreich',
                'alcoholContent' =>  12,
                'image' => "storage/drinksImage/wine/6439_mouton_cadet_rose_edition_cannes_2013_0_75l.jpeg"]
        );
        Drink::createDrinkSeeder(
            [['Himbeere',false],
                ['Kirsche',false],
                ['Farbstoffe',false],
                ['Sulfite',true]
            ],

            ['name' => 'Rose Cerasuolo Farnese',
                'EAN' => '42140833',
                'product' => 'Wein',
                'type' => 'Rose',
                'origin' => 'Ortona, Italien',
                'alcoholContent' =>  12.5,
                'image' => "storage/drinksImage/wine/Rose_Cerasuolo_Farnese.jpeg"]
        );
        Drink::createDrinkSeeder(
            [['Tempranillotrauben',false],
                ['Farbstoffe',false],
                ['Sulfite',true]
            ],

            ['name' => 'Campo Viejo Rose',
                'EAN' => '42140832',
                'product' => 'Wein',
                'type' => 'Rose',
                'origin' => 'Rioja, Spanien',
                'alcoholContent' =>  13.5,
                'image' => "storage/drinksImage/wine/18857_campo_viejo_tempranillo_rose.jpeg"]
        );
/*

        DB::table('drinks')->insert([
            [  'name' => 'Bitburger alt',
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
                'type' => 'Weissbier',
                'origin' => 'Bremen, Deutschland',
                'alcoholContent' => 5.2,
                'image' => "https://imgix.ranker.com/node_img/13/251489/original/spaten-m-nchner-hell-beers-photo-1?fit=crop&fm=pjpg&q=60&w=144&h=144&dpr=2"
            ]

        ]);
*/

    }
}

