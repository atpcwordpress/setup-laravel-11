<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProductAPIController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(ProductAPIController::class)->group(function() {
   route::post('product-insert','product_insert')->name('product-insert');
   route::post('product-index','product_index')->name('product-index');
   route::post('product-show/{product_id}','product_show')->name('product-show');
   route::post('product-update/{product_id}','product_update')->name('product-update');
   route::delete('product-delete/{product_id}','product_delete')->name('product-delete');
});
