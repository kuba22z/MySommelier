<?php

namespace Database\Seeders;

use App\Models\Provider;
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
            CaptchaSeeder::class,
            DrinkSeeder::class,
            ProviderSeeder::class,
            ClientSeeder::class
        ]);
    }
}
