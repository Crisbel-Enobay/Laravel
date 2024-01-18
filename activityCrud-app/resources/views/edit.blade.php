<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home View</title>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="bg-dark-subtle">
    <div class="container my-5">
        <div class="d-flex justify-content-center">
            <div class="col-6 p-5 bg-body-tertiary rounded-3">
                <div class="mb-3 mt-0">
                    <a href="/products">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-arrow-left-circle text-secondary" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                        </svg>
                    </a>
                </div>
                <h1 class="text-primary">Edit Product</h1>
                <form method="POST" action="/products/{{ $product->id }}">
                    @method('PATCH')
                    @csrf
                    <div class="mb-3">
                        <label for="productName" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control border border-primary-subtle rounded-3"
                            id="productName" value="{{ $product->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="productPrice" class="form-label">Price</label>
                        <input type="text" name="price" class="form-control border border-primary-subtle rounded-3"
                            id="productPricePrice" value="{{ $product->price }}">
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-outline-primary btn-sm px-4 rounded-pill ms-2">save
                            changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
