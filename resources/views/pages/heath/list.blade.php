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
                        <li _ngcontent-c16="" class="active1" style="pointer-events:none"><a _ngcontent-c16="">Health</a></li>
                    </ul>
                </div>


            </div>
        </div>
        <div class="mat-card">
            <div class="row-fluid">
                <div class="span12">
                    <div class="grid simple ">
                        <div class="grid-title">
                            <h4>List <span class="semi-bold">Health</span></h4>
                            <div class="tools">
                            </div>
                        </div>
                        <div class="grid-body ">
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
                                        <th style="text-align:left;width:18%">{{$key+1}}</th>
                                        <th  style="text-align:left;width:18%">{{$value->ChildrenProfiles-> first_name }}</th>
                                        <th style="text-align:left;width:18%">{{$value->ChildrenProfiles->last_name}}</th>
                                        <th style="text-align:left;width:18%">{{$value->ChildrenProfiles->birthday}}</th>
                                        <th style="text-align:left;width:18%">{{$value->ChildrenProfiles->gender}}</th>
                                        <th style="text-align: center">{{$value->sick}}</th>
                                        <th style="text-align:left;width:18%">{{$value->medicine}}</th>
                                        <th style="text-align:left;width:18%">
                                            <b style="padding: 30px">Growth_height</b>: {{$value->growth_height}}
                                            <br/>
                                            <b style="padding: 30px">Growth_weight</b>: {{$value->growth_weight}}
                                            <br/>
                                        </th>
                                        <th style="text-align:left;width:18%">{{$value->incident}}</th>
                                        <th style="text-align:left;width:18%"><img src="images/{{$value->image}}" width="30" height="30"></th>
                                        <th style="text-align:left;width:18%">
                                            <a href="{{route('admin.health.getEdit',$value->id)}}" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="left" title="Chỉnh sửa"><i class="fa fa-pencil fa-fw"></i></a>
                                            <a  href="{{route('admin.health.getDelete', $value->id)}}" type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="left" title="Xóa"><i class="fa fa-trash-o  fa-fw"></i></a>
                                        </th>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pull-right">{{ $health->links() }}</div>
                        </div>

    </section>




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