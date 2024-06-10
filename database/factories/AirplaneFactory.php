<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\airplane>
 */
class AirplaneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'manufacturer' =>$this->faker->word(),
            'model' =>$this->faker->word(),
            'passengers_capacity' =>$this->faker->numberBetween(40,60),

    
        ];
    }
}
