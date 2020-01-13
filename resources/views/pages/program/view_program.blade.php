@extends('master-layout')
@section('title')
	View Programs
@endsection

@section('content')
<body>
	<section class="page-top container">
		<div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
			<div class="row">
				<ul class="ul-td" style="width: 100%">
					<li class="level1"><a href="kids-now">HOME</a></li>
					<li class="active1" ><a href="kids-now/program">PROGRAM</a></li>
					<li class="active1 active-1" style="pointer-events: none;"><a href="">VIEW PROGRAM</a></li>
				</ul>
			</div>
		</div>
		<div class="mat-card">
			<div class="mat-content">
				<button class="accordion add-staff">VIEW PROGRAM</button>
				<div class="panel add">
					<div class="row">
						<div class="col-md-4 input_box">
							<span class="input_box_span_active">Program Name *</span>
							<input type="text" name="text" placeholder="Program Name *" value="{{$program->program_name}}">
						</div>
						<div class="col-md-8">
							<div class="row" style="margin: 10px 0;" >
								<div class="col-md-2" style="font-size: 18px;color:#5363d6;top:10px">
									Days:
								</div>
								<div class="col-md-10" style="margin: 10px 0;">
									<div class="panel_new">
										<div class="letterCircle listClass @if(in_array(8, $array_schedule)) tablinks1_active @endif" style="color: #5363d7;">S</div>
										<div class="letterCircle listClass @if(in_array(2, $array_schedule)) tablinks1_active @endif" style="color: #5363d7;">M</div>
										<div class="letterCircle listClass @if(in_array(3, $array_schedule)) tablinks1_active @endif" style="color: #5363d7;">T</div>
										<div class="letterCircle listClass @if(in_array(4, $array_schedule)) tablinks1_active @endif" style="color: #5363d7;">W</div>
										<div class="letterCircle listClass @if(in_array(5, $array_schedule)) tablinks1_active @endif" style="color: #5363d7;">T</div>
										<div class="letterCircle listClass @if(in_array(6, $array_schedule)) tablinks1_active @endif" style="color: #5363d7;">F</div>
										<div class="letterCircle listClass @if(in_array(7, $array_schedule)) tablinks1_active @endif" style="color: #5363d7;">S</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-6 input_box">
									<span class="input_box_span_active">Program Fee</span>
									<input type="text" name="text" placeholder="Program Fee " value="{{number_format(floatval($program->program_fee),2)}}">
								</div>
								<div class="col-md-6 input_box">
									<span class="input_box_span_active">Period Fee</span>
									<select>
										<option @if($program->period_fee == '/week') selected="selected" @endif>/week</option>
										<option @if($program->period_fee == '/month') selected="selected" @endif>/month</option>
										<option @if($program->period_fee == '/year') selected="selected" @endif>/year</option>
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
									<span class="input_box_span_active">Year </span>
									<select name="from_year">
										<option value="">{{$program->from_year}}</option>
									</select>
								</div>
								<div class="col-md-3 input_box">
									<span class="input_box_span_active">Month </span>
									<select name="from_month">
										<option value="">{{$program->from_month}}</option>
									</select>
								</div>
								<div class="col-md-3 input_box">
									<span class="input_box_span_active">Year </span>
									<select name="to_year">
										<option value="">{{$program->to_year}}</option>
									</select>
								</div>
								<div class="col-md-3 input_box">
									<span class="input_box_span_active">Month </span>
									<select name="to_month">
										<option value="">{{$program->to_month}}</option>
									</select>
								</div>

							</div>
						</div>
						<div class="col-md-5">
							<div class="row">
								<div class="col-md-6 input_box">
									<span class="input_box_span_active">HH:MM </span>
									<input type="time" name="time" value="{{$program->start_time}}">
								</div>
								<div class="col-md-6 input_box">
									<span class="input_box_span_active">HH:MM </span>
									<input type="time" name="time" value="{{$program->finish_time}}">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="mat-card">
			<div class="mat-content">
				<button class="accordion">Staff</button>
				</button>
				<div class="panel">
					<div _ngcontent-c20="" class="row" style="">
						<!---->
						@if(count($staff_profiles) > 0)
							@foreach($staff_profiles as $staff)
							<div _ngcontent-c19="" class="col-lg-2 col-md-2 col-sm-2 col-xs-6 ng-star-inserted select-child-img select-child-img1"  onclick="myFunction()">
								<div _ngcontent-c19="" class="child-class" style="height: 120px;text-align: center;">
									<div _ngcontent-c9="" class="image">
										<img _ngcontent-c19="" class="img-circle" onerror="this.src='images/Staff.png';" style="height: 80px" width="80" src="{{$staff->image}}">
										<i _ngcontent-c9="" aria-hidden="true" class="fa fa-check checked" id="checked"></i>
										<!---->
										<span _ngcontent-c19="" class="limitText ng-star-inserted">{{$staff->first_name}} {{$staff->last_name}}</span>
									</div>
									<!---->
								</div>
							</div>
							@endforeach
						@else
							<p style="font-size: 18px; margin: 10px;">No staff was chosen</p>
						@endif
					</div>
				</div>
			</div>
		</div>
		
		<div class="mat-card">
			<div class="mat-content">
				<button class="accordion">Children</button>
				<div class="panel">
					<div _ngcontent-c20="" class="row" style="">
						<!---->
						@if(count($staff_profiles) > 0)
							@foreach($children_profiles as $children)
							<div _ngcontent-c19="" class="div_box_children col-lg-2 col-md-2 col-sm-2 col-xs-6 ng-star-inserted select-child-img select-child-img1">
								<div _ngcontent-c19="" class="child-class" style="height: 120px;text-align: center; cursor: pointer">
									<div _ngcontent-c9="" class="image" data-toggle="modal" data-target=".bd-example-modal-sm">
										<img _ngcontent-c19="" class="img-circle" onerror="this.src='images/Child.png';" style="height: 80px" width="80" src="{{$children->image}}">
										<i _ngcontent-c9="" aria-hidden="true" class="fa fa-check checked" id="checked"></i>
										<!---->
										<span _ngcontent-c19="" class="limitText ng-star-inserted">{{$children->first_name}} {{$children->last_name}}</span>
										<input type="hidden" value="{{$children->id}}" class="link_to_children">
									</div>
									<!---->
								</div>
							</div>
							@endforeach
						@else
							<p style="font-size: 18px; margin: 10px;">No children was chosen</p>
						@endif
					</div>
				</div>
			</div>
		</div>


		<div class="icon-plus" title="edit">
			<a href="kids-now/program/edit/{{$program->id}}">
				<i class="fa fa-edit"></i>
			</a>
		</div>

		<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<ul>
						<li style="color: #5363d6!important">Go to</li>
						<li class="modal-li" data-href="" id="profile_children">Profile</li>
						<li class="modal-li" data-href="" id="invoices_children">Invoices</li>
						<li class="modal-li" data-href="" id="attachments_children">Attachments</li>
						<li class="modal-li" data-href="" id="authorised_pickups_children">Authoriesd Pickups</li>
					</ul>
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
    	$('.add > div input').focus(function(event) {
    		alert('Bạn không thể sửa mục này !');
    		$(this).blur();
    	});
    	$('.add > div select').focus(function(event) {
    		alert('Bạn không thể sửa mục này !');
    		$(this).blur();
    	});
    	$('.add div.panel_new > div').click(function(event) {
    		alert('Bạn không thể sửa mục này !');
    		$(this).blur();
    	});
    </script>
	<script>
		$(document).ready(function () {
			$('.accordion').click();

			$('div.div_box_children').click(function () {
				var id_children = $(this).children('div').children('div').children('input').val();
				$('li#profile_children').attr('data-href','/kids-now/children/edit/'+id_children);
				$('li#invoices_children').attr('data-href','/kids-now/children/edit/'+id_children);
				$('li#attachments_children').attr('data-href','/kids-now/children/edit/'+id_children);
				$('li#authoriesd_pickups_children').attr('data-href','/kids-now/children/edit/'+id_children);
			});

			$(".modal-li").click(function() {
				window.document.location = $(this).data("href");
			});
		})
	</script>
@endsection
