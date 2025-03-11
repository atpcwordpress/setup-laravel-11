<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StillProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', [StillProductController::class, 'index'])->name('products.index');
Route::get('/get-products', [StillProductController::class, 'getProduct'])->name('product.Get-Product');
Route::get('/products/view/{id}', [StillProductController::class, 'view'])->name('product.view');
Route::get('/products/edit/{id}', [StillProductController::class, 'edit']);
Route::delete('/products/delete/{id}', [StillProductController::class, 'destroy']);

