@extends('master-layout')
@section('title')
	EDIT Children
@endsection

@section('content')
	<body>

	<section class="page-top container">
		<div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
			<div class="row">
				<ul class="ul-td">
					<li _ngcontent-c16="" class="level1"><a _ngcontent-c16="">HOME</a></li>
					<li _ngcontent-c16="" class="active1" style="pointer-events:none"><a _ngcontent-c16="">CHILDREN PROFILES</a></li>
					<li _ngcontent-c16="" class="active1 active-1" style="pointer-events:none;"><a _ngcontent-c16="">EDIT CHILDREN</a></li>
				</ul>
			</div>
		</div>
		<div class="mat-card">
			<div class="mat-content">
				<button class="accordion add-staff">{{$children_profiles->first_name}}{{$children_profiles->last_name}}'s Profile</button>
				<div class="row">
					<div class="col-md-2 textera-img">
						<a href="#">
							<img src="images/Child.png" alt="">
							<span _ngcontent-c10="" class="btnClass ng-star-inserted" style=""><i _ngcontent-c10="" aria-hidden="true" class="fa fa-camera"></i></span>
						</a>
					</div>
					<div class="col-md-10">
						<div class="add a1-1 ">
							<div class="row">
								<div class="col-md-6 input_box">
									<span>First Name *</span>
									<input type="text" name="first-name" placeholder="First Name *" value="{{$children_profiles->first_name}}">
								</div>
								<div class="col-md-6 input_box">
									<span>Last Name *</span>
									<input type="text" name="last-name" placeholder="Last Name *" value="{{$children_profiles->last_name}}">
								</div>
							</div>
						</div>
					</div>
				</div>
				<hr style="margin: 0;">
				<div class="row">
					<div class="add">
						<div class="col-md-4 input_box">
							<span>Birthday *</span>
							<input type="date" name="date" placeholder="Birthday" value="{{$children_profiles->birthday}}">
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
							<span>Gender *</span>
							<select>
								<option>Gender</option>
								<option>Nam</option>
								<option>Nữ</option>
							</select>
						</div>
					</div>
				</div>
				<div class="add">
					<div class="input_box" style="width: 100%">
						<span>Residential Address *</span>
						<input type="text" name="address" placeholder="Residential Address">
					</div>
					<div class="input_box" style="width: 100%">
						<span>Allergies (if any) *</span>
						<input type="text" name="Allergies" placeholder="Allergies (if any)">
					</div>
					<div class="input_box" style="width: 100%">
						<span>Additional Notes *</span>	
						<input type="text" name="Notes" placeholder="Additional Notes">
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
							<button _ngcontent-c20="" class="btn progBtn limitText" style="background-color:transparent;border:1px solid #5363d6;border-radius: 4px">Attendance </button>
						</div>
						<div _ngcontent-c20="" align="center" class="col-xs-6 col-sm-4 col-md-3 col-lg-2 ng-star-inserted" style="padding:10px;cursor:pointer">
							<button _ngcontent-c20="" class="btn progBtn limitText bgClass" style="background-color:transparent;border:1px solid #5363d6;border-radius: 4px">Behaviour </button>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="mat-card" style="background-color: #f9f9f9;">
			<div class="mat-content">
				<button class="accordion">Parents *</button>
				<div class="panel panel-parent" style="background-color: #f9f9f9;">
					<div class="panel-1">					
						<div class="row">
							<div class="col-md-2 textera-img">
								<a href="#">
									<img src="images/Staff.png" alt="">
									<span _ngcontent-c10="" class="btnClass img-sp img-span ng-star-inserted" style=""><i _ngcontent-c10="" aria-hidden="true" class="fa fa-camera"></i></span>
								</a>
							</div>
							<div class="col-md-10">
								<div class="add a1 ">
									<div class="row">
										<div class="col-md-6 input_box">
											<span>First Name *</span>
											<input type="text" name="first-name" placeholder="First Name*">
										</div>
										<div class="col-md-6 input_box">
											<span>Last Name *</span>
											<input type="text" name="last-name" placeholder="Last Name *">
										</div>
									</div>
									<div class="row">
										<div class="col-md-6 input_box">
											<span>Phone Number*</span>
											<input type="text" name="phone" placeholder="Phone Number *">
										</div>
										<div class="col-md-6 input_box">
											<span>RELATION *</span>
											<select>
												<option>RELATION</option>
												<option>Mother</option>
												<option>Father</option>
												<option>Guardian</option>
											</select>
										</div>
									</div>
									<div class="input_box" style="width: 100%;">
										<span>E-Mail Address *</span>
										<input type="email" name="email" placeholder="E-Mail Address">
									</div>
								</div>
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
					<span>SEND</span>
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
