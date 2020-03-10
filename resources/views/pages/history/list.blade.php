@extends('master-layout')
@section('title')
    History
@endsection

@section('content')
    <style type="text/css">
        input, select {
            background-color: #f9f9f9;
        }
    </style>
    <body>
    <section class="page-top container">
        <div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
            <div class="row">
                <div class="col-md-6">
                    <ul class="ul-td">
                        <li _ngcontent-c16="" class="level1"><a _ngcontent-c16="" href="index.html">HOME</a></li>
                        <li _ngcontent-c16="" class="active1" style="pointer-events:none"><a _ngcontent-c16="" href="food.html">HISTORY</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="container">
        <form action="{{route('admin.history.search')}}" method="get">
            <div class="row add">
                <div class="col-md-6">
                    <div class="row history-input">
                        <div class="col-md-4 input_box">
                            <span class="input_box_span_active">From Date </span>
                            <input class="datefield" type="date" name="from_date" placeholder="From date ">
                        </div>
                        <div class="col-md-4 input_box">
                            <span class="input_box_span_active">To Date </span>
                            <input class="datefield" type="date" name="to_date" placeholder="To date ">
                        </div>
                        <div class="col-md-4 input_box">
                            <span class="input_box_span_active">Modules </span>
                            <select name="model">
                                <option value="">Choose Module</option>
                                <option value="App\models\Diary">Diary</option>
                                <option value="">Food</option>
                                <option value="App\models\HealthModel">Health</option>
                                <option value="App\models\ObservationModel">Observation</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-md-11 input_box">
                        <span class="input_box_span_active">Program </span>
                        <select name="id_program">
                            <option value="">Choose Program</option>
                            @foreach($programs as $program)
                                <option value="{{$program->id}}">{{$program->program_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit"
                            style="background: #3f51b5;border: none;font-size: 20px;width: 40px;height: 40px;border-radius: 50%;margin-top: 17px">
                        <i class="fa fa-search" style="color: #fff;"></i>
                    </button>
                </div>
            </div>
        </form>
    </section>
    <section class="container">
        <div class="mat-card" style="min-height: 300px;">
            <div align="center" style="margin: 30px;">
                <span style="background: #5363d6;color:#fff;border-radius:2rem;padding:10px;font-size: 14px;font-weight: bold;">Today : {{date('d / m / Y', strtotime(now()))}}</span>
            </div>

            @foreach($history as $index => $item)
                @php
                    if (app()->getLocale() == 'vi'){
                        $content = json_decode($item->content_vi,true);
                    }else{
                        $content = json_decode($item->content_en,true);
                    }
                @endphp
                <div class="row">
                    <div class="col-md-1" align="center">
                        <img src="{{$item->icon}}" alt="" height="60" width="60">
                    </div>
                    <div class="col-md-11" data-toggle="modal" data-target="#myModal-{{$item->id}}" style="cursor: pointer;">
                        <div class="row" style="color:grey;padding-right:30px;margin-right:5px">
                            <div style="color: grey;">
                                @foreach(explode(',',$item->id_childrens) as $children_id)
                                    <div style="float: left;">
                                        <img src="{{\App\models\ChildrenProfiles::where('id',$children_id)->first()['image'] ? \App\models\ChildrenProfiles::where('id',$children_id)->first()['image'] : 'images/Child.png'}}" alt="" width="40" height="40">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div style="font-size:14px;float: right;padding-top:15px">{{date('H:i A', strtotime($item->created_at))}}</div>

                        <div class="row" style="color:grey;font-size:13px;padding: 10px 30px 5px 0px;">
                            <span style="color:black;padding-top:5px">
                                <b>Lớp: {{\App\models\Programs::where('id',$item->id_program)->first()['program_name']}}</b>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                            </span>
                        <span style="color:black;padding-top:5px">
                            <b>{{app()->getLocale() == 'vi' ? $content['Chủ Đề'] : $content['Model']}}</b>
                        </span>
                            {{--<span style="float: right;">{{app()->getLocale() == 'vi' ? $content['Trẻ'] : $content['Children']}}</span>--}}
                        </div>
                        <hr style="margin: 10px 0;">
                    </div>
                </div>
            @endforeach
        </div>
    </section>


    <!-- Modal -->
    @foreach($history as $item)
        @php
            if (app()->getLocale() == 'vi'){
                $content = json_decode($item->content_vi,true);
            }else{
                $content = json_decode($item->content_en,true);
            }
        @endphp
        <div class="modal fade" id="myModal-{{$item->id}}" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #FF4081;color: #fff;border-radius: 4px;">
                            <h4 class="modal-title" align="center" style="font-weight: 600;">{{app()->getLocale() == 'vi' ? $content['Chủ Đề'] : $content['Model']}}</h4>
                            &nbsp;&nbsp;&nbsp;
                            <button type="button" class="close" data-dismiss="modal" style="font-size: 30px;color: #fff;opacity: 1;">&times;</button>

                        </div>
                        <div class="modal-body" style="height: 500px;overflow: auto;text-align: left;">
                            <div style="color: black;">
                                <span style="float:right;font-size: 15px">{{date('d/m/Y | H:i A', strtotime($item->created_at))}}</span>
                            </div>
                            <br>
                            <div style="padding:10px;cursor:pointer;border:1px solid #eeeeee;border-radius:4px">
                            <span style="color: black;">
                                <b>{{\App\models\Programs::where('id',$item->id_program)->first()['program_name']}}</b>
                            </span>
                                <div class="row">
                                    @foreach(explode(',',$item->id_childrens) as $children_id)
                                        <div style="padding:10px;cursor:pointer;text-align: center;width: 33%;float: left;">
                                            <a href="{{route('admin.children.view',['id'=>$children_id])}}" target="_blank" data-toggle="tooltip" title="{{\App\models\ChildrenProfiles::where('id',$children_id)->first()['first_name']}} {{\App\models\ChildrenProfiles::where('id',$children_id)->first()['last_name']}}">
                                                <img src="{{\App\models\ChildrenProfiles::where('id',$children_id)->first()['image'] ? \App\models\ChildrenProfiles::where('id',$children_id)->first()['image'] : 'images/Child.png'}}" alt="" width="50" height="50">
                                                <div>
                                                    <p style="display: inline-block;width: 140px;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;color:#5363d6;;margin: 0px;" >
                                                        {{\App\models\ChildrenProfiles::where('id',$children_id)->first()['first_name']}}
                                                        {{\App\models\ChildrenProfiles::where('id',$children_id)->first()['last_name']}}
                                                    </p>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <br>
                            @foreach($content as $key => $value)
                                <div><p><b>{{$key}} :</b> {{$value}}</p></div>
                            @endforeach
                        </div>
                        <div class="modal-footer" style="text-align: center;">
                            <a href="{{route('admin.history.destroy',['id'=>$item->id])}}" onclick="return confirm('Xác Nhận Xóa (Delete this record) ?')" color="warn" style="font-family: arial;font-weight: bold;border-radius: 4px;background: #f44336;color: white;border: none;padding: 10px 15px;" class="mat-flat-button mat-warn">
                                <span class="mat-button-wrapper"> DELETE</span>
                                <div class="mat-button-ripple mat-ripple" ></div>
                                <div class="mat-button-focus-overlay"></div>
                            </a>
                        </div>
                    </div>

            </div>
        </div>
    @endforeach
    {{--end Modal--}}


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
    {{--<script type="text/javascript">--}}
        {{--$('.input_box input').focus(function (event) {--}}
            {{--$(this).siblings('span').addClass('input_box_span_active');--}}
        {{--});--}}
        {{--$('.input_box input').blur(function (event) {--}}
            {{--if ($(this).val() == '') {--}}
                {{--$(this).siblings('span').removeClass('input_box_span_active');--}}
            {{--}--}}
        {{--});--}}
    {{--</script>--}}
    {{--<script type="text/javascript">--}}
        {{--$('.input_box select').focus(function (event) {--}}
            {{--$(this).siblings('span').addClass('input_box_span_active');--}}
        {{--});--}}
        {{--$('.input_box select').blur(function (event) {--}}
            {{--if ($(this).val() == '') {--}}
                {{--$(this).siblings('span').removeClass('input_box_span_active');--}}
            {{--}--}}
        {{--});--}}
    {{--</script>--}}
@endsection
