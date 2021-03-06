@extends('master-layout')
@section('title')
	Health
@endsection

@section('content')

	<body onload="time()">
	<section class="page-top container">
		<div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
			<div class="row">
				<div class="col-sm-6">
					<ul class="ul-td">
						<li _ngcontent-c16="" class="level1"><a _ngcontent-c16="" href="{{route('admin.home')}}">@lang('kidsnow.home')</a></li>
						<li _ngcontent-c16="" class="active1" style="pointer-events:none" ><a href="" _ngcontent-c16="">@lang('kidsnow.health')</a></li>
						<li _ngcontent-c16="" class="active1 active-1" style="pointer-events:none" href=""><a _ngcontent-c16="">@lang('kidsnow.health.add_health')</a></li>
					</ul>
				</div>
				{{--<div class="col-sm-6">--}}
					{{--<a type="submit" class="btn btn-success" href="{{route('admin.health.list')}}" style="border: none;min-width: 110px;background: #eb87c1;color: white;float: right;font-weight: bold;" >@lang('kidsnow.health.list')</a>--}}
				{{--</div>--}}
			</div>
		</div>

		<div style="font-size: 20px; display: flex; justify-content: flex-end" id="clock" name="time"></div>

		<form style="width: auto;margin: 0;text-align: center" action="{{route('admin.health.getAdd')}}" method="post" id="addHealth" enctype="multipart/form-data">
			<input type="hidden" name="program_id" value="{{$program_id ?? ''}}">
			@csrf
			<div class="row">
				<div class="mat-card" style="width: 100%">
					<div style="margin: 10px">
						<span style="color: red; font-weight: bold">@lang('kidsnow.health.hint') :</span>
						<span>@lang('kidsnow.health.hint_content')</span>
					</div>
					<div class="mat-content">
						<button class="accordion accordion1 clearfix" type="button">
							<p style="float: left;">@lang('kidsnow.health.children') *</p>
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
									<button type="button" style="background: @if(isset($program_id) && $program->id == $program_id) #ff4081 @else #5363d6 @endif;padding: 5px;border: none;border-radius: 5px;margin: 5px;min-width: 120px;text-align: center;height: 34px;">
										<a style="color: #fff;margin: 0;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;width: 150px;display: block;" title="{{$program->program_name}}" href="kids-now/health/show/{{$program->id}}">{{$program->program_name}}</a>
									</button>
								</div>
							@endforeach
						</div>
						<div class="row">
							@if(isset($children_profiles))
								@foreach($children_profiles as $children)
									<div class="div_box_children col-lg-2 col-md-2 col-sm-2 col-xs-6 ng-star-inserted" style="padding:10px;cursor:pointer;">
										<div type="button" data-toggle="modal" data-target=".bd-example-modal-sm" style="height: 120px;text-align: center;-webkit-appearance: none;">
											<img class="img-circle"  height="80" onerror="this.src='images/Child.png';" width="80" src="images/Child.png">
											<i _ngcontent-c9="" aria-hidden="true"  class="fa fa-check" id="checked" style="display: block;top:10px"></i>
											<span class="limitText ng-star-inserted" value="{{ $children->id }}" style="color:#5363d6;;margin: 0px;display: block;">{{$children->first_name}} {{$children->last_name}}</span>
											<input  type="hidden" value="{{ $children->id }}">
										</div>
									</div>
								@endforeach
								<input id="array_children_health" type="hidden" value="" name="children_health">
							@endif
						</div>
					</div>
					<div>
						@if ($errors->has('children_health'))
							<div class="alert alert-danger" style="text-align: center">
								{{ $errors->first('children_health') }}
							</div>
						@endif
					</div>
					<hr>

					<div class="update">
						<p style="font-weight: bold; color: red">@lang('kidsnow.health.select_health_update_type') *</p>
						<div class="tab">
							<button type="button" class=" tablinks" onclick="openCity(event, 'Sick')">@lang('kidsnow.health.sick')</button>
							<button type="button" class=" tablinks" onclick="openCity(event, 'Medicine')">@lang('kidsnow.health.medicine')</button>
							<button type="button" class=" tablinks" onclick="openCity(event, 'Growth')">@lang('kidsnow.health.growth')</button>
							<button type="button" class=" tablinks" onclick="openCity(event, 'Incident')">@lang('kidsnow.health.incident')</button>
							<button type="button" class=" tablinks" onclick="openCity(event, 'Blood_group')">@lang('kidsnow.health.blood_group')</button>
						</div>

						<div id="Sick" class="tabcontent ">
							<div class="row">
								<div class="col-md-11 input_box">
									<span>@lang('kidsnow.health.sick_content') *</span>
									<input type="text" name="sick" placeholder="@lang('kidsnow.health.sick_content') ">
									@if ($errors->has('sick'))
										<div class="alert alert-danger" style="text-align: center">
											{{ $errors->first('sick') }}
										</div>
									@endif
								</div>
							</div>
						</div>
						<div id="Medicine" class="tabcontent">
							<div class="row">
								<div class="col-md-11 input_box">
									<span>@lang('kidsnow.health.medicine_content') *</span>
									<input type="text" name="medicine" placeholder="@lang('kidsnow.health.medicine_content') ">
									@if ($errors->has('medicine'))
										<div class="alert alert-danger" style="text-align: center">
											{{ $errors->first('medicine') }}
										</div>
									@endif
								</div>
							</div>

						</div>
						<div id="Growth" class="tabcontent">
							<div class="row growth">
								<div class="col-md-4 growth_input input_box">
									<span>@lang('kidsnow.health.growth_height')</span>
									<input type="text" name="growth_height" placeholder="@lang('kidsnow.health.growth_height')">

									<label class="label">
										<div class="label-text">cm</div>
										{{--<div class="toggle">--}}
											{{--<input class="toggle-state" type="checkbox" name="check" value="check" />--}}
											{{--<div class="toggle-inner">--}}
												{{--<div class="indicator"></div>--}}
											{{--</div>--}}
											{{--<div class="active-bg"></div>--}}
										{{--</div>--}}
										{{--<div class="label-text">inch</div>--}}
									</label>
								</div>
								<div class="col-md-4 growth_input input_box">
									<span>@lang('kidsnow.health.growth_weight')</span>
									<input type="text" name="growth_weight" placeholder="@lang('kidsnow.health.growth_weight')">

									<label class="label">
										<div class="label-text">kg</div>
										{{--<div class="toggle">--}}
											{{--<input class="toggle-state" type="checkbox" name="check" value="check" />--}}
											{{--<div class="toggle-inner">--}}
												{{--<div class="indicator"></div>--}}
											{{--</div>--}}
											{{--<div class="active-bg"></div>--}}
										{{--</div>--}}
										{{--<div class="label-text">lb</div>--}}
									</label>
								</div>
								<div class="col-md-4 growth_input input_box">
									<span>@lang('kidsnow.health.growth_head_circumference')</span>
									<input type="text" name="growth_head_circumference" placeholder="@lang('kidsnow.health.growth_head_circumference')">
									<label class="label">
										<div class="label-text">cm</div>
										{{--<div class="toggle">--}}
											{{--<input class="toggle-state" type="checkbox" name="check" value="check" />--}}
											{{--<div class="toggle-inner">--}}
												{{--<div class="indicator"></div>--}}
											{{--</div>--}}
											{{--<div class="active-bg"></div>--}}
										{{--</div>--}}
										{{--<div class="label-text">inch</div>--}}
									</label>
								</div>
							</div>
							<div class="row">
								<div class="col-md-11 input_box">
									<span>@lang('kidsnow.health.growth_content') *</span>
									<input type="text" name="growth" placeholder="@lang('kidsnow.health.growth_content') ">
									@if ($errors->has('growth'))
										<div class="alert alert-danger" style="text-align: center">
											{{ $errors->first('growth') }}
										</div>
									@endif
								</div>
							</div>

						</div>
						<div id="Incident" class="tabcontent">
							<div class="row">
								<div class="col-md-11 input_box">
									<span>@lang('kidsnow.health.incident_content') *</span>
									<input type="text" name="incident" placeholder="@lang('kidsnow.health.incident_content') ">
									@if ($errors->has('incident'))
										<div class="alert alert-danger" style="text-align: center">
											{{ $errors->first('incident') }}
										</div>
									@endif
								</div>
							</div>
						</div>
						<div id="Blood_group" class="tabcontent">
							<div class="row">
								<div class="col-md-11 input_box">
									<span>@lang('kidsnow.health.blood_group_content') *</span>
									<input type="text" name="blood_group" placeholder="@lang('kidsnow.health.blood_group_content') ">
									@if ($errors->has('blood_group'))
										<div class="alert alert-danger" style="text-align: center">
											{{ $errors->first('blood_group') }}
										</div>
									@endif
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
					<p style="color: blue; float: left; text-align: left" id="show_clip_board"></p>
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
		var array_health = [];
		$('.div_box_children').children('div').children('i').hide()

		$('.div_box_children').click(function () {
			if ($(this).children('div').children('i').hasClass('checked')){
				($(this).children('div').children('i').removeClass('checked'))
				$(this).children('div').children('i').hide()
				var observation_pop = $(this).children('div').children('input').val();
				array_health.splice( array_health.indexOf(observation_pop), 1 );

			}else {
				$(this).children('div').children('i').addClass('checked')
				$(this).children('div').children('i').show()
				var observation_push = $(this).children('div').children('input').val();
				array_health.push(observation_push);

			}


		})
		//end select children_observation


		//tick all children
		$('#tick_all_children').click(function () {
			if ($('.div_box_children').children('div').children('i').hasClass('checked')){
				($('.div_box_children').children('div').children('i').removeClass('checked'))
				$('.div_box_children').children('div').children('i').hide()
				array_health = [];

				console.log(array_health)
			}else {
				$('.div_box_children').children('div').children('i').addClass('checked')
				$('.div_box_children').children('div').children('i').show()
				array_health = $('.div_box_children').children('div').children('input').map(function() {
					return $(this).val();
				}).toArray();

				console.log(array_health)
			}
		})
		//end tick all children


		var button = document.getElementById("submit_button");
		button.onclick = function(){
			$('#array_all_children').attr('value', array_children);
			$('#array_children_health').attr('value',array_health);
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
