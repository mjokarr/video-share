<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\VideoController;

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/create', [VideoController::class, 'create'])->name('video.store');
Route::get('/video/create', [VideoController::class, 'create'])->name('video.store');
Route::post('/videos', [VideoController::class, 'store']);
