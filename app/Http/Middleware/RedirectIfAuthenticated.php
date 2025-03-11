<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, string $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            // Jika user sudah login dan mencoba akses login lagi, arahkan ke dashboard
            return match ($guard) {
                'admin' => redirect()->route('admin.dashboard'),
                default => redirect('/'),
            };
        }

        return $next($request);
    }
}
