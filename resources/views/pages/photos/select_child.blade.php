@extends('master-layout')
@section('title')
	Select Children
@endsection

@section('content')
	<body>
	<section class="page-top container">
		<div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
			<div class="row">
				<div class="col-md-6">
					<ul class="ul-td">
						<li _ngcontent-c16="" class="level1"><a _ngcontent-c16="" href="index.html">HOME</a></li>
						<li _ngcontent-c16="" class="active1" style="pointer-events:none"><a _ngcontent-c16="" href="food.html">FOOD</a></li>
						<li _ngcontent-c16="" class="active1 active-1" style="pointer-events:none;"><a _ngcontent-c16="">SELECT CHILDREN</a></li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<section _ngcontent-c10="" style="background-color:#f9f9f9">
		<div _ngcontent-c10="" class="row" style="padding: 10px">
			<div _ngcontent-c10="" align="right" class="col-md-2 scrollClassLeft">
				<div _ngcontent-c10="" class="scroll-arrow-left" id="prev_nav" style="padding-right: 20px;color:#5363d6;cursor:pointer">
					<i _ngcontent-c10="" aria-hidden="true" class="fa fa-angle-left" style="font-size:40px"></i>
				</div>
			</div>
			<div _ngcontent-c10="" class="col-md-8" style="padding-left:0px;padding-right:0px">
				<div _ngcontent-c10="" class="scrollmenu" id="nav">
					<ul _ngcontent-c10="">
						<!---->
						<li _ngcontent-c10="">
							<a _ngcontent-c10="" class="item active">Kindergarten (1)</a>
						</li>
					</ul>
				</div>
			</div>
			<div _ngcontent-c10="" align="left" class="col-md-2 scrollClassRight">
				<div _ngcontent-c10="" class="scroll-arrow-right" id="next_nav" style="padding-left: 20px;color:#5363d6;cursor:pointer">
					<i _ngcontent-c10="" aria-hidden="true" class="fa fa-angle-right" style="font-size:40px"></i>
				</div>
			</div>
		</div>
	</section>
	<section class="container">
		<div class="row">
			<div class="select-all">
				<div class="col-md-3 col-sm-3 all-1">
					<a href="#" class="all-2">
						<b>Select All-IN</b>
					</a>
				</div>
				<div class="col-md-3 col-sm-3 all-1">
					<a href="#" class="all-2">
						<b>Select All</b>
					</a>
				</div>
				<div class="col-md-2"></div>
				<div align="right" class="col-md-3" style="margin: 15px;">
					<a href="food.html" class="done">
						<b>DONE</b>
					</a>
				</div>
				<div class="col-md-1"></div>
			</div>
		</div>
	</section>
	<section class="container">
		<div class="mat-card" style="min-height: 300px;">
			<div class="mat-content">	
				<div _ngcontent-c19="" class="row ng-star-inserted">
					<!---->
					<div _ngcontent-c19="" class="col-lg-2 col-md-2 col-sm-2 col-xs-6 ng-star-inserted select-child-img"  onclick="myFunction()">
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
					<div _ngcontent-c19="" class="col-lg-2 col-md-2 col-sm-2 col-xs-6 ng-star-inserted select-child-img"  onclick="myFunction()">
						<div _ngcontent-c19="" class="child-class" style="height: 120px;text-align: center;">
							<div _ngcontent-c9="" class="image">
								<img _ngcontent-c19="" class="img-circle" height="80" onerror="this.src='images/Child.png';" width="80" src="Child.png">
								<i _ngcontent-c9="" aria-hidden="true" class="fa fa-check checked" id="checked"></i>
								<!---->
								<span _ngcontent-c19="" aligin="center" class="limitText ng-star-inserted">Riya Demo Child</span>
							</div>
							<!---->
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
@endsection
