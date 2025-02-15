@foreach($customers as $customer)
    <tr>
        <td>{{ $customer->name }}</td>
        <td>{{ $customer->email }}</td>
        <td>{{ $customer->phone }}</td>
        <td>
            <a href="{{ route('customers.edit', $customer->id) }}" class="bg-yellow-500 text-white px-2 py-1">Sửa</a>
            <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-2 py-1">Xóa</button>
            </form>
        </td>
    </tr>
@endforeach
