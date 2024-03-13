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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background-color: #fff;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 600px;
            position: relative;
        }

        .product-info {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            widows: 90%;
        }

        .product-info p {
            text-align: center;
        }

        /* Close Button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .modal-body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            widows: 100%;
            padding: 10px;
        }

        .modal-body form {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            widows: 100%;
            padding: 10px;
        }

        .modal-body label {
            color: rgba(0, 0, 0, 0.6);
            display: inline-block;
        }

        .modal-body input {
            padding: 10px;
            margin: 10px;
            widows: 90&;
        }
    </style>

    <style>
        .category a.active {
            font-weight: bold;
        }
    </style>

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
                confirmButtonText: 'Close'
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
                    <a href="#" id="toggle-product-view">All Products</a>
                </div>
                <div class="category">
                    <a href="#" id="toggle-add-product">Add Products</a>
                </div>

            </div>
            <div id="product-view-section" class="products_data">
                <div class="container">
                    <table id="openhouse" class="myTable">
                        <thead>
                            <tr>
                                <th class="serial-number">No.</th>
                                <th class="title">Image</th>
                                <th class="title">Name</th>
                                <th class="ranking">Price</th>
                                <th class="ranking">Category</th>
                                <th class="ranking">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $serialNumber = 1; @endphp
                            @foreach ($products as $product)
                                <tr>
                                    <td class="serial-number">{{ $serialNumber++ }}</td>
                                    <td><img src="{{ asset($product->image_url) }}" alt="{{ $product->name }}"
                                            class="rounded-circle"></td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>
                                        <form style="display: inline"
                                            action="{{ route('productdestroy', ['id' => $product->id]) }}"
                                            method="POST">
                                            @csrf
                                            <button
                                                onclick="return confirm('Are you sure you want to delete this product?')"
                                                type="submit" class="btn btn-link"><i
                                                    class="fas fa-trash"></i></button>
                                        </form>
                                        <a href="#" title="View" class="view-product"><i
                                                class="fas fa-eye"></i></a>

                                        <div id="myModal" class="modal">
                                            <div class="modal-content">
                                                <span class="close">&times;</span>
                                                <h2>Product Details</h2>
                                                <div class="product-info">
                                                    <img src="{{ asset($product->image_url) }}"
                                                        alt="{{ $product->name }}" class="product-image">
                                                    <h5>{{ $product->name }}</h5>
                                                    <p>{{ $product->description }}</p>
                                                    <p><b>Price:</b> {{ $product->price }}</p>
                                                    <p><b>Category:</b> {{ $product->category->name }}</p>
                                                </div>
                                            </div>
                                        </div>


                                        <a href="#" title="Edit" data-toggle="modal"
                                            data-target="#editModal{{ $product->id }}"><i
                                                class="fas fa-pencil-alt"></i></a>
                                        @foreach ($products as $product)
                                            <div class="modal fade" id="editModal{{ $product->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="editModalLabel{{ $product->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="editModalLabel{{ $product->id }}">Edit Product
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form
                                                                action="{{ route('productupdate', ['id' => $product->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <label for="name">Name</label>
                                                                <input type="text" name="name"
                                                                    value="{{ $product->name }}">
                                                                <label for="desc">Description</label>
                                                                <input type="text" name="desc"
                                                                    value="{{ $product->description }}">
                                                                <label for="productCategory">Categories</label>
                                                                <select id="productCategory" name="productCategory"
                                                                    class="form-control">
                                                                    <option value="">Select Category</option>
                                                                    @foreach ($categories as $category)
                                                                        <option value="{{ $category->id }}">
                                                                            {{ $category->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <label for="price">Price</label>
                                                                <input type="text" name="price"
                                                                    value="{{ $product->price }}">
                                                                <button type="submit">Save Changes</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                        {{-- <a href="{{ route('productdestroy', ['id' => $product->id]) }}"
                                            onclick="return confirm('Are you sure you want to delete this product?')"
                                            title="Delete"><i class="fas fa-trash"></i></a> --}}




                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <script>
                        function confirmDelete(id) {
                            if (confirm('Are you sure you want to delete this category?')) {
                                document.getElementById('delete-form-' + id).submit();
                            }
                        }
                    </script>

                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

                    <script>
                        $(document).ready(function() {
                            var toolsTable = $('#openhouse').DataTable({
                                "lengthMenu": [5, 10, 25, 50, -1],
                                "pageLength": 10,
                            });

                            // Search input event
                            $('#openhouse').on('keyup', function() {
                                toolsTable.search(this.value).draw();
                            });
                        });
                    </script>
                    <script>
                        // Get the modal
                        var modal = document.getElementById('myModal');

                        // Get the <span> element that closes the modal
                        var span = document.getElementsByClassName("close")[0];

                        // When the user clicks on the button, open the modal
                        $(".view-product").click(function() {
                            modal.style.display = "block";
                        });

                        // When the user clicks on <span> (x), close the modal
                        span.onclick = function() {
                            modal.style.display = "none";
                        };

                        // When the user clicks anywhere outside of the modal, close it
                        window.onclick = function(event) {
                            if (event.target == modal) {
                                modal.style.display = "none";
                            }
                        };
                    </script>


                </div>
            </div>

            <div id="add-product-section" style="display: none;" class="add_product_form">
                <form class="main_form" action="{{ route('storeproduct') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form_left">
                        <label for="productName">Product Name:</label>
                        <input type="text" id="productName" name="productName" placeholder="Enter Product Name">
                        <label for="productDescription">Product Description:</label>
                        <textarea id="productDescription" name="productDescription" placeholder="Enter Product Description"></textarea>

                        <label for="productPrice">Product Price:</label>
                        <input type="number" id="productPrice" name="productPrice"
                            placeholder="Enter Product Price" required>
                        <label for="productDiscountPrice">Product Discounted Price:</label>
                        <input type="number" id="productDiscountPrice" name="productDiscountPrice"
                            placeholder="Enter Product Discounted Price">

                        
                        <label for="productQuantity">Product Quantity:</label>
                        <input type="text" id="productQuantity" name="productQuantity"
                            placeholder="Enter Product Quantity">
                        <label for="productSKU">Product SKU:</label>
                        <input type="text" id="productSKU" name="productSKU" placeholder="Enter Product SKU">
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
                        <div class="photo">
                            <input style="border: none" type="file" id="productImage" name="productImage">
                        </div>
                        <label for="productMediaImage">Product Media Gallary:</label>
                        <div class="photo">
                            <input style="border: none" type="file" id="productMedia1Image"
                                name="productMedia1Image">
                        </div>
                        <div class="photo">
                            <input style="border: none" type="file" id="productMedia2Image"
                                name="productMedia2Image">
                        </div>
                        <div class="photo">
                            <input style="border: none" type="file" id="productMedia3Image"
                                name="productMedia3Image">
                        </div>
                        {{-- <label for="productVideo">Product Video:</label>
                        <div class="video">
                            <input style="border: none" type="file" id="productVideo" name="productVideo"
                                accept="video/*">
                        </div> --}}

                        <div class="formbtn">
                            <button type="submit">Add Product</button>
                        </div>
                    </div>
                </form>
                <script>
                    document.querySelector('form').addEventListener('submit', function(event) {
                        var originalPrice = parseFloat(document.getElementById('productPrice').value);
                        var discountedPriceInput = document.getElementById('productDiscountPrice');
                        var discountedPrice = discountedPriceInput.value ? parseFloat(discountedPriceInput.value) : null;
                
                        if (discountedPrice !== null && discountedPrice > originalPrice) {
                            alert('Discounted price must be less than or equal to the original price');
                            event.preventDefault();
                        }
                    });
                </script>
                
            </div>

        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const productViewSection = document.getElementById('product-view-section');
            const addProductSection = document.getElementById('add-product-section');
            const toggleProductView = document.getElementById('toggle-product-view');
            const toggleAddProduct = document.getElementById('toggle-add-product');

            toggleProductView.addEventListener('click', function() {
                productViewSection.style.display = 'block';
                addProductSection.style.display = 'none';

                // Add active class to clicked link and remove from the other link
                toggleProductView.classList.add('active');
                toggleAddProduct.classList.remove('active');
            });

            toggleAddProduct.addEventListener('click', function() {
                productViewSection.style.display = 'none';
                addProductSection.style.display = 'block';

                // Add active class to clicked link and remove from the other link
                toggleAddProduct.classList.add('active');
                toggleProductView.classList.remove('active');
            });
        });
    </script>




</body>

</html>
