@extends('master-layout')
@section('title')
	Select Children
@endsection
@section('content')
<body>
	<section class="page-top container">
		<div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
			<div class="row">
				<div class="col-md-6">
					<ul class="ul-td">
						<li class="level1"><a  href="kids-now">HOME</a></li>
						<li class="active1" style="pointer-events:none"><a  href="kids-now/program">PROGRAM</a></li>
						<li class="active1 active-1" style="pointer-events:none;"><a>SELECT CHILDREN</a></li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	
	<section class="container">
		<div class="col-md-10">
			<div class="menu-search">
				<form class="typeahead" role="search" style="text-align: left">
					<input type="search" name="q" class="form-control search-input children-items" placeholder="Search Children..." autocomplete="off" style="line-height: 1.6;font-size: 18px;border: 2px solid #ccc; padding: 0 5px; width: 500px;">
				</form>
			</div>
		</div>
		<div class="col-md-2">
			<a style="float: right;text-align: right">
				<p style="color: #fff;border: 1px solid #ff4081;padding: 5px 10px;margin: 5px 10px;background: #ff4081;border-radius: 5px;text-decoration: none;font-size: 16px;" onclick="doneChildren()">DONE</p>
			</a>
		</div>
	</section>
	
	<section class="container">
		<div class="mat-card" style="min-height: 350px;">
			<div class="mat-content">	
				<div _ngcontent-c19="" class="row ng-star-inserted" id="children_list">
					<!---->

					<!---->
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
    <script type="text/javascript">
    	$('.all-1').click(function(event) {
    		$('.all-1').removeClass('all-1-click');
    		$(this).addClass('all-1-click');
    	});
    </script>

	{{--array_children--}}
	<script>
		var array_children = [];

		function getIdChildren(id){
			console.log('day la id lay duoc '+id)

			$.ajax({
				type: 'get',
				url: '{{ URL::to('kids-now/program/select_child/add') }}',
				data: {
					'id_children' : id
				},
				success:function(data){
					if (! array_children.includes(id)){
						$('#children_list').append(data);
						array_children.push(id);
						console.log('day la array '+array_children);
					}else {
						//cho nay them 1 alert children da ton tai
						console.log('children exists')
					}
				}
			});
		}

		function doneChildren() {
			localStorage.setItem('array_children',array_children);
			history.go(-1);
		}

	</script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function($) {
			var engine1 = new Bloodhound({
				remote: {
					url: 'http://localhost:8000/kids-now/program/search/children?q=%QUERY%',
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
							return '<a onclick="getIdChildren('+data.id+')" class="list-group-item" id="children-items" style="width: 500px;"> ' + data.first_name +' '+ data.last_name + '<i class="fa fa-plus" style="height: 10px; float: right !important;"></i>'+'</a>';
						}
					}
				},
			]);
		});
	</script>


@endsection
