<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use Carbon\Carbon;

class LogController extends Controller
{
    /**
     * Menampilkan daftar log dengan filter.
     */
    public function index(Request $request)
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

        // Filter berdasarkan tanggal
        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $logs = $query->latest()->paginate(10);

        // Ambil semua user untuk dropdown filter
        $users = \App\Models\User::pluck('name', 'id');

        return view('admin.log', compact('logs', 'users'));
    }

    /**
     * Menghapus log berdasarkan tanggal.
     */
    public function delete(Request $request)
    {
        $request->validate([
            'delete_date' => 'required|date',
        ]);

        $deleteDate = Carbon::parse($request->delete_date);

        // Hapus log yang lebih lama dari tanggal yang dipilih
        Activity::where('created_at', '<', $deleteDate)->delete();

        return redirect()->route('admin.logs')->with('success', 'Log berhasil dihapus.');
    }
}