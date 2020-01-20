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
					<li _ngcontent-c16="" class="level1"><a _ngcontent-c16="" href="kids-now">Home</a></li>
					<li _ngcontent-c16="" class="active1" style="pointer-events:none" href="{{route('admin.health.getAdd')}}"><a _ngcontent-c16="">Health</a></li>
				</ul>
				</div>
				<div class="col-sm-6">
					<a type="submit" class="btn btn-success" href="{{route('admin.health.list')}}" style="float: right" >Quản lí danh sách</a>
				</div>
			</div>
		</div>


		<form style="width: auto;margin: 0;text-align: center" action="{{route('admin.health.getAdd')}}" method="post" id="addObservation" enctype="multipart/form-data">
			@csrf
			<div class="row">
				<div class="mat-card" style="width: 100%">
					<div class="mat-content">
						<button class="accordion accordion1 clearfix" type="button">
							<p style="float: left;">Children *</p>
							{{--<form class="typeahead" role="search" style="float: right; text-align: left">--}}
							{{--<input type="search" name="q" class="form-control search-input search-custom" placeholder="Search Children..." autocomplete="off" style="line-height: 1.6;font-size: 18px;border: 2px solid #ccc; padding: 0 5px; width: 200px;">--}}
							{{--</form>--}}
						</button>

						<div class="scrollmenu-div">
							@foreach($programs as $program)
								<div class="scrollmenu-button" style="text-align: center;">
									<button type="button" style="background: #5363d6;padding: 5px;border: none;border-radius: 5px;margin: 5px;min-width: 120px;text-align: center;">
										<a style="color: #fff;" href="kids-now/health/show/{{$program->id}}">{{$program->program_name}}</a>
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

						<div class="panel" >
							<div class="row" id="children_list">
								{{-- ajax ObservationController@addSelectChildren do vao day--}}
							</div>
							<input type="hidden" name="array_all_children" value="">
						</div>
					</div>
					<hr>
					<div id="clock" name="time"></div>
					<div class="update">
						<p>Select Health Update Type*</p>
						<div class="tab">
							<button  type="button" class="tablinks" onclick="openCity(event, 'Sick')">Sick</button>
							<button type="button"class="tablinks" onclick="openCity(event, 'Medicine')">Medicine</button>
							<button type="button"class="tablinks" onclick="openCity(event, 'Growth')">Growth</button>
							<button type="button"class="tablinks" onclick="openCity(event, 'Incident')">Incident</button>
							<button type="button"class="tablinks" onclick="openCity(event, 'Blood_group')">Blood_group</button>
						</div>

						<div id="Sick" class="tabcontent">
							<div class="row">
								<div class="col-md-9 input_box">
									<span>Enter details here *</span>
									<input type="text" name="sick" placeholder="Enter details here *">
								</div>
								<div class="col-md-3">
									<div class="input-file-container">
										<input class="input-file" type='file' onchange="readURL(this);" id="input-Sick" />
										<label tabindex="0" for="my-file" class="input-file-trigger">
											<i class="fa fa-paperclip"></i>
										</label>
										<div class="input-img" style="display: none">
											<img class="blah"  name ="image" src="images/150.png" alt="your  image" />
											<div class="top-right button-close button_close_show_img">
												<button style="border-radius:50%;width:26px;height:26px;z-index:1;">
													<i class="fa fa-times-circle"></i>
												</button>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
						<div id="Medicine" class="tabcontent">
							<div class="row">
								<div class="col-md-9 input_box">
									<span>Enter details here *</span>
									<input type="text" name="medicine" placeholder="Enter details here *">
								</div>
								<div class="col-md-3">
									<div class="input-file-container">
										<input class="input-file" type='file' onchange="readURL(this);" id="input-Medicine" />
										<label tabindex="0" for="my-file" class="input-file-trigger">
											<i class="fa fa-paperclip"></i>
										</label>
										<div class="input-img"  style="display: none">
											<img class="blah"  name ="image"src="images/150.png" alt="your  image" />
											<div class="top-right button-close button_close_show_img">
												<button style="border-radius:50%;width:26px;height:26px;z-index:1;">
													<i class="fa fa-times-circle"></i>
												</button>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
						<div id="Growth" class="tabcontent">
							<div class="row growth">
								<div class="col-md-4 growth_input input_box">
									<span>Height</span>
									<input type="text" name="growth_height" placeholder="Height">
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
									<span>Weight</span>
									<input type="text" name="growth_weight" placeholder="Weight">
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
									<span>Head Circumferen...</span>
									<input type="text" name="" placeholder="Head Circumferen...">
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
								<div class="col-md-9 input_box">
									<span>Enter details here *</span>
									<input type="text" name="blood_group" placeholder="Enter details here *">
								</div>
								<div class="col-md-3">
									<div class="input-file-container">
										<input class="input-file" type='file' onchange="readURL(this);" id="input-Growth" />
										<label tabindex="0" for="my-file" class="input-file-trigger">
											<i class="fa fa-paperclip"></i>
										</label>
										<div class="input-img"style="display: none">
											<img class="blah"  name ="image"src="images/150.png" alt="your  image" />
											<div class="top-right button-close button_close_show_img">
												<button style="border-radius:50%;width:26px;height:26px;z-index:1;">
													<i class="fa fa-times-circle"></i>
												</button>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
						<div id="Incident" class="tabcontent">
							<div class="row">
								<div class="col-md-9 input_box">
									<span>Enter details here *</span>
									<input type="text" name="incident" placeholder="Enter details here *">
								</div>
								<div class="col-md-3">
									<div class="input-file-container">
										<input class="input-file" type='file' onchange="readURL(this);" id="input-Incident" />
										<label tabindex="0" for="my-file" class="input-file-trigger">
											<i class="fa fa-paperclip"></i>
										</label>
										<div class="input-img" style="display: none">
											<img class="blah" name="image"src="images/150.png" alt="your  image" />
											<div class="top-right button-close button_close_show_img">
												<button style="border-radius:50%;width:26px;height:26px;z-index:1;">
													<i class="fa fa-times-circle"></i>
												</button>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
						<div id="Blood_group" class="tabcontent">
							<div class="row">
								<div class="col-md-9 input_box">
									<span>Enter details here *</span>
									<input type="text" name="blood_group" placeholder="Enter details here *">
								</div>
								<div class="col-md-3">
									<div class="input-file-container">
										<input class="input-file" type='file' onchange="readURL(this);" id="input-Sick" />
										<label tabindex="0" for="my-file" class="input-file-trigger">
											<i class="fa fa-paperclip"></i>
										</label>
										<div class="input-img" style="display: none">
											<img class="blah"  name ="image" src="images/150.png" alt="your  image" />
											<div class="top-right button-close button_close_show_img">
												<button style="border-radius:50%;width:26px;height:26px;z-index:1;">
													<i class="fa fa-times-circle"></i>
												</button>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div><br>
				</div>
			</div>
		<button type="submit" class="btn btn-primary">Save</button>
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
			alert("Thông tin đã lưu thành công!!!");
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
@endsection
