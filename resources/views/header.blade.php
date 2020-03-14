<nav>
    <div class="menu_desktop d-none d-md-block "> 
        <nav class="navbar navbar-expand-sm bg-light" style="background-color: white !important;box-shadow: rgb(242, 242, 242) 0px 3px 6px 3px;">
            <a href="#" style="display: flex;outline: none;text-decoration: none;">
                <img src="images/logo-ngang.png" alt="" class="logo">
               <!--  <p style="margin: 20px 0;font-size: 30px;color: #ff4081;">Kids Now</p> -->
            </a>
            <!-- Links -->
            <ul class="navbar-nav ml-auto">
                <li>
                    <div class="dropdown-logo1">
                        @if(app()->getLocale() == 'vi')
                        <button class="dropbtn-logo1">
                            <button class="dropbtn-logo1"><img src="images/viet.png" style="width: 30px;height: 20px"></button>
                        </button>
                        @else 
                        <button class="dropbtn-logo1">
                            <button class="dropbtn-logo1"><img src="images/england.png" style="width: 30px;height: 20px"></button>
                        </button>
                        @endif
                        <div class="dropdown-content-logo1">
                            <a href="locale/vi"><img src="images/viet.png"> @lang('kidsnow.vietnamese')</a>
                            <a href="locale/en"><img src="images/england.png"> @lang('kidsnow.english')</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="kids-now">@lang('kidsnow.menu_profiles')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="kids-now">@lang('kidsnow.menu_invoices')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="kids-now">@lang('kidsnow.menu_settings')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="kids-now">@lang('kidsnow.menu_help')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="kids-now">Kids Now</a>
                </li>
            
                <!-- Dropdown -->
                @if (Auth::check())
                <li class="nav-item">
                    <a class="nav-link dropdown-toggle" href="kids-now" id="navbardrop" data-toggle="dropdown">
                    <img style="width: 30px; height: 30px;border-radius: 50%;" onerror="this.src='images/Staff100.png';" src="images/staff/{{ Auth::user()->image }}" alt="">
                    </a>
                    <div class="dropdown-menu">
                    <a class="dropdown-item" href="kids-now"><i class="fa fa-users" aria-hidden="true"></i> {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} </a>
                        <a class="dropdown-item" href="kids-now"><i class="fa fa-phone-square" aria-hidden="true"></i> {{ Auth::user()->phone }}</a>
                        {{--  <a class="dropdown-item" href="#"><i class="fa fa-bell" aria-hidden="true"></i>@lang('kidsnow.notification_center')</a>
                        <a class="dropdown-item" href="#"><i class="fa fa-retweet" aria-hidden="true"></i> @lang('kidsnow.refresh_account')</a>  --}}
                        <a class="dropdown-item" href="kids-now/update-password"><i class="fa fa-key" aria-hidden="true"></i>@lang('kidsnow.menu_changepassword')</a>
                        <a class="dropdown-item" href="kids-now/logout"><i class="fa fa-arrow-right" aria-hidden="true"></i>@lang('kidsnow.menu_logout')</a>
                @endif
                    </div>
                </li>
            </ul>
        </nav>
    </div>
  
    <div class="d-block d-md-none menu_mobile" >
        <div id="menu_mobile">
            <div class="closebtn" onclick="closeNav()">☰</div>
            <a style="position: absolute;top: 11px;right: 15px;">
                <div  class="dropdown-logo1">
                    @if(app()->getLocale() == 'vi')
                    <button class="dropbtn-logo1">
                        <button class="dropbtn-logo1"><img src="images/viet.png" style="width: 20px;height: 20px;"></button>
                    </button>
                    @else 
                    <button class="dropbtn-logo1">
                        <button class="dropbtn-logo1"><img src="images/england.png" style="width: 20px;height: 20px"></button>
                    </button>
                    @endif
                    <div class="dropdown-content-logo1">
                        <a style="font-size: 14px;" href="locale/vi"><img src="images/viet.png"> @lang('kidsnow.vietnamese')</a>
                        <a style="font-size: 14px;" href="locale/en"><img src="images/england.png"> @lang('kidsnow.english')</a>
                    </div>
                </div>
            </a>
            <a href="kids-now">@lang('kidsnow.menu_profiles')</a>
            <a href="kids-now">@lang('kidsnow.menu_invoices')</a>
            <a href="kids-now">@lang('kidsnow.menu_settings')</a>
            <a href="kids-now">@lang('kidsnow.menu_help')</a>
            <a href="kids-now">My Kids Now</a>
        </div>
       
        <nav class="navbar navbar-expand-sm bg-light">
            <button class="openbtn" onclick="openNav()">☰ KIDS NOW</button>
                        <!-- Links -->
            <ul class="navbar-nav ml-auto">
                <!-- Dropdown -->
                @if (Auth::check())
                <li class="nav-item">
                    <a class="nav-link dropdown-toggle" href="kids-now" id="navbardrop" data-toggle="dropdown">
                    <img style="width: 30px; height: 30px;" src="images/staff/{{ Auth::user()->image }}" alt="">
                    </a>
                    <div class="dropdown-menu">
               
                    <a class="dropdown-item" href="kids-now"><i class="fa fa-users" aria-hidden="true"></i> {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} </a>
                        <a class="dropdown-item" href="kids-now"><i class="fa fa-phone-square" aria-hidden="true"></i> {{ Auth::user()->phone }}</a>
                        {{--  <a class="dropdown-item" href="#"><i class="fa fa-bell" aria-hidden="true"></i> Notification Center</a>
                        <a class="dropdown-item" href="#"><i class="fa fa-retweet" aria-hidden="true"></i> Refresh Account</a>  --}}
                        <a class="dropdown-item" href="kids-now/update-password"><i class="fa fa-key" aria-hidden="true"></i> @lang('kidsnow.menu_changepassword') </a>
                        <a class="dropdown-item" href="kids-now/logout"><i class="fa fa-arrow-right" aria-hidden="true"></i> @lang('kidsnow.menu_logout')</a>
                @endif
            </ul>
        </nav>
    </div>
</nav>
