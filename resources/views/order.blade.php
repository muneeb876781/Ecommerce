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
                title: 'Order Status Successfully updated!',
                text: '{{ session('success') }}',
                confirmButtonText: 'Close'
            });
        </script>
    @endif
    @if (session('update_success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Order Successfully Deleted!',
                text: '{{ session('update_success') }}',
                confirmButtonText: 'Close'
            });
        </script>
    @endif
    @include('venderNav')
    <div class="content-start transition  ">
        <div class="container-fluid dashboard">
            <div class="content-header">
                <div class="row">
                    {{-- <div class="col-lg-12 col-md-6">
                        <input type="text" class="searchOrder" placeholder="Track order using Tracking id">
                    </div> --}}

                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4 d-flex align-items-center">
                                        <i class="fas fa-inbox icon-home bg-primary text-light"></i>
                                    </div>
                                    <div class="col-8">
                                        <p class="mb-2">Total Orders</p>
                                        <h5>0{{ $totalOrdersCount }}</h5>
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
                                        <p class="mb-2">Completed </p>
                                        <h5>0{{ $completedOrders }}</h5>
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
                                        <p class="mb-2">Rejected </p>
                                        <h5>0{{ $rejectedOrders }}</h5>
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
                                        <p class="mb-2">Pendings </p>
                                        <h5>0{{ $pendingOrders }}</h5>
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
                                        <i class="fas fa-product-hunt icon-home bg-success text-light"></i>
                                    </div>
                                    <div class="col-8">
                                        <p class="mb-2">Products rordered</p>
                                        <h5>0{{ $totalProductsOrdered }}</h5>
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
                                        <i class="fas fa-money-bill  icon-home bg-info text-light"></i>
                                    </div>
                                    <div class="col-8">
                                        <p class="mb-2">Sales </p>
                                        <h5>Rs. {{ $totalAmountReceived }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>





                    {{-- <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                                <div id="columnchart"></div>
                            </div>
                        </div>
                    </div> --}}

                </div>
                {{-- <h1>Orders</h1> --}}
                <button id="showPendings" class="btn btn-primary">Pending Orders</button>
                <button id="showAccepted" class="btn btn-primary">Accepted Orders</button>
                <button id="showRejected" class="btn btn-primary">Rejected Orders</button>
                <button id="showCompleted" class="btn btn-primary">Completed Orders</button>
                <button id="showAll" class="btn btn-primary">All Orders</button>


                <br>

                <div class="col-md-12">
                    <div id="pendings" class="card">
                        <div class="card-header">
                            <h4>Pending Orders</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="pendingTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="serial-number">Tracking No.</th>
                                            <th scope="col">Buyer info</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">Items</th>
                                            <th scope="col">Payment Method</th>
                                            <th scope="col">Order Status</th>
                                            <th scope="col">View Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $serialNumber = 1; @endphp
                                        @foreach ($Orders as $order)
                                            @if ($order->order_status === 'Pending')
                                                <tr>
                                                    <td scope="row">{{ $order->tracking_number }}</td>
                                                    <td>
                                                        <strong>{{ $order->first_name }}
                                                            {{ $order->last_name }}</strong>
                                                        <br>
                                                        {{ $order->email }} <br>
                                                        {{ $order->contact_number }}
                                                    </td>
                                                    <td>
                                                        <strong>Address: </strong> {{ $order->delivery_address }} <br>
                                                        <strong>Postal Code: </strong>{{ $order->postal_code }}
                                                    </td>
                                                    <td>{{ $order->total_price }}</td>
                                                    <td>
                                                        {{ $order->items->count() }}
                                                    </td>
                                                    <td>{{ $order->payment_method }}</td>
                                                    <td>{{ $order->order_status }}</td>

                                                    <td>
                                                        <a href="{{ route('orderDetails', ['id' => $order->id]) }}"
                                                            class="btn btn-primary">View Details</a>
                                                        <a href="{{ route('deleteOrder', ['id' => $order->id]) }}"
                                                            class="btn btn-danger"
                                                            onclick="event.preventDefault(); document.getElementById('delete-order-{{ $order->id }}').submit();">
                                                            Delete Order
                                                        </a>
                                                        <form id="delete-order-{{ $order->id }}"
                                                            action="{{ route('deleteOrder', ['id' => $order->id]) }}"
                                                            method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </td>

                                                </tr>
                                                @php $serialNumber++; @endphp
                                            @endif
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="accepted" class="col-md-12" style="display: none;">
                    <div class="card">
                        <div class="card-header">
                            <h4>Accepted Orders</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="acceptedTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="serial-number">No.</th>
                                            <th scope="col">Buyer info</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">Items</th>
                                            <th scope="col">Payment Method</th>
                                            <th scope="col">Order Status</th>
                                            <th scope="col">View Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $serialNumber = 1; @endphp
                                        @foreach ($Orders as $order)
                                            @if ($order->order_status === 'Accepted')
                                                <tr>
                                                    <th scope="row">{{ $serialNumber }}</th>
                                                    <td>
                                                        <strong>{{ $order->first_name }}
                                                            {{ $order->last_name }}</strong>
                                                        <br>
                                                        {{ $order->email }} <br>
                                                        {{ $order->contact_number }}
                                                    </td>
                                                    <td>
                                                        <strong>Address: </strong> {{ $order->delivery_address }} <br>
                                                        <strong>Postal Code: </strong>{{ $order->postal_code }}
                                                    </td>
                                                    <td>{{ $order->total_price }}</td>
                                                    <td>
                                                        {{ $order->items->count() }}
                                                    </td>
                                                    <td>{{ $order->payment_method }}</td>
                                                    <td>{{ $order->order_status }}</td>

                                                    <td><a href="{{ route('orderDetails', ['id' => $order->id]) }}"
                                                            class="btn btn-primary">View Details</a></td>
                                                </tr>
                                                @php $serialNumber++; @endphp
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="rejected" class="col-md-12" style="display: none;">
                    <div class="card">
                        <div class="card-header">
                            <h4>Rejected Orders</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="rejectedTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="serial-number">No.</th>
                                            <th scope="col">Buyer info</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">Items</th>
                                            <th scope="col">Payment Method</th>
                                            <th scope="col">Order Status</th>
                                            <th scope="col">View Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $serialNumber = 1; @endphp
                                        @foreach ($Orders as $order)
                                            @if ($order->order_status === 'Rejected')
                                                <tr>
                                                    <th scope="row">{{ $serialNumber }}</th>
                                                    <td>
                                                        <strong>{{ $order->first_name }}
                                                            {{ $order->last_name }}</strong>
                                                        <br>
                                                        {{ $order->email }} <br>
                                                        {{ $order->contact_number }}
                                                    </td>
                                                    <td>
                                                        <strong>Address: </strong> {{ $order->delivery_address }} <br>
                                                        <strong>Postal Code: </strong>{{ $order->postal_code }}
                                                    </td>
                                                    <td>{{ $order->total_price }}</td>
                                                    <td>
                                                        {{ $order->items->count() }}
                                                    </td>
                                                    <td>{{ $order->payment_method }}</td>
                                                    <td>{{ $order->order_status }}</td>

                                                    <td><a href="{{ route('orderDetails', ['id' => $order->id]) }}"
                                                            class="btn btn-primary">View Details</a></td>
                                                </tr>
                                                @php $serialNumber++; @endphp
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="completed" class="col-md-12" style="display: none;">
                    <div class="card">
                        <div class="card-header">
                            <h4>Completed Orders</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="completedTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="serial-number">No.</th>
                                            <th scope="col">Buyer info</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">Items</th>
                                            <th scope="col">Payment Method</th>
                                            <th scope="col">Order Status</th>
                                            <th scope="col">View Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $serialNumber = 1; @endphp
                                        @foreach ($Orders as $order)
                                            @if ($order->order_status === 'Completed')
                                                <tr>
                                                    <th scope="row">{{ $serialNumber }}</th>
                                                    <td>
                                                        <strong>{{ $order->first_name }}
                                                            {{ $order->last_name }}</strong>
                                                        <br>
                                                        {{ $order->email }} <br>
                                                        {{ $order->contact_number }}
                                                    </td>
                                                    <td>
                                                        <strong>Address: </strong> {{ $order->delivery_address }} <br>
                                                        <strong>Postal Code: </strong>{{ $order->postal_code }}
                                                    </td>
                                                    <td>{{ $order->total_price }}</td>
                                                    <td>
                                                        {{ $order->items->count() }}
                                                    </td>
                                                    <td>{{ $order->payment_method }}</td>
                                                    <td>{{ $order->order_status }}</td>

                                                    <td><a href="{{ route('orderDetails', ['id' => $order->id]) }}"
                                                            class="btn btn-primary">View Details</a></td>
                                                </tr>
                                                @php $serialNumber++; @endphp
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="allOrders" class="col-md-12" style="display: none;">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Orders</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="allTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="serial-number">No.</th>
                                            <th scope="col">Buyer info</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">Items</th>
                                            <th scope="col">Payment Method</th>
                                            <th scope="col">Order Status</th>
                                            <th scope="col">View Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $serialNumber = 1; @endphp
                                        @foreach ($Orders as $order)
                                            <tr>
                                                <th scope="row">{{ $serialNumber }}</th>
                                                <td>
                                                    <strong>{{ $order->first_name }}
                                                        {{ $order->last_name }}</strong>
                                                    <br>
                                                    {{ $order->email }} <br>
                                                    {{ $order->contact_number }}
                                                </td>
                                                <td>
                                                    <strong>Address: </strong> {{ $order->delivery_address }} <br>
                                                    <strong>Postal Code: </strong>{{ $order->postal_code }}
                                                </td>
                                                <td>{{ $order->total_price }}</td>
                                                <td>
                                                    {{ $order->items->count() }}
                                                </td>
                                                <td>{{ $order->payment_method }}</td>
                                                <td>{{ $order->order_status }}</td>

                                                <td><a href="{{ route('orderDetails', ['id' => $order->id]) }}"
                                                        class="btn btn-primary">View Details</a></td>
                                            </tr>
                                            @php $serialNumber++; @endphp
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






    <!-- DataTables Script -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            var toolsTable = $('#pendingTable').DataTable({
                "lengthMenu": [5, 10, 25, 50, -1],
                "pageLength": 50,
            });

            // Search input event
            $('#pendingTable').on('keyup', function() {
                toolsTable.search(this.value).draw();
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            var toolsTable = $('#acceptedTable').DataTable({
                "lengthMenu": [5, 10, 25, 50, -1],
                "pageLength": 50,
            });

            // Search input event
            $('#acceptedTable').on('keyup', function() {
                toolsTable.search(this.value).draw();
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            var toolsTable = $('#rejectedTable').DataTable({
                "lengthMenu": [5, 10, 25, 50, -1],
                "pageLength": 50,
            });

            // Search input event
            $('#rejectedTable').on('keyup', function() {
                toolsTable.search(this.value).draw();
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            var toolsTable = $('#completedTable').DataTable({
                "lengthMenu": [5, 10, 25, 50, -1],
                "pageLength": 50,
            });

            // Search input event
            $('#pendingTable').on('keyup', function() {
                toolsTable.search(this.value).draw();
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            var toolsTable = $('#allTable').DataTable({
                "lengthMenu": [5, 10, 25, 50, -1],
                "pageLength": 50,
            });

            // Search input event
            $('#pendingTable').on('keyup', function() {
                toolsTable.search(this.value).draw();
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#showPendings').on('click', function() {
                $('#pendings').show();
                $('#accepted').hide();
                $('#rejected').hide();
                $('#completed').hide();
                $('#allOrders').hide();
            });

            $('#showAccepted').on('click', function() {
                $('#pendings').hide();
                $('#accepted').show();
                $('#rejected').hide();
                $('#completed').hide();
                $('#allOrders').hide();
            });

            $('#showRejected').on('click', function() {
                $('#pendings').hide();
                $('#accepted').hide();
                $('#rejected').show();
                $('#completed').hide();
                $('#allOrders').hide();
            });

            $('#showCompleted').on('click', function() {
                $('#pendings').hide();
                $('#accepted').hide();
                $('#rejected').hide();
                $('#completed').show();
                $('#allOrders').hide();
            });

            $('#showAll').on('click', function() {
                $('#pendings').hide();
                $('#accepted').hide();
                $('#rejected').hide();
                $('#completed').hide();
                $('#allOrders').show();
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
