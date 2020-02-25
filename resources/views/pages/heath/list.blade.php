@extends('master-layout')
@section('title')
    List Health
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
                <div class="col-md-12">
                    <li _ngcontent-c16="" class="level1"><a _ngcontent-c16="" href="{{route('admin.home')}}">Home</a></li>
                    <li _ngcontent-c16="" class="active1" style="pointer-events:none"><a _ngcontent-c16="" href="{{route('admin.health.getAdd')}}">HEALTH</a></li>
                </div>
            </ul>
        </div>
    </div>
    <div class="mat-card">
        <div class="row-fluid">
            <div class="span12">
                <div class="grid simple ">
                    <div class="grid-title">
                        <div class="row">
                            <div class="col-md-6" >
                                <h4>@lang('kidsnow.health.list')</h4>
                            </div>
                        </div>
                    </div>
                    <div class="grid-body " style="padding: 0">

                            <table class="table table-striped" id="example">
                                <thead>
                                <tr>
                                    <th style="width:25%">@lang('kidsnow.health.list.name')</th>
                                    <th style="width:15%">@lang('kidsnow.health.list.birthday')</th>
                                    <th style="width:10%">@lang('kidsnow.health.list.gender')</th>
                                    <th style="width:10%">@lang('kidsnow.health.list.date')</th>
                                    <th style="width:10%">@lang('kidsnow.health.list.time')</th>
                                    <th >@lang('kidsnow.health.list.action')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($health as $value)
                                    <tr class="odd gradeX">
                                        <th >{{$value->ChildrenProfiles->first_name }} {{$value->ChildrenProfiles->last_name}}</th>
                                        <th >{{date('d-m-Y',strtotime($value->ChildrenProfiles->birthday))}}</th>
                                        <th >
                                            @if(app()->getLocale() == 'vi')
                                                {{$value->ChildrenProfiles->gender == 1 ? "Nam" : "Nữ"}}
                                            @else
                                                {{$value->ChildrenProfiles->gender == 1 ? "Male" : "Female"}}
                                            @endif
                                        </th>
                                        <th >{{date('d-m-Y',strtotime($value->created_at))}}</th>
                                        <th >{{\Carbon\Carbon::parse($value->created_at)->format('H:i:s')}}</th>
                                        <th >
                                            <a href="{!! URL::route('admin.health.view',$value->id ) !!}" title="View Health" class="btn btn-sm btn-outline-primary"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <a href="{!! URL::route('admin.health.getEdit',$value->id ) !!}" title="Edit Health" class="btn btn-sm btn-outline-warning"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                            <a onclick="return confirm('Delete Health ? Do you want continue !')" title="Delete Health " href="{{ route('admin.health.getDelete', $value->id) }}" class="btn btn-sm btn-outline-danger"><i class="fa fa-times" aria-hidden="true"></i></a>
                                        </th>
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
<div class="icon-plus" title="add">
    <a href="{{route('admin.health.getAdd')}}">
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

