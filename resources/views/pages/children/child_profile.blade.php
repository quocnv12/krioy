@extends('master-layout')
@section('title')
	Children Frofiles
@endsection

@section('content')
	<body>

	<section class="page-top container">
		<div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
			<div class="row">
				<div class="col-md-6">
					<ul class="ul-td">
						<li class="level1"><a href="kids-now">HOME</a></li>
						<li class="active1" ><a href="kids-now/children">CHILDREN PROFILES</a></li>
					</ul>
				</div>
				<div class="col-md-6">
					{{--<a href="#" class="deactiveClass">--}}
						{{--<i class="fa fa-shield"></i>--}}
						{{--<span style="font-size:15px;font-weight: 900;">DEACTIVATED</span>--}}
						{{--<span _ngcontent-c10="" class="badge" style="background-color: red;color:#fff;vertical-align: top;display: inline;line-height:0px">1</span>--}}
					{{--</a>--}}
					<form class="typeahead" role="search" style="float: right;">
						<input type="search" name="q" class="form-control search-input" placeholder="Search Children..." autocomplete="off" style="line-height: 1.6;font-size: 18px;border: 2px solid #ccc; padding: 0 5px; width: 100%;">
					</form>
				</div>
			</div>
		</div>
	</section>
	@if(session('notify'))
		<div class="alert alert-success font-weight-bold">
			{{session('notify')}}
		</div>

	@endif
	<section style="background-color:#f9f9f9">
		<div class="row" style="padding: 10px">
			<div class="col-lg-2 col-md-2 col-sm-12"></div>
			<div class="col-lg-8 col-md-8 col-sm-12" style="padding-left:0px;padding-right:0px">
				<div class="child-profile-ul">
					<div _ngcontent-c10="" class="scrollmenu" id="nav">
						<ul _ngcontent-c10="" class="scrollmenu-ul">
							<!---->
							@foreach($programs as $program)
								<li _ngcontent-c10="">
									<a _ngcontent-c10="" class="item active" href="kids-now/children/{{$program->id}}">{{$program->program_name}}</a>
								</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-12"></div>
		</div>
	</section>

	<section class="container">
		<div class="mat-card" style="min-height: 250px;">
			<div class="mat-content">
				<div _ngcontent-c19="" class="row ng-star-inserted" id="result">
					<!---->
					@if(isset($children_profiles))
						@foreach($children_profiles as $children)
							<div class="div_box_children col-lg-2 col-md-2 col-sm-2 col-xs-6 ng-star-inserted" style="padding:10px;cursor:pointer;">
								<div type="button" data-toggle="modal" data-target=".bd-example-modal-sm" style="height: 120px;text-align: center;-webkit-appearance: none;">
									<img class="img-circle" height="80" onerror="this.src='images/Child.png';" width="80" src="assets/ls-icons/Child.png">
									<!---->
									<span class="limitText ng-star-inserted" style="color:#5363d6;;margin: 0px;display: block;" >{{$children->first_name}} {{$children->last_name}}</span>
									<!---->
									<input type="hidden" value="{{$children->id}}" class="link_to_children">
								</div>
							</div>
						@endforeach
					@endif
				</div>
			</div>
		</div>
		<div class="icon-plus" title="add">
			<a href="kids-now/children/add">
				<i class="fa fa-plus"></i>
			</a>
		</div>
		<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<ul style="margin-left: 0;">
						<li style="color: #5363d6!important">Go to</li>
						<li class="modal-li" data-href="" id="profile_children">Profile</li>
						<li class="modal-li" data-href="" id="invoices_children">Invoices</li>
						<li class="modal-li" data-href="" id="attachments_children">Attachments</li>

						<li class="modal-li" data-href="" id="authoriesd_pickups_children">Authoriesd Pickups</li>

						<li class="modal-li" data-href="" id="authorised_pickups_children">Authoriesd Pickups</li>

					</ul>
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
	<script type="text/javascript"></script>

    
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
    	$(document).ready(function($) {

			$('div.div_box_children').click(function () {
				var id_children = $(this).children('div').children('input').val();
				$('li#profile_children').attr('data-href','/kids-now/children/edit/'+id_children);
				$('li#invoices_children').attr('data-href','/kids-now/children/edit/'+id_children);
				$('li#attachments_children').attr('data-href','/kids-now/children/edit/'+id_children);
				$('li#authoriesd_pickups_children').attr('data-href','/kids-now/children/edit/'+id_children);
			});

			$(".modal-li").click(function() {
				window.document.location = $(this).data("href");
			});


		    $(".modal-li").click(function() {
		        window.document.location = $(this).data("href");

		    });

		});
	</script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function($) {
			var engine1 = new Bloodhound({
				remote: {
					url: 'http://localhost:8000/kids-now/children/search/name?q=%QUERY%',
					wildcard: '%QUERY%'
				},
				datumTokenizer: Bloodhound.tokenizers.whitespace('q'),
				queryTokenizer: Bloodhound.tokenizers.whitespace
			});


			$(".search-input").typeahead({
				hint: true,
				highlight: true,
				minLength: 1
			}, [
				{
					source: engine1.ttAdapter(),
					name: 'children_profiles',
					display: function(data) {
						return data.name;
					},
					templates: {
						empty: [
							'<div class="list-group search-results-dropdown" style="width: 500px;"><div class="list-group-item">Nothing found.</div></div>'
						],
						header: [

						],
						suggestion: function (data) {
							return '<a href="/kids-now/children/edit/' + data.id + '" class="list-group-item" style="width: 500px;"> ' + data.first_name +' '+ data.last_name +  '</a>';
						}
					}
				},
			]);
		});
	</script>
	<script type="text/javascript">
		$('ul').slick({
			infinite: true,
			slidesToShow: 6,
			slidesToScroll: 1,
			arrows: true,
			autoplay: true,
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
@endsection
