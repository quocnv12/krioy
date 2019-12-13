@extends('master-layout')
@section('title')
	Notice Board
@endsection

@section('content')
	<body>
		<section class="page-top container">
		<div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
			<div class="row">
				<div class="col-md-6">
					<ul class="ul-td">
						<li _ngcontent-c16="" class="level1"><a _ngcontent-c16="">HOME</a></li>
						<li _ngcontent-c16="" class="active1" style="pointer-events:none"><a _ngcontent-c16="">NOTICE BOARD</a></li>
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
							<a _ngcontent-c10="" class="item active">Kindergarten</a>
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
		<div class="mat-card" style="min-height: 500px;">
			<div class="mat-content">	
				<div class="mat-card" style="margin: 0;">
					<div class="row">
						<div class="notice" data-href="notice-detail.html">
							<div class="col-lg-9 col-md-9 col-sm-9">
								<span _ngcontent-c34="" style="display: block; font-size: 18px; padding-left: 0px;"><!---->
									<i _ngcontent-c34="" aria-hidden="true" class="fa fa-star ng-star-inserted" style="color:#FAC917;padding-right:5px; "></i> sdfgasfad
								</span>
								<br>
								<span _ngcontent-c34="" style="color: grey; font-size: 16px; padding-left: 24px;"><!----> ấd
								</span>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3">
								<div _ngcontent-c34="" align="center" style="color:#5363d6;font-size: 16px;">
									<span _ngcontent-c34="">25 Nov 2019</span>
									<br _ngcontent-c34="">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="icon-plus" title="add">
			<a href="edit-staff.html">
				<i class="fa fa-plus"></i>
			</a>
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
    	$(document).ready(function($) {
		    $(".notice").click(function() {
		        window.document.location = $(this).data("href");
		    });
		});
    </script>
@endsection
