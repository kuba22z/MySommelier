<?php

namespace Tests\Browser\Provider;

use App\Models\Provider;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Hash;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class BusinessTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     *
     *
     * @return void
     */
    public function testView()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(1, 'provider')
                ->visit('Anbieter/Geschaeft/einrichten')
                ->assertSee('Mein Geschäft')
                ->assertSee('Astra Urtyp')
                ->assertSee('Empfohlen')
                ->assertSee('Webseite:')
                ->clickLink('Cyber-Sommelier')
                ->assertPathIs('/Anbieter/Geschaeft/einrichten')
                ->click('#dropdownMenu2')
                ->clickLink('Mein Konto')
                ->assertSee('Mein Konto')
                ->assertPathIs('/Anbieter/Konto')
                ->logout('provider');
        });
    }

    /**
     * @throws \Throwable
     *
     * @group BusinessNewProvider
     *
     */

    public function testInputNewProvider()
    {


        $this->browse(function (Browser $browser) {
            $provider = Provider::create([
                'email' => 'provider6@gmx.de',
                'password' => Hash::make(1),
            ]);
            $id = $provider->id;

            $browser->loginAs($id, 'provider')
                ->visit('Anbieter/Geschaeft/einrichten')
                ->type('#nameInput', 'McDonalds')
                ->type('#websiteInput', 'https://www.mcdonalds.com/us/en-us.html')
                ->type('#streetAndHousenumberInput', 'Jahnstr. 4d')
                ->type('#PLZInput', '12345')
                ->type('#cityInput', "München")
                ->type('#openHoursInputInput', 'Mo:08:00-17:00;')
                ->type('#telNrInput', '123456789')
                ->type('#descriptionTextArea', 'JJHJHJHJHJHJhsjdhsjfhaufhwe9uofhweuofhw0ehfiwehfiwehfi8uowhefu')
                ->click('#register')
                ->assertDontSee('The')
                ->assertDontSee('use')
                ->assertDontSee('format')
                ->visit('Anbieter/Geschaeft/Getraenk/suchen?livesearch=15')
                ->assertSee('Augustiner Dunkel')
                ->click('#addDrink')
                ->clickLink('Cyber-Sommelier')
                ->assertSee('Augustiner Dunkel')
                ->check('#rec-checkbox-0')
                ->click('#register')
                ->assertChecked('#rec-checkbox-0')
                ->check('#remove0')
                ->assertDontSee('Augustiner Dunkel')/*    ->click('#searchModal')
                ->type('#livesearch','Astra Urtyp')
                ->click('#search')
                ->assertSee('Astra Urtyp')
                ->assertSee('Getränke meiner Karte hinzufügen') */
            ;

            $provider->delete();

        });


    }
}
