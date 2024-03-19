@include('header')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="{{ asset('css/cart.css') }}"> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('csss/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('csss/style.css') }}">
    <link rel="stylesheet" href="{{ asset('csss/responsive.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('../img/favicon.ico') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
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


    <title>Document</title>
    <style>
        .rounded {
            border-radius: 1rem
        }

        .nav-pills .nav-link {
            color: #555
        }
    </style>
</head>

<body>

    <div class="container py-5">
        <div class="row">
            <div class="checkout col-lg-10 mx-auto">
                <div class="card ">
                    <div style="background: white;" class="card-header">
                        <div class="bg-white shadow-sm pt-0 pl-2 pr-2 pb-2">
                            <div class="row">
                                <div class="col-lg-8 mx-auto text-center">
                                    <h1 class="">Checkout</h1>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                
                                <div class="col-md-6">
                                    <!-- Payment Methods Navbar -->
                                    <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mt-4 mb-3">
                                        <li class="nav-item"> <a data-toggle="pill" href="#credit-card"
                                                class="nav-link active"> <i class="fas fa-credit-card mr-2"></i> Card
                                            </a> </li>
                                        <li class="nav-item">
                                            <a data-toggle="pill" href="#Cash" class="nav-link ">
                                                <i class="fas fa-money-bill mr-2"></i> Cash on Delivery
                                            </a>
                                        </li>
                                        <li class="nav-item"> <a data-toggle="pill" href="#net-banking"
                                                class="nav-link "> <i class="fas fa-mobile-alt mr-2"></i> Net
                                            </a> </li>
                                    </ul>

                                    <!-- Payment Methods Content -->
                                    <div class="tab-content">
                                        <div id="credit-card" class="tab-pane fade show active pt-3">
                                            <!-- Credit Card Form -->
                                            <form role="form" onsubmit="event.preventDefault()">
                                                <div class="form-group"> <label for="username">
                                                        <h6>Card Owner</h6>
                                                    </label> <input type="text" name="username"
                                                        placeholder="Card Owner Name" required class="form-control ">
                                                </div>
                                                <div class="form-group"> <label for="cardNumber">
                                                        <h6>Card number</h6>
                                                    </label>
                                                    <div class="input-group"> <input type="text" name="cardNumber"
                                                            placeholder="Valid card number" class="form-control "
                                                            required>
                                                        <div class="input-group-append"> <span
                                                                class="input-group-text text-muted">
                                                                <i class="fab fa-cc-visa mx-1"></i> <i
                                                                    class="fab fa-cc-mastercard mx-1"></i> <i
                                                                    class="fab fa-cc-amex mx-1"></i> </span> </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-8">
                                                        <div class="form-group"> <label><span class="hidden-xs">
                                                                    <h6>Expiration Date</h6>
                                                                </span></label>
                                                            <div class="input-group"> <input type="number"
                                                                    placeholder="MM" name="" class="form-control"
                                                                    required> <input type="number" placeholder="YY"
                                                                    name="" class="form-control" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group mb-4"> <label data-toggle="tooltip"
                                                                title="Three digit CV code on the back of your card">
                                                                <h6>CVV <i class="fa fa-question-circle d-inline"></i>
                                                                </h6>
                                                            </label> <input type="text" required
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer"
                                                    style="background: white; justify-content: center;">
                                                    <button style="background: #cd3301; color: #fff; width: 50%;"
                                                        type="button"
                                                        class="subscribe btn btn-primary btn-block shadow-sm">
                                                        Confirm Order
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                        <div id="Cash" class="tab-pane fade pt-3">
                                            <form action="{{ route('order') }}" method="POST">
                                                @csrf
                                                <div class="form-group row">
                                                    <div class="col-md-6">
                                                        <label for="firstName">
                                                            <h6>First Name</h6>
                                                        </label>
                                                        <input type="text" name="firstName"
                                                            placeholder="Your First Name" required
                                                            class="form-control">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="lastName">
                                                            <h6>Last Name</h6>
                                                        </label>
                                                        <input type="text" name="lastName"
                                                            placeholder="Your Last Name" required
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">
                                                        <h6>Email</h6>
                                                    </label>
                                                    <input type="email" name="email" placeholder="Your Email"
                                                        required class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="address">
                                                        <h6>Address</h6>
                                                    </label>
                                                    <textarea name="address" placeholder="Your Address" required class="form-control"></textarea>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-6">
                                                        <label for="postalCode">
                                                            <h6>Postal Code</h6>
                                                        </label>
                                                        <input type="text" name="postalCode"
                                                            placeholder="Your Postal Code" required
                                                            class="form-control">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="phone">
                                                            <h6>Phone Number</h6>
                                                        </label>
                                                        <input type="tel" name="phone"
                                                            placeholder="Your Phone Number" required
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="instructions">
                                                        <h6>Special Instructions</h6>
                                                    </label>
                                                    <textarea name="instructions" placeholder="Any special instructions" class="form-control"></textarea>
                                                </div>
                                                <div class="card-footer"
                                                    style="background: white; justify-content: center;">
                                                    <button style="background: #cd3301; color: #fff; width: 50%;"
                                                        type="submit"
                                                        class="subscribe btn btn-primary btn-block shadow-sm">Confirm
                                                        Order</button>
                                                </div>
                                            </form>
                                        </div>




                                        <div id="net-banking" class="tab-pane fade pt-3">
                                            <div class="form-group "> <label for="Select Your Bank">
                                                    <h6>Select your Bank</h6>
                                                </label> <select class="form-control" id="ccmonth">
                                                    <option value="" selected disabled>--Please select your
                                                        Bank--
                                                    </option>
                                                    <option>Bank 1</option>
                                                    <option>Bank 2</option>
                                                    <option>Bank 3</option>
                                                    <option>Bank 4</option>
                                                    <option>Bank 5</option>
                                                    <option>Bank 6</option>
                                                    <option>Bank 7</option>
                                                    <option>Bank 8</option>
                                                    <option>Bank 9</option>
                                                    <option>Bank 10</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <p> <button type="button" class="btn btn-primary "><i
                                                            class="fas fa-mobile-alt mr-2"></i> Proceed
                                                        Payment</button>
                                                </p>
                                            </div>
                                            <p class="text-muted">Note: After clicking on the button, you will be
                                                directed
                                                to a
                                                secure
                                                gateway for payment. After completing the payment process, you will be
                                                redirected back
                                                to the website to view details of your order.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- Cart Details -->
                                    <div class="card">
                                        <div class="">
                                            <h5 class="card-title pl-4 pt-4"><strong>Cart Details</strong></h5>
                                        </div>
                                        <div class="card-body">
                                            <ul class="list-group list-group-flush">
                                                @foreach ($cart as $item)
                                                    <li
                                                        class="list-group-item d-flex justify-content-between align-items-center">
                                                        <div>
                                                            <a
                                                                href="{{ route('singleProduct', ['id' => $item->product->id]) }}"><img
                                                                    src="{{ asset( 'storage/uploads/' . $item->product->image_url) }}"
                                                                    alt="{{ $item->product->name }}"
                                                                    class="img-thumbnail mr-2"
                                                                    style="width: 80px; height: 80px; border-radius: 50%;"></a>
                                                            <span><strong>{{ $item->product->name }}</strong></span>
                                                        </div>
                                                        <span>
                                                            @if ($item->product->discountedPrice)
                                                                Rs.
                                                                {{ $item->quantity * $item->product->discountedPrice }}
                                                            @else
                                                                Rs. {{ $item->quantity * $item->product->price }}
                                                            @endif
                                                        </span>
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
        </div>
        
    </div>

    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>

</body>

</html>
@include('foooter')
