@extends('master-layout')
@section('title')
	Attendance
@endsection


@section('content')
	<body onload="time()">
		<section class="page-top container">
			<div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
				<div class="row">
					<div class="col-md-6">
						<ul class="ul-td">
							<li _ngcontent-c16="" class="level1"><a _ngcontent-c16="" href="index.html">HOME</a></li>
							<li _ngcontent-c16="" class="active1" style="pointer-events:none"><a _ngcontent-c16="" href="food.html">ATTENDANCE</a></li>
						</ul>
					</div>
					<div class="col-md-6">
						<div id="clock" style="margin: 20px 0;font-size: 16px;text-align: right;"></div>
					</div>
				</div>
			</div>
		</section>
		<section style="background-color:#f9f9f9">
			<div class="row" style="padding: 10px">
				<div class="col-lg-2 col-md-2 col-sm-12"></div>
				<div class="col-lg-8 col-md-8 col-sm-12" style="padding-left:0px;padding-right:0px">
					<div class="child-profile-ul">
						<div _ngcontent-c10="" class="scrollmenu" id="nav">
							<ul _ngcontent-c10="" class="scrollmenu-ul">
								<!---->
								@foreach($programs as $row)
									<li _ngcontent-c10="">
										<a _ngcontent-c10="" class="item active" href="kids-now/attendance/{{$row->id}}">{{$row->program_name}}</a>
									</li>
								@endforeach
							</ul>
						</div>
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
							<span class="ng-star-inserted">0/1</span>
							<!---->
						</button>
						<button class="btn tableStyle ng-star-inserted" style="color: rgb(55, 189, 156);">
							<p>IN</p>
							<!---->
							<span class="ng-star-inserted">0/1</span>
							<!---->
						</button>
						<button class="btn tableStyle ng-star-inserted" style="color: rgb(169, 179, 189);">
							<p>OUT</p>
							<!---->
							<span class="ng-star-inserted">0/1</span>
							<!---->
						</button>
						<button class="btn tableStyle ng-star-inserted" style="color: rgb(237, 85, 100);">
							<p>ABSENT</p>
							<!---->
							<span class="ng-star-inserted">0/1</span>
							<!---->
						</button>
						<button class="btn tableStyle ng-star-inserted" style="color: rgb(255, 194, 0);">
							<p>LEAVE</p>
							<!---->
							<span class="ng-star-inserted">0/1</span>
							<!---->
						</button>
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
		<section class="container">
			<div class="mat-card tab-content" style="min-height: 500px;">
				<div class="mat-content" id="tab-main">
					<div _ngcontent-c19="" class="row ng-star-inserted">
						<!---->
						@if(isset($children_profiles))
							@foreach($children_profiles as $row)
							<div _ngcontent-c19="" class="col-lg-2 col-md-2 col-sm-2 col-xs-6 ng-star-inserted select-child-img"  onclick="myFunction()">
								<div _ngcontent-c19="" class="child-class" style="height: 120px;text-align: center;">
									<div _ngcontent-c9="" class="image">
										<img _ngcontent-c19="" class="img-circle" height="80" onerror="this.src='images/Child.png';" width="80" src="Child.png">
										<i _ngcontent-c9="" aria-hidden="true" class="fa fa-check checked" id="checked" style="display: none"></i>
										<!---->
										<span _ngcontent-c19="" class="limitText ng-star-inserted">{{$row->first_name}} {{$row->last_name}}</span>
									</div>
									<!---->
								</div>
							</div>
							@endforeach
						@else
						@endif

					</div>
				</div>
			</div>
		</section>

		<div class="icon-plus-1">
			<ul>
				<li style="background-color: #37bd9c;" data-toggle="modal" data-target=".bd-example-modal-sm">IN</li>
				<li style="background-color: #ccc;" data-toggle="modal" data-target=".bd-example-modal-sm">OUT</li>
				<li style="background-color: #ed5564;" data-toggle="modal" data-target=".bd-example-modal-sm">ABSENT</li>
				<li style="background-color: #ffc200;" data-toggle="modal" data-target=".bd-example-modal-sm">LEAVE</li>
				<li style="background-color: #ccc;" data-toggle="modal" data-target=".bd-example-modal-sm">UNMARK</li>
			</ul>
		</div>

		<div class="modal fade bd-example-modal-sm modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-sm" style="">
					<div class="modal-content" style="font-size: 18px;">
						<h3>Aler</h3>
						<hr style="clear:both;margin-top:0px;margin-bottom:0px">
						<div align="center">
							<p style="margin: 0;font-size: 18px;">You are marking attendance with time selected as 10:53 am</p>
						</div>
						<hr style="clear:both;margin-top:0px;margin-bottom:0px">
						<div class="row" style="margin: 0;">
							<div class="col-xs-6 col-md-6 mat-dialog-actions " style="border-right: 1px solid lightgrey;">
								<button class="mat-button-class" style="color: #5363d6;border-left: 1px solid transparent; font-size: 16px;">
									<span class="mat-button-wrapper">PROCEED</span>
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
    <script type="text/javascript">
    	$('.all-1').click(function(event) {
    		$('.all-1').removeClass('all-1-click');
    		$(this).addClass('all-1-click');
    	});
    </script>
    <script type="text/javascript">
		function myFunction() {
		  var x = document.getElementById("checked");
		  if (x.style.display === "none") {
		    x.style.display = "block";
		  } else {
		    x.style.display = "none";
		  }
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
@endsection