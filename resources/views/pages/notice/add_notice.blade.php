@extends('master-layout')
@section('title')
	Add Notice
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
						<li class="level1"><a href="kids-now">HOME</a></li>
						<li class="active1"><a href="kids-now/notice-board">NOTICE BOARD</a></li>
						<li class="active1 active-1" style="pointer-events:none;"><a href="">ADD NOTICE</a></li>
					</ul>
				</div>
				{{--<div class="col-lg-2 col-md-2 col-sm-2" data-toggle="modal" data-target=".bd-example-modal-sm">--}}
					{{--<button class="notice" type="button">--}}
						{{--<span>DELETE</span>--}}
					{{--</button>--}}
				{{--</div>--}}
			</div>
		</div>
        <form action="kids-now/notice-board/add" method="post" enctype="multipart/form-data" style="width: 100%">
            @csrf
            <div class="mat-card">
                <div class="mat-content">
                    <button class="accordion" type="button">Programs</button>
                    <div class="panel">
                        <div _ngcontent-c20="" class="row">
                            <!---->
                            @foreach($programs as $program)
                                <div _ngcontent-c20="" align="center" class="col-xs-6 col-sm-6 col-md-2 col-lg-3 ng-star-inserted" style="padding:10px;cursor:pointer;width: 50%;">
                                    <button _ngcontent-c20="" class="btn progBtn limitText bgClass tablinks1" style="background-color:transparent;border:1px solid #5363d6;border-radius: 4px; width: 100%" type="button" data-toggle="tooltip" title="{{$program->program_name}}" value="{{$program->id}}">{{$program->program_name}}</button>
                                </div>
                            @endforeach
                            <input id="array_program" type="hidden" value="" name="programs">
                        </div>
                        @if ($errors->has('programs'))
                            <div class="text text-danger">
                                {{ $errors->first('programs') }}
                            </div>
                        @endif
                    </div>
                    <div class="add">
                        <div class="input_box" style="width: 100%;">
                            <span>Title of Notice *</span>
                            <input type="text" name="title" placeholder="Title of Notice *" value="{{old('title')}}">
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
                                    <p>Mark as Important</p>
                                </div>
                                <div class="col-xs-3 col-md-3">
                                    <label class="label-checkbox">
                                        <input type="checkbox" name="important" @if(old('important')) checked @endif>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comment">
                        <div class="row">
                            <div class="col-md-11 input_box">
                                <span>Enter Details here *</span>
                                <input type="text" name="content" placeholder="Enter Details here *" value="{{old('content')}}">
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
                        <div class="button" style="text-align: center;">
                            <button type="reset" onclick="goBack()">
                                <span>CANCEL</span>
                            </button>
                            <button class="button2" type="submit" id="btn">
                                <span>SAVE</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm" style="">
                    <div class="modal-content" style="font-size: 18px;">
                        <h3>Aler</h3>
                        <hr style="clear:both;margin-top:0px;margin-bottom:0px">
                        <div align="center">
                            <p style="margin: 0;font-size: 18px;">This Notice data would be deleted permanently</p>
                        </div>
                        <hr style="clear:both;margin-top:0px;margin-bottom:0px">
                        <div class="row" style="margin: 0;">
                            <div class="col-xs-6 col-md-6 mat-dialog-actions " style="border-right: 1px solid lightgrey;">
                                <button class="mat-button-class" style="color: #5363d6;border-left: 1px solid transparent;">
                                    <span class="mat-button-wrapper">OK</span>
                                </button>
                            </div>
                            <div class="col-xs-6 col-md-6 mat-dialog-actions">
                                <button class="mat-button-class" style="color: red;">
                                    <span class="mat-button-wrapper">CANCEL</span>
                                </button>
                            </div>
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
        var array = [];
        $('.tablinks1').click(function(event) {
            if ($(this).prop('class')=='btn progBtn limitText bgClass tablinks1 tablinks1_active') {
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
            $('#array_program').attr('value', array);
        });

        var mybutton_counter=0;
        $('#btn').on('click', function(e){
            if (mybutton_counter>0){return false;} //you can set the number to any
            //your call
            mybutton_counter++; //incremental
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
        // $('#file').change(function() {
        //     var filename = $('#file').val();
        //     $('#show_clip_board').html(filename);
        // });

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

        $(document).ready(function () {
            $('.accordion').click()
        })
	</script>
@endsection
