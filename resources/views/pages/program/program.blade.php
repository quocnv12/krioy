@extends('master-layout')
@section('title')
	Programs
@endsection

@section('content')
	<body style="background-color: #fff !important;">
	<section class="page-top container">
		<div class="tieu-de add" style="margin-top: 10px;margin-bottom: 10px;">
			<div class="row">
				<div class="col-md-6">
					<ul class="ul-td">
						<li class="level1"><a href="kids-now">HOME</a></li>
						<li class="active1" style="pointer-events:none"><a href="">PROGRAM</a></li>
					</ul>
				</div>
				<div class="col-md-6">
					<form class="typeahead" role="search" style="text-align: left">
						<input type="search" name="q" class="form-control search-input" placeholder="Search Program..." autocomplete="off" style="line-height: 1.6;font-size: 18px;border: 2px solid #ccc; padding: 0 5px; width: 500px;">
					</form>
				</div>
			</div>
		</div>
	</section>
	<section class="container">
		<div class="program">
			<div class="program-label" align="center">
				<p>Programs</p>
			</div>
			<div class="program-content">
				<div class="row">
					@foreach($programs as $program)
						<div class="col-md-6 col-sm-6">
							<div class="row program-content-1" data-href="kids-now/program/view/{{$program->id}}">
								<div class="col-md-9 col-sm-9">
									<b style="color: #9999e6;"><a href="kids-now/program/view/{{$program->id}}">{{$program->program_name}}</a></b>
								</div>
								<div class="col-md-3 col-sm-3" style="padding-left: 0px;text-align: right;">{{$program->total_children}}</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
			<div style="display: flex; justify-content: center; align-items: center; margin-top: 50px;">
				{{$programs->links()}}
			</div>
		</div>
	</section>
	<div class="icon-plus" title="add">
			<a href="kids-now/program/add">
				<i class="fa fa-plus"></i>
			</a>
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
     <script type="text/javascript">
    	$(document).ready(function($) {
		    $(".program-content-1").click(function() {
		        window.document.location = $(this).data("href");
		    });
		});
    </script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function($) {
			var engine1 = new Bloodhound({
				remote: {
					url: 'kids-now/program/search/program?q=%QUERY%',
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
					name: 'programs',
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
							return '<a href="kids-now/program/view/' + data.id + '" class="list-group-item" style="width: 500px; color: inherit; font-weight: bold"> ' + data.program_name +  '</a>';
						}
					}
				},
			]);
		});
	</script>
@endsection
