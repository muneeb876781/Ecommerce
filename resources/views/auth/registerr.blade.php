<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <title>Document</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap') ;
        *{
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;

        }

        body {
            font-family: "Poppins", sans-serif;
            font-size: 14px;
            margin: 0;
            color: #999;
        }

        input,
        textarea,
        select,
        button {
            font-family: "Poppins", sans-serif;
        }

        p,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        ul {
            margin: 0;
            font-family: "Poppins", sans-serif;
        }

        img {
            max-width: 100%;
        }

        ul {
            padding-left: 0;
            margin-bottom: 0;
        }

        a {
            text-decoration: none;
        }

        :focus {
            outline: none;
        }

        .wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #efefef;
            flex-direction: row;
        }

        .photo {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            width: 50%;
            background: linear-gradient(rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0.2)), url(../images/blog1.webp);
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            height: 100vh;

        }

        .photo .frame{
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            color: rgba(0, 0, 0, 0.6);
            width: 80%;
            height: 80%;
            border: 5px solid white;
            box-shadow: 20px 20px 30px -8px rgba(0, 0, 0, 0.2);
            background: rgba(255, 255, 255, 0.6);
        }

        .photo .frame p{
            padding: 20px 60px 20px 60px;
            text-align: center;
            font-size: 17px;
        }

        .inner {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            width: 50%;
            background: #fff;
            height: 100vh;
        }

        .image-1 {
            position: absolute;
            bottom: -12px;
            left: -191px;
            z-index: 99;
        }

        .image-2 {
            position: absolute;
            bottom: 0;
            right: -129px;
        }

        form {
            width: 70%;
            position: relative;
            z-index: 9;
            padding: 77px 61px 66px;
            background: #fff;
            box-shadow: 20px 20px 30px -8px rgba(0, 0, 0, 0.2);
            -webkit-box-shadow: 20px 30px -8px -8p rgba(0, 0, 0, 0.2);
            -moz-box-shadow: 20px 20px 30px -8p rgba(0, 0, 0, 0.2);
            -ms-box-shadow: 20px 20px 30px -8p rgba(0, 0, 0, 0.2);
            -o-box-shadow: 20px 20px 30px -8p rgba(0, 0, 0, 0.2);
        }

        h3 {
            text-transform: uppercase;
            font-size: 25px;
            font-family: "Muli-SemiBold";
            color: #333;
            letter-spacing: 3px;
            text-align: center;
            margin-bottom: 33px;
        }

        .form-holder {
            position: relative;
            margin-bottom: 21px;
        }

        .form-holder span {
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            font-size: 15px;
            color: #333;
        }

        .form-holder span.lnr-lock {
            left: 2px;
        }

        .form-control {
            border: none;
            border-bottom: 1px solid #e6e6e6;
            display: block;
            width: 100%;
            height: 38px;
            background: none;
            padding: 3px 42px 0px;
            color: #666;
            font-family: "Muli-SemiBold";
            font-size: 16px;
        }

        .form-control::-webkit-input-placeholder {
            font-size: 14px;
            font-family: "Muli-Regular";
            color: #999;
            transform: translateY(1px);
        }

        .form-control::-moz-placeholder {
            font-size: 14px;
            font-family: "Muli-Regular";
            color: #999;
            transform: translateY(1px);
        }

        .form-control:-ms-input-placeholder {
            font-size: 14px;
            font-family: "Muli-Regular";
            color: #999;
            transform: translateY(1px);
        }

        .form-control:-moz-placeholder {
            font-size: 14px;
            font-family: "Muli-Regular";
            color: #999;
            transform: translateY(1px);
        }

        .form-control:focus {
            border-bottom: 1px solid #accffe;
        }

        button {
            border: none;
            width: 100%;
            height: 49px;
            margin-top: 50px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
            background: #99ccff;
            color: #fff;
            text-transform: uppercase;
            font-family: "Muli-SemiBold";
            font-size: 15px;
            letter-spacing: 2px;
            transition: all 0.5s;
            position: relative;
            overflow: hidden;
        }

        button span {
            position: relative;
            z-index: 2;
        }

        button:before,
        button:after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            background-color: rgba(52, 152, 253, 0.25);
            -webkit-transition: all 0.3s;
            -moz-transition: all 0.3s;
            -o-transition: all 0.3s;
            transition: all 0.3s;
            -webkit-transform: translate(-100%, 0);
            transform: translate(-100%, 0);
            -webkit-transition-timing-function: cubic-bezier(0.75, 0, 0.125, 1);
            transition-timing-function: cubic-bezier(0.75, 0, 0.125, 1);
        }

        button:after {
            -webkit-transition-delay: 0.2s;
            transition-delay: 0.2s;
        }

        button:hover:before,
        button:hover:after {
            -webkit-transform: translate(0, 0);
            transform: translate(0, 0);
        }

        @media (max-width: 991px) {
            .inner {
                width: 400px;
                left: 4%;
            }
        }

        @media (max-width: 767px) {
            .inner {
                width: 100%;
                left: 0;
            }

            .image-1,
            .image-2 {
                display: none;
            }

            form {
                padding: 35px;
                box-shadow: none;
                -webkit-box-shadow: none;
                -moz-box-shadow: none;
                -ms-box-shadow: none;
                -o-box-shadow: none;
            }

            .wrapper {
                background: none;
            }
        }

        /*# sourceMappingURL=style.css.map */
    </style>

</head>

<body>
    <div class="wrapper">
        

        <div class="inner">
            <!-- <img src="images/image-1.png" alt="" class="image-1"> -->
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <h3>Register</h3>
                <div class="form-holder">
                    <span class="lnr lnr-user"></span>
                    <input type="text" name="name" id="name" class="form-control" placeholder="name">
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div class="form-holder">
                    <span class="lnr lnr-user"></span>
                    <input type="text" name="email" id="email" class="form-control" placeholder="email" ">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div class="form-holder">
                    <span class="lnr lnr-user"></span>
                    <input type="password" name="password" id="password" class="form-control" placeholder="password">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div class="form-holder">
                    <span class="lnr lnr-lock"></span>
                    <input type="password_confirmation" name="password_confirmation" id="password" class="form-control" placeholder="Conform Password" autocomplete="off">
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                            name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
        
                    <x-primary-button class="ms-4">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>

            <!-- <img src="images/image-2.png" alt="" class="image-2"> -->
        </div>
        <div class="photo">
            <div class="frame">
                <h1>FunPrime</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur voluptate officia esse eius atque, quod, consectetur voluptates eos qui dicta quis, vero illo. Illo quibusdam iste dignissimos maxime quasi suscipit ipsam repudiandae dolores itaque ratione.</p>
            </div>
        </div>

    </div>
</body>

</html>


