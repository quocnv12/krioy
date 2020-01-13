@extends('master-layout')
@section('title')
Food
@endsection
@section('content')

<body>
    <section class="page-top container">
        <div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
            <div class="row">
                <div class="col-md-6">
                    <ul class="ul-td">
                        <li _ngcontent-c16="" class="level1"><a href="kids-now">Home</a></li>
                        <li _ngcontent-c16="" class="active1" style="pointer-events:none"><a href="kids-now/food">Food</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div>
            @if(Session::has('thongbao'))
                <p style="font-size: 16px;font-weight: 100;color:red;font-style: italic;line-height: 25px;margin-top:20px">* {{ Session::get('thongbao') }}</p>
            @endif
             @if(Session::has('thongbao1'))
                <p style="font-size: 16px;font-weight: 100;color:red;font-style: italic;line-height: 25px;margin-top:20px">* {{ Session::get('thongbao1') }}</p>
            @endif
             @if(Session::has('thongbao2'))
                <p style="font-size: 16px;font-weight: 100;color:red;font-style: italic;line-height: 25px;margin-top:20px">* {{ Session::get('thongbao2') }}</p>
            @endif
             @if(Session::has('thongbao3'))
                <p style="font-size: 16px;font-weight: 100;color:red;font-style: italic;line-height: 25px;margin-top:20px">* {{ Session::get('thongbao3') }}</p>
            @endif
              @if(Session::has('thongbao4'))
                <p style="font-size: 16px;font-weight: 100;color:red;font-style: italic;line-height: 25px;margin-top:20px">* {{ Session::get('thongbao4') }}</p>
            @endif
        </div>
        <div class="row">
            <form method="post"  enctype="multipart/form-data" >
                @csrf
            <div class="mat-card" style="">
                <div class="mat-content">
                    <div class="row">
                        <a style="margin:5px 0px 13px 14px;width:100px;background:#5363d6;color:white" href="kids-now/food/menu-meal-type" class="btn btn-defaul">Meal Tpye</a>
                        <a style="margin:5px 0px 13px 14px;width:100px;background:#5363d6;color:white" href="kids-now/food/menu-quantity" class="btn btn-defaul">Quantity</a>
                        <a style="margin:5px 0px 13px 14px;width:100px;background:#5363d6;color:white" href="kids-now/food/menu-food-name" class="btn btn-defaul">Food Name</a>
                        <a style="margin:5px 0px 13px 14px;width:100px;background:#5363d6;color:white" href="kids-now/food/list" class="btn btn-defaul">Food</a>
                    </div>
                    
                    <button class="accordion" type="button">Programs</button>
                    <div class="panel">
                        <div _ngcontent-c20="" class="row" style="">
                            @foreach($programs as $item)
                            <div _ngcontent-c20="" align="center"
                                class="col-xs-6 col-sm-4 col-md-3 col-lg-2 ng-star-inserted"
                                style="padding:10px;cursor:pointer">
                                <button _ngcontent-c20="" class="btn progBtn limitText bgClass tablinks3"
                        title="{{ $item->program_name }}"  style="background-color:transparent;border:1px solid #5363d6;border-radius: 4px"
                                    type="button" value="{{ $item->id }}">{{ $item->program_name }}</button>
                            </div>
                            @endforeach
                            <input id="array_programsss" type="hidden" value="" name="programs">
                        </div>
                    </div>
                    <div class="update">
                        <p style="text-align:left;margin-top:12px" >Select Meal Type *</p>
                        <div class="tab">
                            @foreach ($mealtypes as $item)
                            <button value="{{ $item->id }}" style="margin:5px 19px;font-size:14px" type="button" data-id="lunch"
                                title="{{ $item->name }}"    class="tablinks">{{ $item->name }}</button>
                            @endforeach
                            <input id="array_program" type="hidden" value="" name="mealtype">

                        </div>
                    </div>
                    {{--  <div style="text-align:left" id="clock" style="margin: 20px 0;font-size: 18px;"></div>  --}}
                    <hr>
                    <div class="update"  style="text-align:left">
                        <p>Select Quantity *</p>
                        <div class="tab">
                            @foreach ($quantytifoods as $item)
                            <button type="button" style="margin:5px 19px;font-size:14px" value="{{ $item->id }}"
                                title="{{ $item->name }}"     class="tablinks2">{{ $item->name }}</button>
                            @endforeach
                            <input id="array_programs" type="hidden" value="" name="qtyfood">

                        </div>
                    </div>
                    <hr>
                    <button type="button" style="width:100%" class="accordion_new">Meal Item Name *
                        <i class="fa fa-chevron-circle-down"></i>
                    </button>
                    <div class="panel_new">
                        <div _ngcontent-c20="" class="row">
                            @foreach ($itemfoods as $item)
                            <div _ngcontent-c20="" align="center"
                                class="col-xs-6 col-sm-4 col-md-3 col-lg-2 ng-star-inserted"
                                style="padding:10px;cursor:pointer;">
                                <button _ngcontent-c20="" class="btn progBtn limitText bgClass tablinks1"
                                title="{{ $item->food_name }}"     value="{{ $item->id }}" type="button"
                                    style="background-color:transparent;border:1px solid #5363d6;border-radius: 4px;">{{ $item->food_name }}
                                </button>
                            </div>
                            @endforeach
                            <input id="array_programss" type="hidden" value="" name="food_name">
                        </div>
                    </div>
                    <div class="comment">
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
            </form>
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
    var array = [];
    $('.tablinks1').click(function (event) {
        if ($(this).prop('class') == 'btn progBtn limitText bgClass tablinks1 tablinks1_active') {
            $(this).removeClass('tablinks1_active');
            var program_pop = $(this).val();
            array.splice(array.indexOf(program_pop),1);
        } else {
            $(this).addClass('tablinks1_active');
            var program_push = $(this).val();
            array.push(program_push);
        }
        $('#array_programss').attr('value', array);
    });

</script>

<script type="text/javascript">
      $('.tablinks3').click(function (event) {
        $('.tablinks3').removeClass('tablinks_active');
        $(this).addClass('tablinks_active');
        var input = $(this).val();
        $('#array_programsss').attr('value', input);
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
{{--  <script type="text/javascript">
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

</script>  --}}

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
