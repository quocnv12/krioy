@extends('master-layout')
@section('title')
	List Food
@endsection

@section('content')
	<body>

	<section class="page-top container">
		<div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
			<div class="row">
				<div class="col-md-12">
				<ul style="width: 100%;" class="ul-td">
                    <li _ngcontent-c16="" class="level1"><a _ngcontent-c16="" href="kids-now">Home</a></li>
                    <li _ngcontent-c16="" class="active1"><a _ngcontent-c16="" href="kids-now/food">Food</a></li>
                    <li _ngcontent-c16="" class="level1" style="pointer-events:none"><a _ngcontent-c16="" href="kids-now/food/list">List</a></li>
				</ul>
			</div>
		</div>
		</div>
		<div>
			@if(session('thongbao'))
			<p style="font-size: 12px;font-weight: 100;color:red;font-style: italic;line-height: 25px">* {{ session('thongbao') }}</p>
            @endif
            @if(session('delete'))
			<p style="font-size: 12px;font-weight: 100;color:red;font-style: italic;line-height: 25px">* {{ session('delete') }}</p>
		    @endif
		</div>
		<div class="mat-card">
			<div class="row-fluid">
				<div class="span12">
				  <div class="grid simple ">
					<div class="grid-title">
					  <h4>List <span class="semi-bold">Food</span></h4>
					  <div class="tools">
					  </div>
					</div>
					<div class="grid-body ">
					  <table class="table table-striped" id="example">
						<thead>
						  <tr>
							<th style="text-align:left;">ID</th>
							<th style="text-align:left;width:18%">Meal Type</th>
							<th style="text-align:left;width:20%">Food Name</th>
							<th style="text-align:left;width:18%">Quantity</th>
							<th style="text-align:left;width:18%">Program</th>
							<th style="text-align:center;width:12%">Thao Tác</th>
						  </tr>
						</thead>
						<tbody>
							@foreach ($foods as $item)
							<tr class="odd gradeX">
								<td>{{ $item->id }}</td>
								<td>{{ $item->mealtypefood->name }}</td>
								<td>
									@php
										$resultstr = array();
									@endphp
									@foreach ($item->food as $value)
									@php
										$resultstr[] = $value->food_name
									@endphp
									@endforeach
									{{  implode(",",$resultstr) }}
								</td>
								<td>{{ $item->quantityfood->name }}</td>
								<td>{{ $item->programfood->program_name }}</td>
								<td style="text-align:center">
								<a href="kids-now/food/edit/{{ $item->id }}" title="Edit Food" class="btn btn-primary"><i class="fa fa-edit" aria-hidden="true"></i></a>
									<a onclick="return confirm('Delete food ? Do you want continue !')" title="Delete Food" href="kids-now/food/delete/{{ $item->id }}" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></a>
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
