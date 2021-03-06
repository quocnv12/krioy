@extends('master-layout')
@section('title')
@lang('kidsnow.quantity')
@endsection
@section('content')

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
<body>
    <section class="page-top container">
        <div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
            <div class="row">
                <ul class="ul-td" style="width:100%">
                <div class="col-md-12">
                    <li _ngcontent-c16="" class="level1"><a _ngcontent-c16="" href="kids-now">@lang('kidsnow.home')</a></li>
                    <li _ngcontent-c16="" class="active-1"><a _ngcontent-c16="" href="kids-now/food">@lang('kidsnow.food')</a></li>
                    <li _ngcontent-c16="" class="active1" style="pointer-events:none"><a _ngcontent-c16="" href="kids-now/food/menu-quantity">@lang('kidsnow.quantity')</a></li>
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
                                <h4>@lang('kidsnow.quantity')</span></h4>
                            </div>
                            {{-- <div style="text-align:right;padding-right:22px" class="col-md-6">
                                <a style="margin:0px;" href="{{ route('menu-quantity-add') }}" class="btn btn-success btn-cons"" title="Add Quantyti Food"><i style="" class="fa fa-plus-circle"></i> Add</a>
                            </div> --}}
                          
                      </div>
                    </div>
                    <div class="grid-body ">
                      <table class="table table-striped" id="example">
                        <thead>
                          <tr>
                            <th style="width:10%"></th>
                            <th style="text-align:left">@lang('kidsnow.quantity')</th>
                            <th style="width:25%;text-align:center">@lang('kidsnow.action')</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($qtyfood as $item)
                            <tr class="odd gradeX">
                              <td style="text-align:center"></td>
                              <td style="text-transform:capitalize">{{ $item->name}}</td>
                              <td style="text-align:center">
                                <a href="{{ route('menu-quantity-edit',['id_qty'=>$item->id]) }}" title="@lang('kidsnow.title_quantity_edit')" class="btn btn-sm btn-outline-primary"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                <a onclick="return confirm('Delete meal type ? Do you want continue !')"" title="@lang('kidsnow.title_quantity_delete')" href="{{ route('menu-quantity-del',['id_qty'=>$item->id]) }}" class="btn btn-sm btn-outline-danger"><i class="fa fa-times" aria-hidden="true"></i></a>
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
    <div class="icon-plus">
      <a href="{{ route('menu-quantity-add') }}">
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
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.sticky.js"></script>

<!-- jQuery easing -->
<script src="js/jquery.easing.1.3.min.js"></script>

<!-- Main Script -->
<script src="js/main.js"></script>

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

