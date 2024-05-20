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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Briem+Hand:wght@100..900&family=Dancing+Script:wght@400..700&family=Dosis:wght@200..800&family=Tac+One&display=swap"
        rel="stylesheet">
    <title>PrimeTechnology - Shop</title>
    <!-- Meta Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '910992237218488');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=910992237218488&ev=PageView&noscript=1" />
    </noscript>
    <!-- End Meta Pixel Code -->
</head>
<style>
    .sale-tag-new, .out-of-stock-tag-new {
        position: absolute;
        padding: 5px 10px;
        border-radius: 5px;
        z-index: 1;
        color: white;
        border: 1px solid #F1F3F6;
        background-image: linear-gradient(-180deg, #FF89D6 0%, #F1F3F6 100%);
    }

    .sale-tag-new {
        top: 10px;
        left: 10px;
        background-color: #FF89D6; 
        color: red; 
    }

    .out-of-stock-tag-new {
        top: 10px;
        right: 10px;
        background-color: #FF89D6; 
        color: red;
    }

    @media (max-width: 760px) {
        .sale-tag-new, .out-of-stock-tag-new {
            font-size: 10px; 
            padding: 3px 6px; 
        }
    }

    .star-gold{
        color: gold;
    }
</style>
<style>
    .sale-tag {
        position: absolute;
        top: 10px;
        left: 10px;
        background-color: #f00;
        color: #fff;
        padding: 5px 10px;
        border-radius: 5px;
        z-index: 1;
    }

    @media (max-width: 500px) {
        .sale-tag {
            font-size: 12px;
        }
    }

    @media (max-width: 412px) {
        .sale-tag {
            font-size: 10px;
        }
    }

    .out-of-stock-tag {
        position: absolute;
        top: 10px;
        right: 10px;
        background-color: #ff0000;
        color: #ffffff;
        padding: 5px 10px;
        border-radius: 5px;
        z-index: 1;
    }

    @media (max-width: 500px) {
        .out-of-stock-tag {
            font-size: 12px;
        }
    }

    @media (max-width: 412px) {
        .out-of-stock-tag {
            font-size: 10px;
        }
    }
</style>

<style>
    .product__thumb {
        position: relative;
        overflow: hidden;
    }

    .product__thumb:hover .product-action {
        display: flex;
    }

    .product__thumb:hover img {
        filter: blur(8px);
    }

    .product-action {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        display: none;
    }

    .product-action a {
        margin-right: 10px;
        color: #fff;
        font-size: 20px;
        box-shadow: 20px 20px 30px -4px rgba(0, 0, 0, 0.2);

    }

    /* Add this CSS */
    .product-action {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
    }

    .product-s {
        width: 25%;
        /* min-height: 400px; */
        float: left;
    }

    .star-gold {
        color: gold;
    }

    /* Media query for smaller screens */
    @media (max-width: 1200px) {
        .product-s {
            width: 25%;
        }
    }

    @media (max-width: 958px) {
        .product-s {
            width: 50%;
        }
    }

    @media (max-width: 576px) {
        .product-s {
            width: 50%;
        }
    }
</style>
<style>
    .containerr {
        width: 100%;
        height: 200px;
        overflow: hidden;
        position: relative;
        /* box-shadow: inset 0 0 10px #f8a100; */

    }

    .photo {
        position: absolute;
        animation: round 16s infinite;
        opacity: 0;
        width: 100%;
        height: auto;

    }

    @media (max-width: 1800px) {
        .containerr {
            height: 600px;
        }

        .photo {
            height: auto;
        }
    }

    @media (max-width: 1600px) {
        .containerr {
            height: 200px;
        }

        .photo {
            height: auto;
        }
    }

    @media (max-width: 1400px) {
        .containerr {
            height: 450px;
        }

        .photo {
            height: auto;
        }
    }

    @media (max-width: 1200px) {
        .containerr {
            height: 370px;
        }

        .photo {
            height: auto;
        }
    }

    @media (max-width: 1000px) {
        .containerr {
            height: 300px;
        }

        .photo {
            height: auto;
        }
    }

    @media (max-width: 800px) {
        .containerr {
            height: 300px;
        }

        .photo {
            height: auto;
        }
    }

    @media (max-width: 700px) {
        .containerr {
            height: 250px;
        }

        .photo {
            height: auto;
        }
    }

    @media (max-width: 600px) {
        .containerr {
            height: 220px;
        }

        .photo {
            height: auto;
        }
    }

    @media (max-width: 500px) {
        .containerr {
            height: 180px;
        }

        .photo {
            height: auto;
        }
    }

    @media (max-width: 400px) {
        .containerr {
            height: 150px;
        }

        .photo {
            height: auto;
        }
    }

    @keyframes round {
        25% {
            opacity: 1;
        }

        40% {
            opacity: 0;
        }
    }

    img:nth-child(1) {
        animation-delay: 12s;
    }

    img:nth-child(2) {
        animation-delay: 8s;
    }

    img:nth-child(3) {
        animation-delay: 4s;
    }

    img:nth-child(4) {
        animation-delay: 0s;
    }
</style>
<style>
    .pagination-container {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        text-align: center;
        margin-top: 20px;
    }

    .pagination-container ul {
        display: inline-block;
        padding: 0;
        margin: 0;
    }

    .pagination-container ul li {
        display: inline-block;
        margin-right: 5px;
        font-size: 20px;
    }

    .pagination-container ul li a {
        display: inline-block;
        padding: 5px 10px;
        background-color: #fff;
        color: #333;
        text-decoration: none;
        border-radius: 5px;
    }

    .pagination-container ul li.active a {
        background-color: #333;
        color: #fff;
    }
</style>



<body>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Added to Cart!',
                text: '{{ session('success') }}',
                showCancelButton: true,
                confirmButtonText: 'View Cart',
                cancelButtonText: 'Close'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to view cart page
                    window.location.href = '{{ route('cart') }}';
                }
            });
        </script>
    @endif
    <!-- Main -->
    <main class="main--wrapper">

        <!-- shop area start -->
        <div class="product shop-page pb-80 fix">
            <div class="container">
                {{-- <div class="her0_section">
                    <section>
                        <div class="rt-container">
                            <div class="col-rt-12">
                                <div class="Scriptcontent">
                                    <!-- partial:index.partial.html -->
                                    <div class="containerr">
                                        <img class='photo' src="../images/f1.jpg" alt="Image 1" />
                                        <img class='photo' src="../images/f5.jpg" alt="Image 1" />
                                        <img class='photo' src="../images/f4.jpg" alt="Image 1" />
                                        <img class='photo' src="../images/f6.jpg" alt="Image 1" />
        
                                    </div>
                                    <!-- partial -->
                                </div>
                            </div>
                        </div>
                    </section>
                </div> --}}
                <div class="brand">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="brand-active brand-active2">
                                    @foreach ($brands as $brand)
                                        @if ($brand->state !== 0)
                                            <a href="{{ route('brandsShop', ['id' => $brand->id]) }}">
                                                <div class="single-brand">
                                                    <img src="{{ asset('storage/uploads/' . $brand->image_url) }}"
                                                        class="brand-image" alt="">
                                                </div>
                                            </a>
                                        @endif
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var parent = document.querySelector('.splitview'),
                            topPanel = parent.querySelector('.topp'),
                            handle = parent.querySelector('.handle'),
                            skewHack = 0,
                            delta = 0;
        
                        // If the parent has .skewed class, set the skewHack var.
                        if (parent.className.indexOf('skewed') != -1) {
                            skewHack = 1000;
                        }
        
                        parent.addEventListener('mousemove', function(event) {
                            // Get the delta between the mouse position and center point.
                            delta = (event.clientX - window.innerWidth / 2) * 0.5;
        
                            // Move the handle.
                            handle.style.left = event.clientX + delta + 'px';
        
                            // Adjust the top panel width.
                            topPanel.style.width = event.clientX + skewHack + delta + 'px';
                        });
                    });
                </script> --}}

                {{-- <div class="border-b">
                    <div class="row">
                        <div class="col-lg-5 col-md-4">
                            <div class="shop-bar d-flex align-items-center">
                                <h4 class="f-800 cod__black-color">Shop</h4>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Shop.</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-8">
                            <form action="{{ route('shopss') }}" method="GET" id="shop-select-one">

                                <div class="bar-wrapper">
                                    
                                    <div class="shop-select ">
                                        <select name="select" id="shop-select-one">
                                            <option value="1">Deafult Sorting</option>
                                            <option value="2">Deafult Sorting</option>
                                            <option value="3">Deafult Sorting</option>
                                            <option value="4">Deafult Sorting</option>
                                        </select>
                                    </div>
                                    <div class="shop-select">
                                        <select name="category_id" id="category-select" class="form-control">
                                            <option value="">Categories</option>
                                            @foreach ($categories as $category)
                                                @if ($category->state !== 0)
                                                    <option
                                                        style="text-align: center; box-shadow: 10 20px 20px -4px rgba(0,0,0,0.2);"
                                                        value="{{ $category->id }}"
                                                        {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                                        {{ $category->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="shop-select">
                                        <select name="brand_id" id="brand-select" class="form-control">
                                            <option value="">Brands</option>
                                            @foreach ($brands as $brand)
                                                @if ($brand->state !== 0)
                                                    <option value="{{ $brand->id }}"
                                                        {{ request('brand_id') == $brand->id ? 'selected' : '' }}>
                                                        {{ $brand->name }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary ml-2">Filter</button>

                                    <style>
                                        @media (max-width: 768px) {
                                            .shop-select {
                                                flex-basis: 100%;
                                                margin-bottom: 10px;
                                            }
                                        }
                                    </style>




                                    <script>
                                        document.getElementById('category-select').addEventListener('change', function() {
                                            this.form.submit();
                                        });

                                        document.getElementById('brand-select').addEventListener('change', function() {
                                            this.form.submit();
                                        });
                                    </script>
                                </div>
                            </form>

                        </div>




                        <div class="col-lg-7 col-md-8 mt-3">
                            <div class="bar-wrapper">
                                <div class="select-text">
                                    <span>Showing 1–{{ $products->count() }} of {{ $products->count() }}
                                        Results</span>
                                </div>
                                <!-- Your sorting select options and scripts -->
                            </div>
                        </div>

                    </div>
                </div> --}}
                <style>
                    .filter_shop {
                        display: flex;
                        justify-content: flex-start;
                        align-items: flex-start;
                        flex-direction: column;
                        width: 100%;
                        height: auto;
                        background: #fff;
                        border: 1px solid rgba(47, 170, 244, 0.5);
                        box-shadow: inset 0 0 5px hsla(203, 90%, 57%, 0.5);
                    }

                    .filter_shop h3 {
                        font-size: 25px;
                        padding: 10px;
                    }

                    .filter_shop .filter_box {
                        display: flex;
                        justify-content: flex-start;
                        align-items: flex-start;
                        flex-direction: column;
                        width: 100%;
                        padding-bottom: 10px;
                    }

                    .filter_shop .filter_box h4 {
                        font-size: 20px;
                        letter-spacing: 2px;
                    }

                    .filter_shop .filter_box a {
                        padding: 10px 20px;
                        width: 100%;
                        border-bottom: 1px solid rgba(47, 170, 244, 0.5);
                    }

                    .filter_shop .filter_box a .active {
                        background: rgba(47, 170, 244, 0.5);
                    }

                    .filter_shop h3 span {
                        font-family: "Dancing Script", cursive;
                        color: #FCF447;
                    }

                    @media screen and (max-width: 540px) {
                        .filter_shop {
                            display: none;
                            /* Hide the filter section */
                        }
                    }


                    .shop_banner {
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        flex-direction: column;
                        width: 100%;
                        height: auto;
                        padding-bottom: 10px;
                    }

                    .shop_banner img {
                        width: 100%;
                        height: 100%;
                    }
                </style>
                <div class="row mt-30">
                    <div class="col-sm-3 filter_shop">
                        <h3>Filter your <span>Choice</span></h3>
                        <div class="filter_box">
                            <h4>Categories</h4>
                            @foreach ($categories as $category)
                                @if ($category->state !== 0)
                                    <a class="active" href="{{ route('shopcategory', ['id' => $category->id]) }}">
                                        <span>{{ $category->name }}</span>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                        <div class="filter_box">
                            <h4>Brands</h4>
                            @foreach ($brands as $brand)
                                @if ($brand->state !== 0)
                                    <a class="active" href="{{ route('brandsShop', ['id' => $brand->id]) }}">
                                        <span>{{ $brand->name }}</span>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                        <div class="filter_box">
                            <h4>Prices</h4>
                            <a class="active" href="{{ route('filterProductsByPrice', ['range' => 'below-10']) }}">
                                <span>Below 10 AED.</span>
                            </a>
                            <a class="active" href="{{ route('filterProductsByPrice', ['range' => '10-to-100']) }}">
                                <span>10 AED to 100 AED</span>
                            </a>
                            <a class="active" href="{{ route('filterProductsByPrice', ['range' => '100-to-200']) }}">
                                <span>100 AED to 200 AED</span>
                            </a>
                            <a class="active" href="{{ route('filterProductsByPrice', ['range' => '200-to-300']) }}">
                                <span>200 AED to 300 AED</span>
                            </a>
                            <a class="active" href="{{ route('filterProductsByPrice', ['range' => 'above-300']) }}">
                                <span>Above 300 AED.</span>
                            </a>
                        </div>
                    </div>



                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            const filterLinks = document.querySelectorAll('.filter_shop .filter_box a');

                            filterLinks.forEach(link => {
                                link.addEventListener('click', function(event) {
                                    // Remove active class from all links
                                    filterLinks.forEach(link => {
                                        link.classList.remove('active');
                                    });

                                    // Add active class to clicked link
                                    this.classList.add('active');
                                });
                            });
                        });
                    </script>


                    <div class="col-sm-9" id="product-list">
                        <div class="shop_banner">
                            {{-- @foreach ($banners as $banner) --}}
                                @if ($banners && $banners->Type === 'shop' && $banners->state !== 0)
                                    <img src="{{ asset('storage/uploads/' . $banners->image_url) }}" alt="sale banner">
                                @endif
                            {{-- @endforeach --}}

                        </div>
                        @if ($products->isEmpty())
                            <div class="text-center">No products in this category.</div>
                        @else
                            <div class="row">
                                <style>
                                    .product__single {
                                        height: auto;
                                        overflow: hidden;
                                        /* border: 1px solid #ddd; */
                                        margin-bottom: 20px;
                                        transition: height 0.3s;
                                        box-shadow: 2px 2px 2px rgba(47, 170, 244, 0.5);
                                        margin: 10px;
                                        border-radius: 10px;
                                    }
                                </style>
                                <script>
                                    window.addEventListener('DOMContentLoaded', (event) => {
                                        // Get all product__single elements
                                        let productCards = document.querySelectorAll('.product__single');

                                        // Calculate the maximum height
                                        let maxHeight = 0;
                                        productCards.forEach(card => {
                                            if (card.clientHeight > maxHeight) {
                                                maxHeight = card.clientHeight;
                                            }
                                        });

                                        // Set the maximum height to all cards
                                        productCards.forEach(card => {
                                            card.style.height = (maxHeight - 15) + 'px';
                                        });
                                    });
                                </script>
                                @foreach ($products as $product)
                                    @if (
                                        $product->brand &&
                                            $product->category &&
                                            $product &&
                                            $product->brand->state !== 0 &&
                                            $product->category->state !== 0 &&
                                            $product->state !== 0)
                                        <div class="product-s">
                                            <div class="product__single">
                                                <div class="product__box">
                                                    <div class="product__thumb">
                                                        <a href="{{ route('singleProduct', ['id' => $product->id]) }}"
                                                            class="img-wrapper">
                                                            @if ($product->image_url)
                                                                <img style="height: auto; width: auto; margin: 0 auto;"
                                                                    class="img"
                                                                    src="{{ asset('storage/uploads/' . $product->image_url) }}"
                                                                    alt="">
                                                            @elseif (!$product->image_url && $product->remote_image_url)
                                                                <img style="height: auto; width: auto; margin: 0 auto;"
                                                                    class="img"
                                                                    src="{{ $product->remote_image_url }}"
                                                                    alt="">
                                                            @else
                                                                <span>No image available</span>
                                                            @endif

                                                            @if ($product->quantity == 0)
                                                                <span class="out-of-stock-tag out-of-stock-tag-new">Out of Stock</span>
                                                            @elseif ($product->discountedPrice)
                                                                @php
                                                                    $salePercentage = (($product->price - $product->discountedPrice) / $product->price) * 100;
                                                                @endphp
                                                                @if ($salePercentage > 0)
                                                                    <span class="sale-tag sale-tag-new"> <span> {{ round($salePercentage) }}% Off</span> </span>
                                                                @endif
                                                            @endif
                                                        </a>
                                                        <div class="product-action">
                                                            <a href="#"><span class="fas fa-heart"></span></a>
                                                            <a
                                                                href="{{ route('singleProduct', ['id' => $product->id]) }}"><span
                                                                    class="fas fa-eye"></span></a>
                                                            <a href="{{ route('addtoCart', ['id' => $product->id]) }}"><span
                                                                    class="fas fa-shopping-cart"></span></a>
                                                        </div>
                                                    </div>
                                                    <div class="product__content--top pt-10 pb-10">
                                                        <span class="cate-name">{{ $product->category->name }}</span>
                                                        <h6 class="product__title mine__shaft-color f-400 mb-0"
                                                            style="white-space: wrap; overflow-wrap: break-word;">
                                                            <a href="{{ route('singleProduct', ['id' => $product->id]) }}"
                                                                style="display: inline-block; max-width: 100%; ">
                                                                {{ implode(' ', array_slice(explode(' ', $product->name), 0, 5)) }}
                                                                @if (str_word_count($product->name) > 5)
                                                                    ...
                                                                @endif
                                                            </a>
                                                        </h6>



                                                        @php
                                                            $averageRating = $product->reviews->avg('rating');
                                                        @endphp
                                                        <div class="rating" style="padding-top: 5px;">
                                                            <ul class="list-inline">
                                                                @for ($i = 1; $i <= 5; $i++)
                                                                    @if ($i <= $averageRating)
                                                                        <li class="rating-active"><i
                                                                                class="fas fa-star star-gold"></i></li>
                                                                    @else
                                                                        <li><i class="far fa-star"></i></li>
                                                                    @endif
                                                                @endfor
                                                            </ul>
                                                        </div>



                                                        <br>
                                                        <div
                                                            class="product__content--rating d-flex justify-content-between">
                                                            <div class="price">
                                                                @if ($product->discountedPrice)
                                                                    <span class="original-price" style="text-decoration: line-through; font-size: 12px; margin-right: 3px;">
                                                                        {{ session('currency', 'AED') }}.{{ number_format(convert_price($product->price), 2) }}
                                                                    </span>
                                                                    <br>
                                                                    <span class="discounted-price"><strong>{{ session('currency', 'AED') }}.{{ number_format(convert_price($product->discountedPrice), 2) }}</strong></span>
                                                                @else
                                                                    <span>{{ session('currency', 'AED') }}.{{ number_format(convert_price($product->price), 2) }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>

                            <div class="pagination-container">
                                <div class="row">
                                    {{ $products->onEachSide(1)->links() }}
                                </div>
                            </div>
                        @endif
                    </div>

                </div>
                <!-- Pagination -->
            </div>
        </div>

        <!-- shop area end -->






    </main>
    <!-- Main End -->

    <!-- Footer -->

    <!-- Footer End -->





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
