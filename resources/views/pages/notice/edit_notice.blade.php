@extends('master-layout')
@section('title')
	EDIT NOTICE
@endsection

@section('content')
	<body>
	<section class="page-top container">
		<div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
			<div class="row">
				<div class="col-lg-10 col-md-10 col-sm-10">
					<ul class="ul-td">
						<li _ngcontent-c16="" class="level1"><a _ngcontent-c16="">HOME</a></li>
						<li _ngcontent-c16="" class="active1" style="pointer-events:none"><a _ngcontent-c16="">NOTICE BOARD</a></li>
						<li _ngcontent-c16="" class="active1 active-1" style="pointer-events:none;"><a _ngcontent-c16="">EDIT NOTICE</a></li>
					</ul>
				</div>
				<div class="col-lg-2 col-md-2 col-sm-2" data-toggle="modal" data-target=".bd-example-modal-sm">
					<button class="notice">
						<span>DELETE</span>
					</button>
				</div>
			</div>
		</div>
		
		<div class="mat-card">
			<div class="mat-content">
				<button class="accordion">Programs</button>
				<div class="panel">
					<div _ngcontent-c20="" class="row">
						<!---->
						<div _ngcontent-c20="" align="center" class="col-xs-6 col-sm-4 col-md-3 col-lg-2 ng-star-inserted" style="padding:10px;cursor:pointer;">
							<button _ngcontent-c20="" class="btn progBtn limitText bgClass tablinks1" style="background-color:transparent;border:1px solid #5363d6;border-radius: 4px">Attendance </button>
						</div>
						<div _ngcontent-c20="" align="center" class="col-xs-6 col-sm-4 col-md-3 col-lg-2 ng-star-inserted" style="padding:10px;cursor:pointer">
							<button _ngcontent-c20="" class="btn progBtn limitText bgClass tablinks1" style="background-color:transparent;border:1px solid #5363d6;border-radius: 4px">Behaviour </button>
						</div>
					</div>
				</div>
				<div class="add">
					<div class="input_box" style="width: 100%;">
						<span>Title of Notice *</span>
						<input type="text" name="address" placeholder="Title of Notice *">
					</div>
					
				</div>
				<br>
				<div class="row">
					<div class="col-md-6">
						<div class="row">
							<div class="col-xs-9 col-md-9">
								<p>Mark as Important</p>
							</div>
							<div class="col-xs-3 col-md-3">
								<label class="label-checkbox">
									<input type="checkbox" checked="checked">
									<span class="checkmark"></span>
								</label>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-xs-9 col-md-9">
								<p>Archive</p>
							</div>
							<div class="col-xs-3 col-md-3">
								<label class="label-checkbox">
									<input type="checkbox" checked="checked" >
									<span class="checkmark"></span>
								</label>
							</div>
						</div>
					</div>
				</div>
				<div class="comment">
					<div class="row">
						<div class="col-md-11 input_box">
							<span>Enter Details here *</span>
							<input type="text" name="detail" placeholder="Enter Details here *">
						</div>
						<div class="col-md-1">
							<div class="zoom">
								<a _ngcontent-c9="" class="zoom-fab zoom-btn-large fa fa-paperclip" id="zoomBtn" style="font-size: 30px;cursor: pointer"></a>
							</div>
						</div>
					</div>
					<div class="button" style="text-align: center;">
						<button>
							<span>CANCEL</span>
						</button>
						<button class="button2" id="btn">
							<span>SAVE</span>
						</button>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-sm" style="">
			    <div class="modal-content" style="font-size: 18px;">
					<h3>Aler</h3>
					<hr style="clear:both;margin-top:0px;margin-bottom:0px">
					<div align="center">
						<p style="margin: 0;font-size: 18px;">This Notice data would be deleted permanently</p>
					</div>
					<hr style="clear:both;margin-top:0px;margin-bottom:0px">
					<div class="row" style="margin: 0;">
						<div class="col-xs-6 col-md-6 mat-dialog-actions " style="border-right: 1px solid lightgrey;">
							<button class="mat-button-class" style="color: #5363d6;border-left: 1px solid transparent;">
								<span class="mat-button-wrapper">OK</span>
							</button>
						</div>
						<div class="col-xs-6 col-md-6 mat-dialog-actions">
							<button class="mat-button-class" style="color: red;">
								<span class="mat-button-wrapper">CANCEL</span>
							</button>
						</div>
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
    	$('.tablinks1').click(function(event) {
    		if ($(this).prop('class')=='btn progBtn limitText bgClass tablinks1 tablinks1_active') {
    			$(this).removeClass('tablinks1_active');
    		}else{
    			$(this).addClass('tablinks1_active');
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
