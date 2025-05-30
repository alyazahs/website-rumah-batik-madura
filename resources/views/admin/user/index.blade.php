@extends('layouts.admin')

@section('content')
@include('admin.components.confirm-delete-modal')

{{-- Flash Messages --}}
@if (session('success'))
<div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show" x-transition
    class="mt-4 mx-4 flex items-center gap-2 p-3 rounded-lg bg-gradient-to-r from-green-400 to-emerald-500 text-white shadow-lg">
    <div class="w-6 h-6 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
        </svg>
    </div>
    <span class="font-medium">{{ session('success') }}</span>
</div>
@endif

@if (session('error'))
<div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show" x-transition
    class="mt-4 mx-4 flex items-center gap-2 p-3 rounded-lg bg-gradient-to-r from-red-400 to-rose-500 text-white shadow-lg">
    <div class="w-6 h-6 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </div>
    <span class="font-medium">{{ session('error') }}</span>
</div>
@endif

{{-- Background --}}
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50 relative">
    <div class="absolute top-0 right-0 w-64 h-64 bg-gradient-to-br from-blue-200 to-cyan-200 opacity-10 rounded-full -translate-y-32 translate-x-32 blur-2xl"></div>
    
    <div class="relative p-4">
        {{-- Header Section --}}
        <div class="bg-white rounded-xl shadow-lg mb-4">
            <div class="bg-gradient-to-r from-slate-600 to-cyan-700 p-4 rounded-t-xl">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                            <i class="fas fa-users-cog text-lg text-white"></i>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-white">Admin Management</h1>
                            <p class="text-cyan-200 text-sm">Manage system administrators and permissions</p>
                        </div>
                    </div>
                    
                    @auth
                    @if (Auth::user()->level === 'SuperAdmin')
                    <button id="openAddModal" 
                        class="inline-flex items-center gap-2 bg-emerald-500 hover:bg-emerald-600 text-white font-medium px-4 py-2 rounded-lg shadow-md transition-colors">
                        <i class="fas fa-plus"></i> 
                        <span>Add New Admin</span>
                    </button>
                    @endif
                    @endauth
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
            <div class="bg-white rounded-lg shadow-md p-4 border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Admins</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $admins->count() }}</p>
                    </div>
                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-users text-blue-600"></i>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-lg shadow-md p-4 border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Active Admins</p>
                        <p class="text-2xl font-bold text-green-600">{{ $admins->where('status', 'Active')->count() }}</p>
                    </div>
                    <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-user-check text-green-600"></i>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-lg shadow-md p-4 border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Super Admins</p>
                        <p class="text-2xl font-bold text-purple-600">{{ $admins->where('level', 'SuperAdmin')->count() }}</p>
                    </div>
                    <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-crown text-purple-600"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Admin Table -->
        @if ($admins->isEmpty())
        <div class="bg-white rounded-xl shadow-lg p-8 text-center border border-gray-100">
            <div class="flex flex-col items-center justify-center space-y-2">
                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-users text-gray-400 text-xl"></i>
                </div>
                <div class="font-medium text-gray-500">No Admin Users Found</div>
                <div class="text-sm text-gray-400 mb-4">Get started by adding your first admin user to the system.</div>
                @auth
                @if (Auth::user()->level === 'SuperAdmin')
                <button onclick="document.getElementById('openAddModal').click()" 
                    class="inline-flex items-center gap-2 bg-emerald-500 hover:bg-emerald-600 text-white font-medium px-4 py-2 rounded-lg shadow-md transition-colors">
                    <i class="fas fa-plus"></i> Add First Admin
                </button>
                @endif
                @endauth
            </div>
        </div>
        @else
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead class="bg-gradient-to-r from-slate-600 to-cyan-700">
                        <tr>
                            <th class="px-4 py-3 text-left font-medium text-white text-sm">
                                <i class="fas fa-user mr-1"></i>Admin Details
                            </th>
                            <th class="px-4 py-3 text-left font-medium text-white text-sm">
                                <i class="fas fa-shield-alt mr-1"></i>Role
                            </th>
                            <th class="px-4 py-3 text-left font-medium text-white text-sm">
                                <i class="fas fa-toggle-on mr-1"></i>Status
                            </th>
                            @auth
                            @if (Auth::user()->level === 'SuperAdmin')
                            <th class="px-4 py-3 text-center font-medium text-white text-sm">
                                <i class="fas fa-cogs mr-1"></i>Actions
                            </th>
                            @endif
                            @endauth
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($admins as $admin)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-3">
                                    <div class="flex-shrink-0">
                                        <div class="w-10 h-10 bg-gradient-to-br from-slate-500 to-cyan-600 rounded-lg flex items-center justify-center text-white font-bold text-sm shadow-sm">
                                            {{ strtoupper(substr($admin->name, 0, 1)) }}
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-medium text-gray-900">{{ $admin->name }}</div>
                                        <div class="text-sm text-gray-600 flex items-center">
                                            <i class="fas fa-envelope mr-1 text-gray-400"></i>{{ $admin->email }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3">
                                @if($admin->level === 'SuperAdmin')
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                    <i class="fas fa-crown mr-1"></i>Super Admin
                                </span>
                                @else
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    <i class="fas fa-user-tie mr-1"></i>Admin
                                </span>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                @if($admin->status === 'Active')
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    <div class="w-2 h-2 bg-green-500 rounded-full mr-1"></div>
                                    Active
                                </span>
                                @else
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                    <div class="w-2 h-2 bg-red-500 rounded-full mr-1"></div>
                                    Inactive
                                </span>
                                @endif
                            </td>
                            @auth
                            @if (Auth::user()->level === 'SuperAdmin')
                            <td class="px-4 py-3">
                                <div class="flex items-center justify-center space-x-2">
                                    <button data-admin='@json($admin)' onclick="openEditModal(this)"
                                        class="w-8 h-8 bg-blue-500 hover:bg-blue-600 text-white rounded-lg flex items-center justify-center transition-colors">
                                        <i class="fas fa-edit text-sm"></i>
                                    </button>
                                    <form action="{{ route('user.destroy', $admin->id) }}" method="POST" class="inline-block"
                                        onsubmit="event.preventDefault(); openConfirmDelete(this, '{{ $admin->name }}');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                            class="w-8 h-8 bg-red-500 hover:bg-red-600 text-white rounded-lg flex items-center justify-center transition-colors">
                                            <i class="fas fa-trash text-sm"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                            @endif
                            @endauth
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif

        <!-- Enhanced Modal -->
        <div id="userModal" class="fixed inset-0 z-50 bg-black bg-opacity-50 items-center justify-center hidden">
            <div class="bg-white w-full max-w-2xl rounded-xl shadow-xl p-6 relative mx-4 max-h-[90vh] overflow-y-auto">
                <!-- Modal Header -->
                <div class="flex items-center justify-between mb-4 pb-3 border-b">
                    <div class="flex items-center space-x-2">
                        <div class="w-8 h-8 bg-cyan-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-user-plus text-white text-sm"></i>
                        </div>
                        <h2 id="modalTitle" class="text-xl font-bold text-gray-800">Add Admin</h2>
                    </div>
                    <button onclick="closeModal()" class="w-8 h-8 bg-gray-100 hover:bg-red-100 rounded-lg flex items-center justify-center text-gray-500 hover:text-red-500 transition-colors">
                        <i class="fas fa-times text-sm"></i>
                    </button>
                </div>

                <!-- Modal Form -->
                <form id="userForm" method="POST" action="{{ route('user.store') }}" class="space-y-4">
                    @csrf
                    <input type="hidden" id="userId" name="id">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="name" class="block font-medium text-gray-700 text-sm mb-1">
                                <i class="fas fa-user text-cyan-600 mr-1"></i>Full Name
                            </label>
                            <input type="text" id="name" name="name" 
                                class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:border-cyan-500 focus:ring-2 focus:ring-cyan-200 transition-all" 
                                placeholder="Enter full name" required>
                        </div>

                        <div>
                            <label for="email" class="block font-medium text-gray-700 text-sm mb-1">
                                <i class="fas fa-envelope text-cyan-600 mr-1"></i>Email Address
                            </label>
                            <input type="email" id="email" name="email" 
                                class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:border-cyan-500 focus:ring-2 focus:ring-cyan-200 transition-all" 
                                placeholder="Enter email address" required>
                        </div>
                    </div>

                    <div id="passwordField">
                        <label for="password" class="block font-medium text-gray-700 text-sm mb-1">
                            <i class="fas fa-lock text-cyan-600 mr-1"></i>Password
                        </label>
                        <input type="password" id="password" name="password" 
                            class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:border-cyan-500 focus:ring-2 focus:ring-cyan-200 transition-all" 
                            placeholder="Enter secure password" minlength="8">
                        <div class="mt-1 text-xs text-gray-500 flex items-center">
                            <i class="fas fa-info-circle mr-1 text-blue-500"></i>
                            Password must be at least 8 characters long
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="level" class="block font-medium text-gray-700 text-sm mb-1">
                                <i class="fas fa-shield-alt text-cyan-600 mr-1"></i>Admin Role
                            </label>
                            <select id="level" name="level" 
                                class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:border-cyan-500 focus:ring-2 focus:ring-cyan-200 transition-all" required>
                                <option value="Admin">Admin</option>
                                <option value="SuperAdmin">Super Admin</option>
                            </select>
                        </div>

                        <div>
                            <label for="status" class="block font-medium text-gray-700 text-sm mb-1">
                                <i class="fas fa-toggle-on text-cyan-600 mr-1"></i>Account Status
                            </label>
                            <select id="status" name="status" 
                                class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:border-cyan-500 focus:ring-2 focus:ring-cyan-200 transition-all" required>
                                <option value="Active">Active</option>
                                <option value="NonActive">Inactive</option>
                            </select>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex justify-end gap-2 pt-4 border-t">
                        <button type="button" onclick="closeModal()"
                            class="px-4 py-2 rounded-lg bg-gray-400 hover:bg-gray-500 text-white font-medium transition-colors">
                            <i class="fas fa-times mr-1"></i>Cancel
                        </button>
                        <button type="submit"
                            class="px-4 py-2 rounded-lg bg-emerald-500 hover:bg-emerald-600 text-white font-medium transition-colors">
                            <i class="fas fa-save mr-1"></i>Save Admin
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    /* Custom scrollbar */
    .overflow-x-auto::-webkit-scrollbar {
        height: 6px;
    }

    .overflow-x-auto::-webkit-scrollbar-track {
        background: #f1f5f9;
        border-radius: 10px;
    }

    .overflow-x-auto::-webkit-scrollbar-thumb {
        background: linear-gradient(90deg, #0891b2, #0e7490);
        border-radius: 10px;
    }

    .overflow-x-auto::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(90deg, #0e7490, #155e75);
    }
</style>

<script>
    document.getElementById('openAddModal').addEventListener('click', function() {
        document.getElementById('modalTitle').innerText = 'Add New Admin';
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
        document.getElementById('modalTitle').innerText = 'Edit Admin Details';
        document.getElementById('userForm').action = `/admin/user/${admin.id}`;
        document.getElementById('userId').value = admin.id;
        document.getElementById('name').value = admin.name;
        document.getElementById('email').value = admin.email;
        document.getElementById('password').value = '';
        document.getElementById('level').value = admin.level;
        document.getElementById('status').value = admin.status;
        document.getElementById('userModal').classList.remove('hidden');
        document.getElementById('userModal').classList.add('flex');
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

    // Close modal when clicking outside
    document.getElementById('userModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
        }
    });

    // Escape key to close modal
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeModal();
        }
    });
</script>
@endsection