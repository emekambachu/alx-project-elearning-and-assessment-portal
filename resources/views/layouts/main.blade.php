<!doctype html>
<html class="no-js" lang="en">

<head>
    <!-- title -->
    <title>@yield('title') - ALX | E-learning and Assessment Portal </title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
    <meta name="author" content="nourishing africa">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSRF Token -->
    <script>window.Laravel = {csrfToken: '{{ csrf_token() }}'}</script>

    <!--SEO-->
    @yield('meta')

    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('images/logoonly.jpg') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logoonly.jpg') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('images/logoonly.jpg') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('images/logoonly.jpg') }}">

    <!-- animation -->
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}" />
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <!-- et line icon -->
    <link rel="stylesheet" href="{{ asset('css/et-line-icons.css') }}" />

    <!-- font-awesome icon -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" />

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
          integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- themify icon -->
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">

    <!-- swiper carousel -->
    <link rel="stylesheet" href="{{ asset('css/swiper.min.css') }}">

    <!-- justified gallery -->
    <link rel="stylesheet" href="{{ asset('css/justified-gallery.min.css') }}">

    <!-- magnific popup -->
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}" />

    <!-- revolution slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('revolution/css/settings.css') }}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ asset('revolution/css/layers.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('revolution/css/navigation.css') }}">

    <!-- bootsnav -->
    <link rel="stylesheet" href="{{ asset('css/bootsnav.css') }}">

    <!-- bootstrap tags -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-tagsinput.css') }}" />

    <!-- style -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

    <!-- responsive css -->
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}" />

    <!--[if IE]>
    <script src="{{ asset('js/html5shiv.js') }}"></script>
    <![endif]-->

    <!-- Basic stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">

    <!-- Default Theme -->
    <link rel="stylesheet" href="{{ asset('css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('css/intlTelInput.css') }}">

    <!-- font awesome -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('custom/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/custom-new.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/brace-overview.css') }}" />

    @yield('top-assets')
    <!-- GTranslate: https://gtranslate.io/ -->
    <style type="text/css">
        <!--
        a.gflag {
            vertical-align:middle;
            font-size:16px;
            padding:1px 0;
            background-repeat:no-repeat;
            background-image:url(//gtranslate.net/flags/16.png);
        }
        a.gflag img {
            border:0;
        }
        a.gflag:hover {
            background-image:url(//gtranslate.net/flags/16a.png);
        }
        #goog-gt-tt {display:none !important;}
        .goog-te-banner-frame {display:none !important;}
        .goog-te-menu-value:hover {text-decoration:none !important;}
        body {
            top:0 !important;
        }
        #google_translate_element2 {
            display: none!important;
        }
        -->
        ul.nav>li.simple-dropdown>ul.dropdowwn-menu {
            margin-top: -100px !important;
        }
    </style>

    <div id="google_translate_element2"></div>

    <!--Google Translate-->
    <script type="text/javascript">
        function googleTranslateElementInit2() {
            new google.translate.TranslateElement({
                pageLanguage: 'en',autoDisplay: false
            }, 'google_translate_element2');
        }
    </script>

    <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>

    <script type="text/javascript">
        /* <![CDATA[ */
        eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('6 7(a,b){n{4(2.9){3 c=2.9("o");c.p(b,f,f);a.q(c)}g{3 c=2.r();a.s(\'t\'+b,c)}}u(e){}}6 h(a){4(a.8)a=a.8;4(a==\'\')v;3 b=a.w(\'|\')[1];3 c;3 d=2.x(\'y\');z(3 i=0;i<d.5;i++)4(d[i].A==\'B-C-D\')c=d[i];4(2.j(\'k\')==E||2.j(\'k\').l.5==0||c.5==0||c.l.5==0){F(6(){h(a)},G)}g{c.8=b;7(c,\'m\');7(c,\'m\')}}',43,43,'||document|var|if|length|function|GTranslateFireEvent|value|createEvent||||||true|else|doGTranslate||getElementById|google_translate_element2|innerHTML|change|try|HTMLEvents|initEvent|dispatchEvent|createEventObject|fireEvent|on|catch|return|split|getElementsByTagName|select|for|className|goog|te|combo|null|setTimeout|500'.split('|'),0,{}))
        /* ]]> */
    </script>

</head>

<body>


