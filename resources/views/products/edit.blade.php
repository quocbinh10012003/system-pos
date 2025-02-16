@extends('layouts.app')

@section('title', 'Chỉnh sửa sản phẩm')

@section('content')
    <h1 class="text-2xl font-bold">Chỉnh sửa sản phẩm</h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="mt-4">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block">Tên sản phẩm</label>
            <input type="text" name="name" value="{{ old('name', $product->name) }}" class="border px-2 py-1 w-full">
        </div>

        <div class="mb-4">
            <label class="block">Giá</label>
            <input type="number" name="price" value="{{ old('price', $product->price) }}" class="border px-2 py-1 w-full">
        </div>

        <div class="mb-4">
            <label class="block">Kho</label>
            <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" class="border px-2 py-1 w-full">
        </div>

        <div class="mb-4">
            <label class="block">Hình ảnh sản phẩm</label>
            <input type="file" name="image" class="border px-2 py-1 w-full">

            {{-- Hiển thị ảnh cũ nếu có --}}
            @if ($product->image_url)
                <div class="mt-2">
                    <p class="text-gray-600">Ảnh hiện tại:</p>
                    <img src="{{ $product->image_url }}" alt="Ảnh sản phẩm" class="w-40 h-40 object-cover border">
                </div>
            @endif
        </div>

        <div class="flex gap-4">
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Cập nhật</button>
            <a href="{{ route('products.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Hủy</a>
        </div>
    </form>
@endsection
