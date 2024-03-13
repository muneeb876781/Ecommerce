<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .header1 {
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            align-items: center;
            width: 100%;
            height: 80px;
        }

        .header1 input {
            border: none;
            border: 2px solid rgba(0, 0, 0, 0.2);
            width: 60%;
            margin: 0px 70px 0px 70px;
            padding: 10px;
        }

        .header1 button {
            width: 20%;
            margin: 0px 30px 0px 30px;
        }

        .header1 .shop {
            border: 1px solid rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            background: rgba(0, 0, 0, 0.6);
            color: white;
        }

        .header1 .shoop:hover {
            background: #efefef;
            color: black;
        }

        .header1 a {
            width: 20%;
            margin: 0px 30px 0px 30px;
            text-align: center;
        }

        .categories {
            width: 20%;
            margin: 0px 30px 0px 30px;
        }

        .categories select {
            margin: 0px 30px 0px 30px;
            padding: 10px 15px;
            border: 1px solid rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            background: #efefef;
            color: black;
        }



        .categories select option:hover {
            background: rgba(0, 0, 0, 0.2);
            color: white;
        }
    </style>
</head>

<body>
    <div class="header1">
        <div class="categories">
            <select name="categories" id="categoriestitle">
                <option value="">Categories</option>
                <option value="">T shirts</option>
                <option value="">Jackets</option>
                <option value="">eJeans</option>
            </select>
        </div>

        <input type="text" placeholder="Search title tags etc">
        @if (auth()->check())
            @if (auth()->user()->role === 'seller')
                <a href="{{ route('dashboard') }}"  style="background: rgba(0, 0, 0, 0.6); padding: 10px 0px 10px 0px; color: white; border-radius: 10px;" >Go to Your Shop</a>
            @else
                <a href="{{ route('sellerShop') }}"  style="background: rgba(0, 0, 0, 0.6); padding: 10px 0px 10px 0px; color: white; border-radius: 10px;" >Create Your Shop</a>
            @endif
        @else
            <a href="{{ route('login') }}"  style="background: rgba(0, 0, 0, 0.6); padding: 10px 0px 10px 0px; color: white; border-radius: 10px;" >Create Your Shop</a>
        @endif
    </div>
</body>

</html>
