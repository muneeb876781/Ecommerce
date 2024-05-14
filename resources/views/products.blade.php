{{-- @include('header') --}}
<!doctype html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ config('APP_NAME') }}</title>
//
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('../assets/modules/bootstrap-5.1.3/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('../assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('../assets/modules/fontawesome6.1.1/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('../assets/modules/boxicons/css/boxicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../assets/modules/apexcharts/apexcharts.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/elmma06n570gih5simypugr5mexr6mqv82cnbnodgqcxmpmg/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>


    <style>
        /* Custom CSS for button icons */
        .btn-link {
            text-decoration: none;
            padding: 0.25rem 0.5rem;
            border: none;
            background: none;
        }

        /* Align icons vertically */
        .btn-link i {
            vertical-align: middle;
        }

        /* Optional: Increase spacing between buttons */
        .btn-link+.btn-link {
            margin-left: 0.5rem;
        }

        .d-flex {
            display: flex;
        }

        .align-items-center {
            align-items: center;
        }

        .me-3 {
            margin-right: 0.75rem;
        }

        .mt-3 {
            margin-top: 1rem;
        }
    </style>

    <style>
        .d-flex {
            display: flex;
        }

        .align-items-center {
            align-items: center;
        }

        .me-3 {
            margin-right: 0.75rem;
        }

        .mt-3 {
            margin-top: 1rem;
        }

        .attribute-value {
            display: none;
            /* Hide by default */
        }

        .attribute-value.show {
            display: block;
            /* Show when added */
        }

        /* Style for the attribute value input */
        .attribute-value input[type="text"] {
            width: 150px;
            /* Adjust width as needed */
            padding: 5px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /* Style for the attribute value label */
        .attribute-value label {
            margin-right: 5px;
        }
    </style>

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
    @if (session('update_success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Product Successfully updated!',
                text: '{{ session('update_success') }}',
                confirmButtonText: 'Close'
            });
        </script>
    @endif
    @if (session('state_success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'State Successfully updated!',
                text: '{{ session('state_success') }}',
                confirmButtonText: 'Close'
            });
        </script>
    @endif
    @if (session('activate_success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'All State Successfully updated!',
                text: '{{ session('activate_success') }}',
                confirmButtonText: 'Close'
            });
        </script>
    @endif
    @if (session('deactivate_success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'All State Successfully updated!',
                text: '{{ session('deactivate_success') }}',
                confirmButtonText: 'Close'
            });
        </script>
    @endif
    @include('venderNav')
    <div class="content-start transition  ">
        <div class="container-fluid dashboard">
            <div class="content-header">
                <h1>Products</h1>
                <button id="showAllProductsBtn" class="btn btn-primary">ALL Products</button>
                <button id="showAddProductFormBtn" class="btn btn-primary">Add Product</button>
                <br>

                <div class="col-md-12">
                    <div id="allProducts" class="card">
                        <div class="card-header">
                            <h4>Products</h4>
                            <div class="btn-group" role="group">
                                <form action="{{ route('deactivateAllProducts') }}" method="post" class="mr-2">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="state" value="0">
                                    <button type="submit" class="btn btn-sm btn-danger">Deactivate All</button>
                                </form>
                                <form action="{{ route('activateAllProducts') }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="state" value="1">
                                    <button type="submit" class="btn btn-sm btn-success">Activate All</button>
                                </form>
                            </div>



                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="categoryTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="serial-number">No.</th>
                                            <th class="title">Image</th>
                                            <th class="title">Name</th>
                                            <th class="title">Description</th>
                                            <th class="ranking">Price</th>
                                            <th class="ranking">Category</th>
                                            <th class="ranking">Availability</th>
                                            <th class="ranking">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($products as $product)
                                            @php $serialNumber = 1; @endphp

                                            <tr>
                                                <td style="width: 5%" class="serial-number">{{ $serialNumber++ }}</td>
                                                <td style="width: 12%">
                                                    <a href="{{ route('singleProduct', ['id' => $product->id]) }}">

                                                        @if ($product->image_url)
                                                            <img style="widows: 70px; height: 70px;"
                                                                src="{{ asset('storage/uploads/' . $product->image_url) }}"
                                                                alt="{{ $product->name }}" class="rounded-circle">
                                                        @elseif (!$product->image_url && $product->remote_image_url)
                                                            <img class="img" src="{{ $product->remote_image_url }}"
                                                                alt="{{ $product->name }}" class="rounded-circle"
                                                                style="widows: 70px; height: 70px;">
                                                        @else
                                                            <span>No image available</span>
                                                        @endif
                                                    </a>
                                                </td>
                                                <td style="width: 10%">
                                                    {{ implode(' ', array_slice(explode(' ', $product->name), 0, 6)) }}
                                                    @if (str_word_count($product->name) > 10)
                                                        ...
                                                    @endif
                                                </td>
                                                <td style="width: 20%">{!! implode(' ', array_slice(explode(' ', $product->description), 0, 6)) !!}}
                                                    @if (str_word_count($product->description) > 10)
                                                        ...
                                                    @endif
                                                </td>
                                                <td style="width: 7%">{{ $product->price }}</td>
                                                <td style="width: 7%">{{ $product->category->name }}</td>
                                                <td style="width: 7%">
                                                    @if ($product->quantity > 0)
                                                        In Stock
                                                    @else
                                                        Out of Stock
                                                    @endif
                                                </td>
                                                <td style="width: 18%">
                                                    <strong>{{ $product->state == 1 ? 'Activated' : 'Deactivated' }}</strong>
                                                    <br>
                                                    <form
                                                        action="{{ route('toggleProductState', ['id' => $product->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="state"
                                                            value="{{ $product->state == 1 ? '0' : '1' }}">
                                                        <button type="submit"
                                                            class="btn btn-sm {{ $product->state == 1 ? 'btn-danger' : 'btn-success' }}">
                                                            {{ $product->state == 1 ? 'Deactivate' : 'Activate' }}
                                                        </button>
                                                    </form>
                                                </td>
                                                <td style="width: 19%">
                                                    {{-- <a class="btn btn-link text-primary" href="#"
                                                        title="View Details" data-bs-toggle="modal"
                                                        data-bs-target="#productDetailsModal"
                                                        onclick="showProductDetails('{{ $product->id }}', '{{ $product->name }}', '{{ $product->description }}', '{{ $product->price }}', '{{ $product->category->name }}')">
                                                        <i class="fas fa-eye"></i>
                                                    </a> --}}
                                                    <a class="btn btn-link text-primary"
                                                        href="{{ route('singleProduct', ['id' => $product->id]) }}">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    {{-- <a class="btn btn-link text-warning" href="#" title="Edit"
                                                        data-bs-toggle="modal" data-bs-target="#editProductModal"
                                                        onclick="prepareEditModal('{{ $product->id }}',
                                                            '{{ $product->name }}',
                                                            '{{ $product->description }}',
                                                            '{{ $product->price }}',
                                                            '{{ $product->discountedPrice }}',
                                                            '{{ $product->quantity }}',
                                                            '{{ $product->sku }}')">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a> --}}
                                                    <a href="{{ route('editproduct', ['id' => $product->id]) }}" class="btn btn-link text-warning">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>


                                                    <a class="btn btn-link text-warning" href="#" title="Edit">
                                                        <form style="display: inline"
                                                            action="{{ route('productdestroy', ['id' => $product->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            <button
                                                                onclick="return confirm('Are you sure you want to delete this product?')"
                                                                type="submit" class="btn btn-link text-danger"
                                                                style="padding: 0; border: none; background: none;">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </a>

                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="addProductForm" class="row" style="display: none;">
                    <form action="{{ route('storeproduct') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Information</h4>
                                    </div>
                                    <div class="card-body">
                                        <!-- Form fields for Product 1 -->
                                        <div class="mb-3">
                                            <label for="productName">Product Name:</label>
                                            <input class="form-control" type="text" id="productName"
                                                name="productName" placeholder="Enter Product Name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="productDescription">Product Description:</label>
                                            <textarea class="form-control" id="editor" name="productDescription" placeholder="Enter Product Description"></textarea>
                                        </div>
                                        {{-- <script>
                                            tinymce.init({
                                                selector: 'textarea',
                                                plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
                                                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                                                tinycomments_mode: 'embedded',
                                                tinycomments_author: 'Author name',
                                                height: 250,
                                                mergetags_list: [{
                                                        value: 'First.Name',
                                                        title: 'First Name'
                                                    },
                                                    {
                                                        value: 'Email',
                                                        title: 'Email'
                                                    },
                                                ],
                                                ai_request: (request, respondWith) => respondWith.string(() => Promise.reject(
                                                    "See docs to implement AI Assistant")),
                                            });
                                        </script> --}}
                                        <div class="mb-3">
                                            <label for="productSpecification">Product Description:</label>
                                            <textarea class="form-control" id="editor" name="productSpecification" placeholder="Enter Product Specification"></textarea>
                                        </div>
                                        <script src="https://cdn.tiny.cloud/1/elmma06n570gih5simypugr5mexr6mqv82cnbnodgqcxmpmg/tinymce/7/tinymce.min.js"
                                            referrerpolicy="origin"></script>
                                        <script>
                                            tinymce.init({
                                                selector: 'textarea',
                                                plugins: 'code table lists',
                                                toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table',
                                                height: 250
                                            });
                                        </script>
                                        {{-- <script>
                                            tinymce.init({
                                                selector: 'textarea',
                                                plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
                                                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                                                tinycomments_mode: 'embedded',
                                                tinycomments_author: 'Author name',
                                                height: 250,
                                                mergetags_list: [{
                                                        value: 'First.Name',
                                                        title: 'First Name'
                                                    },
                                                    {
                                                        value: 'Email',
                                                        title: 'Email'
                                                    },
                                                ],
                                                ai_request: (request, respondWith) => respondWith.string(() => Promise.reject(
                                                    "See docs to implement AI Assistant")),
                                            });
                                        </script> --}}
                                        <div class="mb-3">
                                            <label for="productCategory">Product Category:</label>
                                            <select class="form-control" id="productCategory" name="productCategory"
                                                class="form-control">
                                                <option value="">Select Category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="productSubCategory">Product Sub Category:</label>
                                            <select class="form-control" id="productSubCategory"
                                                name="productSubCategory" class="form-control">
                                                <option value="">Select Sub Category</option>
                                                @foreach ($subCategory as $subCategories)
                                                    <option value="{{ $subCategories->id }}">
                                                        {{ $subCategories->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="productBrand">Product Brand</label>
                                            <select class="form-control" id="productBrand" name="productBrand"
                                                class="form-control">
                                                <option value="">Select Product Brand</option>
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->id }}">
                                                        {{ $brand->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="productAttribute" class="me-3">Product Attribute:</label>
                                            <div class="d-flex align-items-center">
                                                <select class="form-control me-3" id="productAttribute"
                                                    name="productAttribute">
                                                    <option value="">Select Attributes</option>
                                                    @foreach ($productAttributes as $attributes)
                                                        <option value="{{ $attributes->id }}"
                                                            data-type="{{ $attributes->type }}">
                                                            {{ $attributes->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <button type="button" class="btn btn-info"
                                                    id="addAttributeValue">Add</button>
                                            </div>
                                            <div id="attributeValues" class="mt-3">
                                                <!-- Text areas for attribute values will be added here -->
                                            </div>
                                        </div>


                                        <script>
                                            document.getElementById('addAttributeValue').addEventListener('click', function() {
                                                var select = document.getElementById('productAttribute');
                                                var selectedOption = select.options[select.selectedIndex];
                                                var attributeId = selectedOption.value; // Get the attribute ID
                                                var attributeName = selectedOption.textContent; // Get the attribute name
                                                var attributeType = selectedOption.getAttribute('data-type');
                                                var attributeValuesDiv = document.getElementById('attributeValues');

                                                // Create label, input, and remove button elements
                                                var label = document.createElement('label');
                                                label.textContent = attributeName + ':';
                                                label.setAttribute('for', 'attributeValue_' + attributeId);
                                                var input = document.createElement('input');
                                                input.type = 'text';
                                                input.name = 'attributeValues[' + attributeId +
                                                    '][value]'; // Use attribute ID as the key in the input name
                                                input.id = 'attributeValue_' + attributeId;
                                                var removeButton = document.createElement('button');
                                                removeButton.textContent = 'Remove';
                                                removeButton.type = 'button';
                                                removeButton.classList.add('btn', 'btn-danger', 'ms-2');
                                                removeButton.addEventListener('click', function() {
                                                    attributeValuesDiv.removeChild(label);
                                                    attributeValuesDiv.removeChild(input);
                                                    attributeValuesDiv.removeChild(removeButton);
                                                });

                                                // Append label, input, and remove button to attributeValuesDiv
                                                attributeValuesDiv.appendChild(label);
                                                attributeValuesDiv.appendChild(input);
                                                attributeValuesDiv.appendChild(removeButton);

                                                // Add class to show the attribute value input
                                                input.classList.add('attribute-value', 'show');
                                            });
                                        </script>




                                        <div class="mb-3">
                                            <label for="productPrice">Product Price:</label>
                                            <input class="form-control" type="number" id="productPrice"
                                                name="productPrice" placeholder="Enter Product Price" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="productDiscountPrice">Product Discount Price:</label>
                                            <input class="form-control" type="number" id="productDiscountPrice"
                                                name="productDiscountPrice"
                                                placeholder="Enter Product Discounted Price">
                                        </div>
                                        <div class="mb-3">
                                            <label for="productQuantity">Product Quantity:</label>
                                            <input class="form-control" type="text" id="productQuantity"
                                                name="productQuantity" placeholder="Enter Product Quantity">
                                        </div>
                                        <div class="mb-3">
                                            <label for="productSKU">Product SKU:</label>
                                            <input class="form-control" type="text" id="productSKU"
                                                name="productSKU" placeholder="Enter Product SKU">
                                        </div>


                                    </div>

                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Media</h4>
                                    </div>
                                    <div class="card-body">
                                        <style>
                                            .uploadd-wrapper {
                                                position: relative;
                                                display: inline-block;
                                                width: 220px;
                                                height: 100px;
                                                margin-bottom: 15px;
                                                border: 2px dotted #ccc;
                                            }

                                            .uploadd-wrapper input[type=file] {
                                                position: absolute;
                                                top: 0;
                                                left: 0;
                                                width: 100%;
                                                height: 100%;
                                                opacity: 0;
                                                cursor: pointer;
                                            }

                                            .uploadd-wrapper label {
                                                position: absolute;
                                                top: 50%;
                                                left: 50%;
                                                transform: translate(-50%, -50%);
                                                color: #333;
                                                font-size: 16px;
                                            }
                                        </style>

                                        <label for="productImage">Product Main Image:</label>
                                        <div class="mb-3">
                                            <div class="upload-wrapper">
                                                <input class="form-control" style="border: none" type="file"
                                                    id="productImage" name="productImage"
                                                    onchange="updateLabel(this, 'imagePreview')">
                                                <label id="uploadLabel" for="productImage">Add Image</label>
                                                <img id="imagePreview" src="#"
                                                    style="display: none; width: auto; height: 100%;" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="productImageURL">Product Image URL (If no file
                                                    uploaded):</label>
                                                <input class="form-control" type="text" id="productImageURL"
                                                    name="productImageURL" placeholder="Enter Product Image URL">
                                            </div>
                                        </div>

                                        <script>
                                            function updateLabel(input, previewId) {
                                                var label = document.getElementById('uploadLabel');
                                                var preview = document.getElementById(previewId);
                                                if (input.files.length > 0) {
                                                    var reader = new FileReader();
                                                    reader.onload = function(e) {
                                                        preview.src = e.target.result;
                                                        preview.style.display = 'block';
                                                        label.style.display = 'none';
                                                    };
                                                    reader.readAsDataURL(input.files[0]);
                                                } else {
                                                    preview.src = '#';
                                                    preview.style.display = 'none';
                                                    label.style.display = 'block';
                                                }
                                            }
                                        </script>





                                        <style>
                                            .mb-3 {
                                                margin-bottom: 15px;
                                            }

                                            .upload-wrapper {
                                                position: relative;
                                                width: 200px;
                                                height: 100px;
                                                margin: 0 auto;
                                                border: 2px dotted #ccc;
                                                border-radius: 5px;
                                                overflow: hidden;
                                            }

                                            .upload-wrapper input[type=file] {
                                                position: absolute;
                                                top: 0;
                                                left: 0;
                                                width: 100%;
                                                height: 100%;
                                                opacity: 0;
                                                cursor: pointer;
                                            }

                                            .upload-wrapper label {
                                                position: absolute;
                                                top: 50%;
                                                left: 50%;
                                                transform: translate(-50%, -50%);
                                                color: #333;
                                                font-size: 16px;
                                            }

                                            .upload-wrapper {
                                                display: inline-block;
                                                width: calc(31.33% - 10px);
                                                margin-right: 10px;
                                                position: relative;
                                            }

                                            .upload-wrapper input[type=file] {
                                                position: absolute;
                                                top: 0;
                                                left: 0;
                                                width: 100%;
                                                height: 100%;
                                                opacity: 0;
                                                cursor: pointer;
                                            }

                                            .upload-wrapper label {
                                                position: absolute;
                                                top: 50%;
                                                left: 50%;
                                                transform: translate(-50%, -50%);
                                                color: #333;
                                                font-size: 16px;
                                            }
                                        </style>

                                        <div class="mb-3">
                                            <label for="productMediaImage">Product Media Gallery:</label>
                                            <div>
                                                <div class="upload-wrapper">
                                                    <input class="form-control" style="border: none" type="file"
                                                        id="productMedia1Image" name="productMedia1Image"
                                                        onchange="updateLabel(this, 'imagePreview1')">
                                                    <label for="productMedia1Image">Image 1</label>
                                                    <img id="imagePreview1" src="#"
                                                        style="display: none; width: 100px; height: 100px;" />
                                                </div>
                                                <div class="upload-wrapper">
                                                    <input class="form-control" style="border: none" type="file"
                                                        id="productMedia2Image" name="productMedia2Image"
                                                        onchange="updateLabel(this, 'imagePreview2')">
                                                    <label for="productMedia2Image">Image 2</label>
                                                    <img id="imagePreview2" src="#"
                                                        style="display: none; width: 100px; height: 100px;" />
                                                </div>
                                                <div class="upload-wrapper">
                                                    <input class="form-control" style="border: none" type="file"
                                                        id="productMedia3Image" name="productMedia3Image"
                                                        onchange="updateLabel(this, 'imagePreview3')">
                                                    <label for="productMedia3Image">Image 3</label>
                                                    <img id="imagePreview3" src="#"
                                                        style="display: none; width: 100px; height: 100px;" />
                                                </div>
                                            </div>
                                        </div>
                                        <script>
                                            function updateLabel(input, previewId) {
                                                var label = input.previousElementSibling;
                                                var preview = document.getElementById(previewId);
                                                if (input.files.length > 0) {
                                                    var reader = new FileReader();
                                                    reader.onload = function(e) {
                                                        preview.src = e.target.result;
                                                        preview.style.display = 'block';
                                                        label.style.display = 'none';
                                                    };
                                                    reader.readAsDataURL(input.files[0]);
                                                } else {
                                                    preview.src = '#';
                                                    preview.style.display = 'none';
                                                    label.style.display = 'block';
                                                }
                                            }
                                        </script>
                                        <div class="mb-3">
                                            <label for="media11mageURL">Product Media Image 1 URL (If no file
                                                uploaded):</label>
                                            <input class="form-control" type="text" id="media11mageURL"
                                                name="media11mageURL" placeholder="Enter Product Image URL">
                                        </div>
                                        <div class="mb-3">
                                            <label for="media12mageURL">Product Media Image 2 URL (If no file
                                                uploaded):</label>
                                            <input class="form-control" type="text" id="media12mageURL"
                                                name="media12mageURL" placeholder="Enter Product Image URL">
                                        </div>
                                        <div class="mb-3">
                                            <label for="media13mageURL">Product Media Image 3 URL (If no file
                                                uploaded):</label>
                                            <input class="form-control" type="text" id="media13mageURL"
                                                name="media13mageURL" placeholder="Enter Product Image URL">
                                        </div>
                                        <div class="mb-3">
                                            <label for="productVideo">Product Video:</label>
                                            <div class="photo">
                                                <input class="form-control" style="border: none" type="file"
                                                    id="productVideo" name="productVideo" accept="video/*">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="productVideoURL">Product Video URL (If no file
                                                uploaded):</label>
                                            <input class="form-control" type="text" id="productVideoURL"
                                                name="productVideoURL" placeholder="Enter Product Image URL">
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary">Add Product</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                {{-- <div class="uploadProducts" >
                    <form action="{{ route('storeProductsFile') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Upload Products</h4>
                                    </div>
                                    <div class="card-body">
                                        <label for="productFile">Product File Upload:</label>
                                        <div class="photo">
                                            <input class="form-control" style="border: none" type="file"
                                                id="productFile" name="productFile">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary">Upload File</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div> --}}
            </div>
        </div>
    </div>

    {{-- models --}}
    <!-- Product Details Modal -->
    <div class="modal fade" id="productDetailsModal" tabindex="-1" aria-labelledby="productDetailsModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productDetailsModalLabel">Product Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Product details will be loaded here dynamically -->
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editProductForm" action="#" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="editProductName" class="form-label">Product Name</label>
                                    <input type="text" class="form-control" id="editProductName"
                                        name="editProductName" value="">
                                </div>
                                <div class="mb-3">
                                    <label for="editProductDescription" class="form-label">Product Description</label>
                                    <input class="form-control" id="editProductDescription"
                                        name="editProductDescription"></input>
                                </div>
                                <div class="mb-3">
                                    <label for="editProductPrice" class="form-label">Product Price</label>
                                    <input type="number" class="form-control" id="editProductPrice"
                                        name="editProductPrice" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="editProductDiscountedPrice" class="form-label">Discounted
                                        Price</label>
                                    <input type="number" class="form-control" id="editProductDiscountedPrice"
                                        name="editProductDiscountedPrice" value="">
                                </div>
                                <div class="mb-3">
                                    <label for="editProductQuantity" class="form-label">Quantity</label>
                                    <input type="number" class="form-control" id="editProductQuantity"
                                        name="editProductQuantity" value="">
                                </div>
                                <div class="mb-3">
                                    <label for="editProductSKU" class="form-label">SKU</label>
                                    <input type="text" class="form-control" id="editProductSKU"
                                        name="editProductSKU" value="">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>






    <!-- DataTables Script -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            var toolsTable = $('#categoryTable').DataTable({
                "lengthMenu": [5, 10, 25, 50, -1],
                "pageLength": 50,
            });

            // Search input event
            $('#categoryTable').on('keyup', function() {
                toolsTable.search(this.value).draw();
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#showAllProductsBtn').on('click', function() {
                $('#allProducts').show();
                $('#addProductForm').hide();
            });

            $('#showAddProductFormBtn').on('click', function() {
                $('#allProducts').hide();
                $('#addProductForm').show();
            });
        });
    </script>
    <script>
        function showProductDetails(id, name, description, price, category) {
            var modalBody = document.querySelector('#productDetailsModal .modal-body');
            modalBody.innerHTML = `
                <p><strong>Name:</strong> ${name}</p>
                <p><strong>Description:</strong> ${description}</p>
                <p><strong>Price:</strong> ${price}</p>
                <p><strong>Category:</strong> ${category}</p>
            `;
        }
    </script>
    <script>
        function prepareEditModal(productId, productName, productDescription, productPrice, discountedPrice, quantity,
            sku) {
            // Update form fields with product details
            document.getElementById('editProductName').value = productName;
            document.getElementById('editProductDescription').value = productDescription;
            document.getElementById('editProductPrice').value = productPrice;
            document.getElementById('editProductDiscountedPrice').value = discountedPrice;
            document.getElementById('editProductQuantity').value = quantity;
            document.getElementById('editProductSKU').value = sku;

            // Update form action URL
            document.getElementById('editProductForm').action = `/products/${productId}`;
        }
    </script>





</body>


</html>


