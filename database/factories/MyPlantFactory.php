<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MyPlant>
 */
class MyPlantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->numberBetween(1, 10),
            'plant_id' => fake()->numberBetween(1, 40),
            'name' => fake()->word(),
            'days_between_water' => fake()->numberBetween(3, 15) 
        ];
    }
}
