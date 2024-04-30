{{-- @include('header') --}}
<!doctype html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Dashboard - Atrana</title>

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



</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Category Successfully added!',
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

    @if (session('state_success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Status Successfully updated!',
                text: '{{ session('state_success') }}',
                confirmButtonText: 'Close'
            });
        </script>
    @endif
    @if (session('activate_success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'All States Successfully updated!',
                text: '{{ session('state_success') }}',
                confirmButtonText: 'Close'
            });
        </script>
    @endif
    @if (session('deactivate_success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'All States Successfully updated!',
                text: '{{ session('state_success') }}',
                confirmButtonText: 'Close'
            });
        </script>
    @endif
    @include('venderNav')
    <div class="content-start transition  ">
        <div class="container-fluid dashboard">
            <div class="content-header">
                <h1>Categories</h1>
                <button id="showAllCategoriesBtn" class="btn btn-primary">ALL Categories</button>
                <button id="showAddCategoryFormBtn" class="btn btn-primary">Add Category</button>
                <br>

                <div class="col-md-12">
                    <div id="allCategories" class="card">
                        <div class="card-header">
                            <h4>Categories</h4>
                            <div class="btn-group" role="group">
                                <form action="{{ route('deactivateAllCategories') }}" method="post" class="mr-2">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="state" value="0">
                                    <button type="submit" class="btn btn-sm btn-danger">Deactivate All</button>
                                </form>
                                <form action="{{ route('activateAllCategories') }}" method="post">
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
                                            <th class="ranking">Description</th>
                                            <th class="title">State</th>
                                            <th class="ranking">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $serialNumber = 1; @endphp
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td style="width: 10%" class="serial-number">{{ $serialNumber++ }}</td>
                                                <td style="width: 15%"><img style="width: 100px; height: 100px;"
                                                        src="{{ asset('storage/uploads/' . $category->image_url) }}"
                                                        alt="{{ $category->name }}" class="rounded-circle"></td>
                                                <td style="width: 10%"><strong>{{ $category->name }}</strong> <br>
                                                </td>
                                                <td style="width: 35%">{!! $category->description !!}</td>
                                                <td style="width: 10%">
                                                    <strong>{{ $category->state == 1 ? 'Activated' : 'Deactivated' }}</strong>
                                                    <br>
                                                    <form
                                                        action="{{ route('toggleCategoryState', ['id' => $category->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="state"
                                                            value="{{ $category->state == 1 ? '0' : '1' }}">
                                                        <button type="submit"
                                                            class="btn btn-sm {{ $category->state == 1 ? 'btn-danger' : 'btn-success' }}">
                                                            {{ $category->state == 1 ? 'Deactivate' : 'Activate' }}
                                                        </button>
                                                    </form>
                                                </td>
                                                <td style="width: 20%">
                                                    <a class="btn btn-link text-primary" href="#"
                                                        title="View Details" data-bs-toggle="modal"
                                                        data-bs-target="#categoryDetailsModal"
                                                        onclick="showCategoryDetails('{{ $category->name }}', '{{ $category->description }}')">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a class="btn btn-link text-warning" href="#" title="Edit"
                                                        data-bs-toggle="modal" data-bs-target="#editCategoryModal"
                                                        onclick="prepareEditCategoryModal('{{ $category->id }}', '{{ $category->name }}', '{{ $category->description }}')">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>


                                                    <a class="btn btn-link text-warning" href="#" title="Edit">
                                                        <form style="display: inline"
                                                            action="{{ route('categorydestroy', ['id' => $category->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            <button
                                                                onclick="return confirm('Are you sure you want to delete this Category?')"
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
                    <form class="main_form" action="{{ route('storeCategories') }}" method="post"
                        enctype="multipart/form-data">
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
                                            <label for="CategoriesName">Categories Name:</label>
                                            <input class="form-control" type="text" id="CategoriesName"
                                                name="CategoriesName" placeholder="Enter Categories Name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="CategoriesDescription">Categories Description:</label>
                                            <textarea class="form-control" id="editor" name="CategoriesDescription" placeholder="Enter Product Description"></textarea>
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
                                    </div>

                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Media</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="CategoryImage">Category Image:</label>
                                            <dic class="photo">
                                                <input class="form-control" style="border: none" type="file"
                                                    id="CategoryImage" name="CategoryImage">
                                            </dic>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary">Add Category</button>
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
