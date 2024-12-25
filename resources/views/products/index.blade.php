<!-- resources/views/products/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Catalog</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>

    <div class="container">
        <h1 class="my-4">Product Catalog</h1>

        @if(Auth::check())
            <h3>Welcome, {{ Auth::user()->name }}! Role: {{ Auth::user()->role }}</h3>

            <!-- Display product list here -->
            @if($products->isEmpty())
                <p>No products available at the moment.</p>
            @else
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text">{{ $product->description }}</p>
                                    <p class="card-text">Price: ${{ number_format($product->price, 2) }}</p>
                                    <a href="{{ route('checkout.show', $product->id) }}" class="btn btn-primary">Checkout</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <!-- Admin section -->
            @if(Auth::user()->role === 'admin')
                <h2 class="mt-4">Admin Section</h2>
                <a href="{{ route('admin.products.create') }}" class="btn btn-success">Add New Product</a>
            @endif

        @else
            <p>You need to <a href="{{ route('login') }}">Login</a> to view the catalog.</p>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
