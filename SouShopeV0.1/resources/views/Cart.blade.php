<?php

use Illuminate\Support\Facades\Session;
use App\Models\Product;
//   echo'here';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .product-image {
            width: 100px; /* Set a fixed width for images */
            height: auto; /* Maintain aspect ratio */
        }
        .card {
            transition: transform 0.2s;
        }
        .card:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-5">
        <h1 class="text-4xl font-bold text-center mb-8 text-blue-600">Your Shopping Cart</h1>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead>
                    <tr class="bg-blue-500 text-white uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">Product Image</th>
                        <th class="py-3 px-6 text-left">Product Name</th>
                        <th class="py-3 px-6 text-left">Price</th>
                        <th class="py-3 px-6 text-left">Quantity</th>
                        <th class="py-3 px-6 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @foreach($Products as $product)
                        <tr class="border-b border-gray-200 hover:bg-gray-100 transition duration-300">
                            <td class="py-3 px-6">
                                <img src="{{ $product->image }}" alt="{{ $product->titre }}" class="product-image rounded-lg shadow-md">
                            </td>
                            <td class="py-3 px-6">{{ $product->titre }}</td>
                            <td class="py-3 px-6">${{ number_format($product->price, 2) }}</td>
                            <td class="py-3 px-6">{{ $product->quantity }}</td>
                            <td class="py-3 px-6">
                                <form action="/delete/cart" method="get" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <button type="submit" class="text-red-500 hover:text-red-700 font-bold">remove from cart</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-5 text-right">
            <span class="text-2xl font-bold text-blue-600">Total: {{ $totalprice }}</span>
        </div>
        <div class="mt-5 text-center">
            <a href="/checkout" class="bg-blue-600 text-white font-bold py-3 px-6 rounded-lg shadow-lg hover:bg-blue-700 transition duration-300">Proceed to Checkout</a>
        </div>
    </div>
</body>
</html>