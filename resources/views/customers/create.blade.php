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
    <button type="submit">Tạo khách hàng</button>
</form>
