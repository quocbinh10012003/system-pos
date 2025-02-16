<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Store') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Styles -->
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="font-sans antialiased bg-gray-50 text-gray-900">
    <div class="min-h-screen flex flex-col">
        
        <!-- ✅ Navigation -->
        <nav class="bg-white shadow-md py-4">
            <div class="max-w-7xl mx-auto px-4 flex justify-between items-center">
                <a href="/" class="text-2xl font-bold text-blue-600">My Store</a>
                <div class="space-x-6">
                    <a href="/products" class="text-gray-600 hover:text-blue-500 transition">Sản phẩm</a>
                    <a href="/orders" class="text-gray-600 hover:text-green-500 transition">Đơn hàng</a>
                    <a href="/users" class="text-gray-600 hover:text-purple-500 transition">Khách hàng</a>
                </div>
                <div>
                    @if(Auth::check())
                        <span class="text-gray-600">👋 Xin chào, {{ Auth::user()->name }}</span>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="ml-4 bg-red-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-red-600 transition">
                                🚪 Đăng xuất
                            </button>
                        </form>
                        
                    @else
                        <a href="{{ route('login') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-600 transition">
                            🔑 Đăng nhập
                        </a>
                    @endif
                </div>
            </div>
        </nav>

        <!-- ✅ Nội dung chính -->
        <main class="flex-grow container max-w-7xl mx-auto px-4 py-6">
            @yield('content')
        </main>
        <!-- ✅ Footer -->
        <footer class="bg-gray-800 text-white text-center py-4 mt-10">
            &copy; 2024 POS System. All rights reserved.
        </footer>
    </div>
</body>
</html>
