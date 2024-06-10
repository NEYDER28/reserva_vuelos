<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\flight>
 */
class FlightFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'number' => $this->faker->randomNumber(),
            'origin_airport' => $this->faker->numberBetween(1,5),
            'destination_airport' => $this->faker->numberBetween(6,10),
            'airline_id' => $this->faker->numberBetween(1,5),
            'arrival_date' => $this->faker->numberBetween(1,20),
            'departure_date' => $this->faker->numberBetween(21,40),
            'airplane_id' => $this->faker->numberBetween(1,30),
            'stopover' => $this->faker->numberBetween(0,3)
        ];
    }
}
