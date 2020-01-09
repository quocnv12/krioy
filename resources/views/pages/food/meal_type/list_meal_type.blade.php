@extends('master-layout')
@section('title')
Thực đơn
@endsection
@section('content')

<body>
    <section class="page-top container">
        <div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
            <div class="row">
                <ul class="ul-td" style="width:100%">
                <div class="col-md-12">
                    <li _ngcontent-c16="" class="level1"><a _ngcontent-c16="" href="kids-now">Home</a></li>
                    <li _ngcontent-c16="" class="active-1"><a _ngcontent-c16="" href="kids-now/food">Food</a></li>
                    <li _ngcontent-c16="" class="active1" style="pointer-events:none"><a _ngcontent-c16="" href="kids-now/food/menu-meal-type">Meal Type</a></li>
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
                                    <h4>Meal <span class="semi-bold">Type</span></h4>
                                </div>
                                <div style="text-align:right;padding-right:22px" class="col-md-6">
                                    <a style="margin:0px;" href="{{ route('menu-meal-type-add') }}" class="btn btn-success btn-cons"" title="Add Meal Type"><i style="" class="fa fa-plus-circle"></i> Add</a>
                                </div>
                                @if (session('thongbao'))
                                <p style="font-size: 12px;margin-left:11px;font-weight: 100;color:#0D1CE9;font-style: italic;line-height: 25px;margin-top:10px;">{{ session('thongbao') }} </p>
                                @endif
                                @if (session('delete'))
                                <p style="font-size: 12px;margin-left:11px;font-weight: 100;color:red;font-style: italic;line-height: 25px;margin-top:10px;">{{ session('delete') }} </p>
                                @endif 
                          </div>
                        </div>
                        <div class="grid-body ">
                          <table class="table table-striped" id="example">
                            <thead>
                              <tr>
                                <th>ID</th>
                                <th style="width:80%">Meal Type</th>
                                <th>Thao Tác</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($mealtypes as $item)
                                <tr class="odd gradeX">
                                    <td style="text-align:center">{{ $item->id }}</td>
                                    <td style="text-align:center">{{ $item->name}}</td>
                                    <td style="text-align:center">
                                    <a href="kids-now/food/menu-meal-type/edit/{{ $item->id }}" title="Edit Food" class="btn btn-primary"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                        <a onclick="return confirm('Delete meal type ? Do you want continue !')"" title="Delete Food" href="kids-now/food/menu-meal-type/delete/{{ $item->id }}" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></a>
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
@endsection

