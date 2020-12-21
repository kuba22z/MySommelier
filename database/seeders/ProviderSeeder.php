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
        DrinksOffer::insertOffer(5,1,true);
        DrinksOffer::insertOffer(3,1,false);
    }

}
