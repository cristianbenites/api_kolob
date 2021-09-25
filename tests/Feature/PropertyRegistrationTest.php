<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PropertyRegistrationTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function a_property_can_be_added_to_the_database()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/properties', [
            'title' => 'Titulo da propriedade',
            'district' => 'Jardim das testadoras',
            'street' => 'Rua dos testandos',
            'number' => '128A',
            'complement' => 'Perto dos testes',
            'city' => 'Sinop',
            'uf' => 'MT',
            'bedrooms' => 3,
            'suites' => 1,
            'living_rooms' => 1,
            'kitchens' => 1,
            'room_kitchen_combined' => false,
            'parking_spaces' => 2,
            'building_area' => 400.5,
            'total_area' => 600,
            'property_type' => 'aluguel',
            'property_full_price' => '',
            'property_rental_price' => 950,
        ]);

        $response->assertOk();

        $this->assertDatabaseCount('properties', 1);
    }

}
