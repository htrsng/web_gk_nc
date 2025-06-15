<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;

// Route trang chủ (public - không cần auth)
Route::get('/', [HomeController::class, 'index'])->name('home');

// Các route yêu cầu xác thực
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('orders', OrderController::class);
});

// Các route authentication (login/register)
require __DIR__.'/auth.php';