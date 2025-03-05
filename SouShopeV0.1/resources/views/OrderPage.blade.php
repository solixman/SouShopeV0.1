<!-- resources/views/OrderPage.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .order-details {
            margin: 20px 0;
        }
        .order-details p {
            margin: 10px 0;
        }
        .btn {
            display: inline-block;
            padding: 10px 15px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
        }
        .btn:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Order Details</h1>

    <div class="order-details">
        <p><strong>Order ID:</strong> {{ $order->id }}</p>
        <p><strong>Customer Name:</strong> {{ $order->customer_name }}</p>
        <p><strong>Email:</strong> {{ $order->customer_email }}</p>
        <p><strong>Order Date:</strong> {{ $order->created_at->format('d M Y') }}</p>
        <p><strong>Status:</strong> {{ $order->status }}</p>
        <p><strong>Total Amount:</strong> ${{ number_format($order->total_amount, 2) }}</p>
    </div>

    <h2>Items</h2>
    <ul>
        @foreach($order->items as $item)
            <li>{{ $item->product_name }} - ${{ number_format($item->price, 2) }} (Quantity: {{ $item->quantity }})</li>
        @endforeach
    </ul>

    <a href="{{ route('orders.index') }}" class="btn">Back to Orders</a>
</div>

</body>
</html>