<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Dotenv\Store\File\Reader;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class Handler extends Exception
{
    public function report()
    {
        Log::error('there was an error:');
    }

    public function render($request)
    {
        return response()->view('errors.500');
    }
}
