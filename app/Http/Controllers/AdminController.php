<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class AdminController extends Controller
{
    // Menampilkan halaman login admin
    public function showLoginForm()
    {
        return view('admin.login');
    }

    // Proses login admin
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Coba login dengan guard 'admin'
        if (Auth::guard('admin')->attempt($request->only('email', 'password'), $request->filled('remember'))) {
            // Regenerate session untuk keamanan
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard')->with('success', 'Login berhasil!');
        }

        return back()->withErrors(['email' => 'Email atau password salah!'])->withInput();
    }

    // Menampilkan dashboard admin
    // Menampilkan dashboard admin (pastikan hanya admin yang bisa akses)
    public function dashboard()
    {
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login')->withErrors(['message' => 'Silakan login terlebih dahulu.']);
        }

        return view('admin.dashboard');
    }

    // Proses logout admin
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        // Invalidasi session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')->with('success', 'Logout berhasil.');
    }
}
