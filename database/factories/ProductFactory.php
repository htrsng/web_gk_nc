<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class; 

    public function definition()
    {
        return [
            'name' => $this->faker->words(3, true),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->numberBetween(10000, 1000000),
            'original_price' => $this->faker->numberBetween(10000, 1000000),
            'discount' => $this->faker->numberBetween(0, 50),
            'image' => $this->faker->imageUrl(),
            'category_id' => Category::factory(), // OK nếu muốn tạo category mới
            'stock' => $this->faker->numberBetween(0, 100),
        ];
    }
}
