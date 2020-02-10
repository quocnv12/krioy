@extends('master-layout')
@section('title')
	Star
@endsection

@section('content')
	<body>

		<section class="page-top container">
			<div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
				<div class="row">
					<ul class="ul-td">
						<li _ngcontent-c16="" class="level1"><a _ngcontent-c16="">@lang('kidsnow.home')</a></li>
						<li _ngcontent-c16="" class="active1" style="pointer-events:none"><a _ngcontent-c16="">@lang('kidsnow.stars')</a></li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="mat-card">
					<div class="mat-content">
						<button class="accordion accordion1 clearfix">
							<p style="float: left;">@lang('kidsnow.children') *</p>
							<a href="Select-Child.html" style="float: right;text-align: right">
								<p style="color: #fff;border: 1px solid #ff4081;padding: 5px;margin: 5px 0;background: #ff4081;border-radius: 5px;text-decoration: none;">@lang('kidsnow.select')</p>
							</a>
						</button>
						<div class="panel">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
						</div>
					</div>
					<hr>
					<div class="mat-content">
						<button class="accordion_new">@lang('kidsnow.star_type')
							<i class="fa fa-chevron-circle-down"></i>
						</button>
						<div class="panel_new">
							<div _ngcontent-c20="" class="row" style="">
								<!---->
								<div _ngcontent-c20="" align="center" class="col-xs-6 col-sm-4 col-md-3 col-lg-2 ng-star-inserted" style="padding:10px;cursor:pointer;">
									<button _ngcontent-c20="" class="btn progBtn limitText" style="background-color:transparent;border:1px solid #5363d6;border-radius: 4px">@lang('kidsnow.brave')</button>
								</div>
								<div _ngcontent-c20="" align="center" class="col-xs-6 col-sm-4 col-md-3 col-lg-2 ng-star-inserted" style="padding:10px;cursor:pointer">
									<button _ngcontent-c20="" class="btn progBtn limitText bgClass" style="background-color:transparent;border:1px solid #5363d6;border-radius: 4px">@lang('kidsnow.creative')</button>
								</div>
								<div _ngcontent-c20="" align="center" class="col-xs-6 col-sm-4 col-md-3 col-lg-2 ng-star-inserted" style="padding:10px;cursor:pointer">
									<button _ngcontent-c20="" class="btn progBtn limitText bgClass" style="background-color:transparent;border:1px solid #5363d6;border-radius: 4px">@lang('kidsnow.friendly')</button>
								</div>
								<div _ngcontent-c20="" align="center" class="col-xs-6 col-sm-4 col-md-3 col-lg-2 ng-star-inserted" style="padding:10px;cursor:pointer"><button _ngcontent-c20="" class="btn progBtn limitText bgClass" style="background-color:transparent;border:1px solid #5363d6;border-radius: 4px">@lang('kidsnow.menu_help')</button>
								</div>
								<div _ngcontent-c20="" align="center" class="col-xs-6 col-sm-4 col-md-3 col-lg-2 ng-star-inserted" style="padding:10px;cursor:pointer">
									<button _ngcontent-c20="" class="btn progBtn limitText" style="background-color:transparent;border:1px solid #5363d6;border-radius: 4px">@lang('kidsnow.punctual')</button>
								</div>
								<div _ngcontent-c20="" align="center" class="col-xs-6 col-sm-4 col-md-3 col-lg-2 ng-star-inserted" style="padding:10px;cursor:pointer"><button _ngcontent-c20="" class="btn progBtn limitText bgClass" style="background-color:transparent;border:1px solid #5363d6;border-radius: 4px">@lang('kidsnow.quick_learn')</button>
								</div>
							</div>
						</div>
					</div>
					<div class="comment">
						<div class="row">
							<div class="col-md-11 input_box">
								<span>@lang('kidsnow.enter_details_here')</span>
								<input type="text" name="text" placeholder="@lang('kidsnow.enter_details_here')">
							</div>
							<div class="col-md-1">
								<div class="zoom">
									<a _ngcontent-c9="" class="zoom-fab zoom-btn-large fa fa-paperclip" id="zoomBtn" style="font-size: 30px;cursor: pointer"></a>
								</div>
							</div>
						</div>
						<div class="button" style="text-align: center;">
							<button>
								<span>@lang('kidsnow.cancel')</span>
							</button>
							<button class="button2">
								<span>@lang('kidsnow.send')</span>
							</button>
						</div>
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
		$('button.accordion_new').click(function(event) {
			if ($(this).siblings('.panel_new').css('display')=='block') {
				$(this).siblings('.panel_new').slideUp();
				$(this).children('i').prop('class', 'fa fa-chevron-circle-down');
			}else{
				$(this).siblings('.panel_new').slideDown();
				$(this).children('i').prop('class', 'fa fa-chevron-circle-up');
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
