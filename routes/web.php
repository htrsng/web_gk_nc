<?php

  use Illuminate\Support\Facades\Route;
  use App\Http\Controllers\HomeController;
  use App\Http\Controllers\AdminController;
  use App\Http\Controllers\OrderController;
  use App\Http\Controllers\ProductController;
  use App\Http\Controllers\Auth\LoginController;
  use Illuminate\Support\Facades\Auth;


  Route::get('/', [HomeController::class, 'index'])->name('home');
  Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
  Route::post('/login', [LoginController::class, 'login']);

  Route::middleware(['auth'])->group(function () {
      Route::get('/dashboard', function () {
          if (Auth::check()) {
              return Auth::user()->role === 'admin' 
                  ? redirect()->route('admin.dashboard')
                  : redirect()->route('user.dashboard');
          }
          return redirect()->route('login')->with('error', 'Vui lòng đăng nhập.');
      })->name('dashboard');
      
      Route::get('/user/dashboard', [HomeController::class, 'userDashboard'])
          ->name('user.dashboard');
      
      Route::get('/admin/dashboard', [AdminController::class, 'index'])
          ->name('admin.dashboard')
          ->middleware('role:admin');
      
      Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
  });

  Route::middleware(['auth'])->group(function () {
      Route::resource('orders', OrderController::class);
      Route::resource('products', ProductController::class)->middleware('role:admin');
  });