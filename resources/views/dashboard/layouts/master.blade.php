
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>Dashboard | Home Page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully responsive admin dashboard." name="description" />
        <meta content="rpsohag" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('dashboard-assets/images/favicon.ico') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Daterangepicker css -->
        <link rel="stylesheet" href="{{ asset('dashboard-assets/vendor/daterangepicker/daterangepicker.css') }}">
        <!-- Vector Map css -->
        <link rel="stylesheet" href="{{ asset('dashboard-assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}">
        <!-- Theme Config Js -->
        <script src="{{ asset('dashboard-assets/js/config.js') }}"></script>
        <!-- App css -->
        <link href="{{ asset('dashboard-assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
        <!-- Icons css -->
        <link href="{{ asset('dashboard-assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('dashboard-assets/css/custom.css') }}" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <!-- Begin page -->
        <div class="wrapper">

            
            <!-- ========== Topbar Start ========== -->
            @include('dashboard.layouts.partials.navbar')
            <!-- ========== Topbar End ========== -->
            
            
            <!-- ========== Left Sidebar Start ========== -->
            @include('dashboard.layouts.partials.sidebar')
            <!-- ========== Left Sidebar End ========== -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                       @yield('dashboard_content')

                    </div>
                    <!-- container -->

                </div>
                <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 text-center">
                                <script>document.write(new Date().getFullYear())</script> © Copyright <b>All Right Reserved!</b>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->
        
        <!-- Vendor js -->
        <script src="{{ asset('dashboard-assets/js/vendor.min.js') }}"></script>
       
        <!-- App js -->
        <script src="{{ asset('dashboard-assets/js/app.min.js') }}"></script>
        @stack('dashboard_scripts')
    </body>
</html> 