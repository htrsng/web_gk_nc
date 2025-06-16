<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'status' => $this->faker->randomElement(['pending', 'processing', 'completed']),
            'total' => $this->faker->numberBetween(100000, 1000000),
            'shipping_address' => $this->faker->address,
        ];
    }
}