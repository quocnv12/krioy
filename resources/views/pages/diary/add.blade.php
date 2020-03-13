@extends('master-layout')
@section('title')
	Diary
@endsection

@section('content')
    <style>
		.error{
			color: red;
			display: flex !important;
			justify-content: flex-start;
		}
    </style>
	<body>
		<section class="page-top container">
			<div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
				<div class="row">
					<div class="col-sm-6">
					<ul class="ul-td">
						<li class="level1"><a href="{{route('admin.home')}}">@lang('kidsnow.home')</a></li>
						<li class="active1" style="" ><a href="{{route('admin.diary.create')}}">@lang('kidsnow.diary')</a></li>
						<li class="active1 active-1" style="pointer-events: none" ><a href="">@lang('kidsnow.diary.add')</a></li>
					</ul>
					</div>
					{{--<div class="col-sm-6">--}}
						{{--<a href="{{route('admin.observations.list')}}" class="btn btn-success" style="float: right">Children List</a>--}}
					{{--</div>--}}
				</div>
			</div>
		<form style="width: auto;margin: 0;text-align: center" action=" {{route('admin.diary.store')}}" method="post" id="addDiary" enctype="multipart/form-data">
			<input type="hidden" name="program_id" value="{{$program_id ?? ''}}">
			@csrf
			<div class="row">
				<div class="mat-card" style="width: 100%">
					<div class="mat-content">
						<a style="min-width:110px;background:#eb87c1;color:white; float: left;font-weight: bold" href="{{route('admin.diary_types.list')}}" class="btn btn-default">@lang('kidsnow.diary_types.list')</a>
						{{--<a style="min-width:110px;background:#eb87c1;color:white; float: right; border: none;font-weight: bold" href="{{route('admin.observations.list')}}" class="btn btn-success" >@lang('kidsnow.observations.list')</a>--}}
						<br>
						<hr>
						<button class="accordion accordion1 clearfix" type="button">
							<p style="float: left;">@lang('kidsnow.children_profiles') </p>
								{{--<form class="typeahead" role="search" style="float: right; text-align: left">--}}
									{{--<input type="search" name="q" class="form-control search-input search-custom" placeholder="Search Children..." autocomplete="off" style="line-height: 1.6;font-size: 18px;border: 2px solid #ccc; padding: 0 5px; width: 200px;">--}}
								{{--</form>--}}
							<a style="float: right;text-align: right">
								<p id="tick_all_children" style="color: #fff;border: 1px solid #ff4081;padding: 5px;margin: 5px 0;background: #ff4081;border-radius: 5px;text-decoration: none;">@lang('kidsnow.choose_all')</p>
							</a>
						</button>
                        <div class="scrollmenu-div">
                            @foreach($programs as $program)
                                <div class="scrollmenu-button" style="text-align: center;">
                                    <button class="limitText" type="button" style="background: @if(isset($program_id) && $program->id == $program_id) #ff4081 @else #5363d6 @endif;padding: 5px;border: none;border-radius: 5px;margin: 5px;min-width: 120px;text-align: center;">
                                        <a style="color: #fff ;margin: 0;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;width: 150px;display: block;" href="kids-now/diary/show/{{$program->id}}" title="{{$program->program_name}}">{{$program->program_name}}</a>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                        <div class="row">
                            @if(isset($children_profiles))
								@if(count($children_profiles) > 0)
									@foreach($children_profiles as $children)
										<div class="div_box_children col-lg-2 col-md-2 col-sm-2 col-xs-6 ng-star-inserted" style="padding:10px;cursor:pointer;">
											<div type="button" data-toggle="modal" data-target=".bd-example-modal-sm" style="height: 120px;text-align: center;-webkit-appearance: none;">
												<img class="img-circle" height="80" onerror="this.src='images/Child.png';" width="80" src="images/Child.png">
												<i _ngcontent-c9="" aria-hidden="true" class="fa fa-check" id="checked" style="display: block;top:10px"></i><span class="limitText ng-star-inserted" style="color:#5363d6;;margin: 0px;display: block;">{{$children->first_name}} {{$children->last_name}}</span>
												<input type="hidden" value="{{$children->id}}">
											</div>
										</div>
									@endforeach
								@else
									<div style="font-weight: bold; margin: 50px">@lang('kidsnow.diary.not_found')</div>
								@endif
                                <input id="array_children_diary" type="hidden" value="" name="children_diary">
							@else
								<div style="margin: 50px;">
									<span style="color: red; font-weight: bold">@lang('kidsnow.diary.hint') :</span>
									<span>@lang('kidsnow.diary.hint_content')</span>
								</div>
                            @endif
                        </div>
					</div>
					@if ($errors->has('children_diary'))
						<div class="alert alert-danger">
							{{ $errors->first('children_diary') }}
						</div>
					@endif
					<hr>
					<div class="mat-content">
						<button class="accordion" type="button">@lang('kidsnow.diary_types.list')</button>
						<div class="panel">
							<div _ngcontent-c20="" class="row" style="">
								@foreach($diary_types  as $diary_type)
									<div _ngcontent-c20="" align="center" class="col-lg-3 col-md-3 col-sm-2 col-xs-4 ng-star-inserted" style="padding:10px;cursor:pointer;">
										<button type="button" _ngcontent-c20="" class="btn progBtn limitText bgClass tablinks1" style="background-color:transparent;border:1px solid #5363d6;border-radius: 4px; width: 100%" data-toggle="tooltip" title="{{$diary_type->name}}" value="{{$diary_type->name}}">{{$diary_type->name}} </button>
									</div>
								@endforeach
								<input id="array_diary" type="hidden" value="" name="diary">
							</div>
						</div>
					</div>
					@if ($errors->has('diary'))
						<div class="alert alert-danger">
							{{ $errors->first('diary') }}
						</div>
					@endif
					<div class="comment">
						<div class="row">
							<div class="col-md-11 input_box">
								<span>@lang('kidsnow.diary.detail')</span>
								<input type="text" name="detail" placeholder="@lang('kidsnow.diary.detail')">
								@if ($errors->has('detail'))
									<div class="alert alert-danger">
										{{ $errors->first('detail') }}
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
								<p id="show_clip_board" style="text-align: left"></p>
								@if ($errors->has('clip_board'))
									<div class="text text-danger">
										{{ $errors->first('clip_board') }}
									</div>
								@endif
							</div>
						</div>
						<div class="button" style="text-align: center;">
							<button type="reset" onclick="goBack()">
								<span>@lang('kidsnow.cancel')</span>
							</button>
							<button class="button2" id="submit_button" type="submit">
								<span>@lang('kidsnow.save')</span>
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
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script type="text/javascript">
		var array_diary = [];
    	$('.tablinks1').click(function(event) {
    		if ($(this).prop('class')=='btn progBtn limitText bgClass tablinks1 tablinks1_active') {
    			$(this).removeClass('tablinks1_active');
				var diary_pop = $(this).val();
				array_diary.splice( array_diary.indexOf(diary_pop), 1 );
				console.log(array_diary)
    		}else{
    			$(this).addClass('tablinks1_active');
				var diary_push = $(this).val();
				array_diary.push(diary_push);
				console.log(array_diary)
    		}
    	});

        //begin select children_diary
        var array_children_diary = [];
        $('.div_box_children').children('div').children('i').hide()

        $('.div_box_children').click(function () {
            if ($(this).children('div').children('i').hasClass('checked')){
                ($(this).children('div').children('i').removeClass('checked'))
                $(this).children('div').children('i').hide()
                var diary_pop = $(this).children('div').children('input').val();
				array_children_diary.splice( array_children_diary.indexOf(diary_pop), 1 );
				console.log(array_children_diary)
            }else {
                $(this).children('div').children('i').addClass('checked')
                $(this).children('div').children('i').show()
                var diary_push = $(this).children('div').children('input').val();
				array_children_diary.push(diary_push);
				console.log(array_children_diary)
            }
        })
        //end select children_observation

		//tick all children
		$('#tick_all_children').click(function () {
			if ($('.div_box_children').children('div').children('i').hasClass('checked')){
				($('.div_box_children').children('div').children('i').removeClass('checked'))
				$('.div_box_children').children('div').children('i').hide()
				array_children_diary = [];

				console.log(array_children_diary)
			}else {
				$('.div_box_children').children('div').children('i').addClass('checked')
				$('.div_box_children').children('div').children('i').show()
				array_children_diary = $('.div_box_children').children('div').children('input').map(function() {
					return $(this).val();
				}).toArray();

				console.log(array_children_diary)
			}
		})
		//end tick all children

		//begin validate

		$(document).ready(function () {
			$("#addDiary").validate({
				// Specify validation rules
				rules: {
					detail: "required",
				},
				messages: {
					detail: "Vui lòng nhập nội dung",
				},
				submitHandler: function(form) {
					form.submit()
				}
			});
		})

		var button = document.getElementById("submit_button");
		button.onclick = function(){
			$('#array_diary').attr('value', array_diary);
			$('#array_children_diary').attr('value', array_children_diary);
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
