@include('header')

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Shupmax - Multipurpose eCommerce HTML Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="{{ asset('../csss/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('../csss/style.css') }}">
    <link rel="stylesheet" href="{{ asset('../csss/responsive.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('../img/favicon.ico') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="manifest" href="site.webmanifest">
</head>

<body>



    <!-- Main -->
    <main class="main--wrapper">



        <!-- reg area start -->
        <section class="reg-area pt-20 pb-75">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <div class="reg-wrapper">
                            <ul class="nav" id="myTab" role="tablist">
                                <li class="nav-item mr-40">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
                                        role="tab" aria-controls="home" aria-selected="true">Sign In</a>
                                </li>
                                <li class="nav-item ml-40">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile"
                                        role="tab" aria-controls="profile" aria-selected="false">Registration</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <form class="main_form" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="field">
                                            <label>Username or Email ID</label>
                                            <input type="text" name="email" id="email" class="form-control" placeholder="Email" >
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>
                                        <div class="field">
                                            <label>Password</label>
                                            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>
                                        <x-primary-button class="ms-3">
                                            {{ __('Log in') }}
                                        </x-primary-button>
                                        <span>
                                            <input type="checkbox" class="check">
                                            Remember me
                                        </span>
                                        <a href="#" class="lost-pass">Lost Your Password?</a>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="field">
                                            <label>Username</label>
                                            <input type="text" name="name" id="name" class="form-control"
                                                placeholder="name">
                                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                        </div>
                                        <div class="field">
                                            <label>Email ID</label>
                                            <input type="text" name="email" id="email" class="form-control"
                                                placeholder="email" ">
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>
                                        <div class="field">
                                            <label>Password</label>
                                            <input type="password" name="password" id="password" class="form-control" placeholder="password">
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>
                                        <div class="field">
                                            <label>Conform Password</label>
                                            <input type="password_confirmation" name="password_confirmation" id="password" class="form-control" placeholder="Conform Password" autocomplete="off">
                                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                        </div>
                                        <x-primary-button class="ms-4">
                                            {{ __('Register') }}
                                        </x-primary-button>               
                                        <span>
                                            <input type="checkbox" class="check">
                                            Remember me
                                        </span>
                                        <a href="#" class="lost-pass">Lost Your Password?</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- reg area end -->

        <!-- Subscribe -->
        {{-- <div class="subscribe subscribe--area grenadier-bg">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div
                            class="newsletter newsletter--box d-flex justify-content-between align-items-center pos-rel">
                            <div class="left d-flex justify-content-between align-items-center">
                                <div class="newsletter__title">
                                    <span class="notification--icon"><img src="img/icon/notification-icon.png"
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
                                        src="img/icon/plan-icon.png" alt=""></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- Subscribe End -->

    </main>
    <!-- Main End -->







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
// @include('foooter');
