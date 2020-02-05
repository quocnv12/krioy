@extends('master-layout')
@section('title')
	List Food
@endsection
@section('css')

{{-- <link href="admin-template/assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" /> --}}
<link href="admin-template/assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen" />
<link href="admin-template/assets/plugins/jquery-datatable/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
<link href="admin-template/assets/plugins/datatables-responsive/css/datatables.responsive.css" rel="stylesheet" type="text/css" media="screen" />
<link href="admin-template/assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen" />
{{-- <link href="admin-template/assets/plugins/bootstrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> --}}
<link href="admin-template/assets/plugins/bootstrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="admin-template/assets/plugins/animate.min.css" rel="stylesheet" type="text/css" />
<link href="admin-template/assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" />
<link href="admin-template/webarch/css/webarch.css" rel="stylesheet" type="text/css" />

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
								<td style="text-transform:capitalize">{{ $item->mealtypefood->name }}</td>
								<td style="text-transform:capitalize">
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
								<td style="text-transform:capitalize">{{ $item->quantityfood->name }}</td>
								<td style="text-transform:capitalize">{{ $item->programfood->program_name }}</td>
								<td style="text-align:center">
									<a href="kids-now/food/edit/{{ $item->id }}" title="Edit Food" class="btn btn-sm btn-outline-primary"><i class="fa fa-edit" aria-hidden="true"></i></a>
									<a onclick="return confirm('Delete food ? Do you want continue !')" title="Delete Food" href="kids-now/food/delete/{{ $item->id }}" class="btn btn-sm btn-outline-danger"><i class="fa fa-times" aria-hidden="true"></i></a>
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
<div class="icon-plus">
	<a href="kids-now/food">
		<i class="fa fa-plus"></i>
	</a>
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
   
    <script src="admin-template/assets/plugins/pace/pace.min.js" type="text/javascript"></script>
    <script src="admin-template/assets/plugins/jquery/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="admin-template/assets/plugins/bootstrapv3/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="admin-template/assets/plugins/jquery-block-ui/jqueryblockui.min.js" type="text/javascript"></script>
    <script src="admin-template/assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
    <script src="admin-template/assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script>
    <script src="admin-template/assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
    <script src="admin-template/assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="admin-template/assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
    <script src="admin-template/webarch/js/webarch.js" type="text/javascript"></script>
    <script src="admin-template/assets/js/chat.js" type="text/javascript"></script>
    <script src="admin-template/assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
    <script src="admin-template/assets/plugins/jquery-datatable/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="admin-template/assets/plugins/jquery-datatable/extra/js/dataTables.tableTools.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="admin-template/assets/plugins/datatables-responsive/js/datatables.responsive.js"></script>
    <script type="text/javascript" src="admin-template/assets/plugins/datatables-responsive/js/lodash.min.js"></script>
    <script src="admin-template/assets/js/datatables.js" type="text/javascript"></script>
@endsection
