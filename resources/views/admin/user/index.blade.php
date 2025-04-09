@extends('layouts.admin')

@section('content')
<div class="p-6 space-y-6">

    <div class="flex justify-between items-center">
        <h1 class="text-3xl font-bold text-gray-800">Manajemen Admin</h1>
        <button id="openAddModal" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow transition">
            <i class="fas fa-plus mr-2"></i> Tambah Admin
        </button>
    </div>

    @if ($admins->isEmpty())
        <div class="text-gray-600 text-center mt-10">Belum ada admin yang ditambahkan.</div>
    @else
        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-gray-100 text-left">
                    <tr>
                        <th class="px-6 py-3 font-semibold text-gray-600">Nama</th>
                        <th class="px-6 py-3 font-semibold text-gray-600">Email</th>
                        <th class="px-6 py-3 font-semibold text-gray-600">Level</th>
                        <th class="px-6 py-3 font-semibold text-gray-600">Status</th>
                        <th class="px-6 py-3 font-semibold text-gray-600 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($admins as $admin)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-3">{{ $admin->name }}</td>
                            <td class="px-6 py-3">{{ $admin->email }}</td>
                            <td class="px-6 py-3">{{ $admin->level }}</td>
                            <td class="px-6 py-3">
                                @if($admin->status === 'Active')
                                    <span class="bg-green-100 text-green-700 text-sm font-semibold px-3 py-1 rounded-full">
                                        Available
                                    </span>
                                @else
                                    <span class="bg-red-100 text-red-700 text-sm font-semibold px-3 py-1 rounded-full">
                                        Non Active
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-3 text-center space-x-2">
                                <button data-admin='@json($admin)' onclick="openEditModal(this)"
                                    class="text-blue-600 hover:underline"><i class="fas fa-edit"></i> Edit</button>
                                <form action="{{ route('user.destroy', $admin->id) }}" method="POST"
                                      class="inline-block"
                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus admin ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline"><i class="fas fa-trash-alt"></i> Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    <!-- Modal -->
    <div id="userModal" class="hidden fixed inset-0 z-50 bg-black/50 flex items-center justify-center">
        <div class="bg-white w-full max-w-xl rounded-xl shadow-lg p-6 relative animate-fadeIn">
            <h2 id="modalTitle" class="text-xl font-bold mb-4">Tambah Admin</h2>
            <form id="userForm" method="POST" action="{{ route('user.store') }}" class="space-y-4">
                @csrf
                <input type="hidden" id="userId" name="id">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" id="name" name="name" class="w-full border rounded px-4 py-2 mt-1" required>
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" class="w-full border rounded px-4 py-2 mt-1" required>
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" class="w-full border rounded px-4 py-2 mt-1">
                </div>
                <div>
                    <label for="level" class="block text-sm font-medium text-gray-700">Level</label>
                    <select id="level" name="level" class="w-full border rounded px-4 py-2 mt-1" required>
                        <option value="Admin">Admin</option>
                        <option value="SuperAdmin">Super Admin</option>
                    </select>
                </div>
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <select id="status" name="status" class="w-full border rounded px-4 py-2 mt-1" required>
                        <option value="Active">Aktif</option>
                        <option value="NonActive">Tidak Aktif</option>
                    </select>
                </div>
                <div class="flex justify-end pt-4 space-x-2">
                    <button type="button" onclick="closeModal()"
                        class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded">Batal</button>
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Simpan</button>
                </div>
            </form>
            <button onclick="closeModal()" class="absolute top-3 right-4 text-gray-500 hover:text-red-500 text-xl">×</button>
        </div>
    </div>
</div>

<style>
    @keyframes fadeIn {
        from { opacity: 0; transform: scale(0.95); }
        to { opacity: 1; transform: scale(1); }
    }
    .animate-fadeIn {
        animation: fadeIn 0.2s ease-out;
    }
</style>

<script>
    // Buka modal tambah
    document.getElementById('openAddModal').addEventListener('click', function () {
        document.getElementById('modalTitle').innerText = 'Tambah Admin';
        document.getElementById('userForm').action = "{{ route('user.store') }}";
        document.getElementById('userId').value = '';
        document.getElementById('name').value = '';
        document.getElementById('email').value = '';
        document.getElementById('password').value = '';
        document.getElementById('level').value = 'Admin';
        document.getElementById('status').value = 'Active';
        document.getElementById('userModal').classList.remove('hidden');
    });

    // Buka modal edit
    window.openEditModal = function (button) {
        const admin = JSON.parse(button.getAttribute('data-admin'));
        document.getElementById('modalTitle').innerText = 'Edit Admin';
        document.getElementById('userForm').action = `/admin/user/${admin.id}`;
        document.getElementById('userId').value = admin.id;
        document.getElementById('name').value = admin.name;
        document.getElementById('email').value = admin.email;
        document.getElementById('password').value = '';
        document.getElementById('level').value = admin.level;
        document.getElementById('status').value = admin.status;
        document.getElementById('userModal').classList.remove('hidden');
    }

    // Tutup modal
    function closeModal() {
        document.getElementById('userModal').classList.add('hidden');
    }
</script>
@endsection
