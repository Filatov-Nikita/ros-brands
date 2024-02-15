<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\MallController;
use App\Http\Controllers\Api\ProductCategoryController;
use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\LookCategoryController;
use App\Http\Controllers\Api\DesignerController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('products', ProductController::class)->only([
    'index', 'show'
]);

Route::resource('malls', MallController::class)->only([
    'index', 'show'
]);

Route::resource('product-categories', ProductCategoryController::class)->only([
    'index'
]);

Route::resource('brands', BrandController::class)->only([
    'index'
]);

Route::resource('look-categories', LookCategoryController::class)->only([
    'index'
]);

Route::resource('designers', DesignerController::class)->only([
    'index', 'show'
]);
Route::resource('banners', BannerController::class)->only([
    'index',
]);
