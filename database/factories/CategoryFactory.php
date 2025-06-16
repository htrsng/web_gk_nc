<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition()
    {
        $name = $this->faker->words(2, true);

        return [
            'name' => $name,
            'description' => $this->faker->sentence(),
            'slug' => Str::slug($name),
            'is_active' => true,
            'image' => 'default.jpg',
        ];
    }
}
