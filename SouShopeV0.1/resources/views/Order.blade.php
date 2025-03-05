<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details - #{{ $order->id }}</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Arial', sans-serif;
        }
        .order-container {
            max-width: 800px;
            margin: 2rem auto;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .order-header {
            background-color: #007bff;
            color: white;
            padding: 1.5rem;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .status-badge {
            font-size: 0.9rem;
            margin-left: 10px;
        }
        .order-details {
            background-color: white;
            padding: 2rem;
        }
        .section-title {
            color: #495057;
            border-bottom: 2px solid #e9ecef;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .detail-row {
            margin-bottom: 10px;
        }
        .order-items-table {
            margin-top: 20px;
        }
        .total-row {
            font-weight: bold;
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="order-container">
            <div class="order-header d-flex justify-content-between align-items-center">
                <h2 class="mb-0">Order Details</h2>
                <div>
                    <span>Order #{{ $order->id }}</span>
                    <span class="badge 
                        @switch($order->status)
                            @case('pending') bg-warning @break
                            @case('processing') bg-info @break
                            @case('completed') bg-success @break
                            @case('cancelled') bg-danger @break
                            @default bg-secondary
                        @endswitch
                        status-badge">
                        {{ ucfirst($order->status) }}
                    </span>
                </div>
            </div>

            <div class="order-details">
                <div class="row">
                    

                    <div class="col-md-6">
                        <h4 class="section-title">Order Summary</h4>
                        <div class="detail-row">
                            <strong>Order Date:</strong> {{ $order->created_at->format('M d, Y') }}
                        </div>
                        <div class="detail-row">
                            <strong>Total Amount:</strong> ${{ number_format($order->total_amount, 2) }}
                        </div>
                    </div>
                </div>

                <div class="order-items-table">
                    <h4 class="section-title">Order Items</h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->Order_products as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>${{ $item->priceAtMoment }}</td>
                                <td>${{ $item->subtotal }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="total-row">
                                <td colspan="3" class="text-end">Total:</td>
                                <td>${{ number_format($order->Total, 2) }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

          
              

                <div class="text-center mt-4">
                    <a href="Client/Orders" class="btn btn-secondary me-2">Show all orders</a>
                    @if($order->status == 'pending')
                        <button class="btn btn-primary">Process Order</button>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>