<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\VideoController;

Route::get('/', [IndexController::class, 'index']);
Route::get('/create', [VideoController::class, 'create']);
Route::post('/videos', [VideoController::class, 'store']);
