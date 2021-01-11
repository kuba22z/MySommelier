<?php

namespace Tests\Browser\Provider;

use App\Models\Provider;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Hash;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AccountPTest extends DuskTestCase
{

    public function testView()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(2, 'provider')
                ->visit('Anbieter/Konto')
                ->assertSee('Mein Konto')
                ->assertSee('Hans')
                ->clickLink('Mein Geschäft')
                ->assertPathIs('/Anbieter/Geschaeft/einrichten')
                  ->assertSee('Mein Geschäft')
                ->assertSee('Corona Extra Mexican Beer')
                ->assertSee('Duoro DOC')
            ;});
    }


    public function testInput()
    {

        $this->browse(function (Browser $browser) {
            $provider = Provider::create([
                'email' => 'provider8@gmx.de',
                'password' => Hash::make(1),
            ]);
            $id = $provider->id;

            $browser->loginAs($id, 'provider')
                ->visit('Anbieter/Konto')
                ->assertSee('Mein Konto')
                ->type('#forenameInput', 'Alex')
                ->type('#lastnameInput', 'Meier')
                ->type('#mailInput', 'Changedprovider8@gmx.de')
                ->type('#dateInput', "10/08/1990")
                ->press('Speichern')
                ->click('#dropdownMenu2')
                ->clickLink('Abmelden')
                ->assertSee('Astra Urtyp')
                ->assertPathIs('/')
                ->click('#loginBtn')
                ->waitForText('Login')
                ->assertSee('Anmelden')
                ->assertSee('Neues Konto erstellen')
                ->type('#email', "Changedprovider8@gmx.de")
                ->type('#password', "1")
                ->click('#anmelden')
                ->assertSee('Mein Geschäft')
                ->assertPathIs('/Anbieter/Geschaeft/einrichten');
            $provider->delete();

        });
    }

    public function testChangePsw()
    {
        $this->browse(function (Browser $browser) {
            $provider = Provider::create([
                'email' => 'provider7@gmx.de',
                'password' => Hash::make(1),
            ]);
            $id = $provider->id;

            $browser->loginAs($id, 'provider')
                ->visit('Anbieter/Konto')
                ->press('Passwort ändern')
                ->waitForText('Passwort ändern')
                ->type('#actPWInput', '1')
                ->type('#newPWInput', '1')
                ->type('#newPWValidationInput', '12')
                ->press('Bestätigen')
                ->waitForText('Ihr Passwort wurde nicht erfolgreich geändert.')
                ->visit('Anbieter/Konto')
                ->press('Passwort ändern')
                ->waitForText('Aktuelles Passwort')
                ->type('#actPWInput', '1')
                ->type('#newPWInput', '12')
                ->type('#newPWValidationInput', '12')
                ->press('Bestätigen')
                ->visit('Anbieter/Konto')
                ->press('Passwort ändern')
                ->waitForText('Passwort ändern')
                ->type('#actPWInput', '12')
                ->type('#newPWInput', '1')
                ->type('#newPWValidationInput', '1')
                ->press('Bestätigen')
                ->visit('Anbieter/Konto')
                ->assertPathIs('/Anbieter/Konto')
                ->click('#dropdownMenu2')
                ->clickLink('Abmelden')
                ->assertSee('Astra Urtyp')
                ->assertPathIs('/')
                ->click('#loginBtn')
                ->waitForText('Login')
                ->assertSee('Anmelden')
                ->assertSee('Neues Konto erstellen')
                ->type('#email', "provider7@gmx.de")
                ->type('#password', "1")
                ->click('#anmelden')
                ->assertSee('Mein Geschäft')
                ->assertPathIs('/Anbieter/Geschaeft/einrichten');
            $provider->delete();
        });

    }



}
