@extends('master-layout')
@section('title')
@lang('kidsnow.foods')
@endsection
{{-- @section('css')
<link rel="stylesheet prefetch" href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

@endsection --}}
@section('content')
<style>
    /* label{
        margin-left: 20px;
        }
        #datepicker{
        width:180px; 
        margin: 0 20px 20px 20px;
        }
        #datepicker > span:hover{
        cursor: pointer;
        }
        #datepicker1{
        width:180px; 
        margin: 0 20px 20px 20px;
        }
        #datepicker1 > span:hover{
        cursor: pointer;
        } */
        </style>
<body>
    <section class="page-top container">
        <div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
            <div class="row">
                <div class="col-md-6">
                    <ul class="ul-td">
                        <li _ngcontent-c16="" class="level1"><a href="kids-now">@lang('kidsnow.home')</a></li>
                        <li _ngcontent-c16="" class="active1" style="pointer-events:none"><a href="kids-now/food">@lang('kidsnow.food')</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <form style="width: 100%;" method="post"  enctype="multipart/form-data" >
                @csrf
            <div class="mat-card" style="">
                <div class="mat-content">
                    <div class="row">
                        <a style="margin:5px 0px 13px 14px;min-width:110px;background:#5363d6;color:white"
                                href="kids-now/food/menu-meal-type" class="btn btn-defaul">@lang('kidsnow.meal_type')</a>
                            <a style="margin:5px 0px 13px 14px;min-width:110px;background:#5363d6;color:white"
                                href="kids-now/food/menu-quantity" class="btn btn-defaul">@lang('kidsnow.quantity')</a>
                            <a style="margin:5px 0px 13px 14px;min-width:110px;background:#5363d6;color:white"
                                href="kids-now/food/menu-food-name" class="btn btn-defaul">@lang('kidsnow.food_name')</a>
                            <a style="margin:5px 0px 13px 14px;min-width:110px;background:#5363d6;color:white"
                                href="kids-now/food/list" class="btn btn-defaul">@lang('kidsnow.food_list')</a>
                    </div>
                    <button class="accordion" title="Please chosse program" type="button">@lang('kidsnow.program_food')</button>
                    <div class="panel">
                        <div _ngcontent-c20="" class="row" style="">
                            @foreach($programs as $item)
                            <div _ngcontent-c20="" align="center"
                                class="col-xs-6 col-sm-4 col-md-3 col-lg-2 ng-star-inserted"
                                style="padding:10px;cursor:pointer">
                                <button _ngcontent-c20="" class="btn progBtn limitText bgClass tablinks3 {{ $item->id==$foods->id_program ? 'tablinks_active' : '' }}"
                        title="{{ $item->program_name }}" style="background-color:transparent;border:1px solid #5363d6;border-radius: 4px"
                                    type="button" value="{{ $item->id }}">{{ $item->program_name }}</button>
                            </div>
                            @endforeach
                        <input id="array_programsss" type="hidden" value="{{ $foods->id_program }}" name="programs">
                        </div>
                    </div>
                    <div class="update">
                        <p style="text-align:left;margin-top:12px" >@lang('kidsnow.select_meal_type') *</p>
                        <div class="tab">
                            @foreach ($mealtypes as $item)
                            <button value="{{ $item->id }}" style="margin:5px 26px 5px 42px;font-size:14px"   title="{{ $item->name }}" type="button" data-id="lunch"
                                class="tablinks {{ $item->id==$foods->meal_type ? 'tablinks_active' : '' }}">{{ $item->name }}</button>
                            @endforeach
                            <input id="array_program" type="hidden" value="{{ $foods->meal_type }}" name="mealtype">
                        </div>
                    </div>

                    <hr>
                        {{-- <div style="text-align:left" style="margin: 20px 0;font-size: 18px;">
                            <div class="row">
                                <div class="col-md-3">
                                    <p>@lang('kidsnow.date_begin'): </p>
                                    <div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy"> 
                                        <input class="form-control" style="color:#5363d6" name="date_begin" value="{{ carbon\carbon::parse($foods->date_begin)->format('d-m-Y') }}" type="text"> 
                                        <span class="input-group-addon"><i style="color:#5363d6" class="glyphicon glyphicon-calendar"></i></span> 
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <p>@lang('kidsnow.date_end'): </p>
                                    <div id="datepicker1" class="input-group date" data-date-format="dd-mm-yyyy"> 
                                    <input class="form-control" style="color:#5363d6" name="date_end" value="{{ carbon\carbon::parse($foods->date_end)->format('d-m-Y') }}" type="text"> 
                                        <span class="input-group-addon"><i style="color:#5363d6" class="glyphicon glyphicon-calendar"></i></span> 
                                    </div>
                                </div>
                            </div>
                        </div> 
                    <hr> --}}
                    <div class="update"  style="text-align:left">
                        <p>@lang('kidsnow.quantity') *</p>
                        <div class="tab">
                            @foreach ($quantytifoods as $item)
                            <button type="button"   title="{{ $item->name }}" style="margin:5px 26px 5px 42px;font-size:14px" value="{{ $item->id }}"
                                class="tablinks2 {{ $item->id==$foods->quantity ? 'tablinks_active' : '' }}">{{ $item->name }}</button>
                            @endforeach
                            <input id="array_programs" type="hidden" value="{{ $foods->quantity }}" name="qtyfood">

                        </div>
                    </div>
                    <hr>
                    <button type="button" style="width:100%" title="Please chosse food name" class="accordion_new">@lang('kidsnow.select_food_name') *
                        <i class="fa fa-chevron-circle-down"></i>
                    </button>
                    <div class="panel_new">
                        <div _ngcontent-c20="" class="row">
                            @foreach ($itemfoods as $item)
                            {{-- @dd($item->fooditems) --}}
                            <div _ngcontent-c20="" align="center"
                                class="col-xs-6 col-sm-4 col-md-3 col-lg-2 ng-star-inserted"
                                style="padding:10px;cursor:pointer;">
                                <button   title="{{ $item->food_name }}" _ngcontent-c20="" class="btn progBtn limitText bgClass tablinks1 {{ $foodItemName->contains($item->id) ? 'tablinks1_active' :'' }}"
                                    value="{{ $item->id }}" type="button"
                                    style="background-color:transparent;border:1px solid #5363d6;border-radius: 4px;">{{ $item->food_name }}
                                </button>
                            </div>
                            @endforeach
                        <input id="array_programss" type="hidden" value="{{ implode(',',$foodItemNames) }}" name="food_name">
                        
                        </div>
                    </div>
                    <div class="comment">
                        <div class="button" style="text-align: center;">
                           <a href="kids-now/food"> <button type="button">
                                <span>@lang('kidsnow.cancel')</span>
                            </button></a>
                            <button class="button2">
                                <span>@lang('kidsnow.save')</span>
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
    var array = $('#array_programss').val().split(',');
    $('.tablinks1').click(function (event) {
        if ($(this).hasClass('tablinks1_active')) { 
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


{{-- <!-- tab img -->
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

</script> --}}
{{-- <script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
    $(function () {  
        $("#datepicker").datepicker({         
            autoclose: true,         
            todayHighlight: true 
        }).val();
    });
    </script>
    <script type="text/javascript">
        $(function () {  
            $("#datepicker1").datepicker({ 
                autoclose: true,         
                todayHighlight: true 
            }).val();
        });
        </script> --}}
@endsection
