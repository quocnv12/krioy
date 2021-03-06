@extends('master-layout')
@section('title')
@lang('kidsnow.attendance')
@endsection
@section('content')

@section('css')

    {{-- <link href="admin-template/assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" /> --}}
    <link href="admin-template/assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="admin-template/assets/plugins/jquery-datatable/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
    <link href="admin-template/assets/plugins/datatables-responsive/css/datatables.responsive.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="admin-template/assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen" />
    {{-- <link href="admin-template/assets/plugins/bootstrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> --}}
    <link href="admin-template/assets/plugins/bootstrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="admin-template/assets/plugins/animate.min.css" rel="stylesheet" type="text/css" />
    <link href="admin-template/assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" />
    <link href="admin-template/webarch/css/webarch.css" rel="stylesheet" type="text/css" />

@endsection
<body>
<section class="page-top container">
    <div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
        <div class="row">
            <ul class="ul-td" style="width:100%">
                <li  class="level1"><a href="kids-now">@lang('kidsnow.home')</a></li>
                <li class="active1" style="" ><a href="kids-now/attendance">@lang('kidsnow.attendance')</a></li>
                <li class="active1 active-1" style="pointer-events: none" ><a href="">Danh sách</a></li>
            </ul>
        </div>
    </div>
    @if (session('thongbao'))
        <p style="font-size: 12px;margin-left:11px;font-weight: 100;color:#0D1CE9;font-style: italic;line-height: 25px;margin-top:10px;">{{ session('thongbao') }} </p>
    @endif
    @if (session('delete'))
        <p style="font-size: 12px;margin-left:11px;font-weight: 100;color:red;font-style: italic;line-height: 25px;margin-top:10px;"> {{ session('delete') }} </p>
    @endif
    <div class="mat-card">
        <div class="row-fluid">
            <div class="span12">
                <div class="grid simple ">
                    <div class="grid-title">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>@lang('kidsnow.attendance')</h4>
                            </div>
                            <form action="{{route('attendance.list')}}" method="get" style="display: contents">
                                <div class="col-md-6" style="display: flex; justify-content: flex-end; align-items: center">
                                    <span style="font-weight: bold">@lang('kidsnow.attendance_choose')</span>&nbsp;&nbsp;:&nbsp;&nbsp;
                                    <select name="program" id="program">
                                    @if(empty($id_program))
                                        @foreach($programs as $item)
                                            <option value="{{$item->id}}" >
                                                {{$item->program_name}}</option>
                                        @endforeach
                                    @else
                                        @foreach($programs as $item)
                                            <option value="{{$item->id}}" @if($item->id == $id_program) selected @endif >
                                                {{$item->program_name}}</option>
                                        @endforeach
                                    @endif
                                    </select>
                                    &nbsp;&nbsp;-&nbsp;&nbsp;
                                    <select name="day" id="day">
                                    @if(empty($day))
                                        @for($i = 01; $i <= 31; $i++)
                                            <option value="{{$i}}" @if(now()->day == $i) selected @endif >{{$i}}</option>
                                        @endfor
                                    @else
                                        @for($i = 01; $i <= 31; $i++)
                                            <option value="{{$i}}" @if($i == $day) selected @endif >{{$i}}</option>
                                        @endfor
                                    @endif
                                    </select>
                                    &nbsp;&nbsp;-&nbsp;&nbsp;
                                    <select name="month" id="month" >
                                    @if(empty($month))
                                        @for($i = 01; $i <= 12; $i++)
                                            <option value="{{$i}}" @if(now()->month == $i) selected @endif >{{$i}}</option>
                                        @endfor
                                    @else
                                        @for($i = 01; $i <= 12; $i++)
                                            <option value="{{$i}}" @if($i == $month) selected @endif >{{$i}}</option>
                                        @endfor
                                    @endif                                       
                                    </select>
                                    &nbsp;&nbsp;-&nbsp;&nbsp;
                                    <select name="year" id="year">
                                        @for($i = 2015; $i <= 2040; $i++)
                                            <option value="{{$i}}" @if(now()->year == $i) selected @endif>{{$i}}</option>
                                        @endfor
                                    </select>
                                    &nbsp;&nbsp;
                                    <button class="btn btn-info btn-sm" type="submit">GO</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="grid-body ">
                        <table class="table table-striped" id="example">
                            <thead>
                            <tr>
                                <th style="width:20%">@lang('kidsnow.attendance_children_name')</th>
                                <th style="width:10%">@lang('kidsnow.attendance_children_in')</th>
                                <th style="width:10%">@lang('kidsnow.attendance_children_out')</th>
                                <th style="width:20%">@lang('kidsnow.attendance_children_absent')</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if(isset($child_atd))
                                    @foreach ($child_atd as $key=>$item)
                                        <tr class="odd gradeX">
                                            <td style="text-align:center;text-transform:capitalize">{{ $item->atd_chil->first_name}} {{ $item->atd_chil->last_name}}</td>
                                            <td style="text-align:center;text-transform:capitalize">
                                                @if($item->status == 3)
                                                    {{'...'}}
                                                @else
                                                    {{$item->in}}
                                                @endif
                                            </td>
                                            <td style="text-align:center;text-transform:capitalize">
                                                @if($item->status == 3)
                                                    {{'...'}}
                                                @else
                                                    {{$item->out}}
                                                @endif
                                            </td>
                                            <td style="text-align:center;text-transform:capitalize">
                                                @if($item->status == 3)
                                                    {{$item->absent}}
                                                @else
                                                    {{'...'}}
                                                @endif
                                            </td>
                                            
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
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
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>

    <!-- jQuery easing -->
    <script src="js/jquery.easing.1.3.min.js"></script>

    <!-- Main Script -->
    <script src="js/main.js"></script>

    <script type="text/javascript">

        function del() {
            return confirm("Bạn muốn xóa danh mục ?");
        }
    </script>


    <script src="admin-template/assets/plugins/pace/pace.min.js" type="text/javascript"></script>
    <script src="admin-template/assets/plugins/jquery/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="admin-template/assets/plugins/bootstrapv3/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="admin-template/assets/plugins/jquery-block-ui/jqueryblockui.min.js" type="text/javascript"></script>
    <script src="admin-template/assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
    <script src="admin-template/assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script>
    <script src="admin-template/assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
    <script src="admin-template/assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="admin-template/assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
    <script src="admin-template/webarch/js/webarch.js" type="text/javascript"></script>
    <script src="admin-template/assets/js/chat.js" type="text/javascript"></script>
    <script src="admin-template/assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
    <script src="admin-template/assets/plugins/jquery-datatable/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="admin-template/assets/plugins/jquery-datatable/extra/js/dataTables.tableTools.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="admin-template/assets/plugins/datatables-responsive/js/datatables.responsive.js"></script>
    <script type="text/javascript" src="admin-template/assets/plugins/datatables-responsive/js/lodash.min.js"></script>
    <script src="admin-template/assets/js/datatables.js" type="text/javascript"></script>
@endsection
