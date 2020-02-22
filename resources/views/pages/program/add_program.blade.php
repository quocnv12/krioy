@extends('master-layout')
@section('title')
	Add Program
@endsection

@section('content')
	<style>
		.panel{
			max-height: 9000px !important;
		}
		.tt-input{
			background-color: white !important;
		}
		input.search-custom:focus{
			animation: mymove 0.8s forwards;
			background-color: white;
		}

		@keyframes mymove {
			0% {width: 200px;}
			100% {width: 500px;}
		}
		.twitter-typeahead{
			float: right;
		}
	</style>
<body>
	<section class="page-top container">
		<div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
			<div class="row">
				<ul class="ul-td" style="width: 100%">
					<li class="level1"><a href="{{route('admin.home')}}">HOME</a></li>
					<li class="active1" ><a href="{{route('admin.program.index')}}">PROGRAM</a></li>
					<li class="active1 active-1" style="pointer-events:none;"><a href="">ADD PROGRAM</a></li>
				</ul>
			</div>
		</div>
		<form action="{{route('admin.program.store')}}" method="post" style="width: 100%" id="addProgram">
			@csrf

            <input type="hidden" name="array_all_children" id="array_all_children" value="">
            <input type="hidden" name="array_all_staff" id="array_all_staff" value="">

            <div class="mat-card">
			<button class="accordion add-staff" type="button">@lang('kidsnow.program.add_program')</button>
			<div class="panel add">
				<div class="row">
					<div class="col-md-4 input_box">
						<span>@lang('kidsnow.program.program_name') *</span>
						<input type="text" name="program_name" id="program_name" placeholder="@lang('kidsnow.program.program_name') *" value="{{old('program_name')}}">
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
								@lang('kidsnow.program.days'):
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
							<div class="col-md-5 input_box">
								<span>@lang('kidsnow.program.program_fee')</span>
								<input type="number" min="0" name="program_fee" id="program_fee" placeholder="@lang('kidsnow.program.program_fee')" value="{{old('program_fee')}}">
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
								<span>@lang('kidsnow.program.period')</span>
								<select name="period_fee">
									<option value="" selected>@lang('kidsnow.program.period')</option>
									<option @if(old('period_fee') == "/week") selected='selected' @endif value="/week">@lang('kidsnow.program.week')</option>
									<option @if(old('period_fee') == "/month") selected='selected' @endif value="/month">@lang('kidsnow.program.month')</option>
									<option @if(old('period_fee') == "/year") selected='selected' @endif value="/year">@lang('kidsnow.program.year')</option>
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
						<span>@lang('kidsnow.program.status')</span>
						<select name="status">
							<option value="">@lang('kidsnow.program.status')</option>
							<option @if(old('status') == 1) selected='selected' @endif value="1">@lang('kidsnow.program.open')</option>
							<option @if(old('status') == 0) selected='selected' @endif value="1">@lang('kidsnow.program.close')</option>
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
							<div class="col-md-6"><span style="font-size: 14px;">@lang('kidsnow.program.from'):</span></div>
							<div class="col-md-6"><span style="font-size: 14px;">@lang('kidsnow.program.to'):</span></div>
						</div>
					</div>
					<div class="col-md-5"></div>
				</div>
				<div class="row">
					<div class="col-md-7">
						<div class="row">
							<div class="col-md-3 input_box">
								<span>@lang('kidsnow.program.from_year') </span>
								<select name="from_year">
                                    <option value="" selected >@lang('kidsnow.program.from_year')</option>
									@for($i = 2020; $i <= 2050; $i ++)
										<option @if(old('from_year') == $i ) selected="selected" @endif value="{{$i}}">{{$i}}</option>
									@endfor
								</select>
                                @if ($errors->has('from_year'))
                                    <div class="text text-danger">
                                        {{ $errors->first('from_year') }}
                                    </div>
                                @endif
							</div>
							<div class="col-md-3 input_box">
								<span>@lang('kidsnow.program.from_month') </span>
								<select name="from_month">
                                    <option value="" selected >@lang('kidsnow.program.from_month')</option>
									@for($i = 1; $i <= 12; $i ++)
										<option @if(old('from_month') == $i ) selected="selected" @endif value="{{$i}}">{{$i}}</option>
									@endfor
								</select>
                                @if ($errors->has('from_month'))
                                    <div class="text text-danger">
                                        {{ $errors->first('from_month') }}
                                    </div>
                                @endif
							</div>
							<div class="col-md-3 input_box">
								<span>@lang('kidsnow.program.to_year') </span>
								<select name="to_year">
                                    <option value="" selected >@lang('kidsnow.program.to_year')</option>
									@for($i = 2020; $i <= 2050; $i ++)
										<option @if(old('to_year') == $i ) selected="selected" @endif value="{{$i}}">{{$i}}</option>
									@endfor
								</select>
                                @if ($errors->has('to_year'))
                                    <div class="text text-danger">
                                        {{ $errors->first('to_year') }}
                                    </div>
                                @endif
							</div>
							<div class="col-md-3 input_box">
								<span>@lang('kidsnow.program.to_month') </span>
								<select name="to_month">
                                    <option value="" selected >@lang('kidsnow.program.to_month')</option>
									@for($i = 1; $i <= 12; $i ++)
										<option @if(old('to_month') == $i ) selected="selected" @endif value="{{$i}}">{{$i}}</option>
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
								<span class="input_box_span_active">@lang('kidsnow.program.start_time') </span>
								<input type="text" class="timepicker" name="start_time" value="{{old('start_time')}}">
                                @if ($errors->has('start_time'))
                                    <div class="text text-danger">
                                        {{ $errors->first('start_time') }}
                                    </div>
                                @endif
							</div>
							<div class="col-md-6 input_box">
								<span class="input_box_span_active">@lang('kidsnow.program.finish_time') </span>
								<input type="text" class="timepicker" name="finish_time" value="{{old('finish_time')}}">
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
			<div style="margin: 0px; text-align: center" id="hint">
				<span style="color: red; font-weight: bold">@lang('kidsnow.program.hint')</span>
				@lang('kidsnow.program.hint_content')
			</div>
		<div class="mat-card">
			<div class="mat-content">
				<button class="accordion accordion1 clearfix" type="button">
					<p style="float: left;margin: 10px 0 !important;">@lang('kidsnow.program.staff') </p>
					<form class="typeahead" role="search">
						<input type="search" name="q2" class="form-control search-input2 search-custom" placeholder="@lang('kidsnow.program.search_staff')" autocomplete="off" style="line-height: 1.6;font-size: 18px;border: 2px solid #ccc; padding: 0 5px; width: 200px;">
					</form>
				</button>
				<div class="panel">
					<div _ngcontent-c20="" class="row" style="" id="staff_list">
                        <!---->
                    {{-- ajax ProgramController@addSelectStaff do vao day--}}
                    <!---->
					</div>
				</div>
			</div>
		</div>
		<div class="mat-card">
			<div class="mat-content">
				<button class="accordion accordion1 clearfix" type="button">
					<p style="float: left;">@lang('kidsnow.program.children') </p>
					<form class="typeahead" role="search" style="float: right; text-align: left">
						<input type="search" name="q" class="form-control search-input search-custom" placeholder="@lang('kidsnow.program.search_children')" autocomplete="off" style="line-height: 1.6;font-size: 18px;border: 2px solid #ccc; padding: 0 5px; width: 200px;">
					</form>
				</button>
				<div class="panel">
					<div _ngcontent-c20="" class="row" id="children_list">
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
				<button type="reset" onclick="goBack()">
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
        //begin schedule
		var array = [];
    	$('.listClass').click(function(event) {
    		if ($(this).prop('class')=='letterCircle listClass tablinks1_active') {
    			$(this).removeClass('tablinks1_active');
				var program_pop = $(this).val();
				array.splice( array.indexOf(program_pop), 1 );
    		}else{
    			$(this).addClass('tablinks1_active');
				var program_push = $(this).val();
				array.push(program_push);
    		}
    	});
        //end schedule


        //begin select children
        var array_children = [];

        function deleteChild(id_children) {
            array_children.splice( array_children.indexOf(id_children), 1 );
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
                    }else {
                        alert('The children has existed')
                    }
                }
            });
        }
        //end select children

        //begin select staff
        var array_staff = [];

        function deleteStaff(id_staff) {
            array_staff.splice( array_staff.indexOf(id_staff), 1 );
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
                    }else {
                        alert('The staff has existed')
                    }
                }
            });
        }
        //end select staff

        //begin validate
		if ( $('#program_name').val() !== ""){
			$('#error_program_name').html('')
			$('#error_total').html('');
		}else {
			$('#error_program_name').html('This field is required')
		}

		$('#program_name').focusout(function () {
			if ( $('#program_name').val() !== ""){
				$('#error_program_name').html('')
				$('#error_total').html('');
			}else {
				$('#error_program_name').html('This field is required')
			}
		})
        //end validate


		$('#submit_button').click(function() {
			if ( $('#program_name').val() === ""){
				$('#error_total').html('Something wrong! Please check the form again');
			}else {
				$('#schedule').attr('value', array);
				$('#array_all_children').attr('value', array_children);
				$('#array_all_staff').attr('value', array_staff);
				$('#addProgram').submit();
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
	<script>
		$(document).ready(function () {
			$('.accordion').click();
		})
	</script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function($) {
			var engine1 = new Bloodhound({
				remote: {
					url: 'kids-now/program/search/children?q=%QUERY%',
					wildcard: '%QUERY%'
				},
				datumTokenizer: Bloodhound.tokenizers.whitespace('q'),
				queryTokenizer: Bloodhound.tokenizers.whitespace
			});

			$(".search-input").typeahead({
				hint: true,
				highlight: false,
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
							'<div class="list-group search-results-dropdown" style="padding: 10px; margin: 0;background-color:#EAEDED;color: #424949;width: 500px;"><div class="list-group-item">Nothing found.</div></div>'
						],
						header: [

						],
						suggestion: function (data) {
							return '<a onclick="getIdChildren('+data.id+')" class="list-group-item" style="padding: 10px; margin: 0;background-color:#EAEDED;color: #424949;width: 500px;"> ' + data.first_name +' '+ data.last_name + ' &nbsp('+ (data.birthday).split('-').reverse().join('-') +')<i class="fa fa-plus" style="height: 10px; float: right !important;"></i>'+'</a>';
						}
					}
				},
			]);

			var engine2 = new Bloodhound({
				remote: {
					url: 'kids-now/program/search/staff?q2=%QUERY%',
					wildcard: '%QUERY%'
				},
				datumTokenizer: Bloodhound.tokenizers.whitespace('q2'),
				queryTokenizer: Bloodhound.tokenizers.whitespace
			});

			$(".search-input2").typeahead({
				hint: true,
				highlight: false,
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
							'<div class="list-group search-results-dropdown" style="padding: 10px; margin: 0;background-color:#EAEDED;color: #424949;width: 500px;"><div class="list-group-item">Nothing found.</div></div>'
						],
						header: [

						],
						suggestion: function (data) {
							return '<a onclick="getIdStaff('+data.id+')" class="list-group-item" style="padding: 10px; margin: 0;background-color:#EAEDED;color: #424949;width: 500px;"> ' + data.first_name +' '+ data.last_name + ' &nbsp('+ (data.birthday).split('-').reverse().join('-') +')<i class="fa fa-plus" style="height: 10px; float: right !important;"></i>'+'</a>';
						}
					}
				},
			]);
		});
	</script>
@endsection
