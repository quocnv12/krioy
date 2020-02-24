@extends('master-layout')
@section('title')
@lang('kidsnow.staff')
@endsection

@section('content')

<body>
    <section class="page-top container">
        <div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
            <div class="row">
                <ul class="ul-td" style="width: 100%;">
                    <li _ngcontent-c16="" class="level1"><a _ngcontent-c16="" href="kids-now">@lang('kidsnow.home')</a></li>
                    <li _ngcontent-c16="" class="active1"><a _ngcontent-c16="" href="kids-now/staff">@lang('kidsnow.staff_profiles')</a></li>
                    <li _ngcontent-c16="" class="level1" style="pointer-events:none"><a _ngcontent-c16="" href="kids-now/staff/edit">@lang('kidsnow.edit')</a></li>
                </ul>
            </div>
        </div>
        <form style="width: 100%;" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mat-card">
                <div class="mat-content">
                    <button type="button" class="accordion add-staff">@lang('kidsnow.edit_staff')</button>
                    <div class="row">
                        <div class="col-md-2 textera-img">
                            @if($errors->has('image'))
                            <p style="font-size: 12px;font-weight: 100;color:red;font-style: italic;line-height: 25px">*
                                {{ $errors->first('image') }}</p>
                            @endif
                            <input id="img" type="file" name="image" style="display:none" value=""
                                class="form-control hidden" onchange="changeImg(this)">
                            <img id="avatar" class="thumbnail"
                                style="border: 1px solid white;border-radius: 50%;width:150px;height:150px;    margin-top: 35px;"
							src="images/staff/{{ $staff->image }}">
							
                        </div>
                        <div class="col-md-10">
                            <div class="add a1 ">
                                <div class="row">
                                    <div class="col-md-6 input_box">
                                        <span class="input_box_span_active">@lang('kidsnow.first_name') *</span>
                                    <input type="text" name="first_name" value="{{ $staff->first_name }}" placeholder="First name *">
                                        @if($errors->has('first_name'))
                                        <p
                                            style="font-size: 12px;font-weight: 100;color:red;font-style: italic;line-height: 25px">
                                            * {{ $errors->first('first_name') }}</p>
                                        @endif
                                    </div>
                                    <div class="col-md-6 input_box">
                                        <span class="input_box_span_active">@lang('kidsnow.last_name') *</span>
                                        <input type="text" name="last_name"  value="{{ $staff->last_name }}" placeholder="@lang('kidsnow.last_name') *">
                                        @if($errors->has('last_name'))
                                        <p
                                            style="font-size: 12px;font-weight: 100;color:red;font-style: italic;line-height: 25px">
                                            * {{ $errors->first('last_name') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 input_box">
                                        <span class="input_box_span_active">@lang('kidsnow.phone_number') *</span>
                                        <input type="text" name="phone" value="{{ $staff->phone }}" placeholder="@lang('kidsnow.phone_number') *">
                                        @if($errors->has('phone'))
                                        <p
                                            style="font-size: 12px;font-weight: 100;color:red;font-style: italic;line-height: 25px">
                                            * {{ $errors->first('phone') }}</p>
                                        @endif
                                    </div>
                                    <div class="col-md-6 input_box">
                                        <span class="input_box_span_active">@lang('kidsnow.gender') *</span>
                                        <select style="color: #614545;" name="gender">
											<option disabled  selected hidden>@lang('kidsnow.gender')</option>
                                            <option {{ $staff->gender==1 ? 'selected' : ''  }}  value="1">Male</option>
                                            <option {{ $staff->gender==0 ? 'selected' : ''  }} value="0">Female</option>
                                        </select>
                                        @if($errors->has('gender'))
                                        <p
                                            style="font-size: 12px;font-weight: 100;color:red;font-style: italic;line-height: 25px">
                                            * {{ $errors->first('gender') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="input_box" style="width: 100%;">
                                    <span class="input_box_span_active">@lang('kidsnow.email_address') *</span>
                                    <input type="email" name="email" value="{{ $staff->email }}" placeholder="@lang('kidsnow.email_address') *">
                                    @if($errors->has('email'))
                                    <p
                                        style="font-size: 12px;font-weight: 100;color:red;font-style: italic;line-height: 25px">
                                        * {{ $errors->first('email') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="add">
                        <div class="input_box" style="width: 100%;">
                            <span class="input_box_span_active">@lang('kidsnow.residential_address') *</span>
                            <input type="text" name="address" value="{{ $staff->address }}" placeholder="@lang('kidsnow.residential_address') *">
                            @if($errors->has('address'))
                            <p style="font-size: 12px;font-weight: 100;color:red;font-style: italic;line-height: 25px">*
                                {{ $errors->first('address') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="add">
                        <div class="row">
                            <div class="col-md-4 input_box">
                                <span class="input_box_span_active">@lang('kidsnow.birthday') *</span>
                                <input style="color: #614545;" type="date" value="{{ $staff->birthday }}" name="date_birthday" placeholder="@lang('kidsnow.birthday') *">
                                @if($errors->has('date_birthday'))
                                <p
                                    style="font-size: 12px;font-weight: 100;color:red;font-style: italic;line-height: 25px">
                                    * {{ $errors->first('date_birthday') }}</p>
                                @endif
                            </div>
                            <div class="col-md-4 input_box">
                                <span class="input_box_span_active">@lang('kidsnow.Blood_group') *</span>
                                <select style="color: #614545;" name="blood_group">
                                    <option value="0" disabled  selected hidden>@lang('kidsnow.Blood_group')</option>
                                    <option {{ $staff->blood_group=='A+' ? 'selected' : ''  }} value="A+">A+</option>
                                    <option {{ $staff->blood_group=='A-' ? 'selected' : ''  }} value="A-">A-</option>
                                    <option {{ $staff->blood_group=='B+' ? 'selected' : ''  }} value="B+">B+</option>
                                    <option {{ $staff->blood_group=='B-' ? 'selected' : ''  }} value="B-">B-</option>
                                    <option {{ $staff->blood_group=='AB+' ? 'selected' : ''  }} value="AB+">AB+</option>
                                    <option {{ $staff->blood_group=='AB-' ? 'selected' : ''  }} value="AB-">AB-</option>
                                    <option {{ $staff->blood_group=='O+' ? 'selected' : ''  }} value="O+">O+</option>
                                    <option {{ $staff->blood_group=='O-' ? 'selected' : ''  }} value="O-">O-</option>
                                </select>
                                @if($errors->has('blood_group'))
                                <p
                                    style="font-size: 12px;font-weight: 100;color:red;font-style: italic;line-height: 25px">
                                    * {{ $errors->first('blood_group') }}</p>
                                @endif
                            </div>
                            <div class="col-md-4 input_box">
                                <span class="input_box_span_active">@lang('kidsnow.date_of_joining') *</span>
                                <input style="color: #614545;" type="date" value="{{ $staff->date_of_joining }}" name="date_of_joining"
                                    placeholder="@lang('kidsnow.date_of_joining') *">
                                @if($errors->has('date_of_joining'))
                                <p
                                    style="font-size: 12px;font-weight: 100;color:red;font-style: italic;line-height: 25px">
                                    * {{ $errors->first('date_of_joining') }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mat-card">
                <div class="mat-content">
                    <button type="button" class="accordion">@lang('kidsnow.programs')</button>
                    <div class="panel">
                        <div _ngcontent-c20="" class="row" style="">
                            @foreach ($programs as $item)
                            <div _ngcontent-c20="" align="center"
                                class="col-xs-6 col-sm-4 col-md-3 col-lg-3 ng-star-inserted"
                                style="padding:10px;cursor:pointer;">
                                <button _ngcontent-c20="" type="button" class="btn progBtn limitText bgClass tablinks1 {{ $programStaff->contains($item->id) ? 'tablinks1_active' :'' }}"
                                    title="{{ $item->program_name }}" value="{{ $item->id }}"
                                    style="background-color:transparent;border:1px solid #5363d6;border-radius: 4px; width: 100%">{{ $item->program_name }}
                                </button>
                                
                            </div>
                            @endforeach
                        <input id="array_programs" type="hidden" value="{{ implode(',',$programStaffs) }}" name="id_program">
                        </div>
                    </div>
                </div>
            </div>

            <div class="mat-card">
                <div class="mat-content">
                    <button type="button" type="button" class="accordion accordion1 clearfix">
                        <p style="float: left;">@lang('kidsnow.permissions')</p>
                        {{-- <a href="select_child.blade.php" style="float: right;text-align: right">
                        <p
                            style="color: #fff;border: 1px solid #ff4081;padding: 5px;margin: 5px 0;background: #ff4081;border-radius: 5px;text-decoration: none;">
                            @lang('kidsnow.select')</p>
                    </a> --}}
                    </button>
                    <div class="panel">
                        <div _ngcontent-c20="" class="row">
                            @foreach ($roles as $item)
                            <div _ngcontent-c20="" align="center"
                                class="col-xs-3 col-sm-4 col-md-3 col-lg-3 ng-star-inserted"
                                style="padding:10px;cursor:pointer">
                                <button _ngcontent-c20="" type="button" class="btn progBtn limitText bgClass tablinks {{ $roleStaff->contains($item->id) ? 'tablinks_active' :'' }}"
                                    title="{{ $item->name }}" value="{{ $item->id }}"
                                    style="background-color:transparent;border:1px solid #5363d6;border-radius: 4px; width: 100%">{{ $item->name }}
                                </button>
                            </div>
                            @endforeach
                            <input id="array_permissions" type="hidden" value="{{ implode(',',$roleStaffs) }}" name="id_permissions">
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="comment">
                <div class="button" style="text-align: center;">
                   <a href="kids-now/staff"> <button type="button"><span>@lang('kidsnow.cancel')</span></button></a>
                    <button class="button2"><span>@lang('kidsnow.save')</span></button>
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
        acc[i].addEventListener("click", function () {
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
   var array = $('#array_programs').val().split(',');
    $('.tablinks1').click(function (event) {
        if  ($(this).hasClass('tablinks1_active')) {
            $(this).removeClass('tablinks1_active');
            var program_pop = $(this).val();
            array.splice(array.indexOf(program_pop),1);
        } else {
            $(this).addClass('tablinks1_active');
            var program_push = $(this).val();
            array.push(program_push);
        }
        $('#array_programs').attr('value', array);
    });

</script>

<script type="text/javascript">
    var arrays = $('#array_permissions').val().split(',');
     $('.tablinks').click(function (event) {
         if ($(this).hasClass('tablinks_active')) {
             $(this).removeClass('tablinks_active');
             var program_pop = $(this).val();
             arrays.splice(arrays.indexOf(program_pop),1);
         } else {
             $(this).addClass('tablinks_active');
             var program_push = $(this).val();
             arrays.push(program_push);
         }
         $('#array_permissions').attr('value', arrays);
     });
 </script>
 

<script type="text/javascript">
    $('.input_box input').focus(function (event) {
        $(this).siblings('span').addClass('input_box_span_active');
    });
    $('.input_box input').blur(function (event) {
        if ($(this).val() == '') {
            $(this).siblings('span').removeClass('input_box_span_active');
        }
    });

</script>
<script type="text/javascript">
    $('.input_box select').focus(function (event) {
        $(this).siblings('span').addClass('input_box_span_active');
    });
    $('.input_box select').blur(function (event) {
        if ($(this).val() == '') {
            $(this).siblings('span').removeClass('input_box_span_active');
        }
    });

</script>

<script>
    function changeImg(input) {
        //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            //Sự kiện file đã được load vào website
            reader.onload = function (e) {
                //Thay đổi đường dẫn ảnh
                $('#avatar').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(document).ready(function () {
        $('#avatar').click(function () {
            $('#img').click();
        });

        $('.accordion').click()
    });

</script>
@endsection
