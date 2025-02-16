@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-xl font-semibold">Chỉnh sửa thông tin nhân viên</h1>

        <form action="{{ route('users.update', $user->id) }}" method="POST" class="mt-4">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block">Tên</label>
                <input type="text" name="name" id="name" class="border px-2 py-1 w-full" value="{{ $user->name }}" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block">Email</label>
                <input type="email" name="email" id="email" class="border px-2 py-1 w-full" value="{{ $user->email }}" required>
            </div>

            <div class="mb-4">
                <label for="password" class="block">Mật khẩu</label>
                <input type="password" name="password" id="password" class="border px-2 py-1 w-full">
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block">Xác nhận mật khẩu</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="border px-2 py-1 w-full">
            </div>

            {{-- <button type="submit" class="bg-green-500 text-white px-4 py-2">Cập nhật khách hàng</button> --}}
            <div class="flex items-center space-x-4 mt-4">
                <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded-lg shadow hover:bg-green-600 transition">
                    Cập nhật nhân viên
                </button>
                <a href="{{ route('users.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded-lg shadow hover:bg-gray-600 transition">
                    Hủy
                </a>
            </div>
        </form>
    </div>
@endsection
