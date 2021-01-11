<?php

namespace Tests\Browser\Guest;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class HomeTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testHomeView()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Cyber-Sommelier')
                    ->assertSee('Filter')
                    ->assertSee('Suchen')
                    ->assertSee('Astra Urtyp')
                    ->assertSee('Pils')
                    ->assertSee('4.9 % Vol.');
        });
    }
    public function testFilter(){
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
            ->click('#filterBtn')
            ->assertSee('Produkte')
            ->type('#herkunft_input','Deutschland')
            ->click('#suchenBtn')
            ->assertDontSee('Estrella Damm')
            ->assertDontSee('La Motte Sauvignon Blanc')
            ->assertDontSee('Voga Moscato')
            ->assertSee('Christkindl Glühwein')
            ->assertSee('Augustiner Dunkel');
        });

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->click('#filterBtn')
                ->assertSee('Produkte')
                ->type('#herkunft_input','Deutschland')
              ->type('#inhaltsstoffe_input','Wasser')
                ->check('#keine_allergene_checkbox')
                ->click('#suchenBtn')
                ->assertDontSee('Estrella Damm')
                ->assertDontSee('La Motte Sauvignon Blanc')
                ->assertDontSee('Voga Moscato')
                ->assertSee('Bitburger')
                ->assertSee('Hansa Pils');
        });


        $this->browse(function (Browser $browser) {
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
        });


        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->click('#filterBtn')
                ->assertSee('Produkte')
                ->type('#herkunft_input','Italien')
                ->type('#inhaltsstoffe_input','Sulfite')
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
        });

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->click('#filterBtn')
                ->assertSee('Produkte')
                ->type('#inhaltsstoffe_input','Wasser,Sulfite')
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
        });
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->click('#filterBtn')
                ->assertSee('Produkte')
                ->type('#inhaltsstoffe_input','Himbeere')
                ->click('#suchenBtn')
                ->assertDontSee('Glühwein')
                ->assertDontSee('Weisswein')
                ->assertSee('Rose')
                ->assertSee('Rotwein')
                ->assertDontSee('Duoro DOC')
                ->assertDontSee('Paolo Monti Barolo D.O.C.G.')
                ->assertSee('Rose Cerasuolo Farnese')
            ->assertSee('Simonsvlei Pinotage');
        });

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->click('#filterBtn')
                ->assertSee('Produkte')
                ->type('search_input','Astra')
                ->click('#suchenBtn')
                ->assertDontSee('Glühwein')
                ->assertDontSee('Weisswein')
                ->assertDontSee('Rose')
                ->assertDontSee('Rotwein')
                ->assertDontSee('Duoro DOC')
                ->assertDontSee('Paolo Monti Barolo D.O.C.G.')
                ->assertSee('Astra Urtyp')
                ->assertSee('Pils');
        });

    }

    public function testAuthView()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->click('#loginBtn')
                ->waitForText('Login')
            ->assertSee('Anmelden')
            ->assertSee('Neues Konto erstellen')
            ->click('#newAccountBtn')
            ->waitForText('Registrieren')
            ->assertSee('Passwort wiederholen')
            ->assertSee('Bitte wählen Sie Ihre Rolle aus:')
             ->click('#register')
             ->waitForText('Fehler bei der Registrierung. Bitte versuchen Sie es erneut.')
             ->click('#anmelden')
                ->waitForText('Passwort vergessen?');
        });
    }
    public function testLoginProvider()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->click('#loginBtn')
                ->waitForText('Login')
                ->assertSee('Anmelden')
                ->assertSee('Neues Konto erstellen')
                ->type('#email',"provider@gmx.de")
                ->type('#password',"1")
                ->click('#anmelden')
                ->assertSee('Mein Geschäft')
                ->assertUrlIs('http://127.0.0.1:8000/Anbieter/Geschaeft/einrichten')
                ->click('#dropdownMenu2')
                ->click('#abmelden')
                ->assertUrlIs('http://127.0.0.1:8000/');
        });
    }

    public function testLoginClient()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->click('#loginBtn')
                ->waitForText('Login')
                ->assertSee('Anmelden')
                ->assertSee('Neues Konto erstellen')
                ->type('#email',"client@gmx.de")
                ->type('#password',"1")
                ->click('#anmelden')
                ->assertUrlIs('http://127.0.0.1:8000/')
                ->click('#dropdownMenu2')
                ->click('#abmelden')
                ->assertUrlIs('http://127.0.0.1:8000/');
        });
    }
    public function testAuth()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->click('#loginBtn')
                ->waitForText('Login')
                ->assertSee('Anmelden')
                ->assertSee('Neues Konto erstellen')
                ->click('#newAccountBtn')
                ->waitForText('Registrieren')
                ->assertSee('Passwort wiederholen')
                ->assertSee('Bitte wählen Sie Ihre Rolle aus:')
                ->type('#emailr','provider6@gmx.de')
                ->type('#passwordr','1')
                ->type('#password2r','1')
                ->select('#rolle','anbieter')
                ->click('#register')
                ->waitForText('Fehler bei der Registrierung. Bitte versuchen Sie es erneut.')
                ->click('#newAccountBtn')
                ->waitForText('Registrieren')
                ->assertSee('Passwort wiederholen')
                ->assertSee('Bitte wählen Sie Ihre Rolle aus:')
                ->type('#emailr','client2@gmx.de')
                ->type('#passwordr','1')
                ->type('#password2r','1')
                ->select('#rolle','kunde')
                ->click('#register')
                ->waitForText('Fehler bei der Registrierung. Bitte versuchen Sie es erneut.');
        });
    }
    public function testCallBusinessView()
    {
        $this->browse(function (Browser $browser) {
        $browser->visit('/')
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
            ->assertSee('Inhaltstoffe: Sulfite,Farbstoffe,Himbeere,Banane,Pflaume')
       ;});


    }



}
