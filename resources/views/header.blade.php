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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="manifest" href="site.webmanifest">




    <link rel="manifest" href="site.webmanifest">
    <style>
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropbtn {
            background-color: white;
            color: black;
            padding: 15px 40px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            border-top: 2px solid rgba(0, 0, 0, 0.9);
            font-weight: bold;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: white;
            width: 250px;
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
            z-index: 1;
            padding: 10px 0;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .dropdown-content a {
            color: black;
            padding: 10px 20px;
            text-decoration: none;
            display: block;

        }

        .dropdown:hover .dropdown-content {
            display: block;
            z-index: 1000;
            opacity: 1;

        }
    </style>
    <style>
        .logout_button {
            color: black;
            background: transparent;
            padding: 10px 20px 10px 20px;
            border: none;
        }

        .register {
            /* border-radius: 20px; */
            color: black;
            background: transparent;
            padding: 10px 20px 10px 20px;
            border-left: 1px solid black;
        }

        .middle {
            box-shadow: 0px 10px 10px -4px rgba(0, 0, 0, 0.1);

        }

        .search--header__middle input {
            border-radius: 20px;
            border: 1px solid rgba(0, 0, 0, 0.6);
        }

        .search--header__middle button {
            border-radius: 20px;
            border: 1px solid rgba(0, 0, 0, 0.6);
        }

        .mini__cart--box {
            box-shadow: 20px 20px 20px -8px rgba(0, 0, 0, 0.2);

        }

        .header.sticky {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        /* Adjust top padding for content below the sticky header */
        .content-below-sticky-header {
            padding-top: 100px;
            /* Adjust the value based on the height of your sticky header */
        }

        /* Add margin top on 800px width */
        @media (max-width: 800px) {
            .mnu {
                margin-top: 40px;
                padding: 0;
            }

            .top {
                padding: 0;
            }


        }
    </style>
    <title>Document</title>
</head>

<body>
    <header class="header" id="header">
        <div class="top header__top gray-bg d-none d-md-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <div class="message--header__top">
                            <p class="message m-0 dove__gray-color">Free Shipping Worldwide - On All Order Over $1000
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="menu--header__top text-right">
                            <nav class="nav--top__list">
                                <ul class="list-inline">
                                    <li><a class="nav--top__link dove__gray-color text-capitalize position-relative"
                                            href="#">store Locator</a></li>
                                    <li><a class="nav--top__link dove__gray-color text-capitalize position-relative"
                                            href="{{ route('userOrders') }}">Track Orders</a></li>
                                    <li><a class="nav--top__link dove__gray-color text-capitalize position-relative"
                                            href="#">Credit Card</a></li>
                                    <li class="nav--top__dropdown position-relative"><a
                                            class="nav--top__link lang--top__link dove__gray-color text-capitalize position-relative"
                                            href="#">English & Dollar<span
                                                class="lnr lnr-chevron-down"></span></a>
                                        <ul class="dropdown-show">
                                            <li><a class="dove__gray-color text-capitalize" href="#"><span
                                                        class="lang">canada</span><span
                                                        class="currency">USD</span></a></li>
                                            <li><a class="dove__gray-color text-capitalize" href="#"><span
                                                        class="lang">Bangladesh</span><span
                                                        class="currency">TAKA</span></a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style=" background: #f2f2f2;" class="middle header__middle bg--header__middle pt-15 pb-15">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="content--header__middle d-flex align-items-center justify-content-between">
                            <div class="logo--header__middle">
                                <div class="logo">
                                    <a class="logo__link" href="index.html"><img src="img/logo/h1__logo.png"
                                            alt=""></a>
                                </div>
                            </div>
                            <div class="search--header__middle h1search--header__middle">
                                <form class="search--header__form position-relative"
                                    action="{{ route('searchProducts') }}" method="GET">
                                    <div class="header--search__box">
                                        <input class="header--search__query" type="text" id="serachProducts"
                                            name="serachProducts" placeholder="Search For Products..."
                                            autocomplete="off">
                                        <button type="submit" class="header--search__btn"><i
                                                class="fas fa-search"></i></button>
                                    </div>
                                    <div class="header--search__cate">
                                        <select name="header-search" id="header--search__main">
                                            <option value="{{ route('shop') }}">All Categories</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ route('shopcategory', ['id' => $category->id]) }}">
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </form>
                            </div>

                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                            <script>
                                $(document).ready(function() {
                                    $('#header--search__main').change(function() {
                                        window.location = $(this).val();
                                    });
                                });
                            </script>

                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                            <script>
                                $(document).ready(function() {
                                    $('#header--search__main').change(function() {
                                        window.location = $(this).val();
                                    });
                                });
                            </script>

                            <div class="cart--header__middle d-none d-md-block">
                                <div class="cart--header__list">
                                    <ul class="list-inline">
                                        @guest
                                            <li class="nav-item">
                                                <a class="logout_button" class="nav-link"
                                                    href="{{ route('register') }}">Login</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="register" class="nav-link"
                                                    href="{{ route('register') }}">Register</a>
                                            </li>
                                        @endguest
                                        @auth
                                            <li class="nav-item">
                                                <a class="nav-link" href="#" role="button" aria-haspopup="true"
                                                    aria-expanded="false" v-pre>
                                                    {{ Auth::user()->name }}
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                    <button class="logout_button" type="submit">Logout</button>
                                                </form>
                                            </li>
                                        @endauth

                                        <li><a href="#"><i class="fas fa-heart"></i></a></li>
                                        <li><a class="mini__cart--link" href="#"><i
                                                    class="fas fa-shopping-bag"><span
                                                        class="cart__count">{{ $totalItems }}</span></i><span
                                                    class="cart__amount">Rs. {{ $totalPrice }}</span></a></li>

                                    </ul>
                                </div>
                                <div style="width: 300px; border: none;" class="mini__cart--box">
                                    <ul>
                                        @if (!$cart->isEmpty())
                                            @foreach ($cart as $key => $item)
                                                @if ($key <= 1)
                                                    <li class="mb-20">
                                                        <a>


                                                        </a>
                                                        <div class="cart-image">
                                                            <a
                                                                href="{{ route('singleProduct', ['id' => $item->product->id]) }}"><img
                                                                    src={{ asset( 'storage/uploads/' . $item->product->image_url) }}
                                                                    alt=""></a>
                                                        </div>
                                                        <div class="cart-text">
                                                            <a href="#"
                                                                class="title f-400 cod__black-color">{{ $item->product->name }}</a>
                                                            <span
                                                                class="cart-price f-400 dusty__gray-color">{{ $item->quantity }}
                                                                x </span>
                                                            <span class="price f-800 cod__black-color">Rs
                                                                {{ $item->product->price }}</span>
                                                        </div>
                                                        <div class="del-button">
                                                            <a href="#"><i class="icofont-close-line"></i></a>
                                                        </div>
                                                    </li>
                                                @endif
                                            @endforeach
                                        @else
                                            <div class="text-center">No products in the Bag.</div>
                                        @endif





                                        <li>
                                            <div class="total-text d-flex justify-content-between">
                                                <span class="f-800 cod__black-color">Total Bag </span>
                                                <span class="f-800 cod__black-color">Rs {{ $totalPrice }}</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex justify-content-between">
                                                <a href="{{ route('checkout') }}" class="checkout">Checkout</a>
                                                <a href="{{ route('cart') }}" class="viewcart">View All</a>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mnu" style=" background: rgba(255, 255, 255, 0.8);"
            class="bottom header__bottom header__bottom--border custom-header-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-5 col-10">
                        <!-- Extra shopping cart for mobile device start -->
                        <div class="cart--header__middle d-block d-md-none">
                            <div class="cart--header__list">
                                <ul class="list-inline">
                                    <li><a href="#"><i class="fas fa-heart"></i></a></li>
                                    <li><a class="mini__cart--link" href="#"><i
                                                class="fas fa-shopping-bag"><span
                                                    class="cart__count">{{ $totalItems }}</span></i><span
                                                class="cart__amount">Rs. {{ $totalPrice }}</span></a></li>
                                </ul>
                            </div>
                            @foreach ($cart as $item)
                                <div class="mini__cart--box">
                                    <ul>
                                        <li class="mb-20">
                                            <div class="cart-image">
                                                <a href="#"><img src={{ asset( 'storage/uploads/' . $item->product->image_url) }}
                                                        alt=""></a>
                                            </div>
                                            <div class="cart-text">
                                                <a href="#"
                                                    class="title f-400 cod__black-color">{{ $item->product->name }}</a>
                                                <span
                                                    class="cart-price f-400 dusty__gray-color">{{ $item->quantity }}<span
                                                        class="price f-800 cod__black-color">Rs
                                                        {{ $item->product->price }}</span></span>
                                            </div>
                                            <div class="del-button">
                                                <a href="#"><i class="icofont-close-line"></i></a>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="total-text d-flex justify-content-between">
                                                <span class="f-800 cod__black-color">Total Bag </span>
                                                <span class="f-800 cod__black-color">Rs {{ $totalPrice }}</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex justify-content-between">
                                                <a href="{{ route('checkout') }}" class="checkout">Checkout</a>
                                                <a href="{{ route('cart') }}" class="viewcart">View Cart</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                        <!-- Extra shopping cart for mobile device end -->
                        {{-- <div class="dept__menu position-relative d-none d-md-block">
                            <nav>
                                <ul class="dept__menu--list">
                                    <li><a class="dept__menu-mlink f-900 cod__gray-color"
                                            href="JavaScript:Void(0);">Shop By Departments</a>
                                        <ul style="box-shadow: 20px 20px 20px -8px rgba(0, 0, 0, 0.2);"
                                            class="dept__menu--dropdown open">
                                            @foreach ($categories as $category)
                                                <li class="dropdown">
                                                    <a class="dept__menu--dlink"
                                                        href="{{ route('shopcategory', ['id' => $category->id]) }}">{{ $category->name }}</a>
                                                    @if ($category->subcategories->count() > 0)
                                                        <ul style="box-shadow: 20px 20px 20px -8px rgba(0, 0, 0, 0.2);"
                                                            class="sub__menu sub__dept--menu">
                                                            @foreach ($category->subcategories as $subcategory)
                                                                <li><a
                                                                        href="{{ route('shopcategory', ['id' => $subcategory->id]) }}">{{ $subcategory->name }}</a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            @endforeach

                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div> --}}
                        <div class="dropdown">
                            <button class="dropbtn"> <strong>Shop By Departments</strong> </button>
                            <div class="dropdown-content">
                                @foreach ($categories as $category)
                                    <a
                                        href="{{ route('shopcategory', ['id' => $category->id]) }}">{{ $category->name }}</a>
                                @endforeach
                            </div>
                        </div>



                    </div>
                    <div class="col-xl-9 col-lg-8 col-md-7 col-2">
                        <div class="main-menu">
                            <nav id="mobile-menu">
                                <ul>
                                    <li class="dropdown-icon">
                                        <a href="{{ route('home') }}">Home</a>
                                        {{-- <ul class="submenu">
                                            <li>
                                                <a href="{{ route('home')}}">Home Furniture</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('home')}}">Home Electronics</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('home')}}">Home Fashion</a>
                                            </li>
                                        </ul> --}}
                                    </li>
                                    <li>
                                        <a href="about.html">About Us</a>
                                    </li>
                                    <li class="mega-menu static dropdown-icon">
                                        <a href="{{ route('shop') }}">Shop</a>
                                        @foreach ($categories as $category)
                                            <ul class="submenu">
                                                <li>
                                                    <a
                                                        href="{{ route('shopcategory', ['id' => $category->id]) }}">{{ $category->name }}</a>
                                                    {{-- @foreach ($category->subcategories as $subcategory)
                                                        <ul class="submenu">
                                                            <li>
                                                                <a
                                                                    href="{{ route('shopcategory', ['id' => $category->id]) }}">{{ $subcategory->name }}</a>
                                                            </li>
                                                        </ul>
                                                    @endforeach --}}
                                                </li>
                                            </ul>
                                        @endforeach
                                    </li>
                                    <li class="dropdown-icon">
                                        <a href="#">Pages</a>
                                        <ul class="submenu">
                                            <li>
                                                <a href="about.html">About</a>
                                            </li>
                                            <li>
                                                <a href="contact.html">Contact</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('shop') }}">Product Details</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('register') }}">Register</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="{{ route('shop') }}">Top Product</a>
                                    </li>

                                    <li class="dropdown-icon">
                                        <a href="blog.html">Blog</a>
                                        <ul class="submenu  level-1">
                                            <li>
                                                <a href="blog.html">Blog</a>
                                            </li>
                                            <li>
                                                <a href="blog-sidebar.html">Blog Sidebar</a>
                                            </li>
                                            <li>
                                                <a href="blog-details.html">Blog Details</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <div class="shop_button">
                                            @if (auth()->check())
                                                @if (auth()->user()->role === 'seller')
                                                    <a href="{{ route('dashboard') }}">Go
                                                        to Your Shop</a>
                                                @else
                                                    <a href="{{ route('sellerShop') }}">Create
                                                        Your Shop</a>
                                                @endif
                                            @else
                                                <a href="{{ route('register') }}">Create
                                                    Your Shop</a>
                                            @endif
                                        </div>

                                    </li>
                                </ul>

                            </nav>
                        </div>

                    </div>

                    <div class="col-12">
                        <div class="mobile-menu"></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <script>
        $(document).ready(function() {
            var header = $("#header");
            var sticky = header.offset().top;

            $(window).scroll(function() {
                if (window.pageYOffset > sticky) {
                    header.addClass("sticky");
                } else {
                    header.removeClass("sticky");
                }
            });
        });
    </script>
</body>

</html>
