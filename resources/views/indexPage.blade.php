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
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/card.css') }}">

    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="icon" href="{{ asset('./image/gif') }}">
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


    <title>Home</title>
</head>

<body>


    <div class="headerr">
        <div class="left_header">
            <div class="card"">
                <img class="card-img-top" src="../images/1.webp" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Top Rated</h5>
                    <p style="margin-top: 0px; margin-bottom: 5px" class="card-text">Some quick example text to build on
                        the card title and make up
                        the bulk of the card's content.</p>
                    <div class="top_rated_buttons">
                        <button class="btn1">Buy Now.</button>
                        <div class="price_n_ratings">
                            <h3>500. PKR</h3>
                            <i class="fas fa-shopping-cart"></i>
                            <i class="far fa-heart"></i>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="right_header">
            <div class="right_header_content">
                <h1>Have the best Shopping experience with Funprime</h1>
                <p class="content_p">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem quos ipsa
                    facere cumque vel et ducimus neque quae possimus dolorum?</p>
                <div class="header_buttons">
                    <button class="btn1">Shop now</button>
                    <button class="btn2">More about.</button>
                </div>
            </div>
        </div>
    </div>

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
            @foreach ($products as $key => $product)
                @if ($key < 5)
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
                                            <div class="a-size">Available sizes : <span class="size">S , M , L ,
                                                    XL</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="box-down">
                                        <div class="h-bg">
                                            <div class="h-bg-inner"></div>
                                        </div>

                                        <a class="cart" href="#">
                                            <span class="price">Rs {{ $product->price }}</span>
                                            <form action="{{ route('addToCart', ['id' => $product->id]) }}"
                                                method="POST">
                                                @csrf
                                                <button class="add-to-cart" type="submit" class="btn btn-link">Add
                                                    To
                                                    Cart</button>
                                            </form>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
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
            <a href="{{ route('shop') }}" class="btn1">See Morre.</a>
        </div>
    </div>

    <div class="discount_projects">
        <div class="discount_projects_left">
            <h1>Discount 50% off.</h1>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vero et aperiam neque facilis aspernatur nemo
                dolorum ipsam fuga! Animi, voluptates id.</p>
            <div class="discount_projects_buttons">
                <button class="btn1">Shop now</button>
                <button class="btn2">ALL Discounts</button>
            </div>
        </div>
        <div class="discount_projects_right">
            <img src="../images/band.png" alt="">
        </div>
    </div>

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
            @foreach ($products as $key => $product)
                @if ($key < 10)
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
                                            <div class="a-size">Available sizes : <span class="size">S , M , L ,
                                                    XL</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="box-down">
                                        <div class="h-bg">
                                            <div class="h-bg-inner"></div>
                                        </div>

                                        <a class="cart" href="#">
                                            <span class="price">Rs {{ $product->price }}</span>
                                            <form action="{{ route('addToCart', ['id' => $product->id]) }}"
                                                method="POST">
                                                @csrf
                                                <button class="add-to-cart" type="submit" class="btn btn-link">Add
                                                    To
                                                    Cart</button>
                                            </form>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
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
            <a href="{{ route('shop') }}" class="btn1">See Morre.</a>
        </div>
    </div>


    <div class="blogs">
        <div class="blog_content">
            <h1>From the Blogs</h1>
        </div>
        <div class="blog_card">
            <div class="wrap animate pop">
                <div class="overlay">
                    <div class="overlay-content animate slide-left delay-2">
                        <h1 class="animate slide-left pop delay-4">Shoes</h1>
                        <p class="animate slide-left pop delay-5" style="color: black; margin-bottom: 2.5rem;">
                            Kingdom: <em>Plantae</em></p>
                    </div>
                    <div class="image-content animate slide delay-5"></div>
                    <div class="dots animate">
                        <div class="dot animate slide-up delay-6"></div>
                        <div class="dot animate slide-up delay-7"></div>
                        <div class="dot animate slide-up delay-8"></div>
                    </div>
                </div>
                <div class="text">
                    <p><img class="inset" src="../images/a1.jpg" alt="" />Trees
                        are woody perennial plants that are a member of the kingdom <em>Plantae</em>. All species of
                        trees are grouped by their genus, family, and order. This helps make identifying and studying
                        trees easier.</p>
                    <p>Apart from providing oxygen for the planet and beauty when they bloom or turn color, trees are
                        very useful. Certain species of hardwood and softwood trees are excellent for timber, making
                        furniture, and paper.</p>
                    <p>When managed properly, trees are a good source of renewable energy and construction material.</p>
                </div>
            </div>
            <div class="wrap animate pop">
                <div class="overlay">
                    <div class="overlay-content animate slide-left delay-2">
                        <h1 class="animate slide-left pop delay-4">Jackets</h1>
                        <p class="animate slide-left pop delay-5" style="color: black; margin-bottom: 2.5rem;">
                            Kingdom: <em>Plantae</em></p>
                    </div>
                    <div class="image-content1 animate slide delay-5"></div>
                    <div class="dots animate">
                        <div class="dot animate slide-up delay-6"></div>
                        <div class="dot animate slide-up delay-7"></div>
                        <div class="dot animate slide-up delay-8"></div>
                    </div>
                </div>
                <div class="text">
                    <p><img class="inset" src="../images/a4.jpg" alt="" />Trees
                        are woody perennial plants that are a member of the kingdom <em>Plantae</em>. All species of
                        trees are grouped by their genus, family, and order. This helps make identifying and studying
                        trees easier.</p>
                    <p>Apart from providing oxygen for the planet and beauty when they bloom or turn color, trees are
                        very useful. Certain species of hardwood and softwood trees are excellent for timber, making
                        furniture, and paper.</p>
                    <p>When managed properly, trees are a good source of renewable energy and construction material.</p>
                </div>
            </div>
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
