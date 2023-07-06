@extends('layouts.main')

@section('title')
    Login
@endsection

@section('meta-tags')
    <meta name="description" content="Admin Login | ALX | E-learning and Assessment Portal"/>
    <meta name="robots" content="max-snippet:-1, max-image-preview:large, max-video-preview:-1"/>
    <link rel="canonical" href="{{ Request::fullUrl() }}" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Admin Login | ALX | E-learning and Assessment Portal" />
    <meta property="og:description" content="Admin Login | ALX | E-learning and Assessment Portal" />
    <meta property="og:url" content="{{ Request::fullUrl() }}" />
    <meta property="og:site_name" content="Admin Login | ALX | E-learning and Assessment Portal" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:description" content="Admin Login | ALX | E-learning and Assessment Portal" />
    <meta name="twitter:title" content="Admin Login | ALX | E-learning and Assessment Portal" />
    <meta name="twitter:site" content="" />
    <meta name="twitter:creator" content="" />
@endsection

@section('top-assets')
    <link rel="stylesheet" href="{{ asset('learning-assets/style.css') }}" />
    <script src="{{ asset('/js/app.js') }}" defer></script>
@endsection

@section('content')

    <section id="app" class="wow fadeIn parallax padding-five-tb" data-stellar-background-ratio="0.5"
             style="background-image: url(&quot;{{ asset('images/home/home-intro-banner.jpg') }}&quot;);
         visibility: visible; animation-name: fadeIn; background-position: bottom;">
        <div class="opacity-light bg-extra-dark-gray"></div>
        <admin-login></admin-login>
    </section>

@endsection

@section('bottom-assets')

@endsection
