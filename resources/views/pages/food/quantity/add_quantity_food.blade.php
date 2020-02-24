@extends('master-layout')
@section('title')
@lang('kidsnow.quantity')
@endsection
@section('content')

<body>
    <section class="page-top container">
        <div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
            <div class="row">
                <ul class="ul-td" style="width:100%">
                    <li _ngcontent-c16="" class="level1"><a _ngcontent-c16="" href="kids-now">@lang('kidsnow.home')</a></li>
                    <li _ngcontent-c16="" class="active1"><a _ngcontent-c16="" href="kids-now/food">@lang('kidsnow.food')</a></li>
                    <li _ngcontent-c16="" class="level1"><a _ngcontent-c16="" href="kids-now/food/menu-quantity">@lang('kidsnow.quantity')</a></li>
                    <li _ngcontent-c16="" class="active1" style="pointer-events:none"><a _ngcontent-c16="" href="kids-now/food/menu-quantyti">@lang('kidsnow.add')</a></li>

                </ul>
            </div>
        </div>

        <div class="row">
            <div class="mat-card">
                <div class="mat-content">
                    <div class="panel">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                            incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                            ullamco
                            laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                    <div>
                        <p>@lang('kidsnow.add') @lang('kidsnow.quantity') *</p>
                        <form  style="width:auto;" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" style="text-transform:capitalize" name="name"  placeholder="@lang('kidsnow.add') @lang('kidsnow.quantity')" value="{{ old('name') }}">
                            @if($errors->has('name'))
                            <p style="font-size: 12px;font-weight: 100;color:red;font-style: italic;line-height: 25px">* {{ $errors->first('name') }}</p>
                          @endif
                        </div>
                        <button type="submit" class="btn btn-primary">@lang('kidsnow.save')</button>
                    </form>
                    </div>
                </div>
            </div>
           
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
