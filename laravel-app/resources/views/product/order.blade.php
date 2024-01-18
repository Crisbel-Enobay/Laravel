<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="bg-dark-subtle">
    <div class="container py-4">
        <header class="mb-4 border-bottom">
            <a href="/" class="text-decoration-none">
                <span class="fs-4">back</span>
            </a>
        </header>

        <div class="row align-items-stretch p-md-5">
            <div class="col-6">
                <img class="bd-placeholder-img card-img-top" width="50%" height="400"
                    src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->product_name }}">
            </div>
            <div class="col-6 mt-4 mt-md-0">
                <form method="POST" action="/orders" onsubmit="return confirmSubmit()">
                    @csrf
                    <div class="h-100 p-3 p-md-5 bg-body-secondary border rounded-3">
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div class="d-flex justify-content-between">
                            <h3 class="fs-5">{{ $product->product_name }}</h3>
                            <span class="text-md-body-secondary" id="totalPrice"> ₱
                                {{ $product->price }}.00 </span>
                            <input type="hidden" id="price" name="price" value="{{ $product->price }}">
                        </div>
                        <div class="input-group mb-2 mt-4 border rounded-3 border-dark-subtle">
                            <span class="input-group-text bg-dark-subtle">
                                Qty</span>
                            <input type="number" name="quantity" id="quantity" value="1" min="1"
                                class="form-control">
                            <!-- Error Message -->
                            @error('quantity')
                                <span class="text-danger lead mb-1" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        <div class="input-group mb-2 border border-dark-subtle rounded-3">
                            <span class="input-group-text bg-dark-subtle">
                                Name of Buyer:</span>
                            <input type="text" class="form-control" name="buyer_name">
                        </div>
                        <!-- Error Message -->
                        @error('buyer_name')
                            <span class="text-danger lead mb-1" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                        <div class="input-group mb-2 border border-dark-subtle rounded-3">
                            <span class="input-group-text bg-dark-subtle">
                                Contact Number: </span>
                            <input type="tel" class="form-control" name="mobile_number" maxlength="11"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                        </div>
                        <!-- Error Message -->
                        @error('mobile_number')
                            <span class="text-danger lead mb-1" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                        <div class="d-flex justify-content-end mt-4">
                            <button class="btn btn-outline-primary" type="submit">Submit</button>
                        </div>
                        <!-- Alert Success -->
                        {{-- @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif --}}
                    </div>
                </form>
            </div>
        </div>
        <footer class="mt-4 pt-4 border-top">
            © Crisbel Enobay
        </footer>
    </div>
    <!-- Bootstrap Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel"
        aria-hidden="true">
        <div class="container">
            <div class="alert alert-success mt-2 d-flex justify-content-between"><span>Order sent to email.</span>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
        </div>
    </div>
    {{-- <script>
        document.getElementById('quantity').addEventListener('input', function() {
            const quantity = parseInt(this.value, 10);
            const price = parseFloat({{ $product->price }});

            if (!isNaN(price)) {
                const totalPrice = quantity * price;
                const totalPriceSpan = document.getElementById('totalPrice');

                if (totalPriceSpan) {
                    totalPriceSpan.textContent = `₱ ${totalPrice.toFixed(2)}`;
                    // Update the value attribute of the price span
                    document.getElementById('price').value = totalPrice.toFixed(2);
                }
            }
        });
    </script> --}}
    <script>
        function confirmSubmit() {
            // Validate buyer name and contact number
            var buyerName = document.getElementsByName('buyer_name')[0].value;
            var contactNumber = document.getElementsByName('mobile_number')[0].value;

            if (buyerName.trim() === '' || contactNumber.trim() === '') {
                // Show error message
                alert('Buyer name and contact number are required.');
                return false; // Prevent form submission
            }
            // Display a confirmation modal
            if (confirm('Are you sure you want to submit this order?')) {
                // Show the Bootstrap modal
                var successModal = document.getElementById('successModal');
                successModal.classList.add('show');
                successModal.style.display = 'block';

                // Hide the modal after 3 seconds
                setTimeout(() => {
                    successModal.classList.remove('show');
                    successModal.style.display = 'none';
                }, 3000);

                return true; // Allow form submission
            } else {
                return false; // Prevent form submission
            }
        }
        document.getElementById('quantity').addEventListener('input', function() {
            const quantity = parseInt(this.value, 10);
            const price = parseFloat({{ $product->price }});

            const totalPrice = quantity * price;
            const displayedPrice = document.getElementById('totalPrice');

            displayedPrice.textContent = `₱ ${totalPrice.toFixed(2)}`;
            document.getElementById('price').value = totalPrice.toFixed(2);
        });
    </script>
    {{-- <script>
        var successAlert = document.querySelector('.alert-success');
        if (successAlert) {
            setTimeout(() => {
                successAlert.style.display = "none";
            }, 3000);
        }
    </script> --}}


</body>

</html>
