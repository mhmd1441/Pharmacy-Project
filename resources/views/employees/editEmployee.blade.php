<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>تعديل الموظف</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4 text-center"> Edit Employee Info </h2>

    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="first_name" class="form-label"> First Name </label>
            <input type="text" name="first_name" class="form-control" value="{{ $employee->first_name }}" required>
        </div>

        <div class="mb-3">
            <label for="last_name" class="form-label"> Last Name </label>
            <input type="text" name="last_name" class="form-control" value="{{ $employee->last_name }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label"> Gmail </label>
            <input type="email" name="email" class="form-control" value="{{ $employee->email }}" required>
        </div>

        <div class="mb-3">
            <label for="mobile_number" class="form-label"> Phome Number </label>
            <input type="text" name="mobile_number" class="form-control" value="{{ $employee->mobile_number }}">
        </div>

        <div class="mb-3">
            <label for="role" class="form-label"> Job Roul </label>
            <select name="role" class="form-select">
                <option value="admin" {{ $employee->role == 'admin' ? 'selected' : '' }}>Driver</option>
                <option value="employee" {{ $employee->role == 'employee' ? 'selected' : '' }}>Employee</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" class="form-select">
                <option value="active" {{ $employee->status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ $employee->status == 'inactive' ? 'selected' : '' }}>Disconect</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="hire_date" class="form-label"> Employment Hostory </label>
            <input type="date" name="hire_date" class="form-control" value="{{ $employee->hire_date }}">
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary"> Update Info </button>
            <a href="{{ route('employees.index') }}" class="btn btn-secondary">Go Back</a>
        </div>
    </form>
</div>

</body>
</html>
