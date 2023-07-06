@extends('layouts.main')

@section('title')
    Login
@endsection

@section('meta-tags')
    <meta name="description" content="LMS Login | {{ config('app.name') }}"/>
    <meta name="robots" content="max-snippet:-1, max-image-preview:large, max-video-preview:-1"/>
    <link rel="canonical" href="{{ Request::fullUrl() }}" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="LMS Login | {{ config('app.name') }}" />
    <meta property="og:description" content="LMS Login | {{ config('app.name') }}" />
    <meta property="og:url" content="{{ Request::fullUrl() }}" />
    <meta property="og:site_name" content="LMS Login | {{ config('app.name') }}" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:description" content="LMS Login | {{ config('app.name') }}" />
    <meta name="twitter:title" content="LMS Login | {{ config('app.name') }}" />
    <meta name="twitter:site" content="" />
    <meta name="twitter:creator" content="" />
@endsection

@section('top-assets')
    <link rel="stylesheet" href="{{ asset('learning-assets/style.css') }}" />
    <script src="{{ asset('/js/app.js') }}" defer></script>
@endsection

@section('content')
    <section id="app" class="wow fadeIn parallax padding-five-tb"
             data-stellar-background-ratio="0.5"
             style="background-image: url(&quot;{{ asset('images/register-bg.jpg') }}&quot;);
             visibility: visible; animation-name: fadeIn;">
        <div class="opacity-medium bg-extra-dark-gray"></div>

        <learning-login></learning-login>
    </section>
@endsection

@section('bottom-assets')

@endsection
