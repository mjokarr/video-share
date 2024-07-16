<?php

use App\Exceptions\Handler;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Application;
use App\Http\Middleware\CheckVerifyEmail;
use Mockery\Exception\InvalidOrderException;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Psr\Log\LogLevel;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'verifyEmail' => CheckVerifyEmail::class,
            // 'auth' => ForReWrite::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {

        // $exceptions->report(function (Throwable $h)
        // {
        //     return $h->getMessage() . ' In Line: ' . $h->getLine();
        // })->stop();

        // $exceptions->level(Handler::class, LogLevel::ERROR);

    })->create();
