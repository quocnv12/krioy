@extends('master-layout')
@section('title')
@lang('kidsnow.staff')
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
                    <li _ngcontent-c16="" class="level1"><a _ngcontent-c16="" href="kids-now">@lang('kidsnow.home')</a></li>
                    <li _ngcontent-c16="" class="active1"><a _ngcontent-c16="" href="kids-now/staff">@lang('kidsnow.staff')</a></li>
                   
				</ul>
			</div>
		</div>
		</div>
		<div>
			{{-- @if(session('thongbao'))
			<p style="font-size: 12px;font-weight: 100;color:red;font-style: italic;line-height: 25px">* {{ session('thongbao') }}</p>
            @endif
            @if(session('delete'))
			<p style="font-size: 12px;font-weight: 100;color:red;font-style: italic;line-height: 25px">* {{ session('delete') }}</p>
		    @endif --}}
		</div>
		<div class="mat-card">
			<div class="row-fluid">
				<div class="span12">
				  <div class="grid simple ">
					<div class="grid-title">
					  <h4>@lang('kidsnow.list') <span class="semi-bold">@lang('kidsnow.staff')</span></h4>
					  <div class="tools">
					  </div>
					</div>
					<div class="grid-body " style="overflow-x: auto;">
					  <table class="table table-striped" id="example">
						<thead>
						  <tr>
							{{-- <th style="text-align:left;">ID</th> --}}
							<th style="text-align:left;">@lang('kidsnow.name')</th>
							<th style="text-align:left;">@lang('kidsnow.phone')</th>
							<th style="text-align:left">@lang('kidsnow.email')</th>
							<th style="text-align:left;">@lang('kidsnow.gender')</th>
							<th style="text-align:left;">@lang('kidsnow.address')</th>
							<th style="text-align:left;">@lang('kidsnow.program')</th>
							<th style="text-align:left;">@lang('kidsnow.date_of_joining')</th>
							<th style="text-align:left;">@lang('kidsnow.image')</th>
							<th style="text-align:center;width:9%">@lang('kidsnow.action')</th>
						  </tr>
						</thead>
						<tbody>
							@foreach ($staff as $item)
							<tr class="odd gradeX">
								{{-- <td style="font-size:12px">{{ $item->id }}</td> --}}
								<td style="font-size:12px">{{ $item->first_name }} {{ $item->last_name }}</td>
								<td style="font-size:12px">{{ $item->phone }}</td>
								<td style="font-size:11px;font-weight: bold;">{{ $item->email }}</td>
								<td style="font-size:12px">
									@if ($item->gender==1)
										{{ 'Nam' }}
									@elseif($item->gender==0)
										{{ 'Nữ' }}
									@else 
										{{ 'Chưa nhập' }}
									@endif
								</td>
								
								<td style="font-size:12px">{{ $item->address==Null ? 'Chưa nhập' : $item->address }}</td>
								<td style="font-size:12px"> 
									
										@php
											$resultstr = array();
										@endphp
										@foreach ($item->programstaff as $value)
											@php
												$resultstr[] = $value->program_name
											@endphp
										@endforeach
										{{  implode(",",$resultstr) }}
									
								</td>
								<td style="font-size:12px">{{ $item->date_of_joining==Null ? 'Chưa nhập' : Carbon\Carbon::parse($item->date_of_joining)->format('d-m-Y') }}</td>
								<td ><img style="width:30px;height:30px;border-radius:50%" src="images/staff/{{ $item->image }}"></td>
								<td style="text-align:center;width:12px">
									<a  href="kids-now/staff/edit/{{ $item->id }}" title="@lang('kidsnow.title_edit_staff')" class="btn btn-sm btn-outline-primary"><i class="fa fa-edit" aria-hidden="true"></i></a>
									<a  onclick="return confirm('Delete staff ? Do you want continue !')" title="@lang('kidsnow.title_delete_staff')" href="kids-now/staff/delete/{{ $item->id }}" class="btn btn-sm btn-outline-danger"><i class="fa fa-times" aria-hidden="true"></i></a>
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
	<a href="kids-now/staff/add">
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
