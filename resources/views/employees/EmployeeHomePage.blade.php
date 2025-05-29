<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Dashboard - Medicine Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .medicine-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 1.5rem;
            padding: 1rem 0;
        }

        .medicine-card {
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.2s;
        }

        .medicine-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .medicine-img {
            height: 180px;
            background-color: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .medicine-img img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        .card-body {
            padding: 1.25rem;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
            margin-top: 1rem;
        }

        .search-container {
            margin-bottom: 2rem;
            background: #f8f9fa;
            padding: 1.5rem;
            border-radius: 8px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">Pharmacy Management</a>
            <div class="d-flex">
                <span class="navbar-text text-white me-3">
                    Employee Dashboard
                </span>
                <form action="{{ route('auth.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-light">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container py-4">
        <div class="search-container">
            <h2>Medicine Management</h2>
            <form action="{{ route('employee.medicines.search') }}" method="GET">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="search" placeholder="Search by medicine name..."
                        value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">Search</button>
                    <a href="{{ route('EmployeePage') }}" class="btn btn-outline-secondary">Reset</a>
                </div>
            </form>
            <a href="{{ route('medicines.create') }}" class="btn btn-success">Add New Medicine</a>
        </div>

        <div class="medicine-grid">
            @forelse($medicines as $medicine)
            <div class="medicine-card">
                <div class="medicine-img">
                    @if($medicine->image)
                    <img src="{{ asset('storage/' . $medicine->image) }}" alt="{{ $medicine->medicine_name }}">
                    @else
                    <span class="text-muted">No Image</span>
                    @endif
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $medicine->medicine_name }}</h5>
                    <p class="card-text">
                        <strong>Price:</strong> ${{ number_format($medicine->price, 2) }}<br>
                        <strong>Stock:</strong> {{ $medicine->quantity_in_stock }}<br>
                        <strong>SKU:</strong> {{ $medicine->sku }}
                    </p>
                    <div class="action-buttons">
                        <a href="{{ route('medicines.edit', $medicine->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('EmployeeDeleteMedicine', $medicine->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="alert alert-info">No medicines found</div>
            </div>
            @endforelse
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
