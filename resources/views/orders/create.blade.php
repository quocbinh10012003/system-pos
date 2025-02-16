@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-xl font-semibold">Tạo đơn hàng mới</h1>

        <form action="{{ route('orders.store') }}" method="POST" class="mt-4">
            @csrf

            <div class="mb-4">
                <label for="customer_name" class="block">Tên khách hàng</label>
                <input type="text" name="customer_name" id="customer_name" class="border px-2 py-1 w-full" value="{{ old('customer_name') }}" required>
            </div>

            <h3 class="text-lg font-semibold">Danh sách sản phẩm</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                @foreach($products as $product)
                    <div class="border p-4 rounded-md">
                        <div><strong>{{ $product->name }}</strong></div>
                        <div>Giá: {{ number_format($product->price, 0, ',', '.') }} VNĐ</div>
                        <div>
                            <label for="quantity_{{ $product->id }}" class="block mt-2">Số lượng</label>
                            <input type="number" name="quantity[]" id="quantity_{{ $product->id }}" class="border px-2 py-1 w-full" value="{{ old('quantity.' . $product->id) }}" min="1" required>
                        </div>
                        <input type="hidden" name="product_id[]" value="{{ $product->id }}">
                    </div>
                @endforeach
            </div>

            
            <!-- Nút Lưu & Hủy -->
            <div class="flex items-center space-x-4 mt-4">
                <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded-lg shadow hover:bg-green-600 transition">
                    Tạo đơn hàng
                </button>
                <a href="{{ route('orders.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded-lg shadow hover:bg-gray-600 transition">
                    Hủy
                </a>
            </div>
        </form>
    </div>
@endsection
