<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>Đăng nhập | Quản lý Câu lạc bộ </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Project I - Nhóm 7 by Phạm Văn Hoan" name="description"/>
    <meta content="drazi" name="author"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

    <!-- App css -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/app-modern.min.css')}}" rel="stylesheet" type="text/css" id="light-style"/>
    <link href="{{asset('assets/css/app-modern-dark.min.css')}}" rel="stylesheet" type="text/css" id="dark-style"/>

</head>

<body class="authentication-bg pb-0" data-layout-config='{"darkMode":false}'>

<div class="auth-fluid">
    <!--Auth fluid left content -->
    <div class="auth-fluid-form-box">
        <div class="align-items-center d-flex h-100">
            <div class="card-body">

                <!-- Logo -->
                <div class="auth-brand text-center text-lg-left">
                    <a href="" class="logo-dark">
                        <span><img src="{{asset('assets/images/logo-dark.png')}}" alt="" height="18"></span>
                    </a>
                    <a href="" class="logo-light">
                        <span><img src="{{asset('assets/images/logo.png')}}" alt="" height="18"></span>
                    </a>
                </div>

                <!-- title-->
                <h4 class="mt-0">Đăng nhập</h4>
                <p class="text-muted mb-4">Nhập ID và mật khẩu để đăng nhập.</p>

                <!-- form -->
                <form method="post" action="{{route('process-login')}}">
                    @csrf
                    <div class="form-group">
                        <label for="emailaddress">ID</label>
                        <input class="form-control" type="text" name="id" id="id" required=""
                               placeholder="Nhập ID">
                    </div>
                    <div class="form-group">
                        <a href="{{route('recoverpw')}}" class="text-muted float-right"><small>Quên mật khẩu?</small></a>
                        <label for="password">Mật khẩu</label>
                        <input class="form-control" type="password" name="password" required="" id="password"
                               placeholder="Nhập mật khẩu">
                    </div>
                    <div class="form-group mb-3">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="checkbox-signin">
                            <label class="custom-control-label" for="checkbox-signin">Lưu đăng nhập</label>
                        </div>
                    </div>
                    <div class="form-group mb-0 text-center">
                        <button class="btn btn-primary btn-block" type="submit"><i class="mdi mdi-login"></i> Đăng nhập
                        </button>
                    </div>
                    <!-- social-->
                </form>
                <!-- end form-->

                <!-- Footer-->
                <footer class="footer footer-alt">
                    <p class="text-muted">Chưa có tài khoản? Vui lòng liên hệ Admin CLB </p>
                </footer>

            </div> <!-- end .card-body -->
        </div> <!-- end .align-items-center.d-flex.h-100-->
    </div>
    <!-- end auth-fluid-form-box-->

    <!-- Auth fluid right content -->
    <div class="auth-fluid-right text-center">
        <div class="auth-user-testimonial">
            <h2 class="mb-3">Phần mềm quản lí Câu lạc bộ sáo trúc Bách Khoa</h2>
            <p class="lead"><i class="mdi mdi-format-quote-open"></i> Nhóm 7 <i
                        class="mdi mdi-format-quote-close"></i>
            </p>
        </div> <!-- end auth-user-testimonial-->
    </div>
    <!-- end Auth fluid right content -->
</div>
<!-- end auth-fluid-->

<!-- bundle -->
<script src="{{asset('assets/js/vendor.min.js')}}"></script>
<script src="{{asset('assets/js/app.min.js')}}"></script>

</body>

</html>
