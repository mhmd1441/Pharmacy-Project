<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Management | Pharmacies Zone</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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

        .sidebar {
            width: 250px;
            background-color: var(--sidebar-bg);
            color: black;
            height: 100%;
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

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }


        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .header h1 {
            color: var(--dark);
            font-size: 1.8rem;
        }

        .search-bar {
            display: flex;
            align-items: center;
            background: white;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            flex-grow: 1;
            max-width: 500px;
        }

        .search-bar input {
            flex-grow: 1;
            padding: 0.75rem 1rem;
            border: none;
            outline: none;
            font-size: 1rem;
        }

        .search-bar button {
            background: var(--primary);
            color: white;
            border: none;
            padding: 0.75rem 1.25rem;
            cursor: pointer;
            transition: background 0.3s;
        }

        .search-bar button:hover {
            background: var(--primary-dark);
        }

        .add-btn {
            display: inline-flex;
            align-items: center;
            padding: 0.75rem 1.25rem;
            background: var(--success);
            color: white;
            border: none;
            border-radius: 5px;
            font-weight: 500;
            text-decoration: none;
            transition: background 0.3s;
        }

        .add-btn:hover {
            background: #25a25a;
        }

        .add-btn i {
            margin-right: 8px;
        }

        .card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            overflow-x: auto;
        }

        .card-title {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            color: var(--dark);
            border-bottom: 1px solid #eee;
            padding-bottom: 0.5rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        th {
            background-color: #f8f9fa;
            font-weight: 600;
            color: var(--dark);
        }

        tr:hover {
            background-color: #f8f9fa;
        }

        .action-btns {
            display: flex;
            gap: 0.5rem;
        }

        .btn {
            padding: 0.5rem 0.75rem;
            border: none;
            border-radius: 5px;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
        }

        .btn i {
            margin-right: 5px;
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

        .status-active {
            color: var(--success);
            font-weight: 500;
        }

        .status-inactive {
            color: var(--secondary);
            font-weight: 500;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 2rem;
            gap: 0.5rem;
        }

        .page-btn {
            padding: 0.5rem 0.75rem;
            border: 1px solid #ddd;
            background: white;
            border-radius: 5px;
            cursor: pointer;
        }

        .page-btn.active {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        @media (max-width: 768px) {

            th,
            td {
                padding: 0.75rem 0.5rem;
                font-size: 0.9rem;
            }

            .btn {
                padding: 0.4rem 0.6rem;
                font-size: 0.8rem;
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
                <li><a href="#"><i class="fas fa-users" class="active"></i> <span>Clients</span></a></li>
                <li><a href="#"><i class="fas fa-user-tie"></i> <span>Employees</span></a></li>
                <li><a href="{{ route('adminOrder') }}"><i class="fas fa-shopping-cart"></i> <span>Orders</span></a></li>
                <li><a href="#"><i class="fas fa-truck"></i> <span>Shipping</span></a></li>
                <li><a href="#"><i class="fas fa-box"></i> <span>Order Shipping</span></a></li>
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="header">
            <h1>Client Management</h1>
            <div class="search-bar">
                <input type="text" placeholder="Search by name or email...">
                <button type="button"><i class="fas fa-search"></i></button>
            </div>
                        
            <a href="{{ route('clients.create') }}" class="btn btn-success">Add new client</a>
            
            

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
                    <tr>
                        <td>#1001</td>
                        <td>John Doe</td>
                        <td>john.doe@example.com</td>
                        <td>1234567890</td>
                        <td class="status-active">Active</td>
                        <td>
                            <div class="action-btns">
                                <button class="btn btn-edit">
                                    <i class="fas fa-edit"></i> <span>Edit</span>
                                </button>
                                <button class="btn btn-delete">
                                    <i class="fas fa-trash-alt"></i> <span>Delete</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>#1002</td>
                        <td>Jane Smith</td>
                        <td>jane.smith@example.com</td>
                        <td>2345678901</td>
                        <td class="status-active">Active</td>
                        <td>
                            <div class="action-btns">
                                <button class="btn btn-edit">
                                    <i class="fas fa-edit"></i> <span>Edit</span>
                                </button>
                                <button class="btn btn-delete">
                                    <i class="fas fa-trash-alt"></i> <span>Delete</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>#1003</td>
                        <td>Robert Johnson</td>
                        <td>robert.j@example.com</td>
                        <td>3456789012</td>
                        <td class="status-inactive">Inactive</td>
                        <td>
                            <div class="action-btns">
                                <button class="btn btn-edit">
                                    <i class="fas fa-edit"></i> <span>Edit</span>
                                </button>
                                <button class="btn btn-delete">
                                    <i class="fas fa-trash-alt"></i> <span>Delete</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>#1004</td>
                        <td>Emily Davis</td>
                        <td>emily.d@example.com</td>
                        <td>4567890123</td>
                        <td class="status-active">Active</td>
                        <td>
                            <div class="action-btns">
                                <button class="btn btn-edit">
                                    <i class="fas fa-edit"></i> <span>Edit</span>
                                </button>
                                <button class="btn btn-delete">
                                    <i class="fas fa-trash-alt"></i> <span>Delete</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>#1005</td>
                        <td>Michael Wilson</td>
                        <td>michael.w@example.com</td>
                        <td>5678901234</td>
                        <td class="status-inactive">Inactive</td>
                        <td>
                            <div class="action-btns">
                                <button class="btn btn-edit">
                                    <i class="fas fa-edit"></i> <span>Edit</span>
                                </button>
                                <button class="btn btn-delete">
                                    <i class="fas fa-trash-alt"></i> <span>Delete</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="pagination">
                <button class="page-btn"><i class="fas fa-angle-left"></i></button>
                <button class="page-btn active">1</button>
                <button class="page-btn">2</button>
                <button class="page-btn">3</button>
                <button class="page-btn"><i class="fas fa-angle-right"></i></button>
            </div>
        </div>
    </div>
</body>

</html>
