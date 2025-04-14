<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log as LaravelLog; // Alias untuk menghindari kebingungan

class UserController extends Controller
{
    public function index()
    {
        $admins = User::all();
        return view('admin.user.index', compact('admins'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        LaravelLog::info($request->all()); // Menggunakan alias untuk logging aplikasi

        $request->validate([
            'name' => 'required|string|max:45',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|min:6',
            'level' => 'required|in:Admin,SuperAdmin',
            'status' => 'required|in:Active,NonActive',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => $request->level,
            'status' => $request->status,
        ]);

        Log::create([
            'user_id' => Auth::id(),
            'information' => 'added a new user: ' . $user->name,
            'time' => now(),
        ]);

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:45',
            'email' => 'required|email|unique:user,email,' . $user->id,
            'password' => 'nullable|min:6',
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
        $oldName = $user->name;
        $user->update($data);

        Log::create([
            'user_id' => Auth::id(),
            'information' => 'edited a user: ' . $oldName . ' menjadi ' . $user->name,
            'time' => now(),
        ]);

        return redirect()->route('user.index')->with('success', 'User berhasil diperbarui.');
    }
    public function destroy(User $user)
    {
        $userName = $user->name;
        $user->delete();

        Log::create([
            'user_id' => Auth::id(),
            'information' => 'Menghapus user: ' . $userName,
            'time' => now(),
        ]);

        return redirect()->route('user.index')->with('success', 'User berhasil dihapus.');
    }
    public function log()
    {
        $logs = Log::with('user')->latest()->paginate(10);
        return view('admin.log', compact('logs'));
    }
}