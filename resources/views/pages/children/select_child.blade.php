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
	
	<section class="container">
		<div class="menu-search">
			<input type="search" name="" placeholder="Search..." style="line-height: 1.6;font-size: 18px;border: 2px solid #ccc; padding: 0 5px;">
			<button style="font-size: 18px;background: #ccc;padding: 2px 8px;">
				<i class="fa fa-search"></i>
			</button>
			<button style="float: right;background: #FF4081;border: none;border-radius: 5px;padding: 7px 10px;color: white;font-weight: 800;"><a href="#" style="color: white;">DONE</a></button>

		</div>
	</section>
	
	<section class="container">
		<div class="mat-card" style="min-height: 350px;">
			<div class="mat-content">	
				<div _ngcontent-c19="" class="row ng-star-inserted">
					<!---->
					<div _ngcontent-c19="" class="col-lg-2 col-md-2 col-sm-2 col-xs-6 ng-star-inserted select-child-img" style="padding:10px;cursor:pointer;margin: 5px 20px;">
						<div _ngcontent-c19="" class="child-class" style="height: 120px;text-align: center;">
							<div _ngcontent-c9="" class="image">
								<img _ngcontent-c19="" class="img-circle" height="80" onerror="this.src='images/Child.png';" width="80" src="Child.png">
								<i _ngcontent-c9="" aria-hidden="true" class="fa fa-minus checked" id="checked" style="display: block; width: 40px"></i>
								<!---->
								<span _ngcontent-c19="" class="limitText ng-star-inserted" style="color:#5363d6;;margin: 0px;font-weight: bold;font-size: 16px;">Riya Demo Child</span>
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
		// function myFunction() {
		//   var x = document.getElementById("checked");
		//   if (x.style.display === "none") {
		//     x.style.display = "block";
		//   } else {
		//     x.style.display = "none";
		//   }
		// }
	 </script>
@endsection
