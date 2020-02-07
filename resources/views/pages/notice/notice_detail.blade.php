@extends('master-layout')
@section('title')
	NOTICE Details
@endsection

@section('content')
	<body>
	<section class="page-top container">
		<div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
			<div class="row">
				<ul class="ul-td" style="width: 100%">
					<li  class="level1"><a href="kids-now">HOME</a></li>
					<li  class="active1"><a href="kids-now/notice-board">NOTICE BOARD</a></li>
					<li  class="active1 active-1" style="pointer-events:none;"><a href="">NOTICE DETAIL</a></li>
				</ul>
			</div>
		</div>
		
		<div class="mat-card">
			<div class="mat-content">
				<button class="accordion">Programs</button>
				<div class="panel">
					<div _ngcontent-c20="" class="row" style="" data-toggle="modal" data-target=".bd-example-modal-sm">
						@foreach($programs as $program)
							<div _ngcontent-c20="" align="center" class="col-xs-6 col-sm-4 col-md-3 col-lg-2 ng-star-inserted" style="padding:10px;cursor:pointer">
								<button _ngcontent-c20="" class="btn progBtn limitText bgClass tablinks1 @if(in_array($program->id, $array_programs_choose)) tablinks1_active @endif" style="background-color: transparent; border:1px solid #5363d6;border-radius: 4px; pointer-events: none" type="button" data-toggle="tooltip" title="{{$program->program_name}}" value="{{$program->id}}">{{$program->program_name}}</button>
							</div>
						@endforeach
					</div>
				</div>
				<div style="font-size: 20px;font-weight: bold;">
					<p>{{$notice_board->title}}</p>
				</div>
				<br>
				<div class="row">
					<div class="col-md-6">
						<div class="row">
							<div class="col-xs-9 col-md-9">
								<p>Mark as Important</p>
							</div>
							<div class="col-xs-3 col-md-3" data-toggle="modal" data-target=".bd-example-modal-sm">
								<label class="label-checkbox">
									<input type="checkbox" @if($notice_board->important) checked="checked" @endif disabled>
									<span class="checkmark"></span>
								</label>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-xs-9 col-md-9">
								<p>Archive</p>
							</div>
							<div class="col-xs-3 col-md-3" data-toggle="modal" data-target=".bd-example-modal-sm">
								<label class="label-checkbox">
									<input type="checkbox" @if($notice_board->archive) checked="checked" @endif disabled>
									<span class="checkmark"></span>
								</label>
							</div>
						</div>
					</div>
				</div>
				<div class="notice-footer" style="color: grey;font-size: 14px;margin-bottom: 370px;">
					<div class=" row">
						<div class="col-md-11" style="margin-top: 20px">
							<p>{{ $notice_board->content }}</p>
						</div>
						<div class="">
							@foreach(explode('/*endfile*/',$notice_board->clip_board) as $clipboard)
								<a href="kids-now/notice-board/clip_board/{{$notice_board->id}}/{{$clipboard}}" target="_blank">{{$clipboard}}</a>
								<br>
							@endforeach
						</div>
					</div>
					<div class="" style="margin-top: 50px">
						<span style="float: left;">{{date('d-m-Y  H:i:s', strtotime($notice_board->created_at))}}</span>
						<span style="float: right;">{{$notice_board->writer}}</span>
					</div>
				</div>
			</div>
		</div>

		<div class="icon-plus" title="edit">
			<a href="kids-now/notice-board/edit/{{$notice_board->id}}">
				<i class="fa fa-edit"></i>
			</a>
		</div>

		<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-sm" style="top: 40%;">
			    <div class="modal-content" style="font-size: 18px;padding: 25px;">
					Click on 'Edit' button to update details
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
    <script src="asset/kriyo/js/owl.carousel.min.js"></script>
    <script src="asset/kriyo/js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="asset/kriyo/js/jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="asset/kriyo/js/main.js"></script>
    <script>
		var acc = document.getElementsByClassName("accordion");
		var i;

		for (i = 0; i < acc.length; i++) {
		  acc[i].addEventListener("click", function() {
		    this.classList.toggle("active");
		    var panel = this.nextElementSibling;
		    if (panel.style.maxHeight) {
		      panel.style.maxHeight = null;
		    } else {
		      panel.style.maxHeight = panel.scrollHeight + "px";
		    } 
		  });
		}
	</script>
	<script>
		$(document).ready(function () {
			$('.accordion').click();
		})

	</script>
@endsection
