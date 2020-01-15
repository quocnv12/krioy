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
					<li _ngcontent-c16="" class="active1" style="pointer-events:none"><a _ngcontent-c16="">Health</a></li>
				</ul>
				</div>
				<div class="col-sm-6">
					<a type="submit" class="btn btn-success" href="{{route('admin.health.list')}}" style="float: right" >Quản lí danh sách</a>
				</div>
			</div>
		</div>


		<div class="row">
			<form method="post"  enctype="multipart/form-data" style="width: 100%;">
				@csrf
			<div class="mat-card" style="width: 100%">
					<div class="mat-content">
						<button class="accordion accordion1 clearfix">
							<p style="float: left;">Children *</p>
							<form class="typeahead" role="search" style="float: right; text-align: left">
								<input type="search" name="q" class="form-control search-input search-custom" placeholder="Search Children..." autocomplete="off" style="float:right;line-height: 1.6;font-size: 18px;border: 2px solid #ccc; padding: 0 5px; width: 200px;">
							</form>
						</button>


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
	<script language="javascript">
		var button = document.getElementById("btn");
		button.onclick = function(){
			alert("Thông tin đã lưu thành công!!!");
		}
	</script>
	<script type="text/javascript">
		$('.tablinks1').click(function(event) {
			if ($(this).prop('class')=='btn progBtn limitText bgClass tablinks1 tablinks1_active') {
				$(this).removeClass('tablinks1_active');
			}else{
				$(this).addClass('tablinks1_active');
			}
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