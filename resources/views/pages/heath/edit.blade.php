@extends('master-layout')
@section('title')
    EDIT Health
@endsection


@section('content')
    <body>

    <section class="page-top container">
        <div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
            <div class="row">
                <ul class="ul-td" style="width: 100%;">
                    <li ngcontent-c16="" class="level1"><a ngcontent-c16="">HOME</a></li>
                    <li ngcontent-c16="" class="active1" style="pointer-events:none"><a ngcontent-c16="">HEALTH PROFILES</a></li>
                    <li ngcontent-c16="" class="active1 active-1" style="pointer-events:none;"><a ngcontent-c16="">EDIT HEALTH</a></li>
                </ul>
            </div>
        </div>
        <div class="mat-card">
            <form method="post" action="" >
                @csrf
                <div class="mat-content">
                    <button class="accordion add-staff">K5 KHANH Profile</button>
                    <div class="row">
                        <div class="col-md-2 textera-img">
                            <a href="#">
                                <img src="images/{{$childrent->image}}" alt="" style="width: 100px; height: 100px">
                                <span ngcontent-c10="" class="btnClass ng-star-inserted" style=""><i ngcontent-c10="" aria-hidden="true" class="fa fa-camera"></i></span>
                            </a>
                        </div>
                        <div class="col-md-10">
                            <div class="add a1 ">
                                <div class="row">
                                    <div class="col-md-6 input_box">
                                        <span>First Name *</span>
                                        <input type="text" value="{{$childrent->first_name}}" name="first_name" placeholder="First Name *">
                                    </div>
                                    <div class="col-md-6 input_box">
                                        <span>Last Name *</span>
                                        <input type="text" value="{{$childrent->last_name}}"name="last_name" placeholder="Last Name *">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 input_box">
                                        <span>Birthday</span>
                                        <input type="date" value="{{$childrent->birthday}}"name="birthday" placeholder="Phone Number *">
                                    </div>
                                    <div class="col-md-6 input_box">
                                        <span >Sick</span>
                                        <input type="text" name="sick"  value="{{$health->sick}}" placeholder="Nhập sick">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr style="margin: 20px 0;">
                    <div class="add a1 ">
                        <div class="row">
                            <div class="col-md-2" style="text-align: center;">
                                <label style="margin:10px;">Growth</label>
                            </div>
                            <div class="col-sm-5 input_box" style="text-align: center; ">
                                <span>Height</span>
                                <input type="text" name="growth_height" value="{{$health->growth_height}}" placeholder="Enter details here *" >
                            </div>
                            <div class="col-md-5 input_box"style="text-align: center; ">
                                <span>Weight</span>
                                <input type="text" name="growth_weight"   value="{{$health->growth_weight}}" placeholder="Enter details here *">
                            </div>
                        </div>
                        <div class="add a1">
                            <div class="row">
                                <div class="col-md-6 input_box">
                                    <span>medicine</span>
                                    <input type="text" name="medicine"  value="{{$health->medicine}}"placeholder="Nhập medicine nếu có">
                                </div>
                                <div class="col-md-6 input_box">
                                    <span>incident</span>
                                    <input type="text" name="incident" value="{{$health->incident}}" placeholder="Nhập incident nếu có">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Ảnh sản phẩm</label>

                                    <input id="img" type="file" name="img" value="{{ old('img') }}" class="hidden"
                                           onchange="changeImg(this)" style="border-bottom: none;">
                                    <img id="avatar" class="thumbnail" width="150px" height="150px" src="images/{{$health->image}}" >
                                </div>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
        <div class="comment">
            <div class="button" style="text-align: center;">
                <button type="submit" class="btn btn-success">Sửa</button>
                <button type="reset" class="btn btn-primary">Nhập Lại</button>
                <button class="btn btn-secondary" type="button">Cancel</button>
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
    <script>
        function changeImg(input){
            //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
            if(input.files && input.files[0]){
                var reader = new FileReader();
                //Sự kiện file đã được load vào website
                reader.onload = function(e){
                    //Thay đổi đường dẫn ảnh
                    $('#avatar').attr('src',e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(document).ready(function() {
            $('#avatar').click(function(){
                $('#img').click();
            });
        });
    </script>


@endsection