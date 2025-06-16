<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run()
    {
        // Tạo dữ liệu mẫu cơ bản trước
        $category = Category::firstOrCreate(['name' => 'Default']);
        
        // Tạo 5 user
        $users = User::factory()->count(5)->create();
        
        // Tạo 10 sản phẩm
        $products = Product::factory()
            ->count(10)
            ->create(['category_id' => $category->id]);

        // Tạo 5 đơn hàng
        for ($i = 0; $i < 5; $i++) {
            $order = Order::create([
                'user_id' => $users->random()->id,
                'status' => ['pending', 'processing', 'completed'][rand(0, 2)],
                'total' => 0,
                'shipping_address' => 'Địa chỉ ' . ($i + 1),
            ]);

            // Thêm sản phẩm vào đơn hàng
            $selectedProducts = $products->random(rand(1, 3));
            $total = 0;

            foreach ($selectedProducts as $product) {
                $quantity = rand(1, 5);
                $order->items()->create([
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'price' => $product->price,
                ]);
                $total += $product->price * $quantity;
            }

            $order->update(['total' => $total]);
        }
    }
}