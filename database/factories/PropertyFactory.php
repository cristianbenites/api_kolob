<?php

namespace Database\Factories;

use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Property::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->company(),
            'district' => $this->faker->word(),
            'street' => $this->faker->streetName(),
            'number' => $this->faker->buildingNumber(),
            'complement' => $this->faker->words(3, true),
            'city' => $this->faker->city(),
            'uf' => $this->faker->randomElement(['MT', 'MS', 'SP', 'RJ']),
            'bedrooms' => $this->faker->numberBetween(0, 3),
            'suites' => $this->faker->numberBetween(0, 2),
            'living_rooms' => $this->faker->numberBetween(0, 2),
            'kitchens' => $this->faker->numberBetween(0, 2),
            'room_kitchen_combined' => $this->faker->randomElement([true, false]),
            'parking_spaces' => $this->faker->numberBetween(0, 2),
            'building_area' => $this->faker->randomFloat(2, 50, 1000),
            'total_area' => $this->faker->randomFloat(2, 50, 1000),
            'property_type' => $this->faker->randomElement(['aluguel', 'venda', 'compra']),
            'property_full_price' => $this->faker->randomFloat(2, 50, 900000),
            'property_rental_price' => $this->faker->randomFloat(2, 50, 2000),
        ];
    }
}
