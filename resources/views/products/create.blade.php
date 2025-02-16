@extends('layouts.app')

@section('title', 'Thêm sản phẩm')

@section('content')
    <h1 class="text-2xl font-bold">Thêm sản phẩm</h1>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="mt-4">
        @csrf
        <div class="mb-4">
            <label class="block">Tên sản phẩm</label>
            <input type="text" name="name" class="border px-2 py-1 w-full" required>
        </div>
        <div class="mb-4">
            <label class="block">Giá</label>
            <input type="number" name="price" class="border px-2 py-1 w-full" required>
        </div>
        <div class="mb-4">
            <label class="block">Kho</label>
            <input type="number" name="stock" class="border px-2 py-1 w-full" required>
        </div>
        <div class="mb-4">
            <label class="block">Ảnh sản phẩm</label>
            <input type="file" name="image" class="border px-2 py-1 w-full">
        </div>
        <div class="flex gap-4">
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Thêm sản phẩm</button>
            <a href="{{ route('products.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Hủy</a>
        </div>
    </form>
@endsection
