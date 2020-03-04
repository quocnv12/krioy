@extends('master-layout')
@section('title')
	Notice Board
@endsection

@section('content')
	<style>
		.tt-input{
			background-color: white !important;
		}
		input.search-custom:focus{
			animation: mymove 0.8s forwards;
			background-color: white;
		}

		@keyframes mymove {
			0% {width: 300px;}
			100% {width: 400px;}
		}
		.scrollmenu-div button a{
			color: #fff;
		}
	</style>
	<body>
		<section class="page-top container">
		<div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
			<div class="row">
				<div class="col-md-6">
					<ul class="ul-td">
						<li class="level1"><a href="{{route('admin.home')}}">@lang('kidsnow.home')</a></li>
						<li class="active1" style="pointer-events:none"><a href="">@lang('kidsnow.notice_board')</a></li>
					</ul>
				</div>
				<div class="col-md-6" style="display: flex; justify-content: flex-end">
					<form class="typeahead" role="search" style="text-align: left">
						<input type="search" name="q" class="form-control search-input search-custom" placeholder="@lang('kidsnow.notice.search')" autocomplete="off" style="line-height: 1.6;font-size: 18px;border: 2px solid #ccc; padding: 0 5px; width: 300px;">
					</form>
				</div>
			</div>
		</div>
	</section>
	<section style="background-color:#f9f9f9">
		<div class="container">
			<div class="scrollmenu-div">
				@foreach($programs as $program)
				<div class="scrollmenu-button" style="text-align: center;">
					<!---->
					<button type="submit" style="background: #5363d6;padding: 5px;border: none;border-radius: 5px;margin: 5px;min-width: 120px;text-align: center;">
						<a style="color: #fff;margin: 0;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;width: 150px;display: block;" title="{{$program->program_name}}" href="{{route('admin.notice-board.show',['id'=>$program->id])}}">{{$program->program_name}}</a>
					</button>
				</div>
				@endforeach
			</div>
		</div>
	</section>
	<section class="container">
		<div class="mat-card" style="min-height: 500px;">
			<div class="mat-content">
			@if(isset($notice_board))
				@if(count($notice_board) > 0)
					@foreach($notice_board as $notice)
					<div class="mat-card" style="margin: 0;">
						<div class="row">
							<div class="notice" data-href="{{route('admin.notice-board.detail',['id'=>$notice->id])}}" style="width: 100%;">
								<div class=" col-md-10">
									<span style="display: block; font-size: 18px; padding-left: 0;"><!---->
										@if($notice->important == 1)<i aria-hidden="true" class="fa fa-star ng-star-inserted" style="color:#FAC917;padding-right:5px; "></i>@endif{{$notice->title}}
									</span>
									<br>
									<span  style="color: grey; font-size: 16px; padding-left: 24px;">{!! Str::limit($notice->content,200) !!}
									</span>
								</div>
								<div class=" col-md-2">
									<div style="color:#5363d6;font-size: 16px;">
										<span >{{date('d-m-Y',strtotime($notice->created_at))}}</span>
										<br>
									</div>
								</div>
							</div>
						</div>
					</div>
							<br>
					@endforeach
				@else
						<div style="font-size: 25px; margin: 10px;">@lang('kidsnow.notice.not_found')</div>
				@endif
            @else
				<div style="margin: 50px">
					<p style="color: red; font-weight: bold">@lang('kidsnow.notice.hint') :</p>
					<p>@lang('kidsnow.notice.hint_content')</p>
				</div>
			@endif
			</div>
		</div>
		<div class="icon-plus" title="add">
			<a href="{{route('admin.notice-board.create')}}">
				<i class="fa fa-plus"></i>
			</a>
		</div>
	</section>	
	</body>
@endsection

@section('js')
	<script src="https://code.jquery.com/jquery.min.js"></script>
	<script src="libs/slick-1.8.1/slick/slick.js"></script>
    
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
		    $(".notice").click(function() {
		        window.document.location = $(this).data("href");
		    });
		});
    </script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function($) {
			var engine1 = new Bloodhound({
				remote: {
					url: 'kids-now/notice-board/search/name?q=%QUERY%',
					wildcard: '%QUERY%'
				},
				datumTokenizer: Bloodhound.tokenizers.whitespace('q'),
				queryTokenizer: Bloodhound.tokenizers.whitespace
			});


			$(".search-input").typeahead({
				hint: true,
				highlight: false,
				minLength: 1
			}, [
				{
					source: engine1.ttAdapter(),
					name: 'notice-board',
					display: function(data) {
						return data.name;
					},
					templates: {
						empty: [
							'<div class="list-group search-results-dropdown" style="width: 400px;"><div class="list-group-item">Nothing found.</div></div>'
						],
						header: [

						],
						suggestion: function (data) {
							return '<a href="kids-now/notice-board/detail/' + data.id + '" class="list-group-item" style="width: 400px;color: inherit"> ' + data.title +  '</a>';
						}
					}
				},
			]);
		});
	</script>
	<script type="text/javascript">
		$('.scrollmenu-div').slick({
			infinite: true,
			slidesToShow: 6,
			slidesToScroll: 1,
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
				slidesToShow: 3,
				slidesToScroll: 1,
				autoplay: true,
				arrows:false,
				}
			},
			{
				breakpoint: 500,
				settings: {
				slidesToShow: 2,
				slidesToScroll: 1,
				autoplay: true,
				arrows:false,
				}
			}]
		});
	</script>
@endsection
