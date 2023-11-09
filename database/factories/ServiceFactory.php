<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'service_name' => fake()->word,
            'isActive' => fake()->boolean(100), // 80% chance of being true
            'service_price' => fake()->randomFloat(2, 10, 100), // Random floating-point number between 10 and 100 with 2 decimal places
        ];
    }
}
