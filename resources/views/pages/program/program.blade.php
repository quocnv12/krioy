@extends('master-layout')
@section('title')
	Programs
@endsection

@section('content')
	<body style="background-color: #fff !important;">
	<section class="page-top container">
		<div class="tieu-de add" style="margin-top: 10px;margin-bottom: 10px;">
			<div class="row">
				<div class="col-md-9">
					<ul class="ul-td">
						<li _ngcontent-c16="" class="level1"><a _ngcontent-c16="" href="index.html">HOME</a></li>
						<li _ngcontent-c16="" class="active1" style="pointer-events:none"><a _ngcontent-c16="" href="food.html">PROGRAM</a></li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<section class="container">
		<div class="program">
			<div class="program-label" align="center">
				<p>Programs</p>
			</div>
			<div class="program-content">
				<div class="row">
					@foreach($programs as $program)
						<div class="col-md-6 col-sm-6">
							<div class="row program-content-1" data-href="kids-now/program/view/{{$program->id}}">
								<div class="col-md-9 col-sm-9">
									<b style="color: #9999e6;"><a href="kids-now/program/view/{{$program->id}}">{{$program->program_name}}</a></b>
								</div>
								<div class="col-md-3 col-sm-3" style="padding-left: 0px;text-align: right;">{{$program->total_children}}</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</section>
	<div class="icon-plus" title="add">
			<a href="kids-now/program/add">
				<i class="fa fa-plus"></i>
			</a>
		</div>
</body>
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
     <script type="text/javascript">
    	$(document).ready(function($) {
		    $(".program-content-1").click(function() {
		        window.document.location = $(this).data("href");
		    });
		});
    </script>
@endsection
