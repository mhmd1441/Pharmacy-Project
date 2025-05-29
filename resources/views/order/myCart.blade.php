<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Shopping Cart</title>
    <style>
        :root {
            --primary-color: #4e73df;
            --secondary-color: #f8f9fc;
            --accent-color: #2e59d9;
            --text-color: #5a5c69;
            --light-gray: #f8f9fa;
            --border-color: #e3e6f0;
            --success-color: #1cc88a;
            --danger-color: #e74a3b;
            --info-color: #36b9cc;
        }

        body {
            font-family: 'Nunito', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            color: var(--text-color);
            background-color: var(--secondary-color);
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }

        h1 {
            color: var(--primary-color);
            font-weight: 700;
            margin-bottom: 2rem;
            text-align: center;
            position: relative;
            padding-bottom: 0.5rem;
        }

        h1:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: var(--primary-color);
            border-radius: 3px;
        }

        .alert {
            padding: 1rem;
            border-radius: 0.35rem;
            margin-bottom: 1.5rem;
        }

        .alert-success {
            background-color: rgba(28, 200, 138, 0.1);
            border-left: 4px solid var(--success-color);
            color: var(--success-color);
        }

        .alert-info {
            background-color: rgba(54, 185, 204, 0.1);
            border-left: 4px solid var(--info-color);
            color: var(--info-color);
        }

        .table-responsive {
            overflow-x: auto;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
            border-radius: 0.35rem;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            background-color: #fff;
            border-collapse: collapse;
        }

        .table thead {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%);
            color: white;
        }

        .table th {
            padding: 1rem;
            text-align: left;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
        }

        .table td {
            padding: 1rem;
            vertical-align: middle;
            border-top: 1px solid var(--border-color);
        }

        .table tbody tr:hover {
            background-color: rgba(78, 115, 223, 0.05);
        }

        .img-thumbnail {
            border-radius: 0.25rem;
            transition: transform 0.3s ease;
        }

        .img-thumbnail:hover {
            transform: scale(1.05);
        }

        .form-control {
            display: inline-block;
            width: auto;
            padding: 0.375rem 0.75rem;
            font-size: 0.85rem;
            line-height: 1.5;
            color: #6e707e;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #d1d3e2;
            border-radius: 0.35rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .form-control:focus {
            color: #6e707e;
            background-color: #fff;
            border-color: #bac8f3;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
        }

        .btn {
            display: inline-block;
            font-weight: 400;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            user-select: none;
            border: 1px solid transparent;
            padding: 0.375rem 0.75rem;
            font-size: 0.85rem;
            line-height: 1.5;
            border-radius: 0.35rem;
            transition: all 0.15s ease;
        }

        .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
        }

        .btn-info {
            color: #fff;
            background-color: var(--info-color);
            border-color: var(--info-color);
        }

        .btn-info:hover {
            background-color: #2c9faf;
            border-color: #2a96a5;
        }

        .btn-danger {
            color: #fff;
            background-color: var(--danger-color);
            border-color: var(--danger-color);
        }

        .btn-danger:hover {
            background-color: #d62c1a;
            border-color: #ca2817;
        }

        .btn-primary {
            color: #fff;
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: var(--accent-color);
            border-color: #2653d4;
        }

        .btn-secondary {
            color: #fff;
            background-color: #858796;
            border-color: #858796;
        }

        .btn-secondary:hover {
            background-color: #717384;
            border-color: #6b6d7d;
        }

        .d-flex {
            display: flex;
        }

        .align-items-center {
            align-items: center;
        }

        .justify-content-between {
            justify-content: space-between;
        }

        .text-end {
            text-align: right;
        }

        .mt-1 {
            margin-top: 0.25rem;
        }

        .mt-4 {
            margin-top: 1.5rem;
        }

        .mb-0 {
            margin-bottom: 0;
        }

        .mb-4 {
            margin-bottom: 1.5rem;
        }

        .me-3 {
            margin-right: 1rem;
        }

        tfoot tr {
            font-weight: 700;
            background-color: var(--light-gray);
        }

        .empty-cart {
            text-align: center;
            padding: 3rem;
            background-color: white;
            border-radius: 0.35rem;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.1);
        }

        .empty-cart a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
        }

        .empty-cart a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .table-responsive {
                border: 0;
            }

            .table thead {
                display: none;
            }

            .table tr {
                display: block;
                margin-bottom: 1rem;
                border: 1px solid var(--border-color);
                border-radius: 0.35rem;
            }

            .table td {
                display: flex;
                justify-content: space-between;
                align-items: center;
                border: none;
                border-bottom: 1px solid var(--border-color);
            }

            .table td:before {
                content: attr(data-label);
                font-weight: 600;
                text-transform: uppercase;
                font-size: 0.75rem;
                color: var(--primary-color);
            }

            .table td:last-child {
                border-bottom: 0;
            }

            .d-flex.justify-content-between {
                flex-direction: column;
                gap: 1rem;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="container py-4">
        <h1 class="mb-4">Your Shopping Cart</h1>

        <div class="alert alert-success" style="display: none;"> </div>

        <div id="cart-content">
            <div class="empty-cart">
                <div class="alert alert-info">
                    Your cart is empty. <a href="#">Browse medicines</a>
                </div>
            </div>
        </div>
    </div>

    <div id="cart-content">
        @if(count($cart) > 0)
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0 @endphp
                    @foreach($cart as $id => $details)
                    @php $total += $details['price'] * $details['quantity'] @endphp
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                @if($details['image'])
                                <img src="{{ asset('storage/' . $details['image']) }}" width="80" class="img-thumbnail me-3" alt="{{ $details['name'] }}">
                                @else
                                <img src="https://via.placeholder.com/80" width="80" class="img-thumbnail me-3" alt="Medicine Image">
                                @endif
                                <div>
                                    <h5 class="mb-0">{{ $details['name'] }}</h5>
                                </div>
                            </div>
                        </td>
                        <td>${{ number_format($details['price'], 2) }}</td>
                        <td>
                            <form action="{{ route('cart.update') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $id }}">
                                <input type="number" name="quantity" value="{{ $details['quantity'] }}" min="1" class="form-control" style="width: 70px;">
                                <button type="submit" class="btn btn-sm btn-info mt-1">Update</button>
                            </form>
                        </td>
                        <td>${{ number_format($details['price'] * $details['quantity'], 2) }}</td>
                        <td>
                            <a href="{{ route('cart.remove', $id) }}" class="btn btn-sm btn-danger">Remove</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="text-end"><strong>Total:</strong></td>
                        <td colspan="2">${{ number_format($total, 2) }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('clientPage') }}" class="btn btn-secondary">Continue Shopping</a>
            <a href="{{ route('checkout') }}" class="btn btn-primary">Proceed to Checkout</a>
        </div>
        @else
        <div class="empty-cart">
            <div class="alert alert-info">
                Your cart is empty. <a href="{{ route('clientPage') }}">Browse medicines</a>
            </div>
        </div>
        @endif
    </div>
</body>

</html>