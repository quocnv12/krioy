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
        </div>
        <table border="0">
            <tbody>
            <tr class="td1">
                <th>STT</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Sick</th>
                <th>Medicine</th>
                <th>Growth</th>
                <th>Incident</th>
                <th>Images</th>
                <th>Chỉnh sửa</th>
            </tr>

           @foreach($health as $key=> $value)
               <tr>
                   <td style="padding: 30px: ">{{$key+1}}</td>
                   <td>{{$value->ChildrenProfiles-> first_name }}</td>
                   <td>{{$value->ChildrenProfiles->last_name}}</td>
                   <td style="padding: 30px">{{$value->sick}}</td>
                   <td style="padding: 30px">{{$value->medicine}}</td>
                   <td style="padding: 30px">
                       <b style="padding: 30px">Growth_height</b>: {{$value->growth_height}}
                       <br/>
                       <b style="padding: 30px">Growth_weight</b>: {{$value->growth_weight}}
                       <br/>
                   </td>
                   <td style="padding: 30px">{{$value->incident}}</td>
                   <td style="padding: 30px"> <img src="images/{{$value->image}}" width="30" height="30"></td>
                   <td>
                       <a href="{!! URL::route('admin.health.getEdit', $value->id ) !!}" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="left" title="Chỉnh sửa"><i class="fa fa-pencil fa-fw"></i></a>
                       <a  href="{!! URL::route('admin.health.getDelete', $value->id ) !!}" type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="left" title="Xóa"><i class="fa fa-trash-o  fa-fw"></i></a>
                   </td>

               </tr>


           @endforeach

            </tbody>
        </table>

        <div class="pull-right">{{ $health->links() }}</div>
    </section>
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa  <span class="title"></span></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row" style="margin: 5px">
                        @foreach($health as $healt)
                        <div class="col-lg-12">

                            <form role="form" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" class="idProduct">
                                <fieldset class="form-group">
                                    <label>Frist_name</label>
                                    <input class="form-control frist_name" name="frist_name" value="{{$healt->ChildrenProfiles-> first_name}}" placeholder="Nhập tên ">
                                    @if($errors->has('frist_name'))
                                        <div class="alert alert-danger">{{ $errors->first('frist_name') }}</div>
                                    @endif
                                </fieldset>
                                <fieldset class="form-group">
                                    <label>Last_name</label>
                                    <input class="form-control last_name" name="last_name"  value="{{$healt->ChildrenProfiles-> last_name}}" placeholder="Nhập tên ">
                                    @if($errors->has('last_name'))
                                        <div class="alert alert-danger">{{ $errors->first('last_name') }}</div>
                                    @endif
                                </fieldset>

                             
                                <div class="form-group">
                                    <label for="price">Sick</label>
                                    <input  class="form-control sick" type="text" name="sick" placeholder="Nhập sick"  value="{{$healt->sick}}">
                                    @if($errors->has('sick'))
                                        <div class="alert alert-danger">{{ $errors->first('sick') }}</div>
                                    @endif
                                </div>
                                <div clas="form-group">
                                    <label>Growth</label>
                                    <div class="row">

                                        <div class="col-sm-6" style="text-align: center; ">
                                            <span>Height</span>
                                            <input type="text" name="growth_height" class="form-control growth_height"  value="{{$healt->growth_height}}" placeholder="Enter details here *" >
                                            @if($errors->has('growth_height'))
                                                <div class="alert alert-danger">{{ $errors->first('growth_height') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-sm-6"style="text-align: center; ">
                                            <span>Weight</span>
                                            <input type="text" name="growth_weight"   class="form-control growth_weight" value="{{$healt->growth_weight}}" placeholder="Enter details here *">
                                            @if($errors->has('growth_weight'))
                                                <div class="alert alert-danger">{{ $errors->first('growth_weight') }}</div>
                                            @endif
                                        </div>


                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="price">medicine</label>
                                    <input type="text" name="medicine"   class="form-control medicine"  value="{{$healt->medicine}}" placeholder="Nhập medicine nếu có" class="form-control">
                                    @if($errors->has('medicine'))
                                        <div class="alert alert-danger">{{ $errors->first('medicine') }}</div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="price">incident</label>
                                    <input type="text" name="incident"    class="form-control incident"  value="{{$healt->incident}}" placeholder="Nhập incident nếu có" class="form-control">
                                    @if($errors->has('incident'))
                                        <div class="alert alert-danger">{{ $errors->first('incident') }}</div>
                                    @endif
                                </div>
                                <img class="img img-thumbnail imageThum"src="images/{{$value->image}}" width="30" height="30" style="text-align: left">
                                <div class="form-group">
                                    <label for="price">Ảnh minh họa</label>
                                    <input type="file" name="image" class="form-control image"  >

                                </div>

                        </div>
                        @endforeach

                    </div>

                    <input type="submit" class="btn btn-success" value="Sửa">
                                <button type="reset" class="btn btn-primary">Nhập Lại</button>
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
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