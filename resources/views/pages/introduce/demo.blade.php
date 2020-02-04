@extends('master-layout')
@section('title')
	Add Notice
@endsection

@section('content')
<body id="login">
	<section class="page-top-center container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<form method="POST">
					@csrf
				<div class="login" align="center" style="width: 100%">
					<div class="login-label">
						<p>Kids Now Account Demo</p>
					</div>
					<div class="login-input">
					@if (session('thongbao'))
					<p style="font-size: 14px;font-weight: 100;color:red;font-style: italic;line-height: 25px;text-align: left;width:80%;margin-top:20px;margin-bottom:0px;">* {{ session('thongbao') }}</p>
					@endif
					@if (session('success'))
					<p style="font-size: 14px;font-weight: 100;color:red;font-style: italic;line-height: 25px;text-align: left;width:80%;margin-top:20px;margin-bottom:0px;">* {{ session('success') }}</p>
					@endif
						<p style="margin-top:10px;color:red" id="expired"></p>
						<div class="add">
							<div class="row">
								<div class="col-md-6">
									<div class="input_box" style="width: 100%;">
									 	<span>First Name</span>
										 <input type="text" value="{{ old('first_name') }}" name="first_name" placeholder="First Name*">
										 @if ($errors->has('first_name'))
										<p style="font-size: 12px;font-weight: 100;color:red;font-style: italic;line-height: 25px;text-align: left;width:80%;margin-top:10px;margin-bottom:0px">* {{ $errors->first('first_name') }}</p>
										@endif
									</div>
								</div>
								<div class="col-md-6">
									<div class="input_box" style="width: 100%;">
										<span>Email</span>
										<input type="text" value="{{ old('email') }}"  name="email" placeholder="Email*">
										@if ($errors->has('email'))
										<p style="font-size: 12px;font-weight: 100;color:red;font-style: italic;line-height: 25px;text-align: left;width:80%;margin-top:10px;margin-bottom:0px">* {{ $errors->first('email') }}</p>
										@endif
									</div>
								</div>
							</div>
						</div>
						<div class="add">
							<div class="row">
								<div class="col-md-6">
									<div class="input_box" style="width: 100%;">
								        <span>Phone Number *</span>
										<input type="phone" name="phone" value="{{ old('phone') }}" placeholder="Phone Number*">
										@if ($errors->has('phone'))
										<p style="font-size: 12px;font-weight: 100;color:red;font-style: italic;line-height: 25px;text-align: left;width:80%;margin-top:10px;margin-bottom:0px">* {{ $errors->first('phone') }}</p>
										@endif
								    </div>
								</div>
								<div class="col-md-6">
									<div class="input_box" style="width: 100%;">
								<span>Enter your password</span>
								<input type="password" name="password" placeholder="PassWord">
								@if ($errors->has('password'))
								<p style="font-size: 12px;font-weight: 100;color:red;font-style: italic;line-height: 25px;text-align: left;;width:80%;margin-top:10px;margin-bottom:0px">* {{ $errors->first('password') }}</p>
								@endif
							</div>
								</div>
							</div>
						</div>
					</div>
					<div class="login-button" align="center">
						<button type="submit"><span>Register</span></button>
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