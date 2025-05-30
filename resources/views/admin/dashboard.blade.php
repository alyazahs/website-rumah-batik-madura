@extends('layouts.admin')

@section('content')

{{-- Background Pattern --}}
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-cyan-50 relative overflow-hidden">
    <!-- Decorative Background Elements -->
    <div class="absolute top-0 right-0 w-96 h-96 bg-gradient-to-br from-blue-200 to-cyan-200 opacity-20 rounded-full -translate-y-48 translate-x-48 blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-80 h-80 bg-gradient-to-tr from-teal-200 to-emerald-200 opacity-20 rounded-full translate-y-40 -translate-x-40 blur-3xl"></div>

    {{-- Dashboard Content --}}
    <div class="relative max-w-7xl mx-auto pt-10 pb-16 px-4">
        {{-- Welcome Header --}}
        <div class="bg-white bg-opacity-80 backdrop-blur-xl rounded-3xl shadow-2xl overflow-hidden border border-white border-opacity-30 mb-8">
            <div class="bg-gradient-to-r from-slate-700 via-cyan-800 to-teal-700 py-8 px-8 relative overflow-hidden">
                <div class="absolute inset-0 bg-black bg-opacity-10"></div>
                <div class="absolute top-0 right-0 w-32 h-32 bg-white opacity-10 rounded-full -translate-y-16 translate-x-16"></div>
                <div class="absolute bottom-0 left-0 w-24 h-24 bg-white opacity-10 rounded-full translate-y-12 -translate-x-12"></div>
                
                <div class="relative flex items-center justify-center">
                    <div class="text-center">
                        <div class="inline-flex items-center space-x-3 mb-2">
                            <div class="w-10 h-10 bg-white bg-opacity-20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                                <i class="fas fa-tachometer-alt text-lg text-white"></i>
                            </div>
                            <h1 class="text-3xl font-bold text-white">Dashboard</h1>
                        </div>
                        <p class="text-cyan-200 text-sm">Welcome back! Here's your system overview</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Statistics Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
            {{-- Total Products Card --}}
            <div class="bg-white bg-opacity-80 backdrop-blur-xl rounded-3xl shadow-2xl overflow-hidden border border-white border-opacity-30 transform transition-all duration-300 hover:scale-105 hover:shadow-3xl">
                <div class="bg-gradient-to-br from-indigo-500 to-purple-600 py-6 px-8 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-20 h-20 bg-white opacity-10 rounded-full -translate-y-10 translate-x-10"></div>
                    <div class="relative flex items-center justify-between">
                        <div>
                            <h3 class="text-indigo-200 text-sm font-semibold uppercase tracking-wide">Total Products</h3>
                            <p class="text-4xl font-bold text-white mt-2">{{ $totalProduct }}</p>
                        </div>
                        <div class="w-16 h-16 bg-white bg-opacity-20 rounded-2xl flex items-center justify-center backdrop-blur-sm">
                            <i class="fas fa-box text-2xl text-white"></i>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center text-sm">
                        <div class="w-2 h-2 bg-indigo-500 rounded-full mr-2"></div>
                        <span class="text-slate-600">Products in inventory</span>
                    </div>
                </div>
            </div>

            {{-- Total Admins Card --}}
            <div class="bg-white bg-opacity-80 backdrop-blur-xl rounded-3xl shadow-2xl overflow-hidden border border-white border-opacity-30 transform transition-all duration-300 hover:scale-105 hover:shadow-3xl">
                <div class="bg-gradient-to-br from-green-500 to-emerald-600 py-6 px-8 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-20 h-20 bg-white opacity-10 rounded-full -translate-y-10 translate-x-10"></div>
                    <div class="relative flex items-center justify-between">
                        <div>
                            <h3 class="text-green-200 text-sm font-semibold uppercase tracking-wide">Total Admins</h3>
                            <p class="text-4xl font-bold text-white mt-2">{{ $totalUser }}</p>
                        </div>
                        <div class="w-16 h-16 bg-white bg-opacity-20 rounded-2xl flex items-center justify-center backdrop-blur-sm">
                            <i class="fas fa-users text-2xl text-white"></i>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center text-sm">
                        <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div>
                        <span class="text-slate-600">Total administrators</span>
                    </div>
                </div>
            </div>

            {{-- Total Categories Card --}}
            <div class="bg-white bg-opacity-80 backdrop-blur-xl rounded-3xl shadow-2xl overflow-hidden border border-white border-opacity-30 transform transition-all duration-300 hover:scale-105 hover:shadow-3xl">
                <div class="bg-gradient-to-br from-yellow-500 to-orange-600 py-6 px-8 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-20 h-20 bg-white opacity-10 rounded-full -translate-y-10 translate-x-10"></div>
                    <div class="relative flex items-center justify-between">
                        <div>
                            <h3 class="text-yellow-200 text-sm font-semibold uppercase tracking-wide">Total Categories</h3>
                            <p class="text-4xl font-bold text-white mt-2">{{ $totalCategory }}</p>
                        </div>
                        <div class="w-16 h-16 bg-white bg-opacity-20 rounded-2xl flex items-center justify-center backdrop-blur-sm">
                            <i class="fas fa-list text-2xl text-white"></i>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center text-sm">
                        <div class="w-2 h-2 bg-yellow-500 rounded-full mr-2"></div>
                        <span class="text-slate-600">Product categories</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Recent Activity Section --}}
        <div class="bg-white bg-opacity-80 backdrop-blur-xl rounded-3xl shadow-2xl overflow-hidden border border-white border-opacity-30">
            {{-- Activity Header --}}
            <div class="bg-gradient-to-r from-slate-100 to-cyan-50 py-6 px-8 border-b border-slate-200">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-gradient-to-br from-slate-600 to-cyan-700 rounded-xl flex items-center justify-center mr-4">
                        <i class="fas fa-clock text-white"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-slate-700">Recent Activity</h2>
                        <p class="text-slate-600">Latest system activities and updates</p>
                    </div>
                </div>
            </div>

            {{-- Activity List --}}
            <div class="p-8">
                @forelse ($log as $activity)
                    <div class="flex items-start space-x-4 p-4 rounded-2xl bg-gradient-to-br from-white to-slate-50 shadow-lg border border-slate-100 mb-4 transform transition-all duration-300 hover:scale-102 hover:shadow-xl">
                        {{-- User Avatar --}}
                        <div class="w-12 h-12 bg-gradient-to-br from-cyan-500 to-teal-600 rounded-full flex items-center justify-center shrink-0">
                            <i class="fas fa-user text-white"></i>
                        </div>
                        
                        {{-- Activity Content --}}
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center space-x-2 mb-1">
                                <span class="font-bold text-slate-800">{{ $activity->causer->name ?? 'System' }}</span>
                                <div class="w-1 h-1 bg-slate-400 rounded-full"></div>
                                <span class="text-sm text-slate-600">{{ $activity->description }}</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-clock text-slate-400 text-xs"></i>
                                <span class="text-sm text-slate-500">{{ \Carbon\Carbon::parse($activity->created_at)->diffForHumans() }}</span>
                            </div>
                        </div>

                        {{-- Activity Icon --}}
                        <div class="w-8 h-8 bg-gradient-to-br from-slate-100 to-cyan-50 rounded-lg flex items-center justify-center">
                            <i class="fas fa-chevron-right text-slate-400 text-xs"></i>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-16">
                        <div class="w-24 h-24 bg-gradient-to-br from-slate-100 to-cyan-50 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-inbox text-4xl text-slate-400"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-600 mb-2">No Recent Activity</h3>
                        <p class="text-slate-500">System activities will appear here when they occur.</p>
                    </div>
                @endforelse
            </div>

            {{-- View All Button --}}
            @if(!$log->isEmpty())
            <div class="px-8 pb-8">
                <a href="{{ route('admin.logs') }}" class="w-full bg-gradient-to-r from-slate-600 via-cyan-700 to-teal-600 hover:from-slate-700 hover:via-cyan-800 hover:to-teal-700 text-white font-bold py-4 px-6 rounded-2xl shadow-xl transition-all duration-300 transform hover:scale-105 hover:shadow-2xl flex items-center justify-center">
                    <i class="fas fa-list mr-3"></i>
                    <span class="text-lg">View All Activities</span>
                </a>
            </div>
            @endif
        </div>
    </div>
</div>

{{-- Custom Animations --}}
<style>
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fadeInUp {
    animation: fadeInUp 0.6s ease-out;
}

.hover\:scale-102:hover {
    transform: scale(1.02);
}

.shadow-3xl {
    box-shadow: 0 35px 60px -12px rgba(0, 0, 0, 0.25);
}
</style>

@endsection