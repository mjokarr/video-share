<?php

use App\Http\Controllers\CategoryVideoController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VideoController;
use App\Http\Middleware\CheckVerifyEmail;
use App\Jobs\otp;
use App\Jobs\ProcessVideo;
use App\Mail\VerifyEmail;
use App\Models\User;
use App\Models\Video;
use App\Notifications\VideoProccessed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;






Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/videos', [IndexController::class, 'index'])->name('index');
Route::get('/create', [VideoController::class, 'create'])->middleware('verifyEmail')->name('videos.store');
Route::get('/videos/create', [VideoController::class, 'create'])->middleware(CheckVerifyEmail::class)->name('videos.store');
Route::post('/videos', [VideoController::class, 'store']);
Route::get('videos/{video}', [VideoController::class, 'show'])->name('videos.show');
Route::get('videos/{video}/edit', [VideoController::class, 'edit'])->name('videos.edit');
Route::post('videos/{video}', [VideoController::class, 'update'])->name('videos.update');
Route::get('categories/{category:slug}/videos', [CategoryVideoController::class, 'index'])->name('categories.videos.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::post('/videos/{video}/comments', [CommentController::class, 'store'])->name('comments.store');