<header class="m-0">
    <!-- start navigation -->
    <nav class="navbar navbar-default bootsnav text-dark navbar-expand-lg bg-white">
        <div class="container-fluid nav-header-container" style='padding-top: 10px;'>
            <!-- start logo -->
            <div class="col-auto pl-md-5">
                <a href="{{ url('/') }}" title="ALX | Elearning and Assessment Portal" >
                    <img src="{{ asset('images/logo.png') }}"
                         data-rjs="{{ asset('images/logo.png') }}" width="150px"
                         class="logo-light default" alt="logo">
                </a><br>
            </div>
            <!-- end logo -->

            <div class="col accordion-menu pr-0 pr-md-3">
                <button type="button" class="navbar-toggler collapsed"
                        data-toggle="collapse" data-target="#navbar-collapse-toggle-1">
                    <span class="sr-only">toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="navbar-collapse collapse justify-content-md-center" id="navbar-collapse-toggle-1">
                    <ul id="accordion" class="nav navbar-nav navbar-left no-margin alt-font text-normal navtopmenu" data-in="fadeIn" data-out="fadeOut">
                        <li class="dropdown simple-dropdown">
                            <a href="{{ route('home') }}">Home</a>
                        </li>

                        <li class="dropdown simple-dropdown">
                            <a href="{{ route('about') }}">About</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-auto pr-lg-0">
                <div class="pr-md-5">
                        <ul id="accordion-mobile"
                            class="nav navbar-nav no-margin alt-font text-normal d-none d-sm-none d-md-none d-lg-block"
                            data-in="fadeIn" data-out="fadeOut"
                            style="background-color: transparent !important;">
                            <li class="dropdown simple-dropdown"
                                style="background-color: #efb443 !important; border-radius: 5px;">
                                <a href="javascript:void(0)" class="m-0 text-white"
                                   style="background-color: #fea972 !important; padding: 8px; border-radius: 5px;
                                   font-family: inter,serif; font-size: 14px;">Register / Login
                                    <i class="dropdown-toggle" data-toggle="dropdown" aria-hidden="true"></i>
                                </a>
                                <!-- start sub menu -->
                                <ul class="dropdown-menu" role="menu"
                                    style="margin-top: 15px; margin-left: -25px;">
                                    <li class="dropdown">
                                        <a class="dropdown-toggle"
                                           data-toggle="dropdown" href="{{ route('learning.register') }}">
                                            Register</a>
                                    </li>
                                    <li class="dropdown">
                                        <a class="dropdown-toggle"
                                           data-toggle="dropdown" href="{{ route('learning.login') }}">
                                            Login</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                </div>
            </div>

        </div>
    </nav>
    @yield('top-assets')

</header>
@yield('content')

<!-- start footer -->
<footer class="footer-standard-dark footer-bg bg-navy-blue">
    <div class="footer-widget-area padding-three-top sm-padding-10px-top">
        <div class="container-fluid pl-5 pr-5">
            <div class="row">
                <div class="col-lg-3 col-md-6 widget md-no-border-right md-margin-30px-bottom sm-text-center">
                    <!-- start logo -->
                    <a href="#" class="margin-20px-bottom d-inline-block">
                        <img class="footer-logo-new" src="{{ asset('images/logo-white.png') }}"
                             data-rjs="{{ asset('images/logo-white.png') }}"
                             alt="nourishing africa logo"/></a>
                    <!-- end logo -->
                    <br/>
                </div>

                <!-- start additional links -->
                <div class="col-lg-3 col-md-6 widget padding-45px-left md-padding-15px-left md-no-border-right md-margin-30px-bottom text-center text-md-left">
                    <div class="widget-title add-link margin-10px-bottom font-weight-300"
                         style="color:#FFF">Quick Links</div>
                    <ul class="list-unstyled add-link-sub">
                        <li><a class="text-small text-white"
                               href="">Subscribe</a></li>
                        <li><a class="text-small text-white" href="{{ route('about') }}">About us</a></li>
                        <li><a class="text-small text-white"
                               href="">FAQs</a></li>
                    </ul>
                </div>
                <!-- end additional links -->

                <!-- start contact information -->
                <div class="col-lg-3 col-md-6 widget padding-45px-left md-padding-15px-left md-clear-both md-no-border-right sm-margin-30px-bottom text-center text-md-left">
                    <div class="widget-title add-link margin-10px-bottom font-weight-300"
                         style="color:#FFF">Contact Info</div>

                    <div class="text-small add-link-sub" style="color:#FFF">
                        <i class="far fa-envelope fa-2x p-2"></i>
                        <a href="">
                            <span class="add-link-sub"> </span>
                        </a>
                    </div>

                    <div class="social-icon-style-8 d-inline-block vertical-align-middle p-2">
                        <ul class="small-icon no-margin-bottom">
                            <li><a class="facebook text-white-2"
                                   href="" target="_blank">
                                    <i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                            <li><a class="twitter text-white-2"
                                   href="" target="_blank">
                                    <i class="fab fa-twitter"></i></a></li>
                            <li><a class="linkedin text-white-2"
                                   href="" target="_blank">
                                    <i class="fab fa-linkedin"></i></a></li>
                            <li><a class="instagram text-white-2"
                                   href="" target="_blank">
                                    <i class="fab fa-instagram no-margin-right" aria-hidden="true"></i></a></li>
                            <li><a class="instagram text-white-2"
                                   href="" target="_blank">
                                    <i class="fab fa-youtube no-margin-right" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- end contact information -->

                <!-- Start Social -->
                <div class="col-lg-3 col-md-6 widget padding-5px-left md-padding-15px-left text-center text-md-left">
                    <div class="widget-title subscribe-text text-medium-gray margin-20px-bottom font-weight-300"
                         style="color:#FFF">Get early access to information on agriculture</div>
                    <div class="input-group justify-content-center">
                        <form action=""
                              method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form"
                              class="validate" target="_blank" novalidate>
                            <div class="row">
                                <div class="col-9 col-9 no-padding">
                                    <input type="email" class="footer-subscribe"
                                           name="EMAIL" id="mce-FNAME"
                                           placeholder="Enter your email">
                                </div>
                                <div class="col-3 col-3 no-padding">
                                    <span class="input-group-btn">
                                        <button class="btn md-float-left" type="submit">
                                            subscribe</button>
                                    </span>
                                </div>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
            <!-- End Social -->
        </div>
    </div>

    <div class="footer-bg padding-15px-tb text-center sm-padding-10px-tb">
        <div class="container">
            <div class="row">
                <!-- start copyright -->
                <div class="col-md-12 text-small text-center footer-content">
                    &copy; {{ date('Y') }} {{ config('app.name') }}</div>
                <!-- end copyright -->
            </div>
        </div>
    </div>

