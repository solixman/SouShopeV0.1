<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .table {
            margin-top: 20px;
        }

        .actions button {
            margin: 0 5px;
        }

        .nomargin {
            margin: 0;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2 class="mt-5">Shopping Cart</h2>
        <table id="cart" class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th style="width:50%">Product</th>
                    <th style="width:10%">Price</th>
                    <th style="width:8%">Quantity</th>
                    <th style="width:22%" class="text-center">Subtotal</th>
                    <th style="width:10%"></th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0 @endphp
                @if(session('cart'))
                @foreach(session('cart') as $id => $details)
                @php $total += $details['price'] * $details['quantity'] @endphp
                <tr data-id="{{ $id }}">
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs">
                                <img src="{{ $details['image'] }}" width="100" height="100" class="img-responsive" />
                            </div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $details['name'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">${{ number_format($details['price'], 2) }}</td>
                    <td data-th="Quantity">
                        {{ $details['quantity'] }}
                    </td>
                    <td data-th="Subtotal" class="text-center">${{ number_format($details['price'] * $details['quantity'], 2) }}</td>
                    <td class="actions" data-th="">
                        <form action="/Product/delete/cart" method="get">
                            <input type="hidden" name="id" value="{{ $id }}">
                            <input type="submit" class="btn btn-danger" value="Remove">
                        </form>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="5" class="text-center">Your cart is empty.</td>
                </tr>
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" class="text-right">
                        <h3><strong>Total ${{ number_format($total, 2) }}</strong></h3>
                    </td>
                </tr>
                <tr>
                    <td colspan="5" class="text-right">
                        <a href="/client/Product" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                        <a href="/checkout" class="btn btn-primary "> checkout</a>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>