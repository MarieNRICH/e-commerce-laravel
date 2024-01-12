<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Promotion>
 */
class PromotionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();

        return [
            'promotional_code' => $faker->unique()->word,
            'discount_amount' => $faker->randomFloat(2, 0, 100), // Chiffre aléatoire avec 2 décimales entre 0 et 100
            'discount_percentage' => $faker->numberBetween(1, 50), // Chiffre aléatoire entre 1 et 50
            'expiration_date' => $faker->date,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
