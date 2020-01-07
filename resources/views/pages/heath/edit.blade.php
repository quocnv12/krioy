@extends('master-layout')
@section('title')
    EDIT Health
@endsection


@section('content')
    <body>

    <section class="page-top container">
        <div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
            <div class="row">
                <ul class="ul-td">
                    <li _ngcontent-c16="" class="level1"><a _ngcontent-c16="">HOME</a></li>
                    <li _ngcontent-c16="" class="active1" style="pointer-events:none"><a _ngcontent-c16="">STAFF PROFILES</a></li>
                    <li _ngcontent-c16="" class="active1 active-1" style="pointer-events:none;"><a _ngcontent-c16="">EDIT STAFF</a></li>
                </ul>
            </div>
        </div>
        <div class="mat-card">
            <form class="" method="POST" action="{{ route('admin.health.getEdit',$health->id) }}">
                @csrf
            <div class="mat-content">
                <button class="accordion add-staff">K5 KHANH Profile</button>
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
                                    <input type="text" value="{{$health->Childrent->first_name}}" name="first_name" placeholder="First Name *">
                                </div>
                                <div class="col-md-6 input_box">
                                    <span>Last Name *</span>
                                    <input type="text" value="{{$health->Childrent->last_name}}"name="last_name" placeholder="Last Name *">
                                </div>
                            </div>
                            <div class="row">
                                <div class="add">
                                    <div class="col-md-6 input_box">
                                        <span>Birthday</span>
                                        <input type="date" value="{{$health->Childrent->birthday}}"name="birthday" placeholder="Phone Number *">
                                    </div>
                                    <div class="col-md-6 input_box">
                                        <span>Gender *</span>
                                        <select>
                                            <option>Gender</option>
                                            <option>Nam</option>
                                            <option>Nữ</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <hr style="margin: 0;">
                <div class="form-group">
                    <label for="price">Sick</label>
                    <input type="text" name="sick"  value="{{$health->sick}}" placeholder="Nhập sick" class="form-control">

                </div>
                <div clas="form-group">
                    <label>Growth</label>
                    <div class="row">

                        <div class="col-sm-6" style="text-align: center; ">
                            <span>Height</span>
                            <input type="text" name="growth_height" value="{{$health->growth_height}}" placeholder="Enter details here *" >
                        </div>
                        <div class="col-sm-6"style="text-align: center; ">
                            <span>Weight</span>
                            <input type="text" name="growth_weight"   value="{{$health->growth_weight}}" placeholder="Enter details here *">
                        </div>


                    </div>
                </div>

                <div class="form-group">
                    <label for="price">medicine</label>
                    <input type="text" name="medicine"  value="{{$health->medicine}}"placeholder="Nhập medicine nếu có" class="form-control">

                </div>

                <div class="form-group">
                    <label for="price">incident</label>
                    <input type="text" name="incident" value="{{$health->incident}}" placeholder="Nhập incident nếu có" class="form-control">

                </div>
                <div class="form-group">
                    <label>Hình ảnh</label>
                    <br>
                    <img src="" class="img-responsive img-rounded" alt="Image" style="width: 150px; height: 200px;">
                    <input type="hidden" name="fImageCurrent" value="">
                    <br>
                    <input type="file" name="image">
                    <div>

                    </div>
                </div>
            </form>
        </div>


        <div class="comment">
            <div class="button" style="text-align: center;">
                <button>
                    <span>CANCEL</span>
                </button>
                <button class="button2">
                    <span>SAVE</span>
                </button>
            </div>
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
@endsection
