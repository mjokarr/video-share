<?php

// require_once '../vendor/autoload.php';

// require_once '../vendor/autoload.php';
// use FFMpeg\FFMpeg;
// use FFMpeg\FFProbe;

use App\Exceptions\Handler;
use App\Jobs\otp;


use App\Models\User;
// use FFMpeg\FFMpeg;
use App\Models\Video;
use App\Mail\VerifyEmail;
use App\Jobs\ProcessVideo;
use Illuminate\Http\Request;
use App\Services\FFmpegAdapter;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Notifications\VideoProccessed;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\LikeController;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\VideoController;
use App\Http\Middleware\CheckVerifyEmail;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DislikeController;
use App\Http\Controllers\ProfileController;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
use App\Http\Controllers\CategoryVideoController;
use PhpParser\Node\Expr\Throw_;

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
});;


Route::post('/videos/{video}/comments', [CommentController::class, 'store'])->name('comments.store');

Route::get('{likeable_type}/{likeable_id}/dislike', [DislikeController::class, 'storeDislike'])->name('dislike.store');
Route::get('{likeable_type}/{likeable_id}/like', [LikeController::class, 'storeLike'])->name('like.store');



Route::get('/duration', function ()
{
    $storagePath = Storage::path('3mznDDh5YAtG2RsKMuitZTpsVwtgoxBAPlb8ttnN.mp4');


    $ffmpeg = FFMpeg::create();
    // $video = $ffmpeg->formDist('videos')->open($storagePath);

    $media = $ffmpeg::open($storagePath);
    // dd($media);
    $duration = $media->getDurationInSeconds();



    // $duration = $media->getDurationInSeconds($path);

    // $durationInSeconds = $media->getDurationInSeconds(); // returns an int
    // $durationInMiliseconds = $media->getDurationInMiliseconds(); // returns a float
    // return $duration;
    dd($duration);
});

Route::get('test-test', function()
{
    $result = Gate::allows('test');
    dd($result);
});


Route::get('exception', function()
{
    throw new Handler();
});

require __DIR__.'/auth.php';

