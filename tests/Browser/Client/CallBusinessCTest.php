<?php

namespace Tests\Browser\Client;

use App\Models\Client;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Hash;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CallBusinessCTest extends DuskTestCase
{

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testView()
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
                ->clickLink("L'Osteria Aachen")
                ->assertUrlIs('http://127.0.0.1:8000/Geschaeft/1')
                ->assertSee('Budweiser')
                ->assertSee('Gut-Dämme-Straße 1
52070 Aachen')
                ->press('Getränkekarte')
                ->assertSee('Getränkekarte')
                ->assertSee('König Ludwig Weizen Hell')
                ->assertSee('Augustiner Dunkel')
                ->clickLink('Cyber-Sommelier')
                ->clickLink('Tyskie')
                ->clickLink('DRY - Liquid Supper Bar')
                ->assertUrlIs('http://127.0.0.1:8000/Geschaeft/4')
                ->assertSee('Kockerellstraße 15
52062 Aachen')
                ->assertSee('Hansa Pils')
                ->press('Getränkekarte')
                ->assertSee('Augustiner Dunkel')
                ->assertSee('La Motte Chardonnay')
                ->press('Empfohlene Getränke')
                ->assertDontSee('La Motte Chardonnay')
                ->clickLink('Cyber-Sommelier')
                ->assertUrlIs('http://127.0.0.1:8000/')
            ;
             $client->delete();
            });
    }
}
