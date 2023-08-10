<div class="left-side-menu left-side-menu-detached">

    <div class="leftbar-user">
        <a href="">
            <img src="{{asset('assets/images/users/avatar-1.jpg')}}" alt="user-image" height="42"
                 class="rounded-circle shadow-sm">
            <span class="leftbar-user-name">{{ $authUser->name ?? '' }}</span>
        </a>
    </div>

    <!--- Sidemenu -->
    <ul class="metismenu side-nav">

        <li class="side-nav-title side-nav-item">Navigation</li>

        <li class="side-nav-item">
            <a href="{{route('home')}}" class="side-nav-link">
                <i class="uil-home-alt"></i>
                <span> Dashboards </span>
            </a>
        </li>
        <li class="side-nav-item">
            <a href="{{route('user.index')}}" class="side-nav-link">
                <i class="uil-user"></i>
                <span> My Profile </span>
            </a>
        </li>

        <li class="side-nav-title side-nav-item">Tính năng</li>

        <li class="side-nav-item">
            <a href="#" class="side-nav-link">
                <i class="uil-calender"></i>
                <span> Lịch hoạt động </span>
            </a>
            <a href="#" class="side-nav-link">
                <i class="uil-schedule"></i>
                <span> Lịch sự kiện </span>
            </a>
            <a href="#" class="side-nav-link">
                <i class="uil-clipboard-alt"></i>
                <span> Sheet - Cảm âm </span>
            </a>
            <a href="#" class="side-nav-link">
                <i class="uil-youtube"></i>
                <span> Video </span>
            </a>
            <a href="#" class="side-nav-link">
                <i class="uil-music"></i>
                <span> Mượn/Trả nhạc cụ </span>
            </a>
            <a href="#" class="side-nav-link">
                <i class="uil-lock-open-alt"></i>
                <span> Đổi mật khẩu </span>
            </a>
            <a href="#" class="side-nav-link">
                <i class="uil-layer-group"></i>
                <span> Tài khoản khác </span>
            </a>
        </li>
    </ul>

    <!-- end Help Box -->
    <!-- End Sidebar -->

    <div class="clearfix"></div>
    <!-- Sidebar -left -->

</div>
