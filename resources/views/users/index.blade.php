@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold text-gray-700 mb-6">Danh sách khách hàng</h1>
    
    <a href="{{ route('users.create') }}" class="bg-blue-500 text-white px-6 py-2 rounded shadow hover:bg-blue-600">
        + Thêm khách hàng
    </a>

    <table class="w-full mt-6 border border-gray-300 shadow-sm">
        <thead class="bg-gray-700 text-white">
            <tr>
                <th class="px-6 py-3 border text-left">Tên</th>
                <th class="px-6 py-3 border text-left">Email</th>
                <th class="px-6 py-3 border text-center">Hành động</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @foreach($users as $user)
                <tr class="hover:bg-gray-100">
                    <td class="px-6 py-3 border">{{ $user->name }}</td>
                    <td class="px-6 py-3 border">{{ $user->email }}</td>
                    <td class="px-6 py-3 border text-center">
                        <div class="flex justify-center space-x-4">
                            {{-- Nút Sửa --}}
                            <a href="{{ route('users.edit', $user->id) }}" 
                                class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 shadow">
                                Sửa
                            </a>

                            {{-- Nút Xóa --}}
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 shadow">
                                    Xóa
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
