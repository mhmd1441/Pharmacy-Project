<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 2rem;
            background-color: #2c3e50;
            color: white;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .logo img {
            height: 40px;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-weight: 500;
        }

        .nav-links a.active {
            color: #3498db;
        }

        .profile-icon {
            background-color: #3498db;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            margin-left: 1rem;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card-header {
            background-color: #fff;
            border-bottom: 1px solid #eee;
            font-weight: 600;
            border-radius: 10px 10px 0 0 !important;
        }

        .badge {
            font-size: 0.85rem;
            padding: 0.35em 0.65em;
        }

        .img-thumbnail {
            border-radius: 8px;
            border: 1px solid #eee;
        }

        h1 {
            color: #2c3e50;
            font-weight: 700;
        }

        .table {
            margin-bottom: 0;
        }

        .table thead th {
            border-top: none;
            font-weight: 600;
            color: #6c757d;
        }

        .btn-secondary {
            background-color: #6c757d;
            border: none;
            padding: 8px 20px;
            border-radius: 8px;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="logo">
            <img src="{{ asset('Logo.png') }}" alt="Pharmacies Zone Logo">
            <h1>Pharmacies Zone</h1>
        </div>
        <div class="nav-links">
            <a href="{{ route('clientPage') }}">Home</a>
            <a href="{{ route('MedicinesList') }}">Medicines</a>
            <a href="{{ route('pharmacies') }}">Pharmacies</a>
            <a href="{{ route('orders.my') }}" class="btn btn-primary">Orders</a>
            <a href="{{ route('cart.index') }}">
                Cart
                @if(count((array) session('cart')) > 0)
                <span class="badge bg-danger">{{ count((array) session('cart')) }}</span>
                @endif
            </a>
        </div>
        <form action="{{ route('auth.logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-outline-light colored to-blue-800 border to-black">Logout</button>
        </form>
        <div class="profile-icon">Mohamad</div>
    </nav>
    <div class="container py-4">
        <h1 class="mb-4">My Orders</h1>

        @foreach($orders as $order)
        <div class="card mb-4">
            <div class="card-header">
                <h5>Order #{{ $order->id }} - {{ $order->order_date->format('F j, Y') }}</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Order Date:</strong> {{ $order->order_date->format('F j, Y') }}</p>
                        <p><strong>Status:</strong>
                            <span class="badge bg-{{
                        $order->order_status == 'delivered' ? 'success' :
                        ($order->order_status == 'shipped' ? 'primary' :
                        ($order->order_status == 'canceled' ? 'danger' : 'warning'))
                    }}">
                                {{ ucfirst($order->order_status) }}
                            </span>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Total Amount:</strong> ${{ number_format($order->total_amount, 2) }}</p>
                        @if($order->shipping)
                        <p><strong>Shipping Method:</strong> {{ $order->shipping->method }}</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="card-header">
                <h5>Order Medicines</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Medicine</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->medicines as $medicine)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        @if($medicine->image)
                                        <img src="{{ asset('storage/' . $medicine->image) }}" width="60" class="img-thumbnail me-3" alt="{{ $medicine->medicine_name }}">
                                        @else
                                        <img src="https://via.placeholder.com/60" width="60" class="img-thumbnail me-3" alt="Medicine Image">
                                        @endif
                                        <div>
                                            <h6 class="mb-0">{{ $medicine->medicine_name }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>${{ number_format($medicine->pivot->price, 2) }}</td>
                                <td>{{ $medicine->pivot->quantity }}</td>
                                <td>${{ number_format($medicine->pivot->price * $medicine->pivot->quantity, 2) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endforeach

        <div class="mt-4">
            <a href="{{ route('clientPage') }}" class="btn btn-secondary">Back to Home Page</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>