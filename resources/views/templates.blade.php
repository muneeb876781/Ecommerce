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
    @include('venderNav')
    <div class="content-start transition  ">
        <div class="container-fluid dashboard">
            <div class="content-header">
                <h1>Templates</h1>
                <button id="showAllCategoriesBtn" class="btn btn-primary">ALL Categories</button>
                <button id="showAddCategoryFormBtn" class="btn btn-primary">Add Category</button>
                <br>
                <br>

                <div class="col-md-12">
                    <div id="allCategories" class="card">
                        <div class="row">
                            @foreach ($Templates as $Template)
                                <div class="card col-xl-4 col-md-6 col-sm-12">
                                    <div class="card-content">
                                        <div class="card-body pb-2 pt-3 mb-3">
                                            <h4 class="card-title">
                                                {{ $Template->name }}
                                                <a class="btn btn-link text-warning" href="#" title="Edit"
                                                    data-bs-toggle="modal" data-bs-target="#editTemplateModal"
                                                    onclick="prepareEditTemplateModal('{{ $Template->id }}', '{{ $Template->name }}', '{{ $Template->image1_url }}')">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                            </h4>

                                        </div>
                                        <img class="img-fluid w-100"
                                            style="border: 1px solid rgba(0, 0, 0, 0.9); box-shadow: 20px 20px 14px -8px rgba(0, 0, 0, 0.2);"
                                            src="{{ asset('storage/uploads/' . $Template->image1_url) }}"
                                            alt="Card image cap">

                                    </div>
                                    <div class="card-footer d-flex justify-content-between">
                                        <span>Card Footer</span>
                                        <form style="display: inline;"
                                            action="{{ route('activateTemplate', ['id' => $Template->id]) }}"
                                            method="POST">
                                            @csrf
                                            <input type="hidden" name="state"
                                                value="{{ $Template->state == 1 ? '0' : '1' }}">
                                            <button type="submit"
                                                class="btn btn-{{ $Template->state == 1 ? 'danger' : 'success' }}">
                                                {{ $Template->state == 1 ? 'Deactivate' : 'Activate' }}
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="modal fade" id="editTemplateModal" tabindex="-1"
                            aria-labelledby="editTemplateModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editTemplateModalLabel">Edit Template</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="editTemplateForm" action="#" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3">
                                                <label for="editTemplateName" class="form-label">Template Name</label>
                                                <input type="text" class="form-control" id="editTemplateName"
                                                    name="editTemplateName" value="">
                                            </div>
                                            <div class="mb-3">
                                                <label for="editTemplateImage" class="form-label">Template Image</label>
                                                <input type="file" class="form-control" id="editTemplateImage"
                                                    name="editTemplateImage" value="{{ $Template->image1_url }}">

                                            </div>

                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <script>
                            function prepareEditTemplateModal(TemplateId, TemplateName, TemplateImage) {
                                document.getElementById('editTemplateName').value = TemplateName;
                                // document.getElementById('editTemplateImage').value = TemplateImage;

                                document.getElementById('editTemplateForm').action = `/templates/${TemplateId}`;
                            }
                        </script>

                    </div>
                </div>

                <div id="addCategoryForm" class="row" style="display: none">
                    <form class="main_form" action="{{ route('storeTemplates') }}" method="post"
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
                                            <label for="TemplateName">Categories Name:</label>
                                            <input class="form-control" type="text" id="TemplateName"
                                                name="TemplateName" placeholder="Enter Template Name">
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
                                        <div class="mb-3">
                                            <label for="TemplateImage1">Category Image:</label>
                                            <dic class="photo">
                                                <input class="form-control" style="border: none" type="file"
                                                    id="TemplateImage1" name="TemplateImage1">
                                            </dic>
                                            <label for="TemplateImage2">Category Image:</label>
                                            <dic class="photo">
                                                <input class="form-control" style="border: none" type="file"
                                                    id="TemplateImage2" name="TemplateImage2">
                                            </dic>
                                            <label for="TemplateImage3">Category Image:</label>
                                            <dic class="photo">
                                                <input class="form-control" style="border: none" type="file"
                                                    id="TemplateImage3" name="TemplateImage3">
                                            </dic>
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
