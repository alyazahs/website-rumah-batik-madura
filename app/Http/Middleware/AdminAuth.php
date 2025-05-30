<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AdminAuth
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::guard('web')->user();

        if (!$user) {
            Log::info('❌ User belum login');
            return redirect()->route('admin.login')->withErrors(['message' => 'Silakan login terlebih dahulu.']);
        }

        Log::info('✅ User login: ' . $user->email);

        if (!in_array($user->level, ['Admin', 'SuperAdmin'])) {
            Log::info('❌ User bukan admin. Level: ' . $user->level);
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }

        if ($user->status !== 'Active') {
            Log::info('❌ User nonaktif. Status: ' . $user->status);
            Auth::logout(); 
            return redirect()->route('admin.login')->withErrors(['message' => 'Akun Anda tidak aktif. Silakan hubungi administrator.']);
        }

        Log::info('✅ Akses diizinkan');
        return $next($request);
    }
}
