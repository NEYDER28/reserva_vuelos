<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'booking_code' => $this->faker->numberBetween(10000, 20000),
            'card_id' => $this->faker->numberBetween(1,2),
            'flight_id' => $this->faker->numberBetween(1,10)
        ];
    }
}
