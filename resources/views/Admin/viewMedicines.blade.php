
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Medicines List</title>
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

    <h1>Medicines List</h1>
    <a href="{{ url('/admin') }}" style="display:inline-block; margin-bottom: 20px; padding: 10px 15px; background-color: #007BFF; color: white; text-decoration: none; border-radius: 5px;"> Back To Admin Dashboard</a>


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
                    <form action="{{ route('medicines.destroy', $medicine->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('هل أنت متأكد من حذف هذا الدواء؟')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>


    @else
        <p>No medicines found.</p>
    @endif

</body>
</html>
