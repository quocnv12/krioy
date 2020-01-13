@extends('master-layout')
@section('title')
	Notice Board
@endsection

@section('content')
	<body>
		<section class="page-top container">
		<div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
			<div class="row">
				<div class="col-md-6">
					<ul class="ul-td">
						<li class="level1"><a href="kids-now">HOME</a></li>
						<li class="active1" style="pointer-events:none"><a href="">NOTICE BOARD</a></li>
					</ul>
				</div>
				<div class="col-md-4" style="float: right">
					<form class="typeahead" role="search" style="text-align: left">
						<input type="search" name="q" class="form-control search-input" placeholder="Search Notice..." autocomplete="off" style="line-height: 1.6;font-size: 18px;border: 2px solid #ccc; padding: 0 5px; width: 500px;">
					</form>
				</div>
			</div>
		</div>
			@if(session('notify'))
				<div class="alert alert-success">
					{{session('notify')}}
				</div>
			@endif
	</section>
	<section _ngcontent-c10="" style="background-color:#f9f9f9">
		<div _ngcontent-c10="" class="row" style="padding: 10px">
			<div _ngcontent-c10="" align="right" class="col-md-2 scrollClassLeft">
				<div _ngcontent-c10="" class="scroll-arrow-left" id="prev_nav" style="padding-right: 20px;color:#5363d6;cursor:pointer">
					<i _ngcontent-c10="" aria-hidden="true" class="fa fa-angle-left" style="font-size:40px"></i>
				</div>
			</div>
			<div _ngcontent-c10="" class="col-md-8" style="padding-left:0px;padding-right:0px">
				<div _ngcontent-c10="" class="scrollmenu" id="nav">
					<ul _ngcontent-c10="">
						<!---->
						@foreach($programs as $program)
							<li _ngcontent-c10="">
								<a _ngcontent-c10="" class="item active" href="kids-now/notice-board/{{$program->id}}">{{$program->program_name}}</a>
							</li>
						@endforeach
					</ul>
				</div>
			</div>
			<div _ngcontent-c10="" align="left" class="col-md-2 scrollClassRight">
				<div _ngcontent-c10="" class="scroll-arrow-right" id="next_nav" style="padding-left: 20px;color:#5363d6;cursor:pointer">
					<i _ngcontent-c10="" aria-hidden="true" class="fa fa-angle-right" style="font-size:40px"></i>
				</div>
			</div>
		</div>
	</section>
	<section class="container">
		<div class="mat-card" style="min-height: 500px;">
			<div class="mat-content">
			@if(isset($notice_board))
				@foreach($notice_board as $notice)
					<div class="mat-card" style="margin: 0;">
					<div class="row">
						<div class="notice" data-href="kids-now/notice-board/detail/{{$notice->id}}" style="width: 100%;">
							<div class=" col-md-10">
								<span style="display: block; font-size: 18px; padding-left: 0;"><!---->
									@if($notice->important == 1)<i aria-hidden="true" class="fa fa-star ng-star-inserted" style="color:#FAC917;padding-right:5px; "></i>@endif{{$notice->title}}
								</span>
								<br>
								<span  style="color: grey; font-size: 16px; padding-left: 24px;"><!---->{{Str::limit($notice->content,200)}}
								</span>
							</div>
							<div class=" col-md-2">
								<div align="center" style="color:#5363d6;font-size: 16px;">
									<span >{{date('d-m-Y',strtotime($notice->created_at))}}</span>
									<br>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			@endif
			</div>
		</div>
		<div class="icon-plus" title="add">
			<a href="kids-now/notice-board/add">
				<i class="fa fa-plus"></i>
			</a>
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
					url: 'http://kidsnow.web88.vn/kids-now/notice-board/search/name?q=%QUERY%',
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
					name: 'notice-board',
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
							return '<a href="/kids-now/notice-board/detail/' + data.id + '" class="list-group-item" style="width: 500px;"> ' + data.title +  '</a>';
						}
					}
				},
			]);
		});
	</script>
@endsection
