<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drinks', function (Blueprint $table) {
            $table->id();
            $table->string("name",50);
            $table->integer("EAN");
            $table->string("product",10);  // Bier oder Wein
            //kann man auch als boolean definieren ist aber dann mehr Aufand bei der Ausgabe
            $table->string("type",30);
            $table->string("origin",50);
            $table->float('alcoholContent');
            $table->string('description',500)->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('drinks');
    }
}
