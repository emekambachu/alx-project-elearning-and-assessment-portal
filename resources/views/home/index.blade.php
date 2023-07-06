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
    <style>
        .overview-p {
            font-family: 'Inter', serif;
            font-style: normal;
            font-weight: 400;
            font-size: 16px;
            line-height: 26px;
        }

        .privacy-policy-accordion-header {
            background: #FFFFFF;
            border: 1px solid #F9B12A;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.15);
            border-radius: 5px;
            color: #333333;
            padding: 18px 28px 19px;
        }

        body{
            font-family: 'Inter', serif;
            font-style: normal;
        }
</style>
@endsection

@section('content')
    <!-- start slider section -->
    <section class="no-padding main-slider height-100 mobile-height wow fadeIn ">
        <div class="swiper-full-screen height-100 width-100 black-move">
            <div class="swiper-wrapper">
                <!-- start slider item -->
                <div class="swiper-slide cover-background"
                     style="background-image:url({{ asset('/images/home/slider/slide1.jpg') }});">
                    <div class="container position-relative full-screen">
                        <div class="col-md-12 slider-typography text-center text-md-left">
                            <div class="slider-text-middle-main">
                                <div class="slider-text-middle">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="bg-white-opacity p-4 border-radius-4 width-auto">
                                                <h4 class="text-inter text-orange font-weight-700 letter-spacing-minus-1  lg-line-height-auto">Brain boost E-learning portal</h4>
                                                <p class="text-extra-dark-gray text-large margin-four-bottom ">Learn from the comfort of your home, with access to varieties of courses.</p>
                                                <a href="{{ route('about') }}" target="_blank" class="btn bg-light-purple btn-rounded btn-small no-margin-lr">About</a>
                                                <a href="{{ route('learning.register') }}" target="_blank" class="btn btn-transparent-dark-gray btn-rounded btn-small margin-20px-lr sm-margin-5px-top">Register</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end slider item -->
                <!-- start slider item -->
                <div class="swiper-slide cover-background"
                     style="background-image:url({{ asset('/images/home/slider/slide2.jpg') }});">
                    <div class="container position-relative full-screen">
                        <div class="col-md-12 slider-typography text-center text-md-left">
                            <div class="slider-text-middle-main">
                                <div class="slider-text-middle">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="bg-white-opacity p-4 border-radius-4 width-auto">
                                                <h4 class="text-inter text-orange font-weight-700 letter-spacing-minus-1  lg-line-height-auto">Fully functional admin panel</h4>
                                                <p class="text-extra-dark-gray text-large margin-four-bottom">Add modules and courses for users to have access</p>
                                                <a href="{{ route('about') }}" target="_blank" class="btn bg-light-purple btn-rounded btn-small no-margin-lr">About</a>
                                                <a href="{{ route('learning.register') }}" target="_blank" class="btn btn-transparent-dark-gray btn-rounded btn-small margin-20px-lr sm-margin-5px-top">Register</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end slider item -->

            </div>
            <!-- start slider pagination -->
            <div class="swiper-pagination swiper-full-screen-pagination"></div>
            <div class="swiper-button-next swiper-button-black-highlight d-none"></div>
            <div class="swiper-button-prev swiper-button-black-highlight d-none"></div>
            <!-- end slider pagination -->
        </div>
    </section>
    <!-- end slider section -->

    <div class="container">
        <div class="row">
            <div class="col-12 criteria-container custom-font1">
                <h1 class="text-center text-extra-large text-inter font-weight-bold text-dark">
                    Who can use our learning platform</h1>
                <div class="row justify-content-center d-flex">
                    <div class="col-md-3 col-10 criteria-box bg-dark-red mr-2">
                        <p class="text-large">Corporations</p>
                    </div>
                    <div class="col-md-3 col-10 criteria-box na-bg-orange mr-2">
                        <p class="text-large">Professional individuals</p>
                    </div>
                    <div class="col-md-3 col-10 criteria-box bg-dark-yellow mr-2">
                        <p class="text-large">Educational Institutions</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="padding-four-tb bg-navy-blue">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-white border-right-grey">
                    <h5 class="custom-font2 text-orange">What's Brain Boost E-learning?</h5>
                    <p class="text-inter">
                        Our cutting-edge eLearning platform designed specifically for organizations, schools, and professionals seeking to unlock their full potential in the digital age. We understand that continuous learning is vital for personal and organizational growth, and that's why we have created a comprehensive online hub where knowledge meets convenience.
                    </p>
                    <p>
                        Whether you are an organization looking to upskill your workforce, a school aiming to enhance student engagement, or a professional seeking to expand your expertise, our platform offers a diverse range of courses, interactive modules, and collaborative tools tailored to your unique needs. Embrace the future of education with us and embark on a transformative learning journey that empowers you to thrive in today's dynamic world
                    </p>
                </div>
                <div class="col-md-6">
                    <img class="border-radius-10" src="{{ asset('/images/home/home1.jpg') }}"/>
                </div>
            </div>
        </div>
    </section>

    <section class="padding-four-tb">
        <div class="container">
            <div class="row program-benefits">
                <div class="col-12">
                    <h5 class="custom-font2 text-navy-blue">Interactive Dashboard</h5>
                </div>
                <div class="col-md-4 text-dark text-large">
                    <ul>
                        <li>Play lecture videos on low quality networks</li>
                        <li>Access to courses across a wide variety subjects</li>
                    </ul>
                </div>
                <div class="col-md-8 justify-content-center">
                    <img class="program-benefits-img" src="{{ asset('/images/home/interactive-dashboard.png') }}" alt=""/>
                </div>
            </div>
        </div>
    </section>

    <section class="padding-four-tb" style="background-color: #ffcd84;">
        <div class="container">
            <div class="row program-benefits">
                <div class="col-12">
                    <h5 class="custom-font2 text-navy-blue">Accessibility</h5>
                </div>
                <div class="col-md-4 text-dark text-large">
                    <ul>
                        <li>Fully interactive and responsive on mobile devices</li>
                        <li>Prerequisite courses and modules to track user progress</li>
                    </ul>
                </div>
                <div class="col-md-8 justify-content-center">
                    <img class="program-benefits-img" src="{{ asset('/images/home/prerequisite-courses.png') }}" alt=""/>
                </div>
            </div>
        </div>
    </section>

    <section class="padding-four-tb" style="background-color: #61d2fa;">
        <div class="container">
            <div class="row program-benefits">
                <div class="col-12">
                    <h5 class="custom-font2 text-navy-blue">Assessment and Grading</h5>
                </div>
                <div class="col-md-4 text-dark text-large">
                    <ul>
                        <li>Take assessments to test your skills</li>
                    </ul>
                </div>
                <div class="col-md-8 justify-content-center">
                    <img class="program-benefits-img" src="{{ asset('/images/home/assessments.png') }}" alt=""/>
                </div>
            </div>
        </div>
    </section>

    <section class="padding-four-tb">
        <div class="container">
            <div class="row program-benefits">
                <div class="col-12">
                    <h5 class="custom-font2 text-navy-blue">Admin Management</h5>
                </div>
                <div class="col-md-4 text-dark text-large">
                    <ul>
                        <li>Fully functional admin to add courses and assessments</li>
                        <li>Track user activity from our admin area</li>
                    </ul>
                </div>
                <div class="col-md-8 justify-content-center">
                    <img class="program-benefits-img" src="{{ asset('/images/home/admin-course-management.png') }}" alt=""/>
                </div>
            </div>
        </div>
    </section>

    <section class="padding-four-tb">
        <div class="container">
            <div class="row program-benefits">
                <div class="col-12">
                    <h5 class="custom-font2 text-navy-blue">Learn More</h5>
                </div>
                <div class="col-md-12 text-dark text-large justify-content-center d-flex">
                    <a href="{{ route('') }}" target="_blank" class="btn bg-light-purple btn-rounded btn-large no-margin-lr">About</a>
                    <a href="{{ route('learning.register') }}" target="_blank" class="btn btn-transparent-dark-gray btn-rounded btn-large margin-20px-lr sm-margin-5px-top">Register</a>
                </div>
            </div>
        </div>
    </section>

    <section class="padding-five-tb bg-light-purple">
        <div class="container">
            <h5 class="custom-font2 text-navy-blue">Frequently Asked Questions</h5>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-12">
                    <!-- start accordion -->
                    <div class="panel-group accordion-style3 text-dark" id="accordion-3">

                        <!-- start tab content -->
                        <div class="panel panel-default">
                            <div class="privacy-policy-accordion-header">
                                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-3" href="#accordion-3-6" aria-expanded="false">
                                    <div class="panel-title">
                                        <span class=" sm-width-80 d-inline-block text-dark">
                                            Do i need to pay to use it?</span>
                                        <i class="fas float-right fa-angle-down text-dark"></i>
                                    </div>
                                </a>
                            </div>

                            <div id="accordion-3-6" class="panel-collapse collapse" data-parent="#accordion-3" style="">
                                <div class="privacy-policy-accordion-body">
                                    <p class="overview-p">No, for now it's free</p>
                                </div>
                            </div>
                        </div>
                        <!-- end tab content -->
                        <!-- start tab content -->
                        <div class="panel panel-default">
                            <div class="privacy-policy-accordion-header">
                                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-3" href="#accordion-3-2" aria-expanded="false">
                                    <div class="panel-title">
                                        <span class=" sm-width-80 d-inline-block text-dark">
                                            How do i sign up?</span>
                                        <i class="fas float-right fa-angle-down text-dark"></i>
                                    </div>
                                </a>
                            </div>

                            <div id="accordion-3-2" class="panel-collapse collapse" data-parent="#accordion-3" style="">
                                <div class="privacy-policy-accordion-body">
                                    <p class="overview-p">
                                       Easy, just sign up and verify your email
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- end tab content -->
                        <!-- start tab content -->
                        <div class="panel panel-default">

                            <div class="privacy-policy-accordion-header">
                                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-3" href="#accordion-3-4" aria-expanded="false">
                                    <div class="panel-title">
                                        <span class="sm-width-80 d-inline-block text-dark">
                                            How much time am I expected to commit to course?</span>
                                        <i class="fas float-right fa-angle-down text-dark"></i>
                                    </div>
                                </a>
                            </div>

                            <div id="accordion-3-4" class="panel-collapse collapse" data-parent="#accordion-3" style="">
                                <div class="privacy-policy-accordion-body">
                                    <p class="overview-p">
                                        As long as the course takes
                                    </p>
                                </div>
                            </div>

                        </div>
                        <!-- end tab content -->

                    </div>
                    <!-- end tab content -->

                </div>
                <!-- end accordion -->
            </div>
        </div>
    </section>
@endsection

@section('bottom-assets')
@endsection
