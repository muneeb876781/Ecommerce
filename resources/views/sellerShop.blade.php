@include('header');
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet"> --}}

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <style>
       

        .main_seller_shop_form {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: row;
            height: auto;
            width: 100%;
        }

        .seller_shop_form {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 900%;
            max-width: 90%;
            ack sections vertically */
        }

        .main_form{
            display: flex;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: row;
            height: auto;
            width: 100%;
        }

        .form_section {
            margin-bottom: 20px;
            width: 30%;
            padding: 30px;
        }

        .form_section h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .form_section h3 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .form_section input[type="text"],
        .form_section textarea,
        .form_section input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form_section a,
        .form_section button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .form_section a:hover,
        .form_section button:hover {
            background-color: #0056b3;
        }

        .form_section .photo label {
            display: block;
            margin-bottom: 5px;
        }

        .form_section .photo input[type="file"] {
            margin-bottom: 10px;
        }

        .buttons {
            display: flex;
            justify-content: space-between; /* Align buttons at both ends */
        }
    </style>


    <title>Document</title>
</head>

<body>

    <div class="main_seller_shop_form">
        <div class="seller_shop_form">
            <h2>Create Your Shop</h2>

            <form class="main_form" action="{{ route('storesellershop') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form_section" id="first">
                    <h3>Basic Information</h3>
                    <input type="text" name="shopname" id="shopname" placeholder="Enter your Shop Name">
                    <textarea name="shopdescription" id="shopdescription" placeholder="Enter your Shop Description"></textarea>
                    <input type="text" name="shopaddress" id="shopaddress" placeholder="Enter your Shop Address">
                    <div class="buttons">
                    </div>
                </div>

                <div class="form_section" id="second">
                    <h3>Personal Information</h3>
                    <input type="text" name="sellerphone" id="sellerphone" placeholder="Enter your Phone Number">
                    <textarea name="selleraddress" id="selleraddress" placeholder="Enter your Address"></textarea>
                    <div class="buttons">
                        
                    </div>
                </div>

                <div class="form_section" id="third">
                    <h3>Media Information</h3>
                    <div class="photo">
                        <label for="shopLogo">Shop Logo</label>
                        <input type="file" id="shopLogo" name="shopLogo">
                        <label for="shopBanner">Shop Banner</label>
                        <input type="file" id="shopBanner" name="shopBanner">
                    </div>
                    <div class="buttons">
                        <button class="btn1" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>



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
