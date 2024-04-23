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
            justify-content: center;
            align-items: center;
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

        .right_con h2 {
            font-size: 22px;
            margin-bottom: 10px;
        }



        .stars {
            color: #FFD700;
            /* Gold color for stars */
        }

        .review {
            margin-bottom: 5px;
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
                /* margin-top: 60px; */
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
        flex-wrap: wrap;
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

    .color-value {
        display: block;
        text-align: center;
        margin-top: 5px;
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

        .video-container {
            position: relative;
            overflow: hidden;
            padding-bottom: 56.25%;
            height: 0;
        }

        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        /* Media query for smaller screens */
        @media (max-width: 768px) {
            .video-container iframe {
                width: 100%;
                height: 100%;
            }
        }
    </style>
    <style>
        .facs {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: row;
            height: auto;
            width: 120%;
            padding: 7px 0;
        }

        .adv {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: row;
            height: auto;
            width: 120%;
            padding: 10px 0;
        }

        .adv img {
            width: 100%;
            height: auto;
            ;
        }

        .facs_cards {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: auto;
            width: 33%;
            /* border: 1px solid rgba(0, 0, 0, 0.6); */
            border-radius: 10px;
            margin: 0 5px;
            padding: 0 5px;
        }

        .facs_cards .fas {
            font-size: 20px;
            color: #909090;
            padding: 7px;
        }

        .facs_cards p {
            text-align: center;
            font-size: 11px;
        }
    </style>
    <style>
        .policies {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            flex-direction: column;
            width: 120%;
            height: auto;
            border: 3px solid #e0e0e0;
            border-radius: 20px;
            padding: 10px;
        }

        .policy_card {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            flex-direction: row;
            width: 100%;
            height: auto;
            padding: 0 10px;
        }

        .policy_card p {
            padding: 7px 0;
            margin: 0;
            line-height: 20px;
        }

        .policy_card .fas {
            padding-right: 10px;
            color: #909090;
            font-size: 20px;
        }

        @media (max-width: 1208px) {
            .policies {
                width: 100%;
            }
        }

        @media (max-width: 1208px) {
            .adv {
                width: 100%;
            }

            .facs {
                width: 100%;
            }
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
            <div style="padding: 0px 10px 0px 10px;" class="container">
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

                            <p class="p_name" style="text-align: left; padding-top: 10px; font-weight: bold;">
                                {{ $product->name }}
                            </p>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home5" role="tabpanel"
                                    aria-labelledby="home-tab5">
                                    @if ($product->image_url)
                                        <img style="width: 300px; height: 350px; margin-left: 20px; margin-bottom: 10px; z-index: -1;"
                                            src="{{ asset('storage/uploads/' . $product->image_url) }}"
                                            class="img-fluid" alt="">
                                    @elseif (!$product->image_url && $product->remote_image_url)
                                        <img style="width: 300px; height: 350px; margin-left: 20px; margin-bottom: 10px; z-index: -1;"
                                            src="{{ $product->remote_image_url }}" class="img-fluid" alt="">
                                    @else
                                        <span>No image available</span>
                                    @endif
                                </div>




                                <div class="tab-pane fade" id="profile5" role="tabpanel"
                                    aria-labelledby="profile-tab5">
                                    @if ($product->media2_url)
                                        <img style="width: 300px; height: 350px; margin-left: 20px; margin-bottom: 10px; z-index: -1;"
                                            src="{{ asset('storage/uploads/' . $product->media2_url) }}"
                                            class="img-fluid" alt="">
                                    @elseif (!$product->media2_url && $product->remote_media2_url)
                                        <img style="width: 300px; height: 350px; margin-left: 20px; margin-bottom: 10px; z-index: -1;"
                                            src="{{ $product->remote_media2_url }}" class="img-fluid" alt="">
                                    @else
                                        <span>No image available</span>
                                    @endif
                                </div>



                                <div class="tab-pane fade" id="contact5" role="tabpanel"
                                    aria-labelledby="contact-tab5">
                                    @if ($product->media3_url)
                                        <img style="width: 300px; height: 350px; margin-left: 20px; margin-bottom: 10px; z-index: -1;"
                                            src="{{ asset('storage/uploads/' . $product->media3_url) }}"
                                            class="img-fluid" alt="">
                                    @elseif (!$product->media3_url && $product->remote_media3_url)
                                        <img style="width: 300px; height: 350px; margin-left: 20px; margin-bottom: 10px; z-index: -1;"
                                            src="{{ $product->remote_media3_url }}" class="img-fluid" alt="">
                                    @else
                                        <span>No image available</span>
                                    @endif
                                </div>
                            </div>

                            <ul class="nav" id="myTab1" role="tablist">
                                <li style="border: 1px solid black; border-radius: 10px;" class="nav-item">
                                    <a class="nav-link active" id="home-tab5" data-toggle="tab" href="#home5"
                                        role="tab" aria-controls="home5" aria-selected="true">
                                        @if ($product->image_url)
                                            <img style="width: 110px; height: 110px;"
                                                src="{{ asset('storage/uploads/' . $product->image_url) }}"
                                                class="img-fluid" alt="">
                                        @elseif (!$product->image_url && $product->remote_image_url)
                                            <img style="width: 110px; height: 110px;"
                                                src="{{ $product->remote_image_url }}" class="img-fluid"
                                                alt="">
                                        @else
                                            <span>No image available</span>
                                        @endif
                                    </a>
                                </li>
                                <li style="border: 1px solid black; border-radius: 10px;" class="nav-item">
                                    <a class="nav-link" id="profile-tab5" data-toggle="tab" href="#profile5"
                                        role="tab" aria-controls="profile5" aria-selected="false">
                                        @if ($product->media2_url)
                                            <img style="width: 110px; height: 110px;"
                                                src="{{ asset('storage/uploads/' . $product->media2_url) }}"
                                                class="img-fluid" alt="">
                                        @elseif (!$product->media2_url && $product->remote_media2_url)
                                            <img style="width: 110px; height: 110px;"
                                                src="{{ $product->remote_media2_url }}" class="img-fluid"
                                                alt="">
                                        @else
                                            <span>No image available</span>
                                        @endif
                                    </a>
                                </li>
                                <li style="border: 1px solid black; border-radius: 10px;" class="nav-item">
                                    <a class="nav-link" id="contact-tab5" data-toggle="tab" href="#contact5"
                                        role="tab" aria-controls="contact5" aria-selected="false">
                                        @if ($product->media3_url)
                                            <img style="width: 110px; height: 110px;"
                                                src="{{ asset('storage/uploads/' . $product->media3_url) }}"
                                                class="img-fluid" alt="">
                                        @elseif (!$product->media3_url && $product->remote_media3_url)
                                            <img style="width: 110px; height: 110px;"
                                                src="{{ $product->remote_media3_url }}" class="img-fluid"
                                                alt="">
                                        @else
                                            <span>No image available</span>
                                        @endif
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 order-3 order-lg-2">
                        <div class="pro-content">

                            @php
                                $subCategory = \App\Models\SubCategory::find($product->SubCategory_id);
                                $subCategoryName = $subCategory ? $subCategory->name : 'Unknown';
                            @endphp

                            <span>{{ $product->category->name }} / {{ $subCategoryName }} @if ($product->subcategory)
                                    {{ $product->subcategory->name }}
                                @endif
                            </span>
                            <p class="mb-0 pb-0" style="font-size: 18px;">
                                @if ($product->brand)
                                    {{ $product->brand->name }}
                                @endif
                            </p>
                            <h5 class="title pb-0 pt-0">{{ $product->name }}</h5>
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
                            <div class="pro-code mt-1 mb-1">
                                <ul>
                                    @php
                                        $salePercentage =
                                            (($product->price - $product->discountedPrice) / $product->price) * 100;
                                    @endphp
                                    <li>
                                        Saving:
                                        <span style="background: #efefef; padding: 5px; border-radius: 20px;">
                                            @if ($salePercentage > 0)
                                                {{ round($salePercentage) }}% Off
                                            @endif
                                        </span>
                                    </li>
                                    <li>SKU: <span>{{ $product->sku }}</span></li>
                                    <li>Tag: <span>{{ $product->category->name }}</span></li>
                                </ul>
                            </div>
                            {{-- <div class="about-pro">
                                <ul class="mb-0">
                                    <li>{!! $product->description !!}</li>
                                </ul>
                            </div> --}}
                            <div class="adv">
                                <img src="https://f.nooncdn.com/mpcms/EN0001/assets/1abeaae7-0765-4bff-a0af-d7af9f716416.png?format=avif"
                                    alt="">
                            </div>

                            <div class="facs">
                                <div class="facs_cards">
                                    <i class="fas fa-truck"></i>
                                    <p>Free Delivery</p>
                                </div>
                                <div class="facs_cards">
                                    <i class="fas fa-money-bill-wave"></i>
                                    <p>Cash on Delivery</p>
                                </div>
                                <div class="facs_cards">
                                    <i class="fas fa-lock"></i>
                                    <p>Safe Transactions</p>
                                </div>
                            </div>
                            <div class="policies">
                                @if ($policies->isEmpty())
                                    <p>No policies found.</p>
                                @else
                                    @foreach ($policies as $policy)
                                        <div class="policy_card">
                                            <i class="fas fa-times-circle"></i>
                                            <p>{{ $policy->policy_name }} <a style="text-decoration: underline;"
                                                    href="{{ route('shopPolicies', ['id' => $policy->id]) }}">{{ __('Learn more') }}</a>
                                            </p>
                                        </div>
                                    @endforeach
                                @endif



                                <div class="policy_card">
                                    <i class="fas fa-check-circle"></i>
                                    <p>FREE RETURNS</p>
                                </div>
                                <div class="policy_card">
                                    <i class="fas fa-shipping-fast"></i>
                                    <p>TRUSTED SHIPPING</p>
                                </div>
                                <div class="policy_card">
                                    <i class="fas fa-hand-holding-usd"></i>
                                    <p>CONTACTLESS DELIVERY</p>
                                </div>
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
                                    <span style="text-decoration: line-through;">AED {{ $product->price }}</span>
                                    <h4>AED {{ $product->discountedPrice }}</h4>
                                @else
                                    <h4>AED {{ $product->price }}</h4>
                                @endif

                            </div>
                            <form action="{{ route('addToCart', ['id' => $product->id]) }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="field">
                                            <div class="attributes-section">
                                                @foreach ($product->attributeValues->unique('product_attribute_id') as $attribute)
                                                    @if ($attribute->productAttribute->name == 'Size')
                                                        <div class="row attribute-row">
                                                            <div class="col-md-3 col-sm-4">
                                                                <p class="attribute-name">
                                                                    {{ $attribute->productAttribute->name }}
                                                                </p>
                                                            </div>
                                                            <div class="col-md-9 col-sm-8">
                                                                <select class="form-select attribute-value-select"
                                                                    name="size">
                                                                    @foreach ($attribute->productAttribute->attributeValues->where('product_id', $product->id) as $val)
                                                                        <option value="{{ $val->value }}">
                                                                            {{ $val->value }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                                <input type="hidden" class="size-hidden"
                                                                    name="size_hidden[]" value="">
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach

                                                <script>
                                                    $('.attribute-value-select').change(function() {
                                                        var size = $(this).val();
                                                        $(this).closest('.attribute-row').find('.size-hidden').val(size);
                                                    });
                                                </script>
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
                                                            <div style="text-align: center;">
                                                                <span class="color-option"
                                                                      style="background-color: {{ $val->value }}"
                                                                      data-color="{{ $val->value }}"
                                                                      title="{{ $val->value }}"></span>
                                                                <span class="color-value">{{ $val->value }}</span>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            </div>



                                            <input type="hidden" id="color" name="color" value="">
                                            <script>
                                                $('.color-option').click(function() {
                                                    var color = $(this).data('color');
                                                    $('.color-option').removeClass('selected');
                                                    $(this).addClass('selected');
                                                    $('#color').val(color);
                                                });
                                            </script>

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
                            <ul class="nav custom-tabs " id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active abc" id="home-tab11" data-toggle="tab" href="#home11"
                                        role="tab" aria-controls="home11" aria-selected="true">Specification</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link abc" id="profile-tab11" data-toggle="tab" href="#profile11"
                                        role="tab" aria-controls="profile11" aria-selected="false">Description
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link abc" id="contact-tab11" data-toggle="tab" href="#contact11"
                                        role="tab" aria-controls="contact11"
                                        aria-selected="false">Reviews({{ $reviews->count() }})</a>
                                </li>
                            </ul>

                            <div class="tab-content" id="myTabContent1">
                                <div class="tab-pane fade show active" id="home11" role="tabpanel"
                                    aria-labelledby="home-tab11">
                                    <div class="desc-content mt-60">

                                        <style>
                                            @media (max-width: 576px) {
                                                .specification {
                                                    font-size: 10px;
                                                }
                                            }
                                        </style>
                                        <div class="row">
                                            <div class="col-md-4 col-sm-12 mb-30">
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
                                            <div class="col-md-8 col-sm-12 mb-30">
                                                <div class="spe-wrapper specs">
                                                    <ul>
                                                        <li class="title">Specifications</li>
                                                        <li class="specification" style="word-wrap: break-word;">{!! $product->specification !!}</li>
                                                        {{-- <li class="specification" style="word-wrap: break-word;">{{$product->specification}}</li> --}}

                                                    </ul>
                                                </div>
                                            </div>
                                            
                                        </div>



                                    </div>
                                </div>
                                <div class="tab-pane fade show " id="profile11" role="tabpanel"
                                    aria-labelledby="profile-tab11">
                                    <div class="desc-content mt-60">
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="single-content mb-40">
                                                    <h5 class="title">About the product</h5>
                                                    <p>{!! $product->description !!}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-content mb-40">
                                                    @php
                                                        $videoId = '';
                                                        if (
                                                            preg_match(
                                                                '/(?:youtube(?:-nocookie)?\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/',
                                                                $product->remote_video_url,
                                                                $matches,
                                                            )
                                                        ) {
                                                            $videoId = $matches[1];
                                                        }
                                                    @endphp

                                                    @if (!empty($videoId))
                                                        <div class="video-container">
                                                            <iframe width="560" height="315"
                                                                src="https://www.youtube.com/embed/{{ $videoId }}"
                                                                frameborder="0" allowfullscreen></iframe>
                                                        </div>
                                                    @else
                                                        <p>Invalid YouTube URL</p>
                                                    @endif
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

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-content mb-40">
                                                <div class="right_con">
                                                    <h2>Product Reviews</h2>
                                                    @foreach ($reviews as $review)
                                                        <div class="review pb-0">
                                                            <p style="font-weight: bold; font-size: 16px;">
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
        <div class="product pt-75 product-h-two">
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

                            @foreach ($relatedProducts->take(5) as $key => $relProduct)
                                @if (
                                    $relProduct->brand &&
                                        $relProduct->category &&
                                        $relProduct &&
                                        $relProduct->brand->state !== 0 &&
                                        $relProduct->category->state !== 0 &&
                                        $relProduct->state !== 0)
                                    <div class="product__single">
                                        <div class="product__box">
                                            <div class="product__thumb">
                                                <a href="{{ route('singleProduct', ['id' => $relProduct->id]) }}"
                                                    class="img-wrapper">
                                                    @if ($relProduct->image_url)
                                                        <img class="img"
                                                            src="{{ asset('storage/uploads/' . $relProduct->image_url) }}"
                                                            alt="product Image"
                                                            style="height: 220px; width: auto; margin: 0 auto;">
                                                    @elseif (!$relProduct->image_url && $relProduct->remote_image_url)
                                                        <img class="img" src="{{ $relProduct->remote_image_url }}"
                                                            alt="product Image"
                                                            style="height: 200px; width: auto; margin: 0 auto;">
                                                    @else
                                                        <span>No image available</span>
                                                    @endif

                                                    @if ($relProduct->quantity == 0)
                                                        <span class="out-of-stock-tag">Out of Stock</span>
                                                    @elseif ($relProduct->discountedPrice)
                                                        @php
                                                            $salePercentage =
                                                                (($relProduct->price - $relProduct->discountedPrice) /
                                                                    $relProduct->price) *
                                                                100;
                                                        @endphp
                                                        @if ($salePercentage > 0)
                                                            <span class="sale-tag"> {{ round($salePercentage) }}%
                                                                Off</span>
                                                        @endif
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="product__content--top">
                                                <span class="cate-name">{{ $relProduct->category->name }}</span>
                                                <h6 class="product__title mine__shaft-color f-700 mb-0"><a
                                                        href="{{ route('singleProduct', ['id' => $relProduct->id]) }}">{{ implode(' ', array_slice(explode(' ', $relProduct->name), 0, 6)) }}
                                                        @if (str_word_count($relProduct->name) > 10)
                                                            ...
                                                        @endif
                                                    </a>
                                                </h6>
                                                <style>
                                                    .star-gold {
                                                        color: gold;
                                                    }
                                                </style>
                                                @php
                                                    $averageRating = $product->reviews->avg('rating');
                                                @endphp
                                                <div class="rating" style="padding-top: 5px;">
                                                    <ul class="list-inline">
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            @if ($i <= $averageRating)
                                                                <li class="rating-active"><i
                                                                        class="fas fa-star star-gold"></i></li>
                                                            @else
                                                                <li><i class="far fa-star"></i></li>
                                                            @endif
                                                        @endfor
                                                    </ul>
                                                </div>

                                            </div>

                                            <div class="product__content--rating d-flex justify-content-between">

                                                <div class="price">
                                                    @if ($relProduct->discountedPrice)
                                                        <span class="original-price"
                                                            style="text-decoration: line-through; font-size: 13px; margin-right: 5px;">AED.
                                                            {{ $relProduct->price }}</span>
                                                        <span class="discounted-price"> <strong>AED.
                                                                {{ $relProduct->discountedPrice }}</strong></span>
                                                    @else
                                                        <span>AED. {{ $relProduct->price }}</span>
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
                                @endif
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
