@extends('master-layout')
@section('title')
    Observations
@endsection

@section('content')
    <body>
    <section class="page-top container">
        <div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
            <div class="row">
                <div class="col-md-6">
                    <ul class="ul-td">
                        <li _ngcontent-c16="" class="level1"><a _ngcontent-c16="">HOME</a></li>
                        <li _ngcontent-c16="" class="active1" style="pointer-events:none"><a _ngcontent-c16="">Observation</a></li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="ul-td" style="float: right">
                        <form class="form-inline" action="{{route('admin.observations.search')}}" method = "get">
                            <input class="form-control mr-sm-2" type="search"  placeholder="Search" name="Key" aria-label="Search" required>
                            <button class="btn my-2 my-sm-0" type="submit" >Search</button>
                        </form>
                    </ul>
                </div>
        </div>
        <table border="0">
            <tbody>
            <tr class="td1">
                <th>STT</th>
                <th>Frist_name</th>
                <th>Last_name</th>
                <th>Birthday</th>
                <th>Gender</th>
                <th>Observation</th>
                <th>Chỉnh sửa</th>
            </tr>
            @foreach($search as $key=> $value)
                <tr>
                    <th style="text-align: center">{{$key+1}}</th>
                    <th>{{$value->first_name}}</th>
                    <th>{{$value->last_name}}</th>
                    <th>{{$value->birthday}}</th>
                    <th>{{$value->gender}}</th>
                    <th>{{$value->name}}</th>

                    <th style="text-align: center">
                        <a href="{!! URL::route('admin.observations.getEdit', $value->id ) !!}" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="left" title="Chỉnh sửa"><i class="fa fa-pencil fa-fw"></i></a>
                        <a  href="{!! URL::route('admin.observations.getDelete', $value->id ) !!}" type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="left" title="Xóa"><i class="fa fa-trash-o  fa-fw"></i></a>
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </section>
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bạn có muốn xóa ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" style="margin-left: 183px;">
                    <button type="button" class="btn btn-success delProduct">Có</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Không</button>
                    <div>
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
    <script type="text/javascript">
        $(document).ready(function($) {
            $(".td2").click(function() {
                window.document.location = $(this).data("href");
            });
        });
    </script>
@endsection