<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/products', function () {
//     return view('index');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/', function () {
    return view('index');
});

// Route::resource('products', ProductController::class);

//Lấy tất cả SP -> index
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
//Trả về trang thêm sản phẩm
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
//Thực hiện thêm sản phẩm
Route::post('/products', [ProductController::class, 'store'])->name('products.store'); 

//Hiển Thị theo id:
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
//Sửa theo id
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
//Xóa theo id
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');



// 

Route::resource('users', UserController::class);
Route::resource('orders', OrderController::class);
Route::resource('customers', CustomerController::class);


require __DIR__.'/auth.php';
