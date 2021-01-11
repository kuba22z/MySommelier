<?php

namespace Tests\Browser\Guest;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CallBusinessTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testView()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
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
        ;});
    }
}
