<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrinksSubstancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('drinks_substances', function (Blueprint $table) {
            //default: onUpdate -> Restrict
            $table->foreignId('substance_id')->references('id')->on('substances')->onDelete('cascade');
            $table->foreignId('drink_id')->references('id')->on('drinks')->onDelete('cascade');
            $table->primary(['substance_id', 'drink_id']);  // damit substance_id und drink_id zusammengesetzte Primärschlüssel sind
            $table->timestamps();
        });
    }

    protected $primaryKey = ['substance_id', 'drink_id'];
    public $incrementing = false;

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drinks_substances');
    }
}








