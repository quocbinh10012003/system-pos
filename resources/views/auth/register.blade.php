<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký - My Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
   
    <div class="bg-white p-8 rounded-lg shadow-md w-96">
        <h2 class="text-2xl font-semibold text-gray-700 mt-2">My Store</h2>
        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <img src="{{ asset('logo.jpg') }}" class="w-20 h-20">
        </div>
        
        <h3 class="text-center text-2xl font-bold text-gray-700 mb-6">Đăng ký tài khoản</h3>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block text-gray-600 text-sm font-medium">Tên</label>
                <input id="name" type="text" name="name" required autofocus
                    class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200 focus:outline-none">
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-gray-600 text-sm font-medium">Email</label>
                <input id="email" type="email" name="email" required
                    class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200 focus:outline-none">
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-gray-600 text-sm font-medium">Mật khẩu</label>
                <input id="password" type="password" name="password" required
                    class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200 focus:outline-none">
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-600 text-sm font-medium">Xác nhận mật khẩu</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                    class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200 focus:outline-none">
            </div>

            <!-- Submit -->
            <div class="flex items-center justify-between mt-6">
                <a href="{{ route('login') }}" class="text-sm text-blue-600 hover:underline">Đã có tài khoản? Đăng nhập</a>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">
                    Đăng ký
                </button>
            </div>
        </form>
    </div>
</body>
</html>
