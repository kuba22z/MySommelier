<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     *  By default, the php artisan db:seed command runs the DatabaseSeeder
     *
     * Dieser DatabaseSeeder startet alle Seeder
     *
     * @return void
     */
    public function run()
    {
        $this->call([
          //  CaptchaSeeder::class, das noch nicht
            DrinkSeeder::class,
        ]);
    }
}
