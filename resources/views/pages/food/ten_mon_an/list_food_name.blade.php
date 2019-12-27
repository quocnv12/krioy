@extends('master-layout')
@section('title')
Thực đơn
@endsection
@section('content')

<body onload="time()">
    <section class="page-top container">
        <div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
            <div class="row">
                <ul class="ul-td">
                    <li _ngcontent-c16="" class="level1"><a _ngcontent-c16="" href="kids-now">Home</a></li>
                    <li _ngcontent-c16="" class="active-1"><a _ngcontent-c16="" href="kids-now/food">Food</a></li>
                    <li _ngcontent-c16="" class="active1" style="pointer-events:none"><a _ngcontent-c16="" href="kids-now/food/menu-food-name">Food Name</a></li>

                </ul>
            </div>
        </div>

        <div class="row">
            <div class="mat-card">
             {{-- <a href=""><i style="font-size: 30px;text-align:right" class="fa fa-plus-circle" aria-hidden="true"></i></a> --}}
            <a style="margin:0px;" href="{{ route('menu-food-name-add') }}" class="btn btn-success btn-cons"" title="Add Meal Type"><i style="" class="fa fa-plus-circle">Add</i></a>
            @if (session('thongbao'))
                <p style="font-size: 12px;font-weight: 100;color:#0D1CE9;font-style: italic;line-height: 25px;margin-top:10px;">{{ session('thongbao') }} </p>
            @endif
            @if (session('delete'))
            <p style="font-size: 12px;font-weight: 100;color:red;font-style: italic;line-height: 25px;margin-top:10px;">{{ session('delete') }} </p>
            @endif
            <div class="mat-content">
                    <div class="panel">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                            incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                            ullamco
                            laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                 
                    <div>

                            <table border="0">
                                    <tbody>
                                        <tr class="td1">
                                            <th>STT</th>
                                            <th>Food Name</th>
                                            <th>Hành Động</th>
                                        
                                        </tr>
                                        @foreach ($foodnames as $key=>$item)
                                        <tr style="text-align: center;line-height: 50px;"  class="td2">
                                            <td class="" style="width: 200px;" ><span style="color:#555;">{{ $key+1 }}</span></td>
                                            <td class=""><span style="color:#555;">{{ $item->food_name }}</span></td>
                                            <td style="width: 200px;">
                                                    <a style="margin:0px;" href="{{ route('menu-food-name-edit',['id'=>$item->id]) }}" class="btn btn-warning btn-cons"" title="Edit Meal Type"><i class="fa fa-pencil"></i></a>
                                                    <a href="{{ route('menu-food-name-del',['id'=>$item->id]) }}" onclick="return confirm('Bạn chắc chắn xóa món ăn này không !')" style="margin:0px;" class="btn btn-danger btn-cons" title="Delete Meal Type"><i class="fa fa-trash-o"></i></a>
                                                </td>
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                        {{-- <table>
						<thead>
							<tr>
                                <th class="col-md-2">STT</th>
                                <th>Meal Type</th>
                                <th></th>
                                <th class="col-md-2" ></th>
							</tr>
						</thead>
						<tbody>
                        @foreach ($foodnames as $key=>$item)
							<tr style="text-align: center;line-height: 50px;" >
								<td class=""><span style="color:#555;">{{ $key+1 }}</span></td>
                                <td class=""><span style="color:#555;">{{ $item->food_name }}</span></td>
                                <td class=""><span style="color:#555;"></span></td>
                                <td>
                                    <a style="margin:0px;" href="{{ route('menu-food-name-edit',['id'=>$item->id]) }}" class="btn btn-warning btn-cons"" title="Edit Meal Type"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('menu-food-name-del',['id'=>$item->id]) }}" onclick="return confirm('Bạn chắc chắn xóa món ăn này không !')" style="margin:0px;" class="btn btn-danger btn-cons" title="Delete Meal Type"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                            @endforeach
                       
						</tbody>
					</table> --}}
                       
                       
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

