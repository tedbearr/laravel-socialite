<?php

namespace App\Http\Middleware;

use Closure;
use Firebase\JWT\JWT;
use Firebase\JWT\ExpiredException;
use Illuminate\Support\Facades\Auth;
use App\User;

class GoogleAuth
{
    public function handle($request, Closure $next, $guard = null)
    {
        $auth = $request->session()->has('auth');
        return $auth ? $next($request) : redirect('login');
    }
}