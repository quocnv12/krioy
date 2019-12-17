@extends('master-layout')
@section('title')
Food
@endsection
@section('content')

<body onload="time()">
	
	<section class="page-top container">
		<div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
			<div class="row">
				<ul class="ul-td">
					<li _ngcontent-c16="" class="level1"><a _ngcontent-c16="">Home</a></li>
					<li _ngcontent-c16="" class="active1" style="pointer-events:none"><a _ngcontent-c16="">Food</a></li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="mat-card">
				<div class="mat-content">
					<button class="accordion accordion1 clearfix">
						<p style="float: left;">Children *</p>
						<a href="Select-Child.html" style="float: right;text-align: right">
							<p style="color: #fff;border: 1px solid #ff4081;padding: 5px;margin: 5px 0;background: #ff4081;border-radius: 5px;text-decoration: none;">SELECT</p>
						</a>
					</button>
					<div class="panel">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					</div>
					<hr>	
					<div class="update">
						<p>Select Meal Type*</p>
						<div class="tab">
							<button class="tablinks">Breakfast</button>
							<button class="tablinks">Lunch</button>
							<button class="tablinks">Liquids</button>
							<button class="tablinks">Snacks</button>
							<button class="tablinks">Dinner</button>
						</div>
					</div>
					<div id="clock" style="margin: 20px 0;font-size: 18px;"></div>
					<hr>
					<div class="update">
						<p>Select Quantity</p>
						<div class="tab">
							<button class="tablinks2">All</button>
							<button class="tablinks2">Most</button>
							<button class="tablinks2">Some</button>
							<button class="tablinks2">None</button>
						</div>
					</div>
					<hr>
					<button class="accordion_new">Meal Item Name *
						<i class="fa fa-chevron-circle-down"></i>
					</button>
					<div class="panel_new">
						<div _ngcontent-c20="" class="row">
							<!---->
							<div _ngcontent-c20="" align="center" class="col-xs-6 col-sm-4 col-md-3 col-lg-2 ng-star-inserted" style="padding:10px;cursor:pointer;">
								<button _ngcontent-c20="" class="btn progBtn limitText bgClass tablinks1" style="background-color:transparent;border:1px solid #5363d6;border-radius: 4px;">Biscuits </button>
							</div>
							<div _ngcontent-c20="" align="center" class="col-xs-6 col-sm-4 col-md-3 col-lg-2 ng-star-inserted" style="padding:10px;cursor:pointer">
								<button _ngcontent-c20="" class="btn progBtn limitText bgClass tablinks1" style="background-color:transparent;border:1px solid #5363d6;border-radius: 4px">Bread </button>
							</div>
							<div _ngcontent-c20="" align="center" class="col-xs-6 col-sm-4 col-md-3 col-lg-2 ng-star-inserted" style="padding:10px;cursor:pointer">
								<button _ngcontent-c20="" class="btn progBtn limitText bgClass tablinks1" style="background-color:transparent;border:1px solid #5363d6;border-radius: 4px">Curd </button>
							</div>
							<div _ngcontent-c20="" align="center" class="col-xs-6 col-sm-4 col-md-3 col-lg-2 ng-star-inserted" style="padding:10px;cursor:pointer"><button _ngcontent-c20="" class="btn progBtn limitText bgClass tablinks1" style="background-color:transparent;border:1px solid #5363d6;border-radius: 4px">Daal </button>
							</div>
							<div _ngcontent-c20="" align="center" class="col-xs-6 col-sm-4 col-md-3 col-lg-2 ng-star-inserted" style="padding:10px;cursor:pointer"><button _ngcontent-c20="" class="btn progBtn limitText bgClass tablinks1" style="background-color:transparent;border:1px solid #5363d6;border-radius: 4px">Dosa </button>
							</div>
							
							<div _ngcontent-c20="" align="center" class="col-xs-6 col-sm-4 col-md-3 col-lg-2 ng-star-inserted" style="padding:10px;cursor:pointer"><button _ngcontent-c20="" class="btn progBtn limitText bgClass tablinks1" style="background-color:transparent;border:1px solid #5363d6;border-radius: 4px">Fruits </button>
							</div>
							<div _ngcontent-c20="" align="center" class="col-xs-6 col-sm-4 col-md-3 col-lg-2 ng-star-inserted" style="padding:10px;cursor:pointer">
								<button _ngcontent-c20="" class="btn progBtn limitText bgClass tablinks1" style="background-color:transparent;border:1px solid #5363d6;border-radius: 4px">Idly </button>
							</div>
							<div _ngcontent-c20="" align="center" class="col-xs-6 col-sm-4 col-md-3 col-lg-2 ng-star-inserted" style="padding:10px;cursor:pointer">
								<button _ngcontent-c20="" class="btn progBtn limitText bgClass tablinks1" style="background-color:transparent;border:1px solid #5363d6;border-radius: 4px">Juice </button>
							</div>
							<div _ngcontent-c20="" align="center" class="col-xs-6 col-sm-4 col-md-3 col-lg-2 ng-star-inserted" style="padding:10px;cursor:pointer">
								<button _ngcontent-c20="" class="btn progBtn limitText bgClass tablinks1" style="background-color:transparent;border:1px solid #5363d6;border-radius: 4px">Milk </button>
							</div>
							<div _ngcontent-c20="" align="center" class="col-xs-6 col-sm-4 col-md-3 col-lg-2 ng-star-inserted" style="padding:10px;cursor:pointer">
								<button _ngcontent-c20="" class="btn progBtn limitText bgClass tablinks1" style="background-color:transparent;border:1px solid #5363d6;border-radius: 4px">Rice </button>
							</div>
							<div _ngcontent-c20="" align="center" class="col-xs-6 col-sm-4 col-md-3 col-lg-2 ng-star-inserted" style="padding:10px;cursor:pointer">
								<button _ngcontent-c20="" class="btn progBtn limitText bgClass tablinks1" style="background-color:transparent;border:1px solid #5363d6;border-radius: 4px">Roti </button>
							</div>
							<div _ngcontent-c20="" align="center" class="col-xs-6 col-sm-4 col-md-3 col-lg-2 ng-star-inserted" style="padding:10px;cursor:pointer">
								<button _ngcontent-c20="" class="btn progBtn limitText bgClass tablinks1" style="background-color:transparent;border:1px solid #5363d6;border-radius: 4px">Water </button>
							</div>
						</div>
					</div>
					<div class="comment">
						<div class="row">
							<div class="col-md-9 input_box">
								<span>Enter details here *</span>
								<input type="text" name="text" placeholder="Enter details here *">
							</div>
							<div class="col-md-3">
								<div class="input-file-container">  
									<input class="input-file" type='file' onchange="readURL(this);" id="input-Incident" />
									<label tabindex="0" for="my-file" class="input-file-trigger">
										<i class="fa fa-paperclip"></i>
									</label>
									<div class="input-img">
										<img class="blah" src="images/150.png" alt="your  image" />
										<div class="top-right button-close button_close_show_img">
											<button style="border-radius:50%;width:26px;height:26px;z-index:1;">
												<i class="fa fa-times-circle"></i>
											</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="button" style="text-align: center;">
							<button>
								<span>CANCEL</span>
							</button>
							<button class="button2">
								<span>SEND</span>
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
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="js/jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="js/main.js"></script>
    <script type="text/javascript">
    	$('.tablinks').click(function(event) {
    		$('.tablinks').removeClass('tablinks_active');
    		$(this).addClass('tablinks_active');
    	});
    </script>
    <script type="text/javascript">
    	$('.tablinks2').click(function(event) {
    		$('.tablinks2').removeClass('tablinks_active');
    		$(this).addClass('tablinks_active');
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

	<!-- tab img -->
	<script type="text/javascript">
    	// click hiện img
    	function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    var id_input = input.id;
                    $('#'+id_input).siblings('.input-img').show();
                    $('#'+id_input).siblings('.input-img').children('.blah').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        // button close
        $('.button_close_show_img').click(function(event) {
        	$(this).parent('.input-img').hide();
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