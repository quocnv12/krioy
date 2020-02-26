@extends('master-layout')
@section('title')
	EDIT NOTICE
@endsection

@section('content')
    <style>
        .text-danger{
            display: flex;
            justify-content: flex-start;
        }
    </style>
    <body>
    <section class="page-top container">
        <div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
            <div class="row">
                <div class="col-lg-10 col-md-10 col-sm-10">
                    <ul class="ul-td">
                        <li class="level1"><a href="{{route('admin.home')}}">HOME</a></li>
                        <li class="active1"><a href="{{route('admin.notice-board.index')}}">NOTICE BOARD</a></li>
                        <li class="active1 active-1" style="pointer-events:none;"><a href="">EDIT NOTICE</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2" data-toggle="modal" data-target=".bd-example-modal-sm" style="display: flex; justify-content: flex-end;">
                    <button class="notice" type="button" style="cursor: pointer">
                        <span><a href="{{route('admin.notice-board.destroy',['id'=>$notice_board->id])}}" style="color: inherit; " onclick="return deleteConfirm()" >DELETE</a></span>
                    </button>
                </div>
            </div>
        </div>
        <form action="{{route('admin.notice-board.update',['id'=>$notice_board->id])}}" method="post" enctype="multipart/form-data" style="width: 100%">
            @csrf
            <div class="mat-card">
                <div class="mat-content">
                    <button class="accordion" type="button">@lang('kidsnow.notice.programs')</button>
                    <div class="panel">
                        <div _ngcontent-c20="" class="row">
                            <!---->
                            <!---->
                            @foreach($programs as $program)
                                <div _ngcontent-c20="" align="center" class="col-xs-6 col-sm-4 col-md-3 col-lg-3 ng-star-inserted" style="padding:10px;cursor:pointer">
                                    <button _ngcontent-c20="" class="btn progBtn limitText bgClass tablinks1 @if(in_array($program->id, $array_programs_choose)) tablinks1_active @endif" style="background-color: transparent; border:1px solid #5363d6;border-radius: 4px; width: 100%" type="button" data-toggle="tooltip" title="{{$program->program_name}}" value="{{$program->id}}">{{$program->program_name}}</button>
                                </div>
                            @endforeach
                            <input id="array_programs_new" type="hidden" value="" name="programs_new">
                            <input id="array_programs_old" type="hidden" name="programs_old" value="{{implode(',',$array_programs_choose)}}">
                        </div>
                        @if ($errors->has('programs_old'))
                            <div class="text text-danger">
                                {{ $errors->first('programs_old') }}
                            </div>
                        @endif
                    </div>
                    <div class="add">
                        <div class="input_box" style="width: 100%;">
                            <span class="input_box_span_active">@lang('kidsnow.notice.title') *</span>
                            <input type="text" name="title" placeholder="@lang('kidsnow.notice.title') *" value="{{old('title') ?? $notice_board->title}}">
                            @if ($errors->has('title'))
                                <div class="text text-danger">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                        </div>

                    </div>
                    <br>
                    <div class="row" >
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-xs-9 col-md-9">
                                    <p>@lang('kidsnow.notice.mark')</p>
                                </div>
                                <div class="col-xs-3 col-md-3">
                                    <label class="label-checkbox">
                                        <input type="checkbox" name="important" @if(old('important') ?? $notice_board->important == 1) checked @endif>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-xs-9 col-md-9">
                                    <p>@lang('kidsnow.notice.archive')</p>
                                </div>
                                <div class="col-xs-3 col-md-3">
                                    <label class="label-checkbox">
                                        <input type="checkbox" name="archive"  @if(old('archive') ?? $notice_board->archive == 1) checked @endif>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comment">
                        <div class="row">
                            <div class="col-md-11 input_box">
                                <span>@lang('kidsnow.notice.detail') </span>
                                <textarea name="content" id="" cols="30" rows="20">{{old('content') ?? $notice_board->content}}</textarea>

                            @if ($errors->has('content'))
                                    <div class="text text-danger">
                                        {{ $errors->first('content') }}
                                    </div>
                                @endif
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
                            @foreach(explode('/*endfile*/',$notice_board->clip_board) as $clipboard)
                                <div class="row" style="margin-top: 5px">
                                    <div class="col-md-10" style="text-align: left">
                                        <a href="{{route('admin.notice-board.displayClipboard',['id'=>$notice_board->id, 'name'=>$clipboard])}}" target="_blank">{{Str::limit($clipboard,70)}}</a>
                                    </div>
                                    <div class="col-md-2">
                                        @if($clipboard)<a href="{{route('admin.notice-board.deleteClipboard',['id'=>$notice_board->id, 'name'=>$clipboard])}}" style="color: inherit"><button type="button" class="btn btn-sm btn-danger" onclick="return confirm('Are you want to delete this file ?')">Delete</button></a>@endif
                                    </div>
                                </div>
                            @endforeach
                                <br>
                        </div>
                        <div class="button" style="text-align: center; margin-top: 100px">
                            <button type="reset" onclick="goBack()">
                                <span>@lang('kidsnow.cancel')</span>
                            </button>
                            <button class="button2" type="submit" id="btn">
                                <span>@lang('kidsnow.save')</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            {{--<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">--}}
                {{--<div class="modal-dialog modal-sm" style="">--}}
                    {{--<div class="modal-content" style="font-size: 18px;">--}}
                        {{--<h3>Alert</h3>--}}
                        {{--<hr style="clear:both;margin-top:0px;margin-bottom:0px">--}}
                        {{--<div align="center">--}}
                            {{--<p style="margin: 0;font-size: 18px;">This Notice data would be deleted permanently</p>--}}
                        {{--</div>--}}
                        {{--<hr style="clear:both;margin-top:0px;margin-bottom:0px">--}}
                        {{--<div class="row" style="margin: 0;">--}}
                            {{--<div class="col-xs-6 col-md-6 mat-dialog-actions " style="border-right: 1px solid lightgrey;">--}}
                                {{--<button class="mat-button-class" style="color: #5363d6;border-left: 1px solid transparent;">--}}
                                    {{--<span class="mat-button-wrapper">OK</span>--}}
                                {{--</button>--}}
                            {{--</div>--}}
                            {{--<div class="col-xs-6 col-md-6 mat-dialog-actions">--}}
                                {{--<button class="mat-button-class" style="color: red;">--}}
                                    {{--<span class="mat-button-wrapper">CANCEL</span>--}}
                                {{--</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
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
        var array = $('#array_programs_old').val().split(',');

        $('.tablinks1').click(function(event) {
            if ($(this).hasClass('tablinks1_active')) {
                $(this).removeClass('tablinks1_active');
                var program_pop = $(this).val();
                array.splice( array.indexOf(program_pop), 1 );
            }else{
                $(this).addClass('tablinks1_active');
                var program_push = $(this).val();
                array.push(program_push);
            }
        });

        $('#btn').click(function(event) {
            $('#array_programs_new').attr('value', array);
        });
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

        $(document).ready(function () {
            $('.accordion').click()
        })

        function deleteConfirm() {
            return confirm("Confirm delete this notice ?");
        }
    </script>

@endsection
