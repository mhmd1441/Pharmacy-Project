

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Add New Shipping</h2>

  
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('shipping.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="order_id">Number of Order</label>
            <select name="order_id" id="order_id" class="form-control" required>
                <option value="">Choose the Order</option>
                @foreach ($orders as $order)
                    <option value="{{ $order->id }}">{{ $order->order_number }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="employee_id">Employee Name</label>
            <select name="employee_id" id="employee_id" class="form-control" required>
                <option value="">Employee Name</option>
                @foreach ($employees as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="shipping_date">Shipping Date</label>
            <input type="date" name="shipping_date" id="shipping_date" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="tracking_number">Tracking Number</label>
            <input type="text" name="tracking_number" id="tracking_number" class="form-control" required>
        </div>

        <div class="form-group mb-4">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="processing">processing</option>
                <option value="shipped">Shipped</option>
                <option value="delivered">Delivered</option>
                <option value="concelled">Concelled</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
