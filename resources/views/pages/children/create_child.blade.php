@extends('master-layout')
@section('title')
	CREAT Children
@endsection

@section('content')
	<body>

	<section class="page-top container">
		<div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
			<div class="row">
				<ul class="ul-td">
					<li _ngcontent-c16="" class="level1"><a _ngcontent-c16="">HOME</a></li>
					<li _ngcontent-c16="" class="active1" style="pointer-events:none"><a _ngcontent-c16="">CHILDREN PROFILES</a></li>
					<li _ngcontent-c16="" class="active1 active-1" style="pointer-events:none;"><a _ngcontent-c16="">ADD CHILD</a></li>
				</ul>
			</div>
		</div>
		@if(session('notify'))
			<div class="alert alert-success">
				{{session('notify')}}
			</div>

		@endif
		<form style="width: auto;
    margin: 0 0;
    text-align: center" action="kids-now/children/add" method="post" name="form">
			@csrf
		<div class="mat-card">
			<div class="mat-content">
				<button class="accordion add-staff">ADD CHILD</button>
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
							        <input type="text" name="first_name" placeholder="First Name" value="{{old('first_name')}}">
							    </div>
								<div class="col-md-6 input_box">
							        <span>Last Name *</span>
							        <input type="text" name="last_name" placeholder="Last Name *" value="{{old('last_name')}}">
							    </div>
							</div>
						</div>
					</div>
				</div>
				<hr style="margin: 0;">
				<div class="row">
					<div class="add">
						<div class="col-md-3 input_box">
							<span>Birthday *</span>
							<input type="date" name="birthday" placeholder="Birthday" value="{{old('birthday')}}">
						</div>
						<div class="col-md-3 input_box">
							<span>Blood Group *</span>
							<select name="blood_group">
								<option>Blood Group</option>
								<option value="A+" @if(old('blood_group') == "A+") selected="selected" @endif>A+</option>
								<option value="A-" @if(old('blood_group') == "A-") selected="selected" @endif>A-</option>
								<option value="B+" @if(old('blood_group') == "B+") selected="selected" @endif>B+</option>
								<option value="B-" @if(old('blood_group') == "B-") selected="selected" @endif>B-</option>
								<option value="O+" @if(old('blood_group') == "O+") selected="selected" @endif>O+</option>
								<option value="O-" @if(old('blood_group') == "O-") selected="selected" @endif>O-</option>
								<option value="AB+" @if(old('blood_group') == "AB+") selected="selected" @endif>AB+</option>
								<option value="AB-" @if(old('blood_group') == "AB-") selected="selected" @endif>AB-</option>
							</select>
						</div>
						<div class="col-md-3 input_box">
							<span>Gender</span>
							<select name="gender">
								<option selected="selected">Gender</option>
								<option value="1" @if(old('gender') == 1) selected="selected" @endif>Nam</option>
								<option value="0" @if(old('gender') == 0) selected="selected" @endif>Nữ</option>
							</select>
						</div>
						<div class="col-md-3 input_box">
							<span>Date of Joining *</span>
							<input type="date" name="date_of_joining" placeholder="Date of Joining" value="{{old('date_of_joining')}}">
						</div>
					</div>
				</div>
				<div class="add">
					<div class="input_box" style="width: 100%;">
						<span>Unique ID *</span>
						<input type="text" name="unique_id" placeholder="Unique ID">
					</div>
					<div class="input_box" style="width: 100%;">
						<span>Residential Address *</span>
						<input type="text" name="address" placeholder="Residential Address">
					</div>
					<div class="input_box" style="width: 100%;">
						<span>Allergies (if any) *</span>
						<input type="text" name="allergies" placeholder="Allergies (if any)">
					</div>
					<div class="input_box" style="width: 100%;">
						<span>Additional Notes *</span>
						<input type="text" name="additional_note" placeholder="Additional Notes">
					</div>
				</div>
				<div>
					<span>Exist</span>
					<br>
					<input type="radio" name="exist" value="1" @if(old('exist') == 1) {{'checked'}} @endif> Yes<br>
					<input type="radio" name="exist" value="0" @if(old('exist') == 0) {{'checked'}} @endif> No<br>
				</div>
				<div>
					<span>Status</span>
					<br>
					<input type="radio" name="status" value="1" @if(old('status') == 1) {{'checked'}} @endif> Yes<br>
					<input type="radio" name="status" value="0" @if(old('status') == 0) {{'checked'}} @endif> No<br>
				</div>
			</div>
		</div>
		
		<div class="mat-card">
			<div class="mat-content">
				<button class="accordion" type="button">Programs</button>
				<div class="panel">
					<div _ngcontent-c20="" class="row" style="">
						<!---->
						@foreach($programs as $program)
							<div _ngcontent-c20="" align="center" class="col-xs-6 col-sm-4 col-md-3 col-lg-2 ng-star-inserted" style="padding:10px;cursor:pointer">
								<button _ngcontent-c20="" class="btn progBtn limitText bgClass tablinks1" style="background-color:transparent;border:1px solid #5363d6;border-radius: 4px" type="button" value="{{$program->id}}">{{$program->program_name}}</button>
							</div>
						@endforeach
						<input id="array_program" type="hidden" value="" name="programs">
					</div>
				</div>
			</div>
		</div>
		
		<div class="mat-card" style="background-color: #f9f9f9;">
			<div class="mat-content">
				<button class="accordion" type="button">Parents *</button>
				<div class="panel" style="background-color: #f9f9f9;margin-bottom: 0;margin: 0 -10px;">
					<div class="panel-1">					
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
											<input  type="text" name="first_name_parent" placeholder="First Name*">
										</div>
										<div class="col-md-6 input_box">
											<span>Last Name *</span>
											<input type="text" name="last_name_parent" placeholder="Last Name *">
										</div>
									</div>
									<div class="row">
										<div class="col-md-6 input_box">
											<span>Phone Number *</span>
											<input type="text" name="phone_parent" placeholder="Phone Number *">
										</div>
										<div class="col-md-6 input_box">
											<span>RELATION *</span>
											<select name="relationship">
												<option>RELATION</option>
												<option>Mother</option>
												<option>Father</option>
												<option>Grandfather</option>
												<option>Grandmother</option>
												<option>Uncle</option>
												<option>Aunt</option>
												<option>Guardian</option>
											</select>
										</div>
									</div>
									<div class="input_box" style="width: 100%;">
										<span>E-Mail Address *</span>
										<input type="email" name="email_parent" placeholder="E-Mail Address">
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
				<button type="reset">
					<span>CANCEL</span>
				</button>
				<button class="button2" type="submit" id="submit_button">
					<span>SAVE</span>
				</button>
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
				array.pop(program_pop);
    		}else{
    			$(this).addClass('tablinks1_active');
    			var program_push = $(this).val();
    			array.push(program_push);
    		}
			console.log(array);
    	});

		$('#submit_button').click(function(event) {
			$('#array_program').attr('value', array);
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
