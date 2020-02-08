@extends('master-layout')
@section('title')
configurations
@endsection
@section('css')
	<link rel="stylesheet" href="asset/css/style.css">

@stop
@section('content')
<style type="text/css">
	tr{
		border-bottom: none;
	}
	table{
		margin-bottom: 0!important;
	}
	ul.ul-td{
		margin-top: 25px;
	}
</style>
<body>
	<section class="container-fluid">
		<div class="container">
			<div class="add tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
				<div class="row">
					<div class="col-md-6">
						<ul class="ul-td">
							<li _ngcontent-c16="" class="level1"><a _ngcontent-c16="" href="index.html">Home</a></li>
							<li _ngcontent-c16="" class="active1" style="pointer-events:none"><a _ngcontent-c16="">CONFIGURATION</a></li>
						</ul>
					</div>
					<div class="col-md-4 input_box">
						<span>child name, program name</span>
						<input type="text" name="name" placeholder="child name, program name">
					</div>
					<div class="col-md-2" align="right">
						<button style="border: none;background: #ff4081;color: white;padding: 5px 10px;border-radius: 5px;margin-right: 10px;margin-top: 20px;">Update</button>
					</div>

				</div>
			</div>
			<div class="table-responsive">
				<table class="table table-style-me">
					<thead class="head-table-configurations">
						<tr style="background: #9999e6">
							<th scope="col">S.no</th>
							<th scope="col">Profile Pic</th>
							<th scope="col">Child Name</th>
							<th scope="col">Programs</th>
							<th scope="col" style="text-align: left;">
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="AllowProfileEdit">
									<label class="custom-control-label" for="AllowProfileEdit" onclick="checkeds1()">Allow Profile Edit</label>
								</div>			
							</th>
							<th scope="col" style="border: none;text-align: left;">
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="AllowParentNotes">
									<label class="custom-control-label" for="AllowParentNotes" onclick="checkeds2()">Allow Parent Notes</label>
								</div>
							</th>
						</tr>
					</thead>
					<tbody class="text-center">
						<tr>
							<th scope="row">1</th>
							<td><img src="asset/img/Child.png" alt="" width="40"></td>
							<td>Khanh</td>
							<td>Kindergarten</td>
							<td class="text-center">
								<div class="custom-control custom-checkbox check-ape">	
									<!-- APE=AllowProfileEdit -->
									<input type="checkbox" class="custom-control-input check-AllowProfileEdit" checked="true">
									<label class="custom-control-label"></label>
								</div>
							</td>
							<td class="text-center">
								<div class="custom-control custom-checkbox check-ape">								
									<input type="checkbox" class="custom-control-input check-ParentNotes" checked="true">
									<label class="custom-control-label"></label>
								</div>
							</td>
						</tr>
						<tr>
							<th scope="row">2</th>
							<td><img src="asset/img/Child.png" alt="" width="40"></td>
							<td>Khanh</td>
							<td>Kindergarten</td>
							<td class="text-center">
								<div class="custom-control custom-checkbox check-ape">	
									<!-- APE=AllowProfileEdit -->
									<input type="checkbox" class="custom-control-input check-AllowProfileEdit" checked="true">
									<label class="custom-control-label"></label>
								</div>
							</td>
							<td class="text-center">
								<div class="custom-control custom-checkbox check-ape">								
									<input type="checkbox" class="custom-control-input check-ParentNotes" checked="true">
									<label class="custom-control-label"></label>
								</div>
							</td>
						</tr>
						<tr>
							<th scope="row">3</th>
							<td><img src="asset/img/Child.png" alt="" width="40"></td>
							<td>Khanh</td>
							<td>Kindergarten</td>
							<td class="text-center">
								<div class="custom-control custom-checkbox check-ape">	
									<!-- APE=AllowProfileEdit -->
									<input type="checkbox" class="custom-control-input check-AllowProfileEdit" checked="true">
									<label class="custom-control-label"></label>
								</div>
							</td>
							<td class="text-center">
								<div class="custom-control custom-checkbox check-ape">								
									<input type="checkbox" class="custom-control-input check-ParentNotes" checked="true">
									<label class="custom-control-label"></label>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</section>
</body>
@stop
@section('js')
	<script src="asset/js/js.js"></script>
	<script type="text/javascript">
		$('.input_box input').focus(function(event) {
			$(this).siblings('span').addClass('input_box_span_active');
		});
		$('.input_box input').blur(function(event) {
			if ($(this).val()=='') {
				$(this).siblings('span').removeClass('input_box_span_active');
			}
		});
	</script>
@stop