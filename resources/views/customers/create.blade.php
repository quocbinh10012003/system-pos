<form action="{{ route('customers.store') }}" method="POST">
    @csrf
    <div>
        <label>Tên khách hàng</label>
        <input type="text" name="name" required>
    </div>
    <div>
        <label>Email</label>
        <input type="email" name="email" required>
    </div>
    <div>
        <label>Điện thoại</label>
        <input type="text" name="phone" required>
    </div>
    {{-- <button type="submit">Tạo khách hàng</button> --}}
    <div class="flex items-center space-x-4 mt-4">
        <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded-lg shadow hover:bg-green-600 transition">
            Tạo khách hàng
        </button>
        <a href="{{ route('users.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded-lg shadow hover:bg-gray-600 transition">
            Hủy
        </a>
    </div>
</form>
