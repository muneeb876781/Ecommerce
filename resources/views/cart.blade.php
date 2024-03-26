@include('header')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
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
</head>

<body>
    <div class="cart">
        <div class="container-fluid">

            <div style="margin-top: 20px" class="row">
                <aside class="col-lg-9">
                    <div class="card">
                        <div class="table-responsive">

                            <table class="table table-borderless table-shopping-cart">
                                <thead class="text-muted">
                                    <tr class="small text-uppercase">
                                        <th scope="col">Product</th>
                                        <th scope="col" width="120">Quantity</th>
                                        <th scope="col" width="120">Price</th>
                                        <th scope="col" class="text-right d-none d-md-block" width="200"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($cart->isNotEmpty())
                                        @foreach ($cart as $item)
                                            <tr>
                                                <td>
                                                    <figure class="itemside align-items-center">
                                                        <div class="aside"> <a
                                                                href="{{ route('singleProduct', ['id' => $item->product->id]) }}">

                                                                @if ($item->product->image_url)
                                                                    <img src="{{ asset('storage/uploads/' . $item->product->image_url) }}"
                                                                        class="book-img">
                                                                @elseif (!$item->product->image_url && $item->product->remote_image_url)
                                                                    <img src="{{ $item->product->remote_image_url }}"
                                                                        class="book-img">
                                                                @else
                                                                    <span>No image available</span>
                                                                @endif
                                                            </a></div>
                                                        <figcaption class="info"> <a href="#"
                                                                class="title text-dark" data-abc="true">
                                                                <h6 class="mob-text">
                                                                    {{ implode(' ', array_slice(explode(' ', $item->product->name), 0, 6)) }}
                                                                    @if (str_word_count($item->product->name) > 10)
                                                                        ...
                                                                    @endif
                                                                </h6>
                                                            </a>
                                                            <p class="text-muted small">
                                                                {{ $item->product->category->name }}
                                                            </p>
                                                        </figcaption>
                                                    </figure>
                                                </td>
                                                <td>

                                                    <span class="form-control" disabled>
                                                        <option>{{ $item->quantity }}</option>
                                                    </span>
                                                </td>
                                                <td>
                                                    <div class="price-wrap">
                                                        <var class="price">Rs
                                                            @if ($item->product->discountedPrice)
                                                                {{ $item->product->discountedPrice * $item->quantity }}
                                                            @else
                                                                {{ $item->product->price * $item->quantity }}
                                                            @endif
                                                        </var>
                                                        @if ($item->quantity > 1)
                                                            <small class="text-muted"> Rs {{ $item->product->price }}
                                                                each </small>
                                                        @endif
                                                    </div>

                                                </td>
                                                <td class="text-right d-none d-md-block">
                                                    <a style="background: transparent; color:black;"
                                                        data-original-title="Save to Wishlist" title=""
                                                        href="" class="btn btn-light" data-toggle="tooltip"
                                                        data-abc="true"> <i class="fa fa-heart"></i></a>

                                                    <form style="display: inline;"
                                                        action="{{ route('remove', ['id' => $item->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button style="background: #cd3301; color: #fff;" type="submit"
                                                            class="btn btn-light">Remove</button>
                                                    </form>
                                                </td>

                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4">Your cart is empty.</td>
                                        </tr>
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </aside>
                <aside class="col-lg-3">
                    <div class="card mb-3">
                        <div class="card-body">
                            <form>
                                <div class="form-group"> <label>Have coupon?</label>
                                    <div class="input-group"> <input type="text" class="form-control coupon"
                                            name="" placeholder="Coupon code"> <span class="input-group-append">
                                            <button class="btn btn-primary btn-apply coupon">Apply</button> </span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <dl class="dlist-align">
                                <dt>Total price:</dt>
                                <dd id="totalPrice" class="text-right ml-3">RS 69.97</dd>
                            </dl>
                            <dl class="dlist-align">
                                <dt>Discount:</dt>
                                <dd id="discount" class="text-right text-danger ml-3">- RS 10.00</dd>
                            </dl>
                            <dl class="dlist-align">
                                <dt>Total:</dt>
                                <dd id="finalTotal" class="text-right text-dark b ml-3"><strong>RS 59.97</strong></dd>
                            </dl>

                            <hr> <a style="background: #cd3301;color: #fff;" href="{{ route('checkout') }}"
                                class="btn btn-main" data-abc="true">
                                Make Purchase </a>
                            <a style="background: #cd3301;color: #fff;" href="{{ route('shop') }}"
                                class="btn btn-main mt-2" data-abc="true">Continue
                                Shopping</a>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Calculate total price, discount, and final total based on the product prices and quantities
            let totalPrice = 0;
            let discount = 0; // Assuming a fixed discount for this example
            let finalTotal = 0;

            // Loop through each item in the cart and calculate the total price
            @foreach ($cart as $item)
                @if ($item->product->discountedPrice)
                    totalPrice += {{ $item->product->discountedPrice }} * {{ $item->quantity }};
                @else
                    totalPrice += {{ $item->product->price }} * {{ $item->quantity }};
                @endif
            @endforeach

            // Calculate the final total after applying the discount
            finalTotal = totalPrice - discount;

            // Update the HTML elements with the calculated values
            document.getElementById('totalPrice').innerText = `Rs-${totalPrice.toFixed(2)}`;
            document.getElementById('discount').innerText = `- Rs-${discount.toFixed(2)}`;
            document.getElementById('finalTotal').innerText = `Rs-${finalTotal.toFixed(2)}`;
        });
    </script>


</body>

</html>
@include('foooter')
