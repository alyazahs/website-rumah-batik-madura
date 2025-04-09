@extends('layouts.app')
@extends('admin.dashboard')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Manajemen Admin</h1>

    {{-- Tombol Tambah Admin --}}
    <div class="mb-4">
        <a href="{{ route('user.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Tambah Admin</a>
    </div>

    @if ($admins->isEmpty())
    <p class="text-gray-600">Belum ada admin yang ditambahkan.</p>
    @else
    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="border px-4 py-2">Nama</th>
                <th class="border px-4 py-2">Email</th>
                <th class="border px-4 py-2">Level</th> <!-- Tambahkan kolom Level -->
                <th class="border px-4 py-2">Status</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admins as $admin)
            <tr>
                <td class="border px-4 py-2">{{ $admin->name }}</td>
                <td class="border px-4 py-2">{{ $admin->email }}</td>
                <td class="border px-4 py-2">{{ ucfirst($admin->level) }}</td> <!-- Menampilkan level -->
                <td class="border px-4 py-2">
                    @if ($admin->status)
                        <span class="text-green-500">Aktif</span>
                    @else
                        <span class="text-red-500">Tidak Aktif</span>
                    @endif
                </td>
                <td class="border px-4 py-2 text-center">
                    {{-- Tautan Edit --}}
                    <a href="{{ route('user.edit', $admin->id) }}" class="text-blue-500 hover:underline">Edit</a> |

                    {{-- Form Hapus --}}
                    <form action="{{ route('user.destroy', $admin->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Apakah Anda yakin ingin menghapus admin ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection