@extends('master-layout')
@section('title')
	Edit Program
@endsection

@section('content')
<body>
	<section class="page-top container">
		<div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
			<div class="row">
				<ul class="ul-td">
					<li _ngcontent-c16="" class="level1"><a _ngcontent-c16="">HOME</a></li>
					<li _ngcontent-c16="" class="active1" style="pointer-events:none"><a _ngcontent-c16="">PROGRAM</a></li>
					<li _ngcontent-c16="" class="active1 active-1" style="pointer-events:none;"><a _ngcontent-c16="">EDIT PROGRAM</a></li>
				</ul>
			</div>
		</div>
		<div class="mat-card">
			<button class="accordion accordion1 clearfix">
				<p style="float: left;margin: 10px 0 !important;">EDIT PROGRAM *</p>
				<a href="#" style="float: right;text-align: right" data-toggle="modal" data-target=".bd-example-modal-sm">
					<p style="color: #fff;border: 1px solid #ff4081;padding: 5px;margin: 5px 0;background: #f44336;border-radius: 5px;text-decoration: none;">DELETE</p>
				</a>
			</button>
			<div class="panel add">
				<div class="row">
					<div class="col-md-4 input_box">
						<span>Program Name *</span>
						<input type="text" name="text" placeholder="Program Name *">
					</div>
					<div class="col-md-8">
						<div class="row" style="margin: 10px 0;">
							<div class="col-md-2" style="font-size: 18px;color:#5363d6;top:10px">
								Days:
							</div>
							<div class="col-md-10" style="margin: 10px 0;">
								<div class="panel_new">
									<div class="letterCircle listClass" style="color: #5363d7;">S</div>
									<div class="letterCircle listClass" style="color: #5363d7;">M</div>
									<div class="letterCircle listClass" style="color: #5363d7;">T</div>
									<div class="letterCircle listClass" style="color: #5363d7;">W</div>
									<div class="letterCircle listClass" style="color: #5363d7;">T</div>
									<div class="letterCircle listClass" style="color: #5363d7;">F</div>
									<div class="letterCircle listClass" style="color: #5363d7;">S</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-6 input_box">
								<span>Program Free(USD) *</span>
								<input type="text" name="text" placeholder="Program Name *">
							</div>
							<div class="col-md-6 input_box">
								<span>select *</span>
								<select>
									<option>/week</option>
									<option>/month</option>
									<option>/year</option>
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
								<select>
									<option>0</option>
									<option>1</option>
									<option>2</option>
								</select>
							</div>
							<div class="col-md-3 input_box">
								<span>Month *</span>
								<select>
									<option>0</option>
									<option>1</option>
									<option>2</option>
								</select>
							</div>
							<div class="col-md-3 input_box">
								<span>Year *</span>
								<select>
									<option>0</option>
									<option>1</option>
									<option>2</option>
								</select>
							</div>
							<div class="col-md-3 input_box">
								<span>Month *</span>
								<select>
									<option>0</option>
									<option>1</option>
									<option>2</option>
								</select>
							</div>
							
						</div>
					</div>
					<div class="col-md-5">
						<div class="row">
							<div class="col-md-6 input_box">
								<span>HH:MM *</span>
								<input type="time" name="time" >
							</div>
							<div class="col-md-6 input_box">
								<span>HH:MM *</span>
								<input type="time" name="time" >
							</div>
						</div>
					</div>
				</div>
				<div class="comment">
					<div class="button" style="text-align: center;">
						<button class="button2">
							<span>RESET</span>
						</button>
					</div>
				</div>
			</div>
		</div>
		
		<div class="mat-card">
			<div class="mat-content">
				<button class="accordion accordion1 clearfix">
					<p style="float: left;margin: 10px 0 !important;">Staff *</p>
					<a href="select-staff.html" style="float: right;text-align: right">
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
				<button class="accordion accordion1 clearfix">
					<p style="float: left;">Permissions *</p>
					<a href="Select-Child-program.html" style="float: right;text-align: right">
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
				<button>
					<span>CANCEL</span>
				</button>
				<button class="button2">
					<span>SAVE</span>
				</button>
			</div>
		</div>
		<div class="modal fade bd-example-modal-sm modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-sm" style="">
			    <div class="modal-content" style="font-size: 18px;">
					<h3>Aler</h3>
					<hr style="clear:both;margin-top:0px;margin-bottom:0px">
					<div align="center">
						<p style="margin: 0;font-size: 18px;">Do you want to delete this program?</p>
					</div>
					<hr style="clear:both;margin-top:0px;margin-bottom:0px">
					<div class="row" style="margin: 0;">
						<div class="col-xs-6 col-md-6 mat-dialog-actions " style="border-right: 1px solid lightgrey;">
							<button class="mat-button-class" style="color: #5363d6;border-left: 1px solid transparent;">
								<span class="mat-button-wrapper">YES</span>
							</button>
						</div>
						<div class="col-xs-6 col-md-6 mat-dialog-actions">
							<button class="mat-button-class" style="color: red;">
								<span class="mat-button-wrapper">NO</span>
							</button>
						</div>
					</div>
			    </div>
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
    	$('.listClass').click(function(event) {
    		if ($(this).prop('class')=='letterCircle listClass tablinks1_active') {
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
