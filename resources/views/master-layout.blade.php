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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.js"></script>
    <script src="{{ asset('asset/js/notify.js') }}"></script>
    
    <link rel="stylesheet" href="css/animate.css">
   
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
    {{--TimePicker--}}
    <link href="asset/timepicker/mdtimepicker.css" rel="stylesheet">

    <!-- Custom CSS -->
        <link rel="stylesheet" href="libs/slick-1.8.1/slick/slick.css">
        <link rel="stylesheet" href="libs/slick-1.8.1/slick/slick-theme.css">
    @yield('css')
    <style>
        .line .item a{
            text-align: center;
        }
    </style>
    <!-- JS libs --> 
    <script type="text/javascript" src="libs/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="libs/bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>

</head>
<body>
    @include('header')
        @if (session('success'))
            <script>
                notify("<div style='font-size:15px'><i style='line-height: 20px'; class='fa fa-thumbs-up'><i/> {{ session('success') }} </div>",'success');
            </script>
        @endif

        @if (session('danger'))
            <script>
                notify("<div style='font-size:15px'><i style='line-height: 20px;' class='fa ffa fa-exclamation-circle'><i/> {{ session('danger') }} </div>",'error');
            </script>
        @endif
   
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
    {{-- <script src="asset/kriyo/js/toastr.min.js"></script> --}}
    {{-- @if(session('error'))
        <script type="text/javascript">
            toastr.error('{{ session('error') }}', 'Thông báo', {timeOut: 5000});
        </script>
    @endif

    @if(session('thongbao'))
        <script type="text/javascript">
            toastr.success('{{ session('thongbao') }}', 'Thông báo', {timeOut: 5000});
        </script>
    @endif --}}
    @yield('js')
    {{--Tiny MCE--}}
    <script src="https://cdn.tiny.cloud/1/j326pk4u71odw7cg7angineo68my440vywpa8xrhn6lkm0yw/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script>tinymce.init({
        selector:'textarea',
        plugins: "link table contextmenu ",
        link_context_toolbar: true,
        link_assume_external_targets: true,
        link_title: false,
    });
    </script>

    {{--TimePicker--}}
    <script src="asset/timepicker/mdtimepicker.js"></script>
    <script>
        $(document).ready(function(){
            $('.timepicker').mdtimepicker();
        });

        $('.timepicker').mdtimepicker({

            // format of the time value (data-time attribute)
            timeFormat: 'hh:mm:ss.000',

            // format of the input value
            format: 'h:mm tt',

            // theme of the timepicker
            // 'red', 'purple', 'indigo', 'teal', 'green'
            theme: 'blue',

            // determines if input is readonly
            readOnly: true,

            // determines if display value has zero padding for hour value less than 10 (i.e. 05:30 PM); 24-hour format has padding by default
            hourPadding: false

        });
    </script>
    <script>
        function goBack() {
            window.history.back();
        }

        setTimeout(function () {
            $(".text-danger").slideUp(500);
        }, 20000);
    </script>

<NOSCRIPT>
    <p style="color: red; text-align: center; font-size: 18px">@lang('kidsnow.noscript')</p>
</NOSCRIPT>
</html>
