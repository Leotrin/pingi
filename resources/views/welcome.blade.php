<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>pingi.io</title>
    <link rel="icon" href="/assets/images/logo-white.png" type="image/png">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="Ping, pingi, mangosoft, pingifier, track, website, server, up, down, notify, email" />
    <meta name="description" content="Pingi.io uses a smart algorithm to watch over your website and notify you through various channels in case of problems. It checks for response from your website every x minutes and if we receive status which is suspicious our algorithm will do a deeper analysis based on different variables and decide if there is something wrong." />
    <meta name="author" content="www.mangosoft.mk" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Google Fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&amp;Raleway:300,400,500,600,700,800,900">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="/web/css/bootstrap.min.css">

    <!-- owl-carousel -->
    <link rel="stylesheet" type="text/css" href="/web/css/owl-carousel/owl.carousel.css" />

    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="/web/css/font-awesome.css" />

    <!-- Magnific Popup -->
    <link rel="stylesheet" type="text/css" href="/web/css/magnific-popup/magnific-popup.css" />

    <!-- Animate -->
    <link rel="stylesheet" type="text/css" href="/web/css/animate.css" />

    <!-- Ionicons -->
    <link rel="stylesheet" href="/web/css/ionicons.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="/web/css/style.css">

    <!-- Responsive -->
    <link rel="stylesheet" href="/web/css/responsive.css">

    <!-- custom style -->
    <link rel="stylesheet" href="/web/css/custom.css" />

</head>

<body>

<!-- loading -->

<div id="loading" class="green-bg">
    <div id="loading-center">
        <div class="boxLoading"></div>
    </div>
</div>

<!-- loading End -->



<!-- Header -->

<header id="header-wrap" data-spy="affix" data-offset-top="55">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <nav class="navbar navbar-default">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="{{url('/')}}">
                            <img src="/assets/images/logo-white.png" alt="Pingi.io Logo">
                        </a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right" id="top-menu">

                            @auth
                                <li><a href="{{ url('/home') }}">Home</a></li>
                            @else
                                <li><a href="{{ route('login') }}">Login</a></li>

                                @if (Route::has('register'))
                                    <li><a href="{{ route('register') }}">Register</a></li>
                                @endif
                            @endauth
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </nav>
            </div>
        </div>
    </div>
</header>

<!-- Header End -->

<!-- Banner -->

<section id="iq-home" class="bannerq-bg iq-bg-fixed iq-over-black-90">
    <div class="container">
        <div class="row banner-text">
            <div class="col-md-8 col-lg-8 hidden-xs hidden-sm">
                <h1 class="iq-font-white iq-tw-8" data-animation="animated fadeInLeft">
                    <small class="iq-font-white iq-tw-6"><b class="iq-font-white">&#9679;</b> Use pingi.io be creative not concerned.</small>
                    TRACK SITE STAUS 24/7</h1>
            </div>
            <div class="col-md-4 col-lg-4">
                <form class="banner-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-icon">
                        <img class="img-responsive center-block" src="/assets/images/logo-white.png" alt="#">
                    </div>
                    <h3 class="iq-tw-7">
                        <small>Welcome to pingi!</small>
                        Log in now
                    </h3>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>The login credentials doesn't match</strong>
                    </span>
                    @enderror
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="text-uppercase">User email</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Email  Address">
                        <i class="ion-ios-person"></i>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" class="text-uppercase">Password</label>
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
                        <i class="ion-ios-unlocked"></i>
                    </div>
                    <div class="remember-checkbox iq-pt-10">
                        <input type="checkbox" name="one" id="one">
                        <label class="remember" for="one">Remember me</label>
                    </div>
                    <button type="submit" class="button btn-block text-center iq-mt-30">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <div class="wave1"></div>
</section>

<!-- Banner End -->


