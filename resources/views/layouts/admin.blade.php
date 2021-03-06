
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>{{ config('app.name') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('public/assets/images/favicon.ico') }}">

        <link href="{{ asset('public/assets/libs/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/assets/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/assets/libs/datatables/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/assets/libs/datatables/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />

        <link href="{{ asset('public/assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/assets/libs/clockpicker/bootstrap-clockpicker.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/assets/libs/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
        <!-- Lightbox css -->
        <link href="{{ asset('public/assets/libs/magnific-popup/magnific-popup.css') }}" rel="stylesheet" type="text/css" />
        <!-- App css -->
        <link href="{{ asset('public/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
        <style>
            audio {
                outline: 0;
            }
            .dt-buttons.btn-group {
                float: left;
            }
            @media (max-width: 991px) {
                .menubar-dark #topnav .has-submenu.active>a {
                    color: #3b73da;
                }
            }
        </style>
        @yield('css')
    </head>

    <body class="menubar-dark topbar-light">

        <!-- Pre-loader -->
        <div id="preloader">
            <div id="status">
                <div class="bouncingLoader"><div ></div><div ></div><div ></div></div>
            </div>
        </div>
        <!-- End Preloader-->

        <!-- Navigation Bar-->
        <header id="topnav">

            <!-- Topbar Start -->
            <div class="navbar-custom">
                <div class="container-fluid">
                    <ul class="list-unstyled topnav-menu float-right mb-0">

                        <li class="dropdown notification-list">
                            <!-- Mobile menu toggle-->
                            <a class="navbar-toggle nav-link">
                                <div class="lines">
                                    <span class="bg-dark"></span>
                                    <span class="bg-dark"></span>
                                    <span class="bg-dark"></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </li>

                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="{{ asset('public/assets/images/users/avatar-1.jpg') }}" alt="user-image" class="rounded-circle">
                                <span class="pro-user-name ml-1 text-capitalize">
                                    {{ auth()->user()->name }} <i class="mdi mdi-chevron-down"></i> 
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>

                                <!-- item-->
                                <a href="{{ route('logout.admin') }}" class="dropdown-item notify-item">
                                    <i class="remixicon-logout-box-line"></i>
                                    <span>Logout</span>
                                </a>

                            </div>
                        </li>          

                    </ul>

                    <!-- LOGO -->
                    <div class="logo-box">
                        <a href="{{ route('dashboard') }}" class="logo text-center">
                            <span class="logo-lg text-dark d-flex align-items-center">
                                <i class="fas fa-microphone-alt fa-2x"></i> 
                                <span class="font-20 font-weight-bold ml-2">iSAC Speaking</span>
                            </span>
                            <span class="logo-sm">
                                <i class="fas fa-microphone-alt fa-2x text-dark align-middle"></i>
                            </span>
                        </a>
                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- end Topbar -->

            <div class="topbar-menu">
                <div class="container-fluid">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">

                            <li class="has-submenu">
                                <a href="{{ route('dashboard') }}">
                                    <i class="mdi mdi-tab-plus"></i>All Speaking 
                                </a>
                            </li>
                            <li class="has-submenu">
                                <a href="{{ route('pending') }}">
                                    <i class="mdi mdi-tab-minus"></i>Pending
                                </a>
                            </li>
                            <li class="has-submenu">
                                <a href="{{ route('completed') }}">
                                    <i class="mdi mdi-tab"></i>Completed
                                </a>
                            </li>
                            
                            @if (auth()->user()->level == 2)
                                <li class="has-submenu">
                                    <a href="{{ route('reports') }}">
                                        <i class="mdi mdi-lightbulb-on-outline"></i>Report
                                    </a>
                                </li>
                                <li class="has-submenu">
                                    <a href="{{ route('reports.all') }}">
                                        <i class="mdi mdi-lightbulb-on-outline"></i>Report All
                                    </a>
                                </li>
                            @endif

                        </ul>
                        <!-- End navigation menu -->

                        <div class="clearfix"></div>
                    </div>
                    <!-- end #navigation -->
                </div>
                <!-- end container -->
            </div>
            <!-- end navbar-custom -->

        </header>
        <!-- End Navigation Bar-->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="wrapper">
            <div class="container-fluid mt-3">

                @yield('content')
                
            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

        <!-- Vendor js -->
        <script src="{{ asset('public/assets/js/vendor.min.js') }}"></script>
        <!-- third party js -->
        <script src="{{ asset('public/assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('public/assets/libs/datatables/dataTables.bootstrap4.js') }}"></script>
        <script src="{{ asset('public/assets/libs/datatables/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('public/assets/libs/datatables/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('public/assets/libs/datatables/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('public/assets/libs/datatables/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('public/assets/libs/datatables/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('public/assets/libs/datatables/buttons.flash.min.js') }}"></script>
        <script src="{{ asset('public/assets/libs/datatables/buttons.print.min.js') }}"></script>
        <script src="{{ asset('public/assets/libs/datatables/dataTables.keyTable.min.js') }}"></script>
        <script src="{{ asset('public/assets/libs/datatables/dataTables.select.min.js') }}"></script>
        <script src="{{ asset('public/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
        <script src="{{ asset('public/assets/libs/pdfmake/vfs_fonts.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <!-- third party js ends -->

        <!-- Datatables init -->
        <script src="{{ asset('public/assets/js/pages/datatables.init.js') }}"></script>

        <script src="{{ asset('public/assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js') }}"></script>
        <script src="{{ asset('public/assets/libs/clockpicker/bootstrap-clockpicker.min.js') }}"></script>
        <script src="{{ asset('public/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ asset('public/assets/libs/moment/moment.min.js') }}"></script>
        <script src="{{ asset('public/assets/libs/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

        <!-- Init js-->
        <script src="{{ asset('public/assets/js/pages/form-pickers.init.js') }}"></script>

        <!-- Magnific Popup-->
        <script src="{{ asset('public/assets/libs/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
        <!-- Gallery Init-->
        <script src="{{ asset('public/assets/js/pages/gallery.init.js') }}"></script>

        @yield('js')
        <!-- App js -->
        <script src="{{ asset('public/assets/js/app.min.js') }}"></script>
        
    </body>
</html>