{{-- @include('header') --}}
<!doctype html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Dashboard - Atrana</title>

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-5.1.3/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome6.1.1/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/boxicons/css/boxicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/apexcharts/apexcharts.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Banner Successfully added!',
                text: '{{ session('success') }}',
                confirmButtonText: 'Close'
            });
        </script>
    @endif
    @if (session('update_success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Category Successfully updated!',
                text: '{{ session('update_success') }}',
                confirmButtonText: 'Close'
            });
        </script>
    @endif
    @if (session('banner_del_success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Banner Successfully deleted!',
                text: '{{ session('banner_del_success') }}',
                confirmButtonText: 'Close'
            });
        </script>
    @endif
    @include('venderNav')
    <div class="content-start transition  ">
        <div class="container-fluid dashboard">
            <div class="content-header">
                <h1>Banners</h1>
                <button id="showAllCategoriesBtn" class="btn btn-primary">ALL Banners</button>
                <button id="showAddCategoryFormBtn" class="btn btn-primary">Add Banners</button>
                <br>

                <div class="col-md-12">
                    <div id="allCategories" class="card">
                        <div class="card-header">
                            <h4> Categories</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="categoryTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="serial-number">No.</th>
                                            <th class="title">Info</th>
                                            <th class="title">image</th>
                                            <th class="ranking">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $serialNumber = 1; @endphp
                                        @foreach ($banners as $banner)
                                            <tr>
                                                <td style="width: 5%" class="serial-number">{{ $serialNumber++ }}</td>
                                                <td style="width: 20%">
                                                    <strong>Brand: </strong>{{ $banner->brand ? $banner->brand->name : 'Not added' }} <br>
                                                    <strong>Category: </strong>{{ $banner->Category ? $banner->Category->name : 'Not added' }} <br>
                                                    <strong>Product: </strong>{{ $banner->Product ? $banner->Product->name : 'Not added' }} <br>
                                                    <strong>Type: </strong>{{ $banner->Type ? $banner->Type : 'Not added' }} <br>
                                                </td>
                                                <td style="width: 65%"><img style="width: 100%; height: auto;"
                                                        src="{{ asset('storage/uploads/' . $banner->image_url) }}"
                                                        alt="{{ $banner->remote_image_url }}"></td>

                                                <td style="width: 10%">
                                                    <a class="btn btn-link text-primary" href="#"
                                                        title="View Details" data-bs-toggle="modal"
                                                        data-bs-target="#categoryDetailsModal"
                                                        onclick="showCategoryDetails('{{ $banner->image_url }}', '{{ $banner->remote_image_url }}')">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a class="btn btn-link text-warning" href="#" title="Edit"
                                                        data-bs-toggle="modal" data-bs-target="#editCategoryModal"
                                                        onclick="prepareEditCategoryModal('{{ $banner->id }}', '{{ $banner->image_url }}', '{{ $banner->remote_image_url }}')">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>


                                                    <a class="btn btn-link text-warning" href="#" title="Edit">
                                                        <form style="display: inline"
                                                            action="{{ route('bannerDestroy', ['id' => $banner->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button
                                                                onclick="return confirm('Are you sure you want to delete this Banner?')"
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

                <div id="addCategoryForm" class="row" style="display: none">
                    <form class="main_form" action="{{ route('storeBanner') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Information</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="bannerBrand">Banner Brand:</label>
                                            <select class="form-control" id="bannerBrand" name="bannerBrand"
                                                class="form-control">
                                                <option value="">Select Brand</option>
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->id }}">{{ $brand->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="bannerCategory">Banner Category:</label>
                                            <select class="form-control" id="bannerCategory" name="bannerCategory"
                                                class="form-control">
                                                <option value="">Select Category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="bannerProduct">Banner Product:</label>
                                            <select class="form-control" id="bannerProduct" name="bannerProduct"
                                                class="form-control">
                                                <option value="">Select Product</option>
                                                @foreach ($products as $product)
                                                    <option value="{{ $product->id }}">{{ $product->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="bannerType">Banner Type:</label>
                                            <select class="form-control" id="bannerType" name="bannerType" class="form-control">
                                                <option value="">Select Banner Type</option>
                                                <option value="main">Main Banners</option>
                                                <option value="sales">Sales Banners</option>
                                            </select>
                                        </div>
                                        
                                    </div>



                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Media</h4>
                                    </div>
                                    <div class="mb-3">
                                        <label for="BannerImage">Banner Image:</label>
                                        <div class="photo">
                                            <input class="form-control" style="border: none" type="file"
                                                id="BannerImage" name="BannerImage">
                                        </div>
                                        <br>
                                        <div class="mb-3">
                                            <label for="bannerRemoteImage">Banner Media Image URL (If no file
                                                uploaded):</label>
                                            <input class="form-control" type="text" id="bannerRemoteImage"
                                                name="bannerRemoteImage" placeholder="Enter Banner Image URL">
                                        </div>
                                    </div>

                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary">Add Banner</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Category Details Modal -->
    <div class="modal fade" id="categoryDetailsModal" tabindex="-1" aria-labelledby="categoryDetailsModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="categoryDetailsModalLabel">Category Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Name:</strong> <span id="categoryName"></span></p>
                    <p><strong>Description:</strong> <span id="categoryDescription"></span></p>
                    <!-- Add other category details here -->
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Category Modal -->
    <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCategoryModalLabel">Edit Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editCategoryForm" action="#" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="editCategoryName" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="editCategoryName"
                                name="editCategoryName">
                        </div>
                        <div class="mb-3">
                            <label for="editCategoryDescription" class="form-label">Category Description</label>
                            <textarea class="form-control" id="editCategoryDescription" name="editCategoryDescription"></textarea>
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
            $('#showAllCategoriesBtn').on('click', function() {
                $('#allCategories').show();
                $('#addCategoryForm').hide();
            });

            $('#showAddCategoryFormBtn').on('click', function() {
                $('#allCategories').hide();
                $('#addCategoryForm').show();
            });
        });
    </script>
    <script>
        function showCategoryDetails(name, description) {
            document.getElementById('categoryName').innerText = name;
            document.getElementById('categoryDescription').innerText = description;
            // Add other category details if needed
        }
    </script>
    <script>
        function prepareEditCategoryModal(categoryId, categoryName, categoryDescription) {
            document.getElementById('editCategoryName').value = categoryName;
            document.getElementById('editCategoryDescription').value = categoryDescription;

            document.getElementById('editCategoryForm').action = `/categories/${categoryId}`;
        }
    </script>


</body>


</html>
