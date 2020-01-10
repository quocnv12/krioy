@extends('master-layout')
@section('title')
	Observations
@endsection

@section('content')
	<body>
		
		<section class="page-top container">
			<div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
				<div class="row">
					<div class="col-sm-6">
					<ul class="ul-td">
						<li _ngcontent-c16="" class="level1"><a _ngcontent-c16="">Home</a></li>
						<li _ngcontent-c16="" class="active1" style="pointer-events:none"><a _ngcontent-c16="">OBSERVATIONS</a></li>
					</ul>
					</div>
					<div class="col-sm-6">
						<a  href="{{route('admin.observations.list')}}" class="btn btn-success" style="float: right">Quản lí danh sách</a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="mat-card" style="width: 100%">
					<div class="mat-content">
						<button class="accordion accordion1 clearfix">
							<p style="float: left;">Children *</p>
								<form class="typeahead" role="search" style="float: right; text-align: left">
									<input type="search" name="q" class="form-control search-input search-custom" placeholder="Search Children..." autocomplete="off" style="line-height: 1.6;font-size: 18px;border: 2px solid #ccc; padding: 0 5px; width: 200px;">
								</form>
						</button>

						<div class="panel" >
							<div class="row" id="children_list">
								{{-- ajax ObservationController@addSelectChildren do vao day--}}
							</div>
							<input type="hidden" name="array_all_children" value="">
						</div>
					</div>
					<hr>
					<div class="mat-content">
						<button class="accordion">Observation Type</button>
						<div class="panel">
							<div _ngcontent-c20="" class="row" style="">
								@foreach($observationtype  as $observationtype)
								<div _ngcontent-c20="" align="center" class="col-lg-2 col-md-2 col-sm-2 col-xs-4 ng-star-inserted" style="padding:10px;cursor:pointer;">
									<button _ngcontent-c20="" class="btn progBtn limitText bgClass tablinks1" style="background-color:transparent;border:1px solid #5363d6;border-radius: 4px" value="{{$observationtype->id}}">{{$observationtype->name}} </button>
								</div>

								@endforeach
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
						<div class="button" style="text-align: center;">
							<button>
								<span>CANCEL</span>
							</button>
							<button class="button2" id="btn">
								<span>SAVE</span>
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
	<script language="javascript">
        var button = document.getElementById("btn");
        button.onclick = function(){
            alert("Thông tin đã lưu thành công!!!");
        }
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

	<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function($) {
			var engine1 = new Bloodhound({
				remote: {
					url: 'http://localhost:8000/kids-now/observations/search/children?q=%QUERY%',
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
							'<div class="list-group search-results-dropdown" style="padding: 10px; margin: 0;background-color:#EAEDED;color: #424949;width: 500px;"><div class="list-group-item">Nothing found.</div></div>'
						],
						header: [

						],
						suggestion: function (data) {
							return '<a onclick="getIdChildren('+data.id+')" class="list-group-item" style="padding: 10px; margin: 0;background-color:#EAEDED;color: #424949;padding: 10px; margin: 0;color: #424949;width: 500px;"> ' + data.first_name +' '+ data.last_name + '<i class="fa fa-plus" style="height: 10px; float: right !important;"></i>'+'</a>';
						}
					}
				},
			]);
		});
	</script>

	<script>
		$(document).ready(function () {
			$('.accordion').click();
		})


		//begin select children
		var array_children = [];

		function deleteChild(id_children) {
			array_children.splice( array_children.indexOf(id_children), 1 );
			console.log('array children sau khi xoa: '+array_children)
		}

		function getIdChildren(id){
			$.ajax({
				type: 'get',
				url: '{{ URL::to('kids-now/observations/select_child/add') }}',
				data: {
					'id_children' : id
				},
				success: function(data){
					if (! array_children.includes(id)){
						$('#children_list').append(data);
						array_children.push(id);
						console.log('id children them vao:'+id)
						console.log('day la array children khi them:'+array_children);
					}else {
						alert('children exists')
					}
				}
			});
		}
		//end select children

		// $('#submit_button').click(function() {
		// 	$('#array_all_children').attr('value', array_children);
		// 	$('#addObservation').submit();
		// });
	</script>
@endsection
