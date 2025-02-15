@extends('layouts.app')

@section('title', 'Danh sách sản phẩm')

@section('content')
    <h1 class="text-2xl font-bold">Danh sách sản phẩm</h1>
    <br>
    <a href="{{ route('products.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Thêm Sản Phẩm</a>

    <table class="table-auto w-full mt-4 border border-gray-300 shadow-md">
        <thead class="bg-gray-700 text-white">
            <tr>
                <th class="border px-4 py-2">Tên</th>
                <th class="border px-4 py-2">Giá</th>
                <th class="border px-4 py-2">Kho</th>
                <th class="border px-4 py-2">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr class="odd:bg-gray-100">  {{-- Thêm lớp này để có sọc xám --}}
                    <td class="border px-4 py-2">{{ $product->name }}</td>
                    <td class="border px-4 py-2">{{ $product->price }}</td>
                    <td class="border px-4 py-2">{{ $product->stock }}</td>
                    <td class="border px-4 py-2 text-center">
                        <div class="flex justify-center space-x-2">
                            {{-- Edit --}}
                            <a href="{{ route('products.edit', $product->id) }}" 
                                class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Sửa</a>
                    
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                    class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Xóa</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
