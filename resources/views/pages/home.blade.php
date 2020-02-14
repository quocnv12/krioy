@extends('master-layout')
@section('title')
@endsection

@section('css')

@endsection

@section('js')

@endsection

@section('content')
<main style="background-color: #fff;">
    <div class="product1">
        <div class="container">
            <div class="cap-main">
                <h3><strong>Talent Wins</strong></h3>
                <div class="hr"></div>
            </div>
            <div class="row line">
                <div class="col-xs-6 col-sm-6 col-md-2dot4 item">
                    <a href="kids-now/attendance">
                        <img src="images/attendance1.png" alt="@lang('kidsnow.attendance')" style="background: darkgrey;">
                        <div class="title">
                            <p>@lang('kidsnow.attendance')</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-2dot4 item">
                    <a href="#">
                        <img src="images/Diary.png" alt="@lang('kidsnow.diary')">
                        <div class="title">
                            <p>@lang('kidsnow.diary')</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="kids-now/food">
                        <img src="images/Food-01.png" alt="@lang('kidsnow.food')">
                        <div class="title">
                            <p>@lang('kidsnow.food')</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="#">
                        <img src="images/Star-01.png" alt="@lang('kidsnow.star')">
                        <div class="title">
                            <p>@lang('kidsnow.star')</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="#">
                        <img src="images/Potty-01.png" alt="@lang('kidsnow.potty')">
                        <div class="title">
                            <p>@lang('kidsnow.potty')</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="{{route('admin.health.getAdd')}}">
                        <img src="images/Health-01.png" alt="@lang('kidsnow.health')">
                        <div class="title">
                            <p>@lang('kidsnow.health')</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="{{route('admin.observations.list')}}">
                        <img src="images/Observation-01.png" alt="@lang('kidsnow.observations')">
                        <div class="title">
                            <p>@lang('kidsnow.observations')</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="#">
                        <img src="images/Photots-01.png" alt="@lang('kidsnow.photos')">
                        <div class="title">
                            <p>@lang('kidsnow.photos')</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="#">
                        <img src="images/Play and Learn-01.png" alt="@lang('kidsnow.play_and_learn')">
                        <div class="title">
                            <p>@lang('kidsnow.play_and_learn')</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="#">
                        <img src="images/Sleep-01.png" alt="@lang('kidsnow.sleep')">
                        <div class="title">
                            <p>@lang('kidsnow.sleep')</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="kids-now/notice-board">
                        <img src="images/Notice Board Circle-01.png" alt="@lang('kidsnow.notice_board')">
                        <div class="title">
                            <p>@lang('kidsnow.notice_board')</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="#">
                        <img src="images/calender-01.png" alt="@lang('kidsnow.calendar')">
                        <div class="title">
                            <p>@lang('kidsnow.calendar')</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="#">
                        <img src="images/Parent Note with Backgroud -01.png" alt="@lang('kidsnow.parent_notes')">
                        <div class="title">
                            <p>@lang('kidsnow.parent_notes')</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="#">
                        <img src="images/Route Tracker.png" alt="@lang('kidsnow.route_tracker')">
                        <div class="title">
                            <p>@lang('kidsnow.route_tracker')</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="#">
                        <img src="images/report.jpg" alt="@lang('kidsnow.reports')">
                        <div class="title">
                            <p>@lang('kidsnow.reports')</p>
                        </div>
                    </a>
                </div>

                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="#">
                        <img src="images/Daily report.png" alt="@lang('kidsnow.daily_reports')">
                        <div class="title">
                            <p>@lang('kidsnow.daily_reports')</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="#">
                        <img src="images/History.png" alt="@lang('kidsnow.history')">
                        <div class="title">
                            <p>@lang('kidsnow.history')y</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="#">
                        <img src="images/Add Note (1)-01.png" alt="@lang('kidsnow.enquiries')">
                        <div class="title">
                            <p>@lang('kidsnow.enquiries')</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="#">
                        <img src="images/invoice.jpg" alt="@lang('kidsnow.invoices')">
                        <div class="title">
                            <p>@lang('kidsnow.invoices')</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="#">
                        <img src="images/ExpenseManagement1.png" alt="@lang('kidsnow.expenses')">
                        <div class="title">
                            <p>@lang('kidsnow.expenses')</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="product2">
        <div class="container">
            <div class="cap-main">
                <h3><strong>@lang('kidsnow.profiles')</strong></h3>
                <div class="hr"></div>
            </div>
            <div class="row line">
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="kids-now/children">
                        <img src="images/Child.png" alt="@lang('kidsnow.children_profiles')">
                        <div class="title">
                            <p>@lang('kidsnow.children_profiles')</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="kids-now/staff">
                        <img src="images/Staff.png" alt="@lang('kidsnow.staff_profiles')">
                        <div class="title">
                            <p>@lang('kidsnow.staff_profiles')</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="kids-now/program">
                        <img src="images/Programs.png" alt="@lang('kidsnow.programs')">
                        <div class="title">
                            <p>@lang('kidsnow.programs')</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="#">
                        <img src="images/School Icon.png" alt="@lang('kidsnow.school')">
                        <div class="title">
                            <p>@lang('kidsnow.school')</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="#">
                        <img src="images/graduate.png" alt="@lang('kidsnow.archives')">
                        <div class="title">
                            <p>@lang('kidsnow.archives')</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="product3">
        <div class="container">
            <div class="cap-main">
                <h3><strong>@lang('kidsnow.setup_and_settings')</strong></h3>
                <div class="hr"></div>
            </div>
            <div class="row line">
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="#">
                        <img src="images/RoomRatio1.png" alt="@lang('kidsnow.room_ratio')">
                        <div class="title">
                            <p>@lang('kidsnow.room_ratio')</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="#">
                        <img src="images/Favourite School.png" alt="@lang('kidsnow.favourite')">
                        <div class="title">
                            <p>@lang('kidsnow.favourite')</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="#">
                        <img src="images/tags.png" alt="@lang('kidsnow.tags')">
                        <div class="title">
                            <p>@lang('kidsnow.tags')</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="#">
                        <img src="images/Trasnsport setup.png" alt="@lang('kidsnow.transaport_setup')">
                        <div class="title">
                            <p>@lang('kidsnow.transaport_setup')</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="#">
                        <img src="images/QR Code Download-01.png" alt="@lang('kidsnow.qr_download')">
                        <div class="title">
                            <p>@lang('kidsnow.qr_download')</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="#">
                        <img src="images/Sickness-01.png" alt="@lang('kidsnow.allergies_info')">
                        <div class="title">
                            <p>@lang('kidsnow.allergies_info')</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="#">
                        <img src="images/Parent.png" alt="@lang('kidsnow.invite_parents')">
                        <div class="title">
                            <p>@lang('kidsnow.invite_parents')</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="#">
                        <img src="images/Staff.png" alt="@lang('kidsnow.invite_staff')">
                        <div class="title">
                            <p>@lang('kidsnow.invite_staff')</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="#">
                        <img src="images/CCTv.png" alt="@lang('kidsnow.cctv_access')">
                        <div class="title">
                            <p>@lang('kidsnow.cctv_access')</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="#">
                        <img src="images/settings.png" alt="@lang('kidsnow.configuratios')">
                        <div class="title">
                            <p>@lang('kidsnow.configuratios')</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="add-application" style="background: #f9f9f9;">
        <div class="container">
            <div class="cap-main">
                <h3><strong>@lang('kidsnow.application')</strong></h3>
                <div class="hr"></div>
            </div>
            <div class="row line">
                <div class="col-xs-6 col-md-2 col-sm-6 item">
                    <a href="#">
                        <img src="images/shop.png" alt="@lang('kidsnow.shop')">
                        <div class="title">
                            <p>@lang('kidsnow.shop')</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2 col-sm-6 item">
                    <a href="#">
                        <img src="images/game.png" alt="@lang('kidsnow.game')">
                        <div class="title">
                            <p>@lang('kidsnow.game')</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2 col-sm-6 item">
                    <a href="#">
                        <img src="images/Blog-icon.png" alt="@lang('kidsnow.ebook_blog')">
                        <div class="title">
                            <p>@lang('kidsnow.ebook_blog')</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2 col-sm-6 item">
                    <a href="#">
                        <img src="images/course.png" alt="@lang('kidsnow.courses')">
                        <div class="title">
                            <p>@lang('kidsnow.courses')</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2 col-sm-6 item">
                    <a href="#">
                        <img src="images/video-youtobekids.png" alt="@lang('kidsnow.video')" style="border-radius: 50%;">
                        <div class="title">
                            <p>@lang('kidsnow.video')</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2 col-sm-6 item">
                    <a href="#">
                        <img src="images/audio.jpg" alt="@lang('kidsnow.audio_book')" style="border-radius: 50%;">
                        <div class="title">
                            <p>@lang('kidsnow.audio_book')</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="product4">
        <div class="container">
            <div class="cap-main">
                <h3><strong>@lang('kidsnow.menu_help')</strong></h3>
                <div class="hr"></div>
            </div>
            <div class="row line">
                <div class="col-md-3"></div>
                <div class="col-xs-6 col-md-3 col-sm-6 item">
                    <a href="#">
                        <img src="images/FAQ.png" alt="@lang('kidsnow.faqs')">
                        <div class="title">
                            <p>@lang('kidsnow.faqs')</p>
                        </div>
                    </a>
                </div>

                <div class="col-xs-6 col-md-3 col-sm-6 item">
                    <a href="#">
                        <img src="images/Help Video-01.png" alt="@lang('kidsnow.help_videos')">
                        <div class="title">
                            <p>@lang('kidsnow.help_videos')</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</main>
@endsection
