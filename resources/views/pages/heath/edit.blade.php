@extends('master-layout')
@section('title')
    Edit Health
@endsection

@section('content')
    <body onload="time()">

    <section class="page-top container">
        <div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
            <div class="row">
                <div class="col-sm-6">
                    <ul class="ul-td">
                        <li _ngcontent-c16="" class="level1"><a _ngcontent-c16="" href="{{route('admin.home')}}">HOME</a></li>
                        <li _ngcontent-c16="" class="active1" href="{{route('admin.health.list')}}"><a _ngcontent-c16="">HEALTH</a></li>
                        <li _ngcontent-c16="" class="active1 active-1" style="pointer-events:none" href=""><a _ngcontent-c16="">EDIT HEALTHh</a></li>
                    </ul>
                </div>
                <div class="col-sm-6">
                    <button class="notice" type="button" style="float: right">
                        <span><a href="{{route('admin.health.getDelete',['id'=>$health->id])}}" style="color: inherit; " onclick="return confirm('Delete ! Are you want to continue ?')">DELETE</a></span>
                    </button>
                </div>
            </div>
        </div>

        <div id="clock" name="time"></div>
        <div class="row" style="display: flex; justify-content: center">
            <a type="submit" class="btn btn-success" href="{{route('admin.health.list')}}" style="border: none;min-width: 110px;background: #eb87c1;color: white;float: right;font-weight: bold;" >@lang('kidsnow.health.list')</a>
        </div>
        @if ($errors->has('children_health'))
            <div class="alert alert-danger" style="text-align: center">
                {{ $errors->first('children_health') }}
            </div>
        @endif

        <form style="width: auto;margin: 0;text-align: center" action="{{route('admin.health.postEdit',['id'=>$health->id])}}" method="post" id="addObservation" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="mat-card" style="width: 100%">
                    <div class="mat-content">
                        <button class="accordion accordion1 clearfix" type="button">
                            <p style="float: left;">@lang('kidsnow.health.children') *</p>
                            {{--<form class="typeahead" role="search" style="float: right; text-align: left">--}}
                            {{--<input type="search" name="q" class="form-control search-input search-custom" placeholder="Search Children..." autocomplete="off" style="line-height: 1.6;font-size: 18px;border: 2px solid #ccc; padding: 0 5px; width: 200px;">--}}
                            {{--</form>--}}
                        </button>
                        <div class="row">
                            <div class="col-md-2 textera-img">
                                <a style="cursor: pointer;">
                                    <img src="{{$children_profiles->image ? $children_profiles->image : 'images/Child.png'}}" alt="" id="demo_image" style="height: 100px">
                                    <span _ngcontent-c10="" class="btnClass ng-star-inserted" style=""><i _ngcontent-c10="" aria-hidden="true" class="fa fa-camera"></i></span>
                                    @if ($errors->has('image'))
                                        <div class="text text-danger">
                                            {{ $errors->first('image') }}
                                        </div>
                                    @endif
                                </a>
                            </div>
                            <div class="col-md-10">
                                <div class="add a1 ">
                                    <div class="row">
                                        <div class="col-md-6 input_box">
                                            <span class="input_box_span_active">@lang('kidsnow.health.first_name') *</span>
                                            <input type="text" name="first_name" placeholder="@lang('kidsnow.health.first_name') *" value="{{$children_profiles->first_name}}" readonly>
                                            @if ($errors->has('first_name'))
                                                <div class="text text-danger">
                                                    {{ $errors->first('first_name') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6 input_box">
                                            <span class="input_box_span_active">@lang('kidsnow.health.last_name') *</span>
                                            <input type="text" name="last_name" placeholder="@lang('kidsnow.health.last_name') *" value="{{$children_profiles->last_name}}" readonly>
                                            @if ($errors->has('last_name'))
                                                <div class="text text-danger">
                                                    {{ $errors->first('last_name') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="add" style="width: 100%; margin: 15px 0">
                            <div class="row">
                                <div class="col-md-3 input_box">
                                    <span class="input_box_span_active">@lang('kidsnow.health.birthday') </span>
                                    <input type="date" name="birthday" placeholder="@lang('kidsnow.health.birthday')" value="{{$children_profiles->birthday}}" readonly>
                                    @if ($errors->has('birthday'))
                                        <div class="text text-danger">
                                            {{ $errors->first('birthday') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-3 input_box">
                                    <span class="input_box_span_active">@lang('kidsnow.health.unique_id') </span>
                                    <input type="text" name="unique_id" placeholder="@lang('kidsnow.health.unique_id') *" value="{{$children_profiles->unique_id}}" readonly>
                                    @if ($errors->has('unique_id'))
                                        <div class="text text-danger">
                                            {{ $errors->first('unique_id') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-3 input_box">
                                    <span class="input_box_span_active">@lang('kidsnow.health.gender')</span>
                                    <select name="gender" disabled>
                                        <option selected>@lang('kidsnow.health.gender')</option>
                                        <option value="1" @if($children_profiles->gender == 1) selected="selected" @endif>Nam</option>
                                        <option value="2" @if($children_profiles->gender == 2) selected="selected" @endif>Nữ</option>
                                    </select>
                                    @if ($errors->has('gender'))
                                        <div class="text text-danger">
                                            {{ $errors->first('gender') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-3 input_box">
                                    <span class="input_box_span_active">@lang('kidsnow.health.date_of_joining') </span>
                                    <input type="date" name="date_of_joining" placeholder="@lang('kidsnow.health.date_of_joining')" value="{{$children_profiles->date_of_joining}}" readonly>
                                    @if ($errors->has('date_of_joining'))
                                        <div class="text text-danger">
                                            {{ $errors->first('date_of_joining') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="update">
                        <p style="font-weight: bold; color: red">@lang('kidsnow.health.select_health_update_type') *</p>
                        <div class="tab">
                            <button type="button" class="tablinks" onclick="openCity(event, 'Sick')">@lang('kidsnow.health.sick')</button>
                            <button type="button" class="tablinks" onclick="openCity(event, 'Medicine')">@lang('kidsnow.health.medicine')</button>
                            <button type="button" class="tablinks" onclick="openCity(event, 'Growth')">@lang('kidsnow.health.growth')</button>
                            <button type="button" class="tablinks" onclick="openCity(event, 'Incident')">@lang('kidsnow.health.incident')</button>
                            <button type="button" class="tablinks" onclick="openCity(event, 'Blood_group')">@lang('kidsnow.health.blood_group')</button>
                        </div>

                        <div id="Sick" class="tabcontent ">
                            <div class="row">
                                <div class="col-md-11 input_box">
                                    <span class="input_box_span_active">@lang('kidsnow.health.sick_content') *</span>
                                    <input type="text" name="sick" placeholder="@lang('kidsnow.health.sick_content') " value="{{old('sick') ?? $health->sick}}">
                                </div>
                            </div>
                        </div>
                        <div id="Medicine" class="tabcontent">
                            <div class="row">
                                <div class="col-md-11 input_box">
                                    <span class="input_box_span_active">@lang('kidsnow.health.medicine_content') *</span>
                                    <input type="text" name="medicine" placeholder="@lang('kidsnow.health.medicine_content') " value="{{old('medicine') ?? $health->medicine}}">
                                </div>
                            </div>

                        </div>
                        <div id="Growth" class="tabcontent">
                            <div class="row growth">
                                <div class="col-md-4 growth_input input_box">
                                    <span>@lang('kidsnow.health.growth_height')</span>
                                    <input type="text" name="growth_height" placeholder="@lang('kidsnow.health.growth_height')" value="{{old('growth_height') ?? $health->growth_height}}">

                                    <label class="label">
                                        <div class="label-text">cm</div>
                                        <div class="toggle">
                                            <input class="toggle-state" type="checkbox" name="check" value="check" />
                                            <div class="toggle-inner">
                                                <div class="indicator"></div>
                                            </div>
                                            <div class="active-bg"></div>
                                        </div>
                                        <div class="label-text">inch</div>
                                    </label>
                                </div>
                                <div class="col-md-4 growth_input input_box">
                                    <span>@lang('kidsnow.health.growth_weight')</span>
                                    <input type="text" name="growth_weight" placeholder="@lang('kidsnow.health.growth_weight')" value="{{old('growth_weight') ?? $health->growth_weight}}">

                                    <label class="label">
                                        <div class="label-text">kg</div>
                                        <div class="toggle">
                                            <input class="toggle-state" type="checkbox" name="check" value="check" />
                                            <div class="toggle-inner">
                                                <div class="indicator"></div>
                                            </div>
                                            <div class="active-bg"></div>
                                        </div>
                                        <div class="label-text">lb</div>
                                    </label>
                                </div>
                                <div class="col-md-4 growth_input input_box">
                                    <span>@lang('kidsnow.health.growth_head_circumference')</span>
                                    <input type="text" name="growth_circumference" placeholder="@lang('kidsnow.health.growth_head_circumference')" value="{{old('growth_circumference') ?? $health->growth_circumference}}">
                                    <label class="label">
                                        <div class="label-text">cm</div>
                                        <div class="toggle">
                                            <input class="toggle-state" type="checkbox" name="check" value="check" />
                                            <div class="toggle-inner">
                                                <div class="indicator"></div>
                                            </div>
                                            <div class="active-bg"></div>
                                        </div>
                                        <div class="label-text">inch</div>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-11 input_box">
                                    <span class="input_box_span_active">@lang('kidsnow.health.growth_content') *</span>
                                    <input type="text" name="growth" placeholder="@lang('kidsnow.health.growth_content') " value="{{old('growth') ?? $health->growth}}">

                                </div>
                            </div>

                        </div>
                        <div id="Incident" class="tabcontent">
                            <div class="row">
                                <div class="col-md-11 input_box">
                                    <span class="input_box_span_active">@lang('kidsnow.health.incident_content') *</span>
                                    <input type="text" name="incident" placeholder="@lang('kidsnow.health.incident_content') " value="{{old('incident') ?? $health->incident}}">

                                </div>
                            </div>
                        </div>
                        <div id="Blood_group" class="tabcontent">
                            <div class="row">
                                <div class="col-md-11 input_box">
                                    <span class="input_box_span_active">@lang('kidsnow.health.blood_group_content') *</span>
                                    <input type="text" name="blood_group" placeholder="@lang('kidsnow.health.blood_group_content') " value="{{old('blood_group') ?? $health->blood_group}}">

                                </div>
                            </div>
                        </div>
                        <div class="input-file-container" style="float: right">
                            <input type="file" id="file" name="clip_board[]" multiple="multiple" value="{{old('clip_board')}}" accept=
                            ".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf">
                            <label tabindex="0" for="my-file" id="button_file" class="input-file-trigger">
                                <i class="fa fa-paperclip"></i>
                            </label>
                        </div>
                    </div><br>
                    <div class="col-md-12" style="color: red;padding: 0; margin-top: 50px; display: flex; justify-content: flex-start; text-align: left ">
                        <p id="show_clip_board"></p>

                        @if ($errors->has('clip_board'))
                            <div class="text text-danger">
                                {{ $errors->first('clip_board') }}
                            </div>
                        @endif
                    </div>
                    <hr>
                    <div class="">
                        @foreach(explode('/*endfile*/',$health->clip_board) as $clipboard)
                            <div class="row" style="margin-top: 5px;">
                                <div class="col-md-9" style="text-align: left; float: left">
                                    <a href="kids-now/health/clip_board/{{$health->id}}/{{$clipboard}}" target="_blank">{{Str::limit($clipboard,70)}}</a>
                                </div>
                                <div class="col-md-2">
                                    @if($clipboard)<a href="kids-now/health/delete_clipboard/{{$health->id}}/{{$clipboard}}" style="color: inherit"><button type="button" class="btn btn-sm btn-danger" onclick="return confirm('Are you want to delete this file ?')">Delete</button></a>@endif
                                </div>
                            </div>
                        @endforeach
                        <br>
                    </div>
                    <a class="btn btn-success" style="float: right" href="{{route('admin.health.export',['id'=>$health->id])}}">@lang('kidsnow.health.excel')</a>

                </div>
            </div>
            <div class="button" style="text-align: center;">
                <button type="reset" onclick="goBack()">
                    <span>CANCEL</span>
                </button>
                <button class="button2" id="submit_button" type="submit">
                    <span>SAVE</span>
                </button>
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
    <script src="asset/kriyo/js/owl.carousel.min.js"></script>
    <script src="asset/kriyo/js/jquery.sticky.js"></script>

    <!-- jQuery easing -->
    <script src="asset/kriyo/js/jquery.easing.1.3.min.js"></script>

    <!-- Main Script -->
    <script src="asset/kriyo/js/main.js"></script>
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
        function time() {
            var today = new Date();
            var weekday=new Array(7);
            weekday[0]="Sunday";
            weekday[1]="Monday";
            weekday[2]="Tuesday";
            weekday[3]="Wednesday";
            weekday[4]="Thursday";
            weekday[5]="Friday";
            weekday[6]="Saturday";
            var day = weekday[today.getDay()];
            var dd = today.getDate();
            var mm = today.getMonth()+1; //January is 0!
            var yyyy = today.getFullYear();
            var h=today.getHours();
            var m=today.getMinutes();
            var s=today.getSeconds();
            m=checkTime(m);
            s=checkTime(s);
            nowTime = h+":"+m+":"+s;
            if(dd<10){dd='0'+dd} if(mm<10){mm='0'+mm} today = day+', '+ dd+'/'+mm+'/'+yyyy;
            tmp='<span class="date">'+today+' | '+nowTime+'</span>';
            document.getElementById("clock").innerHTML=tmp;
            clocktime=setTimeout("time()","1000","JavaScript");
            function checkTime(i)
            {
                if(i<10){
                    i="0" + i;
                }
                return i;
            }
        }
    </script>
    <!-- click menu duoi -->
    <script>
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }
        // Get the element with id="defaultOpen" and click on it
        // document.getElementById("defaultOpen").click();
    </script>
    <script type="text/javascript">
        $('.tablinks').click(function(event) {
            $('.tablinks').removeClass('tablinks_active');
            $(this).addClass('tablinks_active');
        });
    </script>

    <!-- input file -->
    <script type="text/javascript">
        // click hiện img
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    var id_input = input.id;
                    $('#'+id_input).siblings('.input-img').show();
                    $('#'+id_input).siblings('.input-img').children('.blah').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        // button close
        $('.button_close_show_img').click(function(event) {
            $(this).parent('.input-img').hide();
        });

        //clip board
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
        //end clipboard
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
    </script>
    <script>
        $(document).ready(function () {
            $('.accordion').click();
        })
    </script>
    <script type="text/javascript">
        var array_observation = [];
        $('.tablinks1').click(function(event) {
            if ($(this).prop('class')=='btn progBtn limitText bgClass tablinks1 tablinks1_active') {
                $(this).removeClass('tablinks1_active');
                var observation_pop = $(this).val();
                array_observation.splice( array_observation.indexOf(observation_pop), 1 );
            }else{
                $(this).addClass('tablinks1_active');
                var observation_push = $(this).val();
                array_observation.push(observation_push);
            }
            console.log(array_observation);
        });

        //begin select children
        var array_children = [];

        function deleteChild(id_children) {
            array_children.splice( array_children.indexOf(id_children), 1 );
            console.log('array children sau khi xoa: '+array_children)
        }

        function getIdChildren(id){
            $.ajax({
                type: 'get',
                url: '{{ URL::to('kids-now/observations/select_child/add') }}',
                data: {
                    'id_children' : id
                },
                success: function(data){
                    if (! array_children.includes(id)){
                        $('#children_list').append(data);
                        array_children.push(id);
                        console.log('id children them vao:'+id)
                        console.log('day la array children khi them:'+array_children);
                    }else {
                        alert('children exists')
                    }
                }
            });
        }
        //end select children

        //begin select children_observation
        var array = [];
        $('.div_box_children').children('div').children('i').hide()

        $('.div_box_children').click(function () {
            if ($(this).children('div').children('i').hasClass('checked')){
                ($(this).children('div').children('i').removeClass('checked'))
                $(this).children('div').children('i').hide()
                var observation_pop = $(this).children('div').children('input').val();
                array.splice( array.indexOf(observation_pop), 1 );

            }else {
                $(this).children('div').children('i').addClass('checked')
                $(this).children('div').children('i').show()
                var observation_push = $(this).children('div').children('input').val();
                array.push(observation_push);
            }
            $('#array_children_health').attr('value',array);
            console.log(array_children_health)
        })
        //end select children_observation
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


    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function($) {
            var engine1 = new Bloodhound({
                remote: {
                    url: 'http://localhost:8000/kids-now/health/search/children?q=%QUERY%',
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
    <script>
        // $("#uploadfile").hide();
        // $("#demo_image").click(function () {
        // 	$("#uploadfile").click();
        // });
    </script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#demo_image').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#uploadfile").change(function(){
            readURL(this);
        });
    </script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
@endsection
