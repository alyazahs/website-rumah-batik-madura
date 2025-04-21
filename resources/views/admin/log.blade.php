@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6 bg-white rounded-md shadow-md">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 space-y-4 md:space-y-0">
        <h1 class="text-xl font-semibold">Activity Log</h1>

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
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($logs as $log)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        {{ $log->causer->name ?? 'System' }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">
                        {{ $log->description }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $log->created_at->format('Y-m-d H:i:s') }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $logs->links() }}
        </div>
        @endif

        @endsection