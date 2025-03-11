<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-lg">
        <h2 class="mb-4 text-2xl font-semibold text-center text-gray-700">Login Admin</h2>

        @if (session('success'))
            <div class="p-3 mb-4 text-green-700 bg-green-200 rounded-md">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="p-3 mb-4 text-red-700 bg-red-200 rounded-md">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                <input type="email" name="email" id="email"
                    class="w-full px-4 py-2 mt-1 border rounded-md focus:ring focus:ring-blue-300 focus:outline-none"
                    placeholder="admin@example.com" required>
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                <input type="password" name="password" id="password"
                    class="w-full px-4 py-2 mt-1 border rounded-md focus:ring focus:ring-blue-300 focus:outline-none"
                    placeholder="••••••••" required>
            </div>

            <button type="submit"
                class="w-full px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 transition">
                Login
            </button>
        </form>
    </div>
</body>
</html>
