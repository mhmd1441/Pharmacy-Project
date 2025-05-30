<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Shipping</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background-color: #f7f7f7; }
        h1 { color: #333; }
        form { background-color: #fff; padding: 20px; border-radius: 8px; max-width: 600px; margin: auto; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        label { display: block; margin-top: 15px; font-weight: bold; }
        input[type="text"], input[type="date"], select {
            width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ccc; border-radius: 4px;
            font-size: 14px; background-color: #fff;
        }
        button {
            margin-top: 20px; padding: 10px 20px; background-color: #007BFF; color: white;
            border: none; border-radius: 4px; cursor: pointer;
        }
        a {
            display: inline-block; margin-top: 20px; color: #007BFF; text-decoration: none;
        }
    </style>
</head>
<body>

<h1>Edit Shipping Record</h1>

<form method="POST" action="{{ route('shippings.update', $shipping->id) }}">
    @csrf
    @method('PUT')

    <label for="shipping_status">Shipping Status</label>
    <select id="shipping_status" name="shipping_status" required>
        <option value="pending" {{ $shipping->shipping_status == 'pending' ? 'selected' : '' }}>Pending</option>
        <option value="delayed" {{ $shipping->shipping_status == 'delayed' ? 'selected' : '' }}>Delayed</option>
        <option value="shipped" {{ $shipping->shipping_status == 'shipped' ? 'selected' : '' }}>Shipped</option>
    </select>

    <label for="shipping_date">Shipping Date</label>
    <input type="date" id="shipping_date" name="shipping_date" value="{{ $shipping->shipping_date }}" required>

    <label for="actual_shipping_date">Actual Shipping Date</label>
    <input type="date" id="actual_shipping_date" name="actual_shipping_date" value="{{ $shipping->actual_shipping_date }}">

    <label for="arrival_date">Arrival Date</label>
    <input type="date" id="arrival_date" name="arrival_date" value="{{ $shipping->arrival_date }}">

    <label for="actual_arrival_date">Actual Arrival Date</label>
    <input type="date" id="actual_arrival_date" name="actual_arrival_date" value="{{ $shipping->actual_arrival_date }}">

    <button type="submit">Update Shipping</button>
</form>

<a href="{{ route('adminShipping') }}">← Back to Shipping List</a>

</body>
</html>
