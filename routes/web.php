<?php

     use App\Http\Controllers\OrderController;
     use Illuminate\Support\Facades\Route;
     use Illuminate\Support\Facades\Auth; 

     Route::get('/', function () {
         return view('welcome');
     });

     Auth::routes();

     Route::middleware(['auth'])->group(function () {
         Route::resource('orders', OrderController::class);
     });