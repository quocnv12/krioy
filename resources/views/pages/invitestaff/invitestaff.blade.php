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
		<div class="container" style="padding: 0px">
			<div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
				<div class="row">
					<ul class="ul-td">
						<li _ngcontent-c16="" class="level1"><a _ngcontent-c16="" href="index.html">Home</a></li>
						<li _ngcontent-c16="" class="active1" style="pointer-events:none"><a _ngcontent-c16="">Invite Staff</a></li>
					</ul>
				</div>
			</div>
			<div id="content-1" class="card-archives">
				<div class="title-card-archives" style="background-color: #5363d6">
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 text-left">
							<b style="font-size:15px;color: #fff;padding-left: 10px">Staff</b>
							<!-- <h4 class="title-card-archives">GRADUATED CHILDREN </h4> -->
						</div>
						<div class="col-lg-5 col-md-5 d-md-block d-sm-none d-none text-left">
							<b style="font-size: 13px;color: #fff"> Active: 1</b>
							<b style="font-size: 13px;color: #fff;padding-left: 10px"> Inactive: 0 </b>
							<b style="font-size: 13px;color: #fff;padding-left: 10px"> Total: 1 </b>
						</div>
						<div class="col-lg-3 col-md-3 d-md-block d-sm-none d-none text-right">
							<p><span class="arrow float-right"><i class="fas fa-chevron-right"></i></span></p>
						</div>
					</div>
				</div>
				<div class="content-card-archives row padding-0 margin-0" style="display: none">

					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding-0 item-card-archives">
						<div class="row padding-0 margin-0 bg-white mb-2" style="justify-content: center; padding:10px 0;">
							<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 padding-0 text-left pl-16px">
								<div class="row">
									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-center">
										<img src="asset/img/Child.png" alt="">
									</div>
									<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
										<span style="font-size: 13px;color: #5363d6">vu minh hai</span>
										<br>
										<span>Last Seen:</span>
										<span style="font-size: 13px;color: #5363d6">+84 927151535</span>
									</div>
								</div>	
							</div>
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs 12 padding-0 text-left pl-16px">
								<span >Phone</span>
								<span style="font-size: 13px;color: #5363d6">+84 927151535</span>
								<br>
								<span >Email</span>
								<span style="font-size: 13px;color: #5363d6">haivm1979@gmail.com</span>
							</div>
							<div class="col-lg-3 col-md-3 col col-sm-12 col-xs-12 text-right">
								<button class="text-white btn-invite2" style="outline: none;" data-toggle="modal" data-target=".bd-example-modal-sm">
									<span >INVITE</span>
								</button>
							</div>
						</div>
					</div>					
				</div>
			</div>
			<br>
			<div id="content-2" class="card-archives">
				<div class="title-card-archives" style="background-color: #5363d6">
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 text-left">
							<b style="font-size:15px;color: #fff;padding-left: 10px">Drivers</b>
							<!-- <h4 class="title-card-archives">GRADUATED CHILDREN </h4> -->
						</div>
						<div class="col-lg-5 col-md-5 d-md-block d-sm-none d-none text-left">
							<b style="font-size: 13px;color: #fff"> Active: 1</b>
							<b style="font-size: 13px;color: #fff;padding-left: 10px"> Inactive: 0 </b>
							<b style="font-size: 13px;color: #fff;padding-left: 10px"> Total: 1 </b>
						</div>
						<div class="col-lg-3 col-md-3 d-md-block d-sm-none d-none text-right">
							<p><span class="arrow float-right"><i class="fas fa-chevron-right"></i></span></p>
						</div>
					</div>
				</div>
				<div class="content-card-archives row padding-0 margin-0" style="display: none">

					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding-0 item-card-archives">

						<div class="row padding-0 margin-0 bg-white mb-2" style="justify-content: center; padding:10px 0;">
							<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 padding-0 text-left pl-16px">
								<div class="row">
									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-center">
										<img src="asset/img/Child.png" alt="">
									</div>
									<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
										<span style="font-size: 13px;color: #5363d6">vu minh hai</span>
										<br>
										<span>Last Seen:</span>
										<span style="font-size: 13px;color: #5363d6">+84 927151535</span>
									</div>
								</div>	
							</div>
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs 12 padding-0 text-left pl-16px">
								<span>Phone</span>
								<span style="font-size: 13px;color: #5363d6">+84 927151535</span>
								<br>
								<span >Email</span>
								<span style="font-size: 13px;color: #5363d6">haivm1979@gmail.com</span>
							</div>
							<div class="col-lg-3 col-md-3 col col-sm-12 col-xs-12 text-right">
								<button class="text-white btn-invite2" style="outline: none;" data-toggle="modal" data-target=".bd-example-modal-sm">
									<span >INVITE</span>
								</button>
							</div>
						</div>
					</div>					
				</div>
			</div>
			
		</div>
	</section>
	<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content text-center">
				<h2 style="color: #5363d6!important">Invite Via</h2>		
				<h2 class="modal-li" data-href="profile-child.html" data-toggle="modal" data-target="#myModal" style="color:gray;font-size:18px;">PDF</h2>	
			</div>
		</div>
	</div>
	
</body>
@stop
@section('js')
	<script src="asset/js/js.js"></script>
@stop