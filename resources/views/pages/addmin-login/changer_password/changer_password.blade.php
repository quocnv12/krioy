@extends('master-layout')
@section('title')
@lang('kidsnow.changer_password')
@endsection
@section('css')

{{-- <link href="admin-template/assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" /> --}}
<link href="admin-template/assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css"
    media="screen" />
<link href="admin-template/assets/plugins/jquery-datatable/css/jquery.dataTables.css" rel="stylesheet"
    type="text/css" />
<link href="admin-template/assets/plugins/datatables-responsive/css/datatables.responsive.css" rel="stylesheet"
    type="text/css" media="screen" />
<link href="admin-template/assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen" />
{{-- <link href="admin-template/assets/plugins/bootstrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> --}}
<link href="admin-template/assets/plugins/bootstrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="admin-template/assets/plugins/animate.min.css" rel="stylesheet" type="text/css" />
<link href="admin-template/assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" />
<link href="admin-template/webarch/css/webarch.css" rel="stylesheet" type="text/css" />

@endsection
@section('content')

<body>
    <section class="page-top container">
        <div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
            <div class="row">
                <div class="col-md-6">
                    <ul class="ul-td">
                        <li _ngcontent-c16="" class="level1"><a href="kids-now">@lang('kidsnow.home')</a></li>
                        <li _ngcontent-c16="" class="active1" style="pointer-events:none"><a
                                href="kids-now/food">@lang('kidsnow.changer_password')</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <form method="post" action="kids-now/update-password" style="width: 100%;">
                @csrf
                <div class="mat-card" style="">
                    <div class="mat-content">
                        <h3 style="text-align:center;margin-bottom:10px">@lang('kidsnow.changer_password')</h3>
                        @if (session('thongbao'))
                        <p
                            style="font-size: 12px;font-weight: 100;color:red;font-style: italic;line-height: 25px;text-align: left;;width:80%">
                            * {{ session('thongbao') }}</p>
                        @endif

                        <div class="form-group" style="position: relative;">
                            <label for="email">@lang('kidsnow.changer_password_old'):</label>
                            <input type="password" class="form-control" placeholder="@lang('kidsnow.changer_password_old')"
                                name="password_old">
                            <a style="position: absolute;top: 15%;right: -20px;" href="javascript:;void(0)"><i
                                    class="fa fa-eye"></i></a>

                        </div>
                        @if (session('thongbao1'))
                        <p
                            style="font-size: 12px;font-weight: 100;color:red;font-style: italic;line-height: 25px;text-align: left;;width:80%">
                            * {{ session('thongbao1') }}</p>
                        @endif
                        @if ($errors->has('password_old'))
                        <p
                            style="font-size: 12px;font-weight: 100;color:red;font-style: italic;line-height: 25px;text-align: left;;width:80%">
                            * {{ $errors->first('password_old') }}</p>
                        @endif
                        <div class="form-group" style="position: relative;">
                            <label for="pwd">@lang('kidsnow.changer_password_new'):</label>
                            <input type="password" class="form-control" placeholder="@lang('kidsnow.changer_password_new')"
                                name="password">
                            <a style="position: absolute;top: 15%;right: -20px;" href="javascript:;void(0)"><i
                                    class="fa fa-eye"></i></a>

                        </div>
                        @if ($errors->has('password'))
                        <p
                            style="font-size: 12px;font-weight: 100;color:red;font-style: italic;line-height: 25px;text-align: left;;width:80%">
                            * {{ $errors->first('password') }}</p>
                        @endif
                        <div class="form-group" style="position: relative;">
                            <label for="pwds">@lang('kidsnow.confirm_changer_password'):</label>
                            <input type="password" class="form-control" placeholder="@lang('kidsnow.confirm_changer_password')"
                                name="password_confirmation">
                            <a style="position: absolute;top: 15%;right: -20px;" href="javascript:;void(0)"><i
                                    class="fa fa-eye"></i></a>

                        </div>
                        @if ($errors->has('password_confirmation'))
                        <p
                            style="font-size: 12px;font-weight: 100;color:red;font-style: italic;line-height: 25px;text-align: left;;width:80%">
                            * {{ $errors->first('password_confirmation') }}</p>
                        @endif
                        <button type="submit" class="btn btn-primary">@lang('kidsnow.save')</button>
                        <button type="button" class="btn btn-primary"><a style="color:white"
                                href="kids-now">@lang('kidsnow.cancel')</a></button>
                    </div>
                </div>
            </form>
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
    $(function () {
        $(".form-group a").click(function () {
            let $this = $(this);
            if ($this.hasClass('active')) {
                $this.parents('.form-group').find('input').attr('type', 'password');
                $this.removeClass('active');
            } else {
                $this.parents('.form-group').find('input').attr('type', 'text');
                $this.addClass('active');
            }

        });
    });

</script>
@endsection
