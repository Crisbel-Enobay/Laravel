<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js']);
</head>

<body class="bg-dark-subtle">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-3">
            @forelse($products as $product)
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="{{ asset('storage/' . $product->image_path) }}" alt="" width="100%"
                            height="225" data-bs-toggle="modal" data-bs-target="#myProduct{{ $product->id }}">
                        <div class="card-body">
                            <p class="card-text">{{ $product->product_name }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <form method="GET" action="/products/{{ $product->id }}">
                                    @csrf
                                    <button class="btn btn-sm btn-outline-primary">Order Item</button>
                                </form>
                                <small class="text-body-secondary">P{{ $product->price }}.00</small>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end of col --}}
                {{-- modal --}}
                <div class="modal fade" id="myProduct{{ $product->id }}">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5">{{ $product->product_name }}</h1>
                                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="{{ asset('storage/' . $product->image_path) }}" alt="" width="100%"
                                    height="300">
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p>No Products Available.</p>
            @endforelse
        </div>
    </div>
</body>

</html>
