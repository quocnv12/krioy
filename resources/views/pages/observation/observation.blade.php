@extends('master-layout')
@section('title')
	Observations
@endsection

@section('content')
	<body>
		
		<section class="page-top container">
			<div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
				<div class="row">
					<div class="col-sm-6">
					<ul class="ul-td">
						<li _ngcontent-c16="" class="level1"><a _ngcontent-c16="">Home</a></li>
						<li _ngcontent-c16="" class="active1" style="pointer-events:none"><a _ngcontent-c16="">OBSERVATIONS</a></li>
					</ul>
					</div>
					<div class="col-sm-6">
						<a  href="{{route('admin.observations.list')}}" class="btn btn-success" style="float: right">Quản lí danh sách</a>
					</div>
				</div>
			</div>
			<div class="row">
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
					<hr>
					<div class="mat-content">
						<button class="accordion">Observation Type</button>
						<div class="panel">
							<div _ngcontent-c20="" class="row" style="">
								@foreach($observationtype  as $ob)
								<div _ngcontent-c20="" align="center" class="col-lg-2 col-md-2 col-sm-2 col-xs-4 ng-star-inserted" style="padding:10px;cursor:pointer;">
									<button _ngcontent-c20="" class="btn progBtn limitText bgClass tablinks1" style="background-color:transparent;border:1px solid #5363d6;border-radius: 4px" value="{{$ob->id}}">{{$ob->name}} </button>
								</div>

								@endforeach
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
	<script language="javascript">
        var button = document.getElementById("btn");
        button.onclick = function(){
            alert("Thông tin đã lưu thành công!!!");
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
