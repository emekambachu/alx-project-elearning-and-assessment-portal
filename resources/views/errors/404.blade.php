@extends('layouts.main')

@section('meta')
    <meta name="description"
          content="ALX | Elearning and Assessment Portal | 404 | Page not found" />
    <meta name="robots" content="max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
@stop

@section('title')
    404 | Page not found
@stop

@section('top-assets')
    <style>
        body {
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 14px;
            line-height: 1.42857143;
            color: #333;
        }

        p {
            font-size: 16px;
            word-spacing: 0.001em;
            font-feature-settings: "kern"1;
            font-kerning: normal;
            line-height: 1.6;
            text-rendering: optimizeLegibility;
        }

        @media (min-width: 576px) and (max-width: 768px) {
            .slide-box img {
                -ms-flex: 0 0 50%;
                flex: 0 0 50%;
                max-width: 50%;
            }
        }

        @media (min-width: 768px) and (max-width: 991.98px) {
            .slide-box img {
                -ms-flex: 0 0 33.3333%;
                flex: 0 0 33.3333%;
                max-width: 33.3333%;
            }
        }

        @media (min-width: 992px) {
            .slide-box img {
                -ms-flex: 0 0 25%;
                flex: 0 0 25%;
                max-width: 25%;
            }
        }
    </style>
@stop

@section('content')
    <section class="wow fadeIn parallax padding-ten-tb" data-stellar-background-ratio="0.5"
             style="background-image: url(&quot;{{ asset('images/home/banner1.jpg') }}&quot;);
         visibility: visible; animation-name: fadeIn;">
        <div class="opacity-medium bg-extra-dark-gray"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="brand-text-yellow custom-font2 text-left font-weight-500 letter-spacing-minus-1"
                        style="margin-bottom: 0;">404</h1>
                    <h2 class="text-white text-medium text-inter" style="margin-bottom: 0;">
                        Page not found
                    </h2>
                </div>
            </div>
        </div>
    </section>

    <section class="wow fadeIn padding-20px-tb" style="visibility: visible; animation-name: fadeIn;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 breadcrumb alt-font text-small">
                    <!-- breadcrumb -->
                    <ul>
                        <li>
                            <a href="{{ url('/') }}" class="brand-text text-medium">Overview</a>
                        </li>
                        <li>
                            <a href="{{ url()->previous() }}" class="brand-text text-medium">Go back to previous page</a>
                        </li>
                    </ul>
                    <!-- end breadcrumb -->
                </div>
            </div>
        </div>
    </section>
@stop

@section('bottom-assets')
@stop
