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

    <script type='application/ld+json' class='yoast-schema-graph yoast-schema-graph--main'>
    {
   "@context":"https://schema.org",
   "@graph":[
      {
         "@type":"Organization",
         "@id":"https://brace.afchub.org/#organization",
         "name":"ALX | E-learning and Assessment Portal",
         "url":"https://brace.afchub.org/",
         "sameAs":[
            "https://www.facebook.com/nourishafrica1",
            "https://instagram.com/nourish_africa",
            "https://www.linkedin.com/company/28506256",
            "https://twitter.com/nourish_africa"
         ],
         "logo":{
            "@type":"ImageObject",
            "@id":"https://brace.afchub.org/#logo",
            "url":"https://brace.afchub.org/wp-content/uploads/2019/04/NA-1-Official.png",
            "width":848,
            "height":519,
            "caption":"ALX | E-learning and Assessment Portal"
         },
         "image":{
            "@id":"https://brace.afchub.org/#logo"
         }
      },
      {
         "@type":"WebSite",
         "@id":"https://brace.afchub.org/#website",
         "url":"https://brace.afchub.org/",
         "name":"ALX | E-learning and Assessment Portal",
         "description":"A home for 1 million agri-food entrepreneurs transforming Africa&#039;s agricultural",
         "publisher":{
            "@id":"https://brace.afchub.org/#organization"
         },
         "potentialAction":{
            "@type":"SearchAction",
            "target":"https://brace.afchub.org/?s={search_term_string}",
            "query-input":"required name=search_term_string"
         }
      },
      {
         "@type":"WebPage",
         "@id":"{{ Request::fullUrl() }}#webpage",
         "url":"{{ Request::fullUrl() }}",
         "inLanguage":"en-US",
         "name":"Welcome to ALX | E-learning and Assessment Portal Hub - ",
         "isPartOf":{
            "@id":"https://brace.afchub.org/#website"
         },
         "about":{
            "@id":"https://brace.afchub.org/#organization"
         },
         "datePublished":"2019-12-03T12:51:31+00:00",
         "dateModified":"2020-02-07T15:22:22+00:00",
         "description":""
      }
   ]
}
</script>
@endsection

