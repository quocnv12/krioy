@extends('master-layout')
@section('title')
FAQs
@endsection
@section('css')
	<link rel="stylesheet" href="asset/css/style.css">

@stop
@section('content')
<body style="background: white !important;">
	<section class="container-fluid">
		<div class="container">
			<div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
				<div class="row">
					<ul class="ul-td">
						<li _ngcontent-c16="" class="level1"><a _ngcontent-c16="" href="index.html">Home</a></li>
						<li _ngcontent-c16="" class="active1" style="pointer-events:none"><a _ngcontent-c16="">FAQs</a></li>
					</ul>
				</div>
			</div>
			<div class="card-mats p-3">
				<div id="content-card-mats" style="display: block">
					<form action="" class="d-flex flex-row search-invite-parents mb-3" >
						<input type="text" class="flex-grow-1 border-0" style="background: none; outline: none" placeholder="Search">
					</form>
					<a class="row" onclick="show_info('active-dccm-1')">
						<p class="col-10">Benefits of Kriyo App</p>
						<p class="col-2 text-right"><i class="fas fa-angle-right"></i></p>
					</a>
					<a class="row" onclick="show_info('active-dccm-2')">
						<p class="col-10">Login Related Queries</p>
						<p class="col-2 text-right"><i class="fas fa-angle-right"></i></p>
					</a>
				</div>
				<!-- detail-content-card-mats=dccm -->
				<div class="detail-content-card-mats" style="display: none" id="active-dccm-1">
					<!-- ẤN THÌ QUAY LẠI TRANG BAN ĐÂU BẰNG THẺ A -->
					<a href="FAQs" class="title-detail-content-card-mats">
						<i class="fas fa-angle-left" style="padding-right: 5px"> </i>  Benefits of Kriyo App
					</a>
					<div class="item-info-2">
						<div class="title-info" data-toggle="collapse" data-target="#infor1">
							<i class="fas fa-plus" style="padding-right: 5px"></i>
							How is Kriyo app useful to schools and parents?
						</div>
						<div id="infor1" class="collapse">
							Kriyo is an easy to use app that can be used on a Phone, Tab, Laptop or a Desktop to manage everything from Enquiries, Admissions, Fee payments, School Bus Tracker and to Communicate with parents. You can give custom permissions to your staff and monitor every update in the app from anywhere, anytime. Parents can get all updates about their child, pay fee, know about events and holidays, assignments and many more
						</div>
					</div>
					<div class="item-info-2">
						<div class="title-info" data-toggle="collapse" data-target="#infor2">
							<i class="fas fa-plus" style="padding-right: 5px"></i>
							How is Kriyo app useful to schools and parents?
						</div>
						<div id="infor2" class="collapse">
							Kriyo is an easy to use app that can be used on a Phone, Tab, Laptop or a Desktop to manage everything from Enquiries, Admissions, Fee payments, School Bus Tracker and to Communicate with parents. You can give custom permissions to your staff and monitor every update in the app from anywhere, anytime. Parents can get all updates about their child, pay fee, know about events and holidays, assignments and many more
						</div>
					</div>
					<div class="item-info-2">
						<div class="title-info" data-toggle="collapse" data-target="#infor3">
							<i class="fas fa-plus" style="padding-right: 5px"></i>
							How is Kriyo app useful to schools and parents?
						</div>
						<div id="infor3" class="collapse">
							Kriyo is an easy to use app that can be used on a Phone, Tab, Laptop or a Desktop to manage everything from Enquiries, Admissions, Fee payments, School Bus Tracker and to Communicate with parents. You can give custom permissions to your staff and monitor every update in the app from anywhere, anytime. Parents can get all updates about their child, pay fee, know about events and holidays, assignments and many more
						</div>
					</div>
				</div>
				<!-- ----------------------------------------- -->
				<div class="detail-content-card-mats" style="display: none" id="active-dccm-2">
					<!-- ẤN THÌ QUAY LẠI TRANG BAN ĐÂU BẰNG THẺ A -->
					<a href="FAQs.html" class="title-detail-content-card-mats">
						<i class="fas fa-angle-left" style="padding-right: 5px"> </i>  Login Related Queries
					</a>
					<div class="item-info-2">
						<div class="title-info" data-toggle="collapse" data-target="#infor1">
							<i class="fas fa-plus" style="padding-right: 5px"></i>
							How is Kriyo app useful to schools and parents?
						</div>
						<div id="infor1" class="collapse">
							Kriyo is an easy to use app that can be used on a Phone, Tab, Laptop or a Desktop to manage everything from Enquiries, Admissions, Fee payments, School Bus Tracker and to Communicate with parents. You can give custom permissions to your staff and monitor every update in the app from anywhere, anytime. Parents can get all updates about their child, pay fee, know about events and holidays, assignments and many more
						</div>
					</div>
					<div class="item-info-2">
						<div class="title-info" data-toggle="collapse" data-target="#infor2">
							<i class="fas fa-plus" style="padding-right: 5px"></i>
							How is Kriyo app useful to schools and parents?
						</div>
						<div id="infor2" class="collapse">
							Kriyo is an easy to use app that can be used on a Phone, Tab, Laptop or a Desktop to manage everything from Enquiries, Admissions, Fee payments, School Bus Tracker and to Communicate with parents. You can give custom permissions to your staff and monitor every update in the app from anywhere, anytime. Parents can get all updates about their child, pay fee, know about events and holidays, assignments and many more
						</div>
					</div>
					<div class="item-info-2">
						<div class="title-info" data-toggle="collapse" data-target="#infor3">
							<i class="fas fa-plus" style="padding-right: 5px"></i>
							How is Kriyo app useful to schools and parents?
						</div>
						<div id="infor3" class="collapse">
							Kriyo is an easy to use app that can be used on a Phone, Tab, Laptop or a Desktop to manage everything from Enquiries, Admissions, Fee payments, School Bus Tracker and to Communicate with parents. You can give custom permissions to your staff and monitor every update in the app from anywhere, anytime. Parents can get all updates about their child, pay fee, know about events and holidays, assignments and many more
						</div>
					</div>
				</div>
				<!-- --------------------->
			</div>
		</div>	
	</section>
</body>
@stop
@section('js')
	<script src="asset/js/js.js"></script>
@stop