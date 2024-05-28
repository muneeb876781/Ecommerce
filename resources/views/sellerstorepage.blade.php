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
    .sale-tag-new,
    .out-of-stock-tag-new {
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

        .sale-tag-new,
        .out-of-stock-tag-new {
            font-size: 10px;
            padding: 3px 6px;
        }
    }

    .star-gold {
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
        width: 20%;
        /* min-height: 400px; */
        float: left;
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
    /* Existing styles */
    .seller_shop_banner {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: auto;
        flex-direction: row;
        background: url('../images/bg.png');
    }

    .seller_shop_info {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 30%;
        height: auto;
        flex-direction: column;
    }

    .seller_shop_info .seller_shop_logo {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 80%;
        flex-direction: column;
        padding: 20px 0;
    }

    .seller_shop_info .seller_shop_content {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 20%;
        flex-direction: column;
        padding-bottom: 15px;
    }

    .seller_shop_info .seller_shop_content h2 {
        font-size: 30px;
        color: white;
        filter: drop-shadow(0 2px 2px hsla(290, 100%, 20%, 1));
    }

    .seller_shop_info .seller_shop_logo img {
        width: 150px;
        border: 2px solid white;
        border-radius: 100%;
        box-shadow: 5px 5px 2px rgba(0, 0, 0, 0.2);
    }

    .seller_shop_analytics {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 70%;
        height: auto;
        flex-direction: row;
    }

    .seller_shop_analytics .analytics_card {
        width: 150px;
        height: 100px;
        padding: 10px;
        margin: 10px;
        background: rgba(255, 255, 255, 0.9);
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        border: 1px solid rgba(0, 0, 0, 0.3);
        border-radius: 20px;
        box-shadow: 3px 3px 2px rgba(0, 0, 0, 0.1);
    }

    .seller_shop_analytics .analytics_card h2 {
        font-size: 22px;
    }

    .seller_shop_analytics .analytics_card h4 {
        font-size: 17px;
    }

    .seller_shop_body {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: auto;
        flex-direction: column;
        padding: 30px;
    }

    .seller_shop_body h2 {
        font-size: 20px;
    }

    .seller_shop_body .seller_products {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: auto;
        flex-direction: row;
        flex-wrap: wrap;
        /* Added to allow wrapping on smaller screens */
    }

    .seller_shop_body .seller_products .seller_product_card {
        width: 16%;
        height: auto;
        box-shadow: 2px 2px 1px rgba(0, 0, 0, 0.2);
        margin: 10px auto;
        border-radius: 10px;
    }

    .seller_shop_body .seller_products .seller_product_card .seller_product_card_image {
        width: 100%;
        height: 200px;
        padding-bottom: 10px;
        margin: auto;
    }

    .seller_shop_body .seller_products .seller_product_card .seller_product_card_image img {
        width: auto;
        height: 100%;
        margin: auto;
    }

    .seller_shop_body .seller_products .seller_product_card .seller_product_card_content {
        display: flex;
        width: 100%;
        height: 150px;
        flex-direction: column;
        padding: 6px;
    }

    .seller_shop_body .seller_products .seller_product_card .seller_product_card_content h6 {
        font-size: 15px;
        font-weight: 600;
    }

    .seller_shop_body .seller_products .seller_product_card .seller_product_card_content .price {
        display: flex;
        justify-content: center;
        align-content: center;
        flex-direction: row;
        padding-top: 5px;
    }

    .seller_shop_body .seller_products .seller_product_card .seller_product_card_content .price .price_sec {
        width: 50%;
        justify-content: flex-start;
        align-items: flex-start;
    }

    .seller_shop_body .seller_products .seller_product_card .seller_product_card_content .price .cart_sec {
        width: 50%;
        justify-content: flex-end;
        align-items: flex-end;
    }

    .seller_shop_body .seller_products .seller_product_card .seller_product_card_content .price .cart_sec .fas {
        padding: 5px;
        font-size: 15px;
        border: 1px solid rgba(0, 0, 0, 0.2);
        margin: 5px;
    }

    .seller_shop_contain {
        display: flex;
        width: 100%;
    }

    .seller_shop_contain .products {
        display: flex;
        width: 70%;
        flex-direction: column;
    }

    .seller_shop_contain .reviews {
        display: flex;
        flex-direction: column;
        width: 30%;
        padding: 20px;
        box-shadow: 2px 2px 2px rgba(47, 170, 244, 0.5);
        border: 2px solid rgba(47, 170, 244, 0.5);
        border-radius: 10px;
    }

    .seller_shop_contain .reviews .stars {
        color: gold;
    }

    /* Media Queries for Responsiveness */
    @media (max-width: 1200px) {
        .seller_shop_info {
            width: 100%;
            padding: 20px;
        }

        .seller_shop_analytics {
            width: 100%;
            flex-direction: column;
            align-items: center;
        }

        .seller_shop_analytics .analytics_card {
            width: 90%;
            margin: 10px 0;
        }

        .seller_shop_body .seller_products .seller_product_card {
            width: 45%;
            margin: 10px;
        }
    }

    @media (max-width: 768px) {
        .seller_shop_banner {
            flex-direction: column;
            padding: 20px;
        }

        .seller_shop_info {
            width: 100%;
            align-items: center;
        }

        .seller_shop_analytics {
            width: 100%;
            flex-direction: column;
            align-items: center;
        }

        .seller_shop_analytics .analytics_card {
            width: 90%;
            margin: 10px 0;
        }

        .seller_shop_body .seller_products .seller_product_card {
            width: 100%;
            margin: 10px 0;
        }

        .seller_shop_contain {
            flex-direction: column;
            align-items: center;
        }

        .seller_shop_contain .products {
            order: 2;
            /* Products will appear second */
            width: 100%;
        }

        .seller_shop_contain .reviews {
            order: 1;
            /* Reviews will appear first */
            width: 100%;
            margin-top: 20px;
            margin-bottom: 20px;

        }
    }

    @media (max-width: 480px) {
        .seller_shop_info .seller_shop_content h2 {
            font-size: 20px;
        }

        .seller_shop_analytics .analytics_card h2 {
            font-size: 18px;
        }

        .seller_shop_analytics .analytics_card h4 {
            font-size: 14px;
        }

        .seller_shop_body h2 {
            font-size: 18px;
        }

        .seller_shop_body .seller_products .seller_product_card .seller_product_card_content h6 {
            font-size: 14px;
        }
    }
</style>





<body>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <main class="main--wrapper">
        <div class="product shop-page pb-80 fix">
            <div class="container">

                <div class="seller_shop_banner">
                    <div class="seller_shop_info">
                        <div class="seller_shop_logo">
                            <img src="{{ asset('storage/uploads/' . $sellerShop->logo) }}" alt="">
                        </div>
                        <div class="seller_shop_content">
                            <h2>{{ $sellerShop->name }}</h2>
                        </div>
                    </div>
                    <div class="seller_shop_analytics">
                        <div class="analytics_card">
                            <h2>{{ $productscount }}</h2>
                            <h4>Products</h4>
                        </div>
                        <div class="analytics_card">
                            <h2>{{ $reviewscount }}</h2>
                            <h4>Reviews</h4>
                        </div>
                        <div class="analytics_card">
                            <h2>{{ $categoriescount }}</h2>
                            <h4>Categories</h4>
                        </div>
                        <div class="analytics_card">
                            <h2>{{ $Brandscount }}</h2>
                            <h4>Brands</h4>
                        </div>
                    </div>
                </div>
                {{-- <div class="seller_shop_body">
                    <h2>All products by this seller </h2>
                    <div class="seller_products">
                        @foreach ($products as $product)
                            <a class="seller_product_card" href="{{ route('singleProduct', ['id' => $product->id]) }}">
                                <div class="seller_product_card_image">
                                    @if ($product->image_url)
                                        <img src="{{ asset('storage/uploads/' . $product->image_url) }}" alt="">
                                    @elseif (!$product->image_url && $product->remote_image_url)
                                        <img src="{{ $product->remote_image_url }}" alt="">
                                    @else
                                        <span>No image available</span>
                                    @endif
                                </div>
                                <div class="seller_product_card_content">
                                    <span>{{ $product->category->name }}</span>
                                    <h6>
                                        {{ implode(' ', array_slice(explode(' ', $product->name), 0, 5)) }}
                                        @if (str_word_count($product->name) > 5)
                                            ...
                                        @endif
                                    </h6>
                                    @php
                                        $averageRating = $product->reviews->avg('rating');
                                    @endphp
                                    <div class="rating">
                                        <ul class="list-inline">
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $averageRating)
                                                    <li class="rating-active"><i class="fas fa-star star-gold"></i></li>
                                                @else
                                                    <li><i class="far fa-star"></i></li>
                                                @endif
                                            @endfor
                                        </ul>
                                    </div>
                                    <div class="price">
                                        <div class="price_sec">
                                            @if ($product->discountedPrice)
                                                <span class="original-price"
                                                    style="text-decoration: line-through; font-size: 12px; margin-right: 3px;">
                                                    {{ session('currency', 'AED') }}.{{ number_format(convert_price($product->price), 2) }}
                                                </span>
                                                <br>
                                                <span
                                                    class="discounted-price"><strong>{{ session('currency', 'AED') }}.{{ number_format(convert_price($product->discountedPrice), 2) }}</strong></span>
                                            @else
                                                <span>{{ session('currency', 'AED') }}.{{ number_format(convert_price($product->price), 2) }}</span>
                                            @endif
                                        </div>
                                        <div class="cart_sec">
                                            <span class="fas fa-shopping-cart"></span>
                                            <span class="fas fa-eye"></span>
                                        </div>

                                    </div>

                                </div>
                            </a>
                        @endforeach
                    </div>
                </div> --}}

                <h2 style="font-size: 20px; padding-top: 20px; padding-bottom: 10px;">All products by this seller </h2>
                <div class="seller_shop_contain">
                    <div class="products">
                        <div class="brand">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="brand-active brand-active1">
                                            @foreach ($sellerBrands as $brand)
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

                        <section class="all__product pt-20 pb-20">
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
                            <div class="all__product--body" <div class="container">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 p-0">
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
                                                                        <span
                                                                            class="out-of-stock-tag out-of-stock-tag-new">Out
                                                                            of Stock</span>
                                                                    @elseif ($product->discountedPrice)
                                                                        @php
                                                                            $salePercentage =
                                                                                (($product->price -
                                                                                    $product->discountedPrice) /
                                                                                    $product->price) *
                                                                                100;
                                                                        @endphp
                                                                        @if ($salePercentage > 0)
                                                                            <span class="sale-tag sale-tag-new"> <span>
                                                                                    {{ round($salePercentage) }}%
                                                                                    Off</span> </span>
                                                                        @endif
                                                                    @endif
                                                                </a>
                                                                <div class="product-action">
                                                                    <a href="#"><span
                                                                            class="fas fa-heart"></span></a>
                                                                    <a
                                                                        href="{{ route('singleProduct', ['id' => $product->id]) }}"><span
                                                                            class="fas fa-eye"></span></a>
                                                                    <a
                                                                        href="{{ route('addtoCart', ['id' => $product->id]) }}"><span
                                                                            class="fas fa-shopping-cart"></span></a>
                                                                </div>
                                                            </div>
                                                            <div class="product__content--top pt-10 pb-10 mt-0">
                                                                <span
                                                                    class="cate-name">{{ $product->category->name }}</span>
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
                                                                                        class="fas fa-star star-gold"></i>
                                                                                </li>
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
                                                                            <span class="original-price"
                                                                                style="text-decoration: line-through; font-size: 12px; margin-right: 3px;">
                                                                                {{ session('currency', 'AED') }}.{{ number_format(convert_price($product->price), 2) }}
                                                                            </span>
                                                                            <br>
                                                                            <span
                                                                                class="discounted-price"><strong>{{ session('currency', 'AED') }}.{{ number_format(convert_price($product->discountedPrice), 2) }}</strong></span>
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
                                    <style>
                                        .sale_banner {}

                                        .sale_banner img {
                                            width: 100%;
                                            height: 100%;
                                        }
                                    </style>
                                </div>
                            </div>
                        </section>
                    </div>

                    <div class="reviews">
                        <h4>
                            Reviews({{ $reviewscount }})
                        </h4>
                        @foreach ($reviews as $review)
                            <span style="font-weight: 700">{{ $review->user->name }}</span>
                            <span>{{ $review->comment }}</span>
                            <span class="stars">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $review->rating)
                                        <i class="fas fa-star"></i>
                                    @else
                                        <i class="far fa-star"></i>
                                    @endif
                                @endfor
                            </span>
                            <br>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
        </div>
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



</body>

</html>
@include('foooter');
