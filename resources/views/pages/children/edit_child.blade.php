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
                        <li _ngcontent-c16="" class="level1"><a _ngcontent-c16="">HOME</a></li>
                        <li _ngcontent-c16="" class="active1" style="pointer-events:none"><a _ngcontent-c16="">CHILDREN</a></li>
                        <li _ngcontent-c16="" class="active1 active-1" style="pointer-events:none;"><a _ngcontent-c16="">EDIT CHILDREN</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2" data-toggle="modal" data-target="">
                    <button class="notice" type="button">
                        <span><a href="kids-now/children/delete/{{$children_profiles->id}}" style="color: inherit">DELETE</a></span>
                    </button>
                </div>
            </div>
        </div>
        @if(session('notify'))
            <div class="alert alert-success font-weight-bold">
                {{session('notify')}}
            </div>

        @endif
        <form style="width: auto;
    margin: 0 0;
    text-align: center" action="kids-now/children/edit/{{$children_profiles->id}}" method="post" name="form" enctype="multipart/form-data">
            @csrf
            <div class="mat-card">
                <div class="mat-content">
                    <button class="accordion add-staff">Edit Children</button>
                    <div class="row">
                        <div class="col-md-2 textera-img">
                            <a style="cursor: pointer;">
                                <input type="file" id="uploadfile" name="image">
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
                            <div class="add a1-1 ">
                                <div class="row">
                                    <div class="col-md-6 input_box">
                                        <span>First Name *</span>
                                        <input type="text" name="first_name" placeholder="First Name *" value="{{$children_profiles->first_name}}">
                                        @if ($errors->has('first_name'))
                                            <div class="text text-danger">
                                                {{ $errors->first('first_name') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6 input_box">
                                        <span>Last Name *</span>
                                        <input type="text" name="last_name" placeholder="Last Name *" value="{{$children_profiles->last_name}}">
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
                    <div class="row">
                        <div class="add" style="width: 100%">
                            <div class="col-md-3 input_box">
                                <span>Birthday *</span>
                                <input type="date" name="birthday" placeholder="Birthday" value="{{$children_profiles->birthday}}">
                                @if ($errors->has('birthday'))
                                    <div class="text text-danger">
                                        {{ $errors->first('birthday') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-3 input_box">
                                <span>Blood Group </span>
                                <select name="blood_group">
                                    <option value="">Blood Group</option>
                                    <option value="A+" @if($children_profiles->blood_group == "A+") selected="selected" @endif>A+</option>
                                    <option value="A-" @if($children_profiles->blood_group == "A-") selected="selected" @endif>A-</option>
                                    <option value="B+" @if($children_profiles->blood_group == "B+") selected="selected" @endif>B+</option>
                                    <option value="B-" @if($children_profiles->blood_group == "B-") selected="selected" @endif>B-</option>
                                    <option value="O+" @if($children_profiles->blood_group == "O+") selected="selected" @endif>O+</option>
                                    <option value="O-" @if($children_profiles->blood_group == "O-") selected="selected" @endif>O-</option>
                                    <option value="AB+" @if($children_profiles->blood_group == "AB+") selected="selected" @endif>AB+</option>
                                    <option value="AB-" @if($children_profiles->blood_group == "AB-") selected="selected" @endif>AB-</option>
                                </select>
                                @if ($errors->has('blood_group'))
                                    <div class="text text-danger">
                                        {{ $errors->first('blood_group') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-3 input_box">
                                <span>Gender</span>
                                <select name="gender">
                                    <option selected>Gender</option>
                                    <option value="1" @if($children_profiles->gender == 1) selected="selected" @endif>Nam</option>
                                    <option value="2" @if($children_profiles->gender == 2) selected="selected" @endif>Nữ</option>
                                </select>
                                @if ($errors->has('gender'))
                                    <div class="text text-danger">
                                        {{ $errors->first('gender') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-3 input_box">
                                <span>Date of Joining *</span>
                                <input type="date" name="date_of_joining" placeholder="Date of Joining" value="{{$children_profiles->date_of_joining}}">
                                @if ($errors->has('date_of_joining'))
                                    <div class="text text-danger">
                                        {{ $errors->first('date_of_joining') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="add">
                        <div class="col-md-8 input_box" style="width: 100%;">
                            <span>Unique ID *</span>
                            <input type="text" name="unique_id" placeholder="Unique ID *" value="{{$children_profiles->unique_id}}">
                            @if ($errors->has('unique_id'))
                                <div class="text text-danger">
                                    {{ $errors->first('unique_id') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-md-4 input_box" style="width: 100%;">
                            <span>Status</span>
                            <select name="status">
                                <option value="">Status</option>
                                <option value="1" @if($children_profiles->status == 1) selected="selected" @endif>IN</option>
                                <option value="2" @if($children_profiles->status == 2) selected="selected" @endif>OUT</option>
                                <option value="3" @if($children_profiles->status == 3) selected="selected" @endif>ABSENT</option>
                                <option value="4" @if($children_profiles->status == 4) selected="selected" @endif>LEAVE</option>
                            </select>
                            @if ($errors->has('status'))
                                <div class="text text-danger">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                        </div>
                        <div class="input_box" style="width: 100%;">
                            <span>Residential Address *</span>
                            <input type="text" name="address" placeholder="Residential Address" value="{{$children_profiles->address}}">
                            @if ($errors->has('address'))
                                <div class="text text-danger">
                                    {{ $errors->first('address') }}
                                </div>
                            @endif
                        </div>
                        <div class="input_box" style="width: 100%;">
                            <span>Allergies (if any) *</span>
                            <input type="text" name="allergies" placeholder="Allergies (if any)" value="{{$children_profiles->allergies}}">
                            @if ($errors->has('allergies'))
                                <div class="text text-danger">
                                    {{ $errors->first('allergies') }}
                                </div>
                            @endif
                        </div>
                        <div class="input_box" style="width: 100%;">
                            <span>Additional Notes *</span>
                            <input type="text" name="additional_note" placeholder="Additional Notes" value="{{$children_profiles->additional_note}}">
                            @if ($errors->has('additional_note'))
                                <div class="text text-danger">
                                    {{ $errors->first('additional_note') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div>
                        <span>Exist</span>
                        <br>
                        <input type="radio" name="exist" value="1" @if($children_profiles->exist == 1) {{'checked'}} @endif> Yes<br>
                        <input type="radio" name="exist" value="2" @if($children_profiles->exist == 2) {{'checked'}} @endif> No<br>
                        @if ($errors->has('exist'))
                            <div class="text text-danger">
                                {{ $errors->first('exist') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="mat-card">
                <div class="mat-content">
                    <button class="accordion" type="button">Programs</button>
                    <div class="panel">
                        <div _ngcontent-c20="" class="row" style="">
                            <!---->
                                @foreach($programs as $program)
                                    <div _ngcontent-c20="" align="center" class="col-xs-6 col-sm-4 col-md-3 col-lg-2 ng-star-inserted" style="padding:10px;cursor:pointer">
                                        <button _ngcontent-c20="" class="btn progBtn limitText bgClass tablinks1 @if(in_array($program->id, $array_programs_choose)) tablinks1_active @endif" style="background-color: transparent; border:1px solid #5363d6;border-radius: 4px" type="button" value="{{$program->id}}">{{$program->program_name}}</button>
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
                    <button class="accordion" type="button">Parents *</button>
                    <div class="panel" style="background-color: #f9f9f9;margin-bottom: 0;margin: 0 -10px;">
                        @foreach($parent_profiles as $parent)
                        <div class="panel-1">
                            <div class="row">
                                <div class="col-md-2 textera-img">
                                    <a href="#">
                                        <img src="images/Staff.png" alt="">
                                        <span _ngcontent-c10="" class="btnClass ng-star-inserted" style=""><i _ngcontent-c10="" aria-hidden="true" class="fa fa-camera"></i></span>
                                    </a>
                                </div>
                                <div class="col-md-10">
                                    <div class="add a1 ">
                                        <div class="row">
                                            <div class="col-md-6 input_box">
                                                <span>First Name *</span>
                                                <input  type="text" name="first_name_parent" placeholder="First Name *" value="{{$parent->first_name}}">
                                                @if ($errors->has('first_name_parent'))
                                                    <div class="text text-danger">
                                                        {{ $errors->first('first_name_parent') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-md-6 input_box">
                                                <span>Last Name *</span>
                                                <input type="text" name="last_name_parent" placeholder="Last Name *" value="{{$parent->last_name}}">
                                                @if ($errors->has('last_name_parent'))
                                                    <div class="text text-danger">
                                                        {{ $errors->first('last_name_parent') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 input_box">
                                                <span>GENDER *</span>
                                                <select name="gender_parent">
                                                    <option>Gender</option>
                                                    <option value="1" @if($parent->gender == 1) selected="selected" @endif>Nam</option>
                                                    <option value="2" @if($parent->gender == 2) selected="selected" @endif>Nữ</option>
                                                </select>
                                                @if ($errors->has('gender_parent'))
                                                    <div class="text text-danger">
                                                        {{ $errors->first('gender_parent') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-md-6 input_box">
                                                <span>RELATION *</span>
                                                <select name="relationship">
                                                    <option>Relationship</option>
                                                    <option value="mother" @if($parent->relationship == "mother") selected="selected" @endif>Mother</option>
                                                    <option value="father" @if($parent->relationship == "father") selected="selected" @endif>Father</option>
                                                    <option value="grandfather" @if($parent->relationship == "grandfather") selected="selected" @endif>Grandfather</option>
                                                    <option value="grandmother" @if($parent->relationship == "grandmother") selected="selected" @endif>Grandmother</option>
                                                    <option value="uncle" @if($parent->relationship == "uncle") selected="selected" @endif>Uncle</option>
                                                    <option value="aunt" @if($parent->relationship == "aunt") selected="selected" @endif>Aunt</option>
                                                    <option value="guardian" @if($parent->relationship == "guardian") selected="selected" @endif>Guardian</option>
                                                </select>
                                                @if ($errors->has('relationship'))
                                                    <div class="text text-danger">
                                                        {{ $errors->first('relationship') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="input_box" style="width: 100%;">
                                            <span>Phone Number *</span>
                                            <input type="text" name="phone_parent" placeholder="Phone Number *" value="{{$parent->phone}}">
                                            @if ($errors->has('phone_parent'))
                                                <div class="text text-danger">
                                                    {{ $errors->first('phone_parent') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="input_box" style="width: 100%;">
                                            <span>E-Mail Address *</span>
                                            <input type="email" name="email_parent" placeholder="E-Mail Address *" value="{{$parent->email}}">
                                            @if ($errors->has('email_parent'))
                                                <div class="text text-danger">
                                                    {{ $errors->first('email_parent') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="input_box" style="width: 100%;">
                                            <span>Note *</span>
                                            <input type="text" name="note_parent" placeholder="Note" value="{{$parent->note}}">
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
                        @endforeach
                    </div>
                </div>
            </div>



            <div class="comment">
                <div class="button" style="text-align: center;">
                    <button type="reset">
                        <span>CANCEL</span>
                    </button>
                    <button class="button2" type="submit" id="submit_button">
                        <span>SAVE</span>
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

        console.log(array);

        $('.tablinks1').click(function(event) {
            if ($(this).hasClass('tablinks1_active')) {
                $(this).removeClass('tablinks1_active');
                var program_pop = $(this).val();
                array.pop(program_pop);
            }else{
                $(this).addClass('tablinks1_active');
                var program_push = $(this).val();
                array.push(program_push);
            }
            console.log(array);
        });

        $('#submit_button').click(function(event) {
            $('#array_programs_new').attr('value', array);
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
        $("#uploadfile").change(function(){
            readURL(this);
        });
    </script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    {{-- finish xu ly anh--}}
@endsection
