<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\OrderItem;

class Order extends Model
{
    protected $fillable = ['user_id', 'status', 'total', 'shipping_address'];
    
    const STATUSES = [
        'pending' => 'Chờ xử lý',
        'processing' => 'Đang xử lý', 
        'completed' => 'Hoàn thành',
        'cancelled' => 'Đã hủy'
    ];

    // Tắt timestamps nếu không sử dụng
    public $timestamps = true;

    public function getStatusTextAttribute()
    {
        return self::STATUSES[$this->status] ?? $this->status;
    }

    // Quan hệ với User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Quan hệ trực tiếp với OrderItem
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Tính tổng tiền tự động
    public function calculateTotal()
    {
        return $this->items->sum(function($item) {
            return $item->price * $item->quantity;
        });
    }
}