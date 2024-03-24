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
    </style>

    <style>
        .quantity {
            display: flex;
            align-items: center;
            justify-content: flex-start;
        }

        .quantity button {
            border-radius: 100%;
            padding: 5px 10px;
            margin: 0 5px;
            cursor: pointer;
            border: none;
            background: transparent;
            color: black;
            border: 1px solid #ced4da;
        }

        .quantity input {
            padding: 5px 5px;
            text-align: center;
            width: 30px;
            border: 1px solid #ced4da;
            border-radius: 5px;
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
    </style>

    <style>
        /* Panels. */
        .splitview {
            position: relative;
            width: 100%;
            min-height: 400px;
            overflow: hidden;
        }

        .panel {
            position: absolute;
            width: 100vw;
            min-height: 400px;
            overflow: hidden;
        }

        .panel .content {
            position: absolute;
            width: 90vw;
            min-height: 400px;
            color: #FFF;
            /* Set text color to white */
        }

        .panel .description {
            width: 25%;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            text-align: center;
        }

        .panel img {
            box-shadow: 0 0 20px 10px rgba(0, 0, 0, 0.1);
            width: auto;
            /* Adjust image width */
            height: 70%;
            /* Maintain aspect ratio */
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        /* Set background colors */
        .bottom {
            /* background-color: rgb(44, 44, 44); */
            /* background-color: rgb(0, 0, 0, 0.8); */
            background: #999999;

            z-index: 1;
        }

        .bottom .description {
            right: 5%;
        }

        .topp {
            /* background-color: rgb(77, 69, 173); */
            /* background-color: rgb(255, 255, 255, 0.8); */
            background: #efefef;


            z-index: 2;
            width: 50vw;
        }

        .topp .description {
            left: 5%;
        }

        /* Handle. */
        .handle {
            height: 100%;
            position: absolute;
            display: block;
            background-color: rgb(253, 171, 0);
            width: 5px;
            top: 0;
            left: 50%;
            z-index: 3;
        }

        /* Skewed. */
        .skewed .handle {
            top: 50%;
            transform: rotate(30deg) translateY(-50%);
            height: 200%;
            -webkit-transform-origin: top;
            -moz-transform-origin: top;
            transform-origin: top;
        }

        .skewed .topp {
            transform: skew(-30deg);
            margin-left: -1000px;
            width: calc(50vw + 1000px);
        }

        .skewed .topp .content {
            transform: skew(30deg);
            margin-left: 1000px;
        }

        /* Responsive. */
        @media (max-width: 900px) {
            body {
                font-size: 75%;
            }
        }
    </style>

    <style>
        .containerr {
            width: 100%;
            height: 700px;
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
                height: 550px;
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
        .cats {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: row;
            flex-wrap: wrap;
            width: 100%;
            height: auto;
            padding: 10px;
        }

        .cat_card {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            width: 15%;
            height: 150px;
            padding: 10px;
        }


        .cat_card img {
            width: auto;
            height: 70%;
        }

        .cat_card h2 {
            font-size: 14px;
            font-weight: 400;
            padding: 10px 0;
            text-align: center;
        }

        @media (max-width: 1200px) {
            .cat_card {
                width: 18%;
            }
        }

        @media (max-width: 1050px) {
            .cat_card {
                width: 20%;
            }
        }

        @media (max-width: 1050px) {
            .cat_card {
                height: 130px;
            }

            .cat_card h2 {
                font-size: 14px;

            }
        }

        @media (max-width: 750px) {
            .cat_card {
                height: 110px;
            }

            .cat_card h2 {
                font-size: 11px;

            }
        }

        @media (max-width: 500px) {
            .cat_card {
                height: 80px;
            }

            .cat_card h2 {
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
            width: 16%;
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


</head>

<body>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Added to Cart!',
                text: '{{ session('success') }}',
                showCancelButton: true,
                confirmButtonText: 'View Order',
                cancelButtonText: 'Close'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to view cart page
                    window.location.href = '{{ route('cart') }}';
                }
            });
        </script>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('checkout_sucess'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Order Successfully placed!',
                text: '{{ session('success') }}',
                showCancelButton: true,
                confirmButtonText: 'Track Order',
                cancelButtonText: 'Close'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to view cart page
                    window.location.href = '{{ route('userOrders') }}';
                }
            });
        </script>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('shop_success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Shop Successfully created!',
                text: '{{ session('success') }}',
                showCancelButton: true,
                confirmButtonText: 'Visit Dashboard',
                cancelButtonText: 'Close'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to view cart page
                    window.location.href = '{{ route('dashboard') }}';
                }
            });
        </script>
    @endif

    <!-- Main -->
    <main class="main--wrapper">
        <!-- hero  -->
        {{-- <section class="hero hero__area" style="max-height: 400px;">
            <div class="hero__active slider-active">
                <div style="max-height: 400px;" class="single__hero single-slider hero__bg pt-140 pb-120" data-background="../img/bg/g6.jpg">
                    <div class="container" >
                        <div class="row">
                            <div class="col-lg-9 offset-lg-3">
                                <div class="hero__caption">
                                    <span class="offer--title__hero white-color f-800" data-animation="fadeInDown"
                                        data-delay=".2s">End Season Sale</span>
                                    <h2 class="product--name__hero white-color f-200 mb-50" data-animation="fadeInUp"
                                        data-delay=".5s">Wooden Furniture</h2>
                                    <p class="product--price__hero white-color mb-20" data-animation="fadeInLeft"
                                        data-delay=".7s"><span class="f-300">Wide Rang Start From</span><span
                                            class="price f-800"><sup>$</sup>252.00</span></p>
                                    <a href="{{ route('shop') }}" class="btn orange-bg-btn f-700"
                                        data-animation="fadeInDown" data-delay=".9s" style="background: #4FA7FF;">Start
                                        Buying</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single__hero single-slider hero__bg pt-140 pb-120" data-background="../img/bg/bg2.jpg">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-9 offset-lg-3">
                                <div class="hero__caption">
                                    <span class="offer--title__hero white-color f-800" data-animation="fadeInDown"
                                        data-delay=".2s">End Season Sale</span>
                                    <h2 class="product--name__hero white-color f-200 mb-50" data-animation="fadeInUp"
                                        data-delay=".5s">Wooden Furniture</h2>
                                    <p class="product--price__hero white-color mb-20" data-animation="fadeInLeft"
                                        data-delay=".7s"><span class="f-300">Wide Rang Start From</span><span
                                            class="price f-800"><sup>$</sup>260.00</span></p>
                                    <a href="#" class="btn orange-bg-btn f-700" data-animation="fadeInDown"
                                        data-delay=".9s">Start Buying</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single__hero single-slider hero__bg pt-140 pb-120" data-background="../img/bg/bg4.jpg">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-9 offset-lg-3">
                                <div class="hero__caption">
                                    <span class="offer--title__hero white-color f-800" data-animation="fadeInDown"
                                        data-delay=".2s">End Season Sale</span>
                                    <h2 class="product--name__hero white-color f-200 mb-50" data-animation="fadeInUp"
                                        data-delay=".5s">Wooden Furniture</h2>
                                    <p class="product--price__hero white-color mb-20" data-animation="fadeInLeft"
                                        data-delay=".7s"><span class="f-300">Wide Rang Start From</span><span
                                            class="price f-800"><sup>$</sup>260.00</span></p>
                                    <a href="#" class="btn orange-bg-btn f-700" data-animation="fadeInDown"
                                        data-delay=".9s">Start Buying</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single__hero single-slider hero__bg pt-140 pb-120" data-background="../img/bg/bg3.jpg">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-9 offset-lg-3">
                                <div class="hero__caption">
                                    <span class="offer--title__hero white-color f-800" data-animation="fadeInDown"
                                        data-delay=".2s">End Season Sale</span>
                                    <h2 class="product--name__hero white-color f-200 mb-50" data-animation="fadeInUp"
                                        data-delay=".5s">Wooden Furniture</h2>
                                    <p class="product--price__hero white-color mb-20" data-animation="fadeInLeft"
                                        data-delay=".7s"><span class="f-300">Wide Rang Start From</span><span
                                            class="price f-800"><sup>$</sup>260.00</span></p>
                                    <a href="#" class="btn orange-bg-btn f-700" data-animation="fadeInDown"
                                        data-delay=".9s">Start Buying</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}

        <!-- hero end -->


        {{-- <div class="splitview skewed hero">
            <div class="panel bottom">
                <div class="content">
                    <div class="description">
                        
                    </div>

                    <img src="../images/product-11.jpg" alt="Original">
                </div>
            </div>

            <div class="panel topp">
                <div class="content">
                    <div class="description">
                    </div>

                    <img src="../images/product-10.jpg" alt="Duotone">
                </div>
            </div>

            <div class="handle"></div>
        </div> --}}

        <div class="her0_section">
            <section>
                <div class="rt-container">
                    <div class="col-rt-12">
                        <div class="Scriptcontent">

                            <!-- partial:index.partial.html -->
                            <div class="containerr">
                                <img class='photo' src="../images/nb2.jpg" alt="Image 1" />
                                <img class='photo' src="../images/nb1.jpg" alt="Image 1" />
                                <img class='photo' src="../images/nb3.jpg" alt="Image 1" />
                                <img class='photo' src="../images/nb4.jpg" alt="Image 1" />

                            </div>
                            <!-- partial -->
                        </div>
                    </div>
                </div>
            </section>

        </div>

        <script>
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
        </script>

        <!-- what shop-max offer -->
        {{-- <section class="offer pt-60 pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="offer__section--text pt-25 mb-75">
                            <h4 class="offer-title f-800 black-color position-relative mb-40">What Shopmax Offer?</h4>
                            <p>Lorem Ipsum is simply dummy texting of the printings and typesettingi amet industry.
                                Simply Dummy
                                has been the industry's standard dummy text ever since 1500s exting of the printing and
                                typesetting amet industry.</p>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="features mb-25">
                            <div class="row offers">
                                <div class="col-xl-6 col-lg-4 col-md-6">
                                    <div class="features-box d-flex align-items-center justify-content-between mb-10">
                                        <div class="features--box__text">
                                            <h5 class="f-700 pure__black-color"><a href="#">Easy & Free
                                                    Return</a></h5>
                                            <p>All Over Worldwide</p>
                                        </div>
                                        <div class="features--box__icon">
                                            <i><img src="../img/icon/money-back-gurantee.svg" alt=""></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-4 col-md-6">
                                    <div class="features-box d-flex align-items-center justify-content-between mb-10">
                                        <div class="features--box__text">
                                            <h5 class="f-700 pure__black-color"><a href="#">Money Guarantee</a>
                                            </h5>
                                            <p>Seal Of Trusts</p>
                                        </div>
                                        <div class="features--box__icon">
                                            <i><img src="../img/icon/money-back-gurantee.svg" alt=""></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-4 col-md-6">
                                    <div class="features-box d-flex align-items-center justify-content-between mb-10">
                                        <div class="features--box__text">
                                            <h5 class="f-700 pure__black-color"><a href="#">Online Need
                                                    Helps</a></h5>
                                            <p>24/7 Online Support</p>
                                        </div>
                                        <div class="features--box__icon">
                                            <i><img src="../img/icon/money-back-gurantee.svg" alt=""></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 d-lg-none d-xl-block">
                                    <div class="features-box d-flex align-items-center justify-content-between mb-10">
                                        <div class="features--box__text">
                                            <h5 class="f-700 pure__black-color"><a href="#">Gift Card &
                                                    Voucher</a></h5>
                                            <p>Item per Month</p>
                                        </div>
                                        <div class="features--box__icon">
                                            <i><img src="../img/icon/money-back-gurantee.svg" alt=""></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="offer-banner offer--banner__bg mb-30" data-background="../img/offer/offer2.jpeg">
                            <div class="offer--banner__text">
                                <span class="f-200 white-color">Solid Wooden Furniture</span>
                                <h4 class="white-color f-900 mb-40">40% Flate</h4>
                                <a href="shop-collection.html">View Collection<i
                                        class="icofont-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="offer-banner offer--banner__bg mb-30" data-background="../img/offer/offer1.jpeg">
                            <div class="offer--banner__text">
                                <span class="f-200 white-color">Ceiling Floor Lighting</span>
                                <h4 class="white-color f-900 mb-40">50% Flate</h4>
                                <a href="shop-collection.html">View Collection<i
                                        class="icofont-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- what shop-max offer end -->

        <div class="cats">
            <div class="cat_card">
                <img src="../images/c1.png" alt="">
                <h2>Free Delivery</h2>
            </div>
            <div class="cat_card">
                <img src="../images/c5.png" alt="">
                <h2>Beauty</h2>
            </div>
            <div class="cat_card">
                <img src="../images/c2.png" alt="">
                <h2>Mart</h2>
            </div>
            <div class="cat_card">
                <img src="../images/c3.png" alt="">
                <h2>Fashion</h2>
            </div>
            <div class="cat_card">
                <img src="../images/c4.png" alt="">
                <h2>Furniture</h2>
            </div>
        </div>

        <!-- offer heading  -->
        <div class="offer__heading" style="background: #efefef; color: black;">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="offer__heading--title text-center">
                            <p class="mb-0"><a href="#">Don’t Miss Our Furniture,
                                    Lighting & Decorative
                                    Piece Discount 70% Special Offer - <strong class="f-800">‘NEW01’</strong></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- offer heading end -->

        <!-- Discover All Product  -->
        <section class="all__product pt-20 pb-20">
            <div class="all__product--nav">
                <div class="container">
                    <div class="row all__product--row align-items-center justify-content-between">
                        <div class="col-xl-9 col-md-9">
                            <div class="all__product--menu mb-30">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active btn orange-bg-btn pure__black-color"
                                            id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                                            aria-controls="nav-home" aria-selected="true">Trending Items</a>
                                        <a class="nav-item nav-link btn gray-bg-btn pure__black-color"
                                            id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                                            aria-controls="nav-profile" aria-selected="false">Discounted Items</a>
                                        <a class="  nav-item nav-link btn gray-bg-btn pure__black-color"
                                            id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab"
                                            aria-controls="nav-contact" aria-selected="false">Popular
                                            Product</a>
                                    </div>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-3">
                            <div class="all__product--link text-right mb-30">
                                <a class="all-link" href="{{ route('shop') }}">Discover All Products<span
                                        class="lnr lnr-arrow-right"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="all__product--body">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                    aria-labelledby="nav-home-tab">
                                    <div class="product__active owl-carousel">
                                        @foreach ($products as $product)
                                            <div class="product__single">
                                                <div class="product__box">
                                                    <div class="product__thumb">
                                                        <a href="{{ route('singleProduct', ['id' => $product->id]) }}"
                                                            class="img-wrapper">
                                                            @if ($product->image_url)
                                                                <img class="img"
                                                                    src="{{ asset('storage/uploads/' . $product->image_url) }}"
                                                                    alt="product Image"
                                                                    style="height: 220px; width: auto; margin: 0 auto;">
                                                            @elseif (!$product->image_url && $product->remote_image_url)
                                                                <img class="img"
                                                                    src="{{ $product->remote_image_url }}"
                                                                    alt="product Image"
                                                                    style="height: 220px; width: auto; margin: 0 auto;">
                                                            @else
                                                                <span>No image available</span>
                                                            @endif

                                                            @if ($product->quantity == 0)
                                                                <span class="out-of-stock-tag">Out of Stock</span>
                                                            @elseif ($product->discountedPrice)
                                                                @php
                                                                    $salePercentage =
                                                                        (($product->price - $product->discountedPrice) /
                                                                            $product->price) *
                                                                        100;
                                                                @endphp
                                                                @if ($salePercentage > 0)
                                                                    <span class="sale-tag">Sale
                                                                        {{ round($salePercentage) }}% Off</span>
                                                                @endif
                                                            @endif
                                                        </a>

                                                        <div class="product-action">
                                                            <a href="#"><span class="fas fa-heart"></span></a>
                                                            <a
                                                                href="{{ route('singleProduct', ['id' => $product->id]) }}"><span
                                                                    class="fas fa-eye"></span></a>
                                                            <a
                                                                href="{{ route('addtoCart', ['id' => $product->id]) }}"><span
                                                                    class="fas fa-shopping-cart"></span></a>
                                                        </div>
                                                    </div>
                                                    <div class="product__content--top">
                                                        <span class="cate-name">{{ $product->category->name }}</span>
                                                        <h6 class="product__title mine__shaft-color f-700 mb-0">
                                                            <a
                                                                href="{{ route('singleProduct', ['id' => $product->id]) }}">
                                                                {{ implode(' ', array_slice(explode(' ', $product->name), 0, 6)) }}
                                                                @if (str_word_count($product->name) > 10)
                                                                    ...
                                                                @endif
                                                            </a>
                                                        </h6>

                                                        <div class="rating" style="padding-top: 5px;">
                                                            <ul class="list-inline">
                                                                <li class="rating-active"><i class="fas fa-star"></i>
                                                                </li>
                                                                <li class="rating-active"><i class="fas fa-star"></i>
                                                                </li>
                                                                <li class="rating-active"><i class="fas fa-star"></i>
                                                                </li>
                                                                <li><i class="fas fa-star"></i></li>
                                                                <li><i class="fas fa-star"></i></li>
                                                            </ul>
                                                        </div>
                                                        <br>
                                                        <div
                                                            class="product__content--rating d-flex justify-content-between">
                                                            <div class="price">
                                                                @if ($product->discountedPrice)
                                                                    <span class="original-price"
                                                                        style="text-decoration: line-through; font-size: 13px; margin-right: 5px;">Rs.{{ $product->price }}</span>
                                                                    <span
                                                                        class="discounted-price"><strong>Rs.{{ $product->discountedPrice }}</strong></span>
                                                                @else
                                                                    <span>Rs.{{ $product->price }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>

                                    <script>
                                        function incrementQuantity() {
                                            var quantityInput = document.getElementById('quantity');
                                            var currentQuantity = parseInt(quantityInput.value);
                                            quantityInput.value = currentQuantity + 1;
                                        }

                                        function decrementQuantity() {
                                            var quantityInput = document.getElementById('quantity');
                                            var currentQuantity = parseInt(quantityInput.value);
                                            if (currentQuantity > 1) {
                                                quantityInput.value = currentQuantity - 1;
                                            }
                                        }
                                    </script>
                                </div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                    aria-labelledby="nav-profile-tab">
                                    <div class="product__active owl-carousel">
                                        @foreach ($products as $product)
                                            @if ($product->discountedPrice !== null)
                                                <div class="product__single">
                                                    <div class="product__box">
                                                        <div class="product__thumb">
                                                            <a href="{{ route('singleProduct', ['id' => $product->id]) }}"
                                                                class="img-wrapper">
                                                                @if ($product->image_url)
                                                                    <img class="img"
                                                                        src="{{ asset('storage/uploads/' . $product->image_url) }}"
                                                                        alt="product Image"
                                                                        style="height: 220px; width: auto; margin: 0 auto;">
                                                                @elseif (!$product->image_url && $product->remote_image_url)
                                                                    <img class="img"
                                                                        src="{{ $product->remote_image_url }}"
                                                                        alt="product Image"
                                                                        style="height: 220px; width: auto; margin: 0 auto;">
                                                                @else
                                                                    <span>No image available</span>
                                                                @endif

                                                                @if ($product->quantity == 0)
                                                                    <span class="out-of-stock-tag">Out of Stock</span>
                                                                @elseif ($product->discountedPrice)
                                                                    @php
                                                                        $salePercentage =
                                                                            (($product->price -
                                                                                $product->discountedPrice) /
                                                                                $product->price) *
                                                                            100;
                                                                    @endphp
                                                                    @if ($salePercentage > 0)
                                                                        <span class="sale-tag">Sale
                                                                            {{ round($salePercentage) }}% Off</span>
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
                                                        <div class="product__content--top">
                                                            <span
                                                                class="cate-name">{{ $product->category->name }}</span>
                                                            <h6 class="product__title mine__shaft-color f-700 mb-0"><a
                                                                    href="{{ route('singleProduct', ['id' => $product->id]) }}">{{ implode(' ', array_slice(explode(' ', $product->name), 0, 6)) }}
                                                                    @if (str_word_count($product->name) > 10)
                                                                        ...
                                                                    @endif
                                                                </a>
                                                            </h6>
                                                            <div class="rating" style="padding-top: 5px;">
                                                                <ul class="list-inline">
                                                                    <li class="rating-active"><i
                                                                            class="fas fa-star"></i>
                                                                    </li>
                                                                    <li class="rating-active"><i
                                                                            class="fas fa-star"></i>
                                                                    </li>
                                                                    <li class="rating-active"><i
                                                                            class="fas fa-star"></i>
                                                                    </li>
                                                                    <li><i class="fas fa-star"></i></li>
                                                                    <li><i class="fas fa-star"></i></li>
                                                                </ul>
                                                            </div>
                                                            <br>
                                                            <div
                                                                class="product__content--rating d-flex justify-content-between">
                                                                <div class="price">
                                                                    @if ($product->discountedPrice)
                                                                        <span class="original-price"
                                                                            style="text-decoration: line-through; font-size: 13px; margin-right: 5px;">Rs.{{ $product->price }}</span>
                                                                        <span
                                                                            class="discounted-price"><strong>Rs.{{ $product->discountedPrice }}</strong></span>
                                                                    @else
                                                                        <span>Rs.{{ $product->price }}</span>
                                                                    @endif
                                                                </div>
                                                                {{-- <div class="quantity">
                                                                <button class="btn btn-sm btn-primary"
                                                                    onclick="decrementQuantity()">-</button>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    id="quantity" name="quantity" value="1"
                                                                    readonly>
                                                                <button class="btn btn-sm btn-primary"
                                                                    onclick="incrementQuantity()">+</button>
                                                            </div> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>

                                    <script>
                                        function incrementQuantity() {
                                            var quantityInput = document.getElementById('quantity');
                                            var currentQuantity = parseInt(quantityInput.value);
                                            quantityInput.value = currentQuantity + 1;
                                        }

                                        function decrementQuantity() {
                                            var quantityInput = document.getElementById('quantity');
                                            var currentQuantity = parseInt(quantityInput.value);
                                            if (currentQuantity > 1) {
                                                quantityInput.value = currentQuantity - 1;
                                            }
                                        }
                                    </script>

                                </div>
                                <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                    aria-labelledby="nav-contact-tab">
                                    <div class="product__active owl-carousel">
                                        @foreach ($products as $product)
                                            <div class="product__single">
                                                <div class="product__box">
                                                    <div class="product__thumb">
                                                        <a href="{{ route('singleProduct', ['id' => $product->id]) }}"
                                                            class="img-wrapper">
                                                            @if ($product->image_url)
                                                                <img class="img"
                                                                    src="{{ asset('storage/uploads/' . $product->image_url) }}"
                                                                    alt="product Image"
                                                                    style="height: 220px; width: auto; margin: 0 auto;">
                                                            @elseif (!$product->image_url && $product->remote_image_url)
                                                                <img class="img"
                                                                    src="{{ $product->remote_image_url }}"
                                                                    alt="product Image"
                                                                    style="height: 220px; width: auto; margin: 0 auto;">
                                                            @else
                                                                <span>No image available</span>
                                                            @endif

                                                            @if ($product->quantity == 0)
                                                                <span class="out-of-stock-tag">Out of Stock</span>
                                                            @elseif ($product->discountedPrice)
                                                                @php
                                                                    $salePercentage =
                                                                        (($product->price - $product->discountedPrice) /
                                                                            $product->price) *
                                                                        100;
                                                                @endphp
                                                                @if ($salePercentage > 0)
                                                                    <span class="sale-tag">Sale
                                                                        {{ round($salePercentage) }}% Off</span>
                                                                @endif
                                                            @endif
                                                        </a>
                                                        <div class="product-action">
                                                            <a href="#"><span class="fas fa-heart"></span></a>
                                                            <a
                                                                href="{{ route('singleProduct', ['id' => $product->id]) }}"><span
                                                                    class="fas fa-eye"></span></a>
                                                            <a
                                                                href="{{ route('addtoCart', ['id' => $product->id]) }}"><span
                                                                    class="fas fa-shopping-cart"></span></a>
                                                        </div>
                                                    </div>
                                                    <div class="product__content--top">
                                                        <span class="cate-name">{{ $product->category->name }}</span>
                                                        <h6 class="product__title mine__shaft-color f-700 mb-0"><a
                                                                href="{{ route('singleProduct', ['id' => $product->id]) }}">{{ implode(' ', array_slice(explode(' ', $product->name), 0, 6)) }}
                                                                @if (str_word_count($product->name) > 10)
                                                                    ...
                                                                @endif
                                                            </a>
                                                        </h6>
                                                        <div class="rating" style="padding-top: 5px;">
                                                            <ul class="list-inline">
                                                                <li class="rating-active"><i class="fas fa-star"></i>
                                                                </li>
                                                                <li class="rating-active"><i class="fas fa-star"></i>
                                                                </li>
                                                                <li class="rating-active"><i class="fas fa-star"></i>
                                                                </li>
                                                                <li><i class="fas fa-star"></i></li>
                                                                <li><i class="fas fa-star"></i></li>
                                                            </ul>
                                                        </div>
                                                        <br>
                                                        <div
                                                            class="product__content--rating d-flex justify-content-between">
                                                            <div class="price">
                                                                @if ($product->discountedPrice)
                                                                    <span class="original-price"
                                                                        style="text-decoration: line-through; font-size: 13px; margin-right: 5px;">Rs.{{ $product->price }}</span>
                                                                    <span
                                                                        class="discounted-price"><strong>Rs.{{ $product->discountedPrice }}</strong></span>
                                                                @else
                                                                    <span>Rs.{{ $product->price }}</span>
                                                                @endif
                                                            </div>
                                                            {{-- <div class="quantity">
                                                                <button class="btn btn-sm btn-primary"
                                                                    onclick="decrementQuantity()">-</button>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    id="quantity" name="quantity" value="1"
                                                                    readonly>
                                                                <button class="btn btn-sm btn-primary"
                                                                    onclick="incrementQuantity()">+</button>
                                                            </div> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    <script>
                                        function incrementQuantity() {
                                            var quantityInput = document.getElementById('quantity');
                                            var currentQuantity = parseInt(quantityInput.value);
                                            quantityInput.value = currentQuantity + 1;
                                        }

                                        function decrementQuantity() {
                                            var quantityInput = document.getElementById('quantity');
                                            var currentQuantity = parseInt(quantityInput.value);
                                            if (currentQuantity > 1) {
                                                quantityInput.value = currentQuantity - 1;
                                            }
                                        }
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="offer-banner offer--banner__bg mb-30" data-background="../images/bn12.jpg">
                                <div class="offer--banner__text">
                                    <span class="f-200 white-color">Solid Wooden Furniture</span>
                                    <h4 class="white-color f-900 mb-40">40% Flate</h4>
                                    <a href="shop-collection.html">View Collection<i
                                            class="icofont-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="offer-banner offer--banner__bg mb-30" data-background="../images/bn13.jpg">
                                <div class="offer--banner__text">
                                    <span class="f-200 white-color">Ceiling Floor Lighting</span>
                                    <h4 class="white-color f-900 mb-40">50% Flate</h4>
                                    <a href="shop-collection.html">View Collection<i
                                            class="icofont-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Discover All Product end -->



        <!-- Top Featured Area  -->
        {{-- <div class="top__featured--area pt-80 pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-xl-2">
                        <div class="top__featured--title">
                            <span class="dusty__gray-color text-uppercase">Top Featured</span>
                            <h3 class="pure__black-color mb-120"><span class="f-300">Discover Top</span> <span
                                    class="f-800">Categories</span></h3>
                            <a class="grenadier-color" href="shop-collection.html">View All Category</a>
                        </div>
                    </div>
                    <div class="col-xl-10">
                        <div class="categories-active row position-relative">
                            @foreach ($categories as $category)
                                <div class="single-categories col-sm-12">
                                    <div class="categories-box position-relative">
                                        <div class="categories-thumb">
                                            <a href="{{ route('shopcategory', ['id' => $category->id]) }}">
                                                <img class="pb-3"
                                                    src="{{ asset('storage/uploads/' . $category->image_url) }}"
                                                    alt="Category Image"
                                                    style="height: 200px; width: auto; margin: 0 auto;">
                                            </a>
                                            <br>

                                            <h6 class="f-800 pure__black-color cate-title"><a
                                                    href="#">{{ $category->name }}</a></h6>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- Top Featured Area end -->

        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-sm-6">
                    <div class="product-section mb-30">
                        <h6 class="product--section__title f-800 white-color grenadier-bg">Categories</h6>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="all__product--link text-right mb-30">
                        <a class="all-link" href="{{ route('shop') }}">Discover All Products<span
                                class="lnr lnr-arrow-right"></span></a>
                    </div>
                </div>
            </div>
            <div class="categoriess">
                @foreach ($categories as $key => $category)
                    @if ($key <= 15)
                        <div class="cats_card">
                            <img style="width: auto; border-radius: 20px;"
                                src="{{ asset('storage/uploads/' . $category->image_url) }}" alt="">
                            <h2 style="text-align: center;">{{ $category->name }}</h2>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <style>
            .categoriess {
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: row;
                flex-wrap: wrap;
                width: 100%;
                height: auto;
                padding: 10px;
            }

            .cats_card {
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                width: 12%;
                height: 180px;
                padding: 10px;
            }


            .cats_card img {
                width: auto;
                height: 70%;
            }

            .cats_card h2 {
                font-size: 14px;
                font-weight: 400;
                padding: 10px 0;
            }

            @media (max-width: 1200px) {
                .categoriess .cats_card {
                    width: 17%;
                }
            }

            @media (max-width: 1050px) {
                .categoriess .cats_card {
                    width: 20%;
                }
            }

            @media (max-width: 800px) {
                .categoriess .cats_card {
                    width: 25%;
                }
            }

            @media (max-width: 500px) {
                .categoriess .cats_card {
                    width: 30%;
                }
            }

            

            

            @media (max-width: 1050px) {
                .categoriess .cats_card {
                    height: 150px;
                }

                .categoriess .cats_card h2 {
                    font-size: 16px;

                }
            }

            @media (max-width: 750px) {
                .categoriess .cats_card {
                    height: 120px;
                }

                .categoriess .cats_card h2 {
                    font-size: 12px;

                }
            }

            @media (max-width: 500px) {
                .categoriess .cats_card {
                    height: 90px;
                }

                .categoriess .cats_card h2 {
                    font-size: 10px;

                }
            }
        </style>




        {{-- <!-- Weekly Deals -->
        <div class="offer-deals">
            <div class="offer--deals__main offer-deals--bg pt-75 pb-45" data-background="../img/offer/offer10.jpg"
                style="background-position: center; background-size: cover; background-attachment: fixed;">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="offer--deals__tabs">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel"
                                        aria-labelledby="home-tab">
                                        <div class="row align-items-center">
                                            <div class="col-xl-4 col-lg-4">
                                                <div class="offer--deals__title mb-30">
                                                    <h2>Limited <span class="f-800 pure__black-color d-block">Weekly
                                                            Deals</span></h2>
                                                    <p>Hurry Up Before Offer Will End</p>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 offset-xl-4 col-lg-6 offset-lg-2">
                                                <div class="offer--deals__products mb-30">
                                                    <div class="ratings mb-10">
                                                        <ul class="list-inline">
                                                            <li class="rating-active"><i class="fas fa-star"></i>
                                                            </li>
                                                            <li class="rating-active"><i class="fas fa-star"></i>
                                                            </li>
                                                            <li class="rating-active"><i class="fas fa-star"></i>
                                                            </li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                        </ul>
                                                    </div>
                                                    <div class="products--deals__content mb-35">
                                                        <h6 class="f-700 mb-20"><a href="#">3D Wooden Ceiling
                                                                Floor Lighting For
                                                                Living Room</a></h6>
                                                        <span class="price-old">$2,299.00</span>
                                                        <span class="price-new f-600 grenadier-color">$2,299.00</span>
                                                    </div>
                                                    <div class="product-countdown mb-15">
                                                        <div class="time-count-deal">
                                                            <div class="countdown-list" data-countdown="2019/12/01">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product--footer__deals">
                                                        <a class="add-link f-700">+ Add To Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel"
                                        aria-labelledby="profile-tab">
                                        <div class="row align-items-center">
                                            <div class="col-xl-4 col-lg-4">
                                                <div class="offer--deals__title mb-30">
                                                    <h2>Limited <span class="f-800 pure__black-color d-block">Weekly
                                                            Deals</span></h2>
                                                    <p>Hurry Up Before Offer Will End</p>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 offset-xl-4 col-lg-6 offset-lg-2">
                                                <div class="offer--deals__products mb-30">
                                                    <div class="ratings mb-10">
                                                        <ul class="list-inline">
                                                            <li class="rating-active"><i class="fas fa-star"></i>
                                                            </li>
                                                            <li class="rating-active"><i class="fas fa-star"></i>
                                                            </li>
                                                            <li class="rating-active"><i class="fas fa-star"></i>
                                                            </li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                        </ul>
                                                    </div>
                                                    <div class="products--deals__content mb-35">
                                                        <h6 class="f-700 mb-20"><a href="#">3D Wooden Ceiling
                                                                Floor Lighting For
                                                                Living Room</a></h6>
                                                        <span class="price-old">$2,299.00</span>
                                                        <span class="price-new f-600 grenadier-color">$2,299.00</span>
                                                    </div>
                                                    <div class="product-countdown text-right mb-15">
                                                        <div class="time-count-deal">
                                                            <div class="countdown-list" data-countdown="2019/12/01">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product--footer__deals">
                                                        <a class="add-link f-700">+ Add To Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="contact" role="tabpanel"
                                        aria-labelledby="contact-tab">
                                        <div class="row align-items-center">
                                            <div class="col-xl-4 col-lg-4">
                                                <div class="offer--deals__title mb-30">
                                                    <h2>Limited <span class="f-800 pure__black-color d-block">Weekly
                                                            Deals</span></h2>
                                                    <p>Hurry Up Before Offer Will End</p>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 offset-xl-4 col-lg-6 offset-lg-2">
                                                <div class="offer--deals__products mb-30">
                                                    <div class="ratings mb-10">
                                                        <ul class="list-inline">
                                                            <li class="rating-active"><i class="fas fa-star"></i>
                                                            </li>
                                                            <li class="rating-active"><i class="fas fa-star"></i>
                                                            </li>
                                                            <li class="rating-active"><i class="fas fa-star"></i>
                                                            </li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                        </ul>
                                                    </div>
                                                    <div class="products--deals__content mb-35">
                                                        <h6 class="f-700 mb-20"><a href="#">3D Wooden Ceiling
                                                                Floor Lighting For
                                                                Living Room</a></h6>
                                                        <span class="price-old">$2,299.00</span>
                                                        <span class="price-new f-600 grenadier-color">$2,299.00</span>
                                                    </div>
                                                    <div class="product-countdown text-right mb-15">
                                                        <div class="time-count-deal">
                                                            <div class="countdown-list" data-countdown="2019/12/01">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product--footer__deals">
                                                        <a class="add-link f-700">+ Add To Cart</a>
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
            </div>
            <div class="offer--deals__menu">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="deals--nav__menu">
                                <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
                                            role="tab" aria-controls="home" aria-selected="true">Gaming Console &
                                            Control</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile"
                                            role="tab" aria-controls="profile" aria-selected="false">Microwave
                                            Ovens</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact"
                                            role="tab" aria-controls="contact" aria-selected="false">Smart
                                            Watches Deal Series 2</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="computer-tab" data-toggle="tab" href="#computer"
                                            role="tab" aria-selected="false">Computer & TVs</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="watch-tab" data-toggle="tab" href="#watch"
                                            role="tab" aria-selected="false">Smart Watches Deal Series 2</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Weekly Deals end --> --}}

        <!-- Product  -->
        <div class="product pt-60 fix">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-sm-6">
                        <div class="product-section mb-30">
                            <h6 class="product--section__title f-800 white-color grenadier-bg">Featured Items</h6>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="all__product--link text-right mb-30">
                            <a class="all-link" href="{{ route('shop') }}">Discover All Products<span
                                    class="lnr lnr-arrow-right"></span></a>
                        </div>
                    </div>
                </div>
                <div class="row mt-30">
                    <div class="col-sm-12" id="product-list">
                        @if ($products->isEmpty())
                            <div class="text-center">No products in this category.</div>
                        @else
                            <div class="row">
                                @foreach ($products as $key => $product)
                                    @if ($key <= 11)
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

                                                            @if ($product->discountedPrice)
                                                                @php
                                                                    $salePercentage =
                                                                        (($product->price - $product->discountedPrice) /
                                                                            $product->price) *
                                                                        100;
                                                                @endphp
                                                                @if ($salePercentage > 0)
                                                                    <span class="sale-tag">Sale
                                                                        {{ round($salePercentage) }}% Off</span>
                                                                @endif
                                                            @endif
                                                        </a>
                                                        <div class="product-action">
                                                            <a href="#"><span class="fas fa-heart"></span></a>
                                                            <a
                                                                href="{{ route('singleProduct', ['id' => $product->id]) }}"><span
                                                                    class="fas fa-eye"></span></a>
                                                            <a
                                                                href="{{ route('addtoCart', ['id' => $product->id]) }}"><span
                                                                    class="fas fa-shopping-cart"></span></a>
                                                        </div>
                                                    </div>
                                                    <div class="product__content--top">
                                                        <span class="cate-name">{{ $product->category->name }}</span>
                                                        <h6 style="font-size: 13px;"
                                                            class="product__title mine__shaft-color f-700 mb-0"><a
                                                                href="product-details.html">{{ implode(' ', array_slice(explode(' ', $product->name), 0, 5)) }}
                                                                @if (str_word_count($product->name) > 10)
                                                                    ...
                                                                @endif
                                                            </a>
                                                        </h6>
                                                        <div class="rating" style="padding-top: 5px;">
                                                            <ul class="list-inline">
                                                                <li class="rating-active"><i class="fas fa-star"></i>
                                                                </li>
                                                                <li class="rating-active"><i class="fas fa-star"></i>
                                                                </li>
                                                                <li class="rating-active"><i class="fas fa-star"></i>
                                                                </li>
                                                                <li><i class="fas fa-star"></i></li>
                                                                <li><i class="fas fa-star"></i></li>
                                                            </ul>
                                                        </div>
                                                        <br>
                                                        <div
                                                            class="product__content--rating d-flex justify-content-between">
                                                            <div class="price">
                                                                @if ($product->discountedPrice)
                                                                    <span class="original-price"
                                                                        style="text-decoration: line-through; font-size: 13px; margin-right: 5px;">Rs.{{ $product->price }}</span>
                                                                    <span
                                                                        class="discounted-price"><strong>Rs.{{ $product->discountedPrice }}</strong></span>
                                                                @else
                                                                    <span>Rs.{{ $product->price }}</span>
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
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- Product end -->

        <!-- Product  -->
        {{-- <div class="product pt-50 feature-h-one">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-9 col-sm-6">
                        <div class="product-section mb-30">
                            <h6 class="product--section__title f-800 white-color grenadier-bg">Featured Items</h6>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="all__product--link text-right mb-30">
                            <a class="all-link" href="shop-collection.html">Discover All Products<span
                                    class="lnr lnr-arrow-right"></span></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($products as $key => $product)
                        @if ($key <= 5)
                            <div class="col-lg-4 col-md-6">
                                <div class="product__single mb-30">
                                    <div class="product__box featured__box--item">
                                        <div style="width: 50%; margin 0 auto;" class="product__thumb">
                                            <a href="product-details.html"><img class="img"
                                                    style="height: 160px; padding-right: 20px;"
                                                    src="{{ asset('storage/uploads/' . $product->image_url) }}"
                                                    alt=""></a>
                                            @if ($product->discountedPrice)
                                                @php
                                                    $salePercentage =
                                                        (($product->price - $product->discountedPrice) /
                                                            $product->price) *
                                                        100;
                                                @endphp

                                                @if ($salePercentage > 0)
                                                    <span class="sale-tag">Sale
                                                        {{ round($salePercentage) }}% Off</span>
                                                @endif
                                            @endif
                                        </div>
                                        <div style="width: 50%;" class="product--flex__right">
                                            <div class="product__content--top">
                                                <span class="cate-name">{{ $product->category->name }}</span>
                                                <h6 class="product__title mine__shaft-color f-700 mb-30"><a
                                                        href="product-details.html">{{ $product->name }}</a></h6>
                                            </div>
                                            <div class="rating">
                                                <ul class="list-inline">
                                                    <li class="rating-active"><i class="fas fa-star"></i></li>
                                                    <li class="rating-active"><i class="fas fa-star"></i></li>
                                                    <li class="rating-active"><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                </ul>
                                            </div>
                                            <div class="product__content--rating d-flex justify-content-between">

                                                <div class="price">
                                                    @if ($product->discountedPrice)
                                                        <span class="original-price"
                                                            style="text-decoration: line-through; font-size: 13px; margin-right: 5px;">Rs.
                                                            {{ $product->price }}</span>
                                                        <span class="discounted-price"> <strong>Rs.
                                                                {{ $product->discountedPrice }}</strong></span>
                                                    @else
                                                        <span>Rs. {{ $product->price }}</span>
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
            </div>
        </div> --}}
        <!-- Product end -->

        <!-- Product  -->
        {{-- <div class="product pt-50 pb-40">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-9 col-sm-6">
                        <div class="product-section mb-20">
                            <h6 class="product--section__title f-800 white-color grenadier-bg">Featured Items
                            </h6>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="all__product--link text-right mb-20">
                            <a class="all-link" href="shop-collection.html">Discover All Products<span
                                    class="lnr lnr-arrow-right"></span></a>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-xl-3 d-none d-xl-block">
                        <div class="small__banner mb-30">
                            <div class="small__banner--thumb position-relative">
                                <a href="#"><img src="../img/offer/offer2.jpeg" alt=""></a>
                                <div class="small__banner--content text-center">
                                    <span class="f-300 white-color">Table Lamp</span>
                                    <h2 class="f-800 white-color">60% Flate</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9">
                        <div class="product__active--small owl-carousel mb-30">
                            @foreach ($products as $product)
                                <div class="product__single">
                                    <div class="product__box">
                                        <div class="product__thumb">
                                            <a href="{{ route('singleProduct', ['id' => $product->id]) }}"
                                                class="img-wrapper">
                                                <img style="height: 220px;" class="img"
                                                    src="{{ asset('storage/uploads/' . $product->image_url) }}"
                                                    alt="">
                                                
                                                @if ($product->discountedPrice)
                                                    @php
                                                        $salePercentage =
                                                            (($product->price - $product->discountedPrice) /
                                                                $product->price) *
                                                            100;
                                                    @endphp
                                                    @if ($salePercentage > 0)
                                                        <span class="sale-tag">Sale
                                                            {{ round($salePercentage) }}% Off</span>
                                                    @endif
                                                @endif
                                            </a>
                                            <div class="product-action">
                                                <a href="#"><span class="fas fa-heart"></span></a>
                                                <a href="{{ route('singleProduct', ['id' => $product->id]) }}"><span
                                                        class="fas fa-eye"></span></a>
                                                <a href="{{ route('addtoCart', ['id' => $product->id]) }}"><span
                                                        class="fas fa-shopping-cart"></span></a>
                                            </div>
                                        </div>
                                        <div class="product__content--top">
                                            <span class="cate-name">{{ $product->category->name }}</span>
                                            <h6 class="product__title mine__shaft-color f-700 mb-0"><a
                                                    href="product-details.html">{{ $product->name }}</a>
                                            </h6>
                                            <div class="rating" style="padding-top: 5px;">
                                                <ul class="list-inline">
                                                    <li class="rating-active"><i class="fas fa-star"></i>
                                                    </li>
                                                    <li class="rating-active"><i class="fas fa-star"></i>
                                                    </li>
                                                    <li class="rating-active"><i class="fas fa-star"></i>
                                                    </li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                </ul>
                                            </div>
                                            <br>
                                            <div class="product__content--rating d-flex justify-content-between">
                                                <div class="price">
                                                    @if ($product->discountedPrice)
                                                        <span class="original-price"
                                                            style="text-decoration: line-through; font-size: 13px; margin-right: 5px;">Rs.{{ $product->price }}</span>
                                                        <span
                                                            class="discounted-price"><strong>Rs.{{ $product->discountedPrice }}</strong></span>
                                                    @else
                                                        <span>Rs.{{ $product->price }}</span>
                                                    @endif
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- Product end -->

        <!-- Product  -->
        {{-- <div class="product pb-40">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-9 col-sm-6">
                        <div class="product-section mb-20">
                            <h6 class="product--section__title f-800 white-color grenadier-bg">Featured Items
                            </h6>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="all__product--link text-right mb-20">
                            <a class="all-link" href="shop-collection.html">Discover All Products<span
                                    class="lnr lnr-arrow-right"></span></a>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-xl-3 d-none d-xl-block">
                        <div class="small__banner mb-30">
                            <div class="small__banner--thumb position-relative">
                                <a href="#"><img src="../img/offer/offer__small__thumb2.jpg"
                                        alt=""></a>
                                <div class="small__banner--content text-center">
                                    <span class="f-300 white-color">Table Lamp</span>
                                    <h2 class="f-800 white-color">60% Flate</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9">
                        <div class="product__active--small owl-carousel mb-30">
                            <div class="product__single">
                                <div class="product__box">
                                    <div class="product__thumb">
                                        <a href="product-details.html" class="img-wrapper">
                                            <img class="img" src="../img/allproducts/products__thumb__08.jpg"
                                                alt="">
                                            <img class="img secondary-img"
                                                src="../img/allproducts/products__thumb__04.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="product__content--top">
                                        <span class="cate-name">SAMSUNG</span>
                                        <h6 class="product__title mine__shaft-color f-700 mb-0"><a
                                                href="product-details.html">Wireless Audioing Systems Purple
                                                Degree</a></h6>
                                    </div>
                                    <div class="product__content--rating d-flex justify-content-between">
                                        <div class="rating">
                                            <ul class="list-inline">
                                                <li class="rating-active"><i class="fas fa-star"></i></li>
                                                <li class="rating-active"><i class="fas fa-star"></i></li>
                                                <li class="rating-active"><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                            </ul>
                                        </div>
                                        <div class="price">
                                            <h5 class="grenadier-color f-600">$2,299.00</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-action">
                                    <a href="#"><span class="lnr lnr-heart"></span></a>
                                    <a href="#"><span class="lnr lnr-eye"></span></a>
                                    <a href="#"><span class="lnr lnr-cart"></span></a>
                                    <a href="#"><span class="lnr lnr-sync"></span></a>
                                </div>
                            </div>
                            <div class="product__single">
                                <div class="product__box">
                                    <div class="product__thumb">
                                        <a href="product-details.html" class="img-wrapper">
                                            <img class="img" src="../img/allproducts/products__thumb__07.jpg"
                                                alt="">
                                            <img class="img secondary-img"
                                                src="../img/allproducts/products__thumb__05.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="product__content--top">
                                        <span class="cate-name">SAMSUNG</span>
                                        <h6 class="product__title mine__shaft-color f-700 mb-0"><a
                                                href="product-details.html">Wireless Audioing Systems Purple
                                                Degree</a></h6>
                                    </div>
                                    <div class="product__content--rating d-flex justify-content-between">
                                        <div class="rating">
                                            <ul class="list-inline">
                                                <li class="rating-active"><i class="fas fa-star"></i></li>
                                                <li class="rating-active"><i class="fas fa-star"></i></li>
                                                <li class="rating-active"><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                            </ul>
                                        </div>
                                        <div class="price">
                                            <h5 class="grenadier-color f-600">$2,299.00</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-action">
                                    <a href="#"><span class="lnr lnr-heart"></span></a>
                                    <a href="#"><span class="lnr lnr-eye"></span></a>
                                    <a href="#"><span class="lnr lnr-cart"></span></a>
                                    <a href="#"><span class="lnr lnr-sync"></span></a>
                                </div>
                            </div>
                            <div class="product__single">
                                <div class="product__box">
                                    <div class="product__thumb">
                                        <a href="product-details.html" class="img-wrapper">
                                            <img class="img" src="../img/allproducts/products__thumb__10.jpg"
                                                alt="">
                                            <img class="img secondary-img"
                                                src="../img/allproducts/products__thumb__09.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="product__content--top">
                                        <span class="cate-name">SAMSUNG</span>
                                        <h6 class="product__title mine__shaft-color f-700 mb-0"><a
                                                href="product-details.html">Wireless Audioing Systems Purple
                                                Degree</a></h6>
                                    </div>
                                    <div class="product__content--rating d-flex justify-content-between">
                                        <div class="rating">
                                            <ul class="list-inline">
                                                <li class="rating-active"><i class="fas fa-star"></i></li>
                                                <li class="rating-active"><i class="fas fa-star"></i></li>
                                                <li class="rating-active"><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                            </ul>
                                        </div>
                                        <div class="price">
                                            <h5 class="grenadier-color f-600">$2,299.00</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-action">
                                    <a href="#"><span class="lnr lnr-heart"></span></a>
                                    <a href="#"><span class="lnr lnr-eye"></span></a>
                                    <a href="#"><span class="lnr lnr-cart"></span></a>
                                    <a href="#"><span class="lnr lnr-sync"></span></a>
                                </div>
                            </div>
                            <div class="product__single">
                                <div class="product__box">
                                    <div class="product__thumb">
                                        <a href="product-details.html" class="img-wrapper">
                                            <img class="img" src="../img/allproducts/products__thumb__11.jpg"
                                                alt="">
                                            <img class="img secondary-img"
                                                src="../img/allproducts/products__thumb__06.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="product__content--top">
                                        <span class="cate-name">SAMSUNG</span>
                                        <h6 class="product__title mine__shaft-color f-700 mb-0"><a
                                                href="product-details.html">Wireless Audioing Systems Purple
                                                Degree</a></h6>
                                    </div>
                                    <div class="product__content--rating d-flex justify-content-between">
                                        <div class="rating">
                                            <ul class="list-inline">
                                                <li class="rating-active"><i class="fas fa-star"></i></li>
                                                <li class="rating-active"><i class="fas fa-star"></i></li>
                                                <li class="rating-active"><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                            </ul>
                                        </div>
                                        <div class="price">
                                            <h5 class="grenadier-color f-600">$2,299.00</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-action">
                                    <a href="#"><span class="lnr lnr-heart"></span></a>
                                    <a href="#"><span class="lnr lnr-eye"></span></a>
                                    <a href="#"><span class="lnr lnr-cart"></span></a>
                                    <a href="#"><span class="lnr lnr-sync"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- Product end -->

        <!-- Brand -->
        <div class="brand">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="brand-active">
                            <div class="single-brand">
                                <img src="../img/brand/brand-logo1.png" alt="">
                            </div>
                            <div class="single-brand">
                                <img src="../img/brand/brand-logo2.png" alt="">
                            </div>
                            <div class="single-brand">
                                <img src="../img/brand/brand-logo3.png" alt="">
                            </div>
                            <div class="single-brand">
                                <img src="../img/brand/brand-logo4.png" alt="">
                            </div>
                            <div class="single-brand">
                                <img src="../img/brand/brand-logo5.png" alt="">
                            </div>
                            <div class="single-brand">
                                <img src="../img/brand/brand-logo2.png" alt="">
                            </div>
                            <div class="single-brand">
                                <img src="../img/brand/brand-logo1.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Brand End -->

        <!-- Subscribe -->

        <!-- Subscribe End -->

        <!-- modal area start --
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
            Launch demo modal
        </button>

        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                       <div class="modal-wrapper">
                           <div class="pro-img">
                               <img src="../img/allproducts/modal-img.jpg" data-zoom-image="../img/allproducts/demo.jpg" class="zoom-e-img" alt="">
                           </div>
                           <div class="pro-text">
                               <h4>-30% on Subscribe</h4>
                               <p>Five things you only know if you were at Chanel
                                   Hamburg Show Kering Reinforces Luxury Status
                                   By Distributing Puma.</p>
                                <form action="#">
                                    <input type="email" placeholder="Enter your Email">
                                    <button type="submit">Submit</button>
                                    <span>
                                        <input type="checkbox">
                                        Prevent this pop-up
                                    </span>
                                </form>
                           </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
        -- modal area end -->

    </main>
    <div class="subscribe subscribe--area grenadier-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="newsletter newsletter--box d-flex justify-content-between align-items-center pos-rel">
                        <div class="left d-flex justify-content-between align-items-center">
                            <div class="newsletter__title">
                                <span class="notification--icon"><img src="../img/icon/notification-icon.png"
                                        alt="notification"></span>
                                <span class="notification__title--heading f-800 white-color">Subscribe for Join
                                    Us!</span>
                            </div>
                            <div class="newsletter--message d-none d-xl-block">
                                <p class="newsletter__message__title mb-0">.... & receive $20 coupne for first
                                    Shopping &
                                    free delivery.</p>
                            </div>
                        </div>
                        <form class="right newsletter--form pos-rel">
                            <input class="newsletter--input" type="text"
                                placeholder="Enter Your Email Address ...">
                            <button class="btn newsletter--button" type="button"><img
                                    src="../img/icon/plan-icon.png" alt=""></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
