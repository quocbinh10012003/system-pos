<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class OrderController extends Controller
{
    public function index()
    {
        // Lấy tất cả đơn hàng cùng với sản phẩm của chúng
        $orders = Order::with('items')->get();
        // Lọc và xóa những đơn hàng không có sản phẩm
        foreach ($orders as $order) {
            if ($order->items->isEmpty()) {
                $order->delete();
            }
        }
        // Lấy lại danh sách đơn hàng sau khi đã xóa các đơn hàng trống
        $orders = Order::with('items')->get();
        return view('orders.index', compact('orders'));
    }


    public function create()
    {
        // Lấy danh sách sản phẩm để hiển thị trong form
        $products = Product::all();
        return view('orders.create', compact('products'));

        // $userId = Auth::id(); 
        // // Tạo đơn hàng
        // $order = Order::create([
        //     'user_id' => $userId, // Tạm thời gán user_id là 1
        //     'customer_name' => $request->customer_name,
        //     'total' => 0, // Tổng tiền sẽ được tính sau
        // ]);
    }

    public function store(Request $request)
    {
        // Validate dữ liệu đầu vào
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'product_id' => 'required|array',
            'product_id.*' => 'exists:products,id',
            'quantity' => 'required|array',
            'quantity.*' => 'nullable|integer|min:0',
        ]);
        $userId = Auth::id(); 
        // Tạo đơn hàng
        $order = Order::create([
            'user_id' => $userId, // Tạm thời gán user_id là 1
            'customer_name' => $request->customer_name,
            'total' => 0, // Tổng tiền sẽ được tính sau
        ]);

        // Thêm các sản phẩm vào đơn hàng và tính toán tổng tiền
        $total = 0;
        foreach ($request->product_id as $index => $productId) {
            $product = Product::find($productId);
            // $quantity = $request->quantity[$index];
            $quantity = isset($request->quantity[$index]) ? (int) $request->quantity[$index] : 0;

            if ($quantity == 0) {
                continue;
            }
            $orderItem = new OrderItem([
                'product_id' => $product->id,
                'product_name' => $product->name,
                'quantity' => $quantity,
                
                'price' => $product->price,
                'total' => $product->price * $quantity,
            ]);

            // Gắn OrderItem với Order
            $order->items()->save($orderItem);

            // Cập nhật tổng tiền đơn hàng
            $total += $orderItem->total;
        }

        // Cập nhật lại tổng tiền đơn hàng
        $order->update(['total' => $total]);

        return redirect()->route('orders.index')->with('success', 'Đơn hàng đã được tạo!');
    }




    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $products = Product::all(); // Danh sách sản phẩm để sửa đơn hàng
        return view('orders.edit', compact('order', 'products'));
    }

    public function update(Request $request, $id)
    {
        // Validate dữ liệu nhập vào
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'items' => 'required|array',
        ]);

        // Tìm đơn hàng cần chỉnh sửa
        $order = Order::findOrFail($id);
        
        // Cập nhật tên khách hàng
        $order->customer_name = $request->customer_name;

        $total = 0; // Biến tổng tiền đơn hàng

        foreach ($request->items as $itemData) {
            $productId = $itemData['product_id'];
            $quantity = $itemData['quantity'];
            $price = $itemData['price'];
            $totalPrice = $quantity * $price;

            // Tìm sản phẩm trong đơn hàng
            $orderItem = OrderItem::where('order_id', $order->id)->where('product_id', $productId)->first();

            if ($orderItem) {
                // Nếu số lượng = 0 -> Xóa sản phẩm khỏi đơn hàng
                if ($quantity == 0) {
                    $orderItem->delete();
                } else {
                    // Cập nhật số lượng & tổng tiền
                    $orderItem->update([
                        'quantity' => $quantity,
                        'total' => $totalPrice,
                    ]);
                }
            } else {
                // Nếu số lượng > 0 thì thêm mới sản phẩm vào OrderItem
                if ($quantity > 0) {
                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $productId,
                        'product_name' => Product::find($productId)->name,
                        'quantity' => $quantity,
                        'price' => $price,
                        'total' => $totalPrice,
                    ]);
                }
            }

            // Cộng tổng tiền vào đơn hàng
            $total += $totalPrice;
        }

        // Cập nhật tổng tiền đơn hàng
        $order->total = $total;
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Đơn hàng đã được cập nhật thành công!');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Đơn hàng đã bị xóa!');
    }
}
