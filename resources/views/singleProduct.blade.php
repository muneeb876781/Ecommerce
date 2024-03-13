@include('navbar')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/productsingle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="icon" href="{{ asset('./image/gif') }}">
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        .card-btn {
            color: #fff;
            background-color: #28a745;
            border-color: #28a745;
            padding: 10px 20px 10px 20px;
        }

        .card-btn:hover {
            color: #fff;
            background-color: #007bff;
        }
    </style>
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
    <main class="container">

        <!-- Left Column / Headphones Image -->
        <div class="left-column">
            <img data-image="black" src="{{ asset($product->image_url) }}" alt="">
            <img data-image="blue" src="{{ asset($product->image_url) }}" alt="">
            <img data-image="red" class="active" src="{{ asset($product->image_url) }}" alt="">
        </div>


        <!-- Right Column -->
        <div class="right-column">

            <!-- Product Description -->
            <div class="product-description">
                <span>{{ $product->category->name }}</span>
                <h1>{{ $product->name }}</h1>
                <p>{{ $product->description }}</p>
            </div>

            <!-- Product Configuration -->
            <div class="product-configuration">

                <!-- Product Color -->
                <div class="product-color">
                    <span>Color</span>

                    <div class="color-choose">
                        <div>
                            <input data-image="red" type="radio" id="red" name="red" value="red" checked>
                            <label for="red"><span></span></label>
                        </div>
                        <div>
                            <input data-image="blue" type="radio" id="blue" name="color" value="blue">
                            <label for="blue"><span></span></label>
                        </div>
                        <div>
                            <input data-image="black" type="radio" id="black" name="color" value="black">
                            <label for="black"><span></span></label>
                        </div>
                    </div>

                </div>

                <!-- Cable Configuration -->
                <div class="cable-config">
                    <span>Size</span>

                    <div class="cable-choose">
                        <button>Small</button>
                        <button>Medium</button>
                        <button>Large</button>
                    </div>

                    <a href="#">Related Products</a>
                </div>
            </div>

            <!-- Product Pricing -->
            <div class="product-price">
                <span>{{ $product->price }} RS</span>
                <form action="{{ route('addToCart', ['id' => $product->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="card-btn">Add to Cart</button>
                </form>
            </div>
        </div>
    </main>
    <div class="vid_container">
        <div class="left_con">
            <h2>Add Review</h2>
            <form action="{{ route('productreviewstore', ['id' => $product->id]) }}" method="POST">
                @csrf
                <div class="rating">
                    <input type="checkbox" id="star5" name="rating" value="5" class="star-checkbox">
                    <label for="star5" class="star"><i class="fas fa-star"></i></label>
                    <input type="checkbox" id="star4" name="rating" value="4" class="star-checkbox">
                    <label for="star4" class="star"><i class="fas fa-star"></i></label>
                    <input type="checkbox" id="star3" name="rating" value="3" class="star-checkbox">
                    <label for="star3" class="star"><i class="fas fa-star"></i></label>
                    <input type="checkbox" id="star2" name="rating" value="2" class="star-checkbox">
                    <label for="star2" class="star"><i class="fas fa-star"></i></label>
                    <input type="checkbox" id="star1" name="rating" value="1" class="star-checkbox">
                    <label for="star1" class="star"><i class="fas fa-star"></i></label>
                </div>

                <textarea id="comment" name="comment" placeholder="Add your Review about the product"></textarea>
                <button class="r_btn" type="submit">Submit Review</button>
            </form>
            <h2>Product Reviews</h2>
            @foreach ($reviews as $review)
                <div class="review">
                    <p style="font-weight: 500; font-size: 16px;">{{ $review->user->name }}</p>
                    <p>{{ $review->comment }}</p>
                    <p class="stars">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $review->rating)
                                <i class="fas fa-star"></i>
                            @else
                                <i class="far fa-star"></i>
                            @endif
                        @endfor
                    </p>
                    <hr>
                </div>
                
            @endforeach
        </div>

        <div class="right_con">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/hHqW0gtiMy4?autoplay=1"
                frameborder="0" autoplay muted allowfullscreen></iframe>
        </div>



    </div>

    <script>
        $(document).ready(function() {

            $('.color-choose input').on('click', function() {
                var headphonesColor = $(this).attr('data-image');

                $('.active').removeClass('active');
                $('.left-column img[data-image = ' + headphonesColor + ']').addClass('active');
                $(this).addClass('active');
            });

        });
    </script>

    <script>
        const checkboxes = document.querySelectorAll('.star-checkbox');
        checkboxes.forEach((checkbox) => {
            checkbox.addEventListener('click', (e) => {
                checkboxes.forEach((cb) => {
                    cb.checked = false;
                });
                checkbox.checked = true;
            });
        });
    </script>
</body>

</html>
@include('footer')
