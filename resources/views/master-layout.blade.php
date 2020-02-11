<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kids-now  @yield('title')</title>
    <link rel="icon" href="images/logo.png"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <base href="{{asset('')}}">
    <!-- CSS libs -->
    <link rel="stylesheet" type="text/css" href="css/reset-browser.css">
    <link rel="stylesheet" type="text/css" href="libs/bootstrap-4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="libs/fontawesome-free-5.10.1-web/css/all.min.css">
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
    {{-- <link rel="stylesheet" href="asset/kriyo/css/bootstrap.min.css"> --}}
    <!-- Font Awesome -->
    <link rel="stylesheet" href="asset/kriyo/css/font-awesome.min.css">
    <!-- Custom CSS -->
        <link rel="stylesheet" href="libs/slick-1.8.1/slick/slick.css">
        <link rel="stylesheet" href="libs/slick-1.8.1/slick/slick-theme.css">
    @yield('css')
    <style>
        .line .item a{
            text-align: center;
        }
        @keyframes example {
            0%   {right:0px; top:50px;}
            10%  {right:120px; top:50px;}
            90%  {right:120px; top:50px;}
            100% {right:0px; top:50px}
}
    </style>
    <!-- JS libs --> 
    <script type="text/javascript" src="libs/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="libs/bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>

</head>
<body>
    @include('header')
    @if(session('success'))
        <div style="position: absolute;right: 0px;margin-top: 10px;top: 50px;font-style: italic;opacity: 0.8;font-size: 14px;animation-name: example;
        animation-duration: 4s;animation-iteration-count: 2;animation-direction: alternate; " class="alert alert-success">
            <strong>Succes ! </strong> {{ session('success') }} 🎉
        </div>
    @endif
    @if(session('danger'))
        <div style="position: absolute;right: 0px;margin-top: 10px;top: 50px;font-style: italic;opacity: 0.8;font-size: 14px;animation-name: example;
        animation-duration: 4s;animation-iteration-count: 2;animation-direction: alternate;" class="alert alert-danger">
            <strong>Danger ! </strong> {{ session('danger') }} 🎉
        </div>
    @endif
    {{-- @if(session('danger'))
        <div style="position: absolute;right: 0px;margin-top: 10px;top: 50px;font-style: italic;opacity: 1;font-size: 14px;animation-name: example;
        animation-duration: 5s;animation-iteration-count: 2;animation-direction: alternate;" class="alert alert-danger">
            <strong>@lang('kidsnow.error') </strong> {{ session('danger') }} 🎉
        </div>
    @endif --}}
   
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
    <script src="asset/kriyo/js/toastr.min.js"></script>
    <script>
        $('div.alert').delay(4000).slideUp();
    </script>
    @if(session('error'))
        <script type="text/javascript">
            toastr.error('{{ session('error') }}', 'Thông báo', {timeOut: 5000});
        </script>
    @endif

    @if(session('thongbao'))
        <script type="text/javascript">
            toastr.success('{{ session('thongbao') }}', 'Thông báo', {timeOut: 5000});
        </script>
    @endif
    @yield('js')

</html>
