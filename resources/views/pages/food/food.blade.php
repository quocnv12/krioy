@extends('master-layout')
@section('title')
Food
@endsection
@section('content')

<body onload="time()">

    <section class="page-top container">
        <div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
            <div class="row">
                <div class="col-md-6">
                    <ul class="ul-td">
                        <li _ngcontent-c16="" class="level1"><a _ngcontent-c16="">Home</a></li>
                        <li _ngcontent-c16="" class="active1" style="pointer-events:none"><a _ngcontent-c16="">Food</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <a style="" href="kids-now/food/menu-meal-type" class="btn btn-primary">Quản lý loại bữa ăn</a>
            </div>

            <div class="col-md-2">
                <a style="" href="kids-now/food/menu-quantity" class="btn btn-primary">Quản lý số lượng</a>
            </div>
            <div class="col-md-2">
                <a style="" href="kids-now/food/menu-food-name" class="btn btn-primary">Quản lý món ăn</a>
            </div>
        </div>
        <div class="row">
            {{-- <form style="width: auto;
                margin: 0 0;
                text-align: left" action="kids-now/children/add" method="post" name="form">
                @csrf --}}
            <div class="mat-card">
                <div class="mat-content">
                    <button class="accordion accordion1 clearfix">
                        <p style="float: left;">Programs *</p>
                        <a href="kids-now/children/select" style="float: right;text-align: right">
                            <p
                                style="color: #fff;border: 1px solid #ff4081;padding: 5px;margin: 5px 0;background: #ff4081;border-radius: 5px;text-decoration: none;">
                                SELECT</p>
                        </a>
                    </button>
                    <div class="panel">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                            incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                            ullamco
                            laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                    <hr>

                    <div class="update">
                        <p>Select Meal Type*</p>
                        <div class="tab">
                                @foreach ($mealtypes as $item)
                                    <button value="{{ $item->id }}"  style="margin:10px 0;" type="button" data-id="lunch" class="tablinks">{{ $item->name }}</button>
                                @endforeach
                            <input id="array_program" type="hidden" value="" name="mealtype">


                        </div>
                    </div>
                    <div id="clock" style="margin: 20px 0;font-size: 18px;"></div>
                    <hr>
                    <div class="update">
                        <p>Select Quantity</p>
                        <div class="tab">
                            @foreach ($quantytifoods as $item)
                                <button type="button" style="margin:10px 0;"  value="{{ $item->id }}"  class="tablinks2">{{ $item->name }}</button>
                            @endforeach
                            <input id="array_programs" type="hidden" value="" name="qtyfood">
                           
                        </div>
                    </div>
                    <hr>
                    <button class="accordion_new">Meal Item Name *
                        <i class="fa fa-chevron-circle-down"></i>
                    </button>
                    <div class="panel_new">
                        <div _ngcontent-c20="" class="row">
                            <!---->
                            @foreach ($itemfoods as $item)
                            <div _ngcontent-c20="" align="center"
                                class="col-xs-6 col-sm-4 col-md-3 col-lg-2 ng-star-inserted"
                                style="padding:10px;cursor:pointer;">
                                <button _ngcontent-c20="" class="btn progBtn limitText bgClass tablinks1"
                                    style="background-color:transparent;border:1px solid #5363d6;border-radius: 4px;">{{ $item->food_name }}
                                </button>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="comment">
                        {{-- <div class="row">
                                <div class="col-md-9 input_box">
                                    <span>Enter details here *</span>
                                    <input type="text" name="text" placeholder="Enter details here *">
                                </div>
                                <div class="col-md-3">
                                    <div class="input-file-container">
                                        <input class="input-file" type='file' onchange="readURL(this);"
                                            id="input-Incident" />
                                        <label tabindex="0" for="my-file" class="input-file-trigger">
                                            <i class="fa fa-paperclip"></i>
                                        </label>
                                        <div class="input-img">
                                            <img class="blah" src="images/150.png" alt="your  image" />
                                            <div class="top-right button-close button_close_show_img">
                                                <button style="border-radius:50%;width:26px;height:26px;z-index:1;">
                                                    <i class="fa fa-times-circle"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        <div class="button" style="text-align: center;">
                            <button>
                                <span>CANCEL</span>
                            </button>
                            <button class="button2">
                                <span>SEND</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- </form> --}}
        </div>
    </section>
</body>
@endsection
@section('js')
<script src="https://code.jquery.com/jquery.min.js"></script>

<!-- Bootstrap JS form CDN -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<!-- jQuery sticky menu -->
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.sticky.js"></script>

<!-- jQuery easing -->
<script src="js/jquery.easing.1.3.min.js"></script>

<!-- Main Script -->
<script src="js/main.js"></script>

<script type="text/javascript">
    //  var array = [];
    $('.tablinks').click(function (event) {
        $('.tablinks').removeClass('tablinks_active');
        $(this).addClass('tablinks_active');
        var input = $(this).val();
        $('#array_program').attr('value', input);
    });

</script>


<script type="text/javascript">
    $('.tablinks2').click(function (event) {
        $('.tablinks2').removeClass('tablinks_active');
        $(this).addClass('tablinks_active');
        var input = $(this).val();
        $('#array_programs').attr('value', input);
    });

</script>
<script type="text/javascript">
    $('.tablinks1').click(function (event) {
        if ($(this).prop('class') == 'btn progBtn limitText bgClass tablinks1 tablinks1_active') {
            $(this).removeClass('tablinks1_active');
        } else {
            $(this).addClass('tablinks1_active');
        }
    });

</script>
<script>
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function () {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
            }
        });
    }

</script>
<script type="text/javascript">
    $('button.accordion_new').click(function (event) {
        if ($(this).siblings('.panel_new').css('display') == 'block') {
            $(this).siblings('.panel_new').slideUp();
            $(this).children('i').prop('class', 'fa fa-chevron-circle-down');
        } else {
            $(this).siblings('.panel_new').slideDown();
            $(this).children('i').prop('class', 'fa fa-chevron-circle-up');
        }
    });

</script>
<script type="text/javascript">
    function time() {
        var today = new Date();
        var weekday = new Array(7);
        weekday[0] = "Sunday";
        weekday[1] = "Monday";
        weekday[2] = "Tuesday";
        weekday[3] = "Wednesday";
        weekday[4] = "Thursday";
        weekday[5] = "Friday";
        weekday[6] = "Saturday";
        var day = weekday[today.getDay()];
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!
        var yyyy = today.getFullYear();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        nowTime = h + ":" + m + ":" + s;
        if (dd < 10) {
            dd = '0' + dd
        }
        if (mm < 10) {
            mm = '0' + mm
        }
        today = day + ', ' + dd + '/' + mm + '/' + yyyy;

        tmp = '<span class="date">' + today + ' | ' + nowTime + '</span>';

        document.getElementById("clock").innerHTML = tmp;

        clocktime = setTimeout("time()", "1000", "JavaScript");

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }
    }

</script>

<!-- tab img -->
<script type="text/javascript">
    // click hiện img
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                var id_input = input.id;
                $('#' + id_input).siblings('.input-img').show();
                $('#' + id_input).siblings('.input-img').children('.blah').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    // button close
    $('.button_close_show_img').click(function (event) {
        $(this).parent('.input-img').hide();
    });

</script>
<script type="text/javascript">
    $('.input_box input').focus(function (event) {
        $(this).siblings('span').addClass('input_box_span_active');
    });
    $('.input_box input').blur(function (event) {
        if ($(this).val() == '') {
            $(this).siblings('span').removeClass('input_box_span_active');
        }
    });

</script>
@endsection
