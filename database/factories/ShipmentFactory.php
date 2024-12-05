<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ShipmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                'user_id' => User::inRandomOrder()->first()->id,
                'address'=>fake()->address(),
                'postal_code'=>fake()->postcode(),
                'state'=>fake()->country,
                'city'=>fake()->city(),
                'country_code'=>fake()->countryCode(),
        ];
    }
}
