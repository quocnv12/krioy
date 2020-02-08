@extends('master-layout')
@section('title')
Archives
@endsection
@section('css')
	<link rel="stylesheet" href="asset/css/style.css">

@stop
@section('content')
<body style="background: white !important">
	<style>
		.icon-heart{
			width: 30px;
			height: 30px;
		}
	</style>
	<section class="container-fluid">
		<div class="container">
			<div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
				<div class="row">
					<ul class="ul-td">
						<li _ngcontent-c16="" class="level1"><a _ngcontent-c16="" href="index.html">Home</a></li>
						<li _ngcontent-c16="" class="active1" style="pointer-events:none"><a _ngcontent-c16="">FAVOURITES SCHOOL</a></li>
					</ul>
				</div>
			</div>
			<div class="card-mats">
				<h4 class="text-center text-white title-mats">FAVOURITE SCHOOL</h4>
				<div class="row m-0">
					<div class="col-md-6 col-sm-6 mb-4">					
						<div class="card-mats clearfix p-2 item-content-fs" style="cursor: pointer;background:none">			
							<div class="float-left">
								<b style="color: #9999e6">Talent Wins</b>
								<br>
								<span style="color: #9999e6;">hanoi,hanoi</span>
							</div>
							<div class="text-right float-right pt-2">
								<img src="asset/img/UnFavourite.png" alt="" class="icon-heart">
							</div>					
						</div>
					</div>
						<div class="col-md-6 col-sm-6 mb-4">					
						<div class="card-mats clearfix p-2 item-content-fs" style="cursor: pointer;background:none">			
							<div class="float-left">
								<b style="color: #9999e6">Talent Wins</b>
								<br>
								<span style="color: #9999e6;">hanoi,hanoi</span>
							</div>
							<div class="text-right float-right pt-2">
								<img src="asset/img/UnFavourite.png" alt="" class="icon-heart">
							</div>					
						</div>
					</div>
						<div class="col-md-6 col-sm-6 mb-4">					
						<div class="card-mats clearfix p-2 item-content-fs" style="cursor: pointer;background:none">			
							<div class="float-left">
								<b style="color: #9999e6">Talent Wins</b>
								<br>
								<span style="color: #9999e6;">hanoi,hanoi</span>
							</div>
							<div class="text-right float-right pt-2">
								<img src="asset/img/UnFavourite.png" alt="" class="icon-heart">
							</div>					
						</div>
					</div>
						<div class="col-md-6 col-sm-6 mb-4">					
						<div class="card-mats clearfix p-2 item-content-fs" style="cursor: pointer;background:none">			
							<div class="float-left">
								<b style="color: #9999e6">Talent Wins</b>
								<br>
								<span style="color: #9999e6;">hanoi,hanoi</span>
							</div>
							<div class="text-right float-right pt-2">
								<img src="asset/img/UnFavourite.png" alt="" class="icon-heart">
							</div>					
						</div>
					</div>

				</div>
				<br>
				<div class="text-center">
					<button class="btn-2" style="color: #ff4081;background:none;outline: none;">RESET</button>
					<button class="btn-2" style="background:#ff4081;color: #fff;outline: none;">SAVE</button>
				</div>
				<br>
			</div>
		</div>
	</section>
</body>
@stop
@section('js')
	<script src="asset/js/js.js"></script>
@stop