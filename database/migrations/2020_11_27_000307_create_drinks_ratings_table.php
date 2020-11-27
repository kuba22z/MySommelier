<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrinksRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drinks_ratings', function (Blueprint $table) {
            //default: onUpdate -> Restrict
            $table->foreignId('drink_id')->references('id')->on('drinks')->onDelete('cascade');
            $table->foreignId('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->primary(['client_id', 'drink_id']);  // damit client_id und drink_id zusammengesetzte Primärschlüssel sind
            $table->string("text",200);
            $table->unsignedTinyInteger('stars');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drinks_ratings');
    }
}

