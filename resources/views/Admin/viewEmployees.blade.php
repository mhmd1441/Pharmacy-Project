
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Employees List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background-color: #f4f4f4;
        }
        h1 {
            color: #333;
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
            background-color: #007BFF;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>

    <h1>Employees List</h1>
    
<a href="{{ url('/admin') }}" style="display:inline-block; margin-bottom: 20px; padding: 10px 15px; background-color: #007BFF; color: white; text-decoration: none; border-radius: 5px;"> Back To Admin Dashboard</a>

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
            <th>Actions</th> <!-- عمود جديد للأزرار -->
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
                    
                    <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-sm btn-primary">Edit</a>

                   
                    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are sure taht you want to delete?')">Delete</button>
                    </form>

                </td>
            </tr>
        @endforeach
    </tbody>
</table>

    @else
        <p>No employees found.</p>
    @endif

</body>
</html>
