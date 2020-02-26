@extends('master-layout')
@section('title')
	EDIT Children
@endsection

@section('content')

    <style>
        .text-danger{
            display: flex;
            justify-content: flex-start;
            margin: 15px;
        }
    </style>
    <body>

    <section class="page-top container">
        <div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
            <div class="row">
                <div class="col-lg-10 col-md-10 col-sm-10">
                    <ul class="ul-td">
                        <li  class="level1"><a href="{{route('admin.home')}}">HOME</a></li>
                        <li  class="active1" ><a href="{{route('admin.children.index')}}">CHILDREN</a></li>
                        <li class="active1 active-1" style="pointer-events: none"><a href="">EDIT CHILDREN</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2" data-toggle="modal" data-target="" style="display: flex; justify-content: flex-end; ">
                    <button class="notice" type="button" >
                        <span><a href="{{route('admin.children.destroy',['id'=>$children_profiles->id])}}" style="color: inherit; " onclick="return deleteConfirm()">DELETE</a></span>
                    </button>
                </div>
            </div>
        </div>
        <form style="width: auto;
    margin: 0 0;
    text-align: center;" action="{{route('admin.children.update',['id'=>$children_profiles->id])}}" method="post" name="form" enctype="multipart/form-data">
            @csrf
            <div class="mat-card">
                <div class="mat-content">
                    <button class="accordion add-staff" type="button">@lang('kidsnow.children.edit_children')</button>
                    <div class="row">
                        <div class="col-md-2 textera-img">
                            <a style="cursor: pointer;">
                                <input type="file" id="uploadfile" name="image" accept="image/*">
                                <img src="{{$children_profiles->image ? $children_profiles->image : 'images/Child.png'}}" alt="" id="demo_image">
                                <span _ngcontent-c10="" class="btnClass ng-star-inserted" style=""><i _ngcontent-c10="" aria-hidden="true" class="fa fa-camera"></i></span>
                                @if ($errors->has('image'))
                                    <div class="text text-danger">
                                        {{ $errors->first('image') }}
                                    </div>
                                @endif
                            </a>
                        </div>
                        <div class="col-md-10">
                            <div class="add a1 ">
                                <div class="row">
                                    <div class="col-md-6 input_box">
                                        <span class="input_box_span_active">@lang('kidsnow.children.first_name') *</span>
                                        <input type="text" name="first_name" placeholder="@lang('kidsnow.children.first_name') *" value="{{old('first_name') ?? $children_profiles->first_name}}">
                                        @if ($errors->has('first_name'))
                                            <div class="text text-danger">
                                                {{ $errors->first('first_name') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6 input_box">
                                        <span class="input_box_span_active">@lang('kidsnow.children.last_name') *</span>
                                        <input type="text" name="last_name" placeholder="@lang('kidsnow.children.last_name') *" value="{{old('last_name') ?? $children_profiles->last_name}}">
                                        @if ($errors->has('last_name'))
                                            <div class="text text-danger">
                                                {{ $errors->first('last_name') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr style="margin: 0;">
                    <div class="add" style="width: 100%; margin: 15px 0">
                        <div class="row">
                            <div class="col-md-3 input_box">
                                <span class="input_box_span_active">@lang('kidsnow.children.birthday') *</span>
                                <input type="date" name="birthday" placeholder="@lang('kidsnow.children.birthday')" value="{{old('birthday') ?? $children_profiles->birthday}}">
                                @if ($errors->has('birthday'))
                                    <div class="text text-danger">
                                        {{ $errors->first('birthday') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-3 input_box">
                                <span class="input_box_span_active">@lang('kidsnow.children.blood_group') </span>
                                <select name="blood_group">
                                    <option value="">@lang('kidsnow.children.blood_group')</option>
                                    <option value="A+" @if(old('blood_group') ?? $children_profiles->blood_group == "A+") selected="selected" @endif>A+</option>
                                    <option value="A-" @if(old('blood_group') ?? $children_profiles->blood_group == "A-") selected="selected" @endif>A-</option>
                                    <option value="B+" @if(old('blood_group') ?? $children_profiles->blood_group == "B+") selected="selected" @endif>B+</option>
                                    <option value="B-" @if(old('blood_group') ?? $children_profiles->blood_group == "B-") selected="selected" @endif>B-</option>
                                    <option value="O+" @if(old('blood_group') ?? $children_profiles->blood_group == "O+") selected="selected" @endif>O+</option>
                                    <option value="O-" @if(old('blood_group') ?? $children_profiles->blood_group == "O-") selected="selected" @endif>O-</option>
                                    <option value="AB+" @if(old('blood_group') ?? $children_profiles->blood_group == "AB+") selected="selected" @endif>AB+</option>
                                    <option value="AB-" @if(old('blood_group') ?? $children_profiles->blood_group == "AB-") selected="selected" @endif>AB-</option>
                                </select>
                                @if ($errors->has('blood_group'))
                                    <div class="text text-danger">
                                        {{ $errors->first('blood_group') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-3 input_box">
                                <span class="input_box_span_active">@lang('kidsnow.children.gender') *</span>
                                <select name="gender">
                                    <option selected value="">@lang('kidsnow.children.gender') *</option>
                                    <option value="1" @if(old('gender') ?? $children_profiles->gender == 1) selected="selected" @endif>Nam</option>
                                    <option value="2" @if(old('gender') ?? $children_profiles->gender == 2) selected="selected" @endif>Nữ</option>
                                </select>
                                @if ($errors->has('gender'))
                                    <div class="text text-danger">
                                        {{ $errors->first('gender') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-3 input_box">
                                <span class="input_box_span_active">@lang('kidsnow.children.date_of_joining') *</span>
                                <input type="date" name="date_of_joining" placeholder="@lang('kidsnow.children.date_of_joining')" value="{{old('date_of_joining') ?? $children_profiles->date_of_joining}}">
                                @if ($errors->has('date_of_joining'))
                                    <div class="text text-danger">
                                        {{ $errors->first('date_of_joining') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="add">
                        <div class="row">
                            <div class="col-md-6 input_box" style="width: 100%;">
                                <span class="input_box_span_active">@lang('kidsnow.children.unique_id') *</span>
                                <input type="text" name="unique_id" placeholder="@lang('kidsnow.children.unique_id') *" value="{{old('unique_id') ?? $children_profiles->unique_id}}">
                                @if ($errors->has('unique_id'))
                                    <div class="text text-danger">
                                        {{ $errors->first('unique_id') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-3 input_box">
                                <span class="input_box_span_active">@lang('kidsnow.children.status')</span>
                                <select name="status">
                                    <option value="">@lang('kidsnow.children.status')</option>
                                    <option value="1" @if(old('status') ?? $children_profiles->status == 1) selected="selected" @endif>IN</option>
                                    <option value="2" @if(old('status') ?? $children_profiles->status == 2) selected="selected" @endif>OUT</option>
                                    <option value="3" @if(old('status') ?? $children_profiles->status == 3) selected="selected" @endif>ABSENT</option>
                                    <option value="4" @if(old('status') ?? $children_profiles->status == 4) selected="selected" @endif>LEAVE</option>
                                </select>
                                @if ($errors->has('status'))
                                    <div class="text text-danger">
                                        {{ $errors->first('status') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-3 input_box">
                                <span class="input_box_span_active">@lang('kidsnow.children.exist')</span>
                                <select name="exist">
                                    <option value="">@lang('kidsnow.children.exist')</option>
                                    <option value="1" @if(old('exist') ?? $children_profiles->exist == 1) selected="selected" @endif>Yes</option>
                                    <option value="0" @if(old('exist') ?? $children_profiles->exist == 1) selected="selected" @endif>No</option>
                                </select>
                                @if ($errors->has('exist'))
                                    <div class="text text-danger">
                                        {{ $errors->first('exist') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="input_box" style="width: 100%;">
                            <span class="input_box_span_active">@lang('kidsnow.children.residential_address') </span>
                            <input type="text" name="address" placeholder="@lang('kidsnow.children.residential_address')" value="{{old('address') ?? $children_profiles->address}}">
                            @if ($errors->has('address'))
                                <div class="text text-danger">
                                    {{ $errors->first('address') }}
                                </div>
                            @endif
                        </div>
                        <div class="input_box" style="width: 100%;">
                            <span class="input_box_span_active">@lang('kidsnow.children.allergies') </span>
                            <input type="text" name="allergies" placeholder="@lang('kidsnow.children.allergies')" value="{{old('allergies') ?? $children_profiles->allergies}}">
                            @if ($errors->has('allergies'))
                                <div class="text text-danger">
                                    {{ $errors->first('allergies') }}
                                </div>
                            @endif
                        </div>
                        <div class="input_box" style="width: 100%;">
                            <span class="input_box_span_active">@lang('kidsnow.children.additional_notes') </span>
                            <input type="text" name="additional_note" placeholder="@lang('kidsnow.children.additional_notes')" value="{{old('additional_note') ?? $children_profiles->additional_note}}">
                            @if ($errors->has('additional_note'))
                                <div class="text text-danger">
                                    {{ $errors->first('additional_note') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="mat-card">
                <div class="mat-content">
                    <button class="accordion" type="button">@lang('kidsnow.children.programs')</button>
                    <div class="panel">
                        <div _ngcontent-c20="" class="row" style="">
                            <!---->
                                @foreach($programs as $program)
                                    <div _ngcontent-c20="" align="center" class="col-xs-6 col-sm-4 col-md-3 col-lg-3 ng-star-inserted" style="padding:10px;cursor:pointer">
                                        <button _ngcontent-c20="" class="btn progBtn limitText bgClass tablinks1 @if(in_array($program->id, $array_programs_choose)) tablinks1_active @endif" style="background-color: transparent; border:1px solid #5363d6;border-radius: 4px;width: 100%" type="button" data-toggle="tooltip" title="{{$program->program_name}}" value="{{$program->id}}">{{$program->program_name}}</button>
                                    </div>
                                @endforeach
                            <input id="array_programs_new" type="hidden" value="" name="programs_new">
                            <input id="array_programs_old" type="hidden" name="programs_old" value="{{implode(',',$array_programs_choose)}}">
                        </div>
                    </div>
                </div>
            </div>


                <div class="mat-card" style="background-color: #f9f9f9;">
                <div class="mat-content">
                    <button class="accordion" type="button">@lang('kidsnow.children.parents') *</button>
                    <div class="panel" style="background-color: #f9f9f9;margin-bottom: 0;margin: 0 -10px;">
                        <div class="panel-1">
                            <input type="hidden" name="id_parent_profiles" value="{{$parent_profiles->id}}">
                            <div class="row">
                                <div class="col-md-2 textera-img">
                                    <a style="cursor: pointer;">
                                        <input type="file" id="uploadfile_parent" name="image_parent" accept="image/*">
                                        <img src="{{$parent_profiles->image ? $parent_profiles->image : 'images/Parent.png'}}" alt="" id="demo_image_parent" style="height: 100px">
                                        <span _ngcontent-c10="" class="btnClass ng-star-inserted" style=""><i _ngcontent-c10="" aria-hidden="true" class="fa fa-camera"></i></span>
                                        @if ($errors->has('image_parent'))
                                            <div class="text text-danger">
                                                {{ $errors->first('image_parent') }}
                                            </div>
                                        @endif
                                    </a>
                                </div>
                                <div class="col-md-10">
                                    <div class="add a1 ">
                                        <div class="row">
                                            <div class="col-md-6 input_box">
                                                <span class="input_box_span_active">@lang('kidsnow.children.first_name') *</span>
                                                <input id="first_name_parent" type="text" name="first_name_parent" placeholder="@lang('kidsnow.children.first_name') *" value="{{old('first_name_parent') ?? $parent_profiles->first_name}}">
                                                @if ($errors->has('first_name_parent'))
                                                    <div class="text text-danger">
                                                        {{ $errors->first('first_name_parent') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-md-6 input_box">
                                                <span class="input_box_span_active">@lang('kidsnow.children.last_name') *</span>
                                                <input id="last_name_parent" type="text" name="last_name_parent" placeholder="@lang('kidsnow.children.last_name') *" value="{{old('last_name_parent') ?? $parent_profiles->last_name}}">
                                                @if ($errors->has('last_name_parent'))
                                                    <div class="text text-danger">
                                                        {{ $errors->first('last_name_parent') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 input_box">
                                                <span class="input_box_span_active">@lang('kidsnow.children.gender') </span>
                                                <select name="gender_parent">
                                                    <option value="">@lang('kidsnow.children.gender')</option>
                                                    <option value="1" @if(old('gender_parent') ?? $parent_profiles->gender == 1) selected="selected" @endif>Nam</option>
                                                    <option value="2" @if(old('gender_parent') ?? $parent_profiles->gender == 2) selected="selected" @endif>Nữ</option>
                                                </select>
                                                @if ($errors->has('gender_parent'))
                                                    <div class="text text-danger">
                                                        {{ $errors->first('gender_parent') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="input_box" style="width: 100%;">
                                            <span class="input_box_span_active">@lang('kidsnow.children.main_phone') *</span>
                                            <input type="text" name="main_phone_parent" placeholder="@lang('kidsnow.children.main_phone') *" value="{{old('main_phone_parent') ?? $parent_profiles->main_phone}}">
                                            @if ($errors->has('main_phone_parent'))
                                                <div class="text text-danger">
                                                    {{ $errors->first('main_phone_parent') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="input_box" style="width: 100%;">
                                            <span class="input_box_span_active">@lang('kidsnow.children.extra_phone') *</span>
                                            <input type="text" name="extra_phone_parent" placeholder="@lang('kidsnow.children.extra_phone') *" value="{{old('extra_phone_parent') ?? $parent_profiles->extra_phone}}">
                                            @if ($errors->has('extra_phone_parent'))
                                                <div class="text text-danger">
                                                    {{ $errors->first('extra_phone_parent') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="input_box" style="width: 100%;">
                                            <span class="input_box_span_active">@lang('kidsnow.children.email') </span>
                                            <input name="email_parent" placeholder="@lang('kidsnow.children.email') " value="{{old('email_parent') ?? $parent_profiles->email}}">
                                            @if ($errors->has('email_parent'))
                                                <div class="text text-danger">
                                                    {{ $errors->first('email_parent') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="input_box" style="width: 100%;">
                                            <span class="input_box_span_active">@lang('kidsnow.children.note') </span>
                                            <input type="text" name="note_parent" placeholder="@lang('kidsnow.children.note')" value="{{old('note_parent') ?? $parent_profiles->note}}">
                                            @if ($errors->has('note_parent'))
                                                <div class="text text-danger">
                                                    {{ $errors->first('note_parent') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="comment">
                <div class="button" style="text-align: center;">
                    <button type="reset" onclick="goBack()">
                        <span>@lang('kidsnow.cancel')</span>
                    </button>
                    <button class="button2" type="submit" id="submit_button">
                        <span>@lang('kidsnow.save')</span>
                    </button>
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
        var array = $('#array_programs_old').val().split(',');

        $('.tablinks1').click(function(event) {
            if ($(this).hasClass('tablinks1_active')) {
                $(this).removeClass('tablinks1_active');
                var program_pop = $(this).val();
                array.splice( array.indexOf(program_pop), 1 );
            }else{
                $(this).addClass('tablinks1_active');
                var program_push = $(this).val();
                array.push(program_push);
            }
        });

        $('#submit_button').click(function(event) {
            $('#array_programs_new').attr('value', array);
        });

        function deleteConfirm() {
            return confirm("Confirm delete this children ?");
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
	<script type="text/javascript">
		$('.input_box select').focus(function(event) {
			$(this).siblings('span').addClass('input_box_span_active');
		});
		$('.input_box select').blur(function(event) {
			if ($(this).val()=='') {
				$(this).siblings('span').removeClass('input_box_span_active');
			}
		});
	</script>


    {{-- begin xu ly anh--}}
    <script>
        $("#uploadfile").hide();
        $("#demo_image").click(function () {
            $("#uploadfile").click();
        });
        $("#uploadfile_parent").hide();
        $("#demo_image_parent").click(function () {
            $("#uploadfile_parent").click();
        });
    </script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#demo_image').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }

        }

        function readURL_parent(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#demo_image_parent').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }

        }

        $("#uploadfile").change(function(){
            readURL(this);
        });

        $("#uploadfile_parent").change(function(){
            readURL_parent(this);
        });
    </script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    {{-- finish xu ly anh--}}

    <script>
        $(document).ready(function () {
            $('.accordion').click()
        })
    </script>
@endsection

