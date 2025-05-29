<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Medicine</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background-color: #f9f9f9; }
        form { max-width: 600px; margin: auto; background: white; padding: 20px; border-radius: 8px; }
        label { display: block; margin-top: 15px; font-weight: bold; }
        input, select { width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ccc; border-radius: 4px; }
        button { margin-top: 20px; padding: 10px 15px; background-color: #007BFF; color: white; border: none; border-radius: 5px; cursor: pointer; }
        button:hover { background-color: #0056b3; }
        .back-link { margin-top: 15px; display: inline-block; }
    </style>
</head>
<body>

<h1>Edit Medicine</h1>

<form action="{{ route('medicines.update', $medicine->id) }}" method="POST">
    @csrf
    @method('PUT')

    {{-- Medicine Name --}}
    <label>Medicine Name:</label>
    <input type="text" name="medicine_name" value="{{ $medicine->medicine_name }}" required>

    {{-- SKU --}}
    <label>SKU:</label>
    <input type="text" name="sku" value="{{ $medicine->sku }}" required>

    {{-- Manufacturer --}}
    <label>Manufacturer:</label>
    <input type="text" name="manufacturer" value="{{ $medicine->manufacturer }}" required>

    {{-- Price --}}
    <label>Price:</label>
    <input type="number" step="0.01" name="price" value="{{ $medicine->price }}" required>

    {{-- Inventory ID --}}
    <label>Inventory ID:</label>
    <input type="number" name="inventory_id" value="{{ $medicine->inventory_id }}" required>

    {{-- Expiry Date --}}
    <label>Expiry Date:</label>
    <input type="date" name="expiry_date" value="{{ $medicine->expiry_date }}" required>

    <button type="submit">Update</button>
</form>



<a href="{{ route('medicines.index') }}" class="back-link">Back to Medicines List</a>

</body>
</html>
