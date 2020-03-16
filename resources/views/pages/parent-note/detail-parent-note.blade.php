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
