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

        .card {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 0.10rem;
            margin: 0 70px;
        }

        @media (max-width: 808px) {
            .card {
                margin: 0;
                padding: 0;
            }
        }

        .card-header:first-child {
            border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
        }

        .card-header {
            padding: 0.75rem 1.25rem;
            margin-bottom: 0;
            background-color: #fff;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1)
        }

        .track {
            position: relative;
            background-color: #ddd;
            height: 7px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            margin-bottom: 60px;
            margin-top: 50px
        }

        .track .step {
            -webkit-box-flex: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
            width: 25%;
            margin-top: -18px;
            text-align: center;
            position: relative
        }

        .track .step.active:before {
            background: #FF5722
        }

        .track .step::before {
            height: 7px;
            position: absolute;
            content: "";
            width: 100%;
            left: 0;
            top: 18px
        }

        .track .step.active .icon {
            background: #ee5435;
            color: #fff
        }

        .track .icon {
            display: inline-block;
            width: 40px;
            height: 40px;
            line-height: 40px;
            position: relative;
            border-radius: 100%;
            background: #ddd
        }

        .track .step.active .text {
            font-weight: 400;
            color: #000
        }

        .track .text {
            display: block;
            margin-top: 7px
        }

        .itemside {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            width: 100%
        }

        .itemside .aside {
            position: relative;
            -ms-flex-negative: 0;
            flex-shrink: 0
        }

        .img-sm {
            width: 80px;
            height: 80px;
            padding: 7px
        }

        ul.row,
        ul.row-sm {
            list-style: none;
            padding: 0
        }

        .itemside .info {
            padding-left: 15px;
            padding-right: 7px
        }

        .itemside .title {
            display: block;
            margin-bottom: 5px;
            color: #212529
        }

        p {
            margin-top: 0;
            margin-bottom: 1rem
        }

        .btn-warning {
            color: #ffffff;
            background-color: #ee5435;
            border-color: #ee5435;
            border-radius: 1px
        }

        .btn-warning:hover {
            color: #ffffff;
            background-color: #ff2b00;
            border-color: #ff2b00;
            border-radius: 1px
        }
    </style>
</head>

<body>
    <div class="container">
        <article class="card">
            <header class="card-header"> My Orders / Tracking </header>
            <div class="card-body">
                <h6> Tracking ID: {{ $trackOrders->tracking_number }}</h6>
                <article class="card">
                    <div class="card-body row">
                        <div class="col"> <strong>Estimated Delivery time:</strong> <br>29 nov 2019 </div>
                        <div class="col"> <strong>Shipping BY:</strong> <br> TCS, | <i class="fa fa-phone"></i>
                            +1598675986 </div>
                        <div class="col"> <strong>Status:</strong> <br> {{ $trackOrders->order_status }} </div>
                        <div class="col"> <strong>Tracking #:</strong> <br> {{ $trackOrders->tracking_number }}
                        </div>
                    </div>
                </article>
                <div class="track">
                    @php
                        $statuses = ['Pending', 'Rejected', 'Accepted', 'Dispatched', 'Completed'];
                        $currentStatusIndex = array_search($trackOrders->order_status, $statuses);
                    @endphp

                    @foreach ($statuses as $index => $status)
                        <div class="step{{ $index <= $currentStatusIndex ? ' active' : '' }}">
                            <span class="icon">
                                @if ($index < $currentStatusIndex)
                                    <i class="fa fa-check"></i>
                                @else
                                    @switch($status)
                                        @case('Pending')
                                            <i class="fa fa-user"></i>
                                        @break

                                        @case('Rejected')
                                            <i class="fa fa-times"></i>
                                        @break

                                        @case('Accepted')
                                            <i class="fa fa-check"></i>
                                        @break

                                        @case('Dispatched')
                                            <i class="fa fa-truck"></i>
                                        @break

                                        @case('Completed')
                                            <i class="fa fa-box"></i>
                                        @break
                                    @endswitch
                                @endif
                            </span>
                            <span class="text">{{ $status }}</span>
                        </div>
                    @endforeach
                </div>



                <hr>
                <ul class="row">
                    @foreach ($trackOrders->items as $orderitems)
                        <li class="col-md-4">
                            <figure class="itemside mb-3">
                                <div class="aside">
                                    {{-- <img src="{{ asset('storage/uploads/' . $orderitems->image_url) }}"
                                        class="img-sm border"> --}}
s
                                    @if ($orderitems->image_url)
                                        <img src="{{ asset('storage/uploads/' . $orderitems->image_url) }}"
                                            class="img-sm border">
                                    @elseif (!$orderitems->image_url && $orderitems->remote_image_url)
                                        <img src="{{$orderitems->remote_image_url}}"
                                            class="img-sm border">
                                    @else
                                        <span>No image available</span>
                                    @endif
                                </div>
                                <figcaption class="info align-self-center">
                                    <p class="title"> <strong>{{ $orderitems->product_name }}</strong> </p> 
                                    <span class="text-muted">Color {{ $orderitems->product_color }} </span><br>
                                    <span class="text-muted">Size {{ $orderitems->product_size }} </span><br>
                                    <span class="text-muted">{{ session('currency', 'AED') }}.{{ number_format(convert_price($orderitems->price), 2) }} </span><br>


                                    <span class="text-muted"> Quantity: {{ $orderitems->quantity }} </span>
                                </figcaption>
                            </figure>
                        </li>
                    @endforeach
                </ul>
                <hr>
                <a href="{{ route('userOrders') }}" class="btn btn-warning" data-abc="true"> <i
                        class="fa fa-chevron-left"></i> Back
                    to orders</a>

            </div>
            <br><br>

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

</body>

</html>
@include('foooter');
