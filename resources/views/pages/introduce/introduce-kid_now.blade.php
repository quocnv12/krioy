<html>
	<head>
		<meta charset="utf-8">
		<title>Kids Now Introduce</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="stylesheet" href="asset/kriyo/css/index.css">

		<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
   		<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    	<link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    	<link rel="icon" href="images/logo.png"/>

    	<link rel="stylesheet" href="asset/kriyo/css/bootstrap.min.css">
    	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    
	    <!-- Font Awesome -->
	    <link rel="stylesheet" href="asset/kriyo/css/font-awesome.min.css">
	    
	    <!-- Custom CSS -->
	    <link rel="stylesheet" href="libs/slick-1.8.1/slick/slick.css">
    	<link rel="stylesheet" href="libs/slick-1.8.1/slick/slick-theme.css">
	</head>
<body>
	<section class="introduce">
		<div class="introduce-1">
			<nav class="navbar" style="z-index: 1">
				<div class="container-fluid">
				    <div class="navbar-header">
				    	<a class="navbar-brand" href="#" style="display: flex;">
				    		<img src="images/logo-ngang.png" style="border-radius: 0;width: auto;margin: -7px 0;" alt="">
				    	</a>
				    	<div class="topnav" id="myTopnav">
						    <a href="#">HOME</a>
						    <a href="#">KIDS NOW APP</a>
						    <a href="#">PRICING</a>
						    <a href="#">ABOUT US</a>
						    <a href="login">LOGIN</a>
						    <a href="javascript:void(0);"  class="icon" onclick="myFunction()" id="icon-close">
							    <i class="fa fa-bars" style="display: inline-block;"></i>
							    <i class="fa fa-times-circle" aria-hidden="true" style="display: none"></i>
							</a>
						</div>
				    </div>
				</div>
			</nav>
			
			<div class="textMsg" align="center">
				<div class="textMsg-children">
					<span style="opacity: 1;position: relative;z-index: 2;cursor: pointer;">
						@if (session('thongbao'))
							<div  style="width:300px" class="alert alert-success" role="alert">
								<strong>{{ session('thongbao') }}</strong>
							</div>
						@endif
						@if (session('thongbao1'))
							<div  class="alert alert-danger" role="alert">
								<strong>{{ session('thongbao1') }}</strong>
							</div>
						@endif
						<h2>One Stop Destination for Preschool &amp; Daycare Management</h2>
						<p data-toggle="modal" data-target=".bd-example-modal-sm">
							<img src="images/Playbutton.png" alt="">
						</p>
					</span>
					<div class="introduce-button" align="center">
						<button class="btt-1">
							<a style="color:white" href="login">	<span>SIGNUP</span></a>
						</button>
						<button class="btt-2" data-toggle="modal" data-target=".bd-example-modal-sm1">
							<SPAN>GET A FREE TRIAL</SPAN>
						</button>
					</div>
					<span class="slider">
						<a href="#">
							<img src="images/iosIcon.svg" alt="">
						</a>
						<a href="#">
							<img src="images/androidIcon.png" alt="">
						</a>
					</span>
				</div>
			</div>
		</div>
	</section>
	<section class="introduce-school">
		<div class="container">
			<div class="schoolTiltle">
				<h2>KIDS NOW APP</h2>
				<div class="hr"></div>	
			</div>
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6 featured-item">
					<img src="images/One Touch Updates.png" alt="">
					<h3>One Click Updates</h3>
					<p>Send updates in One-Click for multiple children at the same time</p>
				</div>
				<div class="col-md-3"></div>
			</div>
			<div class="row">
				<div class="col-sm-6 col-md-6 featured-item">
					<img src="images/Admissions management.png" alt="">
					<h3>Admissions Management</h3>
					<p>Manage all the Admissions right from Enquiries to Exits</p>
				</div>
				<div class="col-sm-6 col-md-6 featured-item">
					<img src="images/Bustracking.png" alt="">
					<h3>Bus Tracking </h3>
					<p>School bus/van tracking with customized view for School, Parents and Driver</p>
				</div>				
			</div>
			<div class="row">
				<div class="col-sm-4 col-md-4 featured-item">
					<img src="images/Billing and Payment.png" alt="">
					<h3>Fee Management</h3>
					<p>Billing, Payments and Receipts digitised and in one place!</p>
					<img src="images/Report-01.png" alt="">
					<h3>Analytical Reports</h3>
					<p>Get useful insights about your school through easy to read reports</p>
				</div>
				<div class="col-sm-4 col-md-4">
					<img class="features-block__image" src="images/kidsnow.png" alt="">
				</div>
				<div class="col-sm-4 col-md-4 featured-item">
					<img src="images/Diary.png" alt="">
					<h3>Diary</h3>
					<p>In one go, you can write the Diary for all the selected students</p>
					<img src="images/Staff-01.png" alt="">
					<h3>Customised Staff Permissions </h3>
					<p>Give access to a Program or a Feature whenever needed</p>
				</div>				
			</div>
			<div class="row">
				<div class="col-sm-6 col-md-6 featured-item">
					<img src="images/Announcement.png" alt="">
					<h3>Communication Channel</h3>
					<p>Messages from all the parents are sorted class wise for you to reply</p>
				</div>
				<div class="col-sm-6 col-md-6 featured-item">
					<img src="images/Notice Board.png" alt="">
					<h3>Digital Notice Board</h3>
					<p>Digital version of your Notice Board - parents can view it anytime,anywhere</p>
				</div>				
			</div>
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6 featured-item">
					<img src="images/School Icon.png" alt="">
					<h3>Multi-Branch Management</h3>
					<p>Manage all your branches from anywhere and you can switch between them in the same app</p>
				</div>
				<div class="col-md-3"></div>
			</div>
			<div align="center">
				<a class="image-block__cta" style="color: #FF4081;"> Download for 
					<strong>FREE</strong>
				</a>
				<span style="text-align: center;width: 320px;margin: 10px 5px;" class="slider">
					<a href="#">
						<img src="images/iosIcon.svg" alt="">
					</a>
					<a href="#">
						<img src="images/androidIcon.png" alt="">
					</a>
				</span>
			</div>
		</div>
	</section>
	<section class="introduce-parent">
		<div class="container">
			<div class="schoolTiltle">
				<h2>KIDS NOW PARENT APP</h2>
				<div class="hr"></div>	
			</div>
			<div class="row">
				<div class="col-sm-6 col-md-6 featured-item">
					<img src="images/Check in and Check out-01.png" alt="">
					<h3>Attendance</h3>
					<p>Parents can be assured of the Child's presence at the School</p>
				</div>
				<div class="col-sm-6 col-md-6 featured-item">
					<img src="images/Multiple Children-01.png" alt="">
					<h3>Multiple Children Management</h3>
					<p>Parents can view the updates of all their children in the same app</p>
				</div>				
			</div>
			<div class="row">
				<div class="col-sm-4 col-md-4 featured-item">
					<img src="images/Instant Updates.png" alt="">
					<h3>Instant Updates</h3>
					<p>Parents will receive live notifications on their mobile for all the updates from school!</p>
					<img src="images/Photots-01.png" alt="">
					<h3>Photos/Videos</h3>
					<p>Cherish and Share lovely moments of children at the School</p>
				</div>
				<div class="col-sm-4 col-md-4">
					<img class="features-block__image" src="images/parentscreen.png" alt="">
				</div>
				<div class="col-sm-4 col-md-4 featured-item">
					<img src="images/Food-01.png" alt="">
					<h3>Food</h3>
					<p>Keep an eye on how well the child is eating while at the School</p>
					<img src="images/Health-01.png" alt="">
					<h3>Health Updates</h3>
					<p>Updates on sickness, medication and growth of the child</p>
				</div>				
			</div>
			<div class="row">
				<div class="col-sm-6 col-md-6 featured-item">
					<img src="images/Play and Learn-01.png" alt="">
					<h3>Learning & Development</h3>
					<p>Track Child's learning progress and make timely interventions</p>
				</div>
				<div class="col-sm-6 col-md-6 featured-item">
					<img src="images/Staff-01.png" alt="">
					<h3>Communicate with Teachers</h3>
					<p>No need to switch to another app to communicate with Teachers</p>
				</div>				
			</div>
		</div>
	</section>
	<section class="introduce-customers">
		<div class="container">
			<div class="schoolTiltle" style="padding: 20px 0;">
				<h2>Our Customers Speak</h2>
				<div class="hr"></div>	
			</div>
			<div class="row introduce-customers-1 ">
				<div class="col-md-4">
					<div class="mixedSlider">
		                <div class="MS-content">
		                    <div class="item-customer">
		                    	<p><i class="fa fa-thumbs-up" style="font-size: 35px;"></i> I am very happy with Kids Now app, as I am able to manage multiple branches from the same app efficiently. I can have a look at all the branches' activities, fee collections, enquiries etc anytime in my mobile, thanks to Kids Now.</p>
		                    </div>
		                    <div class="item-1">
		                    	<p class="item-a">Nguyen Van Khanh</p>
		                    	<p class="item-b">Owner, Kiddy Garden International Preschool</p>
		                    </div>
		                </div>                 
		            </div>
		        </div>
		        <div class="col-md-4">
					<div class="mixedSlider">
		                <div class="MS-content">
		                    <div class="item-customer">
		                    	<p><i class="fa fa-thumbs-up" style="font-size: 35px;"></i> I am very happy with Kids Now app, as I am able to manage multiple branches from the same app efficiently. I can have a look at all the branches' activities, fee collections, enquiries etc anytime in my mobile, thanks to Kids Now.</p>
		                    </div>
		                    <div class="item-1">
		                    	<p class="item-a">Nguyen Thu Ha</p>
		                    	<p class="item-b">Owner, Kiddy Garden International Preschool</p>
		                    </div>
		                </div>                 
		            </div>
		        </div>
		        <div class="col-md-4">
					<div class="mixedSlider">
		                <div class="MS-content">
		                    <div class="item-customer">
		                    	<p><i class="fa fa-thumbs-up" style="font-size: 35px;"></i> I am very happy with Kids Now app, as I am able to manage multiple branches from the same app efficiently. I can have a look at all the branches' activities, fee collections, enquiries etc anytime in my mobile, thanks to Kids Now.</p>
		                    </div>
		                    <div class="item-1">
		                    	<p class="item-a">Nguyen Khanh Linh</p>
		                    	<p class="item-b">Owner, Kiddy Garden International Preschool</p>
		                    </div>
		                </div>                 
		            </div>
		        </div>
		        <div class="col-md-4">
					<div class="mixedSlider">
		                <div class="MS-content">
		                    <div class="item-customer">
		                    	<p><i class="fa fa-thumbs-up" style="font-size: 35px;"></i> I am very happy with Kids Now app, as I am able to manage multiple branches from the same app efficiently. I can have a look at all the branches' activities, fee collections, enquiries etc anytime in my mobile, thanks to Kids Now.</p>
		                    </div>
		                    <div class="item-1">
		                    	<p class="item-a">Tran Trong Hieu</p>
		                    	<p class="item-b">Owner, Kiddy Garden International Preschool</p>
		                    </div>
		                </div>                 
		            </div>
		        </div>
	        </div>
		</div>
	</section>
	<section class="introduce-packages">
		<div class="container">
			<div class="schoolTiltle" style="">
				<h2>Packages & Pricing</h2>
				<div class="hr"></div>	
			</div>
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10 introduce-packages-content">
					<div class="row">
						<div class="col-xs-12 col-md-4 col-lg-4">
							<div class="packages-priceFree">
								<div class="priceFree">
									<div class="priceImg" style="">Free
										<br>
										<span>$0</span>
									</div>
									<ul style="">
										<li class="featuresList">Children Attendance</li>
										<li class="featuresList">Digital Diary</li>
										<li class="featuresList">Daily Report</li>
										<li class="featuresList">Programs</li>
										<li class="featuresList">Children Profiles</li>
										<li class="featuresList">Staff Profiles</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-4 col-lg-4 ">
							<div class="packages-priceLite">
								<div class="priceLite">
									<div class="priceImg" style=""> LITE
										<br>
										<strike style="color: black">$10</strike>
										<br>
										<span>$5</span>
									</div>
									<div class="freeFeature">
										<p class="freeFeature-p" style="background-color: #A290C4;">FREE Features</p>
										<p class="freeFeature-i">
											<i class="fa fa-plus"></i>
										</p>
									</div>
									<ul style="">
										<li class="featuresList">Photos</li>
										<li class="featuresList">Notice Board</li>
										<li class="featuresList">Calendar</li>
										<li class="featuresList">Parent Communication</li>
										<li class="featuresList">School Profile</li>
										<li class="featuresList">Multi-branch Management</li>
										<li class="featuresList">Parent Access Status</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-4 col-lg-4 ">
							<div class="packages-pricePro">
								<div class="pricePro">
									<div class="priceImg" style=""> PRO
										<br>
										<strike style="color: black">$10</strike>
										<br>
										<span>$5</span>
									</div>
									<div class="freeFeature">
										<p class="freeFeature-p" style="background-color: #E78AB9;">FREE Features</p>
										<p class="freeFeature-i">
											<i class="fa fa-plus"></i>
										</p>
									</div>
									<ul style="">
										<li class="featuresList">Enquiry Management</li>
										<li class="featuresList">Fee Management</li>
										<li class="featuresList">Analytical Reports</li>
										<li class="featuresList">Custom Staff Permissions</li>
										<li class="featuresList">Staff Attendance</li>
										<li class="featuresList">Daycare Needs</li>
										<li class="featuresList">Health & Observations</li>
										<li class="featuresList">Play & Learn</li>
										<li class="featuresList">Custom Settings</li>
										<li class="featuresList">School History</li>
										<li class="featuresList">QR Check-In</li>
										<li class="featuresList">Videos</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-1"></div>
			</div>
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10">
					<p style="font-size: 14px;margin: 10px 0;">* Price is per Child per Year</p>
				</div>
			</div>
		</div>
	</section>
	<section class="happy-customers">
		<div class="schoolTiltle" style="">
			<h2>Our Happy Customers</h2>
			<div class="hr"></div>	
		</div>
		<div class="container">
			<div class="row"> 
				<div class="col-xs-6 col-sm-3 col-md-3 banner-img">
					<img src="images/sun.png" alt="">
				</div>
				<div class="col-xs-6 col-sm-3 col-md-3">
					<img src="images/vasch.png" alt="">
				</div>
				<div class="col-xs-6 col-sm-3 col-md-3">
					<img src="images/baby.png" alt="">
				</div>
				<div class="col-xs-6 col-sm-3 col-md-3">
					<img src="images/montess.png" alt="">
				</div>
			</div>
			<div class="row">
				<div class="col-xs-6 col-sm-3 col-md-3">
					<img src="images/vin.jpg" alt="">
				</div>
				<div class="col-xs-6 col-sm-3 col-md-3">
					<img src="images/kinder.png" alt="">
				</div>
				<div class="col-xs-6 col-sm-3 col-md-3">
					<img src="images/academy.jpg" alt="">
				</div>
				<div class="col-xs-6 col-sm-3 col-md-3">
					<img src="images/kinder-garden.png" alt="">
				</div>
			</div>
			<div class="row">
				<div class="col-xs-6 col-sm-3 col-md-3">
					<img src="images/gateway.png" alt="">
				</div>
				<div class="col-xs-6 col-sm-3 col-md-3">
					<img src="images/lion.jpg" alt="">
				</div>
				<div class="col-xs-6 col-sm-3 col-md-3">
					<img src="images/happy.png" alt="">
				</div>
				<div class="col-xs-6 col-sm-3 col-md-3">
					<img src="images/hoa.png" alt="">
				</div>
			</div>
			<div class="row">
				<div class="col-xs-6 col-sm-4 col-md-4">
					<img src="images/kangaroo.png" alt="">
				</div>
				<div class="col-xs-6 col-sm-4 col-md-4">
					<img src="images/orkid-petals.jpg" alt="">
				</div>
				<div class="col-sm-4 col-md-4">
					<img src="images/jain-toddlers.png" alt="">
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4 col-md-4"></div>
				<div class="col-xs-6 col-sm-4 col-md-4">
					<img src="images/Pumpkin's.png" alt="">
				</div>
				<div class="col-xs-6 col-sm-4  col-md-4">
					<p>And many more...</p>
				</div>
			</div>
		</div>
	</section>
	<section class="container">
		<div class="about-as">
			<div class="schoolTiltle">
				<h2>About Us</h2>
				<div class="hr"></div>	
			</div>
			<p>Kids Now ipsum dolor sit amet, consectetur adipisicing elit. Delectus possimus aut eaque adipisci, accusamus illum exercitationem labore sequi tenetur vitae, est ipsum. Cupiditate quas laboriosam, autem cumque sint quia cum odit eligendi dolore, consequatur nobis rem ipsa dolorem non, eum eius earum quo voluptate repellendus vitae maxime. Beatae natus atque praesentium soluta ut voluptate, cupiditate ipsum tempora iste distinctio, sit corrupti inventore ea suscipit, odit modi illo omnis animi quae.</p>
		</div>
	</section>
	<section class="container">
		<div class="our-team" style="margin: 20px 0;">
			<div class="schoolTiltle">
				<h2>Our Team</h2>
				<div class="hr"></div>	
			</div>
			<div class="row our-team">
				<div class="col-sm-4 col-md-4">
					<img src="images/hai.png" alt="">
					<p>Mr. Vũ Minh Hải</p>
					<span style="color: cornflowerblue;font-size: 15px;">CEO</span>
					<span style="font-size: 14px;color: #5363d6;">Talent Wins</span>
				</div>
				<div class="col-sm-4 col-md-4">
					<img src="images/hiep.png" alt="">
					<p>Mr. Lê Anh Xuân</p>
					<span style="color: cornflowerblue;font-size: 15px;">Co founder</span>
					<span style="font-size: 14px;color: #5363d6;">Ts. Khoa Học Máy Tính</span>
				</div>
				<div class="col-sm-4 col-md-4">
					<img src="images/xuan.png" alt="">
					<p>Mr. Nguyễn Quang Hiệp</p>
					<span style="color: cornflowerblue;font-size: 15px;">Co founder</span>
					<span style="font-size: 14px;color: #5363d6;">Ths. Khoa Học Máy Tính</span>
				</div>
			</div>
		</div>
	</section>
	
	<section class="container">
		<div class="get-in-touch" style="margin: 20px 0;">
			<div class="schoolTiltle">
				<h2>Get in Touch</h2>
				<div class="hr"></div>	
			</div>
			<div style="text-align: center;">
				<img src="images/email.png" alt="" width="40px">
				<span style="margin-left:10px;"> hello@kidsnow.com</span>
			</div>
		</div>
	</section>

	<footer class="site-footer">
		<div class="container">
			<div class="row icon-lienket">
			 	<a href="https://www.facebook.com/Web88Pro/">
			 		<img src="images/facebook-circle-white.png" alt="" title="Facebook">
			 	</a>
			 	<a href="https://www.instagram.com/accounts/login/?hl=vi">
			 		<img src="images/linkedin-circle-white.png" title="Instagram">
			 	</a>
			 	<a href="https://mail.google.com/mail/u/0/#inbox">
			 		<img src="images/mail-circle-white.png" alt="" title="Email">
			 	</a>
			</div>
			<div class="row">
				<p> 2019 © 
					<b>Kids Now</b>, a product of <b><a href="http://www.web88.vn/">Web88</a></b>
				</p>
				<p>
					<a href="https://lssplprod.s3.amazonaws.com/Help/Kriyo-schoolApp-Privacy-Policies.html" class="termsHover"> Privacy Policy</a>
					<span>&</span>
					<a href="https://lssplprod.s3.amazonaws.com/Help/Kriyo-schoolApp-Privacy-Policies.html" class="termsHover"> Terms and Conditions</a>
				</p>
			</div>
		</div>
	</footer>

	<div class="modal fade bd-example-modal-sm modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm" style="width: 560px;">
		   <iframe width="560" height="315" src="https://www.youtube.com/embed/SrEPQMRfzoc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</div>			
	</div>
	<div class="modal fade bd-example-modal-sm1 modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm">
		   <div class="modal-header" style="background-color:#FF4081;color:#fff;border-radius: 5px 5px 0px 0px;text-align: center;">
		   		<h2 style="text-transform: none;font-size:18px">I am a</h2>
		   </div>
		   <div class="modal-body">
		   		<button style="color: #ff4081;">
		   			<a href="account"><span>School Owner/Admin</span></a>
		   		</button>
		   		<button style="color: #ff4081">
		   			<span>School Owner/Admin</span>
		   		</button>
		   		<button style="color: #ff4081">
		   			<span>School Owner/Admin</span>
		   		</button>
		   </div>
		</div>			
	</div>
</body>
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
	<script src="libs/slick-1.8.1/slick/slick.js"></script>
	<script type="text/javascript">
		$('.introduce-customers-1').slick({
			infinite: true,
			slidesToShow: 3,
			slidesToScroll: 1,
			arrows: true,
			autoplay: false,
			autoplaySpeed: 2000,
			responsive: [{
					breakpoint: 1200,
					settings: {
					slidesToShow: 3,
					slidesToScroll: 1
					}
				},
			{
				breakpoint: 991,
				settings: {
				slidesToShow: 2,
				slidesToScroll: 1,
				autoplay: true,
				arrows:false,
				}
			},
			{
				breakpoint: 500,
				settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				autoplay: true,
				arrows:false,
				}
			}]
		});
	</script>
	<script>
		function myFunction() {
			var x = document.getElementById("myTopnav");
			var close_menu=document.getElementById('icon-close');
			if (x.className === "topnav") {
				x.className += " responsive";
				close_menu.children[0].style.display="none";
				close_menu.children[1].style.display="inline-block";

			} else {
			    x.className = "topnav";
			    close_menu.children[1].style.display="none";
				close_menu.children[0].style.display="inline-block";
			}
		}
	</script>