<div class="main-content">
    <!-- How it Works -->

    <section class="overview-block-ptb iq-how-it-work">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="heading-title">
                        <h5 class="iq-tw-3 iq-mt-40 iq-plr-90">
                            Every website developer or owner has had issues over time, things just sometimes go wrong, some you control but some you don’t. Pingi.io will help you to know ASAP if something goes wrong. With pingi.io you guard your website 24/7 and act ASAP in case of problems.
                        </h5>
                        <div class="divider"></div>
                        <h2 class="title iq-tw-6">How it Works</h2>
                        <div class="divider"></div>
                        <h6 class="iq-tw-3 iq-mt-40 iq-plr-90">
                            Pingi.io uses a smart algorithm to watch over your website and notify you through various channels in case of problems. It checks for response from your website every x minutes and if we receive status which is suspicious our algorithm will do a deeper analysis based on different variables and decide if there is something wrong.
                            <br />
                            We provide much more, response time charts, up and down time charts etc.
                            <br />
                            Use pingi.io be creative not concerned.
                        </h6>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="iq-Work-box text-center">
                        <div class="Work-icon">
                            <i aria-hidden="true" class="ion-ios-photos-outline"></i>
                            <div class="line"></div>
                        </div>
                        <h5 class="iq-tw-6 iq-mt-20 iq-mb-15">Your Websites</h5>
                        <p>
                            Enter your website link, set how many times hourly or daily you want the algorithm to do check for your website status.
                        </p>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4 re-mt-30">
                    <div class="iq-Work-box text-center">
                        <div class="Work-icon">
                            <i aria-hidden="true" class="ion-ios-pie-outline"></i>
                            <div class="line"></div>
                        </div>
                        <h5 class="iq-tw-6 iq-mt-20 iq-mb-15">Up & Down</h5>
                        <p>
                            Visually represented data for each of your website registered and tracked.
                        </p>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4 re-mt-30">
                    <div class="iq-Work-box text-center">
                        <div class="Work-icon">
                            <i aria-hidden="true" class="ion-ios-heart-outline"></i>
                        </div>
                        <h5 class="iq-tw-6 iq-mt-20 iq-mb-15">Track Status</h5>
                        <p>
                            Whenever we receive status which is suspicious our algorithm will do a deeper analysis and notify you depending on Status.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- How it Works END -->


</div>


<div class="footer">


    <!-- Footer -->

    <footer class="iq-footer white-bg text-center">
        <div class="container">
            <div class="row iq-ptb-60">
                <div class="col-sm-12">
                    <div class="heading-title iq-mb-40">
                        <h2 class="title iq-tw-6">Subscribe Our Newsletter</h2>
                        <div class="divider"></div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <form class="form-inline iq-subscribe">
                        <div class="form-group">
                            <input type="text" class="form-control" id="exampleInputName2" placeholder="Enter Your Email Here">
                        </div>
                        <a class="button iq-ml-25" href="# ">subscribe</a>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="footer-copyright iq-ptb-20">© Copyright 2020 Pingi.io Developed by <a target="_blank" href="https://mangosoft.mk/">Mangosoft</a>.</div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Footer END -->
</div>

<!-- back-to-top -->

<div id="back-to-top">
    <a class="top" href="#top"> <i class="ion-ios-upload-outline"></i> </a>
</div>

<!-- back-to-top End -->





<!-- jQuery -->
<script src="/web/js/jquery.min.js"></script>

<!-- owl-carousel -->
<script src="/web/js/owl-carousel/owl.carousel.min.js"></script>

<!-- Counter -->
<script src="/web/js/counter/jquery.countTo.js"></script>

<!-- Jquery Appear -->
<script src="/web/js/jquery.appear.js"></script>

<!-- Magnific Popup -->
<script src="/web/js/magnific-popup/jquery.magnific-popup.min.js"></script>

<!-- Retina -->
<script src="/web/js/retina.min.js"></script>

<!-- wow -->
<script src="/web/js/wow.min.js"></script>

<!-- Countdown -->
<script src="/web/js/jquery.countdown.min.js"></script>

<!-- bootstrap -->
<script src="/web/js/bootstrap.min.js"></script>

<!-- Custom -->
<script src="/web/js/custom.js"></script>

</body>

</html>

