@extends('layouts.main')

@section('title')
    Overview
@endsection

@section('meta')
    <meta name="description" content="ALX | E-learning and Assessment Portal"/>
    <meta name="robots" content="max-snippet:-1, max-image-preview:large, max-video-preview:-1"/>
    <link rel="canonical" href="{{ Request::fullUrl() }}" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="ALX | E-learning and Assessment Portal" />
    <meta property="og:description" content="ALX | E-learning and Assessment Portal" />
    <meta property="og:url" content="{{ Request::fullUrl() }}" />
    <meta property="og:site_name" content="ALX | E-learning and Assessment Portal" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:description" content="ALX | E-learning and Assessment Portal" />
    <meta name="twitter:title" content="ALX | E-learning and Assessment Portal" />
    <meta name="twitter:site" content="" />
    <meta name="twitter:creator" content="" />
@endsection

@section('top-assets')
    <!-- style -->
    <link rel="stylesheet" href="{{ asset('leading_women/style.css') }}" />
@endsection

@section('content')
    <section class="wow fadeIn parallax padding-five-tb"
             data-stellar-background-ratio="0.5"
             style="background-image: url(&quot;{{ asset('images/register-bg.jpg') }}&quot;);
             visibility: visible; animation-name: fadeIn; background-position: center;">

        <h2 class="text-white text-inter margin-three-left">About us</h2>
    </section>

    <section class="padding-four-tb bg-navy-blue">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-white border-right-grey">
                    <h5 class="text-inter text-orange">About Brain Boost E-learning Application</h5>
                    <p class="text-inter text-medium">
                        Welcome to our comprehensive learning portal designed to cater to the educational needs of corporate organizations, professionals, and students alike. Our platform is a one-stop solution that aims to make learning easier and more accessible than ever before. With a diverse range of courses, resources, and interactive tools, we provide a dynamic learning environment that fosters growth, knowledge acquisition, and skill development.<br>

                        Whether you are seeking to upskill in your profession, enhance your team's expertise, or embark on a learning journey as a student, our learning portal offers a seamless and intuitive experience to help you achieve your educational goals. From flexible learning schedules to personalized learning paths, we empower learners to take control of their education and unlock their full potential. Discover a world of endless possibilities with our learning portal and embark on a transformative learning experience.
                    </p>
                </div>
                <div class="col-md-6">
                    <img class="border-radius-10" src="{{ asset('/images/home/home2.jpg') }}"/>
                </div>
            </div>
        </div>
    </section>

    <section class="padding-four-tb" style="background-color: #9cd2de;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h5 class="text-inter text-navy-blue">Our Story</h5>
                </div>
                <div class="col-md-6 justify-content-center">
                    <img class="border-radius-10" src="{{ asset('images/home/home3.jpg') }}" alt=""/>
                </div>
                <div class="col-md-6 text-dark text-medium">
                    <p>
                        Our development team embarked on this transformative project with a burning passion for education and a shared vision of empowering individuals and organizations to unlock their full potential. We were inspired by the profound impact that learning has on personal and professional growth, and we recognized the need for a comprehensive learning portal that could transcend traditional boundaries and make education accessible to all.<br>

                        Witnessing the transformative power of knowledge firsthand, we were driven by a deep desire to create a platform that would break down barriers, bridge gaps, and ignite the spark of lifelong learning in the hearts and minds of people around the world. We were motivated by the belief that education is the cornerstone of progress and that by democratizing access to knowledge, we could empower individuals to shape their own futures and make a positive impact on their communities.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="wow fadeIn" style="visibility: visible; animation-name: fadeIn; padding-top: 12px;">
        <div class="container">
            <div class="row position-relative">

                <div class="col-12 swiper-slide md-margin-four-bottom margin-10px-bottom"
                     style="width: 375px;">
                    <h4 class="text-navy-blue text-inter">Meet the Team</h4>
                </div>

                <div class="col-md-4 swiper-slide md-margin-four-bottom margin-10px-bottom"
                     style="width: 375px;">
                    <div class="team-box bg-medium-light-gray margin-half-all bg-white box-shadow-light text-center padding-nine-all sm-padding-18px-all">
                        <img src="{{ asset('/images/team/victor.jpeg') }}"
                             class="rounded-circle width-80 margin-25px-bottom md-margin-15px-bottom"
                             alt="Victor Chukwuemeka Mbachu">

                        <div class="icon-social-small">
                            <a href="https://www.linkedin.com/in/chukwuemeka-mbachu/"
                               target="_blank" class="text-navy-blue">
                                <i class="fab fa-2x fa-linkedin"></i></a>
                            <a href="https://www.twitter.com/dexmbachu"
                               target="_blank" class="text-navy-blue">
                                <i class="fab fa-2x fa-twitter"></i></a>
                        </div>

                        <span class="text-navy-blue text-medium text-uppercase d-block line-height-11 custom-font2 font-weight-600 margin-10px-top">Victor Chukwuemeka Mbachu (Backend Developer)</span>
                    </div>
                </div>

                <div class="col-md-4 swiper-slide md-margin-four-bottom margin-10px-bottom"
                     style="width: 375px;">
                    <div class="team-box bg-medium-light-gray margin-half-all bg-white box-shadow-light text-center padding-nine-all sm-padding-18px-all">
                        <img src="{{ asset('/images/team/thomas.jpg') }}"
                             class="rounded-circle width-80 margin-25px-bottom md-margin-15px-bottom" alt="dr-debisi-araba">

                        <div class="icon-social-small">
                            <a href="https://www.linkedin.com/in/thomas-omotayo-545266131/"
                               target="_blank" class="text-navy-blue">
                                <i class="fab fa-2x fa-linkedin"></i></a>
                            <a href="https://twitter.com/ethomdigital?t=SG3tTw_YfEGT3xOwpT1EZg&s=09"
                               target="_blank" class="text-navy-blue">
                                <i class="fab fa-2x fa-twitter"></i></a>
                        </div>

                        <span class="text-navy-blue text-medium text-uppercase d-block line-height-11 custom-font2 font-weight-600 margin-10px-top">Thomas Esther Omotayo (Frontend Developer)</span>
                    </div>
                </div>

                <div class="col-md-4 swiper-slide md-margin-four-bottom margin-10px-bottom"
                     style="width: 375px;">
                    <div class="team-box bg-medium-light-gray margin-half-all bg-white box-shadow-light text-center padding-nine-all sm-padding-18px-all">
                        <img src="{{ asset('/images/team/wasiu.jpg') }}"
                             class="rounded-circle width-80 margin-25px-bottom md-margin-15px-bottom" alt="ernest-habanabakize">

                        <div class="icon-social-small">
                            <a href="https://www.linkedin.com/in/abdulwasiu-siyanbola-972616203/"
                               target="_blank" class="text-navy-blue">
                                <i class="fab fa-2x fa-linkedin"></i></a><br>
                        </div>

                        <span class="text-navy-blue text-medium text-uppercase d-block line-height-11 custom-font2 font-weight-600 margin-10px-top">Abdulwasiu Siyanbola (Quality Assurance/Tester)</span>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection

@section('bottom-assets')
@endsection
