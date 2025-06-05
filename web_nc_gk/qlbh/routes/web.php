<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/store', 'App\Http\Controllers\apiBaverageShop@store');


Route::post('/postDrink', 'App\Http\Controllers\apiBaverageShop@postDrink');