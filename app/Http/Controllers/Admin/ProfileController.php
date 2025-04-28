<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Spatie\Activitylog\Models\Activity;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user(); // Ensure $user is an instance of App\Models\User
        if (!$user instanceof User) {
            abort(500, 'Authenticated user is not a valid User instance.');
        }
        return view('admin.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        if (!$user instanceof User) {
            abort(500, 'Authenticated user is not a valid User instance.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'remove_photo' => 'nullable|boolean', // tambahkan validasi ini
        ]);

        $data = $request->only('name', 'email');

        // Jika ada upload file photo baru
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = uniqid() . '.' . $photo->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('profile', $photo, $filename);

            // Hapus foto lama kalau ada
            if ($user->path) {
                Storage::delete('public/profile/' . $user->path);
            }

            $data['path'] = $filename;
        } elseif ($request->input('remove_photo') == '1') {
            // Kalau user hapus foto tanpa upload baru
            if ($user->path) {
                Storage::delete('public/profile/' . $user->path);
            }
            $data['path'] = null;
        }

        $user->update($data);

        // Log activity
        activity()
            ->causedBy(Auth::user())
            ->performedOn($user)
            ->log('Edited profile');

        return back()->with('success', 'Profile berhasil diperbarui.');
    }

    public function password()
    {
        return view('admin.profile.password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password lama tidak cocok.']);
        }

        // Update password
        if ($user instanceof User) {
            $user->update([
                'password' => Hash::make($request->new_password),
            ]);
        } else {
            abort(500, 'Authenticated user is not a valid User instance.');
        }

        // Log activity
        activity()
            ->causedBy($user)
            ->performedOn($user)
            ->log('Edited password');

        // Log out the user
        Auth::logout();

        // Redirect ke login
        return redirect()->route('admin.login')
            ->with('status', 'Password berhasil diubah, silakan login kembali.');
    }
}
