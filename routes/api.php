<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProductApiController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//xác thực đăng nhập 
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
    
});

Route::apiResource('products', ProductApiController::class); // tự động tạo các rout ở dưới
// Route::prefix('products')->group(function () {
//     Route::get('/', [ProductApiController::class, 'index']);   // Lấy danh sách sản phẩm
//     Route::post('/', [ProductApiController::class, 'store']);  // Thêm sản phẩm mới

//     Route::get('/{id}', [ProductApiController::class, 'show']); // Lấy chi tiết sản phẩm
//     Route::put('/{id}', [ProductApiController::class, 'update']); // Cập nhật sản phẩm
//     Route::delete('/{id}', [ProductApiController::class, 'destroy']); // Xóa sản phẩm
// });


