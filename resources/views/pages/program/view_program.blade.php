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
					<li class="level1"><a href="{{route('admin.home')}}">HOME</a></li>
					<li class="active1" ><a href="{{route('admin.program.index')}}">PROGRAM</a></li>
					<li class="active1 active-1" style="pointer-events: none;"><a href="">VIEW PROGRAM</a></li>

				</ul>
			</div>
		</div>
		<div class="mat-card">
			<div class="mat-content">
				<button class="accordion add-staff">@lang('kidsnow.program.view_program')</button>
				<div class="panel add">
					<div class="row">
						<div class="col-md-4 input_box">
							<span class="input_box_span_active">@lang('kidsnow.program.program_name') *</span>
							<input type="text" name="text" placeholder="Program Name *" value="{{$program->program_name}}">
						</div>
						<div class="col-md-8">
							<div class="row" style="margin: 10px 0;" >
								<div class="col-md-2" style="font-size: 18px;color:#5363d6;top:10px">
									@lang('kidsnow.program.days'):
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
								{{--<div class="col-md-6 input_box">--}}
									{{--<span class="input_box_span_active">@lang('kidsnow.program.program_fee')</span>--}}
									{{--<input type="text" name="text" placeholder="Program Fee " value="{{number_format(floatval($program->program_fee),2)}}">--}}
								{{--</div>--}}
								{{--<div class="col-md-6 input_box">--}}
									{{--<span class="input_box_span_active">@lang('kidsnow.program.period')</span>--}}
									{{--<select>--}}
										{{--<option @if($program->period_fee == '/week') selected="selected" @endif>/week</option>--}}
										{{--<option @if($program->period_fee == '/month') selected="selected" @endif>/month</option>--}}
										{{--<option @if($program->period_fee == '/year') selected="selected" @endif>/year</option>--}}
									{{--</select>--}}
								{{--</div>--}}
								<div class="col-md-5 input_box">
									<span class="input_box_span_active">@lang('kidsnow.program.program_fee')</span>
									<input type="text" name="program_fee" id="program_fee" placeholder="@lang('kidsnow.program.program_fee')" value="{{($program->program_fee)}}">
									@if ($errors->has('program_fee'))
										<div class="text text-danger">
											{{ $errors->first('program_fee') }}
										</div>
									@endif
								</div>
								<div class="col-md-3 input_box">
									<span>@lang('kidsnow.program.currency')</span>
									<select name="currency">
										<option value="" selected>@lang('kidsnow.program.currency')</option>
										<option @if(old('currency') == "VND") selected='selected' @endif value="VND">/VND</option>
										<option @if(old('currency') == "USD") selected='selected' @endif value="USD">/USD</option>
										<option @if(old('currency') == "EUR") selected='selected' @endif value="EUR">/EUR</option>
									</select>
									@if ($errors->has('period_fee'))
										<div class="text text-danger">
											{{ $errors->first('period_fee') }}
										</div>
									@endif
								</div>
								<div class="col-md-4 input_box">
									<span class="input_box_span_active">@lang('kidsnow.program.period')</span>
									<select name="period_fee">
										<option value="" selected>Period Fee</option>
										<option @if($program->period_fee == "/week") selected='selected' @endif value="/week">@lang('kidsnow.program.week')</option>
										<option @if($program->period_fee == "/month") selected='selected' @endif value="/month">@lang('kidsnow.program.month')</option>
										<option @if($program->period_fee == "/year") selected='selected' @endif value="/year">@lang('kidsnow.program.year')</option>
									</select>
									@if ($errors->has('period_fee'))
										<div class="text text-danger">
											{{ $errors->first('period_fee') }}
										</div>
									@endif
								</div>
							</div>
						</div>
						<div class="col-md-6 input_box">
							<span class="input_box_span_active">@lang('kidsnow.program.status')</span>
							<select name="status">
								<option @if($program->status == 1) selected='selected' @endif value="1">@lang('kidsnow.program.open')</option>
								<option @if($program->status == 0) selected='selected' @endif value="1">@lang('kidsnow.program.close')</option>
							</select>
							@if ($errors->has('status'))
								<div class="text text-danger">
									{{ $errors->first('status') }}
								</div>
							@endif
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-7">
							<p style="color:#5363d6;font-size: 18px;">@lang('kidsnow.program.age_group')</p>
						</div>
						<div class="col-md-5">
							<p style="color:#5363d6;font-size: 18px;">@lang('kidsnow.program.timings')</p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-7">
							<div class="row">
								<div class="col-md-6"><span style="font-size: 14px;">@lang('kidsnow.program.from')</span></div>
								<div class="col-md-6"><span style="font-size: 14px;">@lang('kidsnow.program.to')</span></div>
							</div>
						</div>
						<div class="col-md-5"></div>
					</div>
					<div class="row">
						<div class="col-md-7">
							<div class="row">
								<div class="col-md-3 input_box">
									<span class="input_box_span_active">@lang('kidsnow.program.from_year') </span>
									<select name="from_year">
										<option value="">{{$program->from_year}}</option>
									</select>
								</div>
								<div class="col-md-3 input_box">
									<span class="input_box_span_active">@lang('kidsnow.program.from_month') </span>
									<select name="from_month">
										<option value="">{{$program->from_month}}</option>
									</select>
								</div>
								<div class="col-md-3 input_box">
									<span class="input_box_span_active">@lang('kidsnow.program.to_year') </span>
									<select name="to_year">
										<option value="">{{$program->to_year}}</option>
									</select>
								</div>
								<div class="col-md-3 input_box">
									<span class="input_box_span_active">@lang('kidsnow.program.to_month') </span>
									<select name="to_month">
										<option value="">{{$program->to_month}}</option>
									</select>
								</div>

							</div>
						</div>
						<div class="col-md-5">
							<div class="row">
								<div class="col-md-6 input_box">
									<span class="input_box_span_active">@lang('kidsnow.program.start_time')</span>
									<input type="text" class="timepicker" name="time" value="{{$program->start_time}}">
								</div>
								<div class="col-md-6 input_box">
									<span class="input_box_span_active">@lang('kidsnow.program.finish_time') </span>
									<input type="text" class="timepicker" name="time" value="{{$program->finish_time}}">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="mat-card">
			<div class="mat-content">
				<button class="accordion">@lang('kidsnow.program.staff')</button>
				<div class="panel">
					<div _ngcontent-c20="" class="row" style="">
						<!---->
						@if(count($staff_profiles) > 0)
							@foreach($staff_profiles as $staff)
							<div _ngcontent-c19="" class="div_box_staff col-lg-2 col-md-2 col-sm-2 col-xs-6 ng-star-inserted select-child-img select-child-img1">
								<div _ngcontent-c19="" class="child-class" style="height: 120px;text-align: center;">
									<div _ngcontent-c9="" class="image" >
										<img _ngcontent-c19="" class="img-circle" onerror="this.src='images/Staff.png';" style="height: 80px" width="80" src="{{$staff->image}}">
										<i _ngcontent-c9="" aria-hidden="true" class="fa fa-check checked" id="checked"></i>
										<!---->
										<span _ngcontent-c19="" class="limitText ng-star-inserted">{{$staff->first_name}} {{$staff->last_name}}</span>
										<input type="hidden" value="{{$staff->id}}" class="link_to_children">
									</div>
									<!---->
								</div>
							</div>
							@endforeach
						@else
							<p style="font-size: 18px; margin: 10px;">@lang('kidsnow.program.no_staff')</p>
						@endif
					</div>
				</div>
			</div>
		</div>
		<div class="mat-card">
			<div class="mat-content">
				<button class="accordion">@lang('kidsnow.program.children')</button>
				<div class="panel">
					<div _ngcontent-c20="" class="row" style="">
						<!---->
						@if(count($staff_profiles) > 0)
							@foreach($children_profiles as $children)
							<div _ngcontent-c19="" class="div_box_children col-lg-2 col-md-2 col-sm-2 col-xs-6 ng-star-inserted select-child-img select-child-img1">
								<div _ngcontent-c19="" class="child-class" style="height: 120px;text-align: center;">
									<div _ngcontent-c9="" class="image" >
										<img _ngcontent-c19="" class="img-circle" onerror="this.src='images/Child.png';" style="height: 80px" width="80" src="{{$children->image}}">
										<i _ngcontent-c9="" aria-hidden="true" class="fa fa-check checked" id="checked"></i>
										<!---->
										<span _ngcontent-c19="" class="limitText ng-star-inserted" >{{$children->first_name}} {{$children->last_name}}</span>
										<input type="hidden" value="{{$children->id}}" class="link_to_children">
									</div>
									<!---->
								</div>
							</div>
							@endforeach
						@else
							<p style="font-size: 18px; margin: 10px;">@lang('kidsnow.program.no_children')</p>
						@endif
					</div>
				</div>
			</div>
		</div>


		<div class="icon-plus" title="edit">
			<a href="{{route('admin.program.edit',['id'=>$program->id])}}">
				<i class="fa fa-edit"></i>
			</a>
		</div>

		<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<ul style="margin-left: 0">
						<li style="color: #5363d6!important">Go to</li>
						<li class="modal-li" data-href="" id="profile">Profile</li>
						<li class="modal-li" data-href="" id="health">Health</li>
						<li class="modal-li" data-href="" id="attachments">Attachments</li>
						<li class="modal-li" data-href="" id="authorised">Authorised Pickups</li>
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
				$('li#profile').attr('data-href','/kids-now/children/view/'+id_children);
				$('li#health').attr('data-href','/kids-now/health/edit/'+id_children);
				$('li#attachments').attr('data-href','/kids-now/children/edit/'+id_children);
				$('li#authoriesd').attr('data-href','/kids-now/children/edit/'+id_children);
			});

			$('div.div_box_staff').click(function () {
				var id_staff = $(this).children('div').children('div').children('input').val();
				$('li#profile').attr('data-href','/kids-now/staff/edit/'+id_staff);
				$('li#health').attr('data-href','/kids-now/health/edit/'+id_children);
				$('li#attachments').attr('data-href','/kids-now/children/edit/'+id_children);
				$('li#authoriesd').attr('data-href','/kids-now/children/edit/'+id_children);
			});

			$(".modal-li").click(function() {
				window.document.location = $(this).data("href");
			});
		})
	</script>
@endsection
