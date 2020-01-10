@extends('master-layout')
@section('title')
    List Observation
@endsection

@section('content')
    <body>

    <section class="page-top container">
        <div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
            <div class="row">
                <div class="col-md-12">
                    <ul style="width: 100%;" class="ul-td">
                        <li _ngcontent-c16="" class="level1"><a _ngcontent-c16="" href="kids-now">Home</a></li>
                        <li _ngcontent-c16="" class="active1"><a _ngcontent-c16="" href="kids-now/food">Observation</a></li>
                        <li _ngcontent-c16="" class="level1" style="pointer-events:none"><a _ngcontent-c16="" href="kids-now/food/list">List</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div>

        </div>
        <div class="mat-card">
            <div class="row-fluid">
                <div class="span12">
                    <div class="grid simple ">
                        <div class="grid-title">
                            <h4>List <span class="semi-bold">Observation</span></h4>
                            <div class="tools">
                            </div>
                        </div>
                        <div class="grid-body ">
                            <table class="table table-striped" id="example">
                                <thead>
                                <tr>
                                    <th style="text-align:left;width:18%">STT</th>
                                    <th style="text-align:left;width:18%">Frist_name</th>
                                    <th style="text-align:left;width:18%">Last name</th>
                                    <th style="text-align:left;width:18%">Birthday</th>
                                    <th style="text-align:left;width:18%">Gender</th>
                                    <th style="text-align:left;width:18%">Observation</th>
                                    <th style="text-align:left;width:18%">Chỉnh sửa</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($observationtype as $key=> $value)
                                    <tr>
                                        <th style="text-align:left;width:18%">{{$key+1}}</th>
                                        <th style="text-align:left;width:18%">{{$value->Childrent->first_name}}</th>
                                        <th style="text-align:left;width:18%">{{$value->Childrent->last_name}}</th>
                                        <th style="text-align:left;width:18%">{{$value->Childrent->birthday}}</th>
                                        <th style="text-align:left;width:18%">{{$value->Childrent->gender}}</th>
                                        <th style="text-align:left;width:18%">{{$value->ObservationType->name}}</th>
                                        <th style="text-align:left;width:18%">
                                            <a href="{!! URL::route('admin.observations.getEdit', $value->Childrent->id ) !!}" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="left" title="Chỉnh sửa"><i class="fa fa-pencil fa-fw"></i></a>
                                            <a  href="{!! URL::route('admin.observations.getDelete',  $value->id ) !!}" type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="left" title="Xóa"><i class="fa fa-trash-o  fa-fw"></i></a>
                                        </th>
                                    </tr>
                                @endforeach
                                </tbody>


                        </div>
                    </div>
                </div>
            </div>
        </div>

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

@endsection
