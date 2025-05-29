<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Management | Pharmacies Zone</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Base Styles */
        :root {
            --primary: #3498db;
            --primary-dark: #2980b9;
            --secondary: #6c757d;
            --success: #2ecc71;
            --danger: #e74c3c;
            --warning: #f39c12;
            --light: #f8f9fa;
            --dark: #343a40;
            --gray: #e9ecef;
            --sidebar-width: 250px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f7fa;
            color: #333;
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Styles */
        .sidebar {
            width: var(--sidebar-width);
            background: #2c3e50;
            color: white;
            height: 100vh;
            position: fixed;
            transition: all 0.3s;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar-header {
            padding: 20px;
            background: #1a252f;
            text-align: center;
        }

        .sidebar-header h3 {
            color: white;
            font-size: 1.3rem;
        }

        .sidebar-menu ul {
            list-style: none;
            padding: 20px 0;
        }

        .sidebar-menu li a {
            display: flex;
            align-items: center;
            padding: 15px 20px;
            color: #b8c7ce;
            text-decoration: none;
            transition: all 0.3s;
        }

        .sidebar-menu li a:hover {
            background: #1e2a36;
            color: white;
        }

        .sidebar-menu li a.active {
            background: #3498db;
            color: white;
        }

        .sidebar-menu li a i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        /* Main Content Styles */
        .container {
            margin-left: var(--sidebar-width);
            width: calc(100% - var(--sidebar-width));
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 20px;
        }

        .header h1 {
            color: var(--dark);
            font-size: 1.8rem;
        }

        /* Search Bar Styles */
        .search-bar {
            display: flex;
            flex-grow: 1;
            max-width: 500px;
            min-width: 250px;
        }

        .search-bar input {
            flex: 1;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 4px 0 0 4px;
            font-size: 14px;
            outline: none;
        }

        .search-bar button {
            background: var(--primary);
            color: white;
            border: none;
            padding: 0 15px;
            border-radius: 0 4px 4px 0;
            cursor: pointer;
            transition: background 0.3s;
        }

        .search-bar button:hover {
            background: var(--primary-dark);
        }

        /* Button Styles */
        .btn {
            display: inline-flex;
            align-items: center;
            padding: 10px 15px;
            border-radius: 4px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            border: none;
        }

        .btn i {
            margin-right: 8px;
        }

        .btn-success {
            background: var(--success);
            color: white;
        }

        .btn-success:hover {
            background: #27ae60;
        }

        .btn-edit {
            background: var(--primary);
            color: white;
            padding: 8px 12px;
        }

        .btn-edit:hover {
            background: var(--primary-dark);
        }

        .btn-delete {
            background: var(--danger);
            color: white;
            padding: 8px 12px;
        }

        .btn-delete:hover {
            background: #c0392b;
        }

        /* Card & Table Styles */
        .card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 20px;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        th {
            background: #f8f9fa;
            font-weight: 600;
            color: var(--dark);
        }

        tr:hover {
            background: #f5f5f5;
        }

        /* Status Badges */
        .status-active {
            color: var(--success);
            font-weight: 500;
        }

        .status-inactive {
            color: var(--danger);
            font-weight: 500;
        }

        /* Action Buttons */
        .action-btns {
            display: flex;
            gap: 10px;
        }

        /* Pagination Styles */
        .pagination {
            margin-top: 20px;
            display: flex;
            justify-content: center;
        }

        .pagination .pagination li {
            display: inline-block;
        }

        .pagination a,
        .pagination span {
            padding: 8px 16px;
            margin: 0 4px;
            border: 1px solid #ddd;
            border-radius: 4px;
            text-decoration: none;
            color: var(--primary);
        }

        .pagination a:hover {
            background: #f1f1f1;
        }

        .pagination .active span {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
                overflow: hidden;
            }

            .sidebar-header h3,
            .sidebar-menu li span {
                display: none;
            }

            .sidebar-menu li a {
                justify-content: center;
                padding: 15px 0;
            }

            .sidebar-menu li a i {
                margin-right: 0;
                font-size: 1.2rem;
            }

            .container {
                margin-left: 70px;
                width: calc(100% - 70px);
            }

            .header {
                flex-direction: column;
                align-items: flex-start;
            }

            .search-bar {
                width: 100%;
                max-width: 100%;
            }

            .action-btns {
                flex-direction: column;
                gap: 5px;
            }

            .action-btns .btn span {
                display: none;
            }
        }

        @media (max-width: 480px) {

            th,
            td {
                padding: 10px 5px;
                font-size: 14px;
            }

            .btn i {
                margin-right: 0;
            }

            .btn span {
                display: none;
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
                <li><a href="{{ route('adminClient') }}" class="active"><i class="fas fa-users"></i> <span>Clients</span></a></li>
                <li><a href="{{ route('adminEmployees') }}"><i class="fas fa-user-tie"></i> <span>Employees</span></a></li>
                <li><a href="{{ route('admin.medicines') }}"><i class="fas fa-pills"></i> <span>Medicines</span></a></li>
                <li><a href="{{ route('adminOrder') }}"><i class="fas fa-shopping-cart"></i> <span>Orders</span></a></li>
                <li><a href="{{ route('adminShipping') }}"><i class="fas fa-truck"></i> <span>Shipping</span></a></li>
                <li><a href="{{ route('orderShipping.index') }}"><i class="fas fa-box"></i> <span>Order Shipping</span></a></li>
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="header">
            <h1>Client Management</h1>

            <form method="GET" action="{{ route('adminClient') }}" class="search-bar">
                <input type="text" name="search" placeholder="Search by name or email..." value="{{ request('search') }}">
                <button type="submit"><i class="fas fa-search"></i></button>
            </form>

            <a href="{{ route('clients.create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> <span>Add new client</span>
            </a>
        </div>

        <div class="card">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($clients as $client)
                    <tr>
                        <td>#{{ $client->id }}</td>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->email }}</td>
                        <td>{{ $client->phone }}</td>
                        <td class="status-{{ strtolower($client->status) }}">
                            {{ $client->status }}
                        </td>
                        <td>
                            <div class="action-btns">
                                <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-edit">
                                    <i class="fas fa-edit"></i> <span>Edit</span>
                                </a>
                                <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this client?')">
                                        <i class="fas fa-trash-alt"></i> <span>Delete</span>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">No clients found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>