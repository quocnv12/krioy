@extends('master-layout')
@section('title')
Invite Staff
@endsection
@section('css')
	<link rel="stylesheet" href="asset/css/style.css">

@stop
@section('content')
<body>
	<section class="container-fluid">
		<div class="container">
			<div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
				<ul class="ul-td">
					<li _ngcontent-c16="" class="level1"><a _ngcontent-c16="" href="index.html">Home</a></li>
					<li _ngcontent-c16="" class="active1" style="pointer-events:none"><a _ngcontent-c16="">Video Help</a></li>
				</ul>
			</div>
			<div class="card-mats p-3">
				<div id="content-card-mats" style="display: block">
					<form action="" class="d-flex flex-row search-invite-parents mb-3" >
						<input type="text" class="flex-grow-1 border-0" style="background: none; outline: none" placeholder="Search">
					</form>
					<a onclick="show_info('active-dccm-1')">
						<i class="far fa-play-circle" style="color: rgb(136, 37, 194);"></i>
						Benefits of Kriyo Preschool App
						<br>
						<hr>
					</a>
					

					<a onclick="show_info('active-dccm-2')">
						<i class="far fa-play-circle" style="color: rgb(136, 37, 194);"></i>
						Benefits of Kriyo Preschool App
						<br>
						<hr>
					</a>

				</div>
				<!-- detail-content-card-mats=dccm -->
					<div class="detail-content-card-mats" style="display: none" id="active-dccm-1">
					<div class="row">
						<div class="col-md-6 mb-3">
							<iframe width="100%" src="https://www.youtube.com/embed/XNl6uV26wgQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="min-height: 400px;"></iframe>
							<a href="" style="text-decoration: none; font-size: 18px; color: #000;">Lorem ipsum dolor sit.</a>

						</div>
						<div class="col-md-6 mb-3">
							<iframe width="100%" src="https://www.youtube.com/embed/XNl6uV26wgQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="min-height: 400px;"></iframe>
							<a href="" style="text-decoration: none; font-size: 18px; color: #000;">Lorem ipsum dolor sit.</a>

						</div>
						<div class="col-md-6 mb-3">
							<iframe width="100%" src="https://www.youtube.com/embed/XNl6uV26wgQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="min-height: 400px;"></iframe>
							<a href="" style="text-decoration: none; font-size: 18px; color: #000;">Lorem ipsum dolor sit.</a>

						</div>	
					</div>
				</div>
				<!-- -------------- -->
				<div class="detail-content-card-mats" style="display: none" id="active-dccm-2">
					<div class="row">
						<div class="col-md-6 mb-3">
							<iframe width="100%" src="https://www.youtube.com/embed/XNl6uV26wgQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="min-height: 400px;"></iframe>
							<a href="" style="text-decoration: none; font-size: 18px; color: #000;">Lorem ipsum dolor sit.</a>

						</div>
						<div class="col-md-6 mb-3">
							<iframe width="100%" src="https://www.youtube.com/embed/XNl6uV26wgQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="min-height: 400px;"></iframe>
							<a href="" style="text-decoration: none; font-size: 18px; color: #000;">Lorem ipsum dolor sit.</a>

						</div>
						<div class="col-md-6 mb-3">
							<iframe width="100%" src="https://www.youtube.com/embed/XNl6uV26wgQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="min-height: 400px;"></iframe>
							<a href="" style="text-decoration: none; font-size: 18px; color: #000;">Lorem ipsum dolor sit.</a>

						</div>	
					</div>
				</div>
				<!-- ----------------------------------------- -->

			</div>
		</div>	
	</section>
</body>
@stop
@section('js')
	<script src="asset/js/js.js"></script>
@stop