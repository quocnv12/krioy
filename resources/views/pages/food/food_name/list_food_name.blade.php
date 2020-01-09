@extends('master-layout')
@section('title')
Thực đơn
@endsection
@section('content')

<body onload="time()">
    <section class="page-top container">
        <div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
            <div class="row">
                <ul class="ul-td" style="width:100%">
                    <li _ngcontent-c16="" class="level1"><a _ngcontent-c16="" href="kids-now">Home</a></li>
                    <li _ngcontent-c16="" class="active-1"><a _ngcontent-c16="" href="kids-now/food">Food</a></li>
                    <li _ngcontent-c16="" class="active1" style="pointer-events:none"><a _ngcontent-c16=""
                            href="kids-now/food/menu-food-name">Food Name</a></li>
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
                                <h4>Food <span class="semi-bold">Name</span></h4>
                            </div>
                            <div style="text-align:right;padding-right:22px" class="col-md-6">
                                <a style="margin:0px;" href="{{ route('menu-food-name-add') }}" class="btn btn-success btn-cons"" title="Add Food Name"><i style="" class="fa fa-plus-circle"></i> Add</a>
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
                            @foreach ($foodnames as $item)
                            <tr class="odd gradeX">
                                <td style="text-align:center">{{ $item->id }}</td>
                                <td style="text-align:center">{{ $item->food_name}}</td>
                                <td style="text-align:center">
                                <a href="{{ route('menu-food-name-edit',['id'=>$item->id]) }}" title="Edit Food Name" class="btn btn-primary"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                    <a onclick="return confirm('Delete food name ? Do you want continue !')"" title="Delete Food Name" href="{{ route('menu-food-name-del',['id'=>$item->id]) }}" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></a>
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

<script type="text/javascript">

  function del() {
			return confirm("Bạn muốn xóa danh mục ?");
		}
</script>


<script type="text/javascript">
   $('#search').on('keyup',function(){
                $value = $(this).val();
                $.ajax({
                    type: 'get',
                    url: '{{ URL::to('kids-now/food/menu-food-name/search') }}',
                    data: {
                        'search': $value
                    },
                    success:function(data){
                        $('tbody').html(data);
                    }
                });
            })
           // $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });


</script>
@endsection
