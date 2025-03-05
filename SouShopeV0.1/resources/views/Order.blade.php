<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details - #{{ $order->id }}</title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        }
        .hover\:scale-105:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .animate-fade-in {
            animation: fadeIn 0.5s ease-out;
        }
    </style>
</head>
<body class="antialiased">
    <div class="container mx-auto p-6 max-w-4xl">
        <div class="bg-white shadow-2xl rounded-2xl overflow-hidden animate-fade-in">
            <div class="bg-gradient-to-r from-blue-500 to-blue-700 text-white p-6 flex justify-between items-center">
                <h2 class="text-3xl font-bold">Order Details</h2>
                <div class="flex items-center">
                    <span class="text-lg">Order #{{ $order->id }}</span>
                    <span class="ml-3 px-3 py-1 text-xs font-semibold rounded-full 
                        @switch($order->status)
                            @case('pending') bg-yellow-400 text-yellow-900 @break
                            @case('processing') bg-blue-400 text-blue-900 @break
                            @case('completed') bg-green-500 text-green-900 @break
                            @case('cancelled') bg-red-500 text-red-100 @break
                            @default bg-gray-500 text-white
                        @endswitch">
                        {{ ucfirst($order->status) }}
                    </span>
                </div>
            </div>

            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h4 class="text-xl font-semibold text-gray-700 border-b-2 border-gray-300 pb-2">Order Summary</h4>
                        <div class="mt-2">
                            <strong>Order Date:</strong> <span class="text-gray-600">{{ $order->orderDate->format('M d, Y') }}</span>
                        </div>
                        <div class="mt-2">
                            <strong>Total Amount:</strong> <span class="text-gray-600">${{ number_format($order->Total, 2) }}</span>
                        </div>
                    </div>
                </div>

                <div class="mt-6">
                    <h4 class="text-xl font-semibold text-gray-700 border-b-2 border-gray-300 pb-2">Order Items</h4>
                    <table class="min-w-full mt-4 bg-white border border-gray-300 rounded-lg overflow-hidden">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="py-3 px-4 border">Product</th>
                                <th class="py-3 px-4 border">Quantity</th>
                                <th class="py-3 px-4 border">Unit Price</th>
                                <th class="py-3 px-4 border">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->Order_products as $item)
                            <tr class="hover:bg-gray-100 transition duration-200">
                                <td class="py-2 px-4 border">{{ $item->product->titre }}</td>
                                <td class="py-2 px-4 border">{{ $item->quantity }}</td>
                                <td class="py-2 px-4 border">${{ number_format($item->priceAtMoment, 2) }}</td>
                                <td class="py-2 px-4 border">${{ number_format($item->subtotal, 2) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="bg-gray-100 font-bold">
                                <td colspan="3" class="py-2 px-4 text-right">Total:</td>
                                <td class="py-2 px-4">${{ number_format($order->Total, 2) }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <div class="text-center mt-6">
                    <div class="flex justify-between">
                        <a href="Client/Orders" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition duration-200">Show all orders</a>
                        <div>
                            @if($order->status == 'pending')
                            <form action="/process/order" method="POST">
                                <input type="hidden" name="order_id" value="{{ $order->id }}">
                                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-200">Process Order</button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional: Add a footer -->
    <footer class="bg-gray-800 text-white text-center py-4 mt-6">
        <p>&copy; {{ date('Y') }} Solixman. All rights reserved.</p>
    </footer>
</body>
</html>