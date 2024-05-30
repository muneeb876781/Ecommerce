<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <style>
        .navmain {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            width: 100%;
            height: auto;
            padding: 12px;
            background: #F1F5F6;
        }

        .navyopheader {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: row;
            width: 100%;
            height: auto;
        }

        .navyopheader .navyopheaderleft {
            display: flex;
            align-items: center;
            justify-content: left;
            flex-direction: row;
            width: 50%;
            height: auto;
        }

        .navyopheader .navyopheaderright {
            display: flex;
            align-items: center;
            justify-content: right;
            flex-direction: row;
            width: 50%;
            height: auto;
        }

        .navyopheader .navyopheaderright ul {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: row;
            width: 100%;
            height: auto;
        }

        .navyopheader .navyopheaderright ul li {
            list-style: none;
        }

        .selected {
            font-weight: bold;
            color: #000;
        }

        .nav--top__dropdown img {
            width: 25px;
            margin-right: 10px;
            margin-left: 10px;
        }

        .nav--top__dropdown {
            margin-left: 30px;
            width: 200px;
        }

        .price_switch {
            width: 100px;
        }

        @media (max-width: 1199px) {
            .price_switch {
                display: none;
            }
        }

        .navyopheader .navyopheaderright ul li a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="navmain">
        <div class="container">
            <div class="navyopheader">
                <div class="navyopheaderleft">
                    <span>Free Shipping Worldwide - On All Order Over AED 1000</span>
                </div>
                <div class="navyopheaderright">
                    <ul>
                        <li class="price_switch nav--top__dropdown position-relative">
                            <a class="nav--top__link lang--top__link dove__gray-color text-capitalize position-relative"
                                href="#">
                                <span id="selected-currency">{{ session('currency', 'AED') }}</span>
                                <img id="selected-currency-flag"
                                    src="../images/{{ session('currency', 'AED') == 'PKR' ? 'pkr.png' : 'dubai.png' }}"
                                    alt="Selected Currency Flag">
                                <span class="lnr lnr-chevron-down"></span>
                            </a>
                            <ul class="dropdown-show">
                                <li>
                                    <a class="dove__gray-color text-capitalize {{ session('currency', 'AED') == 'PKR' ? 'selected' : '' }}"
                                        href="{{ route('switch-currency', ['currency' => 'PKR']) }}"
                                        onclick="updateSelectedCurrency('PKR')">
                                        <img src="../images/pkr.png" alt="Pakistan Flag">
                                        <span class="lang">Pakistan</span>
                                        {{-- <span class="currency">PKR</span> --}}
                                    </a>
                                </li>
                                <li>
                                    <a class="dove__gray-color text-capitalize {{ session('currency', 'AED') == 'AED' ? 'selected' : '' }}"
                                        href="{{ route('switch-currency', ['currency' => 'AED']) }}"
                                        onclick="updateSelectedCurrency('AED')">
                                        <img src="../images/dubai.png" alt="Dubai Flag">
                                        <span class="lang">Dubai</span>
                                        {{-- <span class="currency">AED</span> --}}
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="{{ route('userOrders') }}">Track Order</a></li>
                        <li><a href="">Store Location</a></li>
                    </ul>
                </div>
            </div>
            <div class="navmiddlemenu">
                <div class="navmiddlemenulogo">

                </div>
                <div class="navmiddlemenusearch">

                </div>
                <div class="navmiddlemenuuser">

                </div>
            </div>
            <div class="navbottommenu">
                <div class="navbottommenucategory">

                </div>
                <div class="navbottommenumenus">

                </div>
                <div class="navbottommenudashboard">

                </div>
            </div>
        </div>
    </div>
    <script>
        function updateSelectedCurrency(currency) {
            document.getElementById('selected-currency').innerText = currency;
            document.getElementById('selected-currency-flag').src = `../images/${currency.toLowerCase()}.png`;
        }
    </script>
</body>

</html>
