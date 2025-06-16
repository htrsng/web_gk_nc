<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    AdminController,
    CategoryController,
    ProductController,
    OrderController
};

// Dashboard
Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

// Resources
Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);

// Orders (customized)
Route::resource('orders', OrderController::class)->except(['create', 'store']);
Route::get('orders/{order}/items', [OrderController::class, 'items'])->name('orders.items');

// API-style routes
Route::prefix('api')->group(function () {
    Route::get('products/export', [ProductController::class, 'export'])->name('products.export');
    Route::post('products/import', [ProductController::class, 'import'])->name('products.import');
    Route::post('products/bulk-delete', [ProductController::class, 'bulkDelete'])->name('products.bulk-delete');
    Route::post('orders/{order}/update-status', [OrderController::class, 'updateStatus'])->name('orders.update-status');
});
