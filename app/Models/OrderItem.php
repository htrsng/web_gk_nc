<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Order;  // Import Order model
use App\Models\Product;  // Import Product model

class OrderItem extends Model
{
    // Tắt timestamps nếu không cần
    public $timestamps = false;
    
    // Các trường có thể gán giá trị
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price'
    ];

    // Quan hệ với Order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Quan hệ với Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}