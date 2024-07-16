<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\VideoController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('v1')->group( function ()
{
    Route::get('videos/{video:slug}', [VideoController::class, 'show']);
    Route::get('videos', [VideoController::class, 'index']);;
    Route::post('videos', [VideoController::class, 'store']);
    Route::put('videos/{video:slug}', [VideoController::class, 'update']);
    Route::delete('videos/{video:slug}', [VideoController::class, 'destroy']);

    Route::post('auth/login', [AuthController::class, 'login']);
    Route::prefix('auth')->middleware('auth:sanctum')->group( function ()
    {
        Route::get('me', [AuthController::class, 'me']);
        Route::get('logout', [AuthController::class, 'logout']);

    });

});



