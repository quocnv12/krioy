@extends('master-layout')
@section('title')
	PROFILE
@endsection

@section('content')
	<body>

	<section class="page-top container">
		<div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
			<div class="row">
				<ul class="ul-td">
					<li _ngcontent-c16="" class="level1"><a _ngcontent-c16="">HOME</a></li>
					<li _ngcontent-c16="" class="active1" style="pointer-events:none"><a _ngcontent-c16="">STAFF PROFILES</a></li>
					<li _ngcontent-c16="" class="active1 active-1" style="pointer-events:none;"><a _ngcontent-c16="">PROFILE</a></li>
				</ul>
			</div>
		</div>
		<div class="mat-card">
			<div class="mat-content">
				<button class="accordion add-staff">K5 KHANH PROFILE</button>
				<div class="row">
					<div class="col-md-2 textera-img" data-toggle="modal" data-target=".bd-example-modal-sm">
						<a href="#">
							<img src="images/Staff.png" alt="">
						</a>
					</div>
					<div class="col-md-10">
						<div class="add a1 " type="button" data-toggle="modal" data-target=".bd-example-modal-sm">
							<div class="row">
								<div class="col-md-6">
									<input type="text" name="first-name" placeholder="First Name *" readonly="">
								</div>
								<div class="col-md-6">
									<input type="text" name="last-name" placeholder="Last Name *" readonly="">
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<input type="text" name="phone" placeholder="Phone Number *" readonly="">
								</div>
								<div class="col-md-6">
									<select>
										<option>Gender</option>
										<option>Nam</option>
										<option>Nữ</option>
										<option>Khác</option>
									</select>
								</div>
							</div>
							<div>
								<input type="email" name="email" placeholder="E-Mail Address" readonly="">
							</div>
						</div>
					</div>
				</div>
				<hr>
				<div class="add" type="button" data-toggle="modal" data-target=".bd-example-modal-sm">
					<div>
						<input type="text" name="address" placeholder="Residential Address" readonly="">
					</div>
				</div>
				<div class="row" type="button" data-toggle="modal" data-target=".bd-example-modal-sm">
					<div class="add">
						<div class="col-md-4">
							<input type="date" name="date" placeholder="Birthday" readonly="">
						</div>
						<div class="col-md-4">
							<select >
								<option>Blood Group</option>
								<option>1</option>
								<option>2</option>
								<option>3</option>
							</select>
						</div>
						<div class="col-md-4">
							<input type="date" name="date" placeholder="Date of Joining" readonly="">
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="mat-card">
			<div class="mat-content">
				<button class="accordion">Programs</button>
				<div class="panel" type="button" data-toggle="modal" data-target=".bd-example-modal-sm">
					<div _ngcontent-c20="" class="row" style="">
						<!---->
						<div _ngcontent-c20="" align="center" class="col-xs-6 col-sm-4 col-md-3 col-lg-2 ng-star-inserted" style="padding:10px;cursor:pointer;">
							<button _ngcontent-c20="" class="btn progBtn limitText" readonly style="background-color:transparent;border:1px solid #5363d6;border-radius: 4px">Attendance </button>
						</div>
						<div _ngcontent-c20="" align="center" class="col-xs-6 col-sm-4 col-md-3 col-lg-2 ng-star-inserted" style="padding:10px;cursor:pointer">
							<button _ngcontent-c20="" class="btn progBtn limitText bgClass" readonly style="background-color:transparent;border:1px solid #5363d6;border-radius: 4px">Behaviour </button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="mat-card">
			<div class="mat-content">
				<button class="accordion">Permissions</button>
				<div class="panel" type="button" data-toggle="modal" data-target=".bd-example-modal-sm">
					<div class="row">
						<div class="col-xs-6 col-md-4 panel-col">
							<div class="panel-list">
								<span class="circleClass">
									<i class="fa fa-circle"></i>
								</span>
								<span class="circleFont">1</span>
							</div>
							<div class="panel-list">
								<span class="circleClass">
									<i class="fa fa-circle"></i>
								</span>
								<span class="circleFont">2</span>
							</div>
							<div class="panel-list">
								<span class="circleClass">
									<i class="fa fa-circle"></i>
								</span>
								<span class="circleFont">3</span>
							</div>
							<div class="panel-list">
								<span class="circleClass">
									<i class="fa fa-circle"></i>
								</span>
								<span class="circleFont">4</span>
							</div>
							<div class="panel-list">
								<span class="circleClass">
									<i class="fa fa-circle"></i>
								</span>
								<span class="circleFont">5</span>
							</div>
						</div>
						<div class="col-xs-6 col-md-4 panel-col">
							<div class="panel-list">
								<span class="circleClass">
									<i class="fa fa-circle"></i>
								</span>
								<span class="circleFont">1</span>
							</div>
							<div class="panel-list">
								<span class="circleClass">
									<i class="fa fa-circle"></i>
								</span>
								<span class="circleFont">2</span>
							</div>
							<div class="panel-list">
								<span class="circleClass">
									<i class="fa fa-circle"></i>
								</span>
								<span class="circleFont">3</span>
							</div>
							<div class="panel-list">
								<span class="circleClass">
									<i class="fa fa-circle"></i>
								</span>
								<span class="circleFont">4</span>
							</div>
							<div class="panel-list">
								<span class="circleClass">
									<i class="fa fa-circle"></i>
								</span>
								<span class="circleFont">5</span>
							</div>
						</div>
						<div class="col-xs-6 col-md-4 panel-col">
							<div class="panel-list">
								<span class="circleClass">
									<i class="fa fa-circle"></i>
								</span>
								<span class="circleFont">1</span>
							</div>
							<div class="panel-list">
								<span class="circleClass">
									<i class="fa fa-circle"></i>
								</span>
								<span class="circleFont">2</span>
							</div>
							<div class="panel-list">
								<span class="circleClass">
									<i class="fa fa-circle"></i>
								</span>
								<span class="circleFont">3</span>
							</div>
							<div class="panel-list">
								<span class="circleClass">
									<i class="fa fa-circle"></i>
								</span>
								<span class="circleFont">4</span>
							</div>
							<div class="panel-list">
								<span class="circleClass">
									<i class="fa fa-circle"></i>
								</span>
								<span class="circleFont">5</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="icon-plus" title="add">
			<a href="edit_staff.blade.php">
				<i class="fa fa-plus"></i>
			</a>
		</div>

		<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-sm" style="top: 40%;">
			    <div class="modal-content" style="font-size: 18px;padding: 25px;">
					Click on 'Edit' button to update details
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
@endsection
