

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
                title: 'User Successfully updated!',
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
    @include('adminNav')
    <div class="content-start transition  ">
        <div class="container-fluid dashboard">
            <div class="content-header">
                {{-- <h1>{{ $tableName }}</h1> --}}
                <h1>Database</h1>
            </div>

            {{-- <div class="row">
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4 d-flex align-items-center">
                                    <i class="fas fa-inbox icon-home bg-primary text-light"></i>
                                </div>
                                <div class="col-8">
                                    <p>Total Users</p>
                                    <h5>0{{ $totalUsers }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4 d-flex align-items-center">
                                    <i class="fas fa-clipboard-list icon-home bg-success text-light"></i>
                                </div>
                                <div class="col-8">
                                    <p>Sellers</p>
                                    <h5>0{{ $sellerUserscount }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4 d-flex align-items-center">
                                    <i class="fas fa-chart-bar  icon-home bg-info text-light"></i>
                                </div>
                                <div class="col-8">
                                    <p>Admin</p>
                                    <h5>0{{ $adminUserscount }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button id="showAlUsersBtn" class="btn btn-primary">ALL Users</button>
            <button id="showSellerUsersBtn" class="btn btn-primary">Sellers</button>
            <button id="showAdminUsersBtn" class="btn btn-primary">Admins</button> --}}

            {{-- <br> --}}

            <div class="col-md-12">
                <div id="allUsers" class="card">
                    <div class="card-header">
                        <h4> {{$tableName}}</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="allUsersTable" class="table table-striped">
                                <thead>
                                    <tr>
                                        @foreach ($columns as $column)
                                            <th>{{ $column }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $row)
                                        <tr>
                                            @foreach ($columns as $column)
                                                <td>{{ $row->$column }}</td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

           


        </div>
    </div>
    </div>

    <!-- Category Details Modal -->
    <div class="modal fade" id="usersDetailsModal" tabindex="-1" aria-labelledby="userDetailsModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userDetailsModalLabel">User Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Name:</strong> <span id="userName"></span></p>
                    <p><strong>Description:</strong> <span id="userEmail"></span></p>
                    <p><strong>Role:</strong> <span id="userRole"></span></p>
                    <!-- Add other category details here -->
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Category Modal -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="edituserModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edituserModalLabel">Edit Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editUserForm" action="#" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="editUserName" class="form-label">User Name</label>
                            <input type="text" class="form-control" id="editUserName"
                                name="editUserName">
                        </div>
                        <div class="mb-3">
                            <label for="editUserEmail" class="form-label">User Email</label>
                            <input type="email" class="form-control" id="editUserEmail"
                                name="editUserEmail">
                        </div>
                        <div class="mb-3">
                            <label for="editUserRole" class="form-label">User Role</label>
                            <input type="text" class="form-control" id="editUserRole"
                                name="editUserRole">
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
            var toolsTable = $('#allUsersTable').DataTable({
                "lengthMenu": [5, 10, 25, 50, -1],
                "pageLength": 50,
            });

            // Search input event
            $('#allUsersTable').on('keyup', function() {
                toolsTable.search(this.value).draw();
            });
        });
    </script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            var toolsTable = $('#sellerTable').DataTable({
                "lengthMenu": [5, 10, 25, 50, -1],
                "pageLength": 50,
            });

            // Search input event
            $('#sellerTable').on('keyup', function() {
                toolsTable.search(this.value).draw();
            });
        });
    </script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            var toolsTable = $('#adminTable').DataTable({
                "lengthMenu": [5, 10, 25, 50, -1],
                "pageLength": 50,
            });

            // Search input event
            $('#adminTable').on('keyup', function() {
                toolsTable.search(this.value).draw();
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#showAlUsersBtn').on('click', function() {
                $('#allUsers').show();
                $('#seller').hide();
                $('#admin').hide();
            });

            $('#showSellerUsersBtn').on('click', function() {
                $('#allUsers').hide();
                $('#seller').show();
                $('#admin').hide();
            });

            $('#showAdminUsersBtn').on('click', function() {
                $('#allUsers').hide();
                $('#seller').hide();
                $('#admin').show();
            });
        });
    </script>
    <script>
        function showUsersDetails(name, description, role) {
            document.getElementById('userName').innerText = name;
            document.getElementById('userEmail').innerText = description;
            document.getElementById('userRole').innerText = role;

            // Add other category details if neededs
        }
    </script>
    <script>
        function prepareEditUserModal(Id, Name, email, role) {
            document.getElementById('editUserName').value = Name;
            document.getElementById('editUserEmail').value = email;
            document.getElementById('editUserRole').value = role;


            document.getElementById('editUserForm').action = `/users/${Id}`;
        }
    </script>






    <!-- DataTables Script -->



</body>


</html>

