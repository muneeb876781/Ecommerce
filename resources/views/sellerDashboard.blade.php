@include('navbar');
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet"> --}}

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <title>Document</title>
</head>

<body>
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            @include('sellerNavbar')
        </nav>
        <div class="shop">
            <div class="header" style="    background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(../images//bg.png);">
                @if ($shopInfo)
                <img src="{{ asset($shopInfo->logo) }}" alt="Shop Logo">
                    <h1>{{ $shopInfo->name }}</h1>
                    <p>{{ $shopInfo->description }}</p>
                    <form action="{{ route('deleteStore', ['id' => $shopInfo->id]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-link"><span class="fa fa-support mr-3"></span>Delete Store</button>
                    </form>
                @else
                    <h1>Welcome to Your Dashboard</h1>
                @endif
            </div>
            <div class="content">
                <h1>Analytics</h1>
                <div class="analytics">
                    <div class="categories">
                        <h1>0{{$cat_count}}</h1>
                        <h3>Categories</h3>
                    </div>
                    <div class="produccts">
                        <h1>0{{$pro_count}}</h1>
                        <h3>Products</h3>
                    </div>
                    <div class="produccts">
                        <h1>0{{$pro_count}}</h1>
                        <h3>Orders</h3>
                    </div>
                    <div class="produccts">
                        <h1>0{{$rev_count}}</h1>
                        <h3>Reviews</h3>
                    </div>
                </div>
                {{-- <div class="features_products">
                    <div class="featured_products_content">
                        <h1>Top Selling Products</h1>
                    </div>
                    <div class="featured_products_cards">
                        <div class="card"">
                            <img class="card-img-top" src="../images/b1.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Headphones</h5>
            
                                <div class="top_rated_buttons">
                                    <button class="btn1">Buy</button>
                                    <div class="price_n_ratings">
                                        <h3>500. PKR</h3>
                                        <i class="fas fa-shopping-cart"></i>
                                        <i class="far fa-heart"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card"">
                            <img class="card-img-top" src="../images/b2.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Headphones</h5>
            
                                <div class="top_rated_buttons">
                                    <button class="btn1">Buy</button>
                                    <div class="price_n_ratings">
                                        <h3>500. PKR</h3>
                                        <i class="fas fa-shopping-cart"></i>
                                        <i class="far fa-heart"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card"">
                            <img class="card-img-top" src="../images/b3.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Kids Wear</h5>
            
                                <div class="top_rated_buttons">
                                    <button class="btn1">Buy</button>
                                    <div class="price_n_ratings">
                                        <h3>500. PKR</h3>
                                        <i class="fas fa-shopping-cart"></i>
                                        <i class="far fa-heart"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card"">
                            <img class="card-img-top" src="../images/b4.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Shoe Collection</h5>
            
                                <div class="top_rated_buttons">
                                    <button class="btn1">Buy</button>
                                    <div class="price_n_ratings">
                                        <h3>500. PKR</h3>
                                        <i class="fas fa-shopping-cart"></i>
                                        <i class="far fa-heart"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            
                </div> --}}
            </div>
        </div>
    </div>



</body>

</html>
