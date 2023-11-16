<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // \App\Models\Location::factory(2)->create();
        // \App\Models\Station::factory(4)->create();
        // \App\Models\Service::factory(8)->create();
        //\App\Models\SampleService::factory(4)->create();
         $startDate = now()->setYear(2024)->setMonth(12)->startOfMonth();
        
        // Set the start date to the first day of January 2024
        $startDate = now()->setYear(2024)->setMonth(1)->startOfMonth();

        // Create records for all days of January 2024
        while ($startDate->month == 1) {
            \App\Models\Day::factory()->create([
                'day' => $startDate->day,
                'day_title' => $startDate->format('l'), // 'l' returns the full day name (e.g., Monday)
                'week' => $startDate->weekOfMonth,
                'month' => $startDate->month,
                'year' => $startDate->year,
            ]);

            // Move to the next day
            $startDate->addDay();
        }
        
        }

        
      
}
