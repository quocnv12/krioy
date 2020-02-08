@extends('master-layout')
@section('title')
    Observations
@endsection

@section('content')

    <body>
    <section class="page-top container">
        <div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
            <div class="row">
                <div class="col-sm-6">
                    <ul class="ul-td">
                        <li class="level1"><a href="kids-now">Home</a></li>
                        <li class="active1" style="" ><a href="kids-now/observations/list">OBSERVATIONS</a></li>
                        <li class="active1 active-1" style="pointer-events: none" ><a href="">EDIT OBSERVATION</a></li>
                    </ul>
                </div>
                <div class="col-sm-6" style="display: flex; justify-content: flex-end">
                    <button class="notice" type="button" >
                        <span><a href="kids-now/observations/delete/{{$child_observation->id}}" style="color: inherit; " onclick="return deleteConfirm()" >DELETE</a></span>
                    </button>
                </div>

            </div>
        </div>
        @if(session('notify'))
            <div class="alert alert-success font-weight-bold">
                {{session('notify')}}
            </div>
        @endif
        <form style="width: auto;margin: 0;text-align: center" action="{{route('admin.observations.postEdit',['id'=>$child_observation->id])}}" method="post" id="editObservation" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="mat-card" style="width: 100%">
                    <div class="mat-content">
                        <a style="min-width:110px;background:#eb87c1;color:white; float: left;font-weight: bold" href="{{route('admin.observations.listobservationtype')}}" class="btn btn-default">OBSERVATION TYPES</a>
                        <a style="min-width:110px;background:#eb87c1;color:white; float: right; border: none;font-weight: bold" href="{{route('admin.observations.list')}}" class="btn btn-success" >CHILDREN LIST</a>

                        <div style="font-weight: bold; font-size: 20px">
                            Seminar: {{$child_observation->month}} - {{$child_observation->year}}
                        </div>
                        <div style="font-weight: bold; font-size: 16px; color: red">
                            Observer : {{$child_observation->observer}}
                        </div>
                        <button class="accordion accordion1 clearfix" type="button">
                            <p style="float: left;">Children *</p>
                        </button>
                    </div>
                    <div class="mat-content">
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
                                            <span class="input_box_span_active">First Name *</span>
                                            <input type="text" name="first_name" placeholder="First Name *" value="{{$children_profiles->first_name}}" readonly>
                                            @if ($errors->has('first_name'))
                                                <div class="text text-danger">
                                                    {{ $errors->first('first_name') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6 input_box">
                                            <span class="input_box_span_active">Last Name *</span>
                                            <input type="text" name="last_name" placeholder="Last Name *" value="{{$children_profiles->last_name}}" readonly>
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
                        <hr style="margin: 0;">
                        <div class="add" style="width: 100%; margin: 15px 0">
                            <div class="row">
                                <div class="col-md-3 input_box">
                                    <span class="input_box_span_active">Birthday </span>
                                    <input type="date" name="birthday" placeholder="Birthday" value="{{$children_profiles->birthday}}" readonly>
                                    @if ($errors->has('birthday'))
                                        <div class="text text-danger">
                                            {{ $errors->first('birthday') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-3 input_box">
                                    <span class="input_box_span_active">Unique ID </span>
                                    <input type="text" name="unique_id" placeholder="Unique ID *" value="{{$children_profiles->unique_id}}" readonly>
                                    @if ($errors->has('unique_id'))
                                        <div class="text text-danger">
                                            {{ $errors->first('unique_id') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-3 input_box">
                                    <span class="input_box_span_active">Gender</span>
                                    <select name="gender" disabled>
                                        <option selected>Gender</option>
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
                                    <span class="input_box_span_active">Date of Joining </span>
                                    <input type="date" name="date_of_joining" placeholder="Date of Joining" value="{{$children_profiles->date_of_joining}}" readonly>
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
                    <div class="mat-content">
                        <button class="accordion" type="button">Observation Type</button>
                        <div class="panel">
                            <div _ngcontent-c20="" class="row" style="">
                                @foreach($observationtype  as $observation)
                                    <div _ngcontent-c20="" align="center" class="col-lg-2 col-md-2 col-sm-2 col-xs-4 ng-star-inserted" style="padding:10px;cursor:pointer;">
                                        <button type="button" _ngcontent-c20="" class="btn progBtn limitText bgClass tablinks1 @if(in_array($observation->id, $array_observation_choose)) tablinks1_active @endif" style="background-color:transparent;border:1px solid #5363d6;border-radius: 4px" data-toggle="tooltip" title="{{$observation->name}}" value="{{$observation->id}}">{{$observation->name}} </button>
                                    </div>
                                @endforeach
                                    <input id="array_observation_new" type="hidden" value="" name="observation_new">
                                    <input id="array_observation_old" type="hidden" name="observation_old" value="{{implode(',',$array_observation_choose)}}">
                            </div>
                        </div>
                    </div>
                    <div class="comment">
                        <div class="row">
                            <div class="col-md-11 input_box">
                                <span>Enter Details here *</span>
                                <input type="text" name="detailObservation" placeholder="Enter Details here *">
                            </div>
                            <div class="col-md-1">
                                <div class="zoom">
                                    <a _ngcontent-c9="" class="zoom-fab zoom-btn-large fa fa-paperclip" id="button_file" style="font-size: 30px;cursor: pointer"></a>
                                    {{--<a _ngcontent-c9="" class="zoom-fab zoom-btn-large fa fa-image" id="button_image" style="font-size: 30px;cursor: pointer"></a>--}}
                                    <input type="file" id="file" name="clip_board[]" multiple="multiple" value="{{old('clip_board')}}" accept=
                                    ".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf">
                                </div>
                            </div>
                            <div class="col-md-12" style="color: blue; margin-top: 50px; display: flex; justify-content: flex-start; ">
                                <p id="show_clip_board"></p>

                                @if ($errors->has('clip_board'))
                                    <div class="text text-danger">
                                        {{ $errors->first('clip_board') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="">
                            @if(session('notify_clipboard'))
                                <div class="alert alert-success">
                                    {{session('notify_clipboard')}}
                                </div>
                            @endif
                            @foreach(explode('/*endfile*/',$child_observation->clip_board) as $clipboard)
                                <div class="row" style="margin-top: 5px">
                                    <div class="col-md-10" style="text-align: left">
                                        <a href="kids-now/observations/clip_board/{{$child_observation->id}}/{{$clipboard}}" target="_blank">{{Str::limit($clipboard,70)}}</a>
                                    </div>
                                    <div class="col-md-2">
                                        @if($clipboard)<a href="kids-now/observations/delete_clipboard/{{$child_observation->id}}/{{$clipboard}}" style="color: inherit"><button type="button" class="btn btn-sm btn-danger" onclick="return confirm('Are you want to delete this file ?')">Delete</button></a>@endif
                                    </div>
                                </div>
                            @endforeach
                            <br>
                        </div>
                        <div class="button" style="text-align: center;">
                            <button type="reset">
                                <span>CANCEL</span>
                            </button>
                            <button class="button2" id="submit_button" type="submit">
                                <span>SAVE</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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
        var array_observation = $('#array_observation_old').val().split(',');

        $('.tablinks1').click(function(event) {
            if ($(this).hasClass('tablinks1_active')) {
                $(this).removeClass('tablinks1_active');
                var observation_pop = $(this).val();
                array_observation.splice( array_observation.indexOf(observation_pop), 1 );
            }else{
                $(this).addClass('tablinks1_active');
                var observation_push = $(this).val();
                array_observation.push(observation_push);
            }
        });

        //begin select children
        var array_children = [];

        function deleteChild(id_children) {
            array_children.splice( array_children.indexOf(id_children), 1 );
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
                    }else {
                        alert('children exists')
                    }
                }
            });
        }
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

            }else {
                $(this).children('div').children('i').addClass('checked')
                $(this).children('div').children('i').show()
                var observation_push = $(this).children('div').children('input').val();
                array_children_observation.push(observation_push);
            }
        })
        //end select children_observation
        var button = document.getElementById("submit_button");
        button.onclick = function(){
            // alert("Thông tin đã lưu thành công!!!");
            $('#array_all_children').attr('value', array_children);
            $('#array_observation_new').attr('value', array_observation);
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
            var names = $.map(files, function (val) { return val.name; });
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

        function deleteConfirm() {
            return confirm("Are you want to delete ?");
        }
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
@endsection
