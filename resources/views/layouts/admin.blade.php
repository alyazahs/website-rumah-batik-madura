<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="flex h-screen bg-gray-100">

    {{-- Sidebar --}}
    @include('layouts.sidebar')

    {{-- Konten --}}
    <main class="flex-1 p-6 overflow-y-auto">
        @yield('content')
    </main>

</body>

</html>