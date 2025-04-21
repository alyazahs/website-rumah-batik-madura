<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

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

        // Log activity using Spatie Activitylog
        activity()
            ->causedBy(Auth::user())
            ->performedOn($user)
            ->log('Added a new user: ' . $user->name);

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

        // Log activity using Spatie Activitylog
        activity()
            ->causedBy(Auth::user())
            ->performedOn($user)
            ->log('Edited a user: ' . $oldName . ' became ' . $user->name);

        return redirect()->route('user.index')->with('success', 'Update User Success.');
    }

    public function destroy(User $user)
    {
        $userName = $user->name;
        $user->delete();

        // Log activity using Spatie Activitylog
        activity()
            ->causedBy(Auth::user())
            ->performedOn($user)
            ->log('Deleted a user: ' . $userName);

        return redirect()->route('user.index')->with('success', 'User berhasil dihapus.');
    }

    public function log(Request $request)
    {
        $query = Activity::with('causer');

        // Filter berdasarkan keyword
        if ($request->filled('search')) {
            $query->where('description', 'like', '%' . $request->search . '%');
        }

        // Filter berdasarkan user
        if ($request->filled('user_id')) {
            $query->where('causer_id', $request->user_id);
        }

        // Filter berdasarkan tanggal (format: Y-m-d)
        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $logs = $query->latest()->paginate(10);

        // Ambil semua user untuk dropdown filter
        $users = User::pluck('name', 'id');

        return view('admin.log', compact('logs', 'users'));
    }
}
