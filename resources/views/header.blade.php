<nav>
    <div class="menu_desktop d-none d-md-block "> 
        <nav class="navbar navbar-expand-sm bg-light" style="background-color: white !important;box-shadow: rgb(242, 242, 242) 0px 3px 6px 3px;">
            <a href="#" style="display: flex;outline: none;text-decoration: none;">
                <img src="images/logo.png" alt="">
                <p style="margin: 20px 0;font-size: 30px;color: #ff4081;">Kids Now</p>
            </a>
            <!-- Links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">PROFILES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">INVOICES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Help</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="kids-now">My kriyo</a>
                </li>

                <!-- Dropdown -->
                <li class="nav-item">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        <img style="width: 40px; height: 40px;" src="images/Staff.png" alt="">
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#"><i class="fa fa-users" aria-hidden="true"></i> Nguyen Cong Khanh</a>
                        <a class="dropdown-item" href="#"><i class="fa fa-phone-square" aria-hidden="true"></i> 0123456</a>
                        <a class="dropdown-item" href="#"><i class="fa fa-bell" aria-hidden="true"></i> Notification Center</a>
                        <a class="dropdown-item" href="#"><i class="fa fa-retweet" aria-hidden="true"></i> Refresh Account</a>
                        <a class="dropdown-item" href="#"><i class="fa fa-key" aria-hidden="true"></i> Change Password </a>
                        <a class="dropdown-item" href="kids-now/logout"><i class="fa fa-arrow-right" aria-hidden="true"></i> Logout</a>

                    </div>
                </li>
            </ul>
        </nav>
    </div>
    <div class="d-block d-md-none menu_mobile">
        <div id="menu_mobile">
            <div class="closebtn" onclick="closeNav()">×</div>
            <a href="#">PROFILES</a>
            <a href="#">INVOICES</a>
            <a href="#">Settings</a>
            <a href="#">Help</a>
            <a href="kids-now">My kriyo</a>
        </div>
       
        <nav class="navbar navbar-expand-sm bg-light">
            <button class="openbtn" onclick="openNav()">☰ Menu</button>
                        <!-- Links -->
            <ul class="navbar-nav ml-auto">
                <!-- Dropdown -->
                <li class="nav-item">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        <img style="width: 40px; height: 40px;" src="images/Staff.png" alt="">
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#"><i class="fa fa-users" aria-hidden="true"></i> Nguyen Cong Khanh</a>
                        <a class="dropdown-item" href="#"><i class="fa fa-phone-square" aria-hidden="true"></i> 0123456</a>
                        <a class="dropdown-item" href="#"><i class="fa fa-bell" aria-hidden="true"></i> Notification Center</a>
                        <a class="dropdown-item" href="#"><i class="fa fa-retweet" aria-hidden="true"></i> Refresh Account</a>
                        <a class="dropdown-item" href="#"><i class="fa fa-key" aria-hidden="true"></i> Change Password </a>
                        <a class="dropdown-item" href="kids-now/logout"><i class="fa fa-arrow-right" aria-hidden="true"></i> Logout</a>

                    </div>
                </li>
            </ul>
        </nav>
    </div>
</nav>