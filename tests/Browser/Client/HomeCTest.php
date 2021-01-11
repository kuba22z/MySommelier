<?php

namespace Tests\Browser\Client;

use App\Models\Client;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Hash;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class HomeCTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testHomeView()
    {
        $this->browse(function (Browser $browser) {
            $client = Client::create([
                'email' => 'client2@gmx.de',
                'password' => Hash::make(1),
            ]);
            $id = $client->id;

            $browser->loginAs($id, 'client')
                ->visit('/')
                ->assertSee('Cyber-Sommelier')
                ->assertSee('Filter')
                ->assertSee('Suchen')
                ->assertSee('Astra Urtyp')
                ->assertSee('Pils')
                ->assertSee('4.9 % Vol.');

            $client->delete();
        });
    }

    public function testFilter()
    {
        $this->browse(function (Browser $browser) {
            $client = Client::create([
                'email' => 'client2@gmx.de',
                'password' => Hash::make(1),
            ]);
            $id = $client->id;

            $browser->loginAs($id, 'client')
                ->visit('/')
                ->click('#filterBtn')
                ->assertSee('Produkte')
                ->type('#herkunft_input', 'Deutschland')
                ->click('#suchenBtn')
                ->assertDontSee('Estrella Damm')
                ->assertDontSee('La Motte Sauvignon Blanc')
                ->assertDontSee('Voga Moscato')
                ->assertSee('Christkindl Glühwein')
                ->assertSee('Augustiner Dunkel');

            $browser->visit('/')
                ->click('#filterBtn')
                ->assertSee('Produkte')
                ->type('#herkunft_input', 'Deutschland')
                ->type('#inhaltsstoffe_input', 'Wasser')
                ->check('#keine_allergene_checkbox')
                ->click('#suchenBtn')
                ->assertDontSee('Estrella Damm')
                ->assertDontSee('La Motte Sauvignon Blanc')
                ->assertDontSee('Voga Moscato')
                ->assertSee('Bitburger')
                ->assertSee('Hansa Pils');



            $browser->visit('/')
                ->click('#filterBtn')
                ->assertSee('Produkte')
                ->click('#art_select')
                ->click('#pils')
                ->click('#suchenBtn')
                ->assertSee('Pils')
                ->assertDontSee('Weissbier')
                ->assertDontSee('Weizen')
                ->assertDontSee('Dunkelbier');


            $browser->visit('/')
                ->click('#filterBtn')
                ->assertSee('Produkte')
                ->type('#herkunft_input', 'Italien')
                ->type('#inhaltsstoffe_input', 'Sulfite')
                ->click('#art_select')
                ->click('#rotwein')
                ->click('#prod_select')
                ->click('#wein')
                ->click('#suchenBtn')
                ->assertDontSee('Glühwein')
                ->assertDontSee('Weisswein')
                ->assertDontSee('Rose')
                ->assertDontSee('Pils')
                ->assertSee('Rotwein')
                ->assertDontSee('Duoro DOC')
                ->assertDontSee('Simonsvlei Pinotage')
                ->assertSee('Paolo Monti Barolo D.O.C.G.');


            $browser->visit('/')
                ->click('#filterBtn')
                ->assertSee('Produkte')
                ->type('#inhaltsstoffe_input', 'Wasser,Sulfite')
                ->check('#keine_allergene_checkbox')
                ->click('#suchenBtn')
                ->assertDontSee('Glühwein')
                ->assertDontSee('Weisswein')
                ->assertDontSee('Rose')
                ->assertDontSee('Pils')
                ->assertDontSee('Duoro DOC')
                ->assertDontSee('Simonsvlei Pinotage')
                ->assertDontSee('Paolo Monti Barolo D.O.C.G.')
                ->assertSee('Keine Getränke gefunden');


            $browser->visit('/')
                ->click('#filterBtn')
                ->assertSee('Produkte')
                ->type('#inhaltsstoffe_input', 'Himbeere')
                ->click('#suchenBtn')
                ->assertDontSee('Glühwein')
                ->assertDontSee('Weisswein')
                ->assertSee('Rose')
                ->assertSee('Rotwein')
                ->assertDontSee('Duoro DOC')
                ->assertDontSee('Paolo Monti Barolo D.O.C.G.')
                ->assertSee('Rose Cerasuolo Farnese')
                ->assertSee('Simonsvlei Pinotage');


            $browser->visit('/')
                ->click('#filterBtn')
                ->assertSee('Produkte')
                ->type('search_input', 'Astra')
                ->click('#suchenBtn')
                ->assertDontSee('Glühwein')
                ->assertDontSee('Weisswein')
                ->assertDontSee('Rose')
                ->assertDontSee('Rotwein')
                ->assertDontSee('Duoro DOC')
                ->assertDontSee('Paolo Monti Barolo D.O.C.G.')
                ->assertSee('Astra Urtyp')
                ->assertSee('Pils');

            $client->delete();
        });

    }



    public function testCallBusinessView()
    {
        $this->browse(function (Browser $browser) {
            $client = Client::create([
                'email' => 'client2@gmx.de',
                'password' => Hash::make(1),
            ]);
            $id = $client->id;

            $browser->loginAs($id, 'client')
                ->visit('/')
                ->clickLink('Astra Urtyp')
                ->assertSee('Astra Urtyp')
                ->assertSee('Hamburg, Deutschland')
                ->assertSee('Dieses Getränk finden Sie hier:')
                ->assertSee("L'Osteria Aachen")
                ->assertSee('Tijuana Aachen')
                ->press('Mehr')
                ->assertSee('Inhaltstoffe: Wasser,Gerstenmalz,Hopfen,Sulfite')
                ->assertSee('Masuto')
                ->clickLink('Cyber-Sommelier')
                ->clickLink('Simonsvlei Pinotage')
                ->assertSee('Simonsvlei Pinotage')
                ->assertSee('Südafrika')
                ->assertSee('Dieses Getränk finden Sie hier:')
                ->assertSee("Domkeller")
                ->press('Mehr')
                ->assertSee('Inhaltstoffe: Sulfite,Farbstoffe,Himbeere,Banane,Pflaume');

            $client->delete();
        });


    }
}
