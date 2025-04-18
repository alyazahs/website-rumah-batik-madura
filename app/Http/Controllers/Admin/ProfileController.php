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
        $user = Auth::user();
        return view('admin.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    
        $data = $request->only('name', 'email');
    
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = uniqid() . '.' . $photo->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('profile', $photo, $filename);
    
            if ($user->path) {
                Storage::delete('public/profile/' . $user->path);
            }
    
            $data['path'] = $filename;
        }
    
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $user->update($data);

        // Log activity using Spatie Activitylog
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

        $user->password = Hash::make($request->new_password);
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        // Log out the user after changing the password
        Auth::logout();

        // Redirect to login page with success message
        return redirect()->route('admin.login')
            ->with('status', 'Password berhasil diubah, silakan login kembali.');

        // Log activity using Spatie Activitylog
        activity()
            ->causedBy(Auth::user())
            ->performedOn($user)
            ->log('Edited password');

        return back()->with('success', 'Password berhasil diubah.');
    }
}
