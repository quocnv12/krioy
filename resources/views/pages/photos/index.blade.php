
@extends('master-layout')
@section('title')
Photos
@endsection

@section('content')
<style>
    input[type="file"] {
    display: block;
    }
    .imageThumb {
        height: 72px;
        width: 110px;
        box-shadow: 0 2px 2px rgba(0,0,0,.4);
        border-radius: 1px;
        padding: 3px;
        cursor: pointer;
    }
    .pip {
        display: inline-block;
        margin: 10px 10px 0 0;
    }
    .remove {
        display: block;
        background: #444;
        border: 1px solid black;
        color: white;
        text-align: center;
        cursor: pointer;
    }
    .remove:hover {
        background: white;
        color: black;
    }
</style>
<body>
    <section class="page-top container">
        <div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
            <div class="row">
                <div class="col-sm-6">
                    <ul class="ul-td">
                        <li class="level1"><a href="kids-now">@lang('kidsnow.home')</a></li>
                        <li class="active1" style=""><a>@lang('kidsnow.photos.photos')</a></li>
                    </ul>
                </div>
            </div>
        </div>
       
            
		<div class="row">
			<div class="mat-card" style="width: 100%">
				<div class="mat-content">
					<button class="accordion accordion1 clearfix" type="button">
						<p style="float: left;">@lang('kidsnow.observations.children')</p>
						<a style="float: right;text-align: right">
							<p id="select_all_button" style="color: #fff;border: 1px solid #ff4081;padding: 5px;margin: 5px 0;background: #ff4081;border-radius: 5px;text-decoration: none;">@lang('kidsnow.select.all')</p>
						</a>
					</button>
					
					<div class="mat-card tab-content">
						<div class="mat-content" id="tab-main">
							<div class="scrollmenu-div">
								@foreach($programs as $program)
								<div class="scrollmenu-button" style="text-align: center;">
									<button class="limitText" type="button"
										style="background: @if(isset($id) && $program->id == $id) #ff4081 @else #5363d6 @endif;padding: 5px;border: none;border-radius: 5px;margin: 5px;min-width: 120px;text-align: center;">
										<a style="color: #fff ;margin: 0;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;width: 150px;display: block;" href="kids-now/photos/{{$program->id}}" title="{{$program->program_name}}">{{$program->program_name}}</a>
									</button>
								</div>
								@endforeach
							</div>
						</div>
					</div>
                    <hr>
                    <form style="width: auto;margin: 0;text-align: center" method="post" action="{{route('photos.post_add',['id' => $id])}}" id="addAttendance" enctype="multipart/form-data">
                    @csrf

                        <div class="row mat-card tab-content">
                            @if(isset($children_profiles))
                            @foreach($children_profiles as $children)
                            <div _ngcontent-c19="" class="div_box_children col-lg-2 col-md-2 col-sm-2 col-xs-6 ng-star-inserted" style="padding:10px;cursor:pointer;">
                                <div _ngcontent-c19="" class="child-class"
                                    style="height: 120px;text-align: center;margin-bottom: 5px;">
                                    <img _ngcontent-c19=""
                                        class="img-circle @foreach ($children->chil_atd as $value) @if($value->updated_at->format('Y-m-d') == $dayupdate && $value->status == 1) img-bd-xanh @elseif($value->updated_at->format('Y-m-d') == $dayupdate && $value->status == 2) img-bd-xam @elseif($value->updated_at->format('Y-m-d') == $dayupdate && $value->status == 3) img-bd-do @else img-bd-md @endif @endforeach"
                                        height="80" onerror="this.src='images/Child.png';" width="80" src="Child.png">
                                    <i _ngcontent-c9="" aria-hidden="true" class="fa fa-check check-select" id="checked" style="display: block;top:10px"></i>
                                    <span class="limitText ng-star-inserted span-clock span-clock-denmd">
                                        <p>{{$children->first_name}} {{$children->last_name}}</p>
                                    </span>
                                    <input type="hidden" value="{{$children->id}}">
                                </div>
                            </div>

                            @endforeach
                            <input id="array_children_attendance" type="hidden" value="" name="children_id">
                            @else
                            <div style="margin: 50px;">
                                <span style="color: red; font-weight: bold">@lang('kidsnow.attendance.hint') :</span>
                                <span>@lang('kidsnow.attendance.hint_content')</span>
                            </div>
                            @endif

                        </div>
                        @if ($errors->has('children_id'))
                            <div class="alert alert-danger">
                                {{ $errors->first('children_id') }}
                            </div>
                        @endif
                        <hr>
                        <button class="accordion accordion1 clearfix" type="button">
                            <p style="float: left;">@lang('kidsnow.photos.images')</p>
                            <a style="float: right;text-align: right">
                                <p id="button_file" style="color: #fff;border: 1px solid #ff4081;padding: 5px;margin: 5px 0;background: #ff4081;border-radius: 5px;text-decoration: none;">@lang('kidsnow.photos.select_photos')</p>
                            </a>
                        </button>
                        <div class="mat-card tab-content">
                            <input type="file" id="image_list" name="files[]" value="{{old('clip_board')}}" multiple style="display: none;"/>
                        </div>
                        @if ($errors->has('files'))
                            <div class="alert alert-danger">
                                {{ $errors->first('files') }}
                            </div>
                        @endif
                        <hr>
                        <button style="color: #fff;border: 1px solid #ff4081;padding: 5px;margin: 5px 0;background: #ff4081;border-radius: 5px;text-decoration: none;" id="submit_button">@lang('kidsnow.submit.send')</button>
                    </form>
                    {{-- <p>test: @foreach($mor as $value) 

                        {{$value->image}}
                     
                     @endforeach</p> --}}
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
<script src="libs/slick-1.8.1/slick/slick.js"></script>

