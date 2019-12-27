@extends('master-layout')
@section('title')
	Add Program
@endsection

@section('content')
<body>
	<section class="page-top container">
		<div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
			<div class="row">
				<ul class="ul-td">
					<li _ngcontent-c16="" class="level1"><a href="kids-now">HOME</a></li>
					<li _ngcontent-c16="" class="active1" style="pointer-events:none"><a href="kids-now/program">PROGRAM</a></li>
					<li _ngcontent-c16="" class="active1 active-1" style="pointer-events:none;"><a href="">ADD PROGRAM</a></li>
				</ul>
			</div>
		</div>
		<form action="kids-now/program/add" method="post" style="width: 100%">
			@csrf
		<div class="mat-card">
			<button class="accordion add-staff" type="button">Add Program</button>
			<div class="panel add">
				<div class="row">
					<div class="col-md-4 input_box">
						<span>Program Name *</span>
						<input type="text" name="program_name" placeholder="Program Name *" value="{{old('program_name')}}">
					</div>
					<div class="col-md-8">
						<div class="row" style="margin: 10px 0;">
							<div class="col-md-2" style="font-size: 18px;color:#5363d6;top:10px">
								Days:
							</div>
							<div class="col-md-10" style="margin: 10px 0;">
								<div class="panel_new">
									<button type="button" class="letterCircle listClass" style="color: #5363d7;" value="8">S</button>
									<button type="button" class="letterCircle listClass" style="color: #5363d7;" value="2">M</button>
									<button type="button" class="letterCircle listClass" style="color: #5363d7;" value="3">T</button>
									<button type="button" class="letterCircle listClass" style="color: #5363d7;" value="4">W</button>
									<button type="button" class="letterCircle listClass" style="color: #5363d7;" value="5">T</button>
									<button type="button" class="letterCircle listClass" style="color: #5363d7;" value="6">F</button>
									<button type="button" class="letterCircle listClass" style="color: #5363d7;" value="7">S</button>
								</div>
								<input type="hidden" name="schedule" id="schedule" value="">
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-6 input_box">
								<span>Program Fee(USD) *</span>
								<input type="text" name="program_fee" placeholder="Program Fee *" value="{{old('program_fee')}}">
							</div>
							<div class="col-md-6 input_box">
								<span>Select *</span>
								<select name="period_fee">
									<option @if(old('period_fee') == "/week") selected='selected' @endif value="/week">/week</option>
									<option @if(old('period_fee') == "/month") selected='selected' @endif value="/month">/month</option>
									<option @if(old('period_fee') == "/year") selected='selected' @endif value="/year">/year</option>
								</select>
							</div>
						</div>
					</div>
					<div class="col-md-6"></div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-7">
						<p style="color:#5363d6;font-size: 18px;">Age Group</p>
					</div>
					<div class="col-md-5">
						<p style="color:#5363d6;font-size: 18px;">Timings</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-7">
						<div class="row">
							<div class="col-md-6"><span style="font-size: 14px;">From:</span></div>
							<div class="col-md-6"><span style="font-size: 14px;">To:</span></div>
						</div>
					</div>
					<div class="col-md-5"></div>
				</div>
				<div class="row">
					<div class="col-md-7">
						<div class="row">
							<div class="col-md-3 input_box">
								<span>Year *</span>
								<select name="from_year">
									@for($i = 2000; $i <= 3000; $i ++)
										<option @if(old('from_year') == $i ) selected="selected" @endif value="{{$i}}">{{$i}}</option>
									@endfor
								</select>
							</div>
							<div class="col-md-3 input_box">
								<span>Month *</span>
								<select name="from_month">
									@for($i = 1; $i <= 12; $i ++)
										<option @if(old('from_month') == $i ) selected="selected" @endif value="{{$i}}">{{$i}}</option>
									@endfor
								</select>
							</div>
							<div class="col-md-3 input_box">
								<span>Year *</span>
								<select name="to_year">
									@for($i = 2000; $i <= 3000; $i ++)
										<option @if(old('to_year') == $i ) selected="selected" @endif value="{{$i}}">{{$i}}</option>
									@endfor
								</select>
							</div>
							<div class="col-md-3 input_box">
								<span>Month *</span>
								<select name="to_month">
									@for($i = 1; $i <= 12; $i ++)
										<option @if(old('to_month') == $i ) selected="selected" @endif value="{{$i}}">{{$i}}</option>
									@endfor
								</select>
							</div>
							
						</div>
					</div>
					<div class="col-md-5">
						<div class="row">
							<div class="col-md-6 input_box">
								<span>HH:MM *</span>
								<input type="time" name="start_time" value="{{old('start_time')}}">
							</div>
							<div class="col-md-6 input_box">
								<span>HH:MM *</span>
								<input type="time" name="finish_time" value="{{old('finish_time')}}">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="mat-card">
			<div class="mat-content">
				<button class="accordion accordion1 clearfix" type="button">
					<p style="float: left;margin: 10px 0 !important;">Staff *</p>
					<a href="kids-now/program/select_staff" style="float: right;text-align: right">
						<p style="color: #fff;border: 1px solid #ff4081;padding: 5px;margin: 5px 0;background: #ff4081;border-radius: 5px;text-decoration: none;">SELECT</p>
					</a>
				</button>
				<div class="panel">
					<div _ngcontent-c20="" class="row" style="">
						<!---->
						<div _ngcontent-c19="" class="col-lg-2 col-md-2 col-sm-2 col-xs-6 ng-star-inserted select-child-img select-child-img1"  onclick="myFunction()">
							<div _ngcontent-c19="" class="child-class" style="height: 120px;text-align: center;">
								<div _ngcontent-c9="" class="image">
									<img _ngcontent-c19="" class="img-circle" height="80" onerror="this.src='images/Staff.png';" width="80" src="Child.png">
									<i _ngcontent-c9="" aria-hidden="true" class="fa fa-check checked" id="checked"></i>
									<!---->
									<span _ngcontent-c19="" class="limitText ng-star-inserted">Riya Demo Child</span>
								</div>
								<!---->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="mat-card">
			<div class="mat-content">
				<button class="accordion accordion1 clearfix" type="button">
					<p style="float: left;">Childrens *</p>
					<a href="kids-now/program/select_child" style="float: right;text-align: right">
						<p style="color: #fff;border: 1px solid #ff4081;padding: 5px;margin: 5px 0;background: #ff4081;border-radius: 5px;text-decoration: none;">SELECT</p>
					</a>
				</button>
				<div class="panel">
					<div _ngcontent-c20="" class="row" style="">
						<!---->
						<div _ngcontent-c19="" class="col-lg-2 col-md-2 col-sm-2 col-xs-6 ng-star-inserted select-child-img select-child-img1"  onclick="myFunction()">
							<div _ngcontent-c19="" class="child-class" style="height: 120px;text-align: center;">
								<div _ngcontent-c9="" class="image">
									<img _ngcontent-c19="" class="img-circle" height="80" onerror="this.src='images/Child.png';" width="80" src="Child.png">
									<i _ngcontent-c9="" aria-hidden="true" class="fa fa-check checked" id="checked"></i>
									<!---->
									<span _ngcontent-c19="" class="limitText ng-star-inserted">Riya Demo Child</span>
								</div>
								<!---->
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
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="js/jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="js/main.js"></script>
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
    	$('.listClass').click(function(event) {
    		if ($(this).prop('class')=='letterCircle listClass tablinks1_active') {
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
			$('#schedule').attr('value', array);
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
	<script type="text/javascript">
		$('button.accordion_new').click(function(event) {
			if ($(this).siblings('.panel_new').css('display')=='block') {
				$(this).siblings('.panel_new').slideUp();
				$(this).children('i').prop('class', 'fa fa-chevron-circle-down');
			}else{
				$(this).siblings('.panel_new').slideDown();
				$(this).children('i').prop('class', 'fa fa-chevron-circle-up');
			}
		});
	</script>
@endsection
