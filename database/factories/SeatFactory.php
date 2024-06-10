<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\seat>
 */
class SeatFactory extends Factory
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

            'class' => $this->faker->randomElement($classes),
            'row' => $this->faker->randomNumber(2),
            'letter' => $this->faker->randomLetter(),
            'flight_id' => $this->faker->numberBetween(1,10),
        ];
    }
}
