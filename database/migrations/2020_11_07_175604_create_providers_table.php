<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->id();
            $table->string('firstName',100)->nullable();
            $table->string('secondName',100)->nullable();
            $table->date('birthDate')->nullable();
            $table->string('email',100)->unique();

            $table->string('businessName',100)->nullable();
            $table->integer('zip')->nullable();
            $table->string('city',100)->nullable();
            $table->string('street',100)->nullable();

            $table->string('website',100)->nullable();
            $table->string('openingHours',100)->nullable();
            $table->string('phoneNumber',30)->nullable();
            $table->string('description',500)->nullable();
            $table->string('image')->nullable();

            //nullable set the default as NULL
           // optional $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
        Schema::dropIfExists('providers');
    }
}
