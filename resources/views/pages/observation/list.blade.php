@extends('master-layout')
@section('title')
    Observations
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
                <li  class="level1"><a href="kids-now">Home</a></li>
                <li  class="active-1" style="pointer-events: none"><a href="">Observations</a></li>
            </ul>
        </div>
    </div>
    <div class="mat-card">
        <div class="row-fluid">
            <div class="span12">
                <div class="grid simple ">
                    <div class="grid-title">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>@lang('kidsnow.observations.observations')</h4>
                            </div>
                            {{-- <div style="text-align:right;padding-right:22px" class="col-md-6">
                                <a style="margin:0px;" href="{{ route('menu-food-name-add') }}" class="btn btn-success btn-cons"" title="Add Food Name"><i style="" class="fa fa-plus-circle"></i> Add</a>
                            </div> --}}
                            <form action="{{route('admin.observations.list')}}" method="get" style="display: contents">

                                <div class="col-md-6" style="display: flex; justify-content: flex-end; align-items: center">
                                    <span style="font-weight: bold">@lang('kidsnow.observations.seminar')</span>&nbsp;&nbsp;:&nbsp;&nbsp;
                                    <select name="month" id="month" >
                                        <option value="">@lang('kidsnow.observations.choose_month')</option>
                                        <option value="Jan">@lang('kidsnow.january')</option>
                                        <option value="Feb">@lang('kidsnow.february')</option>
                                        <option value="Mar">@lang('kidsnow.march')</option>
                                        <option value="Apr">@lang('kidsnow.april')</option>
                                        <option value="May">@lang('kidsnow.may')</option>
                                        <option value="Jun">@lang('kidsnow.june')</option>
                                        <option value="Jul">@lang('kidsnow.july')</option>
                                        <option value="Aug">@lang('kidsnow.august')</option>
                                        <option value="Sep">@lang('kidsnow.september')</option>
                                        <option value="Oct">@lang('kidsnow.october')</option>
                                        <option value="Nov">@lang('kidsnow.november')</option>
                                        <option value="Dec">@lang('kidsnow.december')</option>
                                    </select>
                                    &nbsp;&nbsp;-&nbsp;&nbsp;
                                    <select name="year" id="year">
                                        @for($i = 2020; $i <= 2040; $i++)
                                            <option value="{{$i}}" @if(now()->year == $i) selected @endif>{{$i}}</option>
                                        @endfor
                                    </select>
                                    &nbsp;&nbsp;
                                    <button class="btn btn-info btn-sm" type="submit">@lang('kidsnow.observations.go')</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="grid-body " style="padding: 0">
                        <table class="table table-striped" id="example">
                            <thead>
                            <tr>
                                <th style="width:30%">@lang('kidsnow.observations.children_name')</th>
                                <th style="width:10%">@lang('kidsnow.observations.birthday')</th>
                                <th style="width:10%">@lang('kidsnow.observations.gender')</th>
                                <th style="width:20%">@lang('kidsnow.observations.observer')</th>
                                <th style="width:10%">@lang('kidsnow.observations.time')</th>
                                <th>@lang('kidsnow.observations.action')</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($child_observations as $key=>$item)
                                    <tr class="odd gradeX">
                                        <td style="text-align:center;text-transform:capitalize">{{ $item->Children->first_name}} {{ $item->Children->last_name}}</td>
                                        <td style="text-align:center;text-transform:capitalize">{{ date('d-m-Y',strtotime($item->Children->birthday))}}</td>
                                        <td style="text-align:center;text-transform:capitalize">
                                            @if(app()->getLocale() == 'vi')
                                                {{ $item->Children->gender == 1 ? 'Nam' : 'Nữ'}}
                                            @else
                                                {{ $item->Children->gender == 1 ? 'Male' : 'Female'}}
                                            @endif
                                        </td>
                                        <td style="text-align:center;text-transform:capitalize">{{ $item->observer}}</td>
                                        <td style="text-align:center;text-transform:capitalize">{{ $item->month}} / {{$item->year}}</td>
                                        <td style="text-align:center">
                                            <a href="{{ route('admin.observations.view',['id'=>$item->id]) }}" title="View Observation" class="btn btn-sm btn-outline-primary"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <a href="{{ route('admin.observations.getEdit',['id'=>$item->id]) }}" title="Edit Observation" class="btn btn-sm btn-outline-warning"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                            <a onclick="return confirm('Delete Observation ? Do you want continue !')" title="Delete Observation" href="{{ route('admin.observations.getDelete',['id'=>$item->id]) }}" class="btn btn-sm btn-outline-danger"><i class="fa fa-times" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="icon-plus">
    <a href="{{ route('admin.observations.getAdd') }}">
        <i class="fa fa-plus"></i>
    </a>
</div>
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
