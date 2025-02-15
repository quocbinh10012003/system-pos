<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function index()
{
    $customers = Customer::all();
    return view('customers.index', compact('customers'));
}

public function create()
{
    return view('customers.create');
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
    ]);

    Customer::create($request->all());
    return redirect()->route('customers.index')->with('success', 'Khách hàng đã được thêm!');
}

public function edit(Customer $customer)
{
    return view('customers.edit', compact('customer'));
}

public function update(Request $request, Customer $customer)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
    ]);

    $customer->update($request->all());
    return redirect()->route('customers.index')->with('success', 'Khách hàng đã được cập nhật!');
}

public function destroy(Customer $customer)
{
    $customer->delete();
    return redirect()->route('customers.index')->with('success', 'Khách hàng đã bị xóa!');
}

}
