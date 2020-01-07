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
					<li _ngcontent-c16="" class="level1"><a _ngcontent-c16="" href="index.html">Home</a></li>
					<li _ngcontent-c16="" class="active1" style="pointer-events:none"><a _ngcontent-c16="">Health</a></li>
				</ul>
				</div>
				<div class="col-sm-6">
					<a type="submit" class="btn btn-success" href="{{route('admin.health.list')}}" style="float: right" >Quản lí danh sách</a>
				</div>
			</div>
		</div>


		<div class="row">
			<form action="" style="width: 100%" >
				@csrf
			<div class="mat-card">
				<div class="mat-content">
					<button class="accordion accordion1 clearfix">
						<p style="float: left;">Children *</p>
						<a href="{{route('admin.health.child')}}" style="float: right;text-align: right">SELECT</a>
					</button>
					<div class="mat-content">

					</div>


					<div id="clock" name="time"></div>
					<div class="update">
						<p>Select Health Update Type*</p>
						<div class="tab">
							<button  type="button" class="tablinks" onclick="openCity(event, 'Sick')">Sick</button>
							<button type="button"class="tablinks" onclick="openCity(event, 'Medicine')">Medicine</button>
							<button type="button"class="tablinks" onclick="openCity(event, 'Growth')">Growth</button>
							<button type="button"class="tablinks" onclick="openCity(event, 'Incident')">Incident</button>
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
							<div class="button" style="text-align: center;">
								<button class="button2">
									<span>SEND</span>
								</button>
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
							<div class="button" style="text-align: center;">
								<button class="button2">
									<span>SEND</span>
								</button>
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
									<input type="text" name="" placeholder="Enter details here *">
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
							<div class="button" style="text-align: center;">
								<button type="submit" class="button2">
									<span>SEND</span>
								</button>
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
							<div class="button" style="text-align: center;">
								<button class="button2">
									<span>SEND</span>
								</button>
							</div>
						</div>
					</div><br>
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
@endsection