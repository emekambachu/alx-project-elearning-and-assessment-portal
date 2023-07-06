<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Title -->
    <title> @yield('title') - ALX | E-learning and Assessment Portal</title>

    <!--- Favicon --->
    <link rel="icon" href="{{ asset('images/afchub_logo_square.jpg') }}" type="image/x-icon"/>

    <!--- Icons css --->
    <link href="{{ asset('learning-assets/css/icons.css') }}" rel="stylesheet">

    <!-- Owl-carousel css-->
    <link href="{{ asset('learning-assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet" />

    <!--- Right-sidemenu css --->
    <link href="{{ asset('learning-assets/plugins/sidebar/sidebar.css') }}" rel="stylesheet">

    <!--- Style css --->
    <link href="{{ asset('learning-assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('learning-assets/css/skin-modes.css') }}" rel="stylesheet">

    <!--- Sidemenu css --->
    <link href="{{ asset('learning-assets/css/sidemenu.css') }}" rel="stylesheet">

    <!--- Animations css --->
    <link href="{{ asset('learning-assets/css/animate.css') }}" rel="stylesheet">

    <!--- Select2 css-->
    <link href="{{ asset('learning-assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">

    <!--- Internal Fileupload css --->
    <link href="{{ asset('learning-assets/plugins/fileuploads/css/fileupload.css') }}"
          rel="stylesheet" type="text/css"/>

    <!--- Internal Fancy uploader css --->
    <link href="{{ asset('learning-assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />

    <!--- Internal Sumoselect css --->
    <link rel="stylesheet" href="{{ asset('learning-assets/plugins/sumoselect/sumoselect.css') }}">

    <!-- font awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

    <link href="{{ asset('/users/plugins/bootstrap-select-1.13.14/css/bootstrap-select.min.css') }}" rel="stylesheet">

    <!-- custom css -->
    <link href="{{ asset('learning-assets/custom/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('learning-assets/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('learning-assets/css/custom.css') }}" />

    <!--Override css-->
    <link rel="stylesheet" href="{{ asset('learning-assets/css/brace-style.css') }}" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>window.Laravel = {csrfToken: '{{ csrf_token() }}'}</script>

    <script src="{{ asset('/js/app.js') }}" defer></script>

</head>

<body class="main-body app sidebar-mini" style="background-color: #f9fafd;">

<!-- Loader -->
<div id="global-loader">
    <img src="{{ asset('learning-assets/img/loaders/loader-4.svg') }}" class="loader-img" alt="Loader">
</div>
<!-- /Loader -->

<div id="app">
    <!-- main-sidebar opened -->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>

    <aside class="main-sidebar app-sidebar sidebar-scroll">

        <div class="main-sidebar-loggedin mb-3 mt-5 pt-3 pb-3">
            <div class="app-sidebar__user">
                <div class="dropdown user-pro-body text-center">
                    <div class="">
                        <img src="{{ asset('images/logo.png') }}" width="150" class="">
                    </div>
                </div>
            </div>
        </div><!-- /user -->

        <div class="main-sidebar-body">
            <ul class="side-menu">

                <li class="slide mb-3">
                    <router-link
                        exact
                        class="side-menu__item"
                        :to="{name: 'LearningDashboardView'}">
                        <span class="material-symbols-outlined">dashboard</span>
                        <span class="side-menu__label pl-1">Dashboard</span>
                    </router-link>
                </li>

                <li class="slide mb-3">
                    <router-link
                        exact
                        class="side-menu__item"
                        :to="{name: 'LearningModuleView'}">
                        <span class="material-symbols-outlined">library_books</span>
                        <span class="side-menu__label pl-1">Modules</span>
                    </router-link>
                </li>

                <li class="slide mb-3">
                    <router-link
                        exact
                        class="side-menu__item"
                        :to="{name: 'LearningModuleAssessmentHistoryView'}">
                        <span class="material-symbols-outlined">analytics</span>
                        <span class="side-menu__label pl-1">Assessment History</span>
                    </router-link>
                </li>

                <li class="slide mb-3">
                    <router-link
                        exact
                        class="side-menu__item"
                        :to="{name: 'LearningSelfHelpView'}">
                        <span class="material-symbols-outlined">quiz</span>
                        <span class="side-menu__label pl-1">Self Help</span>
                    </router-link>
                </li>

                <li class="slide mb-3">
                    <router-link
                        exact
                        class="side-menu__item"
                        :to="{name: 'LearningAccountView'}">
                        <span class="material-symbols-outlined">settings</span>
                        <span class="side-menu__label pl-1">Settings</span>
                    </router-link>
                </li>

                <li class="slide mb-3">
                    <router-link
                        exact
                        class="side-menu__item text-danger"
                        :to="{name: 'LearningLogout'}">
                        <span class="material-symbols-outlined">logout</span>
                        <span class="side-menu__label text-danger pl-1">Logout</span>
                    </router-link>
                </li>

            </ul>
        </div>

    </aside>
    <!-- /main-sidebar -->

    <!-- main-content -->
    <div class="main-content">
        <!-- main-header -->
        <div class="main-header side-header">

            <div id="top-menu" class="container-fluid p-0">
                <learning-dashboard-main-header></learning-dashboard-main-header>
            </div>

        </div>

        <!-- container -->
        <div class="container" style="margin: 120px auto;">
            <router-view></router-view>
        </div>
        <!-- /container -->
    </div>
    <!-- /main-content -->
