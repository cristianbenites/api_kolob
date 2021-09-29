<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Models\Property;

class PropertyRegistrationTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function a_property_can_be_added_to_the_database()
    {
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
            'building_area' => 400.50,
            'total_area' => 600.00,
            'property_type' => 'aluguel',
            'property_full_price' => 240,
            'property_rental_price' => 950.00,
        ]);

        $response->assertOk();

        $this->assertDatabaseCount('properties', 1);

        $this->assertDatabaseHas('properties', [
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
            'room_kitchen_combined' => 0,
            'parking_spaces' => 2,
            'building_area' => 400.50,
            'total_area' => 600.00,
            'property_type' => 'aluguel',
            'property_full_price' => 240,
            'property_rental_price' => 950.00,
        ]);
    }

    public function test_nullable_fields_property_registration()
    {
        $response = $this->post('/properties', [
            'title' => 'Titulo da propriedade',
            'district' => 'Jardim das testadoras',
            'street' => 'Rua dos testandos',
            'number' => '128A',
            'complement' => '',
            'city' => 'Sinop',
            'uf' => 'MT',
            'bedrooms' => '',
            'suites' => '',
            'living_rooms' => '',
            'kitchens' => '',
            'room_kitchen_combined' => false,
            'parking_spaces' => '',
            'building_area' => '',
            'total_area' => '',
            'property_type' => 'aluguel',
            'property_full_price' => '',
            'property_rental_price' => '',
        ]);

        $this->assertDatabaseCount('properties', 1);

        $this->assertDatabaseHas('properties', [
            'title' => 'Titulo da propriedade',
            'district' => 'Jardim das testadoras',
            'street' => 'Rua dos testandos',
            'number' => '128A',
            'complement' => null,
            'city' => 'Sinop',
            'uf' => 'MT',
            'bedrooms' => null,
            'suites' => null,
            'living_rooms' => null,
            'kitchens' => null,
            'room_kitchen_combined' => 0,
            'parking_spaces' => null,
            'building_area' => null,
            'total_area' => null,
            'property_type' => 'aluguel',
            'property_full_price' => null,
            'property_rental_price' => null,
        ]);
    }

    /**
     * @dataProvider provide_invalid_fields
     */
    public function test_field_rules($field, $value, $error)
    {
        $response = $this->post('/properties', [$field => $value]);

        $response->assertSessionHasErrors([$field => $error]);
    }

    public function provide_invalid_fields()
    {
        return [
            'Null title' => ['title', null, 'The title field is required.'],
            'Empty title' => ['title', '', 'The title field is required.'],
            'Short title' => ['title', 'ab', 'The title must be at least 3 characters.'],

            'Null district' => ['district', null, 'The district field is required.'],
            'Empty district' => ['district', '', 'The district field is required.'],
            'Short district' => ['district', 'ab', 'The district must be at least 3 characters.'],

            'Null street' => ['street', null, 'The street field is required.'],
            'Empty street' => ['street', '', 'The street field is required.'],
            'Short street' => ['street', 'ab', 'The street must be at least 3 characters.'],

            'Null number' => ['number', null, 'The number field is required.'],
            'Empty number' => ['number', '', 'The number field is required.'],

            'Null city' => ['city', null, 'The city field is required.'],
            'Empty city' => ['city', '', 'The city field is required.'],
            'Short city' => ['city', 'ab', 'The city must be at least 3 characters.'],

            'Null uf' => ['uf', null, 'The uf field is required.'],
            'Empty uf' => ['uf', '', 'The uf field is required.'],
            'Not In uf' => ['uf', 'SG', 'The selected uf is invalid.'],

            'Not Integer bedrooms' => ['bedrooms', 'a', 'The bedrooms must be an integer.'],
            'Not Integer suites' => ['suites', 'a', 'The suites must be an integer.'],
            'Not Integer living_rooms' => ['living_rooms', 'a', 'The living rooms must be an integer.'],
            'Not Integer kitchens' => ['kitchens', 'a', 'The kitchens must be an integer.'],
            'Not Integer parking_spaces' => ['parking_spaces', 'a', 'The parking spaces must be an integer.'],

            'Bool room_kitchen_combined' => ['room_kitchen_combined', 'a', 'The room kitchen combined field must be true or false.'],

            'Not Decimal building_area' => ['building_area', 'a', 'The building area format is invalid.'],
            'Not Decimal total_area' => ['total_area', 'a', 'The total area format is invalid.'],

            'Not In property_type' => ['property_type', 'a', 'The selected property type is invalid.'],

            'Not Decimal property_full_price' => ['property_full_price', 'a', 'The property full price format is invalid.'],

            'Not Decimal property_rental_price' => ['property_rental_price', 'a', 'The property rental price format is invalid.'],
        ];
    }
}
