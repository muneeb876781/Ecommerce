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
    <style>

    </style>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @include('adminNav');
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



    <!--Content Start-->
    <div class="content-start transition">
        <div class="container-fluid dashboard">
            <div class="content-header">
                <h1>{{ $admin->name }} Admin Dashboard</h1>
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
                                    <p>Users</p>
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
                                    <p>Products</p>
                                    <h5>0{{ $totalProducts }}</h5>
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
                                    <p>Shops</p>
                                    <h5>0{{ $totalSellerShops }}</h5>
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

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Shops</h4>
                        </div>
                        <div class="card-body pb-4">
                            @foreach ($SellerShops as $key => $shops)
                                @if ($key <= 2)
                                    <div class="recent-message d-flex px-4 py-3">
                                        <div class="avatar avatar-lg">
                                            <img src="{{ asset('storage/uploads/' . $shops->logo) }}">
                                        </div>
                                        <div class="name ms-4">
                                            <h5 class="mb-1">{{ $shops->name }}</h5>
                                            <h6 class="text-muted mb-0">{{ $shops->description }}</h6>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            <div class="px-4">
                                <a href="{{ '/shops' }}">
                                    <button class='btn btn-inline btn-xl btn-primary font-bold mt-3'>View All</button>
                                </a>
                                <a href="{{ '/shops' }}">
                                    <button class='btn btn-inline btn-xl btn-primary font-bold mt-3'>Add
                                        Shop</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Users</h4>
                        </div>
                        <div class="card-body pb-4">
                            @foreach ($Users as $key => $user)
                                @if ($key <= 2)
                                    <div class="recent-message d-flex px-4 py-3">
                                        <div class="avatar avatar-lg">
                                            <img src="../images/avatar.png">
                                        </div>
                                        <div class="name ms-4">
                                            <h5 class="mb-1">{{ $user->name }}</h5>
                                            <h6 class="text-muted mb-0"> <strong>Role: </strong> {{ $user->role }}</h6>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            <div class="px-4">
                                <a href="{{ '/users' }}">
                                    <button class='btn btn-inline btn-xl btn-primary font-bold mt-3'>View All</button>
                                </a>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Products</h4>
                        </div>
                        <div class="card-body pb-4">
                            @foreach ($Products as $key => $product)
                                @if ($key <= 2)
                                    <div class="recent-message d-flex px-4 py-3">
                                        <a style="padding: 0px;"
                                            href="{{ route('singleProduct', ['id' => $product->id]) }}">
                                            <div class="avatar avatar-lg">
                                                @if ($product->image_url)
                                                    <img src="{{ asset('storage/uploads/' . $product->image_url) }}">
                                                @elseif (!$product->image_url && $product->remote_image_url)
                                                    <img src="{{ $product->remote_image_url }}">
                                                @else
                                                    <span>No image available</span>
                                                @endif
                                            </div>
                                        </a>
                                        <div class="name ms-4">
                                            <h5 class="mb-1">{{ $product->name }}</h5>
                                            <h6 class="text-muted mb-0">{{ $product->category->name }}</h6>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            <div class="px-4">
                                <a href="{{ '/products' }}">
                                    <button class='btn btn-inline btn-xl btn-primary font-bold mt-3'>View All</button>
                                </a>
                                <a href="{{ '/products' }}">
                                    <button class='btn btn-inline btn-xl btn-primary font-bold mt-3'>Add
                                        Products</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
               

                {{-- <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Latest Transaction</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Order Id</th>
                                            <th scope="col">Buyer info</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">Items</th>
                                            <th scope="col">Payment Method</th>
                                            <th scope="col">View Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Orders as $key => $order)
                                            @if ($key <= 4)
                                                <tr>
                                                    <th scope="row">{{ $order->id }}</th>
                                                    <td>
                                                        <strong>{{ $order->first_name }}
                                                            {{ $order->last_name }}</strong>
                                                        <br>
                                                        {{ $order->email }} <br>
                                                        {{ $order->contact_number }}
                                                    </td>
                                                    <td>
                                                        <strong>Address: </strong> {{ $order->delivery_address }}
                                                        <br>
                                                        <strong>Postal Code: </strong>{{ $order->postal_code }}
                                                    </td>
                                                    <td>{{ $order->total_price }}</td>
                                                    <td>
                                                        {{ $order->items->count() }}
                                                    </td>
                                                    <td>{{ $order->payment_method }}</td>
                                                    <td><a href="{{ route('orderDetails', ['id' => $order->id]) }}"
                                                            class="btn btn-primary">View Details</a>
                                                        <a href="#" class="btn btn-danger"
                                                            onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this order?')) { document.getElementById('delete-order-{{ $order->id }}').submit(); }">
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
                                            @endif
                                        @endforeach





                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> --}}

            </div>
        </div>
    </div>







</body>

</html>
