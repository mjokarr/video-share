<?php

use App\Events\VideoCreate;
use App\Http\Controllers\CategoryVideoController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\VideoController;
use App\Jobs\otp;
use App\Jobs\ProcessVideo;
use App\Mail\VerifyEmail;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;






Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/videos', [IndexController::class, 'index'])->name('index');
Route::get('/create', [VideoController::class, 'create'])->name('videos.store');
Route::get('/videos/create', [VideoController::class, 'create'])->name('videos.store');
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

// Route::get('/verify/{id}', function(Request $request)
// {
//     if(! $request->hasValidSignature())
//     {
//         abort(401);
//     }
//     echo 'there is a god jobbbb';
// })->name('verify');

// Route::get('generate', function()
// {
//     echo URL::temporarySignedRoute(
//         'verify', now()->addSeconds(20), ['id' => 2]
//     );
// });

Route::get('/event', function ()
{
    $video = Video::all()->first();
    // dd($video);
    VideoCreate::dispatch($video);
});
