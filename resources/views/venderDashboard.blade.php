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
    <style>

    </style>
</head>

<body>

    @include('venderNav');




    <!--Content Start-->
    <div class="content-start transition">
        <div class="container-fluid dashboard">
            <div class="content-header">
                <h1>{{ $shopInfo->name }}</h1>
                {{-- <p>{{ $shopInfo->description }}</p> --}}

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
                                    <p>Categories</p>
                                    <h5>0{{ $cat_count }}</h5>
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
                                    <h5>0{{ $pro_count }}</h5>
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
                                    <p>Orders</p>
                                    <h5>0{{ $ord_count }}</h5>
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
                                    <i class="fas fa-id-card  icon-home bg-warning text-light"></i>
                                </div>
                                <div class="col-8">
                                    <p>Reviews</p>
                                    <h5>0{{ $rev_count }}</h5>
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
                            <h4>Categories</h4>
                        </div>
                        <div class="card-body pb-4">
                            @foreach ($categories as $key => $category)
                                @if ($key <= 2)
                                    <div class="recent-message d-flex px-4 py-3">
                                        <div class="avatar avatar-lg">
                                            <img src="{{ Storage::url($category->image_url) }}">
                                        </div>
                                        <div class="name ms-4">
                                            <h5 class="mb-1">{{ $category->name }}</h5>
                                            {{-- <h6 class="text-muted mb-0">{{ $category->subcategories->count() }} Sub
                                                Categories</h6> --}}
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            <div class="px-4">
                                <a href="{{ '/categories' }}">
                                    <button class='btn btn-inline btn-xl btn-primary font-bold mt-3'>View All</button>
                                </a>
                                <a href="{{ '/categories' }}">
                                    <button class='btn btn-inline btn-xl btn-primary font-bold mt-3'>Add
                                        Category</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Products</h4>
                        </div>
                        <div class="card-body pb-4">
                            @foreach ($products as $key => $product)
                                @if ($key <= 2)
                                    <div class="recent-message d-flex px-4 py-3">
                                        <a style="padding: 0px;"
                                            href="{{ route('singleProduct', ['id' => $product->id]) }}">
                                            <div class="avatar avatar-lg">
                                                <img src="{{ Storage::url($product->image_url) }}">
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

                <div class="col-md-12">
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
                                                        <td><a href="{{ route('orderDetails', ['id' => $order->id]) }}" class="btn btn-primary">View Details</a></td>

                                                    </tr>
                                                @endif
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



    



</body>

</html>
