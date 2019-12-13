@extends('master-layout')
@section('title')
	Photos
@endsection

@section('content')
	<body>
	<section class="page-top container">
		<div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
			<div class="row">
				<ul class="ul-td">
					<li _ngcontent-c16="" class="level1"><a _ngcontent-c16="">HOME</a></li>
					<li _ngcontent-c16="" class="active1" style="pointer-events:none"><a _ngcontent-c16="">PHOTOS</a></li>
				</ul>
			</div>
		</div>
		<div class="mat-card">
			<div class="mat-content">
				<button class="accordion accordion1 clearfix">
					<p style="float: left;">Children *</p>
					<a href="select_child.blade.php" style="float: right;text-align: right">
						<p style="color: #fff;border: 1px solid #ff4081;padding: 5px;margin: 5px 0;background: #ff4081;border-radius: 5px;text-decoration: none;">SELECT</p>
					</a>
				</button>
				<div class="panel">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
				</div>
			</div>
			<div class="mat-content">
				<button class="accordion accordion1 clearfix">
					<p style="float: left;">Image *</p>
					<a href="#" style="float: right;text-align: right">
						<div class="input-file-container">  
							<input class="input-file" type='file' onchange="readURL(this);" id="input-Incident" />
							<label tabindex="0" for="my-file" class="input-file-trigger" style="border-radius: 0;">
								<i class="fa fa-paperclip"></i>
							</label>
						</div>
					</a>
				</button>
				<div class="panel">
					<p align="center">No images uploaded.To upload click on ' Select ' button</p>
				</div>
			</div>
			<div class="comment">
				<div class="input_box" style="width: 100%;">
					<span>Comment about the photo here *</span>
					<input type="text" name="detail" placeholder="Comment about the photo here *">
				</div>
				<div class="button" style="text-align: center;">
					<button class="button2">
						<span>SEND</span>
					</button>
				</div>
			</div>
		</div>
	</section>
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
    <script>
		var acc = document.getElementsByClassName("accordion");
		var i;

		for (i = 0; i < acc.length; i++) {
		  acc[i].addEventListener("click", function() {
		    this.classList.toggle("active");
		    var panel = this.nextElementSibling;
		    if (panel.style.maxHeight) {
		      panel.style.maxHeight = null;
		    } else {
		      panel.style.maxHeight = panel.scrollHeight + "px";
		    } 
		  });
		}
	</script>
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
	<script type="text/javascript">
		$('.input_box select').focus(function(event) {
	    	$(this).siblings('span').addClass('input_box_span_active');
		});
		$('.input_box select').blur(function(event) {
	    	if ($(this).val()=='') {
	      		$(this).siblings('span').removeClass('input_box_span_active');
	    	}
		});
	</script>
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
@endsection
