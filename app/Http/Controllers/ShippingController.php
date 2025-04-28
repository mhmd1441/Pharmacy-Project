<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\shipping;

class ShippingController extends Controller
{
    // Read - List all shipping details

    public function index()
    {
        $shippings = shipping::with('order')->get();
        return view('shipping.index', compact('shippings'));
    }

    // Create - show form to create new shipping detais

    public function creare()
    {
        $orders = Order::all();
        return view('shippings.create', compact('orders'));
    }

    // Store - Save new shipping details 

    public function store (Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'shipping_address' => 'required|string',
            'carrier' => 'required|string',
            'shipped_date' => 'nullable|date',
            'delivery_date' => 'nullable|date|after_or_equal:shipped_date',
            'status' => 'required|in:pending,shipped,delivered',
        ]);
        Shipping::create($request->all());

        return redirect()->route('shippings.index')->with('success', 'Shipping Record Added Successfully.');
    }

    // EDIT - Show form to edit shipping

    public function edit($id)
    {
        $shipping = Shipping::findOrFail($id);
        $orders = Order::all();
        return view('shippings.edit', compact('shipping', 'orders'));
    }

    // UPDATE - Save updated shipping

    public function update(Request $request, $id)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'shipping_address' => 'required|string',
            'carrier' => 'required|string',
            'shipped_date' => 'nullable|date',
            'delivery_date' => 'nullable|date|after_or_equal:shipped_date',
            'status' => 'required|in:pending,shipped,delivered',
        ]);

        $shipping = Shipping::findOrFail($id);
        $shipping->update($request->all());

        return redirect()->route('shippings.index')->with('success', 'Shipping Record Updated Successfully.');
    }

    // DELETE - Delete shipping record

    public function destroy($id)
    {
        $shipping = Shipping::findOrFail($id);
        $shipping->delete();

        return redirect()->route('shippings.index')->with('success', 'Shipping Record Deleted Successfully.');
    }
}
