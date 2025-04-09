<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index()
    {
        $admins = User::all(); // Ambil semua data user dari model User
        return view('admin.user.index', compact('admins')); // Kirim data ke view
    }

    public function create()
    {
        return view('admin.user.create'); // Tampilkan form tambah user
    }

    public function store(Request $request)
    {
        Log::info($request->all());
        $request->validate([
            'name' => 'required|string|max:45',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|min:6',
            'level' => 'required|in:Admin,SuperAdmin',
            'status' => 'required|in:Active,NonActive',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => $request->level,
            'status' => $request->status,
        ]);

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:45',
            'email' => 'required|email|unique:user,email,' . $user->id,
            'password' => 'nullable|min:6', // Password opsional saat edit
            'level' => 'required|in:Admin,SuperAdmin',
            'status' => 'required|in:Active,NonActive',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'level' => $request->level,
            'status' => $request->status,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('user.index')->with('success', 'User berhasil diperbarui.');
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User berhasil dihapus.');
    }

    public function log()
    {
        return view('admin.user.log'); // Tampilkan log aktivitas user
    }
}
