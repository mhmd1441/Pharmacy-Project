<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Shipping List</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background-color: #f9f9f9; }
        h1 { color: #333; }
        table { width: 100%; border-collapse: collapse; background-color: white; }
        th, td { padding: 12px; border: 1px solid #ccc; text-align: left; }
        th { background-color: #007BFF; color: white; }
        tr:hover { background-color: #f1f1f1; }
    </style>
</head>
<body>

<h1>Shipping List</h1>
<a href="{{ url('/admin') }}" style="display:inline-block; margin-bottom: 20px; padding: 10px 15px; background-color: #007BFF; color: white; text-decoration: none; border-radius: 5px;"> Back To Admin Dashboard </a>

@if ($shippings->count() > 0)
   <table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Shipping Status</th>
            <th>Shipping Date</th>
            <th>Actual Shipping Date</th>
            <th>Actual Arrival Date</th>
            <th>Arrival Date</th>
            <th>Employee</th>
            <th>Orders</th>
            <th>Shipping Cost</th>
            <th>Actions</th> <!-- عمود جديد -->
        </tr>
    </thead>
    <tbody>
        @foreach ($shippings as $shipping)
            <tr>
                <td>{{ $shipping->id }}</td>
                <td>{{ ucfirst($shipping->shipping_status) }}</td>
                <td>{{ $shipping->shipping_date }}</td>
                <td>{{ $shipping->actual_shipping_date }}</td>
                <td>{{ $shipping->actual_arrival_date }}</td>
                <td>{{ $shipping->arrival_date ?? 'N/A' }}</td>
                <td>{{ $shipping->getEmployee ? $shipping->getEmployee->first_name . ' ' . $shipping->getEmployee->last_name : 'No Employee' }}</td>
                <td>
                    @if($shipping->getOrders && $shipping->getOrders->count() > 0)
                        <ul>
                            @foreach ($shipping->getOrders as $order)
                                <li>Order #{{ $order->id }}</li>
                            @endforeach
                        </ul>
                    @else
                        No Orders
                    @endif
                </td>
                <td>{{ $shipping->getShippingCost ? $shipping->getShippingCost->cost : 'No Cost Info' }}</td>
                <td>
                    <!-- زر تعديل -->
                    <a href="{{ route('shippings.edit', $shipping->id) }}" style="color: white; background-color: #28a745; padding: 5px 10px; border-radius: 4px; text-decoration: none;">Edit</a>

                    <!-- زر حذف -->
                    <form action="{{ route('shippings.destroy', $shipping->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('هل أنت متأكد من الحذف؟');" style="background-color: #dc3545; color: white; padding: 5px 10px; border: none; border-radius: 4px;">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@else
    <p>No shipping records found.</p>
@endif

</body>
</html>
