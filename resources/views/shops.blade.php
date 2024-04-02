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
    @if (session('destroyShop_success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Shop Successfully deleted!',
                text: '{{ session('destroyShop_success') }}',
                confirmButtonText: 'Close'
            });
        </script>
    @endif
    @include('adminNav')
    <div class="content-start transition  ">
        <div class="container-fluid dashboard">
            <div class="content-header">
                <h1>Shops</h1>
            </div>

            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4 d-flex align-items-center">
                                    <i class="fas fa-inbox icon-home bg-primary text-light"></i>
                                </div>
                                <div class="col-8">
                                    <p>Total Shops</p>
                                    <h5>0{{ $totalSellerShops }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <button id="showAlUsersBtn" class="btn btn-primary">ALL Users</button>
            <button id="showSellerUsersBtn" class="btn btn-primary">Sellers</button>
            <button id="showAdminUsersBtn" class="btn btn-primary">Admins</button> --}}

            <br>

            <div class="col-md-12">
                <div id="allShops" class="card">
                    <div class="card-header">
                        <h4>All Shops</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="allShopsTable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="serial-number">No.</th>
                                        <th class="image">Logo</th>
                                        <th class="title">Name</th>
                                        <th class="title">Description</th>
                                        <th class="title">Address</th>
                                        <th class="title">Seller name</th>
                                        <th class="title">Seller Phone</th>
                                        <th class="title">Seller Address</th>
                                        <th class="ranking">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $serialNumber = 1; @endphp
                                    @foreach ($shops as $shop)
                                        <tr>
                                            <td style="width: 5%" class="serial-number">{{ $serialNumber++ }}</td>
                                            <td style="width: 15%"><img style="width: 100px; height: auto;"
                                                src="{{ asset('storage/uploads/' . $shop->logo) }}"
                                                alt="{{ $shop->name }}" class="rounded-circle"></td>  
                                            <td style="width: 15%">{{ $shop->name }}</td>
                                            <td style="width: 20%">{{ $shop->description }}</td>
                                            <td style="width: 10%">{{ $shop->address }}</td>
                                            <td style="width: 10%">{{ $shop->user->name }}</td>
                                            <td style="width: 10%">{{ $shop->seller_phone }}</td>
                                            <td style="width: 10%">{{ $shop->seller_address }}</td>
                                            <td style="width: 5%">
                                                {{-- <a class="btn btn-link text-primary" href="#" title="View Details"
                                                    data-bs-toggle="modal" data-bs-target="#usersDetailsModal"
                                                    onclick="showUsersDetails('{{ $shop->name }}', '{{ $shop->email }}', '{{ $shop->role }}')">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a class="btn btn-link text-warning" href="#" title="Edit"
                                                    data-bs-toggle="modal" data-bs-target="#editUserModal"
                                                    onclick="prepareEditUserModal('{{ $shop->id }}', '{{ $user->name }}', '{{ $user->email }}',  '{{ $user->role }}')">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a> --}}


                                                <a class="btn btn-link text-warning" href="#" title="Edit">
                                                    <form style="display: inline"
                                                        action="{{ route('destroyShop', ['id' => $shop->id]) }}"
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
    {{-- <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="edituserModalLabel"
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
    </div> --}}




    <!-- DataTables Script -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            var toolsTable = $('#allShopsTable').DataTable({
                "lengthMenu": [5, 10, 25, 50, -1],
                "pageLength": 50,
            });

            // Search input event
            $('#allShopsTable').on('keyup', function() {
                toolsTable.search(this.value).draw();
            });
        });
    </script>
    {{-- <script>
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
    </script> --}}
    <script>
        function showUsersDetails(name, description, role) {
            document.getElementById('userName').innerText = name;
            document.getElementById('userEmail').innerText = description;
            document.getElementById('userRole').innerText = role;

            // Add other category details if neededs
        }
    </script>
    {{-- <script>
        function prepareEditUserModal(Id, Name, email, role) {
            document.getElementById('editUserName').value = Name;
            document.getElementById('editUserEmail').value = email;
            document.getElementById('editUserRole').value = role;


            document.getElementById('editUserForm').action = `/users/${Id}`;
        }
    </script> --}}






    <!-- DataTables Script -->



</body>


</html>
