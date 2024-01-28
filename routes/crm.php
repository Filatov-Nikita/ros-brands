<?php

use App\Http\Controllers\Crm\MallController;
use Illuminate\Support\Facades\Route;

Route::resource('malls', MallController::class);
