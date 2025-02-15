@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Danh sách đơn hàng</h1>

    {{-- Nút tạo đơn hàng mới --}}
    <div class="mb-4">
        <a href="{{ route('orders.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            + Tạo đơn hàng mới
        </a>
    </div>

    {{-- Bảng danh sách đơn hàng --}}
    <div class="overflow-x-auto">
        <table class="table-auto w-full border border-gray-300 shadow-md rounded-lg">
            <thead class="bg-gray-700 text-white">
                <tr class="text-center">
                    <th class="border px-4 py-2">Tên khách hàng</th>
                    <th class="border px-4 py-2">Sản phẩm</th>
                    <th class="border px-4 py-2">Số lượng</th>
                    <th class="border px-4 py-2">Giá</th>
                    <th class="border px-4 py-2">Thành tiền</th> {{-- Cột mới --}}
                    <th class="border px-4 py-2">Tổng tiền</th>
                    <th class="border px-4 py-2">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $orderIndex => $order)
                    @php
                        $rowCount = count($order->items);
                        $bgColor = $orderIndex % 2 == 0 ? 'bg-gray-100' : 'bg-white'; // Xen kẽ màu xám
                    @endphp
                    @if ($rowCount > 0)
                        @foreach($order->items as $index => $item)
                            <tr class="{{ $bgColor }} border-b text-center">
                                @if ($index == 0)
                                    <td class="border px-4 py-2 font-semibold" rowspan="{{ $rowCount }}">
                                        {{ $order->customer_name }}
                                    </td>
                                @endif
                                <td class="border px-4 py-2">{{ $item->product_name }}</td>
                                <td class="border px-4 py-2">{{ $item->quantity }}</td>
                                <td class="border px-4 py-2">{{ number_format($item->price, 0, ',', '.') }} VNĐ</td>
                                <td class="border px-4 py-2 font-bold">{{ number_format($item->price * $item->quantity, 0, ',', '.') }} VNĐ</td> {{-- Cột "Thành tiền" --}}
                                @if ($index == 0)
                                    <td class="border px-4 py-2 font-bold" rowspan="{{ $rowCount }}">
                                        {{ number_format($order->total, 0, ',', '.') }} VNĐ
                                    </td>
                                    <td class="border px-4 py-2" rowspan="{{ $rowCount }}">
                                        <a href="{{ route('orders.edit', $order->id) }}" 
                                            class="bg-yellow-500 text-white px-4 py-1 rounded hover:bg-yellow-600 mr-2">
                                            Xem
                                        </a>
                                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                class="bg-red-500 text-white px-4 py-1 rounded hover:bg-red-600 mt-1">
                                                Xóa
                                            </button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <tr class="{{ $bgColor }} border-b text-center">
                            <td class="border px-4 py-2 font-semibold">{{ $order->customer_name }}</td>
                            <td class="border px-4 py-2 text-gray-500 italic" colspan="5">Chưa có sản phẩm</td>
                            <td class="border px-4 py-2">
                                <a href="{{ route('orders.edit', $order->id) }}" 
                                    class="bg-yellow-500 text-white px-4 py-1 rounded hover:bg-yellow-600">
                                    Sửa
                                </a>
                                <form action="{{ route('orders.destroy', $order->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                        class="bg-red-500 text-white px-4 py-1 rounded hover:bg-red-600 mt-1">
                                        Xóa
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
