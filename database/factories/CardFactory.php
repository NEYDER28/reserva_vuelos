<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Card>
 */
class CardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'number' => $this->faker->randomNumber(5),
            'expired_date' => $this->faker->creditCardExpirationDate(),
            'name' => $this->faker->creditCardType(),
            'card_company' => $this->faker->company(),
            'user_id' => $this->faker->numberBetween(1,2)
        ];
    }
}
