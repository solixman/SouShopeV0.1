<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Orders</title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Bootstrap Icons (optional, if you want to use icons) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<body class="bg-gray-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="fixed w-64 h-full bg-white shadow-lg">
            <div class="flex items-center gap-2 p-6">
                <i class="bi bi-grid-1x2-fill text-indigo-600 text-xl"></i>
                <span class="text-xl font-bold text-indigo-600">Dashboard</span>
            </div>
            <nav class="mt-6 px-4">
                <a href="#" class="flex items-center px-4 py-3 text-gray-700 bg-indigo-50 rounded-lg mb-2">
                    <i class="bi bi-house-door mr-3 text-lg"></i>
                    <span>Products</span>
                </a>
                <a href="/admin/users" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg mb-2 transition-colors">
                    <i class="bi bi-star mr-3 text-lg"></i>
                    <span>Users</span>
                </a>
                <a href="/Admin/Orders" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg mb-2 transition-colors">
                    <i class="bi bi-tag mr-3 text-lg"></i>
                    <span>Orders</span>
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 ml-64 p-6">
            <h1 class="text-3xl font-bold mb-6">All Orders</h1>
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="py-3 px-4 border">Order ID</th>
                            <th class="py-3 px-4 border">Order Date</th>
                            <th class="py-3 px-4 border">Client</th>
                            <th class="py-3 px-4 border">Status</th>
                            <th class="py-3 px-4 border">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr class="hover:bg-gray-100 transition duration-200">
                            <td class="py-2 px-4 border">{{ $order->id }}</td>
                            <td class="py-2 px-4 border">{{ $order->created_at->format('M d, Y') }}</td>
                            <td class="py-2 px-4 border">{{ $order->User->name }}</td>
                            <td class="py-2 px-4 border">
                                <span class="px-2 py-1 text-xs font-semibold rounded-full 
                                    @switch($order->status)
                                        @case('pending') bg-yellow-400 @break
                                        @case('processing') bg-blue-400 @break
                                        @case('completed') bg-green-500 @break
                                        @case('cancelled') bg-red-500 @break
                                        @default bg-gray-500
                                    @endswitch">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td class="py-2 px-4 border">
                           
                                <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST" class="inline">
                                    @csrf
                                    <select name="status" class="border rounded px-2 py-1">
                                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                                        <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                        <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                    </select>
                                    <button type="submit" class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600">Update</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>