</footer>
<!-- end footer -->

<!-- start scroll to top -->
<a class="scroll-top-arrow" href="javascript:void(0);">
    <i class="ti-arrow-up"></i>
</a>
<!-- end scroll to top -->
<!-- javascript libraries -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>

<script type="text/javascript" src="{{ asset('js/bootstrap.bundle.js') }}"></script>
{{--<script type="text/javascript" src="{{ asset('js/jquery.easing.1.3.js') }}"></script>--}}
<script type="text/javascript" src="{{ asset('js/skrollr.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/smooth-scroll.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.appear.js') }}"></script>
<!-- menu navigation -->
<script type="text/javascript" src="{{ asset('js/bootsnav.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.nav.js') }}"></script>
<!-- animation -->
<script type="text/javascript" src="{{ asset('js/wow.min.js') }}"></script>
<!-- page scroll -->
<script type="text/javascript" src="{{ asset('js/page-scroll.js') }}"></script>
<!-- swiper carousel -->
<script type="text/javascript" src="{{ asset('js/swiper.min.js') }}"></script>
<!-- counter -->
<script type="text/javascript" src="{{ asset('js/jquery.count-to.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/intlTelInput.js') }}"></script>
<!-- parallax -->
<script type="text/javascript" src="{{ asset('js/jquery.stellar.js') }}"></script>
<!-- magnific popup -->
<script type="text/javascript" src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<!-- portfolio with shorting tab -->
<script type="text/javascript" src="{{ asset('js/isotope.pkgd.min.js') }}"></script>
<!-- images loaded -->
<script type="text/javascript" src="{{ asset('js/imagesloaded.pkgd.min.js') }}"></script>
<!-- pull menu -->
<script type="text/javascript" src="{{ asset('js/classie.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/hamburger-menu.js') }}"></script>
<!-- counter -->
<script type="text/javascript" src="{{ asset('js/counter.js') }}"></script>
<!-- fit video -->
<script type="text/javascript" src="{{ asset('js/jquery.fitvids.js') }}"></script>

<!-- skill bars -->
<script type="text/javascript" src="{{ asset('js/skill.bars.jquery.js') }}"></script>
<!-- justified gallery -->
<script type="text/javascript" src="{{ asset('js/justified-gallery.min.js') }}"></script>
<!--pie chart-->
<script type="text/javascript" src="{{ asset('js/jquery.easypiechart.min.js') }}"></script>
<!-- instagram -->
<script type="text/javascript" src="{{ asset('js/instafeed.min.js') }}"></script>
<!-- retina -->
<script type="text/javascript" src="{{ asset('js/retina.min.js') }}"></script>
<!-- revolution -->
<script type="text/javascript" src="{{ asset('revolution/js/jquery.themepunch.tools.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>

<script src="{{ asset('js/owl.carousel.js') }}"></script>
<script src="{{ asset('custom/js/libs/jquery-ui-1.12.1/jquery-ui.min.js') }}"></script>
<script src="{{ asset('custom/js/smart-search.js') }}"></script>


@yield('bottom-assets')

</body>

</html>
