<?php

namespace Tests\Feature;

use App\Models\Provider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class ProviderRoutesTest extends TestCase
{
    protected $provider;
    protected $response;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testProvidersGetRoutes()
    {
        $this->provider = Provider::factory()->create();
        $this->actingAs($this->provider, 'provider')->withSession(['banned' => false]);

        $this->get('/Anbieter/Geschaeft/einrichten')->assertStatus(200);
        $this->get('/Anbieter/Geschaeft/Getraenk/auswaehlen')->assertStatus(200);
        $this->get('/Anbieter/Geschaeft/Getraenk/suchen')->assertStatus(200);
        $this->get('/Anbieter/Geschaeft/Getraenk/Vorschlag')->assertStatus(200);
        $this->get('/Anbieter/Geschaeft/Getraenk/erstellen')->assertStatus(200);
        $this->get('/Anbieter/Geschaeft/Getraenk/EANscan')->assertStatus(200);
        $this->get('/Anbieter/Konto')->assertStatus(200);
        $this->get('/Anbieter/Konto/Passwort/aendern')->assertStatus(200);
    }

    public function testProvidersPostRoutes()
    {
        $this->post('/Anbieter/Geschaeft/einrichten')->assertStatus(302);
        $this->post('/Anbieter/Geschaeft/Getraenk/hochladen')->assertStatus(302);
        $this->post('/Anbieter/Geschaeft/Getraenk/suchen')->assertStatus(302);
        $this->post('/Anbieter/Geschaeft/Getraenk/erstellen')->assertStatus(302);
        $this->post('/Anbieter/Konto')->assertStatus(302);
        $this->post('/Anbieter/Konto/Passwort/aendern')->assertStatus(302);

    }
    public function testNoAccessRoutesForProvider()
    {
        $this->provider = Provider::factory()->create();
        $this->actingAs($this->provider, 'provider')->withSession(['banned' => false]);

        $this->get('/Kunde/Konto')->assertStatus(302);
        $this->post('/Kunde/Konto')->assertStatus(302);
        $this->get('/Kunde/Konto/Passwort/aendern')->assertStatus(302);
        $this->post('/Kunde/Konto/Passwort/aendern')->assertStatus(302);
        $this->post('/login')->assertStatus(302);
        $this->get('/login')->assertStatus(302);
        $this->post('/registration')->assertStatus(302);

        $this->get('/logout')->assertStatus(302);
        $this->get('/Geschaeft/1')->assertStatus(302);
        $this->get('/')->assertStatus(302);
        $this->post('/')->assertStatus(302);

    }

}


