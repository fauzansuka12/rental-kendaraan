<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RolePemilikMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
        // if (Auth::check() && Auth::user()->role === 'pemilik') {
        // }

        // abort(403, 'Anda tidak memiliki akses ke halaman ini.');
    }
}
