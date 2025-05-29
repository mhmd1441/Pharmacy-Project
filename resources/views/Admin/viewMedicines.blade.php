
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Medicines List - Pharmacies Zone</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <style>
        :root {
            --primary: #4a90e2;
            --primary-dark: #357abd;
            --secondary: #6c757d;
            --success: #28a745;
            --danger: #dc3545;
            --light: #f8f9fa;
            --dark: #343a40;
            --sidebar-bg: #2c3e50;
            --sidebar-active: #34495e;
            --pharma-green: #2ecc71;
            --pharma-blue: #3498db;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            min-height: 100vh;
            background-color: #f5f7fa;
            color: #333;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 250px;
            background-color: var(--sidebar-bg);
            color: white;
            height: 100vh;
            position: fixed;
            transition: all 0.3s;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar-header {
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .sidebar-header h3 {
            color: white;
            font-size: 1.3rem;
        }

        .sidebar-menu {
            padding: 20px 0;
        }

        .sidebar-menu ul {
            list-style: none;
        }

        .sidebar-menu li {
            margin-bottom: 5px;
        }

        .sidebar-menu a {
            display: block;
            padding: 12px 20px;
            color: #ecf0f1;
            text-decoration: none;
            transition: all 0.3s;
            font-size: 0.95rem;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background-color: var(--sidebar-active);
            border-left: 4px solid var(--pharma-green);
        }

        .sidebar-menu i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        /* Main Content Styles */
        .main-content {
            flex: 1;
            margin-left: 250px;
            padding: 20px;
            transition: all 0.3s;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            background-color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .header h2 {
            color: var(--dark);
        }

        .user-menu {
            display: flex;
            align-items: center;
        }

        .user-menu img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        /* Medicines Table Styles (from your original) */
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
        }

        th,
        td {
            padding: 12px;
            border: 1px solid #ccc;
            text-align: left;
        }

        th {
            background-color: #007BFF;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        a.btn,
        button.btn {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
        }

        a.btn-primary {
            background-color: #28a745;
            color: white;
        }

        button.btn-danger {
            background-color: #dc3545;
            color: white;
        }

        a.back-btn {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 15px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 80px;
                overflow: hidden;
            }

            .sidebar-header h3,
            .sidebar-menu a span {
                display: none;
            }

            .sidebar-menu a {
                text-align: center;
                padding: 15px 10px;
            }

            .sidebar-menu i {
                margin-right: 0;
                font-size: 1.2rem;
            }

            .main-content {
                margin-left: 80px;
            }
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <h3>Pharmacies Zone</h3>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li><a href="{{ route('adminDashboard') }}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
                <li><a href="{{ route('adminClient') }}"><i class="fas fa-users"></i> <span>Clients</span></a></li>
                <li><a href="{{ route('adminEmployees') }}"><i class="fas fa-user-tie"></i> <span>Employees</span></a></li>
                <li><a href="{{ route('adminOrder') }}"><i class="fas fa-shopping-cart"></i> <span>Orders</span></a></li>
                <li><a href="{{ route('adminShipping') }}"><i class="fas fa-truck"></i> <span>Shipping</span></a></li>
                <li><a href="{{ route('orderShipping.index') }}"><i class="fas fa-box"></i> <span>Order Shipping</span></a></li>
                <li><a href="{{ route('admin.medicines') }}" class="active"><i class="fas fa-pills"></i> <span>Medicines</span></a></li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <div class="header">
            <h2>Medicines List</h2>
            <div class="user-menu">
                <img src="https://via.placeholder.com/40" alt="Admin" />
                <span>Admin User</span>
            </div>
        </div>

        {{-- نموذج البحث والتصفية --}}
        <form action="{{ route('admin.medicines') }}" method="GET" style="margin-bottom: 20px; display: flex; gap: 10px; align-items: center;">
            <input 
                type="text" 
                name="name" 
                placeholder="Search by Medicine Name" 
                value="{{ request('name') }}" 
                style="padding: 5px; flex: 1;"
            >
            <input 
                type="date" 
                name="expiry_date" 
                value="{{ request('expiry_date') }}" 
                style="padding: 5px;"
            >
            <button type="submit" style="padding: 6px 12px; background-color: #007bff; color: white; border: none; cursor: pointer;">
                Search
            </button>
            <a href="{{ route('admin.medicines') }}" style="padding: 6px 12px; background-color: #6c757d; color: white; text-decoration: none; border-radius: 3px;">
                Reset
            </a>
        </form>

        <div style="margin-bottom: 10px;">
        <strong>Total Medicines:</strong> {{ $totalMedicines }}
        </div>


        @if ($medicines->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Medicine Name</th>
                    <th>SKU</th>
                    <th>Manufacturer</th>
                    <th>Price</th>
                    <th>Inventory ID</th>
                    <th>Expiry Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($medicines as $medicine)
                <tr>
                    <td>{{ $medicine->id }}</td>
                    <td>{{ $medicine->medicine_name }}</td>
                    <td>{{ $medicine->sku }}</td>
                    <td>{{ $medicine->manufacturer }}</td>
                    <td>{{ $medicine->price }}</td>
                    <td>{{ $medicine->inventory_id }}</td>
                    <td>{{ $medicine->expiry_date }}</td>
                    <td>
                        <a href="{{ route('medicines.edit', $medicine->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('medicines.destroy', $medicine->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are sure you want to delete this Medicine ? ')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p>No medicines found.</p>
        @endif
    </div>
</body>

</html>
