<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập - My Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <!-- Logo -->
        <h2 class="text-2xl font-semibold text-gray-700 mt-2">My Store</h2>
        <div class="text-center mb-6">
            <a href="/">
                <img src="{{ asset('logo.jpg') }}" class="w-20 h-20 mx-auto">
            </a>
            <h2 class="text-2xl font-semibold text-gray-700 mt-2">Đăng nhập</h2>
        </div>

        <!-- Hiển thị lỗi -->
        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-100 border border-red-400 text-red-600 rounded-md">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form đăng nhập -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" type="email" name="email" required autofocus
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300"
                    placeholder="Nhập email của bạn">
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Mật khẩu</label>
                <input id="password" type="password" name="password" required
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300"
                    placeholder="Nhập mật khẩu">
            </div>

            <!-- Ghi nhớ đăng nhập -->
            <div class="mb-4 flex items-center">
                <input type="checkbox" id="remember_me" name="remember" class="rounded border-gray-300">
                <label for="remember_me" class="ml-2 text-sm text-gray-600">Ghi nhớ đăng nhập</label>
            </div>

            <!-- Nút đăng nhập -->
            <div class="flex items-center justify-between">
                @if (Route::has('password.request'))
                    <a class="text-sm text-blue-600 hover:underline" href="{{ route('password.request') }}">
                        Quên mật khẩu?
                    </a>
                @endif

                <button type="submit"
                    class="ml-3 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md shadow-md transition">
                    Đăng nhập
                </button>
            </div>
        </form>

        <!-- Nút đăng ký -->
        <div class="mt-6 text-center">
            <span class="text-sm text-gray-600">Chưa có tài khoản?</span>
            <a href="{{ route('register') }}"
                class="text-blue-600 font-semibold hover:underline ml-1">
                Đăng ký ngay
            </a>
        </div>

    </div>

</body>
</html>
