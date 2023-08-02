<div class="navbar-custom topnav-navbar topnav-navbar-dark">
    <div class="container-fluid">

        <!-- LOGO -->
        <a href="{{route('home')}}" class="topnav-logo">
                    <span class="topnav-logo-lg">
                        <img src="{{asset('assets/images/logo-light.png')}}" alt="" height="16">
                    </span>
            <span class="topnav-logo-sm">
                        <img src="{{asset('assets/images/logo_sm.png')}}" alt="" height="16">
                    </span>
        </a>

        <ul class="list-unstyled topbar-right-menu float-right mb-0">
            <li class="dropdown notification-list d-lg-none">
                <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button"
                   aria-haspopup="false" aria-expanded="false">
                    <i class="dripicons-search noti-icon"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                    <form class="p-3">
                        <input type="text" class="form-control" placeholder="Tìm kiếm ..."
                               aria-label="Recipient's username">
                    </form>
                </div>
            </li>

            <li class="notification-list">
                <a class="nav-link right-bar-toggle" href="javascript: void(0);">
                    <i class="dripicons-gear noti-icon"></i>
                </a>
            </li>

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user arrow-none mr-0" data-toggle="dropdown" id="topbar-userdrop"
                   href="#" role="button" aria-haspopup="true"
                   aria-expanded="false">
                            <span class="account-user-avatar">
                                <img src="assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
                            </span>
                    <span>
                                <span class="account-user-name">Phạm Văn Hoan</span>
                                <span class="account-position">Admin</span>
                            </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated topbar-dropdown-menu profile-dropdown"
                     aria-labelledby="topbar-userdrop">
                    <!-- item-->
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome !</h6>
                    </div>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="mdi mdi-home mr-1"></i>
                        <span>Dashboard</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="mdi mdi-account-edit mr-1"></i>
                        <span>Settings</span>
                    </a>

                    <!-- item-->
                    <a href="{{route('logout')}}" class="dropdown-item notify-item">
                        <i class="mdi mdi-logout mr-1"></i>
                        <span>Đăng xuất</span>
                    </a>

                </div>
            </li>

        </ul>
        <a class="button-menu-mobile disable-btn">
            <div class="lines">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </a>
        <div class="app-search dropdown">
            <form>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Tìm kiếm..." id="top-search">
                    <span class="mdi mdi-magnify search-icon"></span>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Tìm kiếm</button>
                    </div>
                </div>
            </form>
            <div class="dropdown-menu dropdown-menu-animated dropdown-lg" id="search-dropdown">

                <!-- item-->
                <div class="dropdown-header noti-title">
                    <h6 class="text-overflow mb-2 text-uppercase">Users</h6>
                </div>

                <div class="notification-list">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="media">
                            <img class="d-flex mr-2 rounded-circle" src="{{asset('assets/images/users/avatar-5.jpg')}}"
                                 alt="Generic placeholder image" height="32">
                            <div class="media-body">
                                <h5 class="m-0 font-14">Phạm Văn Hoan</h5>
                                <span class="font-12 mb-0">Admin</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