@section('top-assets')
    <!-- style -->
    <link rel="stylesheet" href="{{ asset('leading_women/style.css') }}" />
    <style>
        .hero-h2 {
            font-family: 'Montserrat', serif;
            font-size: 30px;
            font-weight: 600;
            letter-spacing: 0;
            text-align: left;
            color: #780101;
            line-height: 43px;
        }

        .hero-p {
            font-family: 'Inter', serif;
            font-style: normal;
            font-weight: 400;
            font-size: 18px;
            line-height: 22px;
        }

        .overview-text {
            font-family: 'Montserrat', serif;
            font-style: normal;
            font-weight: 600;
            font-size: 24px;
            line-height: 29px;
        }

        .overview-p {
            font-family: 'Inter', serif;
            font-style: normal;
            font-weight: 400;
            font-size: 16px;
            line-height: 26px;
        }

        .objectives-text {
            font-family: 'Inter', serif;
            font-style: normal;
            font-weight: 400;
            font-size: 18px;
            line-height: 26px;
        }

        .trainer-card {
            border: 1px solid #006600;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.15);
            border-radius: 5px;
        }

        .faq-h1{
            font-family: 'Montserrat', serif;
            font-style: normal;
            font-weight: 500;
            font-size: 24px;
            line-height: 29px;
            color: #780101;
        }

        .privacy-policy-accordion-header {
            background: #FFFFFF;
            border: 1px solid #006600;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.15);
            border-radius: 5px;
            color: #333333;
            padding: 18px 28px 19px;
        }

        body{
            font-family: 'Inter', serif;
            font-style: normal;
        }
        @media (max-width:480px){ /* smartphones, iPhone, portrait 480x320 phones  */

            .hero-card{
                padding-left: 20px;
                padding-right: 20px;
            }
            .hero-h2{
                font-size: 24px;
                line-height: 29px;
                padding-left: 0px!important;
                padding-top: 10px
            }
            .hero-parent-div{
                padding-left: 0px!important;
            }
            .hero-p {
                padding-left: 0px!important;
            }
            .btn-dual{
                float: left!important;
                padding-left: 0px!important;
            }

            .hero-height{
                height: 70vh!important;
            }
            .display-none-mobile{
                display: none;
            }
            .display-none-pc{
                display: block!important;
            }
            .overview-mobile-margin{
                margin-top: 180px;
            }
            .trainer-card{
                margin-right: 0px!important;
                margin-bottom: 20px;
            }
            .trainer-div{
                padding: 10px;
            }
            .objective-video{
                width:93vw !important;
                height:475px;
            }

        }
        .button-brand-color {

            border-radius: 5px;
        }
        .hero-height{
            height: 100vh;
        }
        .display-none-pc{
            display: none;
        }

        .objective-video{
            width:648px;
            height:475px;
        }
        .tablet_margin{
            margin-top:-400px;
        }
        @media (min-width:801px)  { /* tablet, landscape iPad, lo-res laptops ands desktops */
            .tablet_margin{
                margin-top:-200px;
            }

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
                                                <h4 class="text-inter text-extra-dark-gray font-weight-700 letter-spacing-minus-1  lg-line-height-auto">Brain boost E-learning portal</h4>
                                                <p class="text-extra-dark-gray text-large margin-four-bottom ">Learn from the comfort of your home, with access to varieties of courses.</p>
                                                <a href="" target="_blank" class="btn btn-dark-gray btn-rounded btn-small no-margin-lr">About</a>
                                                <a href="" target="_blank" class="btn btn-transparent-dark-gray btn-rounded btn-small margin-20px-lr sm-margin-5px-top">Register</a>
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
                     style="background-image:url({{ asset('/images/home/slider/slide1.jpg') }});">
                    <div class="container position-relative full-screen">
                        <div class="col-md-12 slider-typography text-center text-md-left">
                            <div class="slider-text-middle-main">
                                <div class="slider-text-middle">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="bg-white-opacity p-4 border-radius-4 width-auto">
                                                <h4 class="text-inter text-extra-dark-gray font-weight-700 letter-spacing-minus-1  lg-line-height-auto">Brain boost E-learning portal</h4>
                                                <p class="text-extra-dark-gray text-large margin-four-bottom ">Learn from the comfort of your home, with access to varieties of courses.</p>
                                                <a href="" target="_blank" class="btn btn-dark-gray btn-rounded btn-small no-margin-lr">About</a>
                                                <a href="" target="_blank" class="btn btn-transparent-dark-gray btn-rounded btn-small margin-20px-lr sm-margin-5px-top">Register</a>
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

    <section class="padding-four-tb na-bg-dark-green">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-white border-right-grey">
                    <h5 class="custom-font2 text-white">What is BRACE?</h5>
                    <p class="text-inter">
                        In 2023, ALX | E-learning and Assessment Portal launched the “ALX | E-learning and Assessment Portal” (BRACE) program. BRACE is an intensive capacity development program designed to support African small and medium entrepreneurs (agriSMEs) in the agribusiness landscape to be aware about how their businesses are affected by climate change and to enable them develop strategies to adapt to and mitigate the impact of climate change through climate-smart practices. Leveraging on ICT, data, and innovation, BRACE will empower agriSMEs through training and technical support, to implement sustainable solutions to scaling their agribusinesses.
                    </p>
                </div>
                <div class="col-md-6">
                    <h5 class="custom-font2 text-white">Overview BRACE</h5>
                    <p class="bg-white p-4 text-inter border-radius-8 text-dark">
                        BRACE is a three-month capacity development program. The program will leverage a hybrid learning experience to engage entrepreneurs through training, peer-learning and practical applications.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="padding-four-tb">
        <div class="container">
            <div class="row program-benefits">
                <div class="col-12">
                    <h6 class="faq-h1 custom-font2">Benefit of Program</h6>
                </div>
                <div class="col-md-6 text-dark">
                    <ul>
                        <li>Deployment of a diagnostic tool to assess their level of awareness regarding the impact of climate change on their agribusinesses, familiarity with, and readiness to deploy, existing local solutions in the landscape.</li>
                        <li>A self-paced six (6) week online learning program with relevant and practical climate curriculum.</li>
                        <li>Hands-on practical assignments that cumulatively result in the ‘greening’ of participants' agribusinesses to better position them to leverage climate financing opportunities in the ecosystem.</li>
                        <li>Engagement in a community of practice for networking, peer-to-peer learning, experience sharing, group discussions, assignments, and co-creation of solutions.</li>
                        <li>Provision of information, resources, and tools to enable investments and decisions that lead to sustainable climate solutions.</li>
                        <li>Opportunity to join the AFC hub community for additional resources, data, funding support and market linkages to enhance business visibility, profitability, growth and success..</li>
                    </ul>
                </div>
                <div class="col-md-6 justify-content-center">
                    <img class="program-benefits-img" src="{{ asset('images/home/intro3.png') }}" alt=""/>
                </div>
            </div>
        </div>
    </section>

    <section class="wow fadeIn" style="visibility: visible; animation-name: fadeIn; padding-top: 12px;">
        <div class="container">
            <div class="row position-relative">

                <div class="col-12 col-lg-3 col-md-6 swiper-slide md-margin-four-bottom margin-10px-bottom"
                     style="width: 375px;">
                    <h6 class="faq-h1">Meet the Trainers</h6>
                    <ul class="text-dark">
                        <li>Climate experts knowledgeable on adaptation, mitigation, and climate financing.</li>
                        <li>Agribusiness entrepreneurs that have adopted climate-smart practices into their businesses.</li>
                    </ul>
                </div>

                <div class="col-12 col-lg-3 col-md-6 swiper-slide md-margin-four-bottom margin-10px-bottom"
                     style="width: 375px;">
                    <div class="team-box bg-medium-light-gray margin-half-all bg-white box-shadow-light text-center padding-nine-all sm-padding-18px-all">
                        <img src="{{ asset('/images/trainers/cromwel-b-lukorito.png') }}"
                             class="rounded-circle width-80 margin-25px-bottom md-margin-15px-bottom" alt="cromwel-b-lukorito">

                        <div class="icon-social-small">
                            <a href="https://www.linkedin.com/in/cromwel-lukorito-9949b034/" target="_blank" class="brand-text">
                                <i class="fab fa-2x fa-linkedin"></i></a><br>
                        </div>

                        <span class="brand-text text-medium text-uppercase d-block line-height-11 custom-font2 font-weight-600 margin-10px-top">Cromwel B Lukorito</span>
                    </div>
                </div>

                <div class="col-12 col-lg-3 col-md-6 swiper-slide md-margin-four-bottom margin-10px-bottom"
                     style="width: 375px;">
                    <div class="team-box bg-medium-light-gray margin-half-all bg-white box-shadow-light text-center padding-nine-all sm-padding-18px-all">
                        <img src="{{ asset('/images/trainers/dr-debisi-araba.png') }}"
                             class="rounded-circle width-80 margin-25px-bottom md-margin-15px-bottom" alt="dr-debisi-araba">

                        <div class="icon-social-small">
                            <a href="https://www.linkedin.com/in/debisiaraba/" target="_blank" class="brand-text">
                                <i class="fab fa-2x fa-linkedin"></i></a><br>
                        </div>

                        <span class="brand-text text-medium text-uppercase d-block line-height-11 custom-font2 font-weight-600 margin-10px-top">Dr Adebisi Araba</span>
                    </div>
                </div>

                <div class="col-12 col-lg-3 col-md-6 swiper-slide md-margin-four-bottom margin-10px-bottom"
                     style="width: 375px;">
                    <div class="team-box bg-medium-light-gray margin-half-all bg-white box-shadow-light text-center padding-nine-all sm-padding-18px-all">
                        <img src="{{ asset('/images/trainers/ernest-habanabakize.png') }}"
                             class="rounded-circle width-80 margin-25px-bottom md-margin-15px-bottom" alt="ernest-habanabakize">

                        <div class="icon-social-small">
                            <a href="https://www.linkedin.com/in/ernesthabana/" target="_blank" class="brand-text">
                                <i class="fab fa-2x fa-linkedin"></i></a><br>
                        </div>

                        <span class="brand-text text-medium text-uppercase d-block line-height-11 custom-font2 font-weight-600 margin-10px-top">Ernest Habanabakize</span>
                    </div>
                </div>

                <div class="col-12 col-lg-3 col-md-6 swiper-slide md-margin-four-bottom margin-10px-bottom"
                     style="width: 375px;">
                    <div class="team-box bg-medium-light-gray margin-half-all bg-white box-shadow-light text-center padding-nine-all sm-padding-18px-all">
                        <img src="{{ asset('/images/trainers/jolene-dawson.png') }}"
                             class="rounded-circle width-80 margin-25px-bottom md-margin-15px-bottom" alt="jolene-dawson">

                        <div class="icon-social-small">
                            <a href="https://www.linkedin.com/in/jolene-dawson-5246aa9/" target="_blank" class="brand-text">
                                <i class="fab fa-2x fa-linkedin"></i></a><br>
                        </div>

                        <span class="brand-text text-medium text-uppercase d-block line-height-11 custom-font2 font-weight-600 margin-10px-top">Jolene Dawson</span>
                    </div>
                </div>

                <div class="col-12 col-lg-3 col-md-6 swiper-slide md-margin-four-bottom margin-10px-bottom"
                     style="width: 375px;">
                    <div class="team-box bg-medium-light-gray margin-half-all bg-white box-shadow-light text-center padding-nine-all sm-padding-18px-all">
                        <img src="{{ asset('/images/trainers/louise-erskine.png') }}"
                             class="rounded-circle width-80 margin-25px-bottom md-margin-15px-bottom" alt="louise-erskine">

                        <div class="icon-social-small">
                            <a href="https://www.linkedin.com/in/louise-erskine/" target="_blank" class="brand-text">
                                <i class="fab fa-2x fa-linkedin"></i></a><br>
                        </div>

                        <span class="brand-text text-medium text-uppercase d-block line-height-11 custom-font2 font-weight-600 margin-10px-top">Louise Erskine</span>
                    </div>
                </div>

                <div class="col-12 col-lg-3 col-md-6 swiper-slide md-margin-four-bottom margin-10px-bottom"
                     style="width: 375px;">
                    <div class="team-box bg-medium-light-gray margin-half-all bg-white box-shadow-light text-center padding-nine-all sm-padding-18px-all">
                        <img src="{{ asset('/images/trainers/nnaemeka-ikegwuonu.png') }}"
                             class="rounded-circle width-80 margin-25px-bottom md-margin-15px-bottom" alt="nnaemeka-ikegwuonu">

                        <div class="icon-social-small">
                            <a href="http://www.linkedin.com/in/nnaemeka-ikegwuonu-78b7a222/" target="_blank" class="brand-text">
                                <i class="fab fa-2x fa-linkedin"></i></a><br>
                        </div>

                        <span class="brand-text text-medium text-uppercase d-block line-height-11 custom-font2 font-weight-600 margin-10px-top">Nnaemeka Ikegwuonu</span>
                    </div>
                </div>

                <div class="col-12 col-lg-3 col-md-6 swiper-slide md-margin-four-bottom margin-10px-bottom"
                     style="width: 375px;">
                    <div class="team-box bg-medium-light-gray margin-half-all bg-white box-shadow-light text-center padding-nine-all sm-padding-18px-all">
                        <img src="{{ asset('/images/trainers/dr-olufunso-somorin.png') }}"
                             class="rounded-circle width-80 margin-25px-bottom md-margin-15px-bottom" alt="dr-olufunso-somorin">

                        <div class="icon-social-small">
                            <a href="https://www.linkedin.com/in/funsosomorin/" target="_blank" class="brand-text">
                                <i class="fab fa-2x fa-linkedin"></i></a><br>
                        </div>

                        <span class="brand-text text-medium text-uppercase d-block line-height-11 custom-font2 font-weight-600 margin-10px-top">Dr Olufunso Somorin</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="wow fadeIn padding-three-tb" style="visibility: visible; animation-name: fadeIn;">
        <div class="container">
            <div class="row">
                <div class="col-12 na-text-dark-green">
                    <h5 class="faq-h1">Participant Commitments</h5>
                </div>
                <div class="col-12 text-left text-dark text-medium">
                    <p>This training program is valued at over $1,000. However, with the support of our funder,<br>
                        the cost has been fully covered. However, participants must commit to:</p>
                </div>
                <div class="col-md-4 padding-three-all">
                    <img src="{{ asset('/images/home/intro5.png') }}"
                         class="margin-25px-bottom md-margin-15px-bottom border-radius-8 shadow" alt="">
                </div>
                <div class="col-md-8 padding-three-all">
                    <div class="na-bg-dark-green padding-two-all text-light border-radius-8 shadow">
                        <ol>
                            <li>Attending all the six weekly live interactive sessions.</li>
                            <li>Completing the online training modules.</li>
                            <li>Submitting all assignments and actively engaging in interactions with other participants in the learning community.</li>
                            <li>Completing all pre and post program surveys and sending periodic updates and reporting about their Agribusiness climate adoption and greening process six months, a year and two years after the program.</li>
                            <li>ONLY PARTICIPANTS WHO COMPLETE THE FULL PRORGAM REQUIREMENTS WILL RECEIVE FORMAL CERTIFICATES OF PARTICIPATION AND BENEFIT FROM ON-GOING SUPPORT THAT AFC OFFERS.</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section style="background: #d3fcd3;" class="padding-five-tb">
        <div class="container">
            <h1 class="faq-h1">Frequently Asked Questions</h1>
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
                                        What types of businesses can apply / Who should apply?</span>
                                        <i class="fas float-right fa-angle-down text-dark"></i>
                                    </div>
                                </a>
                            </div>

                            <div id="accordion-3-6" class="panel-collapse collapse" data-parent="#accordion-3" style="">
                                <div class="privacy-policy-accordion-body">
                                    <p class="overview-p">Agribusinesses operating in Africa and any part of the Agribusiness sector’s value chain. </p>
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
                                        Do I need to pay to apply or participate?</span>
                                        <i class="fas float-right fa-angle-down text-dark"></i>
                                    </div>
                                </a>
                            </div>

                            <div id="accordion-3-2" class="panel-collapse collapse" data-parent="#accordion-3" style="">
                                <div class="privacy-policy-accordion-body">
                                    <p class="overview-p">
                                        No. BRACE is a completely free program supported by a funder.
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
                                        How much time am I expected to commit to the program?</span>
                                        <i class="fas float-right fa-angle-down text-dark"></i>
                                    </div>
                                </a>
                            </div>

                            <div id="accordion-3-4" class="panel-collapse collapse" data-parent="#accordion-3" style="">
                                <div class="privacy-policy-accordion-body">
                                    <p class="overview-p">
                                        <strong>Participants are expected to:</strong><br>
                                        •	Attend all the weekly webinars/check-in sessions scheduled Thursday or Friday evenings across African time zones.<br>
                                        •	Complete the self-paced online modules in 6 weeks.<br>
                                        •	Submit all online courses assignments and tasks<br>
                                        •	Spend a minimum of four (4) hours per week completing the modules and assignments.
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
