<?php

namespace App\Http\Controllers;

use App\Models\Medicines;
use App\Models\Order_medicine;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    public function cart()
    {
        $cart = session()->get('cart', []);
        return view('order.myCart', compact('cart'));
    }

    // Add item to cart
    public function addToCart($id)
    {
        $medicine = Medicines::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $medicine->medicine_name,
                "quantity" => 1,
                "price" => $medicine->price,
                "image" => $medicine->image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Medicine added to cart!');
    }

    // Update cart item quantity
    public function updateCart(Request $request)
    {
        if ($request->id && $request->quantity) {
            $medicine = Medicines::find($request->id);

            if (!$medicine) {
                return redirect()->back()->with('error', 'Medicine not found');
            }

            if ($medicine->quantity < $request->quantity) {
                return redirect()->back()->with(
                    'error',
                    "Only {$medicine->quantity} available in stock"
                );
            }

            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Cart updated successfully');
        }

        return redirect()->back()->with('error', 'Invalid request');
    }

    // Remove item from cart
    public function removeFromCart($id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Medicine removed from cart');
    }

    // Checkout and create order
    public function checkout(Request $request)
    {
        // Check authentication
        if (!Auth::check()) {
            return redirect()->route('auth.login')->with('error', 'Please login to checkout');
        }

        // Get cart from session
        $cart = session()->get('cart', []);

        // Check if cart is empty
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty');
        }

        // Calculate total
        $total = array_reduce($cart, function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);

        // Create order
        $order = Orders::create([
            'order_date' => now(),
            'total_amount' => $total,
            'order_status' => 'pending',
            'client_id' => Auth::id()
        ]);

        // Add order items
        foreach ($cart as $id => $item) {
            Order_medicine::create([
                'order_id' => $order->id,
                'medicine_id' => $id,
                'quantity' => $item['quantity'],
                'price' => $item['price']
            ]);

            // Update medicine stock
            Medicines::where('id', $id)->decrement('quantity', $item['quantity']);
        }

        // Clear cart
        session()->forget('cart');

        return redirect()->route('orders.my')->with('success', 'Order placed successfully!');
    }

    // View customer's order
    public function myOrders()
    {
        $orders = Orders::with(['items.medicine'])
            ->where('client_id', Auth::id())
            ->orderBy('order_date', 'desc')
            ->get();


        return view('order.OrderHomePage', compact('orders'));
    }
}
