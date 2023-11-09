<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Station>
 */
class StationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'station_name' => fake()->word,
            'isActive' => fake()->boolean(0), // 80% chance of being true
            'location_id' => function () {
                return \App\Models\Location::factory()->create()->id;
            },
        ];
    }
}
