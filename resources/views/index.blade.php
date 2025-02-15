@extends('layouts.app')

@section('title', 'POS System')

@section('content')
<div class="max-w-4xl mx-auto mt-10">
    <div class="bg-white shadow-md rounded-lg p-6">
        <div class="flex items-center justify-between border-b pb-4 mb-4">
            <h1 class="text-3xl font-bold text-gray-700">POS System</h1>
            {{-- <div class="space-x-4">
                <a href="/" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-600">
                    🏠 Home
                </a>
                <a href="{{ route('logout') }}" 
                    class="bg-red-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-red-600">
                    🚪 Logout
                </a>
            </div> --}}
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <a href="/products" class="bg-blue-500 text-white px-6 py-4 rounded-lg shadow-md hover:bg-blue-600 text-center">
                📦 Quản lý sản phẩm
            </a>
            <a href="/orders" class="bg-green-500 text-white px-6 py-4 rounded-lg shadow-md hover:bg-green-600 text-center">
                🛒 Quản lý đơn hàng
            </a>
            <a href="/users" class="bg-purple-500 text-white px-6 py-4 rounded-lg shadow-md hover:bg-purple-600 text-center">
                👥 Quản lý khách hàng
            </a>
        </div>
    </div>
</div>
@endsection
