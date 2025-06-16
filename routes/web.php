<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\{
    AdminController,
    CategoryController,
    ProductController,
    OrderController
};
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController as PublicProductController;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');

// Authentication Routes
require __DIR__.'/auth.php';

// User Routes (Authenticated)
Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard', function () {
        return view('dashboard.user');
    })->name('user.dashboard');
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
});

// Public Product Routes
Route::get('/products', [PublicProductController::class, 'index'])->name('products.index');
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::get('/policy', function () {
    return view('policy');
})->name('policy');

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
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
        // Products
        Route::get('products/export', [ProductController::class, 'export'])->name('products.export');
        Route::post('products/import', [ProductController::class, 'import'])->name('products.import');
        Route::post('products/bulk-delete', [ProductController::class, 'bulkDelete'])->name('products.bulk-delete');

        // Orders
        Route::post('orders/{order}/update-status', [OrderController::class, 'updateStatus'])->name('orders.update-status');
    });
});