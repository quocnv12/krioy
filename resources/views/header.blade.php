<nav>
    <div class="menu_desktop d-none d-md-block "> 
        <nav class="navbar navbar-expand-sm bg-light" style="background-color: white !important;box-shadow: rgb(242, 242, 242) 0px 3px 6px 3px;">
            <a href="#" style="display: flex;outline: none;text-decoration: none;">
                <img src="images/logo-ngang.png" alt="" class="logo">
               <!--  <p style="margin: 20px 0;font-size: 30px;color: #ff4081;">Kids Now</p> -->
            </a>
            <div class="dropdown-logo1">
                @if(app()->getLocale() == 'vi')
                <button class="dropbtn-logo1">
                    <img src="images/viet.png" style="width: 35px;height: 25px">
                </button>
                @else 
                <button class="dropbtn-logo1">
                    <img src="images/usa.png" style="width: 35px;height: 25px">
                </button>
                @endif
                <div class="dropdown-content-logo1">
                    <a href="locale/vi"><img src="images/viet.png"> VietNamese</a>
                    <a href="locale/en"><img src="images/usa.png"> English</a>
                </div>
            </div>
            <!-- Links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">@lang('kidsnow.menu_profiles')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">@lang('kidsnow.menu_invoices')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">@lang('kidsnow.menu_settings')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">@lang('kidsnow.menu_help')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="kids-now">Kids-now</a>
                </li>
                <!-- Dropdown -->
                @if (Auth::check())
                <li class="nav-item">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <img style="width: 30px; height: 30px;" src="images/{{ Auth::user()->image }}" alt="">
                    </a>
                    <div class="dropdown-menu">
                    <a class="dropdown-item" href="#"><i class="fa fa-users" aria-hidden="true"></i> {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} </a>
                        <a class="dropdown-item" href="#"><i class="fa fa-phone-square" aria-hidden="true"></i> {{ Auth::user()->phone }}</a>
                        {{--  <a class="dropdown-item" href="#"><i class="fa fa-bell" aria-hidden="true"></i> Notification Center</a>
                        <a class="dropdown-item" href="#"><i class="fa fa-retweet" aria-hidden="true"></i> Refresh Account</a>  --}}
                        <a class="dropdown-item" href="kids-now/update-password"><i class="fa fa-key" aria-hidden="true"></i> Change Password </a>
                        <a class="dropdown-item" href="kids-now/logout"><i class="fa fa-arrow-right" aria-hidden="true"></i> Logout</a>
                @endif
                    </div>
                </li>
            </ul>
        </nav>
    </div>
    <div class="d-block d-md-none menu_mobile">
        <div id="menu_mobile">
            <div class="closebtn" onclick="closeNav()">×</div>
            <a href="#">@lang('kidsnow.menu_profiles')</a>
            <a href="#">INVOICES</a>
            <a href="#">Settings</a>
            <a href="#">Help</a>
            <a href="kids-now">My Kids Now</a>
        </div>

        <nav class="navbar navbar-expand-sm bg-light">
            <button class="openbtn" onclick="openNav()">☰ Menu</button>
                        <!-- Links -->
            <ul class="navbar-nav ml-auto">
                <!-- Dropdown -->
                @if (Auth::check())
                <li class="nav-item">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <img style="width: 30px; height: 30px;" src="images/{{ Auth::user()->image }}" alt="">
                    </a>
                    <div class="dropdown-menu">

                    <a class="dropdown-item" href="#"><i class="fa fa-users" aria-hidden="true"></i> {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} </a>
                        <a class="dropdown-item" href="#"><i class="fa fa-phone-square" aria-hidden="true"></i> {{ Auth::user()->phone }}</a>
                        {{--  <a class="dropdown-item" href="#"><i class="fa fa-bell" aria-hidden="true"></i> Notification Center</a>
                        <a class="dropdown-item" href="#"><i class="fa fa-retweet" aria-hidden="true"></i> Refresh Account</a>  --}}
                        <a class="dropdown-item" href="kids-now/update-password"><i class="fa fa-key" aria-hidden="true"></i> Change Password </a>
                        <a class="dropdown-item" href="kids-now/logout"><i class="fa fa-arrow-right" aria-hidden="true"></i> Logout</a>
                @endif
            </ul>
        </nav>
    </div>
</nav>