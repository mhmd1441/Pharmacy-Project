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
    $shippings = OrderShipping::with(['order', 'employee'])->get();
    return view('Admin.shipping.ordersShipping', compact('shippings'));
    }




    public function create()
    {
    $orders = Orders::all();
    $employees = Employees::all();
    return view('Admin.shipping.createShipping', compact('orders', 'employees'));
    }


    // تخزين بيانات الشحنة الجديدة
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

    // عرض نموذج تعديل شحنة موجودة
    public function edit($id)
    {
        $shipping = Shipping::findOrFail($id);
        $orders = Order::all();
        $employees = Employee::all();
        return view('shipping.edit', compact('shipping', 'orders', 'employees'));
    }

    // تحديث بيانات الشحنة
    public function update(Request $request, $id)
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

        $shipping = Shipping::findOrFail($id);
        $shipping->update($request->all());

        return redirect()->route('shipping.index')->with('success', 'تم تحديث سجل الشحن بنجاح.');
    }

    // حذف سجل الشحنة
    public function destroy($id)
    {
        $shipping = Shipping::findOrFail($id);
        $shipping->delete();

        return redirect()->route('shipping.index')->with('success', 'تم حذف سجل الشحن بنجاح.');
    }
}