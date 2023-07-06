<!DOCTYPE html>
<html lang="en" class="loading">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

    <title>ALX | Admin | E-learning and Assessment Portal</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>window.Laravel = {csrfToken: '{{ csrf_token() }}'}</script>

    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">

    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900%7CMontserrat:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/fonts/feather/style.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/fonts/simple-line-icons/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/fonts/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/vendors/css/perfect-scrollbar.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/vendors/css/prism.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/vendors/css/chartist.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/vendors/css/tables/datatable/datatables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/custom.css') }}">

    <script src="{{ asset('/js/app.js') }}" defer></script>

    <style>
        /* Prevent body scrolling on modal popup */
        /*body.modal-open {*/
        /*    overflow: hidden;*/
        /*}*/
    </style>
</head>

<body data-col="2-columns" class="2-columns">
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div id="app" class="wrapper">

    <div data-active-color="white" data-background-color="crystal-clear"
         data-image="{{ asset('members/app-assets/img/sidebar-bg/08.jpg') }}" class="app-sidebar">

        <div class="sidebar-header">
            <div class="logo clearfix"><a href="{{ url('/') }}" class="logo-text float-left">
                    <div>
                        <img src="{{ asset('images/logo-white.png') }}" width="150" />
                    </div>
                    <span class="text align-middle"></span></a>
                    <a id="sidebarToggle" href="javascript:;"
                       class="nav-toggle d-none d-sm-none d-md-none d-lg-block">
                        <i data-toggle="expanded" class="ft-disc toggle-icon"></i></a>
                    <a id="sidebarClose" href="javascript:;"
                       class="nav-close d-block d-md-block d-lg-none d-xl-none">
                        <i class="ft-circle"></i></a>
            </div>
        </div>

        <div class="sidebar-content">
            <div class="nav-container">
                <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">

                    <li class="nav-item">
                        <router-link exact :to="{name: 'AdminDashboardView'}">
                            <i class="fa fa-dashboard"></i>
                            <span class="menu-title">Dashboard</span>
                        </router-link>
                    </li>

                    <li class="nav-item">
                        <router-link exact :to="{name: 'AdminApplicationView'}">
                            <i class="fa fa-users"></i>
                            <span class="menu-title">Users</span>
                        </router-link>
                    </li>

                    <li class="nav-item">
                        <router-link exact :to="{name: 'AdminModuleView'}">
                            <i class="fa fa-book"></i>
                            <span class="menu-title">Modules</span>
                        </router-link>
                    </li>

                    <li class="nav-item">
                        <router-link exact :to="{name: 'AdminAssessmentView'}">
                            <i class="fa fa-book"></i>
                            <span class="menu-title">Assessments</span>
                        </router-link>
                    </li>

{{--                    <li class="nav-item">--}}
{{--                        <router-link exact :to="{name: 'AdminCourseView'}">--}}
{{--                            <i class="fa fa-book"></i>--}}
{{--                            <span class="menu-title">Courses</span>--}}
{{--                        </router-link>--}}
{{--                    </li>--}}

                </ul>

            </div>
        </div>
        <div class="sidebar-background"></div>
    </div>


    <nav class="navbar navbar-expand-lg navbar-light bg-faded">
        <div class="container-fluid">
            <div class="navbar-header">

                <button type="button" data-toggle="collapse" class="navbar-toggle d-lg-none float-left">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <span class="d-lg-none navbar-right navbar-collapse-toggle">
                    <a class="open-navbar-container">
                        <i class="ft-more-vertical"></i>
                    </a>
                </span>
                <a id="navbar-fullscreen" href="javascript:;" class="mr-2 display-inline-block apptogglefullscreen">
                    <i class="ft-maximize blue-grey darken-4 toggleClass"></i>
                    <p class="d-none">fullscreen</p>
                </a>
            </div>

            <div class="navbar-container">
                <div id="navbarSupportedContent" class="collapse navbar-collapse">
                    <ul class="navbar-nav">

                        <li class="dropdown nav-item mr-0">
                            <a id="dropdownBasic3" href="#" data-toggle="dropdown"
                               class="nav-link position-relative dropdown-user-link dropdown-toggle">
                            <span class="avatar avatar-online">
                                <img id="navbar-avatar" src="/photos/{{'no_ent_img.png'}}" alt="avatar"/>
                            </span>
                                <p class="d-none">User Settings</p></a>
                            <div aria-labelledby="dropdownBasic3" class="dropdown-menu dropdown-menu-right">
                                <div class="arrow_box_right">
                                    <a href="" class="dropdown-item py-1">
                                        <i class="ft-settings mr-2">
                                        </i><span>Settings</span>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <router-link
                                        exact :to="{name: 'AdminLogout'}"
                                        class="dropdown-item py-1"
                                    >
                                        <i class="fa fa-user-lock"></i>
                                        <span class="menu-title">Logout</span>
                                    </router-link>
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="main-panel">
        <div class="main-content">
            <div class="content-wrapper">

                <section>
                    <div class="container-fluid"><!--Statistics cards Starts-->
                        <router-view></router-view>
                    </div>
                </section>

            </div>
        </div>

        <footer class="footer footer-static footer-light">
            <p class="clearfix text-muted text-center px-2">
                <span>
                    Copyright  &copy; {{ date('Y') }} ALX | E-learning and Assessment Portal, All rights reserved.
                </span>
            </p>
        </footer>

    </div>
</div>

<!-- ////////////////////////////////////////////////////////////////////////////-->

<!-- BEGIN VENDOR JS-->
<script src="{{ asset('admin-assets/vendors/js/core/jquery-3.3.1.min.js') }}"></script>

<script src="{{ asset('admin-assets/vendors/js/core/popper.min.js') }}"></script>
<script src="{{ asset('admin-assets/vendors/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin-assets/vendors/js/perfect-scrollbar.jquery.min.js') }}"></script>
<script src="{{ asset('admin-assets/vendors/js/prism.min.js') }}"></script>
<script src="{{ asset('admin-assets/vendors/js/jquery.matchHeight-min.js') }}"></script>
<script src="{{ asset('admin-assets/vendors/js/screenfull.min.js') }}"></script>
<script src="{{ asset('admin-assets/vendors/js/pace/pace.min.js') }}"></script>
<!-- BEGIN VENDOR JS-->

<!-- BEGIN PAGE VENDOR JS-->
<script src="{{ asset('admin-assets/vendors/js/chartist.min.js') }}"></script>
<script src="{{ asset('admin-assets/vendors/js/datatable/datatables.min.js') }}"></script>
<!-- END PAGE VENDOR JS-->

<!-- BEGIN CONVEX JS-->
<script src="{{ asset('admin-assets/js/app-sidebar.js') }}"></script>
<script src="{{ asset('admin-assets/js/notification-sidebar.js') }}"></script>
<script src="{{ asset('admin-assets/js/customizer.js') }}"></script>
<!-- END CONVEX JS-->

<!-- BEGIN PAGE LEVEL JS-->
<script src="{{ asset('admin-assets/js/components-modal.min.js') }}"></script>
<script src="{{ asset('admin-assets/js/data-tables/datatable-basic.js') }}"></script>
<!-- END PAGE LEVEL JS-->

</body>

</html>
