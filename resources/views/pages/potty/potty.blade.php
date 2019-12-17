@extends('master-layout')
@section('title')
	Potty
@endsection

@section('content')
	<body onload="time()">
	<section class="page-top container">
		<div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
			<div class="row">
				<ul class="ul-td">
					<li _ngcontent-c16="" class="level1"><a _ngcontent-c16="" href="index.html">Home</a></li>
					<li _ngcontent-c16="" class="active1" style="pointer-events:none"><a _ngcontent-c16="">POTTY</a></li>
				</ul>
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
					<div id="clock"></div>	
					<div class="update">
						<p>Select Health Update Type*</p>
						<div class="tab">
							<button class="tablinks" onclick="openCity(event, 'Sick')">Sick</button>
							<button class="tablinks" onclick="openCity(event, 'Medicine')">Medicine</button>
						</div>
						<div id="Sick" class="tabcontent">
							<div class="panel_new">
								<div _ngcontent-c20="" class="row">
									<!---->
									<div _ngcontent-c20="" align="center" class="col-xs-6 col-sm-4 col-md-3 col-lg-2 ng-star-inserted" style="padding:10px;cursor:pointer;">
										<button _ngcontent-c20="" class="btn progBtn limitText bgClass tablinks1" style="background-color:transparent;border:1px solid #5363d6;border-radius: 4px;">Biscuits </button>
									</div>
									<div _ngcontent-c20="" align="center" class="col-xs-6 col-sm-4 col-md-3 col-lg-2 ng-star-inserted" style="padding:10px;cursor:pointer">
										<button _ngcontent-c20="" class="btn progBtn limitText bgClass tablinks1" style="background-color:transparent;border:1px solid #5363d6;border-radius: 4px">Bread </button>
									</div>
								</div>
							</div>
						</div>
						<div id="Medicine" class="tabcontent">
							<div class="panel_new">
								<div _ngcontent-c20="" class="row">
									<!---->
									<div _ngcontent-c20="" align="center" class="col-xs-6 col-sm-4 col-md-3 col-lg-2 ng-star-inserted" style="padding:10px;cursor:pointer;">
										<button _ngcontent-c20="" class="btn progBtn limitText bgClass tablinks1" style="background-color:transparent;border:1px solid #5363d6;border-radius: 4px;">Hello!</button>
									</div>
									<div _ngcontent-c20="" align="center" class="col-xs-6 col-sm-4 col-md-3 col-lg-2 ng-star-inserted" style="padding:10px;cursor:pointer">
										<button _ngcontent-c20="" class="btn progBtn limitText bgClass tablinks1" style="background-color:transparent;border:1px solid #5363d6;border-radius: 4px">Hello!!</button>
									</div>
								</div>
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
				</div>
				<div class="comment">
				<div class="button" style="text-align: center;">
					<button class="button2">
						<span>SEND</span>
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
		function time() {
		   var today = new Date();
		   var weekday=new Array(7);
		   weekday[0]="Sunday";
		   weekday[1]="Monday";
		   weekday[2]="Tuesday";
		   weekday[3]="Wednesday";
		   weekday[4]="Thursday";
		   weekday[5]="Friday";
		   weekday[6]="Saturday";
		   var day = weekday[today.getDay()];
		   var dd = today.getDate();
		   var mm = today.getMonth()+1; //January is 0!
		   var yyyy = today.getFullYear();
		   var h=today.getHours();
		   var m=today.getMinutes();
		   var s=today.getSeconds();
		   m=checkTime(m);
		   s=checkTime(s);
		   nowTime = h+":"+m+":"+s;
		   if(dd<10){dd='0'+dd} if(mm<10){mm='0'+mm} today = day+', '+ dd+'/'+mm+'/'+yyyy;

		   tmp='<span class="date">'+today+' | '+nowTime+'</span>';

		   document.getElementById("clock").innerHTML=tmp;

		   clocktime=setTimeout("time()","1000","JavaScript");
		   function checkTime(i)
		   {
		      if(i<10){
		     i="0" + i;
		      }
		      return i;
		   }
		}
	</script>
	<!-- click menu duoi -->
	<script>
		function openCity(evt, cityName) {
		  var i, tabcontent, tablinks;
		  tabcontent = document.getElementsByClassName("tabcontent");
		  for (i = 0; i < tabcontent.length; i++) {
		    tabcontent[i].style.display = "none";
		  }
		  tablinks = document.getElementsByClassName("tablinks");
		  for (i = 0; i < tablinks.length; i++) {
		    tablinks[i].className = tablinks[i].className.replace(" active", "");
		  }
		  document.getElementById(cityName).style.display = "block";
		  evt.currentTarget.className += " active";
		}
		// Get the element with id="defaultOpen" and click on it
		// document.getElementById("defaultOpen").click();
	</script>
	<script type="text/javascript">
    	$('.tablinks').click(function(event) {
    		$('.tablinks').removeClass('tablinks_active');
    		$(this).addClass('tablinks_active');
    	});
    </script>

    <!-- input file -->
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
    	$('.tablinks1').click(function(event) {
    		if ($(this).prop('class')=='btn progBtn limitText bgClass tablinks1 tablinks1_active') {
    			$(this).removeClass('tablinks1_active');
    		}else{
    			$(this).addClass('tablinks1_active');
    		}
    	});
    </script>
@endsection
