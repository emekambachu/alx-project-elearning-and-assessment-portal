<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title> @yield('title') - ALX | E-learning and Assessment Portal</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,400italic|Material+Icons"> -->
        <!-- <link rel="stylesheet" href="https://unpkg.com/vue-material/dist/vue-material.min.css">
        <link rel="stylesheet" href="https://unpkg.com/vue-material/dist/theme/default.css"> -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <!-- <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet"> -->
        <link href="https://fonts.googleapis.com/css2?family=Sora:wght@100;200;300;400;500;600;800&display=swap" rel="stylesheet">
        <!-- <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:400,500,700,400italic|Material+Icons"> -->
        <script src="https://kit.fontawesome.com/1f5754c97e.js" crossorigin="anonymous"></script>
        <script src="//unpkg.com/vue-vimeo-player@next"></script>


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

    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.css" rel="stylesheet"/> -->
    <!-- <script src="https://unpkg.com/vue-multiselect@2.1.6"></script>
    <link rel="stylesheet" href="https://unpkg.com/vue-multiselect@2.1.6/dist/vue-multiselect.min.css"> -->
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>window.Laravel = {csrfToken: '{{ csrf_token() }}'}</script>

    <script src="{{ asset('/js/app.js') }}" defer></script>


        <!-- Styles -->
        <style>
       </style>

        <style>
            body {
                font-family: "Sora";
                border: 0;
                padding: 0;
                box-sizing: none;
            }
            h1, h2, h3, h4, h5, h6, p, ul, li {
                padding: 0;
                margin: 0;
                font-family: "Sora";
                font-style: normal;
            }
            button {
                font-family: "Sora";
                font-style: normal;
                outline: none;
                border: none;
            }
        </style>
    </head>
    <body class="">
        <div id="app"><router-view></router-view></div>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
