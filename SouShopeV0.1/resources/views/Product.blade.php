<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">
        <div class="card">
            <img src="{{$Product->image}}" class="card-img-top" alt="{{ $Product->titre }}">
            <div class="card-body">
                <h5 class="card-title">{{ $Product->titre }}</h5>
                <p class="card-text"><strong>Type:</strong> {{ $Product->type }}</p>
                <p class="card-text"><strong>Price:</strong> ${{ number_format($Product->price, 2) }}</p>
                <p class="card-text"><strong>Quantity:</strong> {{ $Product->quantityInStock }} guests</p>
                <p class="card-text"><strong>Description:</strong> {{ $Product->description }}</p>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-md-4">
                        <a href="/client/Product" class="btn btn-secondary">retourne au catalog des Products</a>
                        <!-- <a href="/Product/add/cart" class="btn btn-primary">add to cart</a> -->
                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-5">
                        <div class="row">
                            
                                <form action="/Product/add/cart" method='get'>
                                    <input type="hidden" id="Product_id" class="fadeIn second" name="ProductId" placeholder="id" value="{{ $Product->id }}">
<!--                         
                           <input type="number" id="quantity" name="quantity" value="1" min="1"
                                    class="w-24 p-3 border border-gray-300 rounded-lg text-center shadow-sm focus:ring focus:ring-blue-300"> -->
                                <input type="submit" name="submit" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-green-600" value="add to cart">
                                </form>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>