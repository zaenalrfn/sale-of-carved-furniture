<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserRole
{
    public function handle(Request $request, Closure $next)
    {
        // Pastikan pengguna login dan memiliki role "user"
        if (Auth::check() && Auth::user()->role === 'user') {
            return $next($request);
        }

        return response()->json(['message' => 'anda tidak memiliki akses untuk add to cart, silahkan login dulu'], 403);
    }
}
