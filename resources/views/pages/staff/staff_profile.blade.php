@extends('master-layout')
@section('title')
	Staff Frofiles
@endsection

@section('content')
	<body>

	<section class="page-top container">
		<div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
			<div class="row">
				<ul class="ul-td">
					<li _ngcontent-c16="" class="level1"><a _ngcontent-c16="">HOME</a></li>
					<li _ngcontent-c16="" class="active1" style="pointer-events:none"><a _ngcontent-c16="">STAFF PROFILES</a></li>
				</ul>
			</div>
		</div>
		<table border="0">
			<tbody>
				<tr class="td1">
					<th>S.no</th>
					<th>Profile Pic</th>
					<th>Staff Name</th>
					<th>Programs</th>
				</tr>
				<tr class="td2" data-href="profile.html">
					<th>1</th>
					<th><img src="images/Staff.png" alt=""></th>
					<th>Nguyen Van A</th>
					<th>Hai Ba Trung, Ha Noi</th>
				</tr>
				<tr class="td2" data-href="profile.html">
					<th>2</th>
					<th><img src="images/Staff.png" alt=""></th>
					<th>Nguyen Van A</th>
					<th>Hai Ba Trung, Ha Noi</th>
				</tr>
				<tr class="td2" data-href="profile.html">
					<th>3</th>
					<th><img src="images/Staff.png" alt=""></th>
					<th>Nguyen Van A</th>
					<th>Hai Ba Trung, Ha Noi</th>
				</tr>
			</tbody>
		</table>
	</section>
		<div class="icon-plus">
			<a href="create_staff.blade.php">
				<i class="fa fa-plus"></i>
			</a>
		</div>
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
		    $(".td2").click(function() {
		        window.document.location = $(this).data("href");
		    });
		});
    </script>
@endsection
