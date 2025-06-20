<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentDetails;
use App\Models\Orders;

class PaymentDetailsController extends Controller
{
    // READ - List all payment details

    public function index()
    {
        $payments = PaymentDetails::with('order')->get();
        return view('payment_details.index', compact('payments'));
    }

    // CREATE - Show form

    public function create()
    {
        $orders = Orders::all();
        return view('payment_details.create', compact('orders'));
    }

    // STORE - Save new payment

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'payment_method' => 'required|string|max:255',
            'amount_paid' => 'required|numeric|min:0',
            'payment_date' => 'required|date',
        ]);

        PaymentDetails::create($request->all());

        return redirect()->route('payment_details.index')->with('success', 'Payment Recorded Successfully.');
    }

    // EDIT - Show form

    public function edit($id)
    {
        $payment = PaymentDetails::findOrFail($id);
        $orders = Orders::all();
        return view('payment_details.edit', compact('payment', 'orders'));
    }

    // UPDATE - Save updated payment

    public function update(Request $request, $id)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'payment_method' => 'required|string|max:255',
            'amount_paid' => 'required|numeric|min:0',
            'payment_date' => 'required|date',
        ]);

        $payment = PaymentDetails::findOrFail($id);
        $payment->update($request->all());

        return redirect()->route('payment_details.index')->with('success', 'Payment Updated Successfully.');
    }

    // DELETE - Delete payment

    public function destroy($id)
    {
        $payment = PaymentDetails::findOrFail($id);
        $payment->delete();

        return redirect()->route('payment_details.index')->with('success', 'Payment Deleted Successfully.');
    }
}
