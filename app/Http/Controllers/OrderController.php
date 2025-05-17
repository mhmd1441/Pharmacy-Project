<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;
// use App\Models\Order;
use App\Models\Cleint;

class OrderController extends Controller
{
    // READ - List all orders
    public function index()
    {
        $orders = Orders::with('client')->get();
        return view('Admin.viewOrders', compact('orders'));
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

        Orders::create($request->all());

        return redirect()->route('orders.index')->with('success', 'Order added successfully.');
    }

    // EDIT - Show edit form
    public function edit($id)
    {
        $order = Orders::findOrFail($id);
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

        $order = Orders::findOrFail($id);
        $order->update($request->all());

        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }

    // DELETE - Remove order
    public function destroy($id)
    {
        $order = Orders::findOrFail($id);
        $order->delete();

        return redirect()->route('Admin.viewOrders')->with('success', 'Order deleted successfully.');
    }

   public function filterAndSearch(Request $request)
   {
    $query = Orders::query();

    if ($request->filled('search')) {
        $query->where('customer_name', 'like', '%' . $request->search . '%')
              ->orWhere('order_number', 'like', '%' . $request->search . '%');
    }

    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    
    $orders = $query->paginate(10);

  
    $orders->appends($request->all());

    return view('Admin.viewOrders', compact('orders'));
   }



}
