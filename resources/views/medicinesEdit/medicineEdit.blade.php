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

    <label for="name">Medicine Name</label>
    <input type="text" id="name" name="name" value="{{ old('name', $medicine->name) }}" required>

    <label for="type">Type</label>
    <input type="text" id="type" name="type" value="{{ old('type', $medicine->type) }}" required>

    <label for="manufacturer">Manufacturer</label>
    <input type="text" id="manufacturer" name="manufacturer" value="{{ old('manufacturer', $medicine->manufacturer) }}" required>

    <label for="price">Price</label>
    <input type="number" id="price" name="price" value="{{ old('price', $medicine->price) }}" step="0.01" required>

    <label for="stock">Stock</label>
    <input type="number" id="stock" name="stock" value="{{ old('stock', $medicine->stock) }}" required>

    <label for="expiry_date">Expiry Date</label>
    <input type="date" id="expiry_date" name="expiry_date" value="{{ old('expiry_date', $medicine->expiry_date) }}" required>

    <button type="submit">Update Medicine</button>
</form>

<a href="{{ route('medicines.index') }}" class="back-link">Back to Medicines List</a>

</body>
</html>
