@extends('master-layout')
@section('title')
Allergyinfo
@endsection
@section('css')
	<link rel="stylesheet" href="asset/css/style.css">

@stop
@section('content')
<style type="text/css">
	button.bt-aller{
		padding: 4px 15px;
	    border: 1px solid #ccc;
	    background: white;
	    border-radius: 5px;
	    cursor: pointer;
	    color: #3f51b5;
	}
	button.bt-aller:hover{
		background: #ccc; 
	}
</style>
<body style="background: white !important;">
	<section class="container-fluid">
		<div class="container">
			<div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
				<div class="row">
					<div class="col-md-9">
						<ul class="ul-td">
							<li _ngcontent-c16="" class="level1"><a _ngcontent-c16="" href="index.html">Home</a></li>
							<li _ngcontent-c16="" class="active1" style="pointer-events:none"><a _ngcontent-c16="">ALLERGY INFO</a></li>
						</ul>
					</div>
					<div class="col-md-3" style="text-align: right;">
						<button class="bt-aller">DownLoad</button>
					</div>
				</div>
			</div>
			<div class="row mt-5">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 card-allergy-info">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<img src="asset/img/Child.png" alt="">
							<span style="padding-left: 10px">Văn</span>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus, repudiandae.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row mt-5">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 card-allergy-info">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<img src="asset/img/Child.png" alt="">
							<span style="padding-left: 10px">Văn</span>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus, repudiandae.</p>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</section>
</body>
@stop
@section('js')
	<script src="asset/js/js.js"></script>
@stop