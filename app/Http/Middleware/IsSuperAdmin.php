<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsSuperAdmin
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if (!$user || $user->level !== 'SuperAdmin') {
            abort(403, 'Akses khusus Super Admin.');
        }

        return $next($request);
    }
}