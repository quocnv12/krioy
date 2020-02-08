@extends('master-layout')
@section('title')
	Attendance
@endsection

<style type="text/css">
	button.icon-plus-button{
    font-size: 14px;
    color: #fff;border: none;
    margin-bottom: 7px;
    border-radius: 20px;
    padding: 0 10px;
    min-width: 90px;
}
</style>
@section('content')
	<body onload="time()">
		<section class="page-top container">
			<div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
				<div class="row">
					<div class="col-md-6">
						<ul class="ul-td">
							<li _ngcontent-c16="" class="level1"><a _ngcontent-c16="" href="index.html">HOME</a></li>
							<li _ngcontent-c16="" class="active1" style="pointer-events:none"><a _ngcontent-c16="" href="{{route('attendance.index')}}">ATTENDANCE</a></li>
						</ul>
					</div>
					<div class="col-md-6">
						<div id="clock" style="margin: 20px 0;font-size: 16px;text-align: right;"></div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<a style="min-width:110px;background:#eb87c1;color:white; float: right; border: none;font-weight: bold" href="{{route('attendance.list')}}" class="btn btn-success" >CHILDREN LIST</a>
					</div>
				</div>
			</div>
		</section>
		
		<section style="background-color:#f9f9f9">
			<div class="row" style="padding: 10px">
				<div class="col-lg-2 col-md-2 col-sm-12"></div>
				<div class="col-lg-8 col-md-8 col-sm-12" style="padding-left:0px;padding-right:0px">
					<div class="scrollmenu-div">
				@foreach($programs as $program)
				<div class="scrollmenu-button" style="text-align: center;">
					<!---->
					<button type="submit" style="background: #5363d6;padding: 5px;border: none;border-radius: 5px;margin: 5px;min-width: 120px;text-align: center;">
						<a style="color: #fff;" href="kids-now/attendance/{{$program->id}}">{{$program->program_name}}</a>
					</button>
				</div>
				@endforeach
			</div>
				</div>
				<div class="col-lg-2 col-md-2 col-sm-12"></div>
			</div>
		</section>
		<section class="container attendance-layout">
			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-8">
					
					<div class="attendance-button">
						<button class="btn tableStyle ng-star-inserted" style="color: rgb(75, 0, 130);">
							<p>Total</p>
							<!---->
							<span class="ng-star-inserted">
								@if(isset($children_profiles))
									{{$count_active}}/{{$count_chil}}
								@else
									0/0
								@endif
							</span>
							<!---->
						</button>
						<button class="btn tableStyle ng-star-inserted" style="color: rgb(55, 189, 156);">
							<p>IN</p>
							<!---->
							<span class="ng-star-inserted">
								@if(isset($children_profiles))
									{{$count_in}}
								@else
									0
								@endif
							
							</span>
							<!---->
						</button>
						<button class="btn tableStyle ng-star-inserted" style="color: rgb(169, 179, 189);">
							<p>OUT</p>
							<!---->
							<span class="ng-star-inserted">
								@if(isset($children_profiles))
									{{$count_out}}
								@else
									0
								@endif
							</span>
							<!---->
						</button>
						<button class="btn tableStyle ng-star-inserted" style="color: rgb(237, 85, 100);">
							<p>ABSENT</p>
							<!---->
							<span class="ng-star-inserted">
								@if(isset($children_profiles))
									{{$count_absent}}
								@else
									0
								@endif
								
							</span>
							<!---->
						</button>
						<!-- <button class="btn tableStyle ng-star-inserted" style="color: rgb(255, 194, 0);">
							<p>LEAVE</p>
							
							<span class="ng-star-inserted">0/1</span>
							
						</button> -->
					</div>
					
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4">
					<div class="select-all">
						<div class="all-1" >
							<a href="#" class="all-2">
								<b>Select All-IN</b>
							</a>
						</div>
						<div class="all-1">
							<a href="#" class="all-2">
								<b>Select All</b>
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>
		@if(isset($children_profiles))
		<section class="container">
			<form style="width: auto;margin: 0;text-align: center" method="post" action="{{route('attendance.postAdd',['id' => $id])}}" id="addAttendance" enctype="multipart/form-data">
			@csrf
				<div class="mat-card tab-content" style="min-height: 500px;">
					<div class="mat-content" id="tab-main">
						<div _ngcontent-c19="" class="row ng-star-inserted">
							<!---->
							@if(isset($children_profiles))
	                            @foreach($children_profiles as $children)
	                                <div _ngcontent-c19="" class="div_box_children col-lg-2 col-md-2 col-sm-2 col-xs-6 ng-star-inserted" style="padding:10px;cursor:pointer;">
	                                    <div _ngcontent-c19="" class="child-class" style="height: 120px;text-align: center;">
	                                        <img _ngcontent-c19="" class="img-circle" height="80" onerror="this.src='images/Child.png';" width="80" src="Child.png">
	                                        <i _ngcontent-c9="" aria-hidden="true" class="fa fa-check" id="checked" style="display: block;top:10px"></i>                                            <span class="limitText ng-star-inserted" style="color:#5363d6;;margin: 0px;display: block;">{{$children->first_name}} {{$children->last_name}}</span>
	                                        <input type="hidden" value="{{$children->id}}">
	                                    </div>
	                                </div>
	                            @endforeach
	                            <input id="array_children_attendance" type="hidden" value="" name="children_attendance">
	                        @else
								<div style="margin: 50px;">
									<span style="color: red; font-weight: bold">Hint :</span>
									<span>Click on a program tab in horizontal scroll bar to show all children in that program</span>
								</div>
                            
	                        @endif

						</div>
					</div>
				</div>
				 <!-- <div class="icon-plus-1">
					<ul>
						<li style="background-color: #37bd9c;" data-toggle="modal" data-target=".bd-example-modal-sm">IN</li>
						<li style="background-color: #ccc;" data-toggle="modal" data-target=".bd-example-modal-sm">OUT</li>
						<li style="background-color: #ed5564;" data-toggle="modal" data-target=".bd-example-modal-sm">ABSENT</li>
						<li style="background-color: #ccc;" data-toggle="modal" data-target=".bd-example-modal-sm">UNMARK</li>
						<li style="background-color: #ffc200;" data-toggle="modal" data-target=".bd-example-modal-sm">LEAVE</li>
					</ul>
				</div> -->
				<div class="icon-plus-1" >
					<button  type="button" class="icon-plus-button groupStatus" style="background-color: #37bd9c;" data-toggle="modal" data-target=".bd-example-modal-sm" value="1" name='status' >IN</button><br>
					<button  type="button" class="icon-plus-button groupStatus" style="background-color: #ccc;" data-toggle="modal" data-target=".bd-example-modal-sm" value="2" name='status'>OUT</button><br>
					<button  type="button" class="icon-plus-button groupStatus" style="background-color: #ed5564;" data-toggle="modal" data-target=".bd-example-modal-sm" value="3" name='status'>ABSENT</button><br>
					<!-- <button  type="button" class="icon-plus-button groupStatus" style="background-color: #ccc;" data-toggle="modal" data-target=".bd-example-modal-sm" value="4" name='status'>UNMARK</button><br> -->
					<!-- <button class="icon-plus-button" style="background-color: #ffc200;" data-toggle="modal" data-target=".bd-example-modal-sm">LEAVE</button> -->
					<input type="hidden" name="children_status" value="" id="children_status">
				</div>
				<div class="modal fade bd-example-modal-sm modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-sm" style="">
						<div class="modal-content" style="font-size: 18px;">
							<h3>Alert</h3>
							<hr style="clear:both;margin-top:0px;margin-bottom:0px">
							<div align="center">
								<p style="margin: 0;font-size: 18px;">You are marking attendance with time selected as {{$time}}</p>
							</div>
							<hr style="clear:both;margin-top:0px;margin-bottom:0px">
							<div class="row" style="margin: 0;">
								<div class="col-xs-6 col-md-6 mat-dialog-actions " style="border-right: 1px solid lightgrey;">
									<button class="mat-button-class" style="color: #5363d6;border-left: 1px solid transparent; font-size: 16px;" >
										<span class="mat-button-wrapper" id="submit_button">PROCEED</span>
									</button>
								</div>
								<div class="col-xs-6 col-md-6 mat-dialog-actions">
									<button class="mat-button-class" style="color: red;font-size: 16px;">
										<span class="mat-button-wrapper">CANCEL</span>
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</section>
		@else
		@endif
		

		

		

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
    <script src="libs/slick-1.8.1/slick/slick.js"></script>

    <script type="text/javascript">
    	var array_children_attendance = [];
        $('.div_box_children').children('div').children('i').hide()

        $('.div_box_children').click(function () {
            if ($(this).children('div').children('i').hasClass('checked')){
                ($(this).children('div').children('i').removeClass('checked'))
                $(this).children('div').children('i').hide()
                var attendance_pop = $(this).children('div').children('input').val();
                array_children_attendance.splice( array_children_attendance.indexOf(attendance_pop), 1 );
                

            }else {
                $(this).children('div').children('i').addClass('checked')
                $(this).children('div').children('i').show()
                var attendance_push = $(this).children('div').children('input').val();
                array_children_attendance.push(attendance_push);
            }
            $('#array_children_attendance').attr('value', array_children_attendance);
            console.log(array_children_attendance)
        })

        // select value children_status
		$('.groupStatus').click(function () {
			var selectStatus = $(this).val();
			$('#children_status').attr('value', selectStatus);
		})

        var button = document.getElementById("submit_button");
		button.onclick = function(){
			$('#array_children_attendance').attr('value', array_children_attendance);
			$('#addAttendance').submit();
		}
	 </script>

			
	


	 <!-- clock -->
	 <script type="text/javascript">
		function time() {
		   var today = new Date();
		   var weekday=new Array(7);
		   weekday[0]="Sunday";
		   weekday[1]="Monday";
		   weekday[2]="Tuesday";
		   weekday[3]="Wednesday";
		   weekday[4]="Thursday";
		   weekday[5]="Friday";
		   weekday[6]="Saturday";
		   var day = weekday[today.getDay()];
		   var dd = today.getDate();
		   var mm = today.getMonth()+1; //January is 0!
		   var yyyy = today.getFullYear();
		   var h=today.getHours();
		   var m=today.getMinutes();
		   var s=today.getSeconds();
		   m=checkTime(m);
		   s=checkTime(s);
		   nowTime = h+":"+m+":"+s;
		   if(dd<10){dd='0'+dd} if(mm<10){mm='0'+mm} today = day+', '+ dd+'/'+mm+'/'+yyyy;

		   tmp='<span class="date">'+today+' | '+nowTime+'</span>';

		   document.getElementById("clock").innerHTML=tmp;

		   clocktime=setTimeout("time()","1000","JavaScript");
		   function checkTime(i)
		   {
		      if(i<10){
		     i="0" + i;
		      }
		      return i;
		   }
		}
	</script>
	<script type="text/javascript">
		$('.scrollmenu-div').slick({
			infinite: true,
			slidesToShow: 7,
			slidesToScroll: 1,
			autoplay: false,
			autoplaySpeed: 2000,
			responsive: [{
					breakpoint: 1200,
					settings: {
					slidesToShow: 3,
					slidesToScroll: 1
					}
				},
			{
				breakpoint: 991,
				settings: {
				slidesToShow: 3,
				slidesToScroll: 1,
				autoplay: true,
				arrows:false,
				}
			},
			{
				breakpoint: 500,
				settings: {
				slidesToShow: 2,
				slidesToScroll: 1,
				autoplay: true,
				arrows:false,
				}
			}]
		});
	</script>
@endsection
