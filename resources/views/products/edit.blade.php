@extends('layouts.app')

@section('title', 'Chỉnh sửa sản phẩm')

@section('content')
    <h1 class="text-2xl font-bold">Chỉnh sửa sản phẩm</h1>
    <form action="{{ route('products.update', $product->id) }}" method="POST" class="mt-4">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block">Tên sản phẩm</label>
            <input type="text" name="name" value="{{ $product->name }}" class="border px-2 py-1 w-full">
        </div>
        <div class="mb-4">
            <label class="block">Giá</label>
            <input type="number" name="price" value="{{ $product->price }}" class="border px-2 py-1 w-full">
        </div>
        <div class="mb-4">
            <label class="block">Kho</label>
            <input type="number" name="stock" value="{{ $product->stock }}" class="border px-2 py-1 w-full">
        </div>
        {{-- <button class="bg-green-500 text-white px-4 py-2">Cập nhật</button> --}}
        <div class="flex gap-4">
            <button class="bg-green-500 text-white px-4 py-2 rounded">Cập nhật</button>
            <a href="{{ route('products.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Hủy</a>
        </div>
    </form>
@endsection
