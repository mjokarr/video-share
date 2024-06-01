<?php

namespace App\Http\Middleware;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Auth\Middleware\Authenticate;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
class CheckVerifyEmail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // dd($request->user());
        if($request->user() == null)
        {
            return redirect()->route('register.create')->with('alert', __('messages.please-login-first'));
        }
        if($request->user()->hasVerifiedEmail() == false)
        {
            return redirect()->route('index')->with('alert', __('messages.please-verify-your-email'));
        }
        return $next($request);
    }
}
