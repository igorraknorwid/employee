<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SampleService>
 */
class SampleServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sample_service_title' => fake()->randomElement([
                'Dental Check Up',
                'Dental Check Up and Clean (Scale & Polish)',
                'Free Invisalign Consultation',
                'Emergency Consultation',
                'Implant Assessment',
                'Wisdom Tooth/Extraction Consultation',
                'Facial Aesthetics Consultation',
            ]),
            'sample_service_price' => fake()->randomElement(['30','60','80']), // Adjust the range as needed
            'sample_service_time' => fake()->randomElement(['20','30','45']),
            'IsActive' => fake()->boolean,
            'IsDentistOnly' => fake()->boolean(100),
            'IsClientVisiable' => fake()->boolean(100),
        ];
    }
}
