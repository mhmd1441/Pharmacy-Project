<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Medicine | Pharmacies Zone</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary: #3498db;
            --primary-dark: #2980b9;
            --secondary: #6c757d;
            --success: #2ecc71;
            --danger: #e74c3c;
            --light: #f8f9fa;
            --dark: #343a40;
            --pharma-blue: #3498db;
            --pharma-green: #2ecc71;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f5f7fa;
            color: #333;
            line-height: 1.6;
        }

        .container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 0 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .header h1 {
            color: var(--dark);
            font-size: 1.8rem;
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
        }

        .back-btn i {
            margin-right: 8px;
        }

        .card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            padding: 2rem;
        }

        .card-title {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            color: var(--dark);
            border-bottom: 1px solid #eee;
            padding-bottom: 0.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-row {
            display: flex;
            gap: 20px;
        }

        .form-row .form-group {
            flex: 1;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--dark);
        }

        .form-control {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            transition: border 0.3s;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
        }

        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 1em;
        }

        .btn {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            background: var(--success);
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.3s;
        }

        .btn:hover {
            background: #25a25a;
        }

        .btn i {
            margin-right: 8px;
        }

        @media (max-width: 600px) {
            .form-row {
                flex-direction: column;
                gap: 0;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header my-4 d-flex justify-content-between align-items-center">
            <h1>Add New Medicine</h1>
            <a href="{{ route('adminDashboard') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to Admin Dashboard
            </a>
        </div>

        <div class="card p-4 shadow-sm">
            <h2 class="card-title mb-3">Medicine Details</h2>

            <!-- Medicine Creation Form -->
             
            <form method="POST" action="{{ route('medicines.store') }}">
                @csrf

                <div class="form-group mb-3">
                    <label for="medicine_name">Medicine Name*</label>
                    <input type="text" id="medicine_name" name="name" class="form-control" value="{{ old('name') }}" required>
                    @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="row">

                    <div class="col-md-6 form-group mb-3">
                        <label for="sku">SKU Code*</label>
                        <input type="text" id="sku" name="sku" class="form-control" value="{{ old('sku') }}" required>
                        @error('sku') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6 form-group mb-3">
                        <label for="manufacturer">Manufacturer*</label>
                        <input type="text" id="manufacturer" name="manufacturer" class="form-control" value="{{ old('manufacturer') }}" required>
                        @error('manufacturer') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                </div>

                <div class="form-group mb-3">
                    <label for="description">Description (Optional)</label>
                    <input type="text" id="description" name="description" class="form-control" value="{{ old('description') }}">
                    @error('description') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="row">

                    <div class="col-md-6 form-group mb-3">
                        <label for="dosage">Dosage (mg)*</label>
                        <input type="number" id="dosage" name="dosage" class="form-control" value="{{ old('dosage') }}" required>
                        @error('dosage') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6 form-group mb-3">
                        <label for="price">Price*</label>
                        <input type="number" id="price" name="price" class="form-control" step="0.01" value="{{ old('price') }}" required>
                        @error('price') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6 form-group mb-3">
                        <label for="required_status">Prescription Status*</label>
                        <select id="required_status" name="required_status" class="form-control" required>
                            <option value="not_required" {{ old('required_status') == 'not_required' ? 'selected' : '' }}>Not Required</option>
                            <option value="required" {{ old('required_status') == 'required' ? 'selected' : '' }}>Required</option>
                        </select>
                        @error('required_status') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6 form-group mb-3">
                        <label for="inventory_id">Inventory ID*</label>
                        <input type="number" id="inventory_id" name="inventory_id" class="form-control" value="{{ old('inventory_id') }}" required>
                        @error('inventory_id') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6 form-group mb-3">
                        <label for="production_date">Production Date*</label>
                        <input type="date" id="production_date" name="production_date" class="form-control" value="{{ old('production_date') }}" required>
                        @error('production_date') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6 form-group mb-3">
                        <label for="expiry_date">Expiry Date*</label>
                        <input type="date" id="expiry_date" name="expiry_date" class="form-control" value="{{ old('expiry_date') }}" required>
                        @error('expiry_date') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                </div>

                <button type="submit" class="btn btn-success">
                    <i class="fas fa-pills"></i> Add Medicine
                </button>

            </form>
        </div>
    </div>
</body>

</html>