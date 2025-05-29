<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Medicines | Pharmacies Zone</title>
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

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f7fa;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 20px;
        }

        .page-title {
            text-align: center;
            margin-bottom: 2rem;
            color: #2a7fba;
        }

        .medicines-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1.5rem;
        }

        .medicine-card {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .medicine-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .medicine-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .medicine-details {
            padding: 1.2rem;
        }

        .medicine-name {
            font-size: 1.1rem;
            margin: 0 0 0.5rem 0;
            color: #2c3e50;
        }

        .medicine-manufacturer {
            color: #7f8c8d;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .medicine-price {
            font-size: 1.2rem;
            font-weight: bold;
            color: #27ae60;
            margin: 0.5rem 0;
        }

        .medicine-actions {
            display: flex;
            gap: 0.8rem;
            margin-top: 1rem;
        }

        .btn {
            padding: 0.5rem 1rem;
            border-radius: 4px;
            font-weight: 500;
            cursor: pointer;
            border: none;
            transition: all 0.2s ease;
            flex: 1;
            text-align: center;
        }

        .btn-primary {
            background-color: #2a7fba;
            color: white;
        }

        .btn-primary:hover {
            background-color: #1e6fa1;
        }

        .btn-outline {
            background: transparent;
            border: 1px solid #2a7fba;
            color: #2a7fba;
        }

        .btn-outline:hover {
            background: #2a7fba;
            color: white;
        }

        .placeholder-image {
            background-color: #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #999;
            height: 200px;
        }

        @media (max-width: 768px) {
            .medicines-grid {
                grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            }

            .navbar {
                padding: 1rem;
            }

            .nav-links {
                gap: 1rem;
            }
        }

        @media (max-width: 480px) {
            .medicines-grid {
                grid-template-columns: 1fr;
            }

            .logo h1 {
                font-size: 1.2rem;
            }
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
            <a href="{{ route('MedicinesList') }}" class="btn btn-primary">Medicines</a>
            <a href="{{ route('pharmacies') }}">Pharmacies</a>
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

    <div class="container">
        <h1 class="page-title">All Medicines</h1>

        <div class="medicines-grid">
            @foreach($medicines as $medicine)
            <div class="medicine-card">
                @if($medicine->image)
                <img src="{{ asset('storage/' . $medicine->image) }}" alt="{{ $medicine->medicine_name }}" class="medicine-image">
                @else
                <div class="placeholder-image">No Image Available</div>
                @endif
                <div class="medicine-details">
                    <h3 class="medicine-name">{{ $medicine->medicine_name }}</h3>
                    <p class="medicine-manufacturer">{{ $medicine->manufacturer }}</p>
                    <div class="medicine-price">${{ number_format($medicine->price, 2) }}</div>
                    <p class="medicine-desc">{{ Str::limit($medicine->description, 100) }}</p>
                    <div class="medicine-actions">
                        <button class="btn btn-primary">Add to Cart</button>
                        <button class="btn btn-outline">Details</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>

</html>