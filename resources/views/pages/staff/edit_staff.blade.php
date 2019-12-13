@extends('master-layout')
@section('title')
	EDIT Staff
@endsection


@section('content')
	<body>

	<section class="page-top container">
		<div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
			<div class="row">
				<ul class="ul-td">
					<li _ngcontent-c16="" class="level1"><a _ngcontent-c16="">HOME</a></li>
					<li _ngcontent-c16="" class="active1" style="pointer-events:none"><a _ngcontent-c16="">STAFF PROFILES</a></li>
					<li _ngcontent-c16="" class="active1 active-1" style="pointer-events:none;"><a _ngcontent-c16="">EDIT STAFF</a></li>
				</ul>
			</div>
		</div>
		<div class="mat-card">
			<div class="mat-content">
				<button class="accordion add-staff">K5 KHANH Profile</button>
				<div class="row">
					<div class="col-md-2 textera-img">
						<a href="#">
							<img src="images/Staff.png" alt="">
							<span _ngcontent-c10="" class="btnClass ng-star-inserted" style=""><i _ngcontent-c10="" aria-hidden="true" class="fa fa-camera"></i></span>
						</a>
					</div>
					<div class="col-md-10">
						<div class="add a1 ">
							<div class="row">
								<div class="col-md-6 input_box">
									<span>First Name *</span>
									<input type="text" name="first-name" placeholder="First Name *">
								</div>
								<div class="col-md-6 input_box">
									<span>Last Name *</span>
									<input type="text" name="last-name" placeholder="Last Name *">
								</div>
							</div>
							<div class="row">
								<div class="add">
									<div class="col-md-6 input_box">
										<span>Phone Number *</span>
										<input type="text" name="phone" placeholder="Phone Number *">
									</div>
									<div class="col-md-6 input_box">
										<span>Gender *</span>
										<select>
											<option>Gender</option>
											<option>Nam</option>
											<option>Nữ</option>
										</select>
									</div>
								</div>
							</div>
							<div class="input_box" style="width: 100%">
								<span>Email Address *</span>
								<input type="text" name="email" placeholder="Email Address">
							</div>
						</div>
					</div>
				</div>
				<hr style="margin: 0;">
				<div class="add">
					<div class="input_box" style="width: 100%">
						<span>Residential Address *</span>
						<input type="text" name="address" placeholder="Residential Address">
					</div>
					<div class="row">
						<div class="col-md-4 input_box">
							<span>Birthday *</span>
							<input type="date" name="date" placeholder="Birthday" title="Ngày sinh">
						</div>
						<div class="col-md-4 input_box">
							<span>Blood Group *</span>
							<select>
								<option>Blood Group</option>
								<option>1</option>
								<option>2</option>
								<option>3</option>
							</select>
						</div>
						<div class="col-md-4 input_box">
							<span>Date of Joining *</span>
							<input type="date" name="date" placeholder="Date of Joining" title="Date of Joining">
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="mat-card">
			<div class="mat-content">
				<button class="accordion">Programs</button>
				<div class="panel">
					<div _ngcontent-c20="" class="row" style="">
						<!---->
						<div _ngcontent-c20="" align="center" class="col-xs-6 col-sm-4 col-md-3 col-lg-2 ng-star-inserted" style="padding:10px;cursor:pointer;">
							<button _ngcontent-c20="" class="btn progBtn limitText bgClass tablinks1" style="background-color:transparent;border:1px solid #5363d6;border-radius: 4px">Attendance </button>
						</div>
						<div _ngcontent-c20="" align="center" class="col-xs-6 col-sm-4 col-md-3 col-lg-2 ng-star-inserted" style="padding:10px;cursor:pointer">
							<button _ngcontent-c20="" class="btn progBtn limitText bgClass tablinks1" style="background-color:transparent;border:1px solid #5363d6;border-radius: 4px">Behaviour </button>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="mat-card">
			<div class="mat-content">
				<button class="accordion">Permissions</button>
				<div class="panel">
					<div class="row">
						<div class="col-xs-6 col-md-4 panel-col">
							<div class="panel-list">
								<span class="circleClass">
									<i class="fa fa-circle"></i>
								</span>
								<span class="circleFont">1</span>
							</div>
							<div class="panel-list">
								<span class="circleClass">
									<i class="fa fa-circle"></i>
								</span>
								<span class="circleFont">2</span>
							</div>
							<div class="panel-list">
								<span class="circleClass">
									<i class="fa fa-circle"></i>
								</span>
								<span class="circleFont">3</span>
							</div>
							<div class="panel-list">
								<span class="circleClass">
									<i class="fa fa-circle"></i>
								</span>
								<span class="circleFont">4</span>
							</div>
							<div class="panel-list">
								<span class="circleClass">
									<i class="fa fa-circle"></i>
								</span>
								<span class="circleFont">5</span>
							</div>
						</div>
						<div class="col-xs-6 col-md-4 panel-col">
							<div class="panel-list">
								<span class="circleClass">
									<i class="fa fa-circle"></i>
								</span>
								<span class="circleFont">1</span>
							</div>
							<div class="panel-list">
								<span class="circleClass">
									<i class="fa fa-circle"></i>
								</span>
								<span class="circleFont">2</span>
							</div>
							<div class="panel-list">
								<span class="circleClass">
									<i class="fa fa-circle"></i>
								</span>
								<span class="circleFont">3</span>
							</div>
							<div class="panel-list">
								<span class="circleClass">
									<i class="fa fa-circle"></i>
								</span>
								<span class="circleFont">4</span>
							</div>
							<div class="panel-list">
								<span class="circleClass">
									<i class="fa fa-circle"></i>
								</span>
								<span class="circleFont">5</span>
							</div>
						</div>
						<div class="col-xs-6 col-md-4 panel-col">
							<div class="panel-list">
								<span class="circleClass">
									<i class="fa fa-circle"></i>
								</span>
								<span class="circleFont">1</span>
							</div>
							<div class="panel-list">
								<span class="circleClass">
									<i class="fa fa-circle"></i>
								</span>
								<span class="circleFont">2</span>
							</div>
							<div class="panel-list">
								<span class="circleClass">
									<i class="fa fa-circle"></i>
								</span>
								<span class="circleFont">3</span>
							</div>
							<div class="panel-list">
								<span class="circleClass">
									<i class="fa fa-circle"></i>
								</span>
								<span class="circleFont">4</span>
							</div>
							<div class="panel-list">
								<span class="circleClass">
									<i class="fa fa-circle"></i>
								</span>
								<span class="circleFont">5</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="comment">
			<div class="button" style="text-align: center;">
				<button>
					<span>CANCEL</span>
				</button>
				<button class="button2">
					<span>SAVE</span>
				</button>
			</div>
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
	<script type="text/javascript">
		$('.input_box select').focus(function(event) {
	    	$(this).siblings('span').addClass('input_box_span_active');
		});
		$('.input_box select').blur(function(event) {
	    	if ($(this).val()=='') {
	      		$(this).siblings('span').removeClass('input_box_span_active');
	    	}
		});
	</script>
@endsection