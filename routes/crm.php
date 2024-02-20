<?php

use App\Http\Controllers\Crm\MallController;
use App\Http\Controllers\Crm\BrandController;
use App\Http\Controllers\Crm\BrandImageController;
use App\Http\Controllers\Crm\ProductCategoryController;
use App\Http\Controllers\Crm\ProductController;
use App\Http\Controllers\Crm\ProductImageController;
use App\Http\Controllers\Crm\LookColorController;
use App\Http\Controllers\Crm\LookCategoryController;
use App\Http\Controllers\Crm\LookStyleController;
use App\Http\Controllers\Crm\DesignerController;
use App\Http\Controllers\Crm\DesignerImageController;
use App\Http\Controllers\Crm\BannerController;
use App\Http\Controllers\Crm\BannerImageController;
use App\Http\Controllers\Crm\LookController;
use App\Http\Controllers\Crm\LookImageController;
use App\Http\Controllers\Crm\LookVideoController;
use App\Http\Controllers\Crm\PromotionController;
use Illuminate\Support\Facades\Route;

Route::resource('malls', MallController::class);
Route::post('malls/{mall}/attach-logotype', [
   MallController::class, 'attach_logotype'
])->name('malls.attach_logotype');

Route::resource('brands', BrandController::class);
Route::post('brands/{brand}/logotype', [
   BrandImageController::class, 'store'
])->name('brands.image.store');
Route::put('brands/{brand}/logotype', [
   BrandImageController::class, 'update'
])->name('brands.image.update');

Route::post('brands/{brand}/attach-promotions', [
   BrandController::class, 'attach_promotions'
])->name('brands.attach_promotions');

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

Route::post('designers/{designer}/image', [
   DesignerImageController::class, 'store'
])->name('designers.image.store');

Route::put('designers/{designer}/image', [
   DesignerImageController::class, 'update'
])->name('designers.image.update');


Route::resource('banners', BannerController::class);

Route::post('banners/{banner}/image', [
   BannerImageController::class, 'store_image'
])->name('banners.image.store');

Route::put('banners/{banner}/image', [
   BannerImageController::class, 'update_image'
])->name('banners.image.update');

Route::post('banners/{banner}/image-mobile', [
   BannerImageController::class, 'store_image_mobile'
])->name('banners.image-mobile.store');

Route::put('banners/{banner}/image-mobile', [
   BannerImageController::class, 'update_image_mobile'
])->name('banners.image-mobile.update');


Route::resource('looks', LookController::class);
Route::post('looks/attach-products/{look}', [
   LookController::class, 'attach_products'
])->name('looks.attach_products');


Route::post('looks/{look}/thumb', [
   LookImageController::class, 'store_thumb'
])->name('looks.thumb.store');

Route::put('looks/{look}/thumb', [
   LookImageController::class, 'update_thumb'
])->name('looks.thumb.update');

Route::post('looks/{look}/image', [
   LookImageController::class, 'store_image'
])->name('looks.image.store');

Route::delete('looks/{look}/image/{image}', [
   LookImageController::class, 'remove_image'
])->name('looks.image.remove');

Route::put('looks/{look}/image/{image}', [
   LookImageController::class, 'update_image'
])->name('looks.image.update');


Route::post('looks/{look}/video', [
   LookVideoController::class, 'store_video'
])->name('looks.video.store');

Route::delete('looks/{look}/video', [
   LookVideoController::class, 'remove_video'
])->name('looks.video.remove');

Route::put('looks/{look}/video', [
   LookVideoController::class, 'update_video'
])->name('looks.video.update');


Route::resource('promotions', PromotionController::class);
