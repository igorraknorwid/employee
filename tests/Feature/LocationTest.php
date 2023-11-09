<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Location;
use App\Models\AdminUser;

class LocationTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_locations_index(): void
    {
          Location::factory()->count(5)->create();

        $response = $this->get('/admin/locations');

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'location_name',
                    'isActive',
                    'google_map_link',
                    'isMapActive',
                    'city',
                    'street',
                    'zip',
                    'local_number',
                    'created_at',
                    'updated_at'   
                ],
            ],
        ]);
    }

    public function test_locations_show(): void
    {
      
        $response = $this->get('/admin/locations/1');

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data' => [
                'id',
                'location_name',
                'isActive',
                'google_map_link',
                'isMapActive',
                'city',
                'street',
                'zip',
                'local_number',
                'created_at',
                'updated_at'
            ],
        ]);
    }
      //----------

    public function test_store_method_creates_location_with_user_role_1()
    {
        $user = AdminUser::where('email', 'norwid1@gmail.com')->first();

        if (!$user) {
            $userData = [
                'name' => 'Dan',
                'email' => 'norwid1@gmail.com',
                'password' => '1234', 
                'role' => 1,
            ];
    
            $user = AdminUser::create($userData); // Creates the user if it doesn't exist
        }
        $this->actingAs($user, 'admin');

        $newLocationData = [
            'location_name' => 'New Location',
            'isActive' => 1,
            'google_map_link' => 'https://maps.google.com/new-location',
            'isMapActive' => 1,
            'city' => 'New City',
            'street' => 'New Street',
            'zip' => '12345',
            'local_number' => '123-456-7890',
        ];

        $response = $this->post('/admin/locations', $newLocationData);

        $response->assertStatus(201);

        $response->assertJsonStructure([
            'data' => [
                'id',
                'location_name',
                'isActive',
                'google_map_link',
                'isMapActive',
                'city',
                'street',
                'zip',
                'local_number',
                'created_at',
                'updated_at'
            ],
        ]);

        // Optionally, you can check the response data for specific values
        $response->assertJsonFragment([
            'location_name' => 'New Location',
            'city' => 'New City',
            // Add other fields you expect to be returned
        ]);
    } 

    public function test_store_method_creates_location_with_user_role_2()
    {
        $user = AdminUser::where('email', 'norwid2@gmail.com')->first();

        if (!$user) {
            $userData = [
                'name' => 'Dan',
                'email' => 'norwid2@gmail.com',
                'password' => '1234', 
                'role' => 2,
            ];
    
            $user = AdminUser::create($userData); 
        }
        $this->actingAs($user, 'admin');

        $newLocationData = [
            'location_name' => 'New Location',
            'isActive' => 1,
            'google_map_link' => 'https://maps.google.com/new-location',
            'isMapActive' => 1,
            'city' => 'New City',
            'street' => 'New Street',
            'zip' => '12345',
            'local_number' => '123-456-7890',
        ];

        $response = $this->post('/admin/locations', $newLocationData);

        $response->assertStatus(403);
    
    } 

    public function test_update_method_updated_location_with_user_role_1(){

        $user = AdminUser::where('email', 'norwid1@gmail.com')->first();
        
        if (!$user) {
            $userData = [
                'name' => 'Dan',
                'email' => 'norwid1@gmail.com',
                'password' => '1234', 
                'role' => 1,
            ];
    
            $user = AdminUser::create($userData); // Creates the user if it doesn't exist
        }
        $this->actingAs($user, 'admin');

        $updatedData = [
            'location_name' => 'Updated Location',
            'isActive' => 1,
            'google_map_link' => 'https://maps.google.com/new-location',
            'isMapActive' => 1,
            'city' => 'New City',
            'street' => 'New Street',
            'zip_code' => '12345',
            'local_number' => '123-456-7890',
        ];

        $response = $this->put('/admin/locations/12',  $updatedData);

        // Assert that the response should be 200 OK
        $response->assertStatus(200);

        // Assert that the location was updated successfully
        $this->assertDatabaseHas('locations', $updatedData);

    }
}
