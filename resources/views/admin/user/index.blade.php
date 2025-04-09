@extends('layouts.app')
@extends('admin.dashboard')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Manajemen Admin</h1>

    {{-- Tombol Tambah Admin --}}
    <div class="mb-4">
        <button id="openAddModal" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Tambah Admin</button>
    </div>

    @if ($admins->isEmpty())
    <p class="text-gray-600">Belum ada admin yang ditambahkan.</p>
    @else
    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="border px-4 py-2">Nama</th>
                <th class="border px-4 py-2">Email</th>
                <th class="border px-4 py-2">Level</th>
                <th class="border px-4 py-2">Status</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admins as $admin)
            <tr>
                <td class="border px-4 py-2">{{ $admin->name }}</td>
                <td class="border px-4 py-2">{{ $admin->email }}</td>
                <td class="border px-4 py-2">{{ $admin->level }}</td>
                <td class="border px-4 py-2">{{ $admin->status }}</td>
                <td class="border px-4 py-2 text-center">
                    {{-- Tombol Edit --}}
                    <button data-admin='@json($admin)' onclick="openEditModal(this)" class="text-blue-500 hover:underline">Edit</button>

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

    {{-- Modal Tambah/Edit User --}}
    <div id="userModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg w-1/2">
            <h2 class="text-xl font-bold mb-4" id="modalTitle">Tambah Admin</h2>
            <form id="userForm" method="POST" action="{{ route('user.store') }}">
                @csrf
                <input type="hidden" id="userId" name="id">
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium">Nama</label>
                    <input type="text" id="name" name="name" class="w-full border rounded p-2" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium">Email</label>
                    <input type="email" id="email" name="email" class="w-full border rounded p-2" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium">Password</label>
                    <input type="password" id="password" name="password" class="w-full border rounded p-2" required>
                </div>
                <div class="mb-4">
                    <label for="level" class="block text-sm font-medium">Level</label>
                    <select id="level" name="level" class="w-full border rounded p-2" required>
                        <option value="Admin">Admin</option>
                        <option value="SuperAdmin">Super Admin</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="status" class="block text-sm font-medium">Status</label>
                    <select id="status" name="status" class="w-full border rounded p-2" required>
                        <option value="Active">Aktif</option>
                        <option value="NonActive">Tidak Aktif</option>
                    </select>
                </div>
                <div class="flex justify-end">
                    <button type="button" onclick="closeModal()" class="bg-gray-300 text-gray-700 px-4 py-2 rounded mr-2">Batal</button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Fungsi untuk membuka modal tambah user
    document.getElementById('openAddModal').addEventListener('click', function () {
        document.getElementById('modalTitle').innerText = 'Tambah Admin';
        document.getElementById('userForm').action = "{{ route('user.store') }}"; // Rute untuk store
        document.getElementById('userId').value = '';
        document.getElementById('name').value = '';
        document.getElementById('email').value = '';
        document.getElementById('password').value = '';
        document.getElementById('level').value = 'Admin';
        document.getElementById('status').value = 'Active';
        document.getElementById('userModal').classList.remove('hidden');
    });

    // Fungsi untuk membuka modal edit user
    window.openEditModal = function (button) {
        const admin = JSON.parse(button.getAttribute('data-admin'));

        document.getElementById('modalTitle').innerText = 'Edit Admin';
        document.getElementById('userForm').action = "{{ url('admin/user') }}/" + admin.id;
        document.getElementById('userId').value = admin.id;
        document.getElementById('name').value = admin.name;
        document.getElementById('email').value = admin.email;
        document.getElementById('password').value = ''; // Biarkan kosong agar tidak memaksa update password
        document.getElementById('level').value = admin.level;
        document.getElementById('status').value = admin.status;
        document.getElementById('userModal').classList.remove('hidden');
    };

    // Fungsi untuk menutup modal
    function closeModal() {
        document.getElementById('userModal').classList.add('hidden');
    }
</script>
@endsection