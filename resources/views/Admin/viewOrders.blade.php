<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders Management | Pharmacies Zone</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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

        /* Sidebar Styles - Keep existing */
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

        /* Orders Content */
        .orders-content {
            background-color: white;
            border-radius: 8px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .orders-title {
            margin-bottom: 25px;
            color: var(--dark);
            font-size: 1.5rem;
        }

        /* Search and Filter Section */
        .search-filters {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 25px;
        }

        .search-group {
            flex: 1;
            min-width: 200px;
        }

        .filter-group {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .search-input {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 0.95rem;
        }

        .date-filter {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .date-input {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .filter-btn {
            padding: 10px 15px;
            background-color: var(--pharma-blue);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .filter-btn:hover {
            background-color: var(--primary-dark);
        }

        /* Table Styles */
        .table-container {
            overflow-x: auto;
        }

        .orders-table {
            width: 100%;
            border-collapse: collapse;
        }

        .orders-table th,
        .orders-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
        }

        .orders-table th {
            background-color: #f8f9fa;
            color: var(--dark);
            font-weight: 600;
        }

        .orders-table tr:hover {
            background-color: #f8f9fa;
        }

        /* Status Badges */
        .status-badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
            display: inline-block;
        }

        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }

        .status-shipped {
            background-color: #cce5ff;
            color: #004085;
        }

        .status-delivered {
            background-color: #d4edda;
            color: #155724;
        }

        .status-canceled {
            background-color: #f8d7da;
            color: #721c24;
        }

        /* Action Buttons */
        .action-btns {
            display: flex;
            gap: 8px;
        }

        .btn {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            font-size: 0.85rem;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
        }

        .btn-edit {
            background-color: var(--primary);
            color: white;
        }

        .btn-edit:hover {
            background-color: var(--primary-dark);
        }

        .btn-delete {
            background-color: var(--danger);
            color: white;
        }

        .btn-delete:hover {
            background-color: #c0392b;
        }

        .btn i {
            margin-right: 5px;
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

            .search-filters {
                flex-direction: column;
            }

            .date-filter {
                flex-direction: column;
                align-items: flex-start;
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
                <li><a href="{{ route('admin.medicines') }}"><i class="fas fa-pills"></i> <span>Medicines</span></a></li>
                <li><a href="{{ route('adminOrder') }}" class="active"><i class="fas fa-shopping-cart"></i> <span>Orders</span></a></li>
                <li><a href="{{ route('adminShipping') }}"><i class="fas fa-truck"></i> <span>Shipping</span></a></li>
                <li><a href="{{ route('orderShipping.index') }}"><i class="fas fa-box"></i> <span>Order Shipping</span></a></li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <div class="header">
            <h2>Orders Management</h2>
            <div class="user-menu">
                <span>Admin User</span>
            </div>
        </div>

        <div class="orders-content">
            <h3 class="orders-title">All Orders</h3>

            <!-- Search and Filters -->
            <div class="search-filters">
                <form method="GET" action="{{ route('adminOrder') }}">
                    @csrf
                    <div class="search-group">
                        <input type="text" class="search-input" name="client_id"
                            placeholder="Search by Client ID..."
                            value="{{ request('client_id') }}">
                    </div>
                    <div class="search-group">
                        <select class="search-input" name="status">
                            <option value="">All Statuses</option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="shipped" {{ request('status') == 'shipped' ? 'selected' : '' }}>Shipped</option>
                            <option value="delivered" {{ request('status') == 'delivered' ? 'selected' : '' }}>Delivered</option>
                            <option value="canceled" {{ request('status') == 'canceled' ? 'selected' : '' }}>Canceled</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <div class="date-filter">
                            <label>From:</label>
                            <input type="date" class="date-input" name="from_date"
                                value="{{ request('from_date') }}">
                        </div>
                        <div class="date-filter">
                            <label>To:</label>
                            <input type="date" class="date-input" name="to_date"
                                value="{{ request('to_date') }}">
                        </div>
                        <button type="submit" class="filter-btn">
                            <i class="fas fa-filter"></i> Filter
                        </button>
                        @if(request()->hasAny(['client_id', 'status', 'from_date', 'to_date']))
                        <a href="{{ route('adminOrder') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Clear Filters
                        </a>
                        @endif
                    </div>
                </form>
            </div>
            <div class="table-container">
                <table class="orders-table">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Client ID</th>
                            <th>Order Date</th>
                            <th>Total Amount</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->client_id }}</td>
                            <td>{{ $order->order_date}}</td>
                            <td>${{ number_format($order->total_amount, 2) }}</td>
                            <td>
                                <span class="status-badge status-{{ $order->order_status }}">
                                    {{ ucfirst($order->order_status) }}
                                </span>
                            </td>
                            <td>{{ $order->created_at }}</td>
                            <td>{{ $order->updated_at }}</td>
                            <td>
                                <form action="{{ route('delete-Order', $order->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                                <a href="{{route("edit-Order",["id"=>$order->id])}}">Edit</a>

                            </td>
                        </tr>
                        @endforeach
                </table>
            </div>
            <div class="pagination">
                {{ $orders->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const today = new Date().toISOString().split('T')[0];
        document.querySelector('input[name="to_date"]').max = today;

        document.querySelector('input[name="from_date"]').addEventListener('change', function() {
            document.querySelector('input[name="to_date"]').min = this.value;
        });
    });
</script>

</html>
