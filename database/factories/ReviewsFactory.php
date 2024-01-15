<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ReviewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'product_id' => $this->faker->randomElement(\App\Models\Product::pluck('id')->toArray()),
            'user_id' => rand(1, User::count()),
            'comment' => $this->faker->paragraph(),
            'rating' => $this->faker->numberBetween([1, 5]),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
