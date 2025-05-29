<!DOCTYPE html>
<html>
<head>
    <title>Edit Employee</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }

        .form-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            width: 500px;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
        }

        button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        a.go-back {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 20px;
            background-color: #6c757d;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        h2 {
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Edit Employee</h2>

    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" value="{{ $employee->first_name }}" required>

        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" value="{{ $employee->last_name }}" required>

        <label for="email">Gmail:</label>
        <input type="email" name="email" value="{{ $employee->email }}" required>

        <label for="mobile_number">Phone Number:</label>
        <input type="text" name="mobile_number" value="{{ $employee->mobile_number }}" required>

        <label for="role">Job Role:</label>
        <select name="role" required>
            <option value="pharmacist" {{ $employee->role == 'pharmacist' ? 'selected' : '' }}>Pharmacist</option>
            <option value="manager" {{ $employee->role == 'manager' ? 'selected' : '' }}>Manager</option>
            <option value="driver" {{ $employee->role == 'driver' ? 'selected' : '' }}>Driver</option>
        </select>

        <label for="status">Status:</label>
        <select name="status" required>
            <option value="active" {{ $employee->status == 'active' ? 'selected' : '' }}>Active</option>
            <option value="onLeave" {{ $employee->status == 'onLeave' ? 'selected' : '' }}>On Leave</option>
        </select>

        <label for="hire_date">Employment History (Hire Date):</label>
        <input type="date" name="hire_date" value="{{ $employee->hire_date }}" required>

        <button type="submit">Update Employee</button>
    </form>

    <a href="{{ route('employees.index') }}" class="go-back">Go Back</a>
</div>

</body>
</html>
