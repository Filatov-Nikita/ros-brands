<?php

use App\Http\Controllers\Crm\MallController;
use App\Http\Controllers\Crm\BrandController;
use App\Http\Controllers\Crm\ProductCategoryController;
use App\Http\Controllers\Crm\ProductController;
use App\Http\Controllers\Crm\ProductImageController;
use App\Http\Controllers\Crm\LookColorController;
use App\Http\Controllers\Crm\LookCategoryController;
use App\Http\Controllers\Crm\LookStyleController;
use App\Http\Controllers\Crm\DesignerController;
use App\Http\Controllers\Crm\BannerController;
use App\Http\Controllers\Crm\LookController;
use Illuminate\Support\Facades\Route;

Route::resource('malls', MallController::class);
Route::post('malls/{mall}/attach-logotype', [
   MallController::class, 'attach_logotype'
])->name('malls.attach_logotype');

Route::resource('brands', BrandController::class);
Route::post('brands/{brand}/attach-logotype', [
   BrandController::class, 'attach_logotype'
])->name('brands.attach_logotype');

Route::resource('product-categories', ProductCategoryController::class);

Route::resource('products', ProductController::class);

Route::post('products/{product}/thumb', [
   ProductImageController::class, 'store_thumb'
])->name('products.thumb.store');

Route::put('products/{product}/thumb', [
   ProductImageController::class, 'update_thumb'
])->name('products.thumb.update');

Route::post('products/{product}/image', [
   ProductImageController::class, 'store_image'
])->name('products.image.store');

Route::delete('products/{product}/image/{image}', [
   ProductImageController::class, 'remove_image'
])->name('products.image.remove');

Route::put('products/{product}/image/{image}', [
   ProductImageController::class, 'update_image'
])->name('products.image.update');

Route::resource('look-colors', LookColorController::class);
Route::resource('look-categories', LookCategoryController::class);
Route::resource('look-styles', LookStyleController::class);
Route::resource('designers', DesignerController::class);
Route::resource('banners', BannerController::class);
Route::resource('looks', LookController::class);
Route::post('looks/attach-products/{look}', [
   LookController::class, 'attach_products'
])->name('looks.attach_products');