<script type="text/javascript">
    var array_children_attendance = [];
    $('.div_box_children').children('div').children('i').hide()
    //select children
    $('.div_box_children').click(function () {
        if ($(this).children('div').children('i').hasClass('checked')) {
            ($(this).children('div').children('i').removeClass('checked'))
            $(this).children('div').children('i').hide()
            var attendance_pop = $(this).children('div').children('input').val();
            array_children_attendance.splice(array_children_attendance.indexOf(attendance_pop), 1);
        } else {
            $(this).children('div').children('i').addClass('checked')
            $(this).children('div').children('i').show()
            var attendance_push = $(this).children('div').children('input').val();
            array_children_attendance.push(attendance_push);
        }
        $('#array_children_attendance').attr('value', array_children_attendance);
        console.log(array_children_attendance)
    })
    //select all children
    $('#select_all_button').click(function() {
        if ($('.div_box_children').children('div').children('i').hasClass('checked')) {
            ($('.div_box_children').children('div').children('i').removeClass('checked'))
            $('.div_box_children').children('div').children('i').hide()
            array_children_attendance = [];
            console.log(array_children_attendance)
        } else {
            $('.div_box_children').children('div').children('i').addClass('checked')
            $('.div_box_children').children('div').children('i').show()
            array_children_attendance = $('.div_box_children').children('div').children('input').map(function(){
                return $(this).val();
            }).toArray();
            console.log(array_children_attendance)
        }
    });

    var button = document.getElementById("submit_button");
    button.onclick = function () {
        $('#array_children_attendance').attr('value', array_children_attendance);
        $('#addAttendance').submit();
    }

</script>


<script type="text/javascript">
    // Begin upload images
    $(document).ready(function() {
        if (window.File && window.FileList && window.FileReader) {
            $("#image_list").on("change", function(e) {
            var files = e.target.files,
                filesLength = files.length;
            for (var i = 0; i < filesLength; i++) {
                var f = files[i]
                var fileReader = new FileReader();
                fileReader.onload = (function(e) {
                var file = e.target;
                $("<span class=\"pip\">" +
                    "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                    "<br/><span class=\"remove\">@lang('kidsnow.photos.remove_photo')</span>" +
                    "</span>").insertAfter("#image_list");
                $(".remove").click(function(){
                    $(this).parent(".pip").remove();
                });
                
                // Old code here
                /*$("<img></img>", {
                    class: "imageThumb",
                    src: e.target.result,
                    title: file.name + " | Click to remove"
                }).insertAfter("#files").click(function(){$(this).remove();});*/
                
                });
                fileReader.readAsDataURL(f);
            }
            });
        } else {
            alert("Your browser doesn't support to File API")
        }
    });
    // End upload images

    // Submit images
    $('#button_file').click(function () {
			$('#image_list').click();
	})
</script>


<script type="text/javascript">
    $('.scrollmenu-div').slick({
        infinite: true,
        slidesToShow: 5,
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
                    arrows: false,
                }
            },
            {
                breakpoint: 500,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    autoplay: true,
                    arrows: false,
                }
            }
        ]
    });

</script>
@endsection
