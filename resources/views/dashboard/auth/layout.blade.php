
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Dashboard | Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully responsive admin dashboard" name="description" />
    <meta content="rpsohag" name="author" />
    <link rel="shortcut icon" href="{{ asset('dashboard-assets/images/favicon.ico') }}">
    <link href="{{ asset('dashboard-assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
    <link href="{{ asset('dashboard-assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
</head>
<body class="authentication-bg position-relative">
    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5 position-relative">
        <div class="container">
            <div class="row justify-content-center">
                @yield('login_content')
                <!-- end row -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <footer class="footer footer-alt fw-medium">
        <span class="text-dark">
            <script>document.write(new Date().getFullYear())</script> © Copyright All Right Reserved
        </span>
    </footer>
    <!-- Vendor js -->
    <script src="{{ asset('dashboard-assets/js/vendor.min.js') }}"></script>
    <!-- App js -->
    @stack('scripts')
    
</body>
</html>