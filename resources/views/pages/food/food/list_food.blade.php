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
			<div class="row">
				{{-- <div style="padding:0px;" class="col-md-8">
				<a style="margin:0px;" href="kids-now/staff/add"
					class="btn btn-success btn-cons"" title=" Add Staff Profile"><i style=""
						class="fa fa-plus-circle"></i> Add</a>
				</div>
				<div class="col-md-4" style="padding:0px;"" >
					<div style="padding:8px;position:relative;" class="col-md-3 form-group" >
						<label>Search :</label>
					</div>
					<div class="col-md-9" style="padding: 0px 3px;">
						<input type="text" id="search" name="search" placeholder="Enter search" class="form-control pull-right" autocomplete="off">
							<a style="position:absolute;top:20%;right:10px;" href="javascript:;void(0)"><i class="fa fa-search"></i></a>
					</div>
				</div> --}}
		<table border="0" class="staffprofile-table">
			<tbody>
				<tr class="td1">
					<th>STT</th>
					<th style="width:18%;text-align:left" >Meal Tpye</th>
					<th style="width:18%;text-align:left">Quantity</th>
					<th style="width:18%;text-align:left">Program</th>
					<th style="width:18%;text-align:left">Food Name</th>
					<th style="width:18%;text-align:left">Hành Động</th>
				</tr>
                @foreach ($foods as $item)
				<tr  style="text-align: center;line-height: 50px;" class="td2">
					<th style="font-size:12px;">{{ $item->id }}</th>
					<th style="font-size:12px;text-align:left">{{ $item->mealtypefood->name }}</th>
					<th style="font-size:12px;text-align:left">{{ $item->quantityfood->name }}</th>
					<th style="font-size:12px;text-align:left">{{ $item->programfood->program_name }}</th>
                    <th style="font-size:12px;text-align:left">
                        @foreach ($item->food as $value)
                           {{ $value->food_name }},
                        @endforeach
                    </th>
					<th style="width:10%">
						<a class="btn btn-primary" title="Edit Food" href="kids-now/food/edit/{{ $item->id }}"><i style="font-size:10px" class="fa fa-edit"></i></a>
						<a class="btn btn-danger" title="Delete Food" href="kids-now/food/delete/{{ $item->id }}"><i style="font-size:10px" class="fa fa-close"></i></a>
					</th>
				</tr>
				@endforeach
			
			</tbody>
		</table>

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