</div>

<!--- Back-to-top
<a href="#top" id="back-to-top" style="position: fixed; bottom: 65px; right: 25px; z-index : 444;"><i class="las la-angle-double-up"></i></a> --->

<!--- JQuery min js --->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>

<!--Custom-->
<script src="{{ asset('learning-assets/custom/notifications.js') }}"></script>

<!--- Datepicker js --->
<script src="{{ asset('learning-assets/js/datepicker.js') }}"></script>

<!--- Bootstrap Bundle js --->
<script src="{{ asset('learning-assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!--- Ionicons js --->
<script src="{{ asset('learning-assets/plugins/ionicons/ionicons.js') }}"></script>

<!--- Chart bundle min js --->
<script src="{{ asset('learning-assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>

<!--- JQuery sparkline js --->
<script src="{{ asset('learning-assets/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>

<!--- Internal Sampledata js --->
<script src="{{ asset('learning-assets/js/chart.flot.sampledata.js') }}"></script>

<!--- Rating js --->
<script src="{{ asset('learning-assets/plugins/rating/jquery.rating-stars.js') }}"></script>
<script src="{{ asset('learning-assets/plugins/rating/jquery.barrating.js') }}"></script>

<!--- Eva-icons js --->
<script src="{{ asset('learning-assets/js/eva-icons.min.js') }}"></script>

<!--- Moment js --->
<script src="{{ asset('learning-assets/plugins/moment/moment.js') }}"></script>

<!--- Perfect-scrollbar js --->
<script src="{{ asset('learning-assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('learning-assets/plugins/perfect-scrollbar/p-scroll.js') }}"></script>

<!--- Sidebar js --->
<script src="{{ asset('learning-assets/plugins/side-menu/sidemenu.js') }}"></script>

<!-- right-sidebar js -->
<script src="{{ asset('learning-assets/plugins/sidebar/sidebar.js') }}"></script>
<script src="{{ asset('learning-assets/plugins/sidebar/sidebar-custom.js') }}"></script>

<!-- Morris js -->
<script src="{{ asset('learning-assets/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('learning-assets/plugins/morris.js/morris.min.js') }}"></script>

<!--- Scripts js --->
<script src="{{ asset('learning-assets/js/script.js') }}"></script>

<!--- Index js --->
<script src="{{ asset('learning-assets/js/index.js') }}"></script>

<!--- Custom js --->
<script src="{{ asset('learning-assets/js/custom.js') }}"></script>

<!--- Fileuploads js --->
<script src="{{ asset('learning-assets/plugins/fileuploads/js/fileupload.js') }}"></script>
<script src="{{ asset('learning-assets/plugins/fileuploads/js/file-upload.js') }}"></script>

<!--- Fancy uploader js --->
<script src="{{ asset('learning-assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
<script src="{{ asset('learning-assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
<script src="{{ asset('learning-assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
<script src="{{ asset('learning-assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
<script src="{{ asset('learning-assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>

<!--- Internal Form-elements js --->
<script src="{{ asset('learning-assets/js/advanced-form-elements.js') }}"></script>
<script src="{{ asset('learning-assets/js/select2.js') }}"></script>

<!--- Internal Sumoselect js --->
<script src="{{ asset('learning-assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>

<!--- Internal Modal js --->
<script src="{{ asset('learning-assets/js/modal.js') }}"></script>

<!--- Internal Modal js --->
<script src="{{ asset('learning-assets/js/masonry.js') }}"></script>

<script src="{{ asset('/users/plugins/bootstrap-select-1.13.14/js/bootstrap-select.min.js') }}"></script>

</body>
</html>
