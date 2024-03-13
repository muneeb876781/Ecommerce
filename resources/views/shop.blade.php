@include('navbar')
@include('headerone')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/card.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="icon" href="{{ asset('./image/gif') }}">
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Document</title>
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


    <div class="features_products">
        <div class="featured_products_content">
            <h1>Purchase Online on FunPrime</h1>
        </div>
        <div class="product_categories">
            <div class="category">
                <a href="#" class="category_toggle">Ctegories</a>
                <div class="category_dropdown">
                    <a href="#" class="category_filter" data-category="All">All</a>
                    @foreach ($categories as $category)
                        <a href="#" class="category_filter"
                            data-category="{{ $category->name }}">{{ $category->name }}</a>
                    @endforeach
                </div>

            </div>
            <div class="category">
                <a href="#" class="category_toggle">Color</a>
                <div class="category_dropdown">
                    <a href="#">White </a>
                    <a href="#">Green</a>
                    <a href="#">Black</a>
                    <a href="#">Green</a>
                    <a href="#">All</a>

                </div>
            </div>
            <div class="category">
                <a href="#" class="category_toggle">Size</a>
                <div class="category_dropdown">
                    <a href="#">Small</a>
                    <a href="#">Medium</a>
                    <a href="#">Large</a>
                </div>
            </div>
            <div class="category">
                <a href="#" class="category_toggle">Categories</a>
                <div class="category_dropdown">
                    <a href="#" class="category_filter" data-category="All">All</a>
                    @foreach ($categories as $category)
                        <a href="#" class="category_filter"
                            data-category="{{ $category->name }}">{{ $category->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var toggles = document.querySelectorAll('.category_toggle');
                toggles.forEach(function(toggle) {
                    toggle.addEventListener('click', function(e) {
                        e.preventDefault();
                        var dropdown = this.nextElementSibling;
                        dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
                    });
                });
            });
        </script>

        <div class="featured_products_cards">
            @foreach ($products as $product)
                {{-- <div class="card" data-category="{{ $product->category->name }}">
                    <img class="card-img-top" src="{{ asset($product->image_url) }}" alt="Card image cap">
                    <div class="card-body">
                        <h4>{{ $product->category->name }}</h4>
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <div class="top_rated_buttons">
                            <a href="{{ route('singleProduct', ['id' => $product->id]) }}" class="btn1">Buy Now.</a>
                            <form action="{{ route('addToCart', ['id' => $product->id]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-link"><i
                                        class="fas fa-shopping-cart"></i></button>
                            </form>

                            <i class="far fa-heart"></i>
                        </div>
                    </div>
                </div> --}}
                <div class="carrd" data-category="{{ $product->category->name }}">
                    <a href="{{ route('singleProduct', ['id' => $product->id]) }}" class="card_main"
                        data-category="{{ $product->category->name }}">
                        <div class="card_main">
                            <div class="el-wrapper">
                                <div class="box-up">
                                    <img class="img" src="{{ asset($product->image_url) }}" alt="">
                                    <div class="img-info">
                                        <div class="info-inner">
                                            <span class="p-name">{{ $product->name }}</span>
                                            <span class="p-company">{{ $product->category->name }}</span>
                                        </div>
                                        <div class="a-size">Available sizes : <span class="size">S , M , L , XL</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="box-down">
                                    <div class="h-bg">
                                        <div class="h-bg-inner"></div>
                                    </div>

                                    <a class="cart" href="#">
                                        <span class="price">Rs {{ $product->price }}</span>
                                        <form action="{{ route('addToCart', ['id' => $product->id]) }}" method="POST">
                                            @csrf
                                            <button class="add-to-cart" type="submit" class="btn btn-link">Add To
                                                Cart</button>
                                        </form>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const categoryFilters = document.querySelectorAll('.category_filter');
                const productCards = document.querySelectorAll('.featured_products_cards .carrd');

                categoryFilters.forEach(filter => {
                    filter.addEventListener('click', function(e) {
                        e.preventDefault();
                        const category = this.getAttribute('data-category');
                        productCards.forEach(card => {
                            const cardCategory = card.getAttribute('data-category');
                            if (category === 'All' || cardCategory === category) {
                                card.style.display = 'block';
                            } else {
                                card.style.display = 'none';
                            }
                        });
                    });
                });
            });
        </script>

        <div class="features_products_button">
            <button class="btn1">See Morre.</button>
        </div>
    </div>

    <div class="subscribe">
        <div class="subscribe_content">
            <input type="text" name="email" id="email" placeholder="Enter your email address">
            <button class="btn1">SUBSCRIBE</button>
        </div>
    </div>
</body>

</html>
@include('footer')
