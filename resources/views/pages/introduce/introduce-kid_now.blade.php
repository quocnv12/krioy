
<html lang="{{app()->getLocale()}}">
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
		<style>
			html{
				scroll-behavior: smooth;
			}

			.back-to-top {
				width: 45px;
				height: 45px;
				background: #FF4081;
				position: fixed;
				cursor: pointer;
				color: white;
				bottom: 10%;
				border-radius: 50%;
				right: 20px;
				transition: 2s;
				z-index: 9999;
			}
			.back-to-top i {
				font-size: 30px;
				left: 13px;
				top: 5px;
				position: absolute;
			}
		</style>
	</head>
<body>
<a name="top"></a>
<a href="#top" class="back-to-top" id=bttop><i class="fa fa-angle-up"></i></a>
	<section class="introduce">
		<div class="introduce-1">
			<nav class="navbar" style="z-index: 1">
				<div class="container-fluid">
				    <div class="navbar-header">
				    	<a class="navbar-brand " href="#" style="display: flex;">
				    		<img src="images/logo-ngang.png" style="border-radius: 0;width: auto;margin: -7px 0;" alt="">

				    	</a>
				    	<div class="topnav" id="myTopnav">
							<a href="" style="" onclick="return false;">
								<div class="dropdown-logo1" >
									@if(app()->getLocale() == 'vi')
										<button class="dropbtn-logo1">
											<button class="dropbtn-logo1"><img src="images/viet.png" style="width: 50px;height: 30px; border-radius: 0px"></button>
										</button>
									@else
										<button class="dropbtn-logo1">
											<button class="dropbtn-logo1"><img src="images/england.png" style="width: 50px;height: 30px; border-radius: 0px"></button>
										</button>
									@endif
									<div class="dropdown-content-logo1" >
										<a href="locale/vi"><img src="images/viet.png"> @lang('kidsnow.vietnamese')</a>
										<a href="locale/en"><img src="images/england.png"> @lang('kidsnow.english')</a>
									</div>
								</div>
							</a>

						    <a href="#section1">{{__('kidsnow.home')}}</a>
						    <a href="#section2"> @lang('kidsnow.kids_now_app')</a>
						    <a href="#section3">@lang('kidsnow.pricing')</a>
							<a href="#section4">@lang('kidsnow.about_us_top')</a>
							@if(Auth::check())
								<a href="login" style="background-color: #ddd;">@lang('kidsnow.my_kids_now')</a>
							@else
								<a href="login">@lang('kidsnow.login')</a>
							@endif
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

						<h2>@lang('kidsnow.banner')</h2>
						<p data-toggle="modal" data-target=".bd-example-modal-sm">
							<img src="images/Playbutton.png" alt="">
						</p>
					</span>
					<div class="introduce-button" align="center">
						<button class="btt-1">
							<a style="color:white" href="account">	<span>@lang('kidsnow.sign_up')</span></a>
						</button>
						<button class="btt-2" data-toggle="modal" data-target=".bd-example-modal-sm1">
							<SPAN>@lang('kidsnow.get_a_free_trial')</SPAN>
						</button>
					</div>
					<span class="slider">
						<a href="#">
							<img src="images/iosIcon.svg" alt="">
						</a>
						<a href="#">
							<img src="images/androidIcon.png" alt="" >
						</a>
					</span>
				</div>
			</div>
		</div>
	</section>
	<section class="introduce-school" id="section2">
		<div class="container">
			<div class="schoolTiltle">
				<h2>@lang('kidsnow.kids_now_app')</h2>
				<div class="hr"></div>
			</div>
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6 featured-item">
					<img src="images/One Touch Updates.png" alt="">
					<h3>@lang('kidsnow.one_click_updates')</h3>
					<p>@lang('kidsnow.one_click_updates_content')</p>
				</div>
				<div class="col-md-3"></div>
			</div>
			<div class="row">
				<div class="col-sm-6 col-md-6 featured-item">
					<img src="images/Admissions management.png" alt="">
					<h3>@lang('kidsnow.admissions_management')</h3>
					<p>@lang('kidsnow.admissions_management_content')</p>
				</div>
				<div class="col-sm-6 col-md-6 featured-item">
					<img src="images/Bustracking.png" alt="">
					<h3>@lang('kidsnow.bus_tracking')</h3>
					<p>@lang('kidsnow.bus_tracking_content')</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4 col-md-4 featured-item">
					<img src="images/Billing and Payment.png" alt="">
					<h3>@lang('kidsnow.fee_management')</h3>
					<p>@lang('kidsnow.fee_management_content')</p>
					<img src="images/Report-01.png" alt="">
					<h3>@lang('kidsnow.analytical_reports')</h3>
					<p>@lang('kidsnow.analytical_reports_content')</p>
				</div>
				<div class="col-sm-4 col-md-4" style="display: flex; justify-content: center">
					<img class="features-block@langimage" src="images/kidsnow.png" alt="" style="height: 500px">
				</div>
				<div class="col-sm-4 col-md-4 featured-item">
					<img src="images/Diary.png" alt="">
					<h3>@lang('kidsnow.diary_introduce')</h3>
					<p>@lang('kidsnow.diary_introduce_content')</p>
					<img src="images/Staff-01.png" alt="">
					<h3>@lang('kidsnow.customised_staff_permissions') </h3>
					<p>@lang('kidsnow.customised_staff_permissions_content')</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 col-md-6 featured-item">
					<img src="images/Announcement.png" alt="">
					<h3>@lang('kidsnow.communication_channel')</h3>
					<p>@lang('kidsnow.communication_channel_content')</p>
				</div>
				<div class="col-sm-6 col-md-6 featured-item">
					<img src="images/Notice Board.png" alt="">
					<h3>@lang('kidsnow.digital_notice_board')</h3>
					<p>@lang('kidsnow.digital_notice_board_content')</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6 featured-item">
					<img src="images/School Icon.png" alt="">
					<h3>@lang('kidsnow.multi_branch_management')</h3>
					<p>@lang('kidsnow.multi_branch_management_content')</p>
				</div>
				<div class="col-md-3"></div>
			</div>
			<div align="center">
				<a class="image-block@langcta" style="color: #FF4081; display: block; font-size: 20px">
					<strong>@lang('kidsnow.download_for_free')</strong>
				</a>
				<span style="text-align: center;width: 320px;margin: 10px 5px;" class="slider">
					<a href="#">
						<img src="images/iosIcon.svg" alt="">
					</a>
					<a href="#">
						<img src="images/androidIcon.png" alt="" style="margin-left: 15px">
					</a>
				</span>
			</div>
		</div>
	</section>
	<section class="introduce-parent">
		<div class="container">
			<div class="schoolTiltle">
				<h2>@lang('kidsnow.kid_now_parent_app')</h2>
				<div class="hr"></div>
			</div>
			<div class="row">
				<div class="col-sm-6 col-md-6 featured-item">
					<img src="images/Check in and Check out-01.png" alt="">
					<h3>@lang('kidsnow.attendance')</h3>
					<p>@lang('kidsnow.attendance_content')</p>
				</div>
				<div class="col-sm-6 col-md-6 featured-item">
					<img src="images/Multiple Children-01.png" alt="">
					<h3>@lang('kidsnow.multiple_children_management')</h3>
					<p>@lang('kidsnow.multiple_children_management_content')</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4 col-md-4 featured-item">
					<img src="images/Instant Updates.png" alt="">
					<h3>@lang('kidsnow.instant_updates')</h3>
					<p>@lang('kidsnow.instant_updates_content')</p>
					<img src="images/Photots-01.png" alt="">
					<h3>@lang('kidsnow.photos_videos')</h3>
					<p>@lang('kidsnow.photos_videos_content')</p>
				</div>
				<div class="col-sm-4 col-md-4" style="display: flex; justify-content: center">
					<img class="features-block@langimage" src="images/parentscreen.png" alt="">
				</div>
				<div class="col-sm-4 col-md-4 featured-item">
					<img src="images/Food-01.png" alt="">
					<h3>@lang('kidsnow.food')</h3>
					<p>@lang('kidsnow.food_content')</p>
					<img src="images/Health-01.png" alt="">
					<h3>@lang('kidsnow.health_updates')</h3>
					<p>@lang('kidsnow.health_updates_content')</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 col-md-6 featured-item">
					<img src="images/Play and Learn-01.png" alt="">
					<h3>@lang('kidsnow.learning_development')</h3>
					<p>@lang('kidsnow.learning_development_content')</p>
				</div>
				<div class="col-sm-6 col-md-6 featured-item">
					<img src="images/Staff-01.png" alt="">
					<h3>@lang('kidsnow.communicate_with_teachers')</h3>
					<p>@lang('kidsnow.communicate_with_teachers_content')</p>
				</div>
			</div>
		</div>
	</section>
	<section class="introduce-customers">
		<div class="container">
			<div class="schoolTiltle" style="padding: 20px 0;">
				<h2 style="font-size: 27px !important;">@lang('kidsnow.our_customers_speak')</h2>
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
		                    	<p class="item-a">Thomas Nguyen</p>
		                    	<p class="item-b">Owner, Kiddy Garden International Preschool</p>
		                    </div>
		                </div>
		            </div>
		        </div>
		        <div class="col-md-4">
					<div class="mixedSlider">
		                <div class="MS-content">
		                    <div class="item-customer">
		                    	<p><i class="fa fa-thumbs-up" style="font-size: 35px;"></i> KIDS NOW là 1 ứng dụng rất tuyệt vời. Nó giúp tôi quản lý các bé một cách toàn diện, làm tôi cảm thấy an tâm hơn khi gửi bé ở trường. Hơn nữa từng thông tin của bé được cập nhật nhanh chóng và chính xác. Tôi cảm thấy rất hài lòng.</p>
		                    </div>
		                    <div class="item-1">
		                    	<p class="item-a">Nguyễn Thu Hà</p>
		                    	<p class="item-b">Phụ Huynh</p>
		                    </div>
		                </div>
		            </div>
		        </div>
		        <div class="col-md-4">
					<div class="mixedSlider">
		                <div class="MS-content">
		                    <div class="item-customer">
		                    	<p><i class="fa fa-thumbs-up" style="font-size: 35px;"></i>Phải công nhận một điều rằng KIDS NOW giờ đây đã trở thành 1 người bạn đáng tin cậy của mình. Từ khi có KIDS NOW mình cảm thấy việc quan sát và nắm bắt tình hình của bé trở nên rất dễ dàng. Cảm ơn KIDS NOW rất nhiều.</p>
		                    </div>
		                    <div class="item-1">
		                    	<p class="item-a">Nguyễn Khánh Linh</p>
		                    	<p class="item-b">Phụ Huynh</p>
		                    </div>
		                </div>
		            </div>
		        </div>
		        <div class="col-md-4">
					<div class="mixedSlider">
		                <div class="MS-content">
		                    <div class="item-customer">
		                    	<p><i class="fa fa-thumbs-up" style="font-size: 35px;"></i>KIDS NOW đã hỗ trợ tôi rất nhiều trong việc quản lý các con, chăm lo cho các con trong từng bữa ăn giấc ngủ. Không những thế việc trao đổi với phụ huynh cũng rất nhanh chóng thông qua ứng dụng này.</p>
		                    </div>
		                    <div class="item-1">
		                    	<p class="item-a">Trần Trọng Hiếu</p>
		                    	<p class="item-b">Giáo Viên</p>
		                    </div>
		                </div>
		            </div>
		        </div>
	        </div>
		</div>
	</section>
	<section class="introduce-packages" id="section3">
		<div class="container">
			<div class="schoolTiltle" style="">
				<h2>@lang('kidsnow.packages_pricing')</h2>
				<div class="hr"></div>
			</div>
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10 introduce-packages-content">
					<div class="row">
						<div class="col-xs-12 col-md-4 col-lg-4">
							<div class="packages-priceFree">
								<div class="priceFree">
									<div class="priceImg" style="">@lang('kidsnow.free')
										<br>
										<span>$0</span>
									</div>
									<ul style="">
										<li class="featuresList">@lang('kidsnow.free_content_first')</li>
										<li class="featuresList">@lang('kidsnow.free_content_second')</li>
										<li class="featuresList">@lang('kidsnow.free_content_third')</li>
										<li class="featuresList">@lang('kidsnow.free_content_fourth')</li>
										<li class="featuresList">@lang('kidsnow.free_content_fifth')</li>
										<li class="featuresList">@lang('kidsnow.free_content_sixth')</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-4 col-lg-4 ">
							<div class="packages-priceLite">
								<div class="priceLite">
									<div class="priceImg" style=""> @lang('kidsnow.lite')
										<br>
										<strike style="color: black">$10</strike>
										<br>
										<span>$5</span>
									</div>
									<div class="freeFeature">
										<p class="freeFeature-p" style="background-color: #A290C4;">@lang('kidsnow.free_features')</p>
										<p class="freeFeature-i">
											<i class="fa fa-plus"></i>
										</p>
									</div>
									<ul style="">
										<li class="featuresList">@lang('kidsnow.lite_content_first')</li>
										<li class="featuresList">@lang('kidsnow.lite_content_second')</li>
										<li class="featuresList">@lang('kidsnow.lite_content_third')</li>
										<li class="featuresList">@lang('kidsnow.lite_content_fourth')</li>
										<li class="featuresList">@lang('kidsnow.lite_content_fifth')</li>
										<li class="featuresList">@lang('kidsnow.lite_content_sixth')</li>
										<li class="featuresList">@lang('kidsnow.lite_content_seventh')</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-4 col-lg-4 ">
							<div class="packages-pricePro">
								<div class="pricePro">
									<div class="priceImg" style=""> @lang('kidsnow.pro')
										<br>
										<strike style="color: black">$25</strike>
										<br>
										<span>$10</span>
									</div>
									<div class="freeFeature">
										<p class="freeFeature-p" style="background-color: #E78AB9;">@lang('kidsnow.lite_features')</p>
										<p class="freeFeature-i">
											<i class="fa fa-plus"></i>
										</p>
									</div>
									<ul style="">
										<li class="featuresList">@lang('kidsnow.pro_content_first')</li>
										<li class="featuresList">@lang('kidsnow.pro_content_second')</li>
										<li class="featuresList">@lang('kidsnow.pro_content_third')</li>
										<li class="featuresList">@lang('kidsnow.pro_content_fourth')</li>
										<li class="featuresList">@lang('kidsnow.pro_content_fifth')</li>
										<li class="featuresList">@lang('kidsnow.pro_content_sixth')</li>
										<li class="featuresList">@lang('kidsnow.pro_content_seventh')</li>
										<li class="featuresList">@lang('kidsnow.pro_content_eighth')</li>
										<li class="featuresList">@lang('kidsnow.pro_content_ninth')</li>
										<li class="featuresList">@lang('kidsnow.pro_content_tenth')</li>
										<li class="featuresList">@lang('kidsnow.pro_content_eleventh')</li>
										<li class="featuresList">@lang('kidsnow.pro_content_twelfth')</li>
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
					<p style="font-size: 14px;margin: 10px 0;">* @lang('kidsnow.price_is_per_child')</p>
				</div>
			</div>
		</div>
	</section>
	<section class="happy-customers">
		<div class="schoolTiltle" style="">
			<h2>@lang('kidsnow.our_happy_customers')</h2>
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
					<p>@lang('kidsnow.and_many_more')</p>
				</div>
			</div>
		</div>
	</section>
	<section class="container" id="section4">
		<div class="about-as">
			<div class="schoolTiltle">
				<h2>@lang('kidsnow.about_us')</h2>
				<div class="hr"></div>
			</div>
			<p style="margin: 30px">@lang('kidsnow.about_us_content')</p>
		</div>
	</section>
	<section class="container">
		<div class="our-team" style="margin: 20px 0;">
			<div class="schoolTiltle">
				<h2>@lang('kidsnow.our_team')</h2>
				<div class="hr"></div>
			</div>
			<div class="row our-team">
				<div class="col-sm-4 col-md-4" style="margin: 20px 0;">
					<img src="images/hai.png" alt="">
					<p>Mr. Vũ Minh Hải</p>
					<span style="color: cornflowerblue;font-size: 15px;">CEO</span>
					<span style="font-size: 14px;color: #5363d6;">Talent Wins</span>
				</div>
				<div class="col-sm-4 col-md-4"  style="margin: 20px 0;">
					<img src="images/hiep.png" alt="">
					<p>Mr. Lê Anh Xuân</p>
					<span style="color: cornflowerblue;font-size: 15px;">Co founder</span>
					<span style="font-size: 14px;color: #5363d6;">Ts. Khoa Học Máy Tính</span>
				</div>
				<div class="col-sm-4 col-md-4"  style="margin: 20px 0;">
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
				<h2>@lang('kidsnow.get_in_touch')</h2>
				<div class="hr"></div>
			</div>
			<div style="text-align: center;">
				<img src="images/email.png" alt="" width="40px">
				<span style="margin-left:10px;"> hello@kidsnow.edu.com</span>
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
					<b>Kids Now</b>, @lang('kidsnow.a_product_of') <b><a href="http://www.web88.vn/">Web88</a></b>
				</p>
				<p>
					<a href="https://lssplprod.s3.amazonaws.com/Help/Kriyo-schoolApp-Privacy-Policies.html" class="termsHover"> @lang('kidsnow.privacy')</a>
					<span>&</span>
					<a href="https://lssplprod.s3.amazonaws.com/Help/Kriyo-schoolApp-Privacy-Policies.html" class="termsHover"> @lang('kidsnow.terms_and_conditions')</a>
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
			autoplaySpeed: 10000,
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
	<script type="text/javascript">
		var backtotop = document.getElementById('bttop');
		var win=$(window)

		win.scroll(function(){
			if(win.scrollTop()> 100){
				bttop.style.display = "block";
				bttop.style.transition = "2s";
			}
			else{
				bttop.style.display = "none";
			}
		});
	</script>
	<NOSCRIPT>
		<p style="color: red; text-align: center; font-size: 18px">@lang('kidsnow.noscript')</p>
	</NOSCRIPT>
