<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Location>
 */
class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'location_name' =>fake()->word,
            'isActive' => fake()->boolean(100), 
            'google_map_link' => fake()->url,
            'isMapActive' => fake()->boolean(100), 
            'city' => fake()->city,
            'street' => fake()->streetAddress,
            'zip_code' => fake()->postcode,
            'local_number' => fake()->phoneNumber,
        ];
    }
}
