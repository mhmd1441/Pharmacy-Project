<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {}
    public function create()
    {


        return view('order/createOrder');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_date' => 'required|date',
            'total_amount' => 'required|numeric|min:0',
            'order_status' => 'required|in:pending,shipped,delivered,canceled',
            'client_id' => 'required|exists:clients,id'
        ]);
        $order = new Orders();
        $order->order_date = $validated['order_date'];
        $order->total_amount = $validated['total_amount'];
        $order->order_status = $validated['order_status'];
        $order->client_id = $validated['client_id'];
        $order->save();
        return redirect()->route("dashboard")->with('success', 'Order created successfully!');
    }
    public function show()
    {
        $orders = Orders::all();
        return view('Admin.viewOrders', ['orders' => $orders]);
    }
    public function edit($id)
    {
        $order = Orders::findOrFail($id);
        return view('order.editOrder', compact('order'));
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'order_date' => 'required|date',
            'total_amount' => 'required|numeric|min:0',
            'order_status' => 'required|in:pending,shipped,delivered,canceled',
            'client_id' => 'required|exists:clients,id'
        ]);
        $order = Orders::findOrFail($id);
        $order->update($validated);
        return redirect()->route('adminOrder')->with('success', 'Order updated successfully!');
    }
    public function destroy($id)
    {
        $order = Orders::find($id);
        if (!$order) {
            return redirect()->route('adminOrder')->with('error', 'Order not found!');
        }
        $order->delete();
        return redirect()->route('adminOrder')->with('success', 'Order deleted successfully!');
    }
    public function showDescription($id)
    {
        $order = Orders::findOrFail($id);
        return view('order-description', compact('order'));
    }
    public function filterAndSearch(Request $request)
    {
        $query = Orders::query();
        if ($request->has('client_id') && !empty($request->client_id)) {
            $query->where('client_id', 'like', '%' . $request->client_id . '%');
        }
        if ($request->has('status') && !empty($request->status)) {
            $query->where('order_status', $request->status);
        }
        if ($request->has('from_date') && !empty($request->from_date)) {
            $query->where('order_date', '>=', $request->from_date);
        }
        if ($request->has('to_date') && !empty($request->to_date)) {
            $query->where('order_date', '<=', $request->to_date);
        }
        $orders = $query->paginate(10);
        return view('Admin.viewOrders', compact('orders'));
    }
}
