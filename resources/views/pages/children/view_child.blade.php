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
                        <li  class="level1"><a href="kids-now">HOME</a></li>
                        <li  class="active1" ><a href="kids-now/children">CHILDREN</a></li>
                        <li class="active1 active-1" style="pointer-events: none"><a href="">VIEW CHILDREN</a></li>
                    </ul>
                </div>
            </div>
        </div>
            <div class="mat-card">
                <div class="mat-content">
                    <button class="accordion add-staff" type="button">View Children</button>
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
                                        <span class="input_box_span_active">First Name *</span>
                                        <input type="text" readonly name="first_name" placeholder="First Name *" value="{{$children_profiles->first_name}}">
                                        @if ($errors->has('first_name'))
                                            <div class="text text-danger">
                                                {{ $errors->first('first_name') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6 input_box">
                                        <span class="input_box_span_active">Last Name *</span>
                                        <input type="text" readonly name="last_name" placeholder="Last Name *" value="{{$children_profiles->last_name}}">
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
                                <span class="input_box_span_active">Birthday *</span>
                                <input type="date" readonly name="birthday" placeholder="Birthday" value="{{$children_profiles->birthday}}">
                                @if ($errors->has('birthday'))
                                    <div class="text text-danger">
                                        {{ $errors->first('birthday') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-3 input_box">
                                <span class="input_box_span_active">Blood Group </span>
                                <select name="blood_group" disabled>
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
                                <span class="input_box_span_active">Gender</span>
                                <select name="gender" disabled>
                                    <option selected value="">Gender</option>
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
                                <span class="input_box_span_active">Date of Joining *</span>
                                <input type="date" readonly name="date_of_joining" placeholder="Date of Joining" value="{{$children_profiles->date_of_joining}}">
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
                                <span class="input_box_span_active">Unique ID *</span>
                                <input type="text" readonly name="unique_id" placeholder="Unique ID *" value="{{$children_profiles->unique_id}}">
                                @if ($errors->has('unique_id'))
                                    <div class="text text-danger">
                                        {{ $errors->first('unique_id') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-3 input_box">
                                <span class="input_box_span_active">Status</span>
                                <select name="status" disabled>
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
                            <div class="col-md-3 input_box">
                                <span class="input_box_span_active">Exist</span>
                                <select name="exist" disabled>
                                    <option value="">Exist</option>
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
                            <span class="input_box_span_active">Residential Address </span>
                            <input type="text" readonly name="address" placeholder="Residential Address" value="{{$children_profiles->address}}">
                            @if ($errors->has('address'))
                                <div class="text text-danger">
                                    {{ $errors->first('address') }}
                                </div>
                            @endif
                        </div>
                        <div class="input_box" style="width: 100%;">
                            <span class="input_box_span_active">Allergies (if any) </span>
                            <input type="text" readonly name="allergies" placeholder="Allergies (if any)" value="{{$children_profiles->allergies}}">
                            @if ($errors->has('allergies'))
                                <div class="text text-danger">
                                    {{ $errors->first('allergies') }}
                                </div>
                            @endif
                        </div>
                        <div class="input_box" style="width: 100%;">
                            <span class="input_box_span_active">Additional Notes </span>
                            <input type="text" readonly name="additional_note" placeholder="Additional Notes" value="{{$children_profiles->additional_note}}">
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
                    <button class="accordion" type="button">Programs</button>
                    <div class="panel">
                        <div _ngcontent-c20="" class="row" style="">
                            <!---->
                            @foreach($programs as $program)
                                <div _ngcontent-c20="" align="center" class="col-xs-6 col-sm-4 col-md-3 col-lg-2 ng-star-inserted" style="padding:10px;cursor:pointer">
                                    <button _ngcontent-c20="" class="btn progBtn limitText bgClass tablinks1 @if(in_array($program->id, $array_programs_choose)) tablinks1_active @endif" style="background-color: transparent; border:1px solid #5363d6;border-radius: 4px; pointer-events: auto" type="button" data-toggle="tooltip" title="{{$program->program_name}}" value="{{$program->id}}">{{$program->program_name}}</button>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>


            <div class="mat-card" style="background-color: #f9f9f9;">
                <div class="mat-content">
                    <button class="accordion" type="button">Parents *</button>
                    <div class="panel" style="background-color: #f9f9f9;margin-bottom: 0;margin: 0 -10px;">
                        @if(isset($parent_profiles_1))
                            <div class="panel-1">
                                <input type="hidden" name="id_parent_profiles_1" value="{{$parent_profiles_1->id}}">
                                <div class="row">
                                    <div class="col-md-2 textera-img">
                                        <a style="cursor: pointer;">
                                            <img src="{{$parent_profiles_1->image ? $parent_profiles_1->image : 'images/Parent.png'}}" alt="" id="demo_image_parent_1" style="height: 100px">
                                            <span _ngcontent-c10="" class="btnClass ng-star-inserted" style=""><i _ngcontent-c10="" aria-hidden="true" class="fa fa-camera"></i></span>
                                            @if ($errors->has('image_parent_1'))
                                                <div class="text text-danger">
                                                    {{ $errors->first('image_parent_1') }}
                                                </div>
                                            @endif
                                        </a>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="add a1 ">
                                            <div class="row">
                                                <div class="col-md-6 input_box">
                                                    <span class="input_box_span_active">First Name *</span>
                                                    <input id="first_name_parent_1" readonly type="text" name="first_name_parent_1" placeholder="First Name *" value="{{$parent_profiles_1->first_name}}">
                                                    @if ($errors->has('first_name_parent_1'))
                                                        <div class="text text-danger">
                                                            {{ $errors->first('first_name_parent_1') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-md-6 input_box">
                                                    <span class="input_box_span_active">Last Name *</span>
                                                    <input id="last_name_parent_1" readonly type="text" name="last_name_parent_1" placeholder="Last Name *" value="{{$parent_profiles_1->last_name}}">
                                                    @if ($errors->has('last_name_parent_1'))
                                                        <div class="text text-danger">
                                                            {{ $errors->first('last_name_parent_1') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 input_box">
                                                    <span class="input_box_span_active">Gender </span>
                                                    <select name="gender_parent_1" disabled>
                                                        <option>Gender</option>
                                                        <option value="1" @if($parent_profiles_1->gender == 1) selected="selected" @endif>Nam</option>
                                                        <option value="2" @if($parent_profiles_1->gender == 2) selected="selected" @endif>Nữ</option>
                                                    </select>
                                                    @if ($errors->has('gender_parent_1'))
                                                        <div class="text text-danger">
                                                            {{ $errors->first('gender_parent_1') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-md-6 input_box">
                                                    <span class="input_box_span_active">Relationship </span>
                                                    <select name="relationship_1" disabled>
                                                        <option>Relationship</option>
                                                        <option value="mother" @if($parent_profiles_1->relationship == "mother") selected="selected" @endif>Mother</option>
                                                        <option value="father" @if($parent_profiles_1->relationship == "father") selected="selected" @endif>Father</option>
                                                        <option value="grandfather" @if($parent_profiles_1->relationship == "grandfather") selected="selected" @endif>Grandfather</option>
                                                        <option value="grandmother" @if($parent_profiles_1->relationship == "grandmother") selected="selected" @endif>Grandmother</option>
                                                        <option value="uncle" @if($parent_profiles_1->relationship == "uncle") selected="selected" @endif>Uncle</option>
                                                        <option value="aunt" @if($parent_profiles_1->relationship == "aunt") selected="selected" @endif>Aunt</option>
                                                        <option value="guardian" @if($parent_profiles_1->relationship == "guardian") selected="selected" @endif>Guardian</option>
                                                    </select>
                                                    @if ($errors->has('relationship_1'))
                                                        <div class="text text-danger">
                                                            {{ $errors->first('relationship_1') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="input_box" style="width: 100%;">
                                                <span class="input_box_span_active">Phone Number *</span>
                                                <input type="text" readonly name="phone_parent_1" placeholder="Phone Number *" value="{{$parent_profiles_1->phone}}">
                                                @if ($errors->has('phone_parent_1'))
                                                    <div class="text text-danger">
                                                        {{ $errors->first('phone_parent_1') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="input_box" style="width: 100%;">
                                                <span class="input_box_span_active">E-Mail Address </span>
                                                <input name="email_parent_1" readonly placeholder="E-Mail Address " value="{{$parent_profiles_1->email}}">
                                                @if ($errors->has('email_parent_1'))
                                                    <div class="text text-danger">
                                                        {{ $errors->first('email_parent_1') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="input_box" style="width: 100%;">
                                                <span class="input_box_span_active">Note </span>
                                                <input type="text" readonly name="note_parent_1" placeholder="Note" value="{{$parent_profiles_1->note}}">
                                                @if ($errors->has('note_parent_1'))
                                                    <div class="text text-danger">
                                                        {{ $errors->first('note_parent_1') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="panel-1">
                                <div class="row">
                                    <div class="col-md-2 textera-img">
                                        <a style="cursor: pointer;">
                                            <img src="images/Parent.png" alt="" id="demo_image_parent_1" style="height: 100px">
                                            <span _ngcontent-c10="" class="btnClass ng-star-inserted" style=""><i _ngcontent-c10="" aria-hidden="true" class="fa fa-camera"></i></span>
                                            @if ($errors->has('image_parent_1'))
                                                <div class="text text-danger">
                                                    {{ $errors->first('image_parent_1') }}
                                                </div>
                                            @endif
                                        </a>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="add a1 ">
                                            <div class="row">
                                                <div class="col-md-6 input_box">
                                                    <span>First Name *</span>
                                                    <input id="first_name_parent_1" readonly type="text" name="first_name_parent_1" placeholder="First Name *" value="{{old('first_name_parent_1')}}">
                                                    @if ($errors->has('first_name_parent_1'))
                                                        <div class="text text-danger">
                                                            {{ $errors->first('first_name_parent_1') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-md-6 input_box">
                                                    <span>Last Name *</span>
                                                    <input id="last_name_parent_1" readonly type="text" name="last_name_parent_1" placeholder="Last Name *" value="{{old('last_name_parent_1')}}">
                                                    @if ($errors->has('last_name_parent_1'))
                                                        <div class="text text-danger">
                                                            {{ $errors->first('last_name_parent_1') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 input_box">
                                                    <span>GENDER *</span>
                                                    <select class="parent_1" name="gender_parent_1" disabled>
                                                        <option value="">Gender</option>
                                                        <option value="1" @if(old('gender_parent_1') == 1) selected="selected" @endif>Nam</option>
                                                        <option value="2" @if(old('gender_parent_1') == 2) selected="selected" @endif>Nữ</option>
                                                    </select>
                                                    @if ($errors->has('gender_parent_1'))
                                                        <div class="text text-danger">
                                                            {{ $errors->first('gender_parent_1') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-md-6 input_box">
                                                    <span>RELATION *</span>
                                                    <select class="parent_1" name="relationship_1" disabled>
                                                        <option value="">Relationship</option>
                                                        <option value="mother" @if(old('relationship_1') == "mother") selected="selected" @endif>Mother</option>
                                                        <option value="father" @if(old('relationship_1') == "father") selected="selected" @endif>Father</option>
                                                        <option value="grandfather" @if(old('relationship_1') == "grandfather") selected="selected" @endif>Grandfather</option>
                                                        <option value="grandmother" @if(old('relationship_1') == "grandmother") selected="selected" @endif>Grandmother</option>
                                                        <option value="uncle" @if(old('relationship_1') == "uncle") selected="selected" @endif>Uncle</option>
                                                        <option value="aunt" @if(old('relationship_1') == "aunt") selected="selected" @endif>Aunt</option>
                                                        <option value="guardian" @if(old('relationship_1') == "guardian") selected="selected" @endif>Guardian</option>
                                                    </select>
                                                    @if ($errors->has('relationship_1'))
                                                        <div class="text text-danger">
                                                            {{ $errors->first('relationship_1') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="input_box" style="width: 100%;">
                                                <span>Phone Number *</span>
                                                <input class="parent_1" readonly type="text" name="phone_parent_1" placeholder="Phone Number *" value="{{old('phone_parent_1')}}">
                                                @if ($errors->has('phone_parent_1'))
                                                    <div class="text text-danger">
                                                        {{ $errors->first('phone_parent_1') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="input_box" style="width: 100%;">
                                                <span>E-Mail Address </span>
                                                <input class="parent_1" readonly name="email_parent_1" placeholder="E-Mail Address " value="{{old('email_parent_1')}}">
                                                @if ($errors->has('email_parent_1'))
                                                    <div class="text text-danger">
                                                        {{ $errors->first('email_parent_1') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="input_box" style="width: 100%;">
                                                <span>Note *</span>
                                                <input class="parent_1" readonly type="text" name="note_parent_1" placeholder="Note" value="{{old('note_parent_1')}}">
                                                @if ($errors->has('note_parent_1'))
                                                    <div class="text text-danger">
                                                        {{ $errors->first('note_parent_1') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(isset($parent_profiles_2))
                            <div class="panel-1">
                                <input type="hidden" name="id_parent_profiles_2" value="{{$parent_profiles_2->id}}">
                                <div class="row">
                                    <div class="col-md-2 textera-img">
                                        <a style="cursor: pointer;">
                                            <img src="{{$parent_profiles_2->image ? $parent_profiles_2->image : 'images/Parent.png'}}" alt="" id="demo_image_parent_2" style="height: 100px">
                                            <span _ngcontent-c10="" class="btnClass ng-star-inserted" style=""><i _ngcontent-c10="" aria-hidden="true" class="fa fa-camera"></i></span>
                                            @if ($errors->has('image_parent_2'))
                                                <div class="text text-danger">
                                                    {{ $errors->first('image_parent_2') }}
                                                </div>
                                            @endif
                                        </a>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="add a1 ">
                                            <div class="row">
                                                <div class="col-md-6 input_box">
                                                    <span class="input_box_span_active">First Name *</span>
                                                    <input id="first_name_parent_2" readonly type="text" name="first_name_parent_2" placeholder="First Name *" value="{{$parent_profiles_2->first_name}}">
                                                    @if ($errors->has('first_name_parent_2'))
                                                        <div class="text text-danger">
                                                            {{ $errors->first('first_name_parent_2') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-md-6 input_box">
                                                    <span class="input_box_span_active">Last Name *</span>
                                                    <input id="last_name_parent_2" readonly type="text" name="last_name_parent_2" placeholder="Last Name *" value="{{$parent_profiles_2->last_name}}">
                                                    @if ($errors->has('last_name_parent_2'))
                                                        <div class="text text-danger">
                                                            {{ $errors->first('last_name_parent_2') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 input_box">
                                                    <span class="input_box_span_active">Gender </span>
                                                    <select name="gender_parent_2" disabled>
                                                        <option>Gender</option>
                                                        <option value="1" @if($parent_profiles_2->gender == 1) selected="selected" @endif>Nam</option>
                                                        <option value="2" @if($parent_profiles_2->gender == 2) selected="selected" @endif>Nữ</option>
                                                    </select>
                                                    @if ($errors->has('gender_parent_2'))
                                                        <div class="text text-danger">
                                                            {{ $errors->first('gender_parent_2') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-md-6 input_box">
                                                    <span class="input_box_span_active">Relationship </span>
                                                    <select name="relationship_2" disabled>
                                                        <option>Relationship</option>
                                                        <option value="mother" @if($parent_profiles_2->relationship == "mother") selected="selected" @endif>Mother</option>
                                                        <option value="father" @if($parent_profiles_2->relationship == "father") selected="selected" @endif>Father</option>
                                                        <option value="grandfather" @if($parent_profiles_2->relationship == "grandfather") selected="selected" @endif>Grandfather</option>
                                                        <option value="grandmother" @if($parent_profiles_2->relationship == "grandmother") selected="selected" @endif>Grandmother</option>
                                                        <option value="uncle" @if($parent_profiles_2->relationship == "uncle") selected="selected" @endif>Uncle</option>
                                                        <option value="aunt" @if($parent_profiles_2->relationship == "aunt") selected="selected" @endif>Aunt</option>
                                                        <option value="guardian" @if($parent_profiles_2->relationship == "guardian") selected="selected" @endif>Guardian</option>
                                                    </select>
                                                    @if ($errors->has('relationship_2'))
                                                        <div class="text text-danger">
                                                            {{ $errors->first('relationship_2') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="input_box" style="width: 100%;">
                                                <span class="input_box_span_active">Phone Number *</span>
                                                <input type="text" readonly name="phone_parent_2" placeholder="Phone Number *" value="{{$parent_profiles_2->phone}}">
                                                @if ($errors->has('phone_parent_2'))
                                                    <div class="text text-danger">
                                                        {{ $errors->first('phone_parent_2') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="input_box" style="width: 100%;">
                                                <span class="input_box_span_active">E-Mail Address </span>
                                                <input name="email_parent_2" readonly placeholder="E-Mail Address " value="{{$parent_profiles_2->email}}">
                                                @if ($errors->has('email_parent_2'))
                                                    <div class="text text-danger">
                                                        {{ $errors->first('email_parent_2') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="input_box" style="width: 100%;">
                                                <span class="input_box_span_active">Note </span>
                                                <input type="text" readonly name="note_parent_2" placeholder="Note" value="{{$parent_profiles_2->note}}">
                                                @if ($errors->has('note_parent_2'))
                                                    <div class="text text-danger">
                                                        {{ $errors->first('note_parent_2') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="panel-1">
                                <div class="row">
                                    <div class="col-md-2 textera-img">
                                        <a style="cursor: pointer;">
                                            <img src="images/Parent.png" alt="" id="demo_image_parent_2" style="height: 100px">
                                            <span _ngcontent-c10="" class="btnClass ng-star-inserted" style=""><i _ngcontent-c10="" aria-hidden="true" class="fa fa-camera"></i></span>
                                            @if ($errors->has('image_parent_2'))
                                                <div class="text text-danger">
                                                    {{ $errors->first('image_parent_2') }}
                                                </div>
                                            @endif
                                        </a>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="add a1 ">
                                            <div class="row">
                                                <div class="col-md-6 input_box">
                                                    <span>First Name *</span>
                                                    <input id="first_name_parent_2" readonly type="text" name="first_name_parent_2" placeholder="First Name *" value="{{old('first_name_parent_2')}}">
                                                    @if ($errors->has('first_name_parent_2'))
                                                        <div class="text text-danger">
                                                            {{ $errors->first('first_name_parent_2') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-md-6 input_box">
                                                    <span>Last Name *</span>
                                                    <input id="last_name_parent_2" readonly type="text" name="last_name_parent_2" placeholder="Last Name *" value="{{old('last_name_parent_2')}}">
                                                    @if ($errors->has('last_name_parent_2'))
                                                        <div class="text text-danger">
                                                            {{ $errors->first('last_name_parent_2') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 input_box">
                                                    <span>GENDER *</span>
                                                    <select class="parent_2" name="gender_parent_2" disabled>
                                                        <option value="">Gender</option>
                                                        <option value="1" @if(old('gender_parent_2') == 1) selected="selected" @endif>Nam</option>
                                                        <option value="2" @if(old('gender_parent_2') == 2) selected="selected" @endif>Nữ</option>
                                                    </select>
                                                    @if ($errors->has('gender_parent_2'))
                                                        <div class="text text-danger">
                                                            {{ $errors->first('gender_parent_2') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-md-6 input_box">
                                                    <span>RELATION *</span>
                                                    <select class="parent_2" name="relationship_2" disabled>
                                                        <option value="">Relationship</option>
                                                        <option value="mother" @if(old('relationship_2') == "mother") selected="selected" @endif>Mother</option>
                                                        <option value="father" @if(old('relationship_2') == "father") selected="selected" @endif>Father</option>
                                                        <option value="grandfather" @if(old('relationship_2') == "grandfather") selected="selected" @endif>Grandfather</option>
                                                        <option value="grandmother" @if(old('relationship_2') == "grandmother") selected="selected" @endif>Grandmother</option>
                                                        <option value="uncle" @if(old('relationship_2') == "uncle") selected="selected" @endif>Uncle</option>
                                                        <option value="aunt" @if(old('relationship_2') == "aunt") selected="selected" @endif>Aunt</option>
                                                        <option value="guardian" @if(old('relationship_2') == "guardian") selected="selected" @endif>Guardian</option>
                                                    </select>
                                                    @if ($errors->has('relationship_2'))
                                                        <div class="text text-danger">
                                                            {{ $errors->first('relationship_2') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="input_box" style="width: 100%;">
                                                <span>Phone Number *</span>
                                                <input class="parent_2" readonly type="text" name="phone_parent_2" placeholder="Phone Number *" value="{{old('phone_parent_2')}}">
                                                @if ($errors->has('phone_parent_2'))
                                                    <div class="text text-danger">
                                                        {{ $errors->first('phone_parent_2') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="input_box" style="width: 100%;">
                                                <span>E-Mail Address </span>
                                                <input class="parent_2" readonly name="email_parent_2" placeholder="E-Mail Address " value="{{old('email_parent_2')}}">
                                                @if ($errors->has('email_parent_2'))
                                                    <div class="text text-danger">
                                                        {{ $errors->first('email_parent_2') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="input_box" style="width: 100%;">
                                                <span>Note *</span>
                                                <input class="parent_2" readonly type="text" name="note_parent_2" placeholder="Note" value="{{old('note_parent_2')}}">
                                                @if ($errors->has('note_parent_2'))
                                                    <div class="text text-danger">
                                                        {{ $errors->first('note_parent_2') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        <div class="icon-plus" title="edit">
            <a href="kids-now/children/edit/{{$children_profiles->id}}">
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

