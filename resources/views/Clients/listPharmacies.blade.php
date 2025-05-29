<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacies Zone - Pharmacies List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
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

        .pharmacy-card {
            margin-bottom: 20px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .pharmacy-card:hover {
            transform: translateY(-5px);
        }

        .pharmacy-image {
            height: 200px;
            object-fit: cover;
        }

        .delivery-info {
            background-color: #f8f9fa;
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
        }

        .badge {
            font-size: 0.7rem;
            vertical-align: top;
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
            <a href="{{ route('pharmacies') }}" class="btn btn-primary">Pharmacies</a>
            <a href="{{ route('orders.my') }}">Orders</a>
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

    <div class="container mt-5">
        <h2 class="mb-4">Available Pharmacies</h2>

        <div class="row">
            @foreach($pharmacies as $pharmacy)
            <div class="col-md-4">
                <div class="pharmacy-card">
                    <img src="{{ $pharmacy->cover_image_url ?? 'https://via.placeholder.com/400x200?text=Pharmacy' }}"
                        class="card-img-top pharmacy-image"
                        alt="{{ $pharmacy->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $pharmacy->name }}</h5>
                        <p class="card-text text-muted">
                            <i class="bi bi-geo-alt"></i> {{ $pharmacy->address }}, {{ $pharmacy->city }}, {{ $pharmacy->state }}
                        </p>
                        <p class="card-text">
                            @if($pharmacy->is_24_hours)
                            <span class="badge bg-success">24/7 Open</span>
                            @else
                            <span class="badge bg-primary">Open Today</span>
                            @endif

                            @if($pharmacy->has_emergency_services)
                            <span class="badge bg-danger">Emergency Services</span>
                            @endif
                        </p>

                        <div class="delivery-info">
                            <p>
                                <strong>Delivery:</strong>
                                @if($pharmacy->is_delivery_available)
                                <span class="text-success">Available</span>
                                @else
                                <span class="text-danger">Not Available</span>
                                @endif
                            </p>
                            <p><strong>Fee:</strong> ${{ number_format($pharmacy->delivery_fee, 2) }}</p>
                            <p><strong>Min Order:</strong> ${{ number_format($pharmacy->min_order_amount, 2) }}</p>
                            <a href="{{ route('pharmacies.show', $pharmacy->id) }}" class="btn btn-primary">View Pharmacy</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>