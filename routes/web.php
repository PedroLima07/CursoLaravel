<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoriesController;
use App\Models\Category;

Route::get('/', [HomeController::class , 'index'])->name('home');

Route::group(['prefix' => 'categories'], function() {
    Route::get('/' , [CategoriesController::class , 'index'])->name('categories'); 
    Route::get('create', [CategoriesController::class, 'create'])->name('categoriesCreate');
    Route::post('store', [CategoriesController::class, 'store'])->name('categoriesStore');
    Route::get('edit/{id}', [CategoriesController::class, 'edit'])->name('categoriesEdit');
    Route::put('update/{id}', [CategoriesController::class, 'update'])->name('categoriesUpdate');
    Route::delete('delete',  [CategoriesController::class, 'delete'])->name('categoriesDelete');
});

Route::group(['prefix' => 'products'], function() {
    Route::get('/' , [ProductsController::class , 'index'])->name('products'); 
    Route::get('create', [ProductsController::class, 'create'])->name('productsCreate');
    Route::post('store', [ProductsController::class, 'store'])->name('productsStore');
    Route::get('edit/{id}', [ProductsController::class, 'edit'])->name('productsEdit');
    Route::put('update/{id}', [ProductsController::class, 'update'])->name('productsUpdate');
    Route::delete('delete',  [ProductsController::class, 'delete'])->name('productsDelete');
});


