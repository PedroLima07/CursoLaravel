<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;


Route::get('/', [HomeController::class , 'index'])->name('home');

Route::group(['prefix' => 'products'], function() {
    Route::get('/' , [ProductsController::class , 'index'])->name('products'); 
    Route::get('create', [ProductsController::class, 'create'])->name('create');
    Route::post('store', [ProductsController::class, 'store'])->name('store');
});


