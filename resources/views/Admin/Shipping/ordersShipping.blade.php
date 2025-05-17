

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Shipping Orders</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Order Number</th>
                <th>Employee Name</th>
                <th>Shipping Date</th>
                <th>Tracking Number</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($shippings as $shipping)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $shipping->order->order_number ?? 'N/A' }}</td>
                    <td>{{ $shipping->employee->name ?? 'N/A' }}</td>
                    <td>{{ $shipping->shipping_date }}</td>
                    <td>{{ $shipping->tracking_number }}</td>
                    <td>{{ ucfirst($shipping->status) }}</td>
                    <td>
                        <a href="{{ route('shipping.edit', $shipping->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('shipping.destroy', $shipping->id) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="7">No shipping records found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
