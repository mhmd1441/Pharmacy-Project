<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacies Zone - Admin Dashboard</title>
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

        /* Dashboard Content */
        .dashboard-content {
            background-color: white;
            border-radius: 8px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .dashboard-title {
            margin-bottom: 25px;
            color: var(--dark);
            font-size: 1.5rem;
        }

        .action-buttons {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
        }

        .btn {
            padding: 12px 25px;
            border: none;
            border-radius: 6px;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
        }

        .btn i {
            margin-right: 8px;
        }

        .btn-primary {
            background-color: var(--pharma-blue);
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
        }

        .btn-success {
            background-color: var(--pharma-green);
            color: white;
        }

        .btn-success:hover {
            background-color: #25a25a;
        }

        /* Table Styles */
        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
        }

        th {
            background-color: #f8f9fa;
            color: var(--dark);
            font-weight: 600;
        }

        tr:hover {
            background-color: #f8f9fa;
        }

        .status-badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }

        .status-completed {
            background-color: #d4edda;
            color: #155724;
        }

        .status-shipped {
            background-color: #cce5ff;
            color: #004085;
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
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h3>Pharmacies Zone</h3>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li><a href="{{ route('adminDashboard') }}" class="active"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
                <li><a href="{{ route('adminClient') }}"><i class="fas fa-users"></i> <span>Clients</span></a></li>
                <li><a href="{{ route('employees.index') }}"><i class="fas fa-user-tie"></i> <span>Employees</span></a></li>
                <li><a href="{{ route('adminOrders') }}"><i class="fas fa-shopping-cart"></i> <span>Orders</span></a></li>
                <li><a href="{{ route('shipping.index') }}"><i class="fas fa-truck"></i> <span>Shipping</span></a></li>
                <li><a href="{{ route('orderShipping.index') }}"><i class="fas fa-box"></i> <span>Order Shipping</span></a></li>
            </ul>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="header">
            <h2>Admin Dashboard</h2>
            <div class="user-menu">
                <img src="https://via.placeholder.com/40" alt="Admin">
                <span>Admin User</span>
            </div>
        </div>

        <!-- Dashboard Content -->
        <div class="dashboard-content">
            <h3 class="dashboard-title">Dashboard Overview</h3>

            <div class="action-buttons">
                <!-- Updated Buttons with Route Links -->
                <a href="{{ route('medicines.create') }}" class="btn btn-primary">
                    <i class="fas fa-pills"></i> Create Medicine
                </a>
                <a href="{{ route('adminEmployee') }}" class="btn btn-success">
                    <i class="fas fa-user-plus"></i> Create Employee
                </a>
            </div>

            <!-- This would change based on the menu selection -->
            <div class="table-container">
                <h4>Recent Activity</h4>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#1001</td>
                            <td>John Doe</td>
                            <td>Client Registration</td>
                            <td>2023-06-15</td>
                            <td><span class="status-badge status-completed">Completed</span></td>
                        </tr>
                        <tr>
                            <td>#1002</td>
                            <td>Amoxicillin</td>
                            <td>Medicine Added</td>
                            <td>2023-06-14</td>
                            <td><span class="status-badge status-completed">Completed</span></td>
                        </tr>
                        <tr>
                            <td>#1003</td>
                            <td>Order #4567</td>
                            <td>New Order</td>
                            <td>2023-06-14</td>
                            <td><span class="status-badge status-pending">Pending</span></td>
                        </tr>
                        <tr>
                            <td>#1004</td>
                            <td>Shipment #789</td>
                            <td>Shipping</td>
                            <td>2023-06-13</td>
                            <td><span class="status-badge status-shipped">Shipped</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>


</html>