<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" defer></script>
</head>
<body class="flex bg-gray-100 min-h-screen">
    
    {{-- Sidebar --}}
    @include('layouts.sidebar')

    {{-- Main content --}}
    <main class="flex-1 p-6 overflow-y-auto">
        @yield('content')
    </main>

</body>
</html>
