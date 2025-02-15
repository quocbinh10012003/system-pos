@extends('layouts.app')

@section('content')
    <h1>Chỉnh sửa đơn hàng</h1>
    
    {{-- Form cập nhật đơn hàng --}}
    <form action="{{ route('orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Nhập tên khách hàng --}}
        <div class="mb-4">
            <label for="customer_name" class="block font-bold">Tên khách hàng:</label>
            <input type="text" name="customer_name" id="customer_name" value="{{ $order->customer_name }}" required 
                class="border px-2 py-1 w-full">
        </div>

        {{-- Hiển thị danh sách sản phẩm --}}
        <h2 class="text-lg font-semibold mb-2">Danh sách sản phẩm</h2>
        <table class="table-auto w-full border">
            <thead>
                <tr>
                    <th class="border px-4 py-2">Tên sản phẩm</th>
                    <th class="border px-4 py-2">Giá</th>
                    <th class="border px-4 py-2">Số lượng</th>
                    <th class="border px-4 py-2">Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    @php
                        // Kiểm tra sản phẩm có trong đơn hàng không
                        $orderItem = $order->items->where('product_id', $product->id)->first();
                        $quantity = $orderItem ? $orderItem->quantity : 0;
                    @endphp
                    <tr>
                        <td class="border px-4 py-2">{{ $product->name }}</td>
                        <td class="border px-4 py-2">{{ number_format($product->price, 0, ',', '.') }} VNĐ</td>
                        <td class="border px-4 py-2">
                            <input type="number" name="items[{{ $product->id }}][quantity]" 
                                value="{{ $quantity }}" min="0" class="border px-2 py-1 w-20">
                            <input type="hidden" name="items[{{ $product->id }}][product_id]" value="{{ $product->id }}">
                            <input type="hidden" name="items[{{ $product->id }}][price]" value="{{ $product->price }}">
                        </td>
                        <td class="border px-4 py-2">
                            {{ number_format($product->price * $quantity, 0, ',', '.') }} VNĐ
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Nút cập nhật --}}
        <div class="mt-4">
            <button type="submit" class="bg-green-500 text-white px-4 py-2">Cập nhật đơn hàng</button>
            <a href="{{ route('orders.index') }}" class="bg-gray-500 text-white px-4 py-2">Hủy</a>
        </div>
    </form>
@endsection
