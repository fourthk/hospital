<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Victoria Hospital</title>
    <!-- Page Icon -->
    <link rel="shortcut icon" href="../image/icon.png" type="image/x-icon">
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <!-- Custom Css File Link -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- JQUERY --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!---->
    <style>
        button {
            font-size: 15px;
            color: #F8F4EC;
            background-color: #205b48;
            border-radius: 5px;
            padding: 10px 20px;
            margin-top: 10px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.35);
            transition: background-color 0.3s, transform 0.3s;
        }

        button:hover {
            background-color: #86a789;
        }

        button:active {
            transform: scale(1.1);
        }
    </style>
    <!---->
    @yield('style')
</head>

<body>
    <!-- Header Section Starts -->
    <div class="header">
        <div class="logo"><img src="{{ asset('images/logo.png') }}" alt="Victoria Hospital Logo"></div>
        <h1> Victoria Hospital </h1>
        <nav class="navbar">
            <a href="/">home</a>
            <a href="/facilities">facilities</a>
            <a href="/information">information</a>
            <a href="/doctor">doctors</a>
            <a href="/pharmacy">pharmacy</a>
            <a href="/location">location</a>
            @if (isset(Auth::user()->role))
                @if (Auth::user()->role == 'doctor')
                    <a href="/doctor/appointment" style="font-weight: 800">Doctor page</a>
                @endif
            @endif
            @php
                if (Auth::check()) {
                    echo '<a href="/profile"><i class="fas fa-user"></i></a>';
                } else {
                    echo '<a href="/login" style="color:#205b48; font-weight: 800">Login Here</a>';
                }
            @endphp
        </nav>
        <div id="menu-btn" class="fas fa-bars"></div>
    </div>
    <!-- Header Section End -->

    @yield('container')

    <!-- Footer section Starts  -->
    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>our services</h3>
                <a href="appointment"> <i class="fas fa-chevron-right"></i> medical checkups </a>
                <a href="ambulance"> <i class="fas fa-chevron-right"></i> ambulance service </a>
                <a href="doctor"> <i class="fas fa-chevron-right"></i> specialist doctors </a>
                <a href="pharmacy"> <i class="fas fa-chevron-right"></i> pharmacy medicines </a>
                <a href="facilities"> <i class="fas fa-chevron-right"></i> bed & room facility </a>
            </div>
            <div class="box">
                <h3>contact info</h3>
                <a href="#"> <i class="fas fa-phone"></i> +123-456-7859</a>
                <a href="#"> <i class="fas fa-phone"></i> +356-481-0286</a>
                <a href="#"> <i class="fas fa-envelope"></i> victoria.info.com</a>
                <a href="#"> <i class="fas fa-envelope"></i> victoria.info.@gmail.com</a>
            </div>
            <div class="box">
                <h3>follow us</h3>
                <a href="#"> <i class="fab fa-facebook-f"></i> facebook</a>
                <a href="#"> <i class="fab fa-twitter"></i> twitter</a>
                <a href="#"> <i class="fab fa-instagram"></i> instagram</a>
            </div>
        </div>
        <div class="credit">modified by <span>team 6</span> | all right reserved</div>
    </section>
    <!-- Footer section End  -->

    <!-- back to top button  -->
    <a href="#" class="to-top">
        <i class="fas fa-chevron-up"></i>
    </a>

    <!-- custom js file link  -->
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
