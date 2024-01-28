<?php

use App\Http\Controllers\Crm\MallController;
use App\Http\Controllers\Crm\BrandController;
use Illuminate\Support\Facades\Route;

Route::resource('malls', MallController::class);
Route::resource('brands', BrandController::class);
