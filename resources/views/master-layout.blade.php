<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kriyo - @yield('title')</title>
    <link rel="shortcut icon" type="image/x-icon" href="" />
    <base href="{{asset('')}}">
    <!-- CSS libs -->
    <link rel="stylesheet" type="text/css" href="css/reset-browser.css">
    <link rel="stylesheet" type="text/css" href="libs/bootstrap-4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="libs/fontawesome-free-5.10.1-web/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="libs/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="libs/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="libs/slick-1.8.1/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="libs/slick-1.8.1/slick/slick-theme.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="css/animate.css">
    <!-- CSS libs -->
    <link rel="stylesheet" href="scss/home.css">

    {{--css component--}}
    <link rel="stylesheet" href="asset/kriyo/css/index.css">
    <link rel="stylesheet" type="text/css" href="asset/kriyo/css/heath.css">
    <link rel="stylesheet" href="asset/kriyo/css/staff_profile.css">
    <link rel="stylesheet" href="asset/kriyo/css/observation.css">
    <link rel="stylesheet" href="asset/kriyo/css/responsive.css">

    <link rel="stylesheet" href="asset/kriyo/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="asset/kriyo/css/font-awesome.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="asset/kriyo/css/owl.carousel.css">

    @yield('css')
    <!-- JS libs --> 
    <script type="text/javascript" src="libs/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="libs/bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>
</head>
<body>
    @include('header')
    @yield('content')
    @include('footer')
</body>
    <!-- JS libs slick -->
    <script type="text/javascript" src="libs/slick-1.8.1/slick/slick.min.js"></script>
    <script type="text/javascript" src="libs/OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>
    <!-- JS libs wow -->
    <script src="js/wow.js"></script>
    <script>new WOW().init();</script>
    <script src="js/home.js"></script>
    @yield('js')
</html>
