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
                        <img src="images/attendance1.png" alt="" style="background: darkgrey;">
                        <div class="title">
                            <p>Attendance</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-2dot4 item">
                    <a href="#">
                        <img src="images/Diary.png" alt="">
                        <div class="title">
                            <p>Diary</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="kids-now/food">
                        <img src="images/Food-01.png" alt="">
                        <div class="title">
                            <p>Food</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="#">
                        <img src="images/Star-01.png" alt="">
                        <div class="title">
                            <p>Star</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="#">
                        <img src="images/Potty-01.png" alt="">
                        <div class="title">
                            <p>Potty</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="{{route('admin.health.getAdd')}}">
                        <img src="images/Health-01.png" alt="">
                        <div class="title">
                            <p>Health</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="{{route('admin.observations.getAdd')}}">
                        <img src="images/Observation-01.png" alt="">
                        <div class="title">
                            <p>Observations</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="#">
                        <img src="images/Photots-01.png" alt="">
                        <div class="title">
                            <p>Photos</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="#">
                        <img src="images/Play and Learn-01.png" alt="">
                        <div class="title">
                            <p>Play and Learn</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="#">
                        <img src="images/Sleep-01.png" alt="">
                        <div class="title">
                            <p>Sleep</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="kids-now/notice-board">
                        <img src="images/Notice Board Circle-01.png" alt="">
                        <div class="title">
                            <p>Notice Board</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="#">
                        <img src="images/calender-01.png" alt="">
                        <div class="title">
                            <p>Calendar</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="#">
                        <img src="images/Parent Note with Backgroud -01.png" alt="">
                        <div class="title">
                            <p>Parent Notes</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="#">
                        <img src="images/Route Tracker.png" alt="">
                        <div class="title">
                            <p>Route Tracker</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="#">
                        <img src="images/report.jpg" alt="">
                        <div class="title">
                            <p>Reports</p>
                        </div>
                    </a>
                </div>

                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="#">
                        <img src="images/Daily report.png" alt="">
                        <div class="title">
                            <p>Daily Reports</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="#">
                        <img src="images/History.png" alt="">
                        <div class="title">
                            <p>History</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="#">
                        <img src="images/Add Note (1)-01.png" alt="">
                        <div class="title">
                            <p>Enquiries</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="#">
                        <img src="images/invoice.jpg" alt="">
                        <div class="title">
                            <p>Invoices</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="#">
                        <img src="images/ExpenseManagement1.png" alt="">
                        <div class="title">
                            <p>Expenses</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="product2">
        <div class="container">
            <div class="cap-main">
                <h3><strong>Profiles</strong></h3>
                <div class="hr"></div>
            </div>
            <div class="row line">
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="kids-now/children">
                        <img src="images/Child.png" alt="">
                        <div class="title">
                            <p>Children Profiles</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="kids-now/staff">
                        <img src="images/Staff.png" alt="">
                        <div class="title">
                            <p>Staff Profiles</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="kids-now/program">
                        <img src="images/Programs.png" alt="">
                        <div class="title">
                            <p>Programs</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="#">
                        <img src="images/School Icon.png" alt="">
                        <div class="title">
                            <p>School</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="#">
                        <img src="images/graduate.png" alt="">
                        <div class="title">
                            <p>Archives</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="product3">
        <div class="container">
            <div class="cap-main">
                <h3><strong>Setup & Settings</strong></h3>
                <div class="hr"></div>
            </div>
            <div class="row line">
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="#">
                        <img src="images/RoomRatio1.png" alt="">
                        <div class="title">
                            <p>Room Ratio</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="#">
                        <img src="images/Favourite School.png" alt="">
                        <div class="title">
                            <p>Favourite</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="#">
                        <img src="images/tags.png" alt="">
                        <div class="title">
                            <p>Tags</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="#">
                        <img src="images/Trasnsport setup.png" alt="">
                        <div class="title">
                            <p>Transaport Setup</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="#">
                        <img src="images/QR Code Download-01.png" alt="">
                        <div class="title">
                            <p>QR Download</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="#">
                        <img src="images/Sickness-01.png" alt="">
                        <div class="title">
                            <p>Allergies Info</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="#">
                        <img src="images/Parent.png" alt="">
                        <div class="title">
                            <p>Invite Parents</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="#">
                        <img src="images/Staff.png" alt="">
                        <div class="title">
                            <p>Invite Staff</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="#">
                        <img src="images/CCTv.png" alt="">
                        <div class="title">
                            <p>CCTV Access</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="#">
                        <img src="images/settings.png" alt="">
                        <div class="title">
                            <p>Configurations</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="add-application" style="background: #f9f9f9;">
        <div class="container">
            <div class="cap-main">
                <h3><strong>Application</strong></h3>
                <div class="hr"></div>
            </div>
            <div class="row line">
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="#">
                        <img src="images/shop.png" alt="">
                        <div class="title">
                            <p>Shopping</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="#">
                        <img src="images/game.png" alt="">
                        <div class="title">
                            <p>Game</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="#">
                        <img src="images/Blog-icon.png" alt="">
                        <div class="title">
                            <p>Blog</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="#">
                        <img src="images/course.png" alt="">
                        <div class="title">
                            <p>Course</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-2dot4 col-sm-6 item">
                    <a href="#">
                        <img src="images/application.png" alt="">
                        <div class="title">
                            <p>Application</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="product4">
        <div class="container">
            <div class="cap-main">
                <h3><strong>Help</strong></h3>
                <div class="hr"></div>
            </div>
            <div class="row line">
                <div class="col-md-3"></div>
                <div class="col-xs-6 col-md-3 col-sm-6 item">
                    <a href="#">
                        <img src="images/FAQ.png" alt="">
                        <div class="title">
                            <p>FAQs</p>
                        </div>
                    </a>
                </div>

                <div class="col-xs-6 col-md-3 col-sm-6 item">
                    <a href="#">
                        <img src="images/Help Video-01.png" alt="">
                        <div class="title">
                            <p>Help Videos</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</main>
@endsection
