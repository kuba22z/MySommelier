<?php

namespace Database\Seeders;

use App\Models\DrinksOffer;
use App\Models\Provider;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ProviderSeeder extends Seeder
{
    /**
     * Create first User
     *
     * @return void
     */
    public function run()
    {
        $provider=Provider::create([
        'email' => 'provider@gmx.de',
        'password' => Hash::make(1),
    ]);
        $changes = [
            'firstName' => "Peter",
            'secondName' => "Müller",
            'birthDate' => date("Y-m-d", strtotime("1990-08-10")),

            'businessName' => "L'Osteria Aachen",

            'zip' => "52070",
            'city' => "Aachen",
            'street' =>  "Gut-Dämme-Straße 1",

            'website' => "https://losteria.net/en/",
            'openingHours' => "Mo-Do:11:00-23:00;Fr-Sa:11:00-00:00;So:12:00-23:00;",
            'phoneNumber' => "+4924196979929",
            'description' => "Die „beste beste Pizza“ ist angekommen im Herzen Europas: Aachen. Einer jetzt nicht mehr ganz kreisfreien Großstadt – denn Kreise, bzw. Pizza mit satten 45 cm Durchmesser können wir. Doch genug der Scherze: Wir freuen uns riesig, unsere XXL-Pizza endlich mit euch teilen zu können! Selbstverständlich gibt es auch hier zusätzlich zur Pizza auch unsere leckere frische Pasta d’amore, knackige Salatvariationen, Antipasti und Dolci.",
            'image' => "storage/providersImage/lo-de-restaurant-aachen-teaser_new.jpeg"
            ];
        $provider->update($changes);
        DrinksOffer::insertOffer(1,1,true);
        DrinksOffer::insertOffer(2,1,true);
        DrinksOffer::insertOffer(3,1,true);
        DrinksOffer::insertOffer(4,1,false);
        DrinksOffer::insertOffer(5,1,false);
        DrinksOffer::insertOffer(6,1,false);
        DrinksOffer::insertOffer(7,1,false);
        DrinksOffer::insertOffer(8,1,false);
        DrinksOffer::insertOffer(9,1,false);
        DrinksOffer::insertOffer(10,1,false);
        DrinksOffer::insertOffer(11,1,false);
        DrinksOffer::insertOffer(12,1,false);
        DrinksOffer::insertOffer(13,1,false);
        DrinksOffer::insertOffer(14,1,false);
        DrinksOffer::insertOffer(15,1,false);

        $provider=Provider::create([
            'email' => 'provider2@gmx.de',
            'password' => Hash::make(1),
        ]);
        $changes = [
            'firstName' => "Hans",
            'secondName' => "Meyer",
            'birthDate' => date("Y-m-d", strtotime("1995-08-08")),

            'businessName' => "Domkeller",

            'zip' => "52062",
            'city' => "Aachen",
            'street' =>  "Hof 1",

            'website' => "https://www.domkeller.de/",
            'openingHours' => "Mo-Do:10:00-02:00;Fr-Sa:10:00-03:00;So:10:00-02:00;",
            'phoneNumber' => "+49024134265",
            'description' => "Den Domkeller gibt es schon ewig und drei Tage. Und wie das bei alteingesessen Kneipen oft der Fall ist, besteht das Publikum aus Menschen verschiedener Couleur",
            'image' => "storage/providersImage/Domkeller.jpeg"
        ];
        $provider->update($changes);
        DrinksOffer::insertOffer(11,2,false);
        DrinksOffer::insertOffer(12,2,false);
        DrinksOffer::insertOffer(13,2,false);
        DrinksOffer::insertOffer(14,2,false);
        DrinksOffer::insertOffer(15,2,false);
        DrinksOffer::insertOffer(16,2,false);
        DrinksOffer::insertOffer(17,2,false);
        DrinksOffer::insertOffer(18,2,false);
        DrinksOffer::insertOffer(19,2,false);
        DrinksOffer::insertOffer(20,2,false);
        DrinksOffer::insertOffer(21,2,false);
        DrinksOffer::insertOffer(22,2,false);
        DrinksOffer::insertOffer(23,2,false);
        DrinksOffer::insertOffer(24,2,false);
        DrinksOffer::insertOffer(25,2,false);


        $provider=Provider::create([
            'email' => 'provider3@gmx.de',
            'password' => Hash::make(1),
        ]);
        $changes = [
            'firstName' => "Max",
            'secondName' => "Mustermann",
            'birthDate' => date("Y-m-d", strtotime("1980-01-01")),

            'businessName' => "Tijuana Aachen",

            'zip' => "52062",
            'city' => "Aachen",
            'street' =>  "Markt 45",

            'website' => "https://bar-tijuana.de/",
            'openingHours' => "Mo-Do:12:00-00:00;Fr-Sa:12:00-02:00;So:12:00-00:00;",
            'phoneNumber' => "+492414019437",
            'description' => "BIENVENIDO A TIJUANA ! direkt am Aachener Markt. die heisseste Mexican Bar der Stadt...
TÄGLICH
Cocktail Happy Hour bis 21 Uhr
Jumbo Hour ab 23 Uhr (kleinen Cocktail bestellen und Jumbo bekommen)",
            'image' => "storage/providersImage/Tijuana.jpeg"
        ];
        $provider->update($changes);
        DrinksOffer::insertOffer(21,3,true);
        DrinksOffer::insertOffer(22,3,false);
        DrinksOffer::insertOffer(23,3,false);
        DrinksOffer::insertOffer(24,3,false);
        DrinksOffer::insertOffer(25,3,false);
        DrinksOffer::insertOffer(26,3,false);
        DrinksOffer::insertOffer(27,3,false);
        DrinksOffer::insertOffer(28,3,false);
        DrinksOffer::insertOffer(29,3,false);
        DrinksOffer::insertOffer(1,3,false);
        DrinksOffer::insertOffer(2,3,false);
        DrinksOffer::insertOffer(3,3,false);
        DrinksOffer::insertOffer(4,3,true);
        DrinksOffer::insertOffer(5,3,true);

        $provider=Provider::create([
            'email' => 'provider4@gmx.de',
            'password' => Hash::make(1),
        ]);
        $changes = [
            'firstName' => "Lisa",
            'secondName' => "Mustermann",
            'birthDate' => date("Y-m-d", strtotime("1990-02-08")),

            'businessName' => "DRY - Liquid Supper Bar",

            'zip' => "52062",
            'city' => "Aachen",
            'street' =>  "Kockerellstraße 15",

            'website' => "https://dry-supperbar.de/",
            'openingHours' => "Mo:geschlossen;Di-Do:18:30-01:00;Fr-Sa:18:30-03:00;So:geschlossen;",
            'phoneNumber' => "+4924157900344",
            'description' => "Wir mixen alles was wir mögen, und wir hoffen ihr mögt es auch. Angefangen von Klassikern wie Old Fashioned, Negroni, Manhattan – alle in verschiedensten Interpretationen zu haben – bis zu neuen Eigenkreationen sowie neuen Evergreens wie Gin Basil Smash oder Moscow Mule. Gin spielt bei uns eine etwas größere Rolle, demnach könnt ihr mittlerweile zwischen etwa 90 verschiedenen Gins entscheiden. Und natürlich helfen wir euch gerne bei der Entscheidung, wenn ihr das wollt.",
         'image' => "storage/providersImage/Dry_liquit_supper_bar.jpeg"
        ];
        $provider->update($changes);
        DrinksOffer::insertOffer(1,4,true);
        DrinksOffer::insertOffer(3,4,true);
        DrinksOffer::insertOffer(5,4,true);
        DrinksOffer::insertOffer(7,4,false);
        DrinksOffer::insertOffer(9,4,false);
        DrinksOffer::insertOffer(11,4,false);
        DrinksOffer::insertOffer(13,4,false);
        DrinksOffer::insertOffer(15,4,false);
        DrinksOffer::insertOffer(17,4,false);
        DrinksOffer::insertOffer(19,4,false);
        DrinksOffer::insertOffer(21,4,false);
        DrinksOffer::insertOffer(23,4,false);
        DrinksOffer::insertOffer(25,4,false);


        $provider=Provider::create([
            'email' => 'provider5@gmx.de',
            'password' => Hash::make(1),
        ]);
        $changes = [
            'firstName' => "Lara",
            'secondName' => "Neumann",
            'birthDate' => date("Y-m-d", strtotime("1988-10-12")),

            'businessName' => "Masuto",

            'zip' => "52062",
            'city' => "Aachen",
            'street' =>  "Hof 12",

            'website' => "http://masuto-hof12.de/",
            'openingHours' => "Mo-Do:12:00-23:00;Fr-Sa:12:00-00:00;So:12:00-23:00;",
            'phoneNumber' => "+4924190055773",
            'description' => "Mitten im Herzen von Aachen, in Blickweite zum Aachener Dom, liegt die Weinbar Masuto. Unsere große, sonnige Terrasse auf dem Hof lädt Sie ein dem Alltagsstress zu entfliehen und den Abend willkommen zu heißen. Das wunderschöne, denkmalgeschützte Gebäude wurde stilvoll eingerichtet und bietet reichlich Platz zum entspannten Verweilen.",
            'image' => "storage/providersImage/Masuto.jpeg"
        ];
        $provider->update($changes);
        DrinksOffer::insertOffer(1,5,false);
        DrinksOffer::insertOffer(2,5,false);
        DrinksOffer::insertOffer(3,5,false);
        DrinksOffer::insertOffer(4,5,false);
        DrinksOffer::insertOffer(9,5,false);
        DrinksOffer::insertOffer(11,5,false);
        DrinksOffer::insertOffer(13,5,false);
        DrinksOffer::insertOffer(16,5,false);
        DrinksOffer::insertOffer(17,5,true);
        DrinksOffer::insertOffer(26,5,true);
        DrinksOffer::insertOffer(27,5,true);
        DrinksOffer::insertOffer(28,5,false);
        DrinksOffer::insertOffer(29,5,false);


    }

}
