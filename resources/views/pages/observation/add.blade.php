@extends('master-layout')
@section('title')
	Observations
@endsection

@section('content')
    {{--<style>--}}
        {{--.slick-prev{--}}
            {{--left: 0 !important;--}}
        {{--}--}}

        {{--.slick-next{--}}
            {{--right: 0 !important;--}}
        {{--}--}}
    {{--</style>--}}
	<body>
		<section class="page-top container">
			<div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
				<div class="row">
					<div class="col-sm-6">
					<ul class="ul-td">
						<li class="level1"><a href="kids-now">Home</a></li>
						<li class="active1" style="pointer-events:none" ><a href="">OBSERVATIONS</a></li>
					</ul>
					</div>
					<div class="col-sm-6">
						<a href="{{route('admin.observations.list')}}" class="btn btn-success" style="float: right">Quản lí danh sách</a>
					</div>
				</div>
			</div>
			@if(session('notify'))
				<div class="alert alert-success font-weight-bold">
					{{session('notify')}}
				</div>

			@endif
		<form style="width: auto;margin: 0;text-align: center" action="{{route('admin.observations.postAdd')}}" method="post" id="addObservation" enctype="multipart/form-data">
			@csrf
			<div class="row">
				<div class="mat-card" style="width: 100%">
					<div class="mat-content">
						<a style="margin:5px 0px 13px 14px;min-width:110px;background:#5363d6;color:white; float: left" href="{{route('admin.observations.listobservationtype')}}" class="btn btn-defaul">ObservationType</a>
						<button class="accordion accordion1 clearfix" type="button">
							<p style="float: left;">Children *</p>
								{{--<form class="typeahead" role="search" style="float: right; text-align: left">--}}
									{{--<input type="search" name="q" class="form-control search-input search-custom" placeholder="Search Children..." autocomplete="off" style="line-height: 1.6;font-size: 18px;border: 2px solid #ccc; padding: 0 5px; width: 200px;">--}}
								{{--</form>--}}
						</button>

                        <div class="scrollmenu-div">
                            @foreach($programs as $program)
                                <div class="scrollmenu-button" style="text-align: center;">
                                    <button type="button" style="background: #5363d6;padding: 5px;border: none;border-radius: 5px;margin: 5px;min-width: 120px;text-align: center;">
                                        <a style="color: #fff;" href="kids-now/observations/show/{{$program->id}}">{{$program->program_name}}</a>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                        <div class="row">
                            @if(isset($children_profiles))
								@if(count($children_profiles) > 0)
									@foreach($children_profiles as $children)
										<div class="div_box_children col-lg-2 col-md-2 col-sm-2 col-xs-6 ng-star-inserted" style="padding:10px;cursor:pointer;">
											<div type="button" data-toggle="modal" data-target=".bd-example-modal-sm" style="height: 120px;text-align: center;-webkit-appearance: none;">
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
					</div>
					@if ($errors->has('children_observations'))
						<div class="text text-danger">
							{{ $errors->first('children_observations') }}
						</div>
					@endif
					<hr>
					<div class="mat-content">
						<button class="accordion" type="button">Observation Type</button>
						<div class="panel">
							<div _ngcontent-c20="" class="row" style="">
								@foreach($observationtype  as $observation)
									<div _ngcontent-c20="" align="center" class="col-lg-2 col-md-2 col-sm-2 col-xs-4 ng-star-inserted" style="padding:10px;cursor:pointer;">
										<button type="button" _ngcontent-c20="" class="btn progBtn limitText bgClass tablinks1" style="background-color:transparent;border:1px solid #5363d6;border-radius: 4px" data-toggle="tooltip" title="{{$observation->name}}" value="{{$observation->id}}">{{$observation->name}} </button>
									</div>
								@endforeach
								<input id="array_observation" type="hidden" value="" name="observations">

							</div>
						</div>
					</div>
					@if ($errors->has('observations'))
						<div class="text text-danger">
							{{ $errors->first('observations') }}
						</div>
					@endif
					<div class="comment">
						<div class="row">
							<div class="col-md-11 input_box">
								<span>Enter Details here *</span>
								<input type="text" name="detailObservation" placeholder="Enter Details here *">
							</div>
							<div class="col-md-1">
								<div class="zoom">
									<a _ngcontent-c9="" class="zoom-fab zoom-btn-large fa fa-paperclip" id="zoomBtn" style="font-size: 30px;cursor: pointer"></a>
								</div>
							</div>
						</div>
						<div class="button" style="text-align: center;">
							<button type="reset">
								<span>CANCEL</span>
							</button>
							<button class="button2" id="submit_button" type="submit">
								<span>SAVE</span>
							</button>
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
