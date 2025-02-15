<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductApiController extends Controller
{
    // Lấy danh sách sản phẩm
    public function index()
    {
        return response()->json(Product::all(), Response::HTTP_OK);
    }

    // Thêm sản phẩm mới
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0'
        ]);

        $product = Product::create($validatedData);
        return response()->json($product, Response::HTTP_CREATED);
    }

    // Lấy chi tiết một sản phẩm
    public function show($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Sản phẩm không tồn tại'], Response::HTTP_NOT_FOUND);
        }
        return response()->json($product, Response::HTTP_OK);
    }

    // Cập nhật sản phẩm
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Sản phẩm không tồn tại'], Response::HTTP_NOT_FOUND);
        }

        $validatedData = $request->validate([
            'name' => 'sometimes|string|max:255',
            'price' => 'sometimes|numeric|min:0',
            'stock' => 'sometimes|integer|min:0'
        ]);

        $product->update($validatedData);
        return response()->json($product, Response::HTTP_OK);
    }

    // Xóa sản phẩm
    public function destroy($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Sản phẩm không tồn tại'], Response::HTTP_NOT_FOUND);
        }

        $product->delete();
        return response()->json(['message' => 'Sản phẩm đã bị xóa'], Response::HTTP_OK);
    }
}
