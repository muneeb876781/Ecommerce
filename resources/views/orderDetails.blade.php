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

    @include('venderNav')
    <div class="content-start transition  ">
        <div class="container-fluid dashboard">
            <div class="content-header">
                <h1>Orders Details</h1>
                <div class="row">
                    <div class="col-md-4">
                        <form action="{{ route('udateOrderStatus', ['id' => $order->id]) }}" method="POST">
                            @csrf
                            <div class="input-group mb-2">
                                <select class="form-select form-control-lg" name="status"
                                    aria-label="Update Order Status">
                                    <option value="Pending" {{ $order->order_status === 'Pending' ? 'selected' : '' }}>
                                        Pending</option>
                                    <option value="Accepted"
                                        {{ $order->order_status === 'Accepted' ? 'selected' : '' }}>Accepted</option>
                                    <option value="Completed"
                                        {{ $order->order_status === 'Completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="Rejected"
                                        {{ $order->order_status === 'Rejected' ? 'selected' : '' }}>Rejected</option>
                                    <option value="Returned"
                                        {{ $order->order_status === 'Returned' ? 'selected' : '' }}>Returned</option>

                                </select>
                                <button class="btn btn-primary" type="submit">Update Status</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-8 text-md-end"> <!-- Align to the end of the column -->
                        <div class="d-flex justify-content-md-end"> <!-- Align to the end of the column -->
                            <a href="{{ route('downloadPDF', ['id' => $order->id]) }}" class="btn btn-primary">Download
                                PDF</a>
                        </div>
                    </div>
                </div>






                <div class="container mt-5">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    Buyer Details
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $order->first_name }} {{ $order->last_name }}</h5>
                                    <p class="mb-3"> <strong>Email:</strong> {{ $order->email }}</p>
                                    <p class="mb-3"><strong>Contact Number:</strong> {{ $order->contact_number }}
                                    </p>
                                    <p class="mb-3"><strong>Delivery Address:</strong>
                                        {{ $order->delivery_address }}</p>
                                    <p class="mb-3"><strong>Postal Code:</strong> {{ $order->postal_code }}</p>
                                    <p class="mb-3"><strong>Special Instructions:</strong>
                                        {{ $order->special_instructions }}</p>
                                    <p class="mb-3"><strong>Sub Total:</strong> {{ $order->total_price }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    Order Items
                                </div>
                                <div class="card-body">
                                    <ul class="list-group">
                                        @foreach ($order->items as $item)
                                            <li class="list-group-item">
                                                @if ($item->exists())
                                                    <div style="display: flex;">
                                                        <div style="margin-right: 10px;">
                                                            @if ($item->image_url)
                                                                <img src="{{ asset('storage/uploads/' . $item->image_url) }}"
                                                                    alt="{{ $item->product_name }}"
                                                                    style="max-width: 100px; max-height: auto;">
                                                            @elseif ($item->remote_image_url)
                                                                <img src="{{ $item->remote_image_url }}"
                                                                    alt="{{ $item->product_name }}"
                                                                    style="max-width: 100px; max-height: auto;">
                                                            @else
                                                                <span>No Image Available</span>
                                                            @endif
                                                        </div>

                                                        <div>
                                                            <strong
                                                                style="font-size: 20px;">{{ $item->product_name }}</strong>
                                                            <br>
                                                            - <strong>Quantity:</strong> {{ $item->quantity }} <br>
                                                            - <strong>Product color:</strong>
                                                            {{ $item->product_color }} <br>
                                                            - <strong>Product size:</strong> {{ $item->product_size }}
                                                            <br>
                                                            - <strong>Price:</strong> {{ $item->price }} <br>
                                                            - <strong>Sub Total:</strong>
                                                            {{ $item->price * $item->quantity }}
                                                        </div>
                                                    </div>
                                                @else
                                                    <div>No longer available</div>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>


                                </div>

                            </div>
                        </div>
                    </div>
                </div>




            </div>
        </div>
    </div>
</body>


</html>
