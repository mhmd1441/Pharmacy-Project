<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Order</title>
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background: #111;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
        }

        /* Login Box */
        .login-box {
            width: 350px;
            padding: 30px;
            background: rgba(0, 0, 0, 0.7);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.6);
            border-radius: 15px;
            text-align: center;
            border: 1px solid #444;
        }

        .login-box h2 {
            margin-bottom: 20px;
            color: #04d9ff;
        }

        /* User Box (Input Fields) */
        .user-box {
            position: relative;
            margin-bottom: 25px;
        }

        .user-box input,
        .user-box select {
            width: 100%;
            padding: 12px 10px;
            font-size: 16px;
            color: #fff;
            border: none;
            border-bottom: 2px solid #fff;
            background: transparent;
            outline: none;
        }

        .user-box label {
            position: absolute;
            top: 0;
            left: 10px;
            font-size: 16px;
            color: #fff;
            pointer-events: none;
            transition: all 0.3s ease-in-out;
        }

        .user-box input:focus~label,
        .user-box input:valid~label,
        .user-box select:focus~label,
        .user-box select:valid~label {
            top: -20px;
            font-size: 14px;
            color: #04d9ff;
        }

        /* Form and Submit Button */
        form {
            margin-top: 20px;
        }

        .submit {
            padding: 12px 30px;
            background: #04d9ff;
            color: #111;
            font-size: 18px;
            font-weight: bold;
            border: none;
            border-radius: 30px;
            text-transform: uppercase;
            cursor: pointer;
            letter-spacing: 2px;
            transition: all 0.3s ease;
            width: 100%;
        }

        .submit:hover {
            background: #0288d1;
            color: #fff;
            box-shadow: 0 0 15px rgba(4, 217, 255, 0.8);
        }

        .submit:active {
            background: #0277b6;
        }
    </style>
</head>

<body>
    <div class="login-box">
        <h2 id="title">Edit Order</h2>
        <form action="{{ route('update-Order', $order->id) }}" method="POST">
            @csrf
            @method("PUT")
            <div class="user-box">
                <label for="order_date">Order Date</label>
                <input type="date" name="order_date" value="{{$order->order_date}}" required>
            </div>

            <div class="user-box">
                <label for="total_amount">Total Amount</label>
                <input type="number" name="total_amount" step="0.01" min="0" value="{{$order->total_amount}}" required>
            </div>

            <div class="user-box">
                <label for="order_status">Order Status</label>
                <select name="order_status" required>
                    <option value="pending" {{ $order->order_status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="shipped" {{ $order->order_status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                    <option value="delivered" {{ $order->order_status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                    <option value="canceled" {{ $order->order_status == 'canceled' ? 'selected' : '' }}>Canceled</option>
                </select>
            </div>

            <div class="user-box">
                <label for="client_id">Client ID</label>
                <input type="number" name="client_id" value="{{$order->client_id}}" required>
            </div>

            <button href="{{ route('adminOrder') }}" type="submit" class="submit">
                Update Order
            </button>
        </form>
    </div>
</body>

</html>