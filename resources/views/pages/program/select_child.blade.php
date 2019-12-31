@extends('master-layout')
@section('title')
	Add Program
@endsection

@section('content')
	<style>
		.chosen{
			background-color: red;
		}
	</style>
	<body>
	<section class="page-top container">
		<div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
			<div class="row">
				<div class="col-md-10">
					<ul class="ul-td">
						<li _ngcontent-c16="" class="level1"><a _ngcontent-c16="" href="index.html">HOME</a></li>
						<li _ngcontent-c16="" class="active1" style="pointer-events:none"><a _ngcontent-c16="">PROGRAM</a></li>
						<li _ngcontent-c16="" class="active1 active-1" style="pointer-events:none;"><a _ngcontent-c16="">EDIT PROGRAM</a></li>
						<li _ngcontent-c16="" class="active1" style="pointer-events:none;"><a _ngcontent-c16="">SELECT CHILDREN</a></li>
					</ul>
				</div>
			</div>
		</div>
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
								<a _ngcontent-c10="" class="item active" href="kids-now/program/select_child/{{$program->id}}">{{$program->program_name}}</a>
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
		<div class="row">
			<div class="select-all">
				<div class="col-md-3 col-sm-3 all-1">
					<a href="" class="all-2">
						<b>Select All</b>
					</a>
				</div>
				<div class="col-md-3 col-sm-3"></div>
				<div class="col-md-2"></div>
				<div align="right" class="col-md-3" style="margin: 15px;">
					<a href="edit-program.html" class="done">
						<b>DONE</b>
					</a>
				</div>
				<div class="col-md-1"></div>
			</div>
		</div>
	</section>
	<section class="container">
		<div class="mat-card" style="min-height: 300px;">
			<div class="mat-content">

				<div _ngcontent-c19="" class="row ng-star-inserted">
					<!---->
					@if(isset($children_profiles))
						@foreach($children_profiles as $children)
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 ng-star-inserted select-child-img">
							<div class="child-class" style="height: 120px;text-align: center;">
								<div class="image" id="test">
									<img class="img-circle" height="80" onerror="this.src='images/Child.png';" width="80" src="Child.png">
									<i aria-hidden="true" class="fa fa-check checked" style="display: none;"></i>
									<!---->
									<span class="limitText ng-star-inserted">{{$children->first_name}} {{$children->last_name}}</span>
								</div>
								<input type="hidden" value="{{$children->id}}">
							</div>
						</div>
						@endforeach
					@endif
				</div>
			</div>
			{{$children_profiles->appends(request()->url())->links()}}
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
    	$('.all-1').click(function(event) {
    		$('.all-1').removeClass('all-1-click');
    		$(this).addClass('all-1-click');
    	});
    </script>
    <script type="text/javascript">

		var array = [];

		if (! localStorage.getItem('test')) {
			localStorage.setItem('test', JSON.stringify(array))
		}


		$('.child-class').click(function () {
			if ($(this).prop('class') == 'child-class chosen'){
				var array2 = JSON.parse(localStorage.getItem('test'))
				$(this).removeClass('chosen');
				var children_pop = $(this).children('input').val()
				array2.splice( array2.indexOf(children_pop), 1 );
				localStorage.setItem('test', JSON.stringify(array2))
			}
			else{

				var array3 = JSON.parse(localStorage.getItem('test'))
				$(this).addClass('chosen');
				var children_push = $(this).children('input').val()
				array3.push(children_push);
				localStorage.setItem('test', JSON.stringify(array3))
			}

		})
	</script>
@endsection
