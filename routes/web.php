<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;


Route::get('/', ProductsController::class . '@index')->name('products');

Route::resource('/products', ProductsController::class);

Route::post('/search', ProductsController::class.'@search')->name('search');
Route::get('/search', ProductsController::class . '@index')->name('home');


// Route::resource('/brands', BrandsController::class);

