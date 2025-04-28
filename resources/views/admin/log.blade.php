@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6 bg-white rounded-md shadow-md">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 space-y-4 md:space-y-0">
        <h1 class="text-lg font-semibold mb-4">Activity Log</h1>

        {{-- Filter dan Search --}}
        <form method="GET" class="flex flex-col md:flex-row md:items-end md:space-x-4 space-y-2 md:space-y-0">
            <div>
                <label for="search" class="block text-sm font-medium text-gray-700">Search</label>
                <input type="text" name="search" id="search" value="{{ request('search') }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>

            <div>
                <label for="user_id" class="block text-sm font-medium text-gray-700">User</label>
                <select name="user_id" id="user_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    <option value="">All Users</option>
                    @foreach ($users as $id => $name)
                    <option value="{{ $id }}" {{ request('user_id') == $id ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                <input type="date" name="date" id="date" value="{{ request('date') }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>

            <div>
                <button type="submit"
                    class="mt-1 w-full bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-800">Filter</button>
            </div>
        </form>
    </div>
    @if ($logs->isEmpty())
    <p>Tidak ada aktivitas log.</p>
    @else
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-100">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">
                    User
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">
                    Information
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">
                    Time
                </th>
            </tr>
        </thead>
        <tbody id="logs-table-body" class="bg-white divide-y divide-gray-200">
            @include('admin.partials.logs-table')
        </tbody>
    </table>

    <div class="mt-4">
        {{ $logs->links() }}
    </div>
    @endif

    <div class="mt-10" x-data="{ open: false, showModal: false }">
    <h2 class="text-lg font-semibold mb-4">Delete Old Logs</h2>

    {{-- Form Hapus --}}
    <form @submit.prevent="showModal = true; $nextTick(() => { document.getElementById('modalDeleteDate').value = document.getElementById('delete_date').value; })"
        class="mt-4 bg-red-50 p-4 rounded-md shadow-md border border-red-200">
        <div class="flex flex-col md:flex-row md:items-center md:space-x-4 space-y-4 md:space-y-0">
            <!-- Input Tanggal -->
            <div class="flex-1">
                <label for="delete_date" class="block text-sm font-medium text-red-700">Delete Logs Before Date</label>
                <input type="date" name="delete_date" id="delete_date"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500">
            </div>

            <!-- Tombol Hapus -->
            <div>
                <button type="submit"
                    class="w-full bg-red-600 text-white px-4 py-2 rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                    <i class="fas fa-trash-alt mr-2"></i> Delete Log
                </button>
            </div>
        </div>
    </form>

    {{-- Modal Konfirmasi --}}
    <div x-show="showModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
            <h2 class="text-lg font-semibold text-gray-800">
            Confirm Delete</h2>
            <p class="mt-2 text-sm text-gray-600">Are you sure you want to delete log data before the selected date?</p>

            <div class="mt-4 flex justify-end gap-4">
                <!-- Tombol Tidak -->
                <button @click="showModal = false"
                    class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400 transition duration-200">
                    No
                </button>

                <!-- Tombol Hapus -->
                <form method="POST" action="{{ route('admin.logs.delete') }}">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="delete_date" id="modalDeleteDate">
                    <button type="submit"
                        class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition duration-200">
                        Yes, Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

    @endsection

