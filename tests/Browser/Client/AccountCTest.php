<?php

namespace Tests\Browser\Client;

use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AccountCTest extends DuskTestCase
{

    public function testView()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(1, 'client')
                ->visit('Kunde/Konto')
                ->assertSee('Mein Konto')
            ;});
    }
    public function testInput()
    {

        $this->browse(function (Browser $browser) {
            $client = Client::create([
                'email' => 'client3@gmx.de',
                'password' => Hash::make(1),
            ]);
            $id = $client->id;

            $browser->loginAs($id, 'client')
                ->visit('Kunde/Konto')
                ->assertSee('Mein Konto')
                ->type('#forenameInput', 'Alex')
                ->type('#lastnameInput', 'Meier')
                ->type('#mailInput', 'Changedclient4@gmx.de')
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
                ->type('#email', "Changedclient4@gmx.de")
                ->type('#password', "1")
                ->click('#anmelden')
                ->assertSee('Astra Urtyp')
                ->assertPathIs('/');
            $client->delete();

        });
    }


    public function testChangePsw()
    {
        $this->browse(function (Browser $browser) {
            $client = Client::create([
                'email' => 'client2@gmx.de',
                'password' => Hash::make(1),
            ]);
            $id = $client->id;

            $browser->loginAs($id, 'client')
                ->visit('Kunde/Konto')
                ->press('Passwort ändern')
                ->waitForText('Passwort ändern')
                ->type('#actPWInput', '1')
                ->type('#newPWInput', '1')
                ->type('#newPWValidationInput', '12')
                ->press('Bestätigen')
                ->waitForText('Ihr Passwort wurde nicht erfolgreich geändert.')
                ->visit('Kunde/Konto')
                ->press('Passwort ändern')
                ->waitForText('Aktuelles Passwort')
                ->type('#actPWInput', '1')
                ->type('#newPWInput', '12')
                ->type('#newPWValidationInput', '12')
                ->press('Bestätigen')
                ->visit('Kunde/Konto')
                ->press('Passwort ändern')
                ->waitForText('Passwort ändern')
                ->type('#actPWInput', '12')
                ->type('#newPWInput', '1')
                ->type('#newPWValidationInput', '1')
                ->press('Bestätigen')
                ->visit('Kunde/Konto')
                ->assertPathIs('/Kunde/Konto')
                ->click('#dropdownMenu2')
                ->clickLink('Abmelden')
                ->assertSee('Astra Urtyp')
                ->assertPathIs('/')
                ->click('#loginBtn')
                ->waitForText('Login')
                ->assertSee('Anmelden')
                ->assertSee('Neues Konto erstellen')
                ->type('#email', "client2@gmx.de")
                ->type('#password', "1")
                ->click('#anmelden')
                ->assertSee('Astra Urtyp')
                ->assertPathIs('/');
            $client->delete();
        });

    }
}
