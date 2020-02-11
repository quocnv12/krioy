@extends('master-layout')
@section('title')
	Login
@endsection
@section('css')

{{-- <link href="admin-template/assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" /> --}}
<link href="admin-template/assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen" />
<link href="admin-template/assets/plugins/jquery-datatable/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
<link href="admin-template/assets/plugins/datatables-responsive/css/datatables.responsive.css" rel="stylesheet" type="text/css" media="screen" />

<link rel="stylesheet" href="asset/kriyo/css/index.css">
		<link rel="stylesheet" type="text/css" href="asset/kriyo/css/staff_profile.css">
		<link rel="icon" href="images/a.png"/>

<link href="admin-template/assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen" />
{{-- <link href="admin-template/assets/plugins/bootstrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> --}}
<link href="admin-template/assets/plugins/bootstrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="admin-template/assets/plugins/animate.min.css" rel="stylesheet" type="text/css" />
<link href="admin-template/assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" />
<link href="admin-template/webarch/css/webarch.css" rel="stylesheet" type="text/css" />

@endsection
@section('content')

<body id="login">
	<section class="page-top-center container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<form method="POST">
					@csrf
				<div class="login" align="center">
					<div class="login-label">
						<p>Kids Now App Login</p>
					</div>
					<div class="login-input">
					
						<p style="margin-top:10px;color:red" id="expired"></p>
						<div class="add">
							<div class="input_box" style="width: 100%;">
						        <span>Phone Number *</span>
								<input type="phone" name="phone" value="{{ old('phone') }}" placeholder="Phone Number*">
								@if ($errors->has('phone'))
								<p style="font-size: 12px;font-weight: 100;color:red;font-style: italic;line-height: 25px;text-align: left;width:80%;margin-top:10px;margin-bottom:0px">* {{ $errors->first('phone') }}</p>
								@endif
						    </div>
						</div>
						<div class="add">
							<div class="input_box" style="width: 100%;">
								<span>Enter your password</span>
								<input type="password" name="password" placeholder="PassWord">
								@if ($errors->has('password'))
								<p style="font-size: 12px;font-weight: 100;color:red;font-style: italic;line-height: 25px;text-align: left;;width:80%;margin-top:10px;margin-bottom:0px">* {{ $errors->first('password') }}</p>
								@endif
							</div>
						</div>
					</div>
					<div style="margin-top:10px" class="row">
						<div class="col-md-6" >
						
							<input type="checkbox"  name="remember"> Remember me
						
						</div>
						<a href="forgot">Forgot password?</a>
					</div>
					<div class="login-button" align="center">
						<button type="submit"><span>Login</span></button>
					</div>
				</div>
			</form>
			<div class="col-md-3"></div>
		</div>
	</section>
	<footer class="site-footer">
		<div class="container">
			<div class="row icon-lienket" style="display: block;">
			 	<a href="#">
			 		<img src="images/facebook-circle-white.png" alt="" title="Face-book">
			 	</a>
			 	<a href="#">
			 		<img src="images/linkedin-circle-white.png" title="Linkedin">
			 	</a>
			 	<a href="#">
			 		<img src="images/mail-circle-white.png" alt="" title="Email">
			 	</a>
			</div>
			<div class="row" style="display: block;">
				<p> 2019 © 
					<b>Kids Now</b>, a product of <b><a href="http://www.web88.vn/">Web88</a></b>
				</p>
				<p>
					<a href="#" class="termsHover"> Privacy Policy</a>
					<span>&</span>
					<a href="#" class="termsHover"> Terms and Conditions</a>
				</p>
			</div>
		</div>
	</footer>


	{{-- <div class="modal fade" id="myModal-login" role="dialog">
		<div class="modal-dialog modal-sm">
	      <!-- Modal content-->
	    	<div class="modal-content">
		        <div class="modal-header" style="background-color:#FF4081;color:#fff;border-radius: 5px 5px 0px 0px">
		        	<button type="button" class="close" data-dismiss="modal" style="font-size:30px;color:#fff;opacity:1">&times;</button>
		        	<h4 class="modal-title" align="center" style="text-transform: none;font-size:18px;font-weight: 600;">Forgot password</h4>
				</div>
				<form action="forgot" method="POST">
					@csrf
					<div class="modal-body" style="border-radius: 0px 0px 5px 0px;margin-bottom: 5px;overflow:auto;height: auto;">
						<div class="add">
							
								<p style="text-align:left;    padding: 0px 0px 5px 0px;">Email *</p>
								@if ($errors->has('emailreset'))
								<p style="font-size: 12px;font-weight: 100;color:red;font-style: italic;text-align: left;width:80%;">* {{ $errors->first('emailreset') }}</p>
								@endif
								<input type="text" name="emailreset" class="form-control" placeholder="Please Enter Email">
								
							</div>
						
						<div  style="margin: 10px 0;">
							<button type="submit" style="margin:0px;width: 76px;float:right;margin-right: 10px;background: #ff4081;box-shadow: 0 3px 1px -2px rgba(0,0,0,.2), 0 2px 2px 0 rgba(0,0,0,.14), 0 1px 5px 0 rgba(0,0,0,.12);color: white;border-radius: 5px;">OK</button>
						</div>
					</div>
			</form>
	     	</div>
	    </div>
	</div> --}}
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
		$('.input_box input').focus(function(event) {
	    	$(this).siblings('span').addClass('input_box_span_active');
		});
		$('.input_box input').blur(function(event) {
	    	if ($(this).val()=='') {
	      		$(this).siblings('span').removeClass('input_box_span_active');
	    	}
		});
		@if(session()->has('expired'))
			var expired = document.getElementById('expired');
			var time = {{ session()->get('expired') }}
			var countDown = setInterval(() => {
				if(time <= 1)
				{
					clearInterval(countDown);
					expired.style.display = "none";
				}
				time--;
				expired.innerHTML = `Please waiting for ${time}s to continue`;
			},1000)
		@endif
	</script>
@endsection