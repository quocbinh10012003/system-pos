@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-xl font-semibold">Thêm khách hàng mới</h1>

        <form action="{{ route('users.store') }}" method="POST" class="mt-4">
            @csrf

            <div class="mb-4">
                <label for="name" class="block">Tên</label>
                <input type="text" name="name" id="name" class="border px-2 py-1 w-full" value="{{ old('name') }}" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block">Email</label>
                <input type="email" name="email" id="email" class="border px-2 py-1 w-full" value="{{ old('email') }}" required>
            </div>

            <div class="mb-4">
                <label for="password" class="block">Mật khẩu</label>
                <input type="password" name="password" id="password" class="border px-2 py-1 w-full" required>
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block">Xác nhận mật khẩu</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="border px-2 py-1 w-full" required>
            </div>

            <button type="submit" class="bg-green-500 text-white px-4 py-2">Thêm khách hàng</button>
        </form>
    </div>
@endsection
