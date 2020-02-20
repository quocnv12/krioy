@extends('master-layout')
@section('title')
    VIEW Children
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
                        <li class="active1 active-1" style="pointer-events: none"><a href="">VIEW CHILDREN</a></li>
                    </ul>
                </div>
            </div>
        </div>
            <div class="mat-card">
                <div class="mat-content">
                    <button class="accordion add-staff" type="button">@lang('kidsnow.children.view_children')</button>
                    <div class="row">
                        <div class="col-md-2 textera-img">
                            <a style="cursor: pointer;">
                                <img src="{{$children_profiles->image ? $children_profiles->image : 'images/Child.png'}}" alt="" id="demo_image" style="height: 100px">
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
                                        <input type="text" readonly name="first_name" placeholder="@lang('kidsnow.children.first_name') *" value="{{$children_profiles->first_name}}">
                                        @if ($errors->has('first_name'))
                                            <div class="text text-danger">
                                                {{ $errors->first('first_name') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6 input_box">
                                        <span class="input_box_span_active">@lang('kidsnow.children.last_name') *</span>
                                        <input type="text" readonly name="last_name" placeholder="@lang('kidsnow.children.last_name') *" value="{{$children_profiles->last_name}}">
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
                                <input type="date" readonly name="birthday" placeholder="@lang('kidsnow.children.birthday')" value="{{$children_profiles->birthday}}">
                                @if ($errors->has('birthday'))
                                    <div class="text text-danger">
                                        {{ $errors->first('birthday') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-3 input_box">
                                <span class="input_box_span_active">@lang('kidsnow.children.blood_group') </span>
                                <select name="blood_group" disabled>
                                    <option value="">@lang('kidsnow.children.blood_group')</option>
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
                                <span class="input_box_span_active">@lang('kidsnow.children.gender')</span>
                                <select name="gender" disabled>
                                    <option selected value="">@lang('kidsnow.children.gender')</option>
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
                                <span class="input_box_span_active">@lang('kidsnow.children.date_of_joining') *</span>
                                <input type="date" readonly name="date_of_joining" placeholder="@lang('kidsnow.children.date_of_joining')" value="{{$children_profiles->date_of_joining}}">
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
                                <input type="text" readonly name="unique_id" placeholder="@lang('kidsnow.children.unique_id') *" value="{{$children_profiles->unique_id}}">
                                @if ($errors->has('unique_id'))
                                    <div class="text text-danger">
                                        {{ $errors->first('unique_id') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-3 input_box">
                                <span class="input_box_span_active">@lang('kidsnow.children.status')</span>
                                <select name="status" disabled>
                                    <option value="">@lang('kidsnow.children.status')</option>
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
                            <div class="col-md-3 input_box">
                                <span class="input_box_span_active">@lang('kidsnow.children.exist')</span>
                                <select name="exist" disabled>
                                    <option value="">@lang('kidsnow.children.exist')</option>
                                    <option value="1" @if($children_profiles->exist == 1) selected="selected" @endif>Yes</option>
                                    <option value="0" @if($children_profiles->exist == 1) selected="selected" @endif>No</option>
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
                            <input type="text" readonly name="address" placeholder="@lang('kidsnow.children.residential_address')" value="{{$children_profiles->address}}">
                            @if ($errors->has('address'))
                                <div class="text text-danger">
                                    {{ $errors->first('address') }}
                                </div>
                            @endif
                        </div>
                        <div class="input_box" style="width: 100%;">
                            <span class="input_box_span_active">@lang('kidsnow.children.allergies') </span>
                            <input type="text" readonly name="allergies" placeholder="@lang('kidsnow.children.allergies')" value="{{$children_profiles->allergies}}">
                            @if ($errors->has('allergies'))
                                <div class="text text-danger">
                                    {{ $errors->first('allergies') }}
                                </div>
                            @endif
                        </div>
                        <div class="input_box" style="width: 100%;">
                            <span class="input_box_span_active">@lang('kidsnow.children.additional_notes') </span>
                            <input type="text" readonly name="additional_note" placeholder="@lang('kidsnow.children.additional_notes')" value="{{$children_profiles->additional_note}}">
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
                                <div _ngcontent-c20="" align="center" class="col-xs-6 col-sm-4 col-md-3 col-lg-3 ng-star-inserted" style="padding:10px;cursor:pointer;">
                                    <button _ngcontent-c20="" class="btn progBtn limitText bgClass tablinks1 @if(in_array($program->id, $array_programs_choose)) tablinks1_active @endif" style="background-color: transparent; border:1px solid #5363d6;border-radius: 4px; pointer-events: auto; width: 100%" type="button" data-toggle="tooltip" title="{{$program->program_name}}" value="{{$program->id}}">{{$program->program_name}}</button>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>


            <div class="mat-card" style="background-color: #f9f9f9;">
                <div class="mat-content">
                    <button class="accordion" type="button">@lang('kidsnow.children.parents') *</button>
                    <div class="panel" style="background-color: #f9f9f9;margin-bottom: 0;margin: 0 -10px;">
                        <div class="panel-1">
                            <input type="hidden" name="id_parent_profiles_1" value="{{$parent_profiles->id}}">
                            <div class="row">
                                <div class="col-md-2 textera-img">
                                    <a style="cursor: pointer;">
                                        <img src="{{$parent_profiles->image ? $parent_profiles->image : 'images/Parent.png'}}" alt="" id="demo_image_parent_1" style="height: 100px">
                                        <span _ngcontent-c10="" class="btnClass ng-star-inserted" style=""><i _ngcontent-c10="" aria-hidden="true" class="fa fa-camera"></i></span>
                                    </a>
                                </div>
                                <div class="col-md-10">
                                    <div class="add a1 ">
                                        <div class="row">
                                            <div class="col-md-6 input_box">
                                                <span class="input_box_span_active">@lang('kidsnow.children.first_name') *</span>
                                                <input id="first_name_parent" readonly type="text" name="first_name_parent" placeholder="@lang('kidsnow.children.first_name') *" value="{{$parent_profiles->first_name}}">
                                            </div>
                                            <div class="col-md-6 input_box">
                                                <span class="input_box_span_active">@lang('kidsnow.children.last_name') *</span>
                                                <input id="last_name_parent" readonly type="text" name="last_name_parent" placeholder="@lang('kidsnow.children.last_name') *" value="{{$parent_profiles->last_name}}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 input_box">
                                                <span class="input_box_span_active">@lang('kidsnow.children.gender') </span>
                                                <select name="gender_parent" disabled>
                                                    <option>@lang('kidsnow.children.gender')</option>
                                                    <option value="1" @if($parent_profiles->gender == 1) selected="selected" @endif>Nam</option>
                                                    <option value="2" @if($parent_profiles->gender == 2) selected="selected" @endif>Nữ</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="input_box" style="width: 100%;">
                                            <span class="input_box_span_active">Main Phone Number *</span>
                                            <input type="text" readonly name="main_phone_parent" placeholder="Main Phone Number *" value="{{$parent_profiles->main_phone}}">
                                        </div>
                                        <div class="input_box" style="width: 100%;">
                                            <span class="input_box_span_active">Extra Phone Number *</span>
                                            <input type="text" readonly name="extra_phone_parent" placeholder="Extra Phone Number *" value="{{$parent_profiles->extra_phone}}">
                                        </div>
                                        <div class="input_box" style="width: 100%;">
                                            <span class="input_box_span_active">@lang('kidsnow.children.email') </span>
                                            <input name="email_parent" readonly placeholder="@lang('kidsnow.children.email') " value="{{$parent_profiles->email}}">
                                        </div>
                                        <div class="input_box" style="width: 100%;">
                                            <span class="input_box_span_active">@lang('kidsnow.children.email') </span>
                                            <input type="text" readonly name="note_parent" placeholder="@lang('kidsnow.children.note')" value="{{$parent_profiles->note}}">
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
                <button class="button2" onclick="goBack()">
                    <span>GO BACK</span>
                </button>
            </div>
        </div>
        <div class="icon-plus" title="edit">
            <a href="{{route('admin.children.edit',['id'=>$children_profiles->id])}}">
                <i class="fa fa-edit"></i>
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

        $('.accordion').click()
    </script>
@endsection

