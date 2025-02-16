@extends('layouts.app')

@section('title', 'POS System')

@section('content')
<div class="max-w-5xl mx-auto mt-12">
    <div class="bg-white shadow-lg rounded-lg p-8">
        <h1 class="text-4xl font-bold text-gray-700 mb-6 text-center">Hệ Thống POS</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- ✅ Sản phẩm -->
            <a href="/products" class="group bg-blue-500 text-white px-6 py-4 rounded-lg shadow-md transition transform hover:scale-105 flex flex-col items-center">
                📦
                <span class="mt-2 text-lg font-semibold">Quản lý sản phẩm</span>
            </a>

            <!-- ✅ Đơn hàng -->
            <a href="/orders" class="group bg-green-500 text-white px-6 py-4 rounded-lg shadow-md transition transform hover:scale-105 flex flex-col items-center">
                🛒
                <span class="mt-2 text-lg font-semibold">Quản lý đơn hàng</span>
            </a>

            <!-- ✅ Khách hàng -->
            <a href="/users" class="group bg-purple-500 text-white px-6 py-4 rounded-lg shadow-md transition transform hover:scale-105 flex flex-col items-center">
                👥
                <span class="mt-2 text-lg font-semibold">Quản lý nhân viên</span>
            </a>
        </div>
    </div>
</div>
@endsection
