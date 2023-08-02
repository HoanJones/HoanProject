<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>Quên mật khẩu | Quản lý Câu lạc bộ </title>
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
                <h4 class="mt-0">Reset Password</h4>
                <p class="text-muted mb-4">Enter your email address and we'll send you an email with instructions to reset your password.</p>

                <!-- form -->
                <form action="#">
                    <div class="form-group mb-3">
                        <label for="emailaddress">Email address</label>
                        <input class="form-control" type="email" id="emailaddress" required="" placeholder="Enter your email">
                    </div>
                    <div class="form-group mb-0 text-center">
                        <button class="btn btn-primary btn-block" type="submit"><i class="mdi mdi-lock-reset"></i> Reset Password </button>
                    </div>

                </form>
                <!-- end form-->

                <!-- Footer-->
                <footer class="footer footer-alt">
                    <p class="text-muted">Back to <a href="{{route('login')}}" class="text-muted ml-1"><b>Log In</b></a></p>
                </footer>

            </div> <!-- end .card-body -->
        </div> <!-- end .align-items-center.d-flex.h-100-->
    </div>
    <!-- end auth-fluid-form-box-->

    <!-- Auth fluid right content -->
    <div class="auth-fluid-right text-center">
        <div class="auth-user-testimonial">
            <h2 class="mb-3">Project I by Phạm Văn Hoan</h2>
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