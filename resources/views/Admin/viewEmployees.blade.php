<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employees List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        :root {
            --sidebar-bg: #2C3E50;
            --sidebar-active: #1A252F;
            --pharma-green: #28a745;
            --pharma-blue: #007BFF;
            --primary-dark: #0056b3;
            --dark: #333;
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
            color: var(--dark);
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

        table, th, td {
            border: 1px solid #aaa;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: var(--pharma-blue);
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .btn {
            padding: 6px 10px;
            font-size: 0.9rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }

        .deBut{
             padding: 6px 10px;
            font-size: 0.9rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            background-color:rgb(220, 53, 53);
            color: white


            
        }
            

        .btn-danger {
            background-color:rgb(53, 220, 131);
            color: white;
        }

        .btn-danger:hover {
            background-color:rgb(0, 255, 26);
        }

        form.filter-form {
            margin-bottom: 20px;
        }

        form.filter-form input,
        form.filter-form select {
            padding: 6px 10px;
            margin-right: 10px;
            font-size: 1rem;
        }

        form.filter-form button {
            padding: 6px 15px;
            font-size: 1rem;
            cursor: pointer;
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
            <li><a href="{{ route('adminEmployees') }}" class="active"><i class="fas fa-user-tie"></i> Employees</a></li>
            <li><a href="{{ route('adminOrder') }}"><i class="fas fa-shopping-cart"></i> Orders</a></li>
            <li><a href="{{ route('adminShipping') }}"><i class="fas fa-truck"></i> Shipping</a></li>
            <li><a href="{{ route('orderShipping.index') }}"><i class="fas fa-box"></i> Order Shipping</a></li>
            <li><a href="{{ route('admin.medicines') }}"><i class="fas fa-pills"></i> Medicines</a></li>
        </ul>
    </div>
</div>

<div class="main-content">
    <h1>Employees List</h1>

    <p>Total Employees: <strong>{{ $totalEmployees }}</strong></p>

   


    <form action="{{ route('employees.index') }}" method="GET" style="margin-bottom: 20px;">
    <input type="text" name="search" placeholder="Search employees..." value="{{ request('search') }}">

    <select name="role">
        <option value="">-- Select Role --</option>
        <option value="pharmacist" {{ request('role') == 'pharmacist' ? 'selected' : '' }}>Pharmacist</option>
        <option value="driver" {{ request('role') == 'driver' ? 'selected' : '' }}>Driver</option>
        <option value="manager" {{ request('role') == 'manager' ? 'selected' : '' }}>Manager</option>
    </select>

    <select name="status">
        <option value="">-- Select Status --</option>
        <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
        <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
    </select>

    <button type="submit">Search</button>

    @if(request()->has('search') || request()->has('role') || request()->has('status'))
        <a href="{{ route('employees.index') }}" style="margin-left: 10px; padding: 6px 12px; background-color: #dc3545; color: white; text-decoration: none; border-radius: 4px;">
          Reset
        </a>
    @endif
</form>



    @if ($employees->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Mobile Number</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Hire Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $employee->id }}</td>
                        <td>{{ $employee->first_name }}</td>
                        <td>{{ $employee->last_name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->mobile_number }}</td>
                        <td>{{ ucfirst($employee->role) }}</td>
                        <td>{{ ucfirst($employee->status) }}</td>
                        <td>{{ $employee->hire_date }}</td>
                        <td>
                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="deBut" onclick="return confirm('Are you sure you want to delete this employee?')">Delete</button>
                            </form>
                            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-danger">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No employees found.</p>
    @endif
</div>

</body>
</html>
