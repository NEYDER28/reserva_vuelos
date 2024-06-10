<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\fare>
 */
class FareFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $classes = ['Económica','Ejecutiva','Primera Clase'];
        return [

            'seat_class' => $this->faker->randomElement($classes),
            'price' => $this->faker->randomFloat(0,50000,700000),
            'flight_id' => $this->faker->numberBetween(1,10),

        ];
    }
}
