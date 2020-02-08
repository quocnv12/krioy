<!-- <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Archives</title>
	<link rel="stylesheet" href="libs/bootstrap-4.0.0/dist/css/bootstrap.min.css">
	<script src="libs/jquery-3.4.1.min.js"></script>
	<script src="libs/bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>
	<script src="asset/js/js.js"></script>

	<link rel="stylesheet" href="asset/css/style.css">
	<link rel="stylesheet" href="asset/fontawesome/css/all.min.css">
</head> -->
@extends('master-layout')
@section('title')
Archives
@endsection
@section('css')
	<link rel="stylesheet" href="asset/css/style.css">

@stop
@section('content')
<body>
	<div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
			<div class="row">
				<ul class="ul-td">
					<li _ngcontent-c16="" class="level1"><a _ngcontent-c16="" href="index.html">Home</a></li>
					<li _ngcontent-c16="" class="active1" style="pointer-events:none"><a _ngcontent-c16="">ADD EVENT</a></li>
				</ul>
			</div>
		</div>
	<section class="container-fluid">
		<div class="container" style="padding: 0px">
			<div id="content-1" class="card-archives">
				<h4 class="title-card-archives">GRADUATED CHILDREN <span class="arrow float-right"><i class="fas fa-chevron-right"></i></span></h4>
				<div class="content-card-archives row padding-0 margin-0" style="display: none">

					<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 padding-0 item-card-archives" data-toggle="modal" data-target=".bd-example-modal-sm">
						<div class="row padding-0 margin-0 bg-white" style="justify-content: center; padding:10px 0;">
							<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 padding-0 text-left pl-16px">
								<img src="asset/img/Child.png" alt="">
							</div>
							<div class="col-lg-8 col-md-7 col-sm-12 col-xs 12 padding-0 text-left pl-16px">
								<span style="color: #5363d6">Nguyen Khanh</span>
								<br>
								<span style="color: gray; font-size: 12px">Graduated on:</span>
								<span style="font-size: 12px"> 07 Dec 2019</span>
							</div>
						</div>
					</div>					
				</div>
			</div>
			<br>
			<div id="content-2" class="card-archives">
				<h4 class="title-card-archives">ARCHIVED CHILDREN <span class="arrow float-right"><i class="fas fa-chevron-right"></i></span></h4>
				<div class="content-card-archives row padding-0 margin-0" style="display: none">
					<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 padding-0 item-card-archives" data-toggle="modal" data-target=".bd-example-modal-sm">
						<div class="row padding-0 margin-0 bg-white" style="justify-content: center; padding:10px 0;">
							<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 padding-0 text-left pl-16px">
								<img src="asset/img/Child.png" alt="">
							</div>
							<div class="col-lg-8 col-md-7 col-sm-12 col-xs 12 padding-0 text-left pl-16px">
								<span style="color: #5363d6">Nguyen Khanh</span>
								<br>
								<span style="color: gray; font-size: 12px">Graduated on:</span>
								<span style="font-size: 12px"> 07 Dec 2019</span>
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
				<h2 style="color: #5363d6!important">View</h2>		
				<h2 class="modal-li" data-href="profile-child.html" data-toggle="modal" data-target="#myModal">Profile</h2>		
				<h2 class="modal-li" data-href="invoices.html">History</h2>			
				<h2 class="modal-li" data-href="attachment.html">Parent Notes</h2>
				<h2 class="modal-li" data-href="Authoriesd-Pickups.html">Invoices</h2>
			</div>
		</div>
	</div>
	<!-- Modal-chi tiet hoc sinh -->
	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog" style="max-width: 690px!important;">
			<!-- Modal content-->
			<div class="modal-content" style="border-top-left-radius: 7px; border-top-right-radius: 7px;">
				<div class="modal-header text-left" style="background-color:#343a40;color:#fff;border-radius: 5px 5px 0px 0px;display: block">
					<h4 style="text-transform: none;font-size:18px;font-weight: 600;display: inline-block">Nguyen's Profile</h4>
					<button type="button" class="close" data-dismiss="modal" style="font-size:30px;color:#fff;opacity:1;line-height: 22px;outline: none">&times;
					</button>
				</div>
				<div class="modal-body" style="border-radius: 0px 0px 5px 0px;margin-bottom: 5px;overflow:auto; height: 500px">
					<div class="item-info">
						<div class="header-item-info">
							CHILD DETAILS
						</div>
						<div class="row" style="padding-left: 14px">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="padding-top: 10px">
								<img src="images/Child.png" alt="">
							</div>
							<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
								<p class="margin-0"><span style="color: gray;font-size: 13px">First name:</span> Nguyen</p>		
								<p class="margin-0"><span style="color: gray;font-size: 13px">Last name:</span> Khanh</p>		
								<p class="margin-0"><span style="color: gray;font-size: 13px">Birthday:</span> 01 Jan 2018</p>			
							</div>
						</div>
						<hr>
						<div class="row" style="padding-left: 14px">
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<p class="margin-0"><span style="color: gray;font-size: 13px">Blood group:</span> A+</p>		
								<p class="margin-0"><span style="color: gray;font-size: 13px">Gender:</span> Male</p>		
								<p class="margin-0"><span style="color: gray;font-size: 13px">Date of Joining:</span> 04 Sep 2019</p>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<p class="margin-0"><span style="color: gray;font-size: 13px">Unique ID:</span> </p>		
								<p class="margin-0"><span style="color: gray;font-size: 13px">Allergies:</span> </p>		
								<p class="margin-0"><span style="color: gray;font-size: 13px">Residential Address:</span> </p>
							</div>
						</div>
						<div class="row"  style="padding-left: 14px">
							<div class="col-lg-12 col-md-12 col-sm-12 co-xs-12">
								<p class="margin-0"><span style="color: gray;font-size: 13px">Additional Notes:</span> </p>
							</div>
						</div>
					</div>
					<div class="item-info mb-4">
						<div class="header-item-info">
							PROGRAMS
						</div>
						<div class="row" style="padding-left: 14px">
							<div class="col-lg-12 col-md-12 col-sm-12 co-xs-12">
								<span style="margin-right: 3px;color: gray;padding: 3px;border-radius: 4px;border: 1px solid gray;display: inline-block">untagged</span>
							</div>
						</div>
					</div>
					<div class="item-info">
						<div class="header-item-info">
							PARENTS
						</div>
						<div class="row" style="padding-left: 14px">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="padding-top: 10px">
								<img src="asset/img/Parent.png" alt="">
							</div>
							<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
								<p class="margin-0"><span style="color: gray;font-size: 13px">First name:</span> Nguyen</p>		
								<p class="margin-0"><span style="color: gray;font-size: 13px">Last name:</span> Khanh</p>		
								<p class="margin-0"><span style="color: gray;font-size: 13px">Phone Number:</span> +910123456789</p>
								<p class="margin-0"><span style="color: gray;font-size: 13px">Relation:</span> Father</p>		
								<p class="margin-0"><span style="color: gray;font-size: 13px">E-mail:</span> khanh97@gmail.com</p>		
							</div>
						</div>	
					</div>			
				</div>
			</div>
		</div>
	</div>
</body>
@stop
@section('js')
	<script src="asset/js/js.js"></script>
@stop