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
						<li class="level1"><a href="kids-now">Home</a></li>
						<li class="active1" style="" ><a href="kids-now/observations/list">OBSERVATIONS</a></li>
					</ul>
					</div>
					<div class="col-sm-6">
						<a href="{{route('admin.observations.list')}}" class="btn btn-success" style="float: right">Children List</a>
					</div>
				</div>
			</div>
			@if(session('notify'))
				<div class="alert alert-success font-weight-bold">
					{{session('notify')}}
				</div>
			@endif
			<form style="width: auto;margin: 0;text-align: center" method="post" id="addObservation" enctype="multipart/form-data">
				@csrf
				<div class="row">
					<div class="mat-card" style="width: 100%">
						<div class="mat-content">
							<section class="container attendance-layout">
								<div class="row">
									<div class="col-lg-8 col-md-8 col-sm-8">
										<div class="attendance-button">
											<button class="btn tableStyle ng-star-inserted" style="color: rgb(75, 0, 130);">
												<p>Total</p>
												<!---->
												<span class="ng-star-inserted">0/1</span>
												<!---->
											</button>
											<button class="btn tableStyle ng-star-inserted" style="color: rgb(55, 189, 156);">
												<p>IN</p>
												<!---->
												<span class="ng-star-inserted">0/1</span>
												<!---->
											</button>
											<button class="btn tableStyle ng-star-inserted" style="color: rgb(169, 179, 189);">
												<p>OUT</p>
												<!---->
												<span class="ng-star-inserted">0/1</span>
												<!---->
											</button>
											<button class="btn tableStyle ng-star-inserted" style="color: rgb(237, 85, 100);">
												<p>ABSENT</p>
												<!---->
												<span class="ng-star-inserted">0/1</span>
												<!---->
											</button>
											<button class="btn tableStyle ng-star-inserted" style="color: rgb(255, 194, 0);">
												<p>LEAVE</p>
												<!---->
												<span class="ng-star-inserted">0/1</span>
												<!---->
											</button>
										</div>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-4">
										<div class="select-all">
											<div class="all-1" >
												<a href="#" class="all-2">
													<b>Select All-IN</b>
												</a>
											</div>
											<div class="all-1">
												<a href="#" class="all-2">
													<b>Select All</b>
												</a>
											</div>
										</div>
									</div>
								</div>
							</section>
							<button class="accordion accordion1 clearfix" type="button">
								<p style="float: left;">Children</p>
							</button>

	                        <div class="scrollmenu-div">
	                            @foreach($programs as $program)
	                                <div class="scrollmenu-button" style="text-align: center;">
	                                    <button type="button" style="background: #5363d6;padding: 5px;border: none;border-radius: 5px;margin: 5px;min-width: 120px;text-align: center;">
	                                        <a style="color: #fff;" href="kids-now/attendance/{{$program->id}}">{{$program->program_name}}</a>
	                                    </button>
	                                </div>
	                            @endforeach
	                        </div>

					        
							
	                        <div class="row">
	                            @if(isset($children_profiles))
									@if(count($children_profiles) > 0)
										@foreach($children_profiles as $children)
											<div class="div_box_children col-lg-2 col-md-2 col-sm-2 col-xs-6 ng-star-inserted" style="padding:10px;cursor:pointer;">
												<div type="button" style="height: 120px;text-align: center;-webkit-appearance: none;">
													<img class="img-circle" height="80" onerror="this.src='images/Child.png';" width="80" src="images/Child.png">
													<i _ngcontent-c9="" aria-hidden="true" class="fa fa-check" id="checked" style="display: block;top:10px"></i>                                            <span class="limitText ng-star-inserted" style="color:#5363d6;;margin: 0px;display: block;">{{$children->first_name}} {{$children->last_name}}</span>
													<input type="hidden" value="{{$children->id}}">
												</div>
											</div>
										@endforeach
									@else
										<div style="font-weight: bold; margin: 50px">No Children were founded</div>
									@endif
	                                <input id="array_children_observation" type="hidden" value="" name="children_observations">
								@else
									<div style="margin: 50px;">
										<span style="color: red; font-weight: bold">Hint :</span>
										<span>Click on a program tab in horizontal scroll bar to show all children in that program</span>
									</div>
	                            @endif
	                        </div>
	                        <div class="icon-plus-1" >
								<button  type="button" class="icon-plus-button groupStatus" style="background-color: #37bd9c;" data-toggle="modal" data-target=".bd-example-modal-sm" value="1" name='status' >IN</button><br>
								<button  type="button" class="icon-plus-button groupStatus" style="background-color: #ccc;" data-toggle="modal" data-target=".bd-example-modal-sm" value="2" name='status'>OUT</button><br>
								<button  type="button" class="icon-plus-button groupStatus" style="background-color: #ed5564;" data-toggle="modal" data-target=".bd-example-modal-sm" value="3" name='status'>ABSENT</button><br>
								<button  type="button" class="icon-plus-button groupStatus" style="background-color: #ccc;" data-toggle="modal" data-target=".bd-example-modal-sm" value="4" name='status'>UNMARK</button><br>
								<!-- <button class="icon-plus-button" style="background-color: #ffc200;" data-toggle="modal" data-target=".bd-example-modal-sm">LEAVE</button> -->
								<input type="hidden" name="children_status" value="" id="children_status">
							</div>
							<div class="modal fade bd-example-modal-sm modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-sm" style="">
									<div class="modal-content" style="font-size: 18px;">
										<h3>Aler</h3>
										<hr style="clear:both;margin-top:0px;margin-bottom:0px">
										<div align="center">
											<p style="margin: 0;font-size: 18px;">You are marking attendance with time selected as 10:53 am</p>
										</div>
										<hr style="clear:both;margin-top:0px;margin-bottom:0px">
										<div class="row" style="margin: 0;">
											<div class="col-xs-6 col-md-6 mat-dialog-actions " style="border-right: 1px solid lightgrey;">
												<button class="mat-button-class" style="color: #5363d6;border-left: 1px solid transparent; font-size: 16px;" >
													<span class="mat-button-wrapper button2" id="submit_button">PROCEED</span>
												</button>
											</div>
											<div class="col-xs-6 col-md-6 mat-dialog-actions">
												<button class="mat-button-class" style="color: red;font-size: 16px;">
													<span class="mat-button-wrapper">CANCEL</span>
												</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</form>
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
    <script type="text/javascript">
		var array_observation = [];
    	$('.tablinks1').click(function(event) {
    		if ($(this).prop('class')=='btn progBtn limitText bgClass tablinks1 tablinks1_active') {
    			$(this).removeClass('tablinks1_active');
				var observation_pop = $(this).val();
				array_observation.splice( array_observation.indexOf(observation_pop), 1 );
    		}else{
    			$(this).addClass('tablinks1_active');
				var observation_push = $(this).val();
				array_observation.push(observation_push);
    		}
			console.log(array_observation);
    	});

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

        //begin select children_observation
        var array_children_observation = [];
        $('.div_box_children').children('div').children('i').hide()

        $('.div_box_children').click(function () {
            if ($(this).children('div').children('i').hasClass('checked')){
                ($(this).children('div').children('i').removeClass('checked'))
                $(this).children('div').children('i').hide()
                var observation_pop = $(this).children('div').children('input').val();
                array_children_observation.splice( array_children_observation.indexOf(observation_pop), 1 );

            }else {
                $(this).children('div').children('i').addClass('checked')
                $(this).children('div').children('i').show()
                var observation_push = $(this).children('div').children('input').val();
                array_children_observation.push(observation_push);
            }
            console.log(array_children_observation)
        })
        //end select children_observation

        $('.groupStatus').click(function () {
			var selectStatus = $(this).val();
			$('#children_status').attr('value', selectStatus);
		})

		var button = document.getElementById("submit_button");
		button.onclick = function(){
			$('#array_all_children').attr('value', array_children);
			$('#array_observation').attr('value', array_observation);
			$('#array_children_observation').attr('value', array_children_observation);
		}
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
	</script>
    <script src="libs/slick-1.8.1/slick/slick.js"></script>
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
