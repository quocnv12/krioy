@extends('master-layout')
@section('title')
    Health
@endsection

@section('content')
    <body>

    <section class="page-top container">
        <div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
            <div class="row">
                <div class="col-md-6">
                    <ul class="ul-td">
                        <li _ngcontent-c16="" class="level1"><a _ngcontent-c16="">HOME</a></li>
                        <li _ngcontent-c16="" class="active1" style="pointer-events:none"><a _ngcontent-c16="">Health</a></li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="ul-td" style="float: right">
                        <form class="form-inline" action="{{route('admin.health.search')}}" method = "get">
                            <input class="form-control mr-sm-2" type="search"  placeholder="Search" name="key" aria-label="Search" required>
                            <button class="btn my-2 my-sm-0" type="submit" >Search</button>
                        </form>
                    </ul>
                </div>
        </div>
        <table border="0">
            <tbody>
            <tr class="td1">
                <th>STT</th>

                <th>First_name</th>
                <th>Last_name</th>
                <th>Sick</th>
                <th>Medicine</th>
                <th>Growth</th>
                <th>Incident</th>
                <th>Images</th>
                <th>Chỉnh sửa</th>
            </tr>
            @foreach( $search as $key=> $item )
                <tr>
                    <th>{{$key+1}}</th>
                    <th>{{$item-> first_name }}</th>
                    <th>{{$item->last_name}}</th>
                    <td style="padding: 30px">{{$item->sick}}</td>
                    <td style="padding: 30px">{{$item->medicine}}</td>
                    <td style="padding: 30px">
                        <b style="padding: 30px">Growth_height</b>: {{$item->growth_height}}
                        <br/>
                        <b style="padding: 30px">Growth_weight</b>: {{$item->growth_weight}}
                        <br/>
                    </td>
                    <td style="padding: 30px">{{$item->incident}}</td>
                    <td style="padding: 30px"> <img src="images/{{$item->image}}" width="30" height="30"></td>
                    <td>
                        <a href="" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="left" title="Chỉnh sửa"><i class="fa fa-pencil fa-fw"></i></a>
                        <a  href="{!! URL::route('admin.health.getDelete', $item->id ) !!}" type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="left" title="Xóa"><i class="fa fa-trash-o  fa-fw"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>


    </section>

    </div>

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