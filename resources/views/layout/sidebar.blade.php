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
            <a href="{{route('dashboard')}}" class="side-nav-link">
                <i class="uil-home-alt"></i>
                <span> Dashboards </span>
            </a>
        </li>
        <li class="side-nav-item">
            <a href="{{route('profile.index')}}" class="side-nav-link">
                <i class="uil-user"></i>
                <span> My Profile </span>
            </a>
        </li>

        <li class="side-nav-title side-nav-item">Tính năng</li>
        @can('schedule-read')
            <li class="side-nav-item">
                <a href="{{ route('schedule.index') }}" class="side-nav-link">
                    <i class="uil-calender"></i>
                    <span> Lịch hoạt động </span>
                </a>
            </li>
        @endcan
        @can('event-read')
            <li class="side-nav-item">
                <a href="{{ route('event.index') }}" class="side-nav-link">
                    <i class="uil-schedule"></i>
                    <span> Lịch sự kiện </span>
                </a>
            </li>
        @endcan
        @can('sheet-read')
        <li class="side-nav-item">
            <a href="{{ route('sheet.index') }}" class="side-nav-link">
                <i class="uil-clipboard-alt"></i>
                <span> Sheet - Cảm âm </span>
            </a>
        </li>
        @endcan
        @can('video-read')
            <li class="side-nav-item">
                <a href="{{ route('video.index') }}" class="side-nav-link">
                    <i class="uil-youtube"></i>
                    <span> Video </span>
                </a>
            </li>
        @endcan
        <li class="side-nav-item">
            <a href="#" class="side-nav-link">
                <i class="uil-music"></i>
                <span> Mượn/Trả nhạc cụ </span>
            </a>
        </li>
        <li class="side-nav-item">
            <a href="#" class="side-nav-link">
                <i class="uil-lock-open-alt"></i>
                <span> Đổi mật khẩu </span>
            </a>
        </li>
        <li class="side-nav-item">
            <a href="#" class="side-nav-link">
                <i class="uil-layer-group"></i>
                <span> Tài khoản khác </span>
            </a>
        </li>
        @can('user-read')
            <li class="side-nav-item">
                <a href="{{ route('usermanagement.index') }}" class="side-nav-link">
                    <i class="uil-layer-group"></i>
                    <span> Quản lý user </span>
                </a>
            </li>
        @endcan
        <li class="side-nav-item">
            @can('role-read')
                <a href="{{ route('role.index') }}" class="side-nav-link">
                    <i class="uil-layer-group"></i>
                    <span> Quản lý vai trò </span>
                </a>
            @endcan
        </li>
        @can('instrument_type-read')
            <li class="side-nav-item">
                <a href="{{ route('instrument_type.index') }}" class="side-nav-link">
                    <i class="uil-layer-group"></i>
                    <span> Quản lý loại nhạc cụ </span>
                </a>
            </li>
        @endcan
    </ul>

    <!-- end Help Box -->
    <!-- End Sidebar -->

    <div class="clearfix"></div>
    <!-- Sidebar -left -->

</div>
