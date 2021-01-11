<?php

namespace Tests\Browser\Provider;
use App\Models\Drink;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\File;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreateDrinkTest extends DuskTestCase
{

    public function testView()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(4, 'provider')
                ->visit('/Anbieter/Geschaeft/Getraenk/suchen')
                ->assertSee('Getränke meiner Karte hinzufügen')
                ->click('#createDrinkBtn')
                ->assertPathIs('/Anbieter/Geschaeft/Getraenk/erstellen')
                ->assertSee('Getränk der Datenbank hinzufügen')
                ->assertSee('Name:')
                ->assertSee('Hinzufügen')
            ;});
    }

    /**
     * A Dusk test example.
     * @group CreateDrink
     * @return void
     */
        public function testInput()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(3, 'provider')
                ->visit('/Anbieter/Geschaeft/Getraenk/suchen')
                ->click('#createDrinkBtn')
                ->assertPathIs('/Anbieter/Geschaeft/Getraenk/erstellen')
                ->type('#nameInput','VELTINS V+ Berry-x')
                ->type('#eanInput','42140870')
                ->select('#produktInput','Bier')
                ->select('#artInput','Mischbier')
                ->type('#originInput','Deutschland')
                ->type('#inhaltsstoffeInput','Wasser,dunkle Beeren')
                ->type('#alkoholgehaltInput','2.7')
                ->attach('#image',__DIR__.'/veltins_berry.png')
                ->press('Hinzufügen')
                ->assertDontSee('The')
                ->clickLink('Cyber-Sommelier')
                ->click('#dropdownMenu2')
                ->clickLink('Abmelden')
                ->assertSee('VELTINS V+ Berry-x')
            ;});

        $d=Drink::getImagePathByEan(42140870);
        File::delete(__DIR__.'/../../../public/'.$d->first()->image);
        Drink::deleteByEAN(42140870);
    }



}
