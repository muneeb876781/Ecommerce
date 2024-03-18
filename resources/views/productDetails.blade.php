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


    <style>
        .sale-tag {
            position: absolute;
            top: 0;
            left: 0;
            background-color: #f00;
            color: #fff;
            padding: 5px 10px;
            font-size: 12px;
            border-radius: 0 0 20px 0;
            z-index: 1;
        }

        .left_con {
            display: flex;
            justify-content: flex-start;
            align-items: flex-start;
            flex-direction: column;
            width: 100%;
            height: 100%;
            padding: 30px;
            margin: 10px;

        }

        .left_con h2 {
            font-size: 22px;
            margin-bottom: 10px;
        }

        .stars {
            color: #FFD700;
            /* Gold color for stars */
        }

        .review {
            margin-bottom: 20px;
        }

        .review p {
            margin-bottom: 5px;
        }

        .star {
            cursor: pointer;
        }

        /* Style for the form */
        form {
            /* display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: flex-start;
            width: 100%;
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid rgba(0, 0, 0, 0.6); */
        }

        label {
            margin-bottom: 5px;
        }

        textarea {
            width: 100%;
            height: 40px;
            padding: 5px;
            border: none;
            border-bottom: 1px solid rgba(0, 0, 0, 0.4);
            background: transparent;
        }

        .r_btn {
            margin: 20px;
            background: rgba(0, 0, 0, 0.4);
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px 10px 20px;
        }

        .r_btn:hover {
            background-color: #efefef;
            color: black;
        }

        .rating {
            direction: rtl;
            display: inline-block;
        }

        .star {
            color: #ddd;
            cursor: pointer;
            font-size: 1.5rem;
            padding: 0 0.1rem;
        }

        .star:hover,
        .star:hover~.star {
            color: #f8d319;
        }

        .star-checkbox {
            display: none;
        }

        .star-checkbox:checked~.star {
            color: #f8d319;
        }

        @media (max-width: 940px) {
            .container {
                flex-direction: column;
                margin-top: 60px;
            }

            .left-column,
            .right-column {
                width: 100%;
            }

            .left-column img {
                width: 300px;
                right: 0;
                top: -65px;
                left: initial;
            }
        }

        @media (max-width: 535px) {
            .left-column img {
                width: 220px;
                top: -85px;
            }
        }

        .color-attribute {
            display: flex;
            gap: 10px;
            margin-bottom: 10px;
        }

        .color-option {
            display: inline-block;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            border: 1px solid #ccc;
            cursor: pointer;
            position: relative;
        }

        .color-option.selected::after {
            content: '\2713';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .cart-button {
            display: block;
            width: 100%;
            padding: 10px 0;
            text-align: center;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .cart-button:hover {
            background-color: #0056b3;
        }

        .color-option.selected::after {
            content: '\2713';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #fff;
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
    <!-- Main -->
    <main class="main--wrapper">


        <!-- Shop-details start -->
        <section class="shop-details-area pb-80">
            <div style="padding: 0px 70px 0px 70px;" class="container">
                {{-- <div class="row">
                    <div class="col-sm-12">
                        <div class="shop-bred pt-35 pb-35">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                                    <li class="breadcrumb-item"><a href="index-2.html">Phones & Tablet</a></li>
                                    <li class="breadcrumb-item"><a href="index-2.html">Headphone</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Ultra Wireless 550
                                        Headphone With Bluetooth.</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div> --}}
                <div class="row">
                    <div class="col-lg-5 col-md-6 order-1 order-lg-1">
                        <div class="pro-img" style="margin-right: 0px;">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home5" role="tabpanel"
                                    aria-labelledby="home-tab5">
                                    <img style="width: 300px; height: 300px; margin-left: 20px; margin-bottom: 10px; z-index: -1;"
                                        src="{{ asset($product->image_url) }}" class="img-fluid" alt="">

                                </div>

                                <div class="tab-pane fade" id="profile5" role="tabpanel"
                                    aria-labelledby="profile-tab5">
                                    <img src="{{ asset($product->image_url) }}" class="img-fluid" alt="">
                                </div>

                                <div class="tab-pane fade" id="contact5" role="tabpanel"
                                    aria-labelledby="contact-tab5">
                                    <img src="{{ asset($product->image_url) }}" class="img-fluid" alt="">
                                </div>
                            </div>
                            <ul class="nav" id="myTab1" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab5" data-toggle="tab" href="#home5"
                                        role="tab" aria-controls="home5" aria-selected="true">
                                        <img style="widows: 110px; height: 110px;"
                                            src="{{ asset($product->media1_url) }}" class="img-fluid" alt="">
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab5" data-toggle="tab" href="#profile5"
                                        role="tab" aria-controls="profile5" aria-selected="false">
                                        <img style="widows: 110px; height: 110px;"
                                            src="{{ asset($product->media1_url) }}" class="img-fluid" alt="">
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab5" data-toggle="tab" href="#contact5"
                                        role="tab" aria-controls="contact5" aria-selected="false">
                                        <img style="widows: 110px; height: 110px;"
                                            src="{{ asset($product->media1_url) }}" class="img-fluid" alt="">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 order-3 order-lg-2">
                        <div class="pro-content">
                            <span>{{ $product->category->name }}</span>
                            <h5 class="title">{{ $product->name }}</h5>
                            <div class="pro-rating pb-15">
                                <a href="#" class="active"><i class="fas fa-star"></i></a>
                                <a href="#" class="active"><i class="fas fa-star"></i></a>
                                <a href="#" class="active"><i class="fas fa-star"></i></a>
                                <a href="#"><i class="fas fa-star"></i></a>
                                <a href="#"><i class="fas fa-star"></i></a>
                                <a href="#" class="review">({{ $reviews->count() }} customer reviews)</a>
                            </div>
                            <div class="pro-social mb-15">
                                <a href="#"><img src="../img/payment/pro-details-social.jpg" class="img-fluid"
                                        alt=""></a>
                            </div>
                            <div class="about-pro">
                                <ul class="mb-40">
                                    <li>{{ $product->description }}</li>
                                </ul>
                            </div>




                            <div class="pro-code pt-10">
                                <ul>
                                    <li>SKU: <span>{{ $product->sku }}</span></li>
                                    <li>Tag: <span>{{ $product->category->name }}</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 order-2 order-lg-3">
                        <div class="cart-wrapper">
                            <div class="cart-title">
                                @if ($product->quantity > 0)
                                    <h6>Availability: <span>In Stock</span></h6>
                                @else
                                    <h6>Availability: <span>Out of Stock</span></h6>
                                @endif
                            </div>
                            <div class="price mt-15 mb-20">
                                @if ($product->discountedPrice)
                                    <span style="text-decoration: line-through;">Rs {{ $product->price }}</span>
                                    <h4>Rs {{ $product->discountedPrice }}</h4>
                                @else
                                    <h4>Rs {{ $product->price }}</h4>
                                @endif

                            </div>



                            <form action="{{ route('addToCart', ['id' => $product->id]) }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="field">
                                            <div class="attributes-section">
                                                @foreach ($product->attributeValues->unique('product_attribute_id') as $attribute)
                                                    @if ($attribute->productAttribute->name != 'Color')
                                                        <div class="row attribute-row">
                                                            <div class="col-md-3 col-sm-4">
                                                                <p class="attribute-name">
                                                                    {{ $attribute->productAttribute->name }}</p>
                                                            </div>
                                                            <div class="col-md-9 col-sm-8">
                                                                <select class="form-select attribute-value-select"
                                                                    name="attribute_values[{{ $attribute->id }}]">
                                                                    @foreach ($attribute->productAttribute->attributeValues->where('product_id', $product->id) as $val)
                                                                        <option value="{{ $val->id }}">
                                                                            {{ $val->value }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="field">
                                            <label>Quantity:</label>
                                            <input id="quantity" name="quantity" type="number" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="field">
                                            <label>Color:</label>
                                            <div class="color-attribute">
                                                @foreach ($product->attributeValues->unique('product_attribute_id') as $attribute)
                                                    @if ($attribute->productAttribute->name == 'Color')
                                                        @foreach ($attribute->productAttribute->attributeValues->where('product_id', $product->id) as $val)
                                                            <span class="color-option"
                                                                style="background-color: {{ $val->value }}"
                                                                data-color="{{ $val->value }}"
                                                                title="{{ $val->value }}"></span>
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="cart-button mt-2 pt-0 pb-0 pb-0 mb-0">Add to
                                    Cart</button>

                            </form>





                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    const colorOptions = document.querySelectorAll('.color-option');
                                    colorOptions.forEach(option => {
                                        option.addEventListener('click', function() {
                                            colorOptions.forEach(opt => opt.classList.remove('selected'));
                                            this.classList.add('selected');
                                        });
                                    });
                                });
                            </script>




                            <div class="last pt-0">
                                <a href="#">Add To Wishlist</a>
                                <a href="#">Compare</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Shop-details end -->

        <!-- Shop-details tab start -->
        <section class="shop-details-desc">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="desc-wrapper">
                            <ul class="nav custom-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" id="home-tab11" data-toggle="tab" href="#home11"
                                        role="tab" aria-controls="home11" aria-selected="true">Specification</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" id="profile-tab11" data-toggle="tab"
                                        href="#profile11" role="tab" aria-controls="profile11"
                                        aria-selected="false">Description </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab11" data-toggle="tab" href="#contact11"
                                        role="tab" aria-controls="contact11"
                                        aria-selected="false">Reviews({{$reviews->count()}})</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent1">
                                <div class="tab-pane fade" id="home11" role="tabpanel"
                                    aria-labelledby="home-tab11">
                                    <div class="desc-content mt-60">
                                        <div class="row">
                                            <div class="col-md-12 mb-30">
                                                <div class="spe-wrapper">
                                                    <ul>
                                                        <li class="title">Additional information</li>
                                                        @foreach ($product->attributeValues->unique('product_attribute_id') as $attribute)
                                                            <li>{{ $attribute->productAttribute->name }}</li>
                                                            <li>
                                                                @foreach ($attribute->productAttribute->attributeValues->where('product_id', $product->id) as $val)
                                                                    {{ $val->value }}
                                                                    @unless ($loop->last)
                                                                        {{ '  ' }}
                                                                    @endunless
                                                                @endforeach
                                                            </li>
                                                        @endforeach
                                                    </ul>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade show active" id="profile11" role="tabpanel"
                                    aria-labelledby="profile-tab11">
                                    <div class="desc-content mt-60">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="single-content mb-40">
                                                    <h5 class="title">Perfactly Done</h5>
                                                    <p>Praesent ornare, ex a interdum consectetur, lectus diam sodales
                                                        elit, vitae egestas est enim ornare nisl. Nullam in lectus nec
                                                        sem semper viverra. In lobortis egestas massa. Nam nec
                                                        massa nisi. Suspendisse potenti. Quisque suscipit vulputate dui
                                                        quis volutpUt id elit facilisis, feugiat est in, tempus lacus.
                                                        Ut ultrices dictum meta ultricies ex vulputate ac. Ut id
                                                        cursus tellus, non tempor quam. Morbi porta diam nisi, id
                                                        finibus ntincidunt eu.</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-content mb-40">
                                                    <h5 class="title">Freshly Design</h5>
                                                    <p>Praesent ornare, ex a interdum consectetur, lectus diam sodales
                                                        elit, vitae egestas massa nisi. Suspendisse potenti. Quisque
                                                        suscipit vulputate dui quis volutpat.Ut id cursus tellus, non
                                                        tempor quam. Morbi.</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-content mb-40">
                                                    <h5 class="title">Fabolous Sound</h5>
                                                    <p>Praesent ornare, ex a interdum consectetur, lectus diam sodales
                                                        elit, vitae egestas massa nisi. Suspendisse potenti. Quisque
                                                        suscipit vulputate dui quis volutpat.Ut id cursus tellus, non
                                                        tempor quam. Morbi.</p>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-content mb-40">
                                                    <h5 class="title">Inteligent Bettery</h5>
                                                    <p>Praesent ornare, ex a interdum consectetur, lectus diam sodales
                                                        elit, vitae egestas est enim ornare nisl. Nullam in lectus nec
                                                        sem semper viverra. In lobortis egestas massa. Nam nec
                                                        massa nisi. Suspendisse potenti. Quisque suscipit vulputate dui
                                                        quis volutpat. Ut id elit facilisis, feugiat est in, tempus
                                                        lacus. Ut ultrices dictum metus, a ultricies ex vulputate ac. Ut
                                                        id
                                                        cursus tellus, non tempor quam. Morbi porta diam nisi, id
                                                        finibus nunc tincidunt eu interdum consectetur, lectus diam
                                                        sodales elit, vitae egestas est enim ornare nisl. Nullam in
                                                        lectus
                                                        nec sem semper viverra. In lobortis egestas massa. Nam nec massa
                                                        nisi. Suspendisse potenti. Quisque suscipit vulputate</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="contact11" role="tabpanel"
                                    aria-labelledby="contact-tab11">
                                    <div class="desc-content mt-60">
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="single-content mb-40">
                                                    <<div class="left_con">
                                                        <h2>Add Review</h2>
                                                        <form
                                                            action="{{ route('productreviewstore', ['id' => $product->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            <div class="rating">
                                                                <input type="checkbox" id="star5" name="rating"
                                                                    value="5" class="star-checkbox">
                                                                <label for="star5" class="star"><i
                                                                        class="fas fa-star"></i></label>
                                                                <input type="checkbox" id="star4" name="rating"
                                                                    value="4" class="star-checkbox">
                                                                <label for="star4" class="star"><i
                                                                        class="fas fa-star"></i></label>
                                                                <input type="checkbox" id="star3" name="rating"
                                                                    value="3" class="star-checkbox">
                                                                <label for="star3" class="star"><i
                                                                        class="fas fa-star"></i></label>
                                                                <input type="checkbox" id="star2" name="rating"
                                                                    value="2" class="star-checkbox">
                                                                <label for="star2" class="star"><i
                                                                        class="fas fa-star"></i></label>
                                                                <input type="checkbox" id="star1" name="rating"
                                                                    value="1" class="star-checkbox">
                                                                <label for="star1" class="star"><i
                                                                        class="fas fa-star"></i></label>
                                                            </div>

                                                            <textarea id="comment" name="comment" placeholder="Add your Review about the product"></textarea>
                                                            <button class="r_btn" type="submit">Submit
                                                                Review</button>
                                                        </form>
                                                        <h2>Product Reviews</h2>
                                                        @foreach ($reviews as $review)
                                                            <div class="review">
                                                                <p style="font-weight: 500; font-size: 16px;">
                                                                    {{ $review->user->name }}</p>
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
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-content mb-40">
                                                <div class="right_con">
                                                    <iframe width="560" height="315"
                                                        src="https://www.youtube.com/embed/hHqW0gtiMy4?autoplay=1"
                                                        frameborder="0" autoplay muted allowfullscreen></iframe>
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
        </section>
        <!-- Shop-details tab end -->

        <!-- Product  -->
        <div style="padding: 0px 70px 0px 70px; margin-top: 20px;" class="product pt-75 product-h-two">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-sm-12">
                        <div class="section-header">
                            <div class="row align-items-center">
                                <div class="col-xl-9 col-sm-6">
                                    <div class="product-section2">
                                        <h6 class="product--section__title2"><span>Best Related</span> On Latest Coming
                                        </h6>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6">
                                    <div class="all__product--link text-right">
                                        <a class="all-link" href="shop-collection.html">Discover All Products<span
                                                class="lnr lnr-arrow-right"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="product__active owl-carousel">
                            @foreach ($relatedProducts as $relProduct)
                                <div class="product__single">
                                    <div class="product__box">
                                        <div class="product__thumb">
                                            <a href="{{ route('singleProduct', ['id' => $relProduct->id]) }}"
                                                class="img-wrapper">
                                                <img style="height: 220px;" class="img"
                                                    src="{{ asset($relProduct->image_url) }}" alt="">
                                                <img style="height: 220px;" class="img secondary-img"
                                                    src="{{ asset($relProduct->media1_url) }}" alt="">
                                                @if ($relProduct->discountedPrice)
                                                    @php
                                                        $salePercentage =
                                                            (($relProduct->price - $relProduct->discountedPrice) /
                                                                $relProduct->price) *
                                                            100;
                                                    @endphp

                                                    @if ($salePercentage > 0)
                                                        <span class="sale-tag">Sale
                                                            {{ round($salePercentage) }}% Off</span>
                                                    @endif
                                                @endif
                                            </a>
                                        </div>
                                        <div class="product__content--top">
                                            <span class="cate-name">{{ $relProduct->category->name }}</span>
                                            <h6 class="product__title mine__shaft-color f-700 mb-0"><a
                                                    href="product-details.html">{{ $relProduct->name }}</a>
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

                                        </div>

                                        <div class="product__content--rating d-flex justify-content-between">

                                            <div class="price">
                                                @if ($relProduct->discountedPrice)
                                                    <span class="original-price"
                                                        style="text-decoration: line-through; font-size: 13px; margin-right: 5px;">Rs.
                                                        {{ $relProduct->price }}</span>
                                                    <span class="discounted-price"> <strong>Rs.
                                                            {{ $relProduct->discountedPrice }}</strong></span>
                                                @else
                                                    <span>Rs. {{ $relProduct->price }}</span>
                                                @endif
                                            </div>


                                        </div>
                                    </div>
                                    <div class="product-action">
                                        <a href="#"><span class="fas fa-heart"></span></a>
                                        <a href="#"><span class="fas fa-eye"></span></a>
                                        <a href="#"><span class="fas fa-shopping-cart"></span></a>
                                        <a href="#"><span class="fas fa-sync"></span></a>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product end -->



    </main>
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
@include('foooter')
