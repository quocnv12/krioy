<html>
	<head>
		<meta charset="utf-8">
		<title>Kids-now Reset PassWord</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="stylesheet" href="../asset/kriyo/css/index.css">
		<link rel="stylesheet" type="text/css" href="../asset/kriyo/css/staff_profile.css">
		<link rel="icon" href="../images/a.png"/>

		<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
   		<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    	<link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    	<link rel="stylesheet" href="../asset/kriyo/css/bootstrap.min.css">
    
	    <!-- Font Awesome -->
	    <link rel="stylesheet" href="../asset/kriyo/css/font-awesome.min.css">
	    
	    <!-- Custom CSS -->
	    <link rel="stylesheet" href="../asset/kriyo/css/owl.carousel.css">
	</head>
<body id="login">
	<section class="page-top-center container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<form method="POST">
					@csrf
				<div class="login" align="center">
					<div class="login-label">
						<p>Forgot Password</p>
					</div>
					<div class="login-input">
					@if (session('thongbao'))
					<p style="font-size: 14px;font-weight: 100;color:red;font-style: italic;line-height: 25px;text-align: left;width:80%;margin-top:20px;margin-bottom:0px;">* {{ session('thongbao') }}</p>
					@endif
						<div class="add">
							<div class="input_box" style="width: 100%;">
						        <span>Passsword </span>
								<input type="password" name="password"  placeholder="Password">
								@if ($errors->has('password'))
								<p style="font-size: 12px;font-weight: 100;color:red;font-style: italic;line-height: 25px;text-align: left;width:80%;margin-top:10px;margin-bottom:0px">* {{ $errors->first('password') }}</p>
								@endif
						    </div>
						</div>
						<div class="add">
							<div class="input_box" style="width: 100%;">
								<span>Comfirm password</span>
								<input type="password" name="password_confirmation"  placeholder="Comfirm PassWord">
								@if ($errors->has('password_confirmation'))
								<p style="font-size: 12px;font-weight: 100;color:red;font-style: italic;line-height: 25px;text-align: left;;width:80%;margin-top:10px;margin-bottom:0px">* {{ $errors->first('password_confirmation') }}</p>
								@endif
							</div>
						</div>
					</div>
					<div class="login-button" align="center">
						<button type="submit">
							<span>OK</span>
						</button>
				
						<a href="../login"><button type="button">
							<span>Cancel</span>
						</button></a>	
				
					</form>
					</div>
				</div>
			
			<div class="col-md-3"></div>
		</div>
	</section>
</body>

	<script src="https://code.jquery.com/jquery.min.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <script src="../asset/kriyo/js/owl.carousel.min.js"></script>
    <script src="../asset/kriyo/js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="../asset/kriyo/js/jquery.easing.1.3.min.js"></script>
    
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
	</script>
</html>