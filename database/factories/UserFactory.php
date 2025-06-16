<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

class UserFactory extends Factory
{
    /**
     * Tên model tương ứng với factory này.
     */
    protected $model = User::class;

    /**
     * Định nghĩa dữ liệu mặc định cho model.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // hoặc dùng Hash::make() nếu cần
            'remember_token' => Str::random(10),
            'role' => 'user',
        ];
    }
}
