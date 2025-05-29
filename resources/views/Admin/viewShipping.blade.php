<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shipping List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        :root {
            --sidebar-bg: #2C3E50;
            --sidebar-active: #1A252F;
            --pharma-green: #28a745;
            --pharma-blue: #007BFF;
            --primary-dark: #0056b3;
            --danger-red: #dc3545;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #f4f4f4;
        }

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
            padding-left: 0;
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

        .main-content {
            margin-left: 250px;
            padding: 30px;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        a.back-btn {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 15px;
            background-color: var(--pharma-blue);
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ccc;
            text-align: left;
        }

        th {
            background-color: var(--pharma-blue);
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .btn-edit {
            color: white;
            background-color: var(--pharma-green);
            padding: 5px 10px;
            border-radius: 4px;
            text-decoration: none;
            margin-right: 5px;
        }

        .btn-delete {
            background-color: var(--danger-red);
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        ul {
            margin: 0;
            padding-left: 20px;
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
            <li><a href="{{ route('adminDashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="{{ route('adminClient') }}"><i class="fas fa-users"></i> Clients</a></li>
            <li><a href="{{ route('adminEmployees') }}"><i class="fas fa-user-tie"></i> Employees</a></li>
            <li><a href="{{ route('adminOrder') }}"><i class="fas fa-shopping-cart"></i> Orders</a></li>
            <li><a href="{{ route('adminShipping') }}" class="active"><i class="fas fa-truck"></i> Shipping</a></li>
           <li><a href="{{ route('orderShipping.index') }}"><i class="fas fa-box"></i> <span>Order Shipping</span></a></li>
            <li><a href="{{ route('admin.medicines') }}"><i class="fas fa-pills"></i> Medicines</a></li>
        </ul>
    </div>
</div>

<div class="main-content">
    <h1>Shipping List</h1>

    <!-- ✅ شريط البحث والفلترة -->
    <form method="GET" action="{{ route('adminShipping') }}" style="margin-bottom: 20px;">
        <div style="display: flex; gap: 15px; align-items: center; flex-wrap: wrap;">
            <input 
                type="text" 
                name="search_id" 
                placeholder="Search by ID" 
                value="{{ request('search_id') }}"
                style="padding: 8px; border-radius: 5px; border: 1px solid #ccc;"
            >

            <select 
                name="status" 
                style="padding: 8px; border-radius: 5px; border: 1px solid #ccc;"
            >
                <option value="">-- Filter by Status --</option>
                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="delayed" {{ request('status') == 'delayed' ? 'selected' : '' }}>Delayed</option>
                <option value="shipped" {{ request('status') == 'shipped' ? 'selected' : '' }}>Shipped</option>
            </select>

            <button type="submit" class="btn btn-primary">Search</button>

            @if(request('search_id') || request('status'))
                <a href="{{ route('adminShipping') }}" class="btn btn-secondary">Reset</a>
            @endif
        </div>
    </form>

    <!-- ✅ جدول الشحن -->
    @if ($shippings->count() > 0)
        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <thead>
                <tr style="background-color: #f8f8f8;">
                    <th>ID</th>
                    <th>Status</th>
                    <th>Shipping Date</th>
                    <th>Actual Shipping Date</th>
                    <th>Actual Arrival Date</th>
                    <th>Arrival Date</th>
                    <th>Employee</th>
                    <th>Orders</th>
                    <th>Shipping Cost</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($shippings as $shipping)
                    <tr style="text-align: center; border-bottom: 1px solid #ddd;">
                        <td>{{ $shipping->id }}</td>
                        <td>{{ ucfirst($shipping->shipping_status) }}</td>
                        <td>{{ $shipping->shipping_date }}</td>
                        <td>{{ $shipping->actual_shipping_date }}</td>
                        <td>{{ $shipping->actual_arrival_date }}</td>
                        <td>{{ $shipping->arrival_date ?? 'N/A' }}</td>
                        <td>{{ $shipping->getEmployee ? $shipping->getEmployee->first_name . ' ' . $shipping->getEmployee->last_name : 'No Employee' }}</td>
                        <td>
                            @if($shipping->getOrders && $shipping->getOrders->count() > 0)
                                <ul style="padding-left: 15px; text-align: left;">
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
                            <a href="{{ route('shippings.edit', $shipping->id) }}" class="btn btn-primary" style="margin-bottom: 5px;">Edit</a>
                            <form action="{{ route('shippings.destroy', $shipping->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this shipping record?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p style="margin-top: 20px;">No shipping records found.</p>
    @endif
</div>


</body>
</html>
