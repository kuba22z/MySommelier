<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvidersRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers_ratings', function (Blueprint $table) {
            //default: onUpdate -> Restrict
            $table->foreignId('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreignId('provider_id')->references('id')->on('providers')->onDelete('cascade');
            $table->primary(['provider_id', 'client_id']);  // damit proivder_id und client_id zusammengesetzte Primärschlüssel sind
            $table->timestamps();
        });
    }

    protected $primaryKey = ['client_id', 'provider_id'];
    public $incrementing = false;

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('providers_ratings');
    }
}
