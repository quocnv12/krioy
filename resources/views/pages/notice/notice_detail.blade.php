@extends('master-layout')
@section('title')
	NOTICE Details
@endsection

@section('content')
	<body>
	<section class="page-top container">
		<div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
			<div class="row">
				<ul class="ul-td">
					<li _ngcontent-c16="" class="level1"><a _ngcontent-c16="">HOME</a></li>
					<li _ngcontent-c16="" class="active1" style="pointer-events:none"><a _ngcontent-c16="">NOTICE BOARD</a></li>
					<li _ngcontent-c16="" class="active1 active-1" style="pointer-events:none;"><a _ngcontent-c16="">NOTICE DETAIL</a></li>
				</ul>
			</div>
		</div>
		
		<div class="mat-card">
			<div class="mat-content">
				<button class="accordion">Programs</button>
				<div class="panel">
					<div _ngcontent-c20="" class="row" style="" data-toggle="modal" data-target=".bd-example-modal-sm">
						<!---->
						<div _ngcontent-c20="" align="center" class="col-xs-6 col-sm-4 col-md-3 col-lg-2 ng-star-inserted" style="padding:10px;cursor:pointer;">
							<button _ngcontent-c20="" class="btn progBtn limitText" style="background-color:transparent;border:1px solid #5363d6;border-radius: 4px" disabled>Attendance </button>
						</div>
						<div _ngcontent-c20="" align="center" class="col-xs-6 col-sm-4 col-md-3 col-lg-2 ng-star-inserted" style="padding:10px;cursor:pointer">
							<button _ngcontent-c20="" class="btn progBtn limitText bgClass" disabled style="background-color:transparent;border:1px solid #5363d6;border-radius: 4px">Behaviour </button>
						</div>
					</div>
				</div>
				<div style="font-size: 20px;font-weight: bold;">
					<p>Hello!!!!!!</p>
				</div>
				<br>
				<div class="row">
					<div class="col-md-6">
						<div class="row">
							<div class="col-xs-9 col-md-9">
								<p>Mark as Important</p>
							</div>
							<div class="col-xs-3 col-md-3" data-toggle="modal" data-target=".bd-example-modal-sm">
								<label class="label-checkbox">
									<input type="checkbox" checked="checked" disabled>
									<span class="checkmark"></span>
								</label>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-xs-9 col-md-9">
								<p>Archive</p>
							</div>
							<div class="col-xs-3 col-md-3" data-toggle="modal" data-target=".bd-example-modal-sm">
								<label class="label-checkbox">
									<input type="checkbox" checked="checked" disabled>
									<span class="checkmark"></span>
								</label>
							</div>
						</div>
					</div>
				</div>
				<div class="notice-footer" style="color: grey;font-size: 14px;margin-bottom: 30px;">
					<div class=" row">
						<div class="col-md-11">
							<p>kjgfbajhsj</p>
							<div class="">
								<span style="float: left;">10:22 AM, Nov 25 2019</span>
								<span style="float: right;">AAAAA</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="icon-plus" title="edit">
			<a href="kids-now/notice-board/edit">
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
