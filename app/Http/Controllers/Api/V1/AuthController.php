<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {

        $request->authenticate();
        $token = $request->user()->createToken('API');

        return Response()->json([
            'token' => $token->plainTextToken,
        ]);
    }

    public function me()
    {
        return auth()->user();
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return Response()->json([
            'message' => 'All tokens successfully deleted',
        ]);
    }
}
