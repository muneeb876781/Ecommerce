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


</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Attribute Successfully added!',
                text: '{{ session('success') }}',
                confirmButtonText: 'Close'
            });
        </script>
    @endif
    @if (session('update_success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Attribute Successfully updated!',
                text: '{{ session('update_success') }}',
                confirmButtonText: 'Close'
            });
        </script>
    @endif
    @include('venderNav')
    <div class="content-start transition  ">
        <div class="container-fluid dashboard">
            <div class="content-header">
                <h1> Attributes</h1>
                <button id="showAllCategoriesBtn" class="btn btn-primary">ALL Attributes</button>
                <button id="showAddCategoryFormBtn" class="btn btn-primary">Add Attributes</button>
                <br>

                <div class="col-md-12">
                    <div id="allCategories" class="card">
                        <div class="card-header">
                            <h4>Attributes</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="categoryTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="serial-number">No.</th>
                                            <th class="title">Name</th>
                                            <th class="ranking">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $serialNumber = 1; @endphp
                                        @foreach ($productAttributes as $attribute)
                                            <tr>
                                                <td style="width: 10%" class="serial-number">{{ $serialNumber++ }}</td>
                                                <td style="width: 15%">{{ $attribute->name }}</td>
                                                <td style="width: 20%">
                                                    <a class="btn btn-link text-primary" href="#"
                                                        title="View Details" data-bs-toggle="modal"
                                                        data-bs-target="#categoryDetailsModal"
                                                        onclick="showCategoryDetails('{{ $attribute->name }}')">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a class="btn btn-link text-warning" href="#" title="Edit"
                                                        data-bs-toggle="modal" data-bs-target="#editCategoryModal"
                                                        onclick="prepareEditCategoryModal('{{ $attribute->id }}', '{{ $attribute->name }}')">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>


                                                    <a class="btn btn-link text-warning" href="#" title="Edit">
                                                        <form style="display: inline"
                                                            action="{{ route('categorydestroy', ['id' => $attribute->id]) }}"
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
                    <form class="main_form" action="{{ route('storeAttribute') }}" method="post" enctype="multipart/form-data">
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
                                            <label for="attributeName">Attribute Name:</label>
                                            <input class="form-control" type="text" id="attributeName"
                                                name="attributeName" placeholder="Enter Attribute Name">
                                        </div>
                                        <button class="btn btn-primary">Add Attribute</button>
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
                    <h5 class="modal-title" id="editCategoryModalLabel">Edit Attribute</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editAttribute" action="#" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="attributeName" class="form-label">Attribute Name</label>
                            <input type="text" class="form-control" id="editCategoryName"
                                name="editCategoryName">
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

            document.getElementById('editCategoryForm').action = `/productAttributes/${categoryId}`;
        }
    </script>


</body>


</html>
