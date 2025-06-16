<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // 🟢 Thêm dòng này
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory; // 🟢 Thêm dòng này

    protected $fillable = [
        'name',
        'description',
        'slug',
        'is_active',
        'image'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            $category->slug = Str::slug($category->name);
        });

        static::updating(function ($category) {
            $category->slug = Str::slug($category->name);
        });
    }
}
