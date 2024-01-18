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
                <h1 class="text-primary">Product Info</h1>
                <form method="POST" action="/products">
                    @csrf
                    <ul class="list-group p-3">
                        @csrf
                        <li class="list-group-item list-group-item-action d-flex justify-content-around">
                            <div class="fs-5">
                                Name:
                            </div>
                            <span class="fs-5">
                                {{ $product->name }}
                            </span>
                        </li>
                        <li class="list-group-item list-group-item-action d-flex justify-content-around">
                            <div class="fs-5">
                                Price:
                            </div>
                            <span class="fs-5">
                                {{ $product->price }}
                            </span>
                        </li>
                    </ul>
                </form>
                <div class="d-flex justify-content-end">
                    <a href="/products/{{ $product->id }}/edit"
                        class="btn btn-outline-primary btn-sm px-4 rounded-pill ms-2">
                        edit
                    </a>
                    <form method="POST" action="/products/{{ $product->id }}">
                        @method('DELETE')
                        @csrf
                        <button type="submit"
                            class="btn btn-outline-danger btn-sm px-4 rounded-pill ms-2">delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
