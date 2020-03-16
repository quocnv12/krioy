@extends('master-layout')
@section('title')
@lang('kidsnow.foods')
@endsection
@section('content')



<section class="page-top container">
    <div class="tieu-de" style="margin-top: 10px;margin-bottom: 10px;">
        <div class="row">
            <div class="col-md-6">
                <ul class="ul-td">
                    <li _ngcontent-c16="" class="level1"><a _ngcontent-c16="" href="kids-now">HOME</a></li>
                    <li _ngcontent-c16="" class="active1" style="pointer-events:none"><a _ngcontent-c16=""
                            href="kids-now/parent-note">PARENT NOTES</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="container">
	<div class="mat-card tab-content" style="min-height: 500px;">
		<div class="scrollmenu-div" style="margin-bottom:30px">
			@foreach($programs as $program)
				<div class="scrollmenu-button" style="text-align: center;">
					<button class="limitText" type="button" style="background: #5363d6;padding: 5px;border: none;border-radius: 5px;margin: 5px;min-width: 120px;text-align: center;">
						<a style="color: #fff ;margin: 0;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;width: 150px;display: block;" href="kids-now/parent-note/{{$program->id}}" title="{{$program->program_name}}">{{$program->program_name}}</a>
					</button>
				</div>
			@endforeach
		</div>
		
		 @if(isset($children_profiles->parent_note))
			@if(count($children_profiles->parent_note) > 0)
			 @foreach ($children_profiles->parent_note as $item)

				<div style="background: white;border-radius: 2px;margin:10px 13px;box-shadow: 0 2px 1px -1px rgba(0,0,0,.2), 0 1px 1px 0 rgba(0,0,0,.14), 0 1px 3px 0 rgba(0,0,0,.12);">
				<a href="kids-now/parent-note/detail/{{ $item->id }}" style="display:flex ;width:100%;padding:5px 5px 0;">
						<div class="media-left" style="vertical-align: middle;width:10%;text-align:center">
							<img  class="img-circle media-object" height="60" onerror="this.src='images/Child.png';" width="60" src="assets/ls-icons/Child.png">
						<div style="text-align:center;color: gray;font-weight: 600;font-size:12px;margin-top:5px">{{ App\models\ChildrenProfiles::where('id',$item->id_children)->first()['first_name']  }} {{ App\models\ChildrenProfiles::where('id',$item->id_children)->first()['last_name'] }}</div>
						</div>
						<div class="media-body" style="padding-top: 20px;color:grey;margin-: 10px;">
							<p ><b>{{$item->parent_module->name}}</b>
								<span style="float:right">
									<i aria-hidden="true" class="fa fa-check-circle" style="font-size: 25px; padding-right: 15px; text-align: center; color: green;"></i>
									<i aria-hidden="true" class="fa fa-chevron-right" style="float:right;color:#5363d6;cursor:pointer;margin-top: 5px"></i>
								</span>
							</p>
							<p style="font-size:14px">{{ carbon\carbon::parse()->format('h:i:s A, d-m-Y') }} <!----><span _ngcontent-c9="" style="float:right" class="ng-star-inserted"> </span><!---->
							</p>
						</div>
					</a>
				</div>
				@endforeach
			
			@else
				<div align="center">
					<h2 style="color: #5363d6;">Welcome to KIDS NOW App!</h2>
					<br>
					<p style="color:grey;margin-bottom: 0px">Never MISS any Important Communication from a Parent!</p>
					<p style="color:grey;margin-bottom: 0px">You can View and Respond to all the Notes here.</p>
				</div>
			@endif	
		@else
			<div align="center">
				<h2 style="color: #5363d6;">Welcome to KIDS NOW App!</h2>
				<br>
				<p style="color:grey;margin-bottom: 0px">Never MISS any Important Communication from a Parent!</p>
				<p style="color:grey;margin-bottom: 0px">You can View and Respond to all the Notes here.</p>
			</div>
		@endif
    </div>
</section>



@endsection

@section('js')

	<script type="text/javascript">
		$('.scrollmenu-div').slick({
			infinite: true,
			slidesToShow: 6,
			slidesToScroll: 1,
			autoplay: false,
			autoplaySpeed: 2000,
			responsive: [{
				breakpoint: 1200,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 1
				}
			},
				{
					breakpoint: 991,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 1,
						autoplay: true,
						arrows:false,
					}
				},
				{
					breakpoint: 500,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1,
						autoplay: true,
						arrows:false,
					}
				}]
		});
	</script>

@endsection
