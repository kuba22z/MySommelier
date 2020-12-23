<?php

namespace Database\Factories;

use App\Models\Provider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProviderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Provider::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstName' => $this->faker->name,
            'secondName' => $this->faker->name,
            'zip' => $this->faker->randomNumber(),
            'city' => $this->faker->city,
            'street' => $this->faker->streetName,
            'website' => $this->faker->url,
            'businessName' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'birthDate' => $this->faker->date(),
            'openingHours' => $this->faker->dayOfWeek,
            'phoneNumber' => $this->faker->phoneNumber,
            'description' => $this->faker->text,
            'image' => $this->faker->image()
        ];
    }
}

