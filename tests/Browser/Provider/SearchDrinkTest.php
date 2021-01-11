<?php

namespace Tests\Browser\Provider;

use App\Models\Drink;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class SearchDrinkTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group CsvupLoad
     * @return void
     */
    public function testView()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(4, 'provider')
                ->visit('Anbieter/Geschaeft/einrichten')
                ->click('#searchModal')
                ->waitForText('Getränke meiner Karte hinzufügen')
                ->assertSee('CSV hochladen')
                ->clickLink('EAN-Scan')
                ->waitForText('Die EAN Scan Funktion erscheint erst in einer späteren Version.')
                ->clickLink('Cyber-Sommelier')
                ->assertDontSee('Die EAN Scan Funktion erscheint erst in einer späteren Version.')
                ->assertPathIs('/Anbieter/Geschaeft/einrichten')
            ;});
    }

    /**
     * @throws \Throwable
     * @group CsvupLoad
     *
     */

    public function testCSVupload()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(4, 'provider')
                ->visit('Anbieter/Geschaeft/einrichten')
                ->click('#searchModal')
                ->waitForText('Getränke meiner Karte hinzufügen')
                ->attach('#csv',__DIR__."/test.csv")
                ->click('#upload')
                ->clickLink('Cyber-Sommelier')
                ->click('#dropdownMenu2')
                ->clickLink('Abmelden')
                ->assertSee('Leikeim Weißbier')
                ->assertSee('Heineken')
                ->assertSee('Pfälzer Landwein Rot')
                ->assertSee('Blanchet Rouge de France')
                ->assertSee('Holsten Pilsener')
                ->assertSee("Beck's Ice")
            ;});
        Drink::deleteByEAN('424140949');
        Drink::deleteByEAN('424140948');
        Drink::deleteByEAN('421408497');
        Drink::deleteByEAN('432140946');
        Drink::deleteByEAN('421140945');
        Drink::deleteByEAN('421420944');

    }
}
