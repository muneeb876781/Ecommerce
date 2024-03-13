@include('navbar');
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet"> --}}

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <title>Document</title>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Product Successfully added!',
                text: '{{ session('success') }}',
                showCancelButton: true,
                confirmButtonText: 'Add another',
                cancelButtonText: 'Close'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to view cart page
                    window.location.href = '{{ route('productview') }}';
                }
            });
        </script>
    @endif
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            @include('sellerNavbar')
        </nav>
        <div id="content">
            <h1 style="text-align: center">Add Products</h1>
            <div class="product_categories">
                <div class="category">
                    <a href="{{ route('productview') }}" class="category_toggle">All Products</a>
                </div>
                <div class="category">
                    <a href="{{ route('addproduct') }}" class="category_toggle">Add Products</a>

                </div>

            </div>

            <div class="add_product_form">
                <form class="main_form" action="{{ route('storeproduct') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form_left">
                        <label for="productName">Product Name:</label>
                        <input type="text" id="productName" name="productName" placeholder="Enter Product Name">
                        <label for="productDescription">Product Description:</label>
                        <textarea id="productDescription" name="productDescription" placeholder="Enter Product Description"></textarea>

                        <label for="productPrice">Product Price:</label>
                        <input type="text" id="productPrice" name="productPrice" placeholder="Enter Product Price">
                        <label for="productCategory">Product Category:</label>
                        <select id="productCategory" name="productCategory" class="form-control">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form_right">
                        <label for="productImage">Product Image:</label>
                        <dic class="photo">
                            <input style="border: none" type="file" id="productImage" name="productImage">
                        </dic>
                        <label for="productVideo">Product Video:</label>
                        <dic class="video">
                            <input style="border: none" type="file" id="productVideo" name="productVideo"
                                accept="video/*">
                        </dic>
                        <label for="productQuantity">Product Quantity:</label>
                        <input type="text" id="productQuantity" name="productQuantity"
                            placeholder="Enter Product Quantity">
                        <label for="productSKU">Product SKU:</label>
                        <input type="text" id="productSKU" name="productSKU" placeholder="Enter Product SKU">
                        <div class="formbtn">
                            <button type="submit">Add Product</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>



</body>

</html>
