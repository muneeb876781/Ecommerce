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
        .logout {
            padding: 10px 20px 10px 20px;
            background: transparent;
            color: white;
            border: 1px solid white;
            border-radius: 12px;
            font-size: 16px;
            width: 100%;
            transition: 0.2s ease-in-out;
        }

        .logout:hover {
            background: blue;
            border: none;
        }
    </style>
</head>

<body>

    <!--Topbar -->
    <div class="topbar transition">
        <div class="bars">
            <button type="button" class="btn transition" id="sidebar-toggle">
                <i class="fa fa-bars"></i>
            </button>
        </div>
        {{-- <div class="menu">
            <ul>
                <li class="nav-item dropdown dropdown-list-toggle">
                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fa fa-bell size-icon-1"></i><span class="badge bg-danger notif">4</span>
                    </a>
                    <div class="dropdown-menu dropdown-list">
                        <div class="dropdown-header">Notifications</div>
                        <div class="dropdown-list-content dropdown-list-icons">
                            <div class="custome-list-notif">
                                <a href="#" class="dropdown-item dropdown-item-unread">
                                    <div class="dropdown-item-icon bg-primary text-white">
                                        <i class="fas fa-code"></i>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        The Atrana template has the latest update!
                                        <div class="time text-primary">3 Min Ago</div>
                                    </div>
                                </a>

                                <a href="#" class="dropdown-item">
                                    <div class="dropdown-item-icon bg-info text-white">
                                        <i class="far fa-user"></i>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        Sri asks you for friendship!
                                        <div class="time">12 Hours Ago</div>
                                    </div>
                                </a>

                                <a href="#" class="dropdown-item">
                                    <div class="dropdown-item-icon bg-danger text-white">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        Storage has been cleared, now you can get back to work!
                                        <div class="time">20 Hours Ago</div>
                                    </div>
                                </a>


                                <a href="#" class="dropdown-item">
                                    <div class="dropdown-item-icon bg-info text-white">
                                        <i class="fas fa-bell"></i>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        Welcome to Atrana Template, I hope you enjoy using this template!
                                        <div class="time">Yesterday</div>
                                    </div>
                                </a>

                            </div>
                        </div>

                        <div class="dropdown-footer text-center">
                            <a href="#">View All</a>
                        </div>


                </li>

                <li class="nav-item dropdown">
                    @if (isset($shopInfo))
                        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img src="{{ asset('storage/uploads/' . $shopInfo->logo) }}" alt="">
                        </a>
                    @endif


                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="my-profile.html"><i class="fa fa-user size-icon-1"></i> <span>My
                                Profile</span></a>
                        <a class="dropdown-item" href="settings.html"><i class="fa fa-cog size-icon-1"></i>
                            <span>Delete Store</span></a>
                        <hr class="dropdown-divider">
                        <a class="dropdown-item" href="{{ route('logout') }}"><i
                                class="fa fa-sign-out-alt  size-icon-1"></i> <span>Log out</span></a>
                    </ul>
                </li>
            </ul>
        </div> --}}
    </div>

    <!--Sidebar-->
    <div class="sidebar transition overlay-scrollbars animate__animated  animate__slideInLeft">
        <div class="sidebar-content">
            <div id="sidebar">

                <!-- Logo -->
                @if ($shopInfo)
                    <div style="display: flex; flex-direction: row; width: 100%; margin: 10px; justify-content: center; align-items: center;"
                        class="logo">
                        <img style="width: 20%; height: 100%; border-radius: 100%;"
                            src="{{ asset('storage/uploads/' . $shopInfo->logo) }}" alt="">
                        {{-- <h2 style="font-size: 20px; width: 80%; " class="mb-0 ml-0 pl-0">{{ auth()->user()->name }}</h2> --}}
                        <h2 style="font-size: 20px; width: 80%; " class="mb-0 ml-0 pl-0">{{ $shopInfo->name }}</h2>

                    </div>
                @else
                    {{-- <h2 style="font-size: 20px; text-align: center;">{{ auth()->user()->name }}</h2> --}}
                    <h2 style="font-size: 20px; text-align: center;">{{ $shopInfo->name }}</h2>
                @endif


                <ul class="side-menu">
                    <li>
                        <a href="{{ route('home') }}" target="_blank" class="{{ Request::is('/') ? 'active' : '' }}">
                            <i class='bx bxs-dashboard icon'></i> Go to home
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('dashboard') }}" class="{{ Request::is('dashboard*') ? 'active' : '' }}">
                            <i class='bx bxs-dashboard icon'></i> Dashboard
                        </a>
                    </li>

                    {{-- <li>
                        <a href="{{ route('categoryview') }}"
                            class="{{ Request::is('categories*') ? 'active' : '' }}">
                            <i class='bx bxs-meh-blank icon'></i> Categories
                        </a>
                    </li> --}}

                    <li>
                        <a href="#">
                            <i class='bx bx-columns icon'></i>
                            Categories
                            <i class='bx bx-chevron-right icon-right'></i>
                        </a>
                        <ul class="side-dropdown">
                            <li><a href="{{ route('categoryview') }}"
                                    class="{{ Request::is('categories*') ? 'active' : '' }}">
                                    Categories
                                </a></li>
                            <li><a href="{{ route('subCategoryview') }}"
                                    class="{{ Request::is('subCategories') ? 'active' : '' }}">
                                    Sub Categories
                                </a></li>
                        </ul>
                    </li>

                    {{-- <li>
                        <a href="{{ route('subCategoryview') }}"
                            class="{{ Request::is('subCategories') ? 'active' : '' }}">
                            <i class='bx bxs-meh-blank icon'></i>Sub Categories
                        </a>
                    </li> --}}

                    <li>
                        <a href="#">
                            <i class='bx bx-columns icon'></i>
                            Products
                            <i class='bx bx-chevron-right icon-right'></i>
                        </a>
                        <ul class="side-dropdown">
                            <li><a href="{{ route('productview') }}" class="{{ Request::is('product*') ? 'active' : '' }}">
                                 Products
                            </a></li>
                            <li><a href="{{ route('productAttributes') }}"
                                class="{{ Request::is('pAttributes*') ? 'active' : '' }}">
                                 Product Attributes
                            </a></li>
                        </ul>
                    </li>

                    {{-- <li>
                        <a href="{{ route('productview') }}" class="{{ Request::is('product*') ? 'active' : '' }}">
                            <i class='bx bxs-meh-blank icon'></i> Products
                        </a>
                    </li> --}}

                    <li>
                        <a href="{{ route('brands') }}" class="{{ Request::is('brands*') ? 'active' : '' }}">
                            <i class='bx bxs-meh-blank icon'></i> Brands
                        </a>
                    </li>

                    {{-- <li>
                        <a href="{{ route('productAttributes') }}"
                            class="{{ Request::is('pAttributes*') ? 'active' : '' }}">
                            <i class='bx bxs-meh-blank icon'></i> Product Attributes
                        </a>
                    </li> --}}

                    {{-- <li>
                        <a href="{{ route('Order') }}" class="{{ Request::is('Order*') ? 'active' : '' }}">
                            <i class='bx bxs-meh-blank icon'></i> Orders
                        </a>
                    </li> --}}

                    <li>
                        <a href="#">
                            <i class='bx bx-columns icon'></i>
                            Orders
                            <i class='bx bx-chevron-right icon-right'></i>
                        </a>
                        <ul class="side-dropdown">
                            <li><a href="{{ route('Order') }}" class="{{ Request::is('Order*') ? 'active' : '' }}">
                                Orders
                            </a></li>
                            <li><a href=""
                                class="{{ Request::is('*') ? 'active' : '' }}">
                                 Finance
                            </a></li>
                            <li><a href=""
                                class="{{ Request::is('*') ? 'active' : '' }}">
                                 Pyments
                            </a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{ route('venderProfile') }}"
                            class="{{ Request::is('venderProfile*') ? 'active' : '' }}">
                            <i class='bx bxs-meh-blank icon'></i> My Profile
                        </a>
                    </li>

                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="logout" type="submit">Logout</button>
                        </form>
                    </li>

                    {{-- @if (isset($shopInfo))
                        <li>
                            <form action="{{ route('deleteStore', ['id' => $shopInfo->id]) }}" method="post"
                                onsubmit="return confirm('Are you sure you want to delete your store? This action cannot be undone.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="logout"><span class="fa fa-support mr-3"></span>Delete
                                    Store</button>
                            </form>
                        </li>
                    @endif --}}




            </div>

        </div>
    </div>
    </div><!-- End Sidebar-->


    <div class="sidebar-overlay"></div>





    <!-- Footer -->
    {{-- <footer>
        <div class="footer">
            <div class="float-start">
                <p>2022 &copy; Atrana</p>
            </div>
            <div class="float-end">
                <p>Crafted with
                    <span class="text-danger">
                        <i class="fa fa-heart"></i> by
                        <a href="https://www.facebook.com/andreew.co.id/" class="author-footer">Andre Tri Ramadana</a>
                    </span>
                </p>
            </div>
        </div>
    </footer> --}}


    <!-- Preloader -->
    <div class="loader">
        <div class="spinner-border text-light" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <!-- Loader -->
    <div class="loader-overlay"></div>

    <!-- General JS Scripts -->
    <script src="{{ asset('assets/js/atrana.js') }}"></script>
    <script src="{{ asset('assets/modules/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/modules/bootstrap-5.1.3/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/modules/popper/popper.min.js') }}"></script>
    <script src="{{ asset('assets/modules/apexcharts/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/js/ui-apexcharts.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.side-menu li a').click(function() {
                $('.side-menu li a').removeClass('active');
                $(this).addClass('active');
            });
        });
    </script>




</body>

</html>
