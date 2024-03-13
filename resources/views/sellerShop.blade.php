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

    <div class="main_seller_shop_form">
        <div class="seller_shop_form">
            <form class="main_form" action="{{ route('storesellershop') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="first" id="first">
                    <h2>Create Your Shop</h2>
                    <h3>Basic Information</h3>
                    <input type="text" name="shopname" id="shopname" placeholder="Enter your Shop Name">
                    <textarea name="shopdescription" id="shopdescription" placeholder="Enter your Shop Name"></textarea>
                    <input type="text" name="shopaddress" id="shopaddress" placeholder="Enter your Shop Address">
                    <a href="#second">Next</a>

                </div>

                <div class="first" id="second">
                    <h2>Create Your Shop</h2>
                    <h3>Personal Information</h3>
                    <input type="text" name="sellerphone" id="sellerphone"  placeholder="Enter your Phone Number">
                    <textarea name="selleraddress" id="selleraddress" placeholder="Enter your Address"></textarea>
                    <div style="padding: 20px">
                        <a href="#third">Next</a>
                        <a href="#first">Previous</a>
                    </div>
                    

                </div>

                <div class="first" id="third">
                    <h2>Create Your Shop</h2>
                    <h3>Media Information</h3>
                    <dic class="photo">
                        <label for="shopLogo">Shop Logo</label>
                        <input type="file" id="shopLogo" name="shopLogo">
                        <label for="shopBanner">Shop Banner</label>
                        <input type="file" id="shopBanner" name="shopBanner">
                    </dic>
                    <div style="padding: 20px">
                        <a href="#second">Previous</a>
                        <button class="btn1" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>





</body>

</html>
