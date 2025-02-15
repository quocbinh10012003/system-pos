<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'POS System')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Header & Navbar -->
    <header class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
            <!-- Logo & Home Button -->
            <div class="flex items-center gap-4">
                <h1 class="text-2xl font-bold text-gray-700">POS System</h1>
                <a href="/" class="bg-blue-500 text-white font-semibold px-4 py-2 rounded-lg hover:bg-blue-600 transition">
                    🏠 Home
                </a>
            </div>

            <!-- Logout Button -->
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-red-500 text-white font-semibold px-4 py-2 rounded-lg hover:bg-red-600 transition">
                    🚪 Logout
                </button>
            </form>
        </div>
    </header>

    <!-- Nội dung chính -->
    <main class="max-w-7xl mx-auto p-8 bg-white shadow-lg rounded-lg mt-6">
        @yield('content')
    </main>
</body>
</html>
