@include('header')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('csss/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('csss/style.css') }}">
    <link rel="stylesheet" href="{{ asset('csss/responsive.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('../img/favicon.ico') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">




    <link rel="manifest" href="site.webmanifest">



    <title>Document</title>
    <style>
        .sale-tag {
            position: absolute;
            top: 0;
            left: 0;
            background-color: #f00;
            color: #fff;
            padding: 5px 10px;
            font-size: 12px;
            border-radius: 0 0 20px 0;
            z-index: 1;
        }
    </style>
</head>

<body>
    <main style="margin: 0px 70px 0px 70px" class="main--wrapper">
        <div class="col-md-12">
            <div id="pendings" class="card">
                <div class="card-header">
                    <h4>Orders</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="pendingTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="serial-number">Tracking ID.</th>
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
                                @foreach ($userOrders as $order)
                                    {{-- @if ($order->order_status === 'Pending') --}}
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

                                            <td><a href="{{ route('trackOrders', ['id' => $order->id]) }}"
                                                    class="btn btn-primary">Track Order</a></td>
                                        </tr>
                                        @php $serialNumber++; @endphp
                                    {{-- @endif --}}
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        
    </main>

    <!-- JS here -->
    <script src="{{ asset('javascript/vendor/modernizr-3.5.0.min.js') }}">
        < script src = "{{ asset('javascript/vendor/modernizr-3.5.0.min.js') }}" >
    </script>
    <script src="{{ asset('javascript/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('javascript/popper.min.js') }}"></script>
    <script src="{{ asset('javascript/bootstrap.min.js') }}"></script>
    <script src="{{ asset('javascript/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('javascript/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('javascript/one-page-nav-min.js') }}"></script>
    <script src="{{ asset('javascript/slick.min.js') }}"></script>
    <script src="{{ asset('javascript/ajax-form.js') }}"></script>
    <script src="{{ asset('javascript/wow.min.js') }}"></script>
    <script src="{{ asset('javascript/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('javascript/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('javascript/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('javascript/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('javascript/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('javascript/jquery-ui-slider-range.js') }}"></script>
    <script src="{{ asset('javascript/jquery.elevateZoom-3.0.8.min.js') }}"></script>
    <script src="{{ asset('javascript/meanmenu.min.js') }}"></script>
    <script src="{{ asset('javascript/Elemental.js') }}"></script>
    <script src="{{ asset('javascript/plugins.js') }}"></script>
    <script src="{{ asset('javascript/main.js') }}"></script>

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

</body>

</html>
@include('foooter');
