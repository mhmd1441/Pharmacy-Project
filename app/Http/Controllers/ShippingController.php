<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\shipping;
use App\Models\Employees;
use App\Models\OrderShipping;


class ShippingController extends Controller
{
    public function index()
   {

    $shippings = Shipping::with(['getOrders', 'getEmployee', 'getShippingCost'])->get();
    return view('Admin.viewShipping', compact('shippings'));


    }


    public function create()
    {
        $orders = Orders::all();
        $employees = Employees::all();
        return view('Admin.Shipping.createShipping', compact('orders', 'employees'));
    }
    
    
    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'employee_id' => 'required|exists:employees,id',
            'shipping_address' => 'required|string',
            'carrier' => 'required|string',
            'shipped_date' => 'nullable|date',
            'delivery_date' => 'nullable|date|after_or_equal:shipped_date',
            'status' => 'required|in:pending,shipped,delivered',
        ]);

        Shipping::create($request->all());

        return redirect()->route('shipping.index')->with('success', 'تم إضافة سجل الشحن بنجاح.');
    }

    
    public function edit($id)
    {
        $shipping = Shipping::findOrFail($id);
        $orders = Orders::all();
        $employees = Employees::all();
        return view('shippingEdit.editShipping', compact('shipping'));

    }

    
    public function update(Request $request, $id)
   {
    $shipping = Shipping::findOrFail($id);
    $shipping->update($request->only([
        'shipping_status', 'shipping_date', 'actual_shipping_date',
        'actual_arrival_date', 'arrival_date'
    ]));

    return redirect()->route('adminShipping')->with('success', 'Shipping updated successfully!');
   }
   
    public function destroy($id)
    {
        $shipping = Shipping::findOrFail($id);
        $shipping->delete();

        return redirect()->route('shipping.index')->with('success', 'تم حذف سجل الشحن بنجاح.');
    }
}
