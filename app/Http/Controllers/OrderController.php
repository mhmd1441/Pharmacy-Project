<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cleint;

class OrderController extends Controller
{
    // READ - List all orders

    public function index()
    {
        $orders = Order::with('client')->get();
        return view('orders.index', compact('orders'));
    }

    // CREATE - Show form to create new order

    public function create()
    {
        $clients = Client::all();
        return view('orders.create', compact('clients'));
    }

    // STORE - Save new order

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'order_number' => 'required|unique:orders',
            'order_date' => 'required|date',
            'total_amount' => 'required|numeric|min:0',
        ]);

        Order::create($request->all());

        return redirect()->route('orders.index')->with('success', 'Order Added Successfully.');
    }

    // EDIT - Show edit form

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $clients = Client::all();
        return view('orders.edit', compact('order', 'clients'));
    }

    // UPDATE - Save updated order

    public function update(Request $request, $id)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'order_number' => 'required|unique:orders,order_number,' . $id,
            'order_date' => 'required|date',
            'total_amount' => 'required|numeric|min:0',
        ]);

        $order = Order::findOrFail($id);
        $order->update($request->all());

        return redirect()->route('orders.index')->with('success', 'Order Updated Successfully.');
    }

    // DELETE - Remove order

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Order Deleted Successfully.');
    }
}
