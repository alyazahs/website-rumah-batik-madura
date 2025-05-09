@extends('layouts.admin')

@section('content')
@include('admin.components.confirm-delete-modal')
<div class="p-6 space-y-6">
    <div class="flex justify-between items-center">
        <h1 class="text-3xl font-bold text-gray-800">Admin Management</h1>
        @auth
        @if (Auth::user()->level === 'SuperAdmin')
        <button id="openAddModal" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow transition">
            <i class="fas fa-plus mr-2"></i> Add Admin
        </button>
        @endif
        @endauth
    </div>

    @if ($admins->isEmpty())
    <div class="text-gray-600 text-center mt-10">No admin users have been added yet.</div>
    @else
    <div class="overflow-x-auto bg-white rounded-xl shadow">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-600 text-left">
                <tr>
                    <th class="px-6 py-3 font-semibold text-gray-100">Name</th>
                    <th class="px-6 py-3 font-semibold text-gray-100">Email</th>
                    <th class="px-6 py-3 font-semibold text-gray-100">Role</th>
                    <th class="px-6 py-3 font-semibold text-gray-100">Status</th>
                    @auth
                    @if (Auth::user()->level === 'SuperAdmin')
                    <th class="px-6 py-3 font-semibold text-gray-600 text-center">Actions</th>
                    @endif
                    @endauth
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
                            Active
                        </span>
                        @else
                        <span class="bg-red-100 text-red-700 text-sm font-semibold px-3 py-1 rounded-full">
                            Inactive
                        </span>
                        @endif
                    </td>
                    @auth
                    @if (Auth::user()->level === 'SuperAdmin')
                    <td class="px-6 py-3 text-center space-x-8">
                        <button data-admin='@json($admin)' onclick="openEditModal(this)"
                            class="text-blue-600 hover:underline"><i class="fas fa-edit"></i> Edit</button>
                        <form action="{{ route('user.destroy', $admin->id) }}" method="POST" class="inline-block"
                            onsubmit="event.preventDefault(); openConfirmDelete(this, '{{ $admin->name }}');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">
                                <i class="fas fa-trash-alt"></i> Delete
                            </button>
                        </form>

                    </td>
                    @endif
                    @endauth
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif

    <!-- Modal -->
    <div id="userModal" class="fixed inset-0 z-50 bg-black/50 items-center justify-center hidden">
        <div class="bg-white w-full max-w-xl rounded-xl shadow-lg p-6 relative animate-fadeIn">
            <h2 id="modalTitle" class="text-xl font-bold mb-4">Add Admin</h2>
            <form id="userForm" method="POST" action="{{ route('user.store') }}" class="space-y-4">
                @csrf
                <input type="hidden" id="userId" name="id">

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" id="name" name="name" class="w-full border rounded px-4 py-2 mt-1" required>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" class="w-full border rounded px-4 py-2 mt-1" required>
                </div>

                <div id="passwordField">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" class="w-full border rounded px-4 py-2 mt-1">
                </div>

                <div>
                    <label for="level" class="block text-sm font-medium text-gray-700">Role</label>
                    <select id="level" name="level" class="w-full border rounded px-4 py-2 mt-1" required>
                        <option value="Admin">Admin</option>
                        <option value="SuperAdmin">Super Admin</option>
                    </select>
                </div>

                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <select id="status" name="status" class="w-full border rounded px-4 py-2 mt-1" required>
                        <option value="Active">Active</option>
                        <option value="NonActive">Inactive</option>
                    </select>
                </div>

                <div class="flex justify-end pt-4 space-x-2">
                    <button type="button" onclick="closeModal()"
                        class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded">Cancel</button>
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Save</button>
                </div>
            </form>
            <button onclick="closeModal()" class="absolute top-3 right-4 text-gray-500 hover:text-red-500 text-xl">×</button>
        </div>
    </div>
</div>

<style>
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: scale(0.95);
        }

        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    .animate-fadeIn {
        animation: fadeIn 0.2s ease-out;
    }
</style>

<script>
    document.getElementById('openAddModal').addEventListener('click', function() {
        document.getElementById('modalTitle').innerText = 'Add Admin';
        document.getElementById('userForm').action = "{{ route('user.store') }}";
        document.getElementById('userId').value = '';
        document.getElementById('name').value = '';
        document.getElementById('email').value = '';
        document.getElementById('password').value = '';
        document.getElementById('level').value = 'Admin';
        document.getElementById('status').value = 'Active';
        const modal = document.getElementById('userModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.getElementById('passwordField').classList.remove('hidden');

        const existingMethod = document.getElementById('methodField');
        if (existingMethod) existingMethod.remove();
    });

    window.openEditModal = function(button) {
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
        document.getElementById('passwordField').classList.add('hidden');

        if (!document.getElementById('methodField')) {
            const methodField = document.createElement('input');
            methodField.type = 'hidden';
            methodField.name = '_method';
            methodField.value = 'PUT';
            methodField.id = 'methodField';
            document.getElementById('userForm').appendChild(methodField);
        }
    }

    function closeModal() {
        const modal = document.getElementById('userModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }
</script>
@endsection