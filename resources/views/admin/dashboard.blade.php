@extends('layouts.admin')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-xl shadow flex items-center space-x-4 transform transition duration-300 hover:scale-105 hover:shadow-lg">
            <i class="fas fa-box text-indigo-600 text-3xl"></i>
            <div>
                <h3 class="text-sm text-gray-500">Total Product</h3>
                <p class="text-xl font-bold">{{ $totalProduct }}</p>
            </div>
        </div>
        <div class="bg-white p-6 rounded-xl shadow flex items-center space-x-4 transform transition duration-300 hover:scale-105 hover:shadow-lg">
            <i class="fas fa-users text-green-600 text-3xl"></i>
            <div>
                <h3 class="text-sm text-gray-500">Total Admin</h3>
                <p class="text-xl font-bold">{{ $totalUser }}</p>
            </div>
        </div>
        <div class="bg-white p-6 rounded-xl shadow flex items-center space-x-4 transform transition duration-300 hover:scale-105 hover:shadow-lg">
            <i class="fas fa-list text-yellow-500 text-3xl"></i>
            <div>
                <h3 class="text-sm text-gray-500">Total Category</h3>
                <p class="text-xl font-bold">{{ $totalCategory }}</p>
            </div>
        </div>
    </div>

    <div class="mt-10 bg-white p-6 rounded-xl shadow animate-fadeIn">
        <h2 class="text-lg font-semibold mb-4">Newest Activity</h2>
        <ul class="space-y-2">
            @forelse ($log as $activity)
                <li class="text-sm text-gray-700">
                    <span class="font-medium">{{ $activity->causer->name ?? 'System' }}</span> - 
                    {{ $activity->description }} 
                    <span class="text-xs text-gray-500 block">{{ \Carbon\Carbon::parse($activity->created_at)->diffForHumans() }}</span>
                </li>
            @empty
                <li class="text-sm text-gray-500 italic">No Activity.</li>
            @endforelse
        </ul>
    </div>
@endsection
