@extends('master-layout')
@section('title')
	Edit Program
@endsection

@section('content')
	<style>
		.panel{
			max-height: 9000px !important;
		}
	</style>
	<body>
	<section class="page-top container">
		<div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
			<div class="row">
				<ul class="ul-td">
					<li class="level1"><a href="kids-now">HOME</a></li>
					<li class="active1" style="pointer-events:none"><a href="kids-now/program">PROGRAM</a></li>
					<li class="active1 active-1" style="pointer-events:none;"><a href="">EDIT PROGRAM</a></li>
				</ul>
			</div>
		</div>
		@if(session('notify'))
			<div class="alert alert-success">
				{{session('notify')}}
			</div>
		@endif
		<form action="kids-now/program/edit/{{$program->id}}" method="post" style="width: 100%" id="editProgram">
			@csrf

			<input type="hidden" name="array_children_new" id="array_children_new" value="">
			<input id="array_children_old" type="hidden" name="array_children_old" value="{{implode(',',$array_children_old)}}">

			<input type="hidden" name="array_staff_new" id="array_staff_new" value="">
			<input id="array_staff_old" type="hidden" name="array_staff_old" value="{{implode(',',$array_staff_old)}}">


			<div class="mat-card">
				<button class="accordion add-staff" type="button">Add Program</button>
				<div class="panel add">
					<div class="row">
						<div class="col-md-4 input_box">
							<span>Program Name *</span>
							<input type="text" name="program_name" id="program_name" placeholder="Program Name *" value="{{$program->program_name}}">
							<p id="error_program_name" style="text-align: left; color: red"></p>
							@if ($errors->has('program_name'))
								<div class="text text-danger">
									{{ $errors->first('program_name') }}
								</div>
							@endif
						</div>
						<div class="col-md-8">
							<div class="row" style="margin: 10px 0;">
								<div class="col-md-2" style="font-size: 18px;color:#5363d6;top:10px">
									Days:
								</div>
								<div class="col-md-10" style="margin: 10px 0;">
									<div class="panel_new">
										<button type="button" class="letterCircle listClass @if(in_array(8, $array_schedule_choose)) tablinks1_active @endif" style="color: #5363d7;" value="8">S</button>
										<button type="button" class="letterCircle listClass @if(in_array(2, $array_schedule_choose)) tablinks1_active @endif" style="color: #5363d7;" value="2">M</button>
										<button type="button" class="letterCircle listClass @if(in_array(3, $array_schedule_choose)) tablinks1_active @endif" style="color: #5363d7;" value="3">T</button>
										<button type="button" class="letterCircle listClass @if(in_array(4, $array_schedule_choose)) tablinks1_active @endif" style="color: #5363d7;" value="4">W</button>
										<button type="button" class="letterCircle listClass @if(in_array(5, $array_schedule_choose)) tablinks1_active @endif" style="color: #5363d7;" value="5">T</button>
										<button type="button" class="letterCircle listClass @if(in_array(6, $array_schedule_choose)) tablinks1_active @endif" style="color: #5363d7;" value="6">F</button>
										<button type="button" class="letterCircle listClass @if(in_array(7, $array_schedule_choose)) tablinks1_active @endif" style="color: #5363d7;" value="7">S</button>
									</div>
									<input id="array_schedule_new" type="hidden" value="" name="schedule_new">
									<input id="array_schedule_old" type="hidden" name="schedule_old" value="{{implode(',',$array_schedule_choose)}}">
									@if ($errors->has('schedule'))
										<div class="text text-danger">
											{{ $errors->first('schedule') }}
										</div>
									@endif
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-6 input_box">
									<span>Program Fee(USD) *</span>
									<input type="text" name="program_fee" id="program_fee" placeholder="Program Fee *" value="{{$program->program_fee}}">
									@if ($errors->has('program_fee'))
										<div class="text text-danger">
											{{ $errors->first('program_fee') }}
										</div>
									@endif
								</div>
								<div class="col-md-6 input_box">
									<span>Select *</span>
									<select name="period_fee">
										<option value="" selected>Period Fee</option>
										<option @if($program->period_fee == "/week") selected='selected' @endif value="/week">/week</option>
										<option @if($program->period_fee == "/month") selected='selected' @endif value="/month">/month</option>
										<option @if($program->period_fee == "/year") selected='selected' @endif value="/year">/year</option>
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
							<span>Status</span>
							<select name="status">
								<option @if($program->status == 1) selected='selected' @endif value="1">Open</option>
								<option @if($program->status == 0) selected='selected' @endif value="1">Close</option>
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
										<option value="" selected >Year</option>
										@for($i = 2000; $i <= 3000; $i ++)
											<option @if($program->from_year == $i ) selected="selected" @endif value="{{$i}}">{{$i}}</option>
										@endfor
									</select>
									@if ($errors->has('from_year'))
										<div class="text text-danger">
											{{ $errors->first('from_year') }}
										</div>
									@endif
								</div>
								<div class="col-md-3 input_box">
									<span>Month *</span>
									<select name="from_month">
										<option value="" selected >Month</option>
										@for($i = 1; $i <= 12; $i ++)
											<option @if($program->from_month == $i ) selected="selected" @endif value="{{$i}}">{{$i}}</option>
										@endfor
									</select>
									@if ($errors->has('from_month'))
										<div class="text text-danger">
											{{ $errors->first('from_month') }}
										</div>
									@endif
								</div>
								<div class="col-md-3 input_box">
									<span>Year *</span>
									<select name="to_year">
										<option value="" selected >Year</option>
										@for($i = 2000; $i <= 3000; $i ++)
											<option @if($program->to_year == $i ) selected="selected" @endif value="{{$i}}">{{$i}}</option>
										@endfor
									</select>
									@if ($errors->has('to_year'))
										<div class="text text-danger">
											{{ $errors->first('to_year') }}
										</div>
									@endif
								</div>
								<div class="col-md-3 input_box">
									<span>Month *</span>
									<select name="to_month">
										<option value="" selected >Month</option>
										@for($i = 1; $i <= 12; $i ++)
											<option @if($program->to_month == $i ) selected="selected" @endif value="{{$i}}">{{$i}}</option>
										@endfor
									</select>
									@if ($errors->has('to_month'))
										<div class="text text-danger">
											{{ $errors->first('to_month') }}
										</div>
									@endif
								</div>

							</div>
						</div>
						<div class="col-md-5">
							<div class="row">
								<div class="col-md-6 input_box">
									<span>HH:MM *</span>
									<input type="time" name="start_time" value="{{$program->start_time}}">
									@if ($errors->has('start_time'))
										<div class="text text-danger">
											{{ $errors->first('start_time') }}
										</div>
									@endif
								</div>
								<div class="col-md-6 input_box">
									<span>HH:MM *</span>
									<input type="time" name="finish_time" value="{{$program->finish_time}}">
									@if ($errors->has('finish_time'))
										<div class="text text-danger">
											{{ $errors->first('finish_time') }}
										</div>
									@endif
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<form class="typeahead" role="search">
				<input type="search" name="q2" class="form-control search-input2" placeholder="Search Staff..." autocomplete="off" style="line-height: 1.6;font-size: 18px;border: 2px solid #ccc; padding: 0 5px; width: 500px;">
			</form>
			<div class="mat-card">
				<div class="mat-content">
					<button class="accordion accordion1 clearfix" type="button">
						<p style="float: left;margin: 10px 0 !important;">Staff *</p>
						<a href="kids-now/program/select_staff" style="float: right;text-align: right">
							<p style="color: #fff;border: 1px solid #ff4081;padding: 5px;margin: 5px 0;background: #ff4081;border-radius: 5px;text-decoration: none;">SELECT</p>
						</a>
					</button>
					<div class="panel">
						<div _ngcontent-c20="" class="row" style="" id="staff_list">
							@foreach($staff_in_program as $staff)
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 ng-star-inserted select-child-img select-child-img1" style="">
									<div class="child-class" style="height: 120px;text-align: center;">
										<div class="image">
											<img class="img-circle" height="80" onerror="this.src='images/Staff.png';" style="height: 80px" width="80" src="{{$staff->image}}">
											<input type="hidden" value="{{$staff->id}}">
											<button class="btn btn-xs btn-danger" onclick="deleteStaff({{$staff->id}})">X</button>
											<span class="limitText ng-star-inserted">{{$staff->first_name}} {{$staff->last_name}}</span>
										</div>
									</div>
								</div>
							@endforeach
							<!---->
							{{-- ajax ProgramController@addSelectStaff do vao day--}}
							<!---->
						</div>
					</div>
				</div>
			</div>
			<form class="typeahead" role="search">
				<input type="search" name="q" class="form-control search-input children-items" placeholder="Search Children..." autocomplete="off" style="line-height: 1.6;font-size: 18px;border: 2px solid #ccc; padding: 0 5px; width: 500px;">
			</form>
			<div class="mat-card">
				<div class="mat-content">
					<button class="accordion accordion1 clearfix" type="button">
						<p style="float: left;">Childrens *</p>
						<a href="kids-now/program/select_child" style="float: right;text-align: right">
							<p style="color: #fff;border: 1px solid #ff4081;padding: 5px;margin: 5px 0;background: #ff4081;border-radius: 5px;text-decoration: none;">SELECT</p>
						</a>
					</button>
					<div class="panel">
						<div _ngcontent-c20="" class="row" id="children_list">
							@foreach($children_in_program as $children)
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 ng-star-inserted select-child-img select-child-img1" style="">
									<div class="child-class" style="height: 120px;text-align: center;">
										<div class="image">
											<img class="img-circle" height="80" onerror="this.src='images/Child.png';" style="height: 80px" width="80" src="{{$children->image}}">
											<input type="hidden" value="{{$children->id}}">
											<button class="btn btn-xs btn-danger" onclick="deleteChild({{$children->id}})">X</button>
											<span class="limitText ng-star-inserted">{{$children->first_name}} {{$children->last_name}}</span>
										</div>
									</div>
								</div>
							@endforeach
							<!---->
							{{-- ajax ProgramController@addSelectChildren do vao day--}}
							<!---->
						</div>
					</div>
				</div>
			</div>

			<div class="comment">
				<p id="error_total" style="text-align: center; color: red"></p>
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
		var array = $('#array_schedule_old').val().split(',');

    	$('.listClass').click(function(event) {
    		if ($(this).hasClass('tablinks1_active')) {
    			$(this).removeClass('tablinks1_active');
				var schedule_pop = $(this).val();
				array.splice( array.indexOf(schedule_pop), 1 );
    		}else{
    			$(this).addClass('tablinks1_active');
				var schedule_push = $(this).val();
				array.push(schedule_push);
    		}
			console.log(array);
    	});

		//begin select children

		var array_children = $('#array_children_old').val().split(',').map(Number)

		function deleteChild(id_children) {
			array_children.splice( array_children.indexOf(id_children), 1 );
			console.log('array children sau khi xoa: '+array_children)
		}

		function getIdChildren(id){
			$.ajax({
				type: 'get',
				url: '{{ URL::to('kids-now/program/select_child/add') }}',
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
						//cho nay them 1 alert children da ton tai
						console.log('children exists')
					}
				}
			});
		}
		//end select children

		//begin select staff
		var array_staff = $('#array_staff_old').val().split(',').map(Number)

		function deleteStaff(id_staff) {
			array_staff.splice( array_staff.indexOf(id_staff), 1 );
			console.log('array staff sau khi xoa: '+array_staff)
		}

		function getIdStaff(id){
			$.ajax({
				type: 'get',
				url: '{{ URL::to('kids-now/program/select_staff/add') }}',
				data: {
					'id_staff' : id
				},
				success: function(data){
					if (! array_staff.includes(id)){
						$('#staff_list').append(data);
						array_staff.push(id)
						console.log('id staff them vao:'+id)
						console.log('day la array staff khi them: ' + array_staff);
					}else {
						//cho nay them 1 alert children da ton tai
						console.log('staff exists')
					}
				}
			});
		}
		//end select staff

		//begin validate

		$('#program_name').focusout(function () {
			if ( $('#program_name').val() !== ""){
				$('#error_program_name').html('')
			}else {
				$('#error_program_name').html('This field must not be empty')
			}
		})
		//end validate


		$('#submit_button').click(function() {
			if ( $('#program_name').val() === ""){
				$('#error_total').html('please check the form again');
			}else {
				$('#array_schedule_new').attr('value', array);
				$('#array_children_new').attr('value', array_children);
				$('#array_staff_new').attr('value', array_staff);
				$('#editProgram').submit();
			}
		});

    </script>
	<script >
		$('.btn-danger').click(function() {
			$(this).parent('div').parent('div').parent('div').hide();
		})
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function($) {
			var engine1 = new Bloodhound({
				remote: {
					url: 'http://localhost:8000/kids-now/program/search/children?q=%QUERY%',
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
							'<div class="list-group search-results-dropdown" style="width: 500px;"><div class="list-group-item">Nothing found.</div></div>'
						],
						header: [

						],
						suggestion: function (data) {
							return '<a onclick="getIdChildren('+data.id+')" class="list-group-item" id="children-items" style="width: 500px;"> ' + data.first_name +' '+ data.last_name + '<i class="fa fa-plus" style="height: 10px; float: right !important;"></i>'+'</a>';
						}
					}
				},
			]);

			var engine2 = new Bloodhound({
				remote: {
					url: 'http://localhost:8000/kids-now/program/search/staff?q2=%QUERY%',
					wildcard: '%QUERY%'
				},
				datumTokenizer: Bloodhound.tokenizers.whitespace('q2'),
				queryTokenizer: Bloodhound.tokenizers.whitespace
			});

			$(".search-input2").typeahead({
				hint: true,
				highlight: true,
				minLength: 1
			}, [
				{
					source: engine2.ttAdapter(),
					name: 'staff_profiles',
					display: function(data) {
						return data.name;
					},
					templates: {
						empty: [
							'<div class="list-group search-results-dropdown" style="width: 500px;"><div class="list-group-item">Nothing found.</div></div>'
						],
						header: [

						],
						suggestion: function (data) {
							return '<a onclick="getIdStaff('+data.id+')" class="list-group-item" style="width: 500px;"> ' + data.first_name +' '+ data.last_name + '<i class="fa fa-plus" style="height: 10px; float: right !important;"></i>'+'</a>';
						}
					}
				},
			]);
		});
	</script>
@endsection
