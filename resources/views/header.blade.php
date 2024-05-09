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

        .dropdown-content a:hover {
            color: black;
            background: #efefef;
            border-radius: 10px;
        }

        .dropdown:hover .dropdown-content {
            display: block;
            z-index: 1000;
            opacity: 1;

        }

        @media (max-width: 850px) {
            .dropbtn {
                display: none;
            }

            .mnu {
                padding: 0;
                margin: 0;
            }
        }

        @media (max-width: 1200px) {
            .mnu {
                display: none;
            }


        }

        @media (max-width: 760px) {
            /* .search--header__form {
                width: 80%;
                margin-left: 40px;
            } */

            .logo img {
                width: 150px;
                height: auto;
            }

            .search--header__middle {
                height: 35px;
            }


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
                margin-top: 25px;
                padding: 0;
            }

            .top {
                padding: 0;
            }
        }

        .sticky-navbar {
            position: fixed;
            bottom: 0px;
            right: 10px;
            display: none;
            width: 100%;
            height: auto;
            z-index: 9999;
            background: #fff;
        }

        .sticky-navbar .buttons {
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-direction: row;
            width: 100%;
            height: 100%;
            padding-bottom: 12px;
            padding-left: 20px;
            padding-right: 20px;
            padding-top: 5px;
            margin-left: 6px;
        }

        .sticky-navbar .button-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 20%
        }

        .sticky-navbar .button-wrapper span {
            text-align: center;
            font-size: 12px
        }

        .sticky-navbar button {
            background: none;
            border: none;
            color: #909090;
            font-size: 18px;
            /* margin: px; */
            cursor: pointer;
        }

        @media (max-width: 760px) {
            .sticky-navbar {
                display: none;
            }
        }

        .cart-icon {
            position: relative;
        }

        .badge {
            position: absolute;
            width: 15px;
            height: 15px;
            background: #48afff;
            border-radius: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            font-size: 1rem;
            right: -5px;
            top: -5px;
            padding: 9px;
        }

        .dropdown-menu {
            background-color: #333;
            color: white;
            border: none;
            padding: 0;
        }

        .dropdown-menu a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px 20px;
        }

        .dropdown-menu a:hover {
            background-color: #efefef;
        }
    </style>
    <style>
        #menu__toggle {
            opacity: 0;
            display: none;
        }

        #menu__toggle:checked+.menu__btn>span {
            transform: rotate(45deg);
        }

        #menu__toggle:checked+.menu__btn>span::before {
            top: 0;
            transform: rotate(0deg);
        }

        #menu__toggle:checked+.menu__btn>span::after {
            top: 0;
            transform: rotate(90deg);
        }

        #menu__toggle:checked~.menu__box {
            left: 0 !important;
        }

        .menu__btn {
            display: none;
            position: fixed;
            top: 25px;
            left: 25px;
            width: 20px;
            height: 20px;
            cursor: pointer;
            z-index: 1000;
        }

        .menu__box {
            display: none;
        }

        .menu__btn>span,
        .menu__btn>span::before,
        .menu__btn>span::after {
            display: block;
            position: absolute;
            width: 100%;
            height: 2px;
            background-color: #616161;
            transition-duration: .25s;
        }

        .menu__btn>span::before {
            content: '';
            top: -8px;
        }

        .menu__btn>span::after {
            content: '';
            top: 8px;
        }

        .menu__box {
            display: none;
            display: flex;
            justify-content: left;
            align-content: flex-start;
            flex-direction: column;
            position: fixed;
            top: 0;
            left: -100%;
            width: 300px;
            height: 100%;
            margin: 0;
            padding: 80px 0;
            list-style: none;
            background-color: #ECEFF1;
            box-shadow: 2px 2px 6px rgba(0, 0, 0, .4);
            transition-duration: .25s;
            z-index: 999;
        }

        .top_sidenav {
            display: flex;
            justify-content: left;
            align-items: flex-start;
            flex-direction: column;
            width: 100%;
            height: 35%;
            background: #efefef;
        }

        .top_sidenav a {
            padding: 20px;
            color: black;
        }

        .side_nav_logout {
            font-size: 15px;
            border-radius: 5px;
            border: 1px solid #fff;
            padding: 5px 40px;
            text-align: center;
            background: #fff;
            color: #49aefb;
            margin-left: 20px;
            margin-bottom: 10px;
        }

        .side_nav_trackorder {
            display: flex;
            flex-direction: row;
            align-items: center;
        }

        .side_nav_trackorder i {
            margin-left: 20px;
            color: #909090;
        }

        .side_nav_trackorder a {
            padding: 6px;
        }

        .sidenav_login {
            font-size: 15px;
            border-radius: 5px;
            border: 1px solid #fff;
            padding: 5px 40px;
            text-align: center;
            background: #fff;
            color: #49aefb;
            margin-left: 20px;
        }

        .bottom_sidenav {
            display: flex;
            justify-content: left;
            align-items: flex-start;
            flex-direction: column;
            width: 100%;
            height: 70%;
            background: #fff;
        }

        .bottom_sidenav h4 {
            font-size: 14px;
            padding-left: 20px;
            padding-top: 14px;
            font-weight: 400;
            letter-spacing: 2px;
        }

        .visit_shop {
            display: block;
            padding: 12px 24px;
            color: #333;
            font-size: 16px;
            text-decoration: none;
            transition-duration: .25s;
            width: 90%;
            text-align: center;
            border: 1px solid rgba(0, 0, 0, 0.4);
            margin-left: 10px;
            margin-right: 10px;
        }

        .menu__item {
            display: none;
            padding: 12px 24px;
            color: #333;
            font-size: 16px;
            text-decoration: none;
            transition-duration: .25s;
            width: 100%;
            font-weight: 600;
        }

        .menu__item:hover {
            background-color: #efefef;
        }

        @media screen and (max-width: 1200px) {
            #menu__toggle {
                display: block;
            }

            .menu__btn {
                display: block;
            }

            .menu__item {
                display: block;
            }

            .menu__box {
                display: block;
            }

            /* Move the menu box to the left to make it visible */
            #menu__toggle:checked+.menu__btn>span {
                transform: rotate(45deg);
            }

            #menu__toggle:checked+.menu__btn>span::before {
                top: 0;
                transform: rotate(0deg);
            }

            #menu__toggle:checked+.menu__btn>span::after {
                top: 0;
                transform: rotate(90deg);
            }

            #menu__toggle:checked~.menu__box {
                left: 0 !important;
            }
        }

        .menu__box {
            left: -100%;
        }

        .menu__box.show {
            left: 0;
        }
    </style>
    <style>
        .d1tag {
            cursor: pointer;
            position: relative;
            padding: 14px 30px;
            border-radius: 50px;
            /* line-height: 2.5rem; */
            font-size: 17px;
            font-weight: 600;

            border: 1px solid #012880;
            background-image: linear-gradient(-180deg, #FF89D6 0%, #C01F9E 100%);
            box-shadow: 0 1rem 1.25rem 0 rgba(22, 75, 195, 0.1),
                0 -0.25rem 1.5rem rgba(110, 15, 155, 0.2) inset,
                0 0.75rem 0.5rem rgba(255, 255, 255, 0.5) inset,
                0 0.25rem 0.5rem 0 rgba(180, 70, 207, 0.1) inset;
        }

        .d1tag span {
            color: white;
            background-image: linear-gradient(0deg, #EE82DA 0%, #FEFAFD 100%);
            -webkit-background-clip: text;
            background-clip: text;
            filter: drop-shadow(0 2px 2px hsla(290, 100%, 20%, 1));
        }

        .d1tag::before {
            content: "";
            display: block;
            height: 0.25rem;
            position: absolute;
            top: 0.5rem;
            left: 50%;
            transform: translateX(-50%);
            width: calc(100% - 7.5rem);
            background: #fff;
            border-radius: 100%;

            opacity: 0.7;
            background-image: linear-gradient(-270deg, rgba(255, 255, 255, 0.00) 0%, #FFFFFF 20%, #FFFFFF 80%, rgba(255, 255, 255, 0.00) 100%);
        }

        .d1tag::after {
            content: "";
            display: block;
            height: 0.25rem;
            position: absolute;
            bottom: 0.75rem;
            left: 50%;
            transform: translateX(-50%);
            width: calc(100% - 7.5rem);
            background: #fff;
            border-radius: 100%;

            filter: blur(1px);
            opacity: 0.05;
            background-image: linear-gradient(-270deg, rgba(255, 255, 255, 0.00) 0%, #FFFFFF 20%, #FFFFFF 80%, rgba(255, 255, 255, 0.00) 100%);
        }
    </style>
            <style>
                .bottomNav {
                    position: fixed;
                    bottom: 0px;
                    /* right: 10px; */
                    display: none;
                    width: 100%;
                    height: auto;
                    z-index: 9999;
                    background: #efefef;
                }
    
                .bottomNav ul {
                    display: flex;
                    /* justify-content: center;
                    align-items: center; */
                    flex-direction: row;
                    width: 100%;
                }
    
                .bottomNav ul li {
                    position: relative;
                    list-style: none;
                    width: 20%;
                    height: 60px;
                    z-index: 1;
                }
    
                .bottomNav ul li a {
                    position: relative;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    flex-direction: column;
                    width: 100%;
                    text-align: center;
                    font-weight: 500;
                }
    
                .bottomNav ul li a .icon {
                    position: relative;
                    display: block;
                    line-height: 75px;
                    font-size: 1.5em;
                    text-align: center;
                    transition: 0.5s;
                    color: #C01F9E;
                }

                .bottomNav ul li.active a{
                    position: absolute;
                    top: -50%;
                    width: 80px;
                    height: 80px;
                    background-image: linear-gradient(-180deg, #FF89D6 0%, #C01F9E 100%);
                    border-radius: 50%;
                    border: 6px solid white;
                    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                    transition: 0.5s;
                }
    
                .bottomNav ul li.active a .icon {
                    transform: translateY(-5px);
                    
                }
    
                .bottomNav ul li a .text {
                    position: absolute;
                    color: #fff;
                    font-weight: 400;
                    font-size: 0.75em;
                    letter-spacing: 0.05em;
                    transition: 0.5s;
                    opacity: 0;
                    transform: translateY(15px);
                }
    
                .bottomNav ul li.active a .text {
                    /* transform: translateY(-7px); */
                    opacity: 1;
                    color: #fff;
                }
    
                .bottomNav ul li.active a .icon {
                    color: #fff;
                }
    
                .indicator {
                    position: absolute;
                    top: -50%;
                    width: 80px;
                    height: 80px;
                    background-image: linear-gradient(-180deg, #FF89D6 0%, #C01F9E 100%);
                    border-radius: 50%;
                    border: 6px solid white;
                    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                    transition: 0.5s;
                }
    
    
                .bottomNav ul li:nth-child(1).active~.indicator {
                    transform: translateX(calc(77px * 0))
                }
    
                .bottomNav ul li:nth-child(2).active~.indicator {
                    transform: translateX(calc(77px * 1))
                }
    
                .bottomNav ul li:nth-child(3).active~.indicator {
                    transform: translateX(calc(77px * 2))
                }
    
                .bottomNav ul li:nth-child(4).active~.indicator {
                    transform: translateX(calc(77px * 3))
                }
    
                .bottomNav ul li:nth-child(5).active~.indicator {
                    transform: translateX(calc(77px * 4))
                }
    
                .cartbadge {
                    position: absolute;
                    width: 15px;
                    height: 15px;
                    background: #48afff;
                    border-radius: 50px;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    color: #fff;
                    font-size: 1rem;
                    right: -10px;
                    top: 5px;
                    padding: 9px;
                }
    
    
    
                @media (max-width: 760px) {
                    .bottomNav {
                        display: block;
                    }
                }
            </style>


    {{-- <title>Document</title> --}}
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
        <div style="background: #f2f2f2;" class="middle header__middle bg--header__middle pt-15 pb-15">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="content--header__middle d-flex align-items-center justify-content-between">
                            <div class="logo--header__middle ">
                                <div class="logo">
                                    <a class="logo__link" href="{{ route('home') }}"><img src="../img/logo/h1__logo.png"
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
                                        <button type="submit" class="header--search__btn d1tag"> <span><i
                                                    class="fas fa-search"></i></span> </button>
                                    </div>

                                    <div class="header--search__cate">
                                        <select name="header-search" id="header--search__main">
                                            <option value="{{ route('shop') }}">All Categories</option>
                                            @foreach ($categories as $category)
                                                @if ($category->state !== 0)
                                                    <option
                                                        value="{{ route('shopcategory', ['id' => $category->id]) }}">
                                                        {{ $category->name }}</option>
                                                @endif
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

                                        <li><a class="" href="{{ route('chatify') }}" target="_blank"><i
                                                    class="fas fa-comment"><span
                                                        class="cart__count">{{ $unseenmessages }}</span></i></a>
                                        </li>
                                        <li><a class="mini__cart--link" href="#"><i
                                                    class="fas fa-shopping-bag"><span
                                                        class="cart__count">{{ $totalItems }}</span></i><span
                                                    class="cart__amount">AED. {{ $totalPrice }}</span></a></li>

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
                                                                href="{{ route('singleProduct', ['id' => $item->product->id]) }}">
                                                                @if ($item->product->image_url)
                                                                    <img src={{ asset('storage/uploads/' . $item->product->image_url) }}
                                                                        alt="">
                                                                @elseif (!$item->product->image_url && $item->product->remote_image_url)
                                                                    <img src={{ $item->product->remote_image_url }}
                                                                        alt="">
                                                                @else
                                                                    <span>No image available</span>
                                                                @endif
                                                            </a>
                                                        </div>
                                                        <div class="cart-text">
                                                            <a href="#"
                                                                class="title f-400 cod__black-color">{{ implode(' ', array_slice(explode(' ', $item->product->name), 0, 4)) }}
                                                                @if (str_word_count($item->product->name) > 10)
                                                                    ...
                                                                @endif
                                                            </a>
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
                                                class="cart__amount">AED. {{ $totalPrice }}</span></a></li>
                                </ul>
                            </div>
                            @foreach ($cart as $item)
                                <div class="mini__cart--box">
                                    <ul>
                                        <li class="mb-20">
                                            <div class="cart-image">
                                                <a href="#">

                                                    @if ($item->product->image_url)
                                                        <img src={{ asset('storage/uploads/' . $item->product->image_url) }}
                                                            alt="">
                                                    @elseif (!$item->product->image_url && $item->product->remote_image_url)
                                                        <img src={{ $item->product->remote_image_url }}
                                                            alt="">
                                                    @else
                                                        <span>No image available</span>
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="cart-text">
                                                <a href="#"
                                                    class="title f-400 cod__black-color">{{ implode(' ', array_slice(explode(' ', $item->product->name), 0, 4)) }}
                                                    @if (str_word_count($item->product->name) > 10)
                                                        ...
                                                    @endif
                                                </a>

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
                            <button class="dropbtn"><strong>Shop By Departments</strong></button>
                            <div class="dropdown-content">
                                @foreach ($categories as $key => $category)
                                    @if ($category->state !== 0)
                                        @if ($key <= 6)
                                            <div class="category">
                                                <a href="{{ route('shopcategory', ['id' => $category->id]) }}"><img
                                                        src="{{ asset('storage/uploads/' . $category->image_url) }}"
                                                        alt="{{ $category->name }}"
                                                        style="max-width: 50px; max-height: 50px; border-radius: 100px; margin-right: 15px;">{{ $category->name }}</a>
                                                @if (count($category->subcategories) > 0)
                                                    <div class="subcategory">
                                                        @foreach ($category->subcategories as $subcategory)
                                                            <a
                                                                href="{{ route('shopsubcategory', ['id' => $subcategory->id]) }}">
                                                                {{ $subcategory->name }}
                                                            </a>
                                                        @endforeach
                                                    </div>
                                                @endif
                                            </div>
                                        @endif
                                    @endif
                                @endforeach

                            </div>
                        </div>
                        <style>
                            .category {
                                position: relative;
                            }

                            .subcategory {
                                display: none;
                                position: absolute;
                                top: 0;
                                left: 100%;
                                background-color: #f9f9f9;
                                min-width: 160px;
                                box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
                                z-index: 1;
                            }

                            .category:hover .subcategory {
                                display: block;
                            }
                        </style>

                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script>
                            $(document).ready(function() {
                                $('.category').hover(function() {
                                    $(this).find('.subcategory').stop(true, true).slideDown(200);
                                }, function() {
                                    $(this).find('.subcategory').stop(true, true).slideUp(200);
                                });
                            });
                        </script>



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
                                        <a href="">Brands</a>
                                        <ul class="submenu">
                                            @foreach ($brands as $key => $brand)
                                                @if ($brand->state !== 0)
                                                    @if ($key <= 4)
                                                        <li>
                                                            <a href="{{ route('brandsShop', ['id' => $brand->id]) }}">
                                                                <img src="{{ asset('storage/uploads/' . $brand->image_url) }}"
                                                                    alt="{{ $brand->name }}"
                                                                    style="max-width: 70px; max-height: 70px;">
                                                                {{ $brand->name }}
                                                            </a>
                                                        </li>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>




                                    <li class="mega-menu static dropdown-icon">
                                        <a href="{{ route('shop') }}">Shop</a>
                                        {{-- @foreach ($categories as $category)
                                            <ul class="submenu">
                                                <li>
                                                    <a
                                                        href="{{ route('shopcategory', ['id' => $category->id]) }}">{{ $category->name }}</a> --}}
                                        {{-- @foreach ($category->subcategories as $subcategory)
                                                        <ul class="submenu">
                                                            <li>
                                                                <a
                                                                    href="{{ route('shopcategory', ['id' => $category->id]) }}">{{ $subcategory->name }}</a>
                                                            </li>
                                                        </ul>
                                                    @endforeach --}}
                                        {{-- </li>
                                            </ul>
                                        @endforeach --}}
                                    </li>
                                    {{-- <li class="dropdown-icon">
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
                                    </li> --}}
                                    <li>
                                        <a href="{{ route('shop') }}">Top Product</a>
                                    </li>

                                    {{-- <li class="dropdown-icon">
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
                                    </li> --}}
                                    <style>
                                        .shop-btn {
                                            margin-left: 400px;
                                        }

                                        @media (max-width: 1400px) {
                                            .shop-btn {
                                                margin-left: 300px;
                                            }
                                        }
                                    </style>
                                    <li class="shop-btn">
                                        <style>
                                            .dtag {
                                                cursor: pointer;
                                                position: relative;
                                                margin-top: 8px;
                                                padding: 14px 30px;
                                                border-radius: 10px;
                                                /* line-height: 2.5rem; */
                                                font-size: 17px;
                                                font-weight: 600;

                                                border: 1px solid #012880;
                                                background-image: linear-gradient(-180deg, #FF89D6 0%, #C01F9E 100%);
                                                box-shadow: 0 1rem 1.25rem 0 rgba(22, 75, 195, 0.50),
                                                    0 -0.25rem 1.5rem rgba(110, 15, 155, 1) inset,
                                                    0 0.75rem 0.5rem rgba(255, 255, 255, 0.4) inset,
                                                    0 0.25rem 0.5rem 0 rgba(180, 70, 207, 1) inset;
                                            }

                                            .dtag span {
                                                color: white;
                                                background-image: linear-gradient(0deg, #EE82DA 0%, #FEFAFD 100%);
                                                -webkit-background-clip: text;
                                                background-clip: text;
                                                filter: drop-shadow(0 2px 2px hsla(290, 100%, 20%, 1));
                                            }

                                            .dtag::before {
                                                content: "";
                                                display: block;
                                                height: 0.25rem;
                                                position: absolute;
                                                top: 0.5rem;
                                                left: 50%;
                                                transform: translateX(-50%);
                                                width: calc(100% - 7.5rem);
                                                background: #fff;
                                                border-radius: 100%;

                                                opacity: 0.7;
                                                background-image: linear-gradient(-270deg, rgba(255, 255, 255, 0.00) 0%, #FFFFFF 20%, #FFFFFF 80%, rgba(255, 255, 255, 0.00) 100%);
                                            }

                                            .dtag::after {
                                                content: "";
                                                display: block;
                                                height: 0.25rem;
                                                position: absolute;
                                                bottom: 0.75rem;
                                                left: 50%;
                                                transform: translateX(-50%);
                                                width: calc(100% - 7.5rem);
                                                background: #fff;
                                                border-radius: 100%;

                                                filter: blur(1px);
                                                opacity: 0.05;
                                                background-image: linear-gradient(-270deg, rgba(255, 255, 255, 0.00) 0%, #FFFFFF 20%, #FFFFFF 80%, rgba(255, 255, 255, 0.00) 100%);
                                            }
                                        </style>
                                        <div class="shop_button">
                                            @if (auth()->check())
                                                @php
                                                    $roles = explode(',', trim(auth()->user()->role));
                                                    $isAdmin = in_array('admin', $roles);
                                                    $isSeller = in_array('seller', $roles);
                                                @endphp
                                                @if (!$isSeller && $isAdmin)
                                                    <div class="dropdown">
                                                        <button class="dtag" type="button" id="dropdownMenuButton"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <span>Admin Dashboard</span>
                                                        </button>
                                                        <div class="dropdown-menu"
                                                            aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item"
                                                                href="{{ route('adminDashboard') }}">Admin
                                                                Dashboard</a>
                                                        </div>
                                                    </div>
                                                @elseif (!$isAdmin && $isSeller)
                                                    <div class="dropdown">
                                                        <button class=" dtag " type="button" id="dropdownMenuButton"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <span>Seller Dashboard</span>
                                                        </button>
                                                        <div class="dropdown-menu"
                                                            aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item"
                                                                href="{{ route('dashboard') }}">Seller Dashboard</a>
                                                        </div>
                                                    </div>
                                                @elseif ($isAdmin && $isSeller)
                                                    <div class="dropdown">
                                                        <button class="btn btn-secondary dropdown-toggle"
                                                            type="button" id="dropdownMenuButton"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            Select Dashboard
                                                        </button>
                                                        <div class="dropdown-menu"
                                                            aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item"
                                                                href="{{ route('adminDashboard') }}">Admin
                                                                Dashboard</a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('dashboard') }}">Seller Dashboard</a>
                                                        </div>
                                                    </div>
                                                @else
                                                    <a href="{{ route('sellerShop') }}">Create Your Shop</a>
                                                @endif
                                            @else
                                                <a href="{{ route('register') }}">Create Your Shop</a>
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
        <div class="sticky-navbar">
            <div class="buttons">
                <div class="button-wrapper">
                    <button id="home"><i class="fas fa-home"></i></button>
                    <span>Home</span>
                </div>
                <div class="button-wrapper">
                    <button id="shop" onclick="toggleSideNav()"><i class="fas fa-list-alt"></i></button>
                    <span>Categories</span>
                </div>
                <div class="button-wrapper">
                    <button id="cart" class="cart-icon"><i class="fas fa-shopping-cart"></i><span
                            class="badge">{{ $totalItems }}</span></button>
                    <span>Cart</span>
                </div>

                <div class="button-wrapper">
                    <button id="dashboard" onclick="toggleDashboard()"><i class="fas fa-chart-line"></i></button>
                    <span>Dashboard</span>
                    @if (auth()->check())
                        @php
                            $roles = explode(',', auth()->user()->role);
                            $isAdmin = in_array('admin', $roles);
                            $isSeller = in_array('seller', $roles);
                        @endphp

                        @if ($isAdmin && $isSeller)
                            <div class="dropdown">
                                <div class="dropdown-menu">
                                    <button onclick="window.location.href = '{{ route('adminDashboard') }}';">Admin
                                        Dashboard</button>
                                    <button onclick="window.location.href = '{{ route('dashboard') }}';">Seller
                                        Dashboard</button>
                                </div>
                            </div>
                        @elseif ($isAdmin)
                            <button onclick="window.location.href = '{{ route('adminDashboard') }}';"></button>
                        @elseif ($isSeller)
                            <button onclick="window.location.href = '{{ route('dashboard') }}';"></button>
                        @else
                            <button onclick="window.location.href = '{{ route('register') }}';"></button>
                        @endif
                    @else
                        <button onclick="window.location.href = '{{ route('register') }}';"></button>
                    @endif
                </div>
                <div class="button-wrapper">
                    <button id="messages" class="cart-icon"><i class="fas fa-comment"></i><span
                            class="badge">{{ $unseenmessages }}</span></button>
                    <span>Messages</span>
                </div>
            </div>
        </div>
        <div class="bottomNav">
            <ul>
                
                <li class="list">
                    <a href="{{ route('shop') }}">
                        <span class="icon"><ion-icon name="card"></ion-icon></span>
                        <span class="text">Shop</span>
                    </a>
                </li>
                <li class="list">
                    <a href="{{ route('cart') }}">
                        <span class="icon"><ion-icon name="cart"></ion-icon><span
                                class="cartbadge">{{ $totalItems }}</span></span>
                        <span class="text">Cart</span>
                    </a>
                </li>
                <li class="list active">
                    <a href="{{ route('home') }}">
                        <span class="icon"><ion-icon name="home"></ion-icon></span>
                        <span class="text">Home</span>
                    </a>
                </li>
                <li class="list">
                    <a href="{{ route('dashboard') }}">
                        <span class="icon"><ion-icon name="list"></ion-icon></span>
                        <span class="text">Dashboard</span>
                    </a>
                </li>
                <li class="list">
                    <a href="{{ route('chatify') }}">
                        <span class="icon"><ion-icon name="chatbox"></ion-icon><span
                                class="cartbadge">{{ $unseenmessages }}</span></span>
                        <span class="text">Messages</span>
                    </a>
                </li>
                {{-- <div class="indicator"></div> --}}
            </ul>
        </div>
        <div class="hamburger-menu">
            <input id="menu__toggle" type="checkbox" />
            <label class="menu__btn" for="menu__toggle">
                <span id="menu__icon"></span>
            </label>


            <ul class="menu__box">
                <div class="top_sidenav">
                    <a class="logo__link" href="index.html"><img src="img/logo/h1__logo.png" alt=""></a>
                    @guest
                        <li class="nav-item">
                            <a class="sidenav_login mt-2" href="{{ route('register') }}">Login</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="side_nav_logout" href="{{ route('register') }}">Register</a>
                        </li> --}}
                    @endguest
                    @auth
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="side_nav_logout" type="submit">Logout</button>
                            </form>
                        </li>
                    @endauth
                    <div class="side_nav_trackorder">
                        <i class="fas fa-map-marker-alt"></i>
                        <a href="{{ route('userOrders') }}">Track My Orders</a>
                    </div>
                    <div class="side_nav_trackorder">
                        <i class="fas fa-comment"></i>
                        <a href="{{ route('chatify') }}" target="_blank">Messages</a>
                        @if ($unseenmessages > 0)
                            <span class="badge">{{ $unseenmessages }}</span>
                        @endif
                    </div>


                </div>
                <div class="bottom_sidenav">
                    <h4>Categories</h4>

                    @foreach ($categories as $key => $category)
                        <li>
                            @if ($key <= 5)
                                <a class="menu__item"
                                    href="{{ route('shopcategory', ['id' => $category->id]) }}">{{ $category->name }}</a>
                            @endif
                        </li>
                    @endforeach
                    <a class="visit_shop" href="{{ route('shop') }}">View All</a>


                </div>

            </ul>
        </div>
        <script>
            const lists = document.querySelectorAll('.list');

            function setActiveLink() {
                lists.forEach((item) => {
                    if (item.querySelector('a').href === window.location.href) {
                        item.classList.add('active');
                    } else {
                        item.classList.remove('active');
                    }
                });
            }
            setActiveLink(); // Set initial active link
            lists.forEach((item) => item.addEventListener('click', setActiveLink));
        </script>


        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var menuToggle = document.getElementById('menu__toggle');
                var menuIcon = document.getElementById('menu__icon');
                var menuBox = document.querySelector('.menu__box');

                // Close the menu when the menu icon is clicked
                menuIcon.addEventListener('click', function() {
                    menuToggle.checked = false;
                });

                // Close the menu when clicking anywhere outside the menu or the menu icon
                document.addEventListener('click', function(event) {
                    if (event.target !== menuToggle && event.target !== menuIcon && !menuBox.contains(event
                            .target)) {
                        if (menuToggle.checked) {
                            menuToggle.checked = false;
                        }
                    }
                });
            });
        </script>
    </header>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('dd1dfe1c544c521ebe08', {
            cluster: 'ap2'
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {});
    </script>
    <script>
        function toggleDashboard() {
            @if (auth()->check())
                @php
                    $roles = explode(',', auth()->user()->role);
                    $isAdmin = in_array('admin', $roles);
                    $isSeller = in_array('seller', $roles);
                @endphp

                @if ($isAdmin && $isSeller)
                    Swal.fire({
                        title: 'Select Dashboard',
                        icon: 'info',
                        showCancelButton: true,
                        confirmButtonText: 'Admin Dashboard',
                        cancelButtonText: 'Seller Dashboard'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "{{ route('adminDashboard') }}";
                        } else {
                            window.location.href = "{{ route('dashboard') }}";
                        }
                    });
                @elseif ($isAdmin)
                    window.location.href = "{{ route('adminDashboard') }}";
                @elseif ($isSeller)
                    window.location.href = "{{ route('dashboard') }}";
                @endif
            @else
                window.location.href = "{{ route('register') }}";
            @endif
        }
    </script>
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
    <script>
        document.getElementById('home').addEventListener('click', function() {
            window.location.href = '{{ route('home') }}';
        });

        function toggleSideNav() {
            var menuBox = document.querySelector('.menu__box');
            menuBox.classList.toggle('show');
        }

        document.getElementById('cart').addEventListener('click', function() {
            window.location.href = '{{ route('cart') }}';
        });

        document.getElementById('logout').addEventListener('click', function() {
            document.getElementById('logout-form').submit();
        });

        document.getElementById('messages').addEventListener('click', function() {
            window.location.href = '{{ route('chatify') }}';
        });
    </script>
</body>

</html>
