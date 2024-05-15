<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\VideoController;

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/create', [VideoController::class, 'create'])->name('videos.store');
Route::get('/videos/create', [VideoController::class, 'create'])->name('videos.store');
Route::post('/videos', [VideoController::class, 'store']);
Route::get('videos/{id}', [VideoController::class, 'show'])->name('videos.show');
