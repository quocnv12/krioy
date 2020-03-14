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
                        <li _ngcontent-c16="" class="active1" style="pointer-events:none"><a
                                href="kids-now/food">@lang('kidsnow.food')</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    
        <div class="row">
            <form method="post" action="kids-now/food"  enctype="multipart/form-data" style="width: 100%;">
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
                            {{-- <a style="margin:5px 0px 13px 14px;min-width:110px;background:#5363d6;color:white"
                                href="kids-now/food/list" class="btn btn-defaul">@lang('kidsnow.food_list')</a> --}}
                            {{--<a style="margin:5px 0px 13px 14px;min-width:110px;background:#5363d6;color:white"--}}
                                {{--href="kids-now/food/list" class="btn btn-defaul">@lang('kidsnow.food_list')</a>--}}
                        </div>

                        <button class="accordion accordion1 clearfix" style="margin-bottom:10px" type="button">
							<p style="float: left;">@lang('kidsnow.observations.children') </p>
								{{--<form class="typeahead" role="search" style="float: right; text-align: left">--}}
									{{--<input type="search" name="q" class="form-control search-input search-custom" placeholder="Search Children..." autocomplete="off" style="line-height: 1.6;font-size: 18px;border: 2px solid #ccc; padding: 0 5px; width: 200px;">--}}
								{{--</form>--}}
							<a class="btn btn-success" id="tick_all_children" type="button" style="float: right; background-color: #CC263F">Chọn tất cả</a>
						</button>
                        <div class="scrollmenu-div">
                            @foreach($programs as $program)
                                <div class="scrollmenu-button" style="text-align: center;">
                                    <button class="limitText" type="button" style="background: #5363d6;padding: 5px;border: none;border-radius: 5px;margin: 5px;min-width: 120px;text-align: center;">
                                        <a style="color: #fff ;margin: 0;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;width: 150px;display: block;" href="kids-now/food/show/{{$program->id}}" title="{{$program->program_name}}">{{$program->program_name}}</a>
                                    </button>
                                </div>
                            @endforeach
                                <input type="hidden" name="id_program" value="{{$id_program ?? ''}}">
                        </div>
                        <div class="row">
                            @if(isset($children_profiles))
								@if(count($children_profiles) > 0)
									@foreach($children_profiles as $children)
										<div class="div_box_children col-lg-2 col-md-2 col-sm-2 col-xs-6 ng-star-inserted" style="padding:10px;cursor:pointer;">
											<div type="button" data-toggle="modal" data-target=".bd-example-modal-sm" style="height: 120px;text-align: center;-webkit-appearance: none;">
												<img class="img-circle" height="80" onerror="this.src='images/Child.png';" width="80" src="images/Child.png">
                                                <i _ngcontent-c9="" aria-hidden="true" class="fa fa-check" id="checked" style="display: block;top:10px"></i>
                                                <span class="limitText ng-star-inserted" style="color:#5363d6;;margin: 0px;display: block;">{{$children->first_name}} {{$children->last_name}}</span>
												<input type="hidden" value="{{$children->id}}">
											</div>
										</div>
									@endforeach
								@else
									<div style="font-weight: bold; margin: 50px">@lang('kidsnow.observations.no_found')</div>
								@endif
                                <input id="array_children_observation" type="hidden" value="" name="children_food">
							@else
								<div style="margin: 50px;">
									<span style="color: red; font-weight: bold">@lang('kidsnow.observations.hint') :</span>
									<span>@lang('kidsnow.observations.hint_content')</span>
								</div>
                            @endif
                        </div>
                        {{-- <button class="accordion" type="button">@lang('kidsnow.program_food') *</button>
                        <div class="panel">
                            <div _ngcontent-c20="" class="row" style="">
                                @foreach($programs as $item)
                                <div _ngcontent-c20="" align="center"
                                    class="col-xs-6 col-sm-4 col-md-3 col-lg-2 ng-star-inserted"
                                    style="padding:10px;cursor:pointer;width: 50%;">
                                    <button _ngcontent-c20="" class="btn progBtn limitText bgClass tablinks3"
                                        title="{{ $item->program_name }}"
                                        style="background-color:transparent;border:1px solid #5363d6;border-radius: 4px"
                                        type="button" value="{{ $item->id }}">{{ $item->program_name }}</button>
                                </div>
                                @endforeach
                                <input id="array_programsss" type="hidden" value="" name="programs">
                            </div>
                        </div> --}}
                        <hr>
                        <div class="update">
                            <p style="text-align:left;margin-top:12px">@lang('kidsnow.select_meal_type') *</p>
                            <div class="tab">
                                @foreach ($mealtypes as $item)
                                <button value="{{ $item->id }}" style="margin:5px 19px;font-size:14px" type="button"
                                    data-id="lunch" title="{{ $item->name }}"
                                    class="tablinks">{{ $item->name }}</button>
                                @endforeach
                                <input id="array_program" type="hidden" value="" name="mealtype">

                            </div>
                        </div>
                        {{-- <hr>
                         <div style="text-align:left" style="margin: 20px 0;font-size: 18px;">
                            <div class="row">
                                <div class="col-md-3">
                                    <p>@lang('kidsnow.date_begin'): </p>
                                    <div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy"> 
                                        <input style="color:#5363d6" class="form-control" name="date_begin" type="text"> 
                                        <span class="input-group-addon"><i style="color:#5363d6" class="glyphicon glyphicon-calendar"></i></span> 
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <p>@lang('kidsnow.date_end'): </p>
                                    <div id="datepicker1" class="input-group date" data-date-format="dd-mm-yyyy"> 
                                        <input style="color:#5363d6" class="form-control" name="date_end" type="text"> 
                                        <span class="input-group-addon"><i style="color:#5363d6" class="glyphicon glyphicon-calendar"></i></span> 
                                    </div>
                                </div>
                            </div>
                        </div>  --}}
                        <hr>
                        <div class="update" style="text-align:left">
                            <p>@lang('kidsnow.select_quantity') *</p>
                            <div class="tab">
                                @foreach ($quantytifoods as $item)
                                <button type="button" style="margin:5px 19px;font-size:14px" value="{{ $item->id }}"
                                    title="{{ $item->name }}" class="tablinks2">{{ $item->name }}</button>
                                @endforeach
                                <input id="array_programs" type="hidden" value="" name="qtyfood">

                            </div>
                        </div>
                        <hr>
                        <button type="button" style="width:100%" class="accordion_new">@lang('kidsnow.select_food_name') *
                            <i class="fa fa-chevron-circle-down"></i>
                        </button>
                        <div class="panel_new">
                            <div _ngcontent-c20="" class="row">
                                @foreach ($itemfoods as $item)
                                <div align="center" class="col-xs-6 col-sm-6 col-md-2 col-lg-3 ng-star-inserted"
                                    style="padding:10px;cursor:pointer;width: 50%;">
                                    <button _ngcontent-c20="" class="btn progBtn limitText bgClass tablinks1"
                                        title="{{ $item->food_name }}" value="{{ $item->id }}" type="button"
                                        style="background-color:transparent;border:1px solid #5363d6;border-radius: 4px;width: 100%">{{ $item->food_name }}
                                    </button>
                                </div>
                                @endforeach
                                <input id="array_programss" type="hidden" value="" name="food_name">
                            </div>
                        </div>
                        <div class="comment">
                            <div class="button" style="text-align: center;">
                              <a href="kids-now/food">  <button type="button">
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
    var array = [];
    $('.tablinks1').click(function (event) {
        if ($(this).prop('class') == 'btn progBtn limitText bgClass tablinks1 tablinks1_active') {
            $(this).removeClass('tablinks1_active');
            var program_pop = $(this).val();
            array.splice(array.indexOf(program_pop), 1);
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

<!-- tab img -->
{{-- <script type="text/javascript">
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

</script> --}}
{{-- <script type="text/javascript">
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
        }).datepicker('update', new Date());
    });
    </script>
    <script type="text/javascript">
        $(function () {  
            $("#datepicker1").datepicker({ 
                autoclose: true,         
                todayHighlight: true          
            }).datepicker('update', new Date());
        });
        </script> --}}
        <script>
            var acc = document.getElementsByClassName("accordion");
            var i;
    
            for (i = 0; i < acc.length; i++) {
              acc[i].addEventListener("click", function() {
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
            // var array_observation = [];
            // $('.tablinks1').click(function(event) {
            //     if ($(this).prop('class')=='btn progBtn limitText bgClass tablinks1 tablinks1_active') {
            //         $(this).removeClass('tablinks1_active');
            //         var observation_pop = $(this).val();
            //         array_observation.splice( array_observation.indexOf(observation_pop), 1 );
            //     }else{
            //         $(this).addClass('tablinks1_active');
            //         var observation_push = $(this).val();
            //         array_observation.push(observation_push);
            //     }
            // });
    
            //begin select children
            // var array_children = [];
    
            // function deleteChild(id_children) {
            //     array_children.splice( array_children.indexOf(id_children), 1 );
            // }
    
            // function getIdChildren(id){
            //     $.ajax({
            //         type: 'get',
            //         url: '{{ URL::to('kids-now/observations/select_child/add') }}',
            //         data: {
            //             'id_children' : id
            //         },
            //         success: function(data){
            //             if (! array_children.includes(id)){
            //                 $('#children_list').append(data);
            //                 array_children.push(id);
            //             }else {
            //                 alert('children exists')
            //             }
            //         }
            //     });
            // }
            //end select children
    
            //begin select children_observation
            var array_children_observation = [];
            $('.div_box_children').children('div').children('i').hide()
    
            $('.div_box_children').click(function () {
                if ($(this).children('div').children('i').hasClass('checked')){
                    ($(this).children('div').children('i').removeClass('checked'))
                    $(this).children('div').children('i').hide()
                    var observation_pop = $(this).children('div').children('input').val();
                    array_children_observation.splice( array_children_observation.indexOf(observation_pop), 1 );
                    console.log(array_children_observation)
                }else {
                    $(this).children('div').children('i').addClass('checked')
                    $(this).children('div').children('i').show()
                    var observation_push = $(this).children('div').children('input').val();
                    array_children_observation.push(observation_push);
                    console.log(array_children_observation)
                }
                $('#array_children_observation').attr('value', array_children_observation);
            })
            //end select children_observation
    
            //tick all children
            $('#tick_all_children').click(function () {
                if ($('.div_box_children').children('div').children('i').hasClass('checked')){
                    ($('.div_box_children').children('div').children('i').removeClass('checked'))
                    $('.div_box_children').children('div').children('i').hide()
                    array_children_observation = [];
    
                    console.log(array_children_observation)
                }else {
                    $('.div_box_children').children('div').children('i').addClass('checked')
                    $('.div_box_children').children('div').children('i').show()
                    array_children_observation = $('.div_box_children').children('div').children('input').map(function() {
                        return $(this).val();
                    }).toArray();
    
                    console.log(array_children_observation)
                }
                $('#array_children_observation').attr('value', array_children_observation);
            })
            //end tick all children
    
            var button = document.getElementById("submit_button");

            
            button.onclick = function(){
                $('#array_all_children').attr('value', array_children);
                $('#array_observation').attr('value', array_observation);
                $('#array_children_observation').attr('value', array_children_observation);
            }

            
        </script>


        <script type="text/javascript">
            $('.input_box input').focus(function(event) {
                $(this).siblings('span').addClass('input_box_span_active');
            });
            $('.input_box input').blur(function(event) {
                if ($(this).val()=='') {
                      $(this).siblings('span').removeClass('input_box_span_active');
                }
            });
    
            //begin clip-board
            var input_file = $("#file");
            input_file.on("change", function () {
                var files = input_file.prop("files")
                if ($('#file').val() != null){
                    $('#show_clip_board').html('');
                }
                var names = $.map(files, function (val) {
                    return val.name;
                });
                $.each(names, function (i, name) {
                    $('#show_clip_board').append(name+'<br>');
                });
            });
    
            $('#file').hide();
            $('#image').hide();
            $('#button_file').click(function () {
                $('#file').click();
            })
            $('#button_image').click(function () {
                $('#image').click();
            })
            //finish clip-board
        </script>
    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function($) {
                var engine1 = new Bloodhound({
                    remote: {
                        url: 'http://localhost:8000/kids-now/observations/search/children?q=%QUERY%',
                        wildcard: '%QUERY%'
                    },
                    datumTokenizer: Bloodhound.tokenizers.whitespace('q'),
                    queryTokenizer: Bloodhound.tokenizers.whitespace
                });
    
                $(".search-input").typeahead({
                    hint: true,
                    highlight: true,
                    minLength: 1
                }, [
                    {
                        source: engine1.ttAdapter(),
                        name: 'children_profiles',
                        display: function(data) {
                            return data.name;
                        },
                        templates: {
                            empty: [
                                '<div class="list-group search-results-dropdown" style="padding: 10px; margin: 0;background-color:#EAEDED;color: #424949;width: 500px;"><div class="list-group-item">Nothing found.</div></div>'
                            ],
                            header: [
    
                            ],
                            suggestion: function (data) {
                                return '<a onclick="getIdChildren('+data.id+')" class="list-group-item" style="padding: 10px; margin: 0;background-color:#EAEDED;color: #424949;padding: 10px; margin: 0;color: #424949;width: 500px;"> ' + data.first_name +' '+ data.last_name + '<i class="fa fa-plus" style="height: 10px; float: right !important;"></i>'+'</a>';
                            }
                        }
                    },
                ]);
            });
        </script>
        <script>
            $(document).ready(function () {
                $('.accordion').click();
            })
        </script>
        <script src="libs/slick-1.8.1/slick/slick.js"></script>
        <script type="text/javascript">
            $('.scrollmenu-div').slick({
                infinite: true,
                slidesToShow: 6,
                slidesToScroll: 1,
                autoplay: false,
                autoplaySpeed: 2000,
                responsive: [{
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                    {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
                            autoplay: true,
                            arrows:false,
                        }
                    },
                    {
                        breakpoint: 500,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                            autoplay: true,
                            arrows:false,
                        }
                    }]
            });
        </script>
@endsection
