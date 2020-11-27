<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrinksOffersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drinks_offers', function (Blueprint $table) {

            //default: onUpdate -> Restrict
            $table->foreignId('provider_id')->references('id')->on('providers')->onDelete('cascade');
            $table->foreignId('drink_id')->references('id')->on('drinks')->onDelete('cascade');
            $table->primary(['provider_id', 'drink_id']);  // damit provider_id und drink_id zusammengesetzte Primärschlüssel sind
            $table->boolean('recommended');
            $table->timestamps();
        });
    }

    protected $primaryKey = ['provider_id', 'drink_id'];
    public $incrementing = false;


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drinks_offers');
    }
}

