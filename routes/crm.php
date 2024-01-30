<?php

use App\Http\Controllers\Crm\MallController;
use App\Http\Controllers\Crm\BrandController;
use App\Http\Controllers\Crm\ProductCategoryController;
use App\Http\Controllers\Crm\ProductController;
use Illuminate\Support\Facades\Route;

Route::resource('malls', MallController::class);
Route::resource('brands', BrandController::class);
Route::resource('product-categories', ProductCategoryController::class);
Route::resource('products', ProductController::class);
