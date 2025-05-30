@extends('layouts.admin')

@section('content')

{{-- Flash Messages --}}
@if (session('success'))
<div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show" x-transition
        class="mt-10 mx-4 flex items-start gap-3 p-4 rounded-2xl bg-gradient-to-r from-green-500 to-emerald-600 text-white shadow-2xl border border-green-400">
    <div class="w-8 h-8 bg-gradient-to-r from-green-500 to-emerald-600 rounded-full flex items-center justify-center shrink-0 mt-0.5">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
        </svg>
    </div>
    <span class="font-semibold">{{ session('success') }}</span>
</div>
@endif

@if (session('error'))
<div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show" x-transition
    class="mt-10 mx-4 flex items-start gap-3 p-4 rounded-2xl bg-gradient-to-r from-red-400 to-rose-500 text-white shadow-2xl border border-red-300 backdrop-blur-sm">
    <div class="w-8 h-8 bg-white bg-opacity-20 rounded-full flex items-center justify-center backdrop-blur-sm shrink-0 mt-0.5">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </div>
    <span class="font-semibold">{{ session('error') }}</span>
</div>
@endif

{{-- Background Pattern --}}
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-cyan-50 relative overflow-hidden">
    <!-- Decorative Background Elements -->
    <div class="absolute top-0 right-0 w-96 h-96 bg-gradient-to-br from-blue-200 to-cyan-200 opacity-20 rounded-full -translate-y-48 translate-x-48 blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-80 h-80 bg-gradient-to-tr from-teal-200 to-emerald-200 opacity-20 rounded-full translate-y-40 -translate-x-40 blur-3xl"></div>

    {{-- Activity Log Card --}}
    <div class="relative max-w-7xl mx-auto pt-10 pb-16 px-4">
        <div class="bg-white bg-opacity-80 backdrop-blur-xl rounded-3xl shadow-2xl overflow-hidden border border-white border-opacity-30">
            {{-- Header with Gradient --}}
            <div class="bg-gradient-to-r from-slate-700 via-cyan-800 to-teal-700 py-8 px-8 relative overflow-hidden">
                <div class="absolute inset-0 bg-black bg-opacity-10"></div>
                <div class="absolute top-0 right-0 w-32 h-32 bg-white opacity-10 rounded-full -translate-y-16 translate-x-16"></div>
                <div class="absolute bottom-0 left-0 w-24 h-24 bg-white opacity-10 rounded-full translate-y-12 -translate-x-12"></div>
                
                <div class="relative flex items-center justify-center">
                    <div class="text-center">
                        <div class="inline-flex items-center space-x-3 mb-2">
                            <div class="w-10 h-10 bg-white bg-opacity-20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                                <i class="fas fa-chart-line text-lg text-white"></i>
                            </div>
                            <h1 class="text-3xl font-bold text-white">Activity Log</h1>
                        </div>
                        <p class="text-cyan-200 text-sm">Monitor and manage system activities</p>
                    </div>
                </div>
            </div>

            {{-- Filter Section --}}
            <div class="p-8 border-b border-slate-200">
                <form method="GET" class="bg-gradient-to-br from-white to-slate-50 p-6 rounded-2xl shadow-lg border border-slate-200">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <div>
                            <label for="search" class="block font-semibold text-slate-600 text-sm mb-3 uppercase tracking-wide">
                                <i class="fas fa-search text-cyan-600 mr-2"></i>Search
                            </label>
                            <input type="text" name="search" id="search" value="{{ request('search') }}"
                                class="w-full px-4 py-3 rounded-xl border-2 border-slate-200 focus:border-cyan-500 focus:ring-4 focus:ring-cyan-200 transition-all duration-300 text-lg font-semibold text-slate-800 bg-white"
                                placeholder="Search activities...">
                        </div>

                        <div>
                            <label for="user_id" class="block font-semibold text-slate-600 text-sm mb-3 uppercase tracking-wide">
                                <i class="fas fa-user text-cyan-600 mr-2"></i>User
                            </label>
                            <select name="user_id" id="user_id" class="w-full px-4 py-3 rounded-xl border-2 border-slate-200 focus:border-cyan-500 focus:ring-4 focus:ring-cyan-200 transition-all duration-300 text-lg font-semibold text-slate-800 bg-white">
                                <option value="">All Users</option>
                                @foreach ($users as $id => $name)
                                <option value="{{ $id }}" {{ request('user_id') == $id ? 'selected' : '' }}>{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="date" class="block font-semibold text-slate-600 text-sm mb-3 uppercase tracking-wide">
                                <i class="fas fa-calendar text-cyan-600 mr-2"></i>Date
                            </label>
                            <input type="date" name="date" id="date" value="{{ request('date') }}"
                                class="w-full px-4 py-3 rounded-xl border-2 border-slate-200 focus:border-cyan-500 focus:ring-4 focus:ring-cyan-200 transition-all duration-300 text-lg font-semibold text-slate-800 bg-white">
                        </div>

                        <div class="flex items-end">
                            <button type="submit"
                                class="w-full bg-gradient-to-r from-slate-600 via-cyan-700 to-teal-600 hover:from-slate-700 hover:via-cyan-800 hover:to-teal-700 text-white font-bold py-4 px-6 rounded-2xl shadow-xl transition-all duration-300 transform hover:scale-105 hover:shadow-2xl">
                                <i class="fas fa-filter mr-2"></i>
                                <span class="text-lg">Filter</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            {{-- Activity Log Table --}}
            <div class="p-8">
                @if ($logs->isEmpty())
                <div class="text-center py-16">
                    <div class="w-24 h-24 bg-gradient-to-br from-slate-100 to-cyan-50 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-clipboard-list text-4xl text-slate-400"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-600 mb-2">No Activity Logs</h3>
                    <p class="text-slate-500">There are no activities recorded yet.</p>
                </div>
                @else
                <div class="bg-gradient-to-br from-white to-slate-50 rounded-2xl shadow-lg border border-slate-200 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead class="bg-gradient-to-r from-slate-100 to-cyan-50">
                                <tr>
                                    <th class="px-6 py-4 text-left text-sm font-bold text-slate-700 uppercase tracking-wider border-b border-slate-200">
                                        <i class="fas fa-user text-cyan-600 mr-2"></i>User
                                    </th>
                                    <th class="px-6 py-4 text-left text-sm font-bold text-slate-700 uppercase tracking-wider border-b border-slate-200">
                                        <i class="fas fa-info-circle text-cyan-600 mr-2"></i>Information
                                    </th>
                                    <th class="px-6 py-4 text-left text-sm font-bold text-slate-700 uppercase tracking-wider border-b border-slate-200">
                                        <i class="fas fa-clock text-cyan-600 mr-2"></i>Time
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="logs-table-body" class="bg-white divide-y divide-slate-100">
                                @include('admin.partials.logs-table')
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="mt-8 flex justify-center">
                    {{ $logs->links() }}
                </div>
                @endif
            </div>

            {{-- Delete Old Logs Section --}}
            <div class="p-8 border-t border-slate-200" x-data="{ showModal: false }">
                <div class="bg-gradient-to-br from-red-50 to-rose-50 p-6 rounded-2xl shadow-lg border border-red-200">
                    <div class="flex items-center mb-6">
                        <div class="w-10 h-10 bg-gradient-to-br from-red-500 to-rose-600 rounded-xl flex items-center justify-center mr-4">
                            <i class="fas fa-trash-alt text-white"></i>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-red-700">Delete Old Logs</h2>
                            <p class="text-red-600">Remove logs before a specific date to maintain system performance</p>
                        </div>
                    </div>

                    <form @submit.prevent="showModal = true; $nextTick(() => { document.getElementById('modalDeleteDate').value = document.getElementById('delete_date').value; })">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="delete_date" class="block font-semibold text-red-700 text-sm mb-3 uppercase tracking-wide">
                                    <i class="fas fa-calendar-times text-red-600 mr-2"></i>Delete Logs Before Date
                                </label>
                                <input type="date" name="delete_date" id="delete_date"
                                    class="w-full px-4 py-3 rounded-xl border-2 border-red-200 focus:border-red-500 focus:ring-4 focus:ring-red-200 transition-all duration-300 text-lg font-semibold text-red-800 bg-white">
                            </div>

                            <div class="flex items-end">
                                <button type="submit"
                                    class="w-full bg-gradient-to-r from-red-600 to-rose-600 hover:from-red-700 hover:to-rose-700 text-white font-bold py-4 px-6 rounded-2xl shadow-xl transition-all duration-300 transform hover:scale-105 hover:shadow-2xl">
                                    <i class="fas fa-trash-alt mr-2"></i>
                                    <span class="text-lg">Delete Logs</span>
                                </button>
                            </div>
                        </div>
                    </form>

                    {{-- Confirmation Modal --}}
                    <div x-show="showModal" 
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-200"
                         x-transition:leave-start="opacity-100 scale-100"
                         x-transition:leave-end="opacity-0 scale-95"
                         class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm">
                        <div class="bg-white rounded-3xl shadow-2xl w-full max-w-md mx-4 overflow-hidden border border-white border-opacity-30">
                            <div class="bg-gradient-to-r from-red-600 to-rose-600 py-6 px-8">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-white bg-opacity-20 rounded-xl flex items-center justify-center mr-4">
                                        <i class="fas fa-exclamation-triangle text-white"></i>
                                    </div>
                                    <h2 class="text-2xl font-bold text-white">Confirm Delete</h2>
                                </div>
                            </div>
                            
                            <div class="p-8">
                                <p class="text-lg text-slate-600 mb-8">Are you sure you want to delete log data before the selected date? This action cannot be undone.</p>

                                <div class="flex flex-col sm:flex-row gap-4">
                                    <button @click="showModal = false"
                                        class="flex-1 bg-gradient-to-r from-slate-400 to-slate-500 hover:from-slate-500 hover:to-slate-600 text-white font-bold py-3 px-6 rounded-xl transition-all duration-300 transform hover:scale-105">
                                        <i class="fas fa-times mr-2"></i>Cancel
                                    </button>

                                    <form method="POST" action="{{ route('admin.logs.delete') }}" class="flex-1">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="delete_date" id="modalDeleteDate">
                                        <button type="submit"
                                            class="w-full bg-gradient-to-r from-red-600 to-rose-600 hover:from-red-700 hover:to-rose-700 text-white font-bold py-3 px-6 rounded-xl transition-all duration-300 transform hover:scale-105">
                                            <i class="fas fa-check mr-2"></i>Yes, Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection