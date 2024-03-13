<!doctype html>
<html lang="en">

<head>
    <title>Sidebar 09</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">

</head>

<body>

    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="custom-menu">
                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                </button>
            </div>
            <div class="img bg-wrap text-center py-4" style="background-image: url(images/blog1.webp);">
                <div class="user-logo">
                    <div class="img" style="background-image: url(images/seller.jpg);"></div>
                    <h3>{{ auth()->user()->name }}</h3>
                </div>
            </div>
            <ul class="list-unstyled components mb-5">
                <li class="active">
                    <a href="{{ '/dashboard' }}"><span class="fa fa-home mr-3"></span> Home</a>
                </li>
                <li>
                    <a href="{{ '/products' }}">
                        <span class="fa fa-download mr-3 notif">
                            <small class="d-flex align-items-center justify-content-center">5</small>
                        </span>
                        Products
                    </a>
                </li>

                <li>
                    <a href="{{ '/categories' }}">
                        <span class="fa fa-download mr-3 notif">
                            <small class="d-flex align-items-center justify-content-center">2</small>
                        </span>
                        Categories
                    </a>
                </li>
                <li>
                    <a href="#"><span class="fa fa-gift mr-3"></span>Orders</a>
                </li>
                <li>
                    <a href="{{ '/reviews' }}">
                        <span class="fa fa-download mr-3 notif">
                            <small class="d-flex align-items-center justify-content-center">2</small>
                        </span>
                        Reviews
                    </a>
                </li>
                <li>
                    <a href="#"><span class="fa fa-cog mr-3"></span> Settings</a>
                </li>
                <li>
                    <a href="#"><span class="fa fa-support mr-3"></span> Delete Store</a>
                </li>
                <li>
                    <a href="#"><span class="fa fa-sign-out mr-3"></span> Sign Out</a>
                </li>
            </ul>

        </nav>



    </div>

    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>


</body>

</html>
