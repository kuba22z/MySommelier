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
            $table->string('name',100)->nullable();
            $table->string('address',100)->nullable();
            $table->string('website',100)->nullable();
            $table->string('openingHours',100)->nullable();
            $table->string('phoneNumber',20)->nullable();
            $table->text('description')->nullable();
            $table->string('image',50)->nullable();
            $table->string('email',100)->unique();
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
