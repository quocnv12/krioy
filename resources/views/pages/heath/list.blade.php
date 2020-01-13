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
                    <li _ngcontent-c16="" class="level1"><a _ngcontent-c16="" href="kids-now">Home</a></li>
                    <li _ngcontent-c16="" class="active-1"><a _ngcontent-c16="" href="">Health</a></li>
                    <li _ngcontent-c16="" class="active1" style="pointer-events:none"><a _ngcontent-c16="" href="">Health</a></li>
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
                            <div class="col-md-6">
                                <h4>List<span class="semi-bold">Health</span></h4>
                            </div>

                        </div>
                    </div>
                    <div class="grid-body" style="padding: 0;">
                        <div class="table-responsive">
                            <table class="table table-striped" id="example">
                                <thead>
                                <tr>
                                    <th style="text-align:left;">STT</th>
                                    <th style="text-align:left;width:18%">First name</th>
                                    <th style="text-align:left;width:20%">Last name</th>
                                    <th style="text-align:left;width:18%">Birthday</th>
                                    <th style="text-align:left;width:18%">Gender</th>
                                    <th style="text-align:center;width:12%">Sick</th>
                                    <th style="text-align:center;width:12%">Medicine</th>
                                    <th style="text-align:center;width:12%">Growth</th>
                                    <th style="text-align:center;width:12%">Incident</th>
                                    <th style="text-align:center;width:12%">Images</th>
                                    <th style="text-align:center;width:12%">Chỉnh sửa</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($health as $key=> $value)
                                    <tr>
                                        <th style="text-align:left;width:5%">{{$key+1}}</th>
                                        <th  style="text-align:left;width:10%">{{$value->ChildrenProfiles-> first_name }}</th>
                                        <th style="text-align:left;width:10%">{{$value->ChildrenProfiles->last_name}}</th>
                                        <th style="text-align:left;width:18%">{{$value->ChildrenProfiles->birthday}}</th>
                                        <th style="text-align:left;width:5%">{{$value->ChildrenProfiles->gender}}</th>
                                        <th style="text-align: center">{{$value->sick}}</th>
                                        <th style="text-align:left;width:10%">{{$value->medicine}}</th>
                                        <th style="text-align:left;width:30%">
                                            <p >Growth_height</p>: {{$value->growth_height}}<p/>
                                            <p>Growth_weight</p>: {{$value->growth_weight}}<p/>
                                        </th>
                                        <th style="text-align:left;width:18%">{{$value->incident}}</th>
                                        <th style="text-align:left;width:18%"><img src="images/{{$value->image}}" width="30" height="30"></th>
                                        <th style="text-align:left;width:5%">
                                            <a href="{{route('admin.health.getEdit',$value->id)}}" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="left" title="Chỉnh sửa"><i class="fa fa-pencil fa-fw"></i></a>
                                            <a  href="{{route('admin.health.getDelete', $value->id)}}" type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="left" title="Xóa"><i class="fa fa-trash-o  fa-fw"></i></a>
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

