<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="bg-dark-subtle">
    <div class="container my-5">
        <div class="p-5 bg-body-tertiary rounded-3">
            <h1 class="text-success">Product List</h1>
            <div class="d-flex justify-content-end">
                <a href="/products/add" class="btn btn-outline-secondary btn-lg px-4 rounded-pill">
                    Add Product
                </a>
            </div>
            <ul class="list-group p-3">
                @csrf
                @foreach ($products as $product)
                    <li class="list-group-item list-group-item-action d-flex justify-content-between">
                        <div class="fs-4">
                            {{ $product->name }}
                        </div>
                        <span>
                            <form method="GET" action="/products/{{ $product->id }}">
                                <button type="submit" class="btn btn-outline-primary px-4 rounded-pill">View
                                    Info</button>
                            </form>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</body>

</html>
