<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link href="img/devicon.png" rel="shortcut icon" type="image/x-icon">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('css/cli/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/cli/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/cli/ticker-style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/cli/flaticon.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/cli/slicknav.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/cli/animate.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/cli/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/cli/fontawesome-all.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/cli/themify-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/cli/slick.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/cli/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/cli/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/cli/customstyle.css') }}" type="text/css">
</head>

<body>
    <header>
        <!-- Header Start -->
        <div class="header-area">
            <div class="main-header ">

                <div class="header-mid d-none d-md-block">
                    <div class="container">
                        <div class="row d-flex align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-3 col-lg-3 col-md-3">
                                <div class="logo">
                                    <a href="{{ route('home') }}"><img class="logo-img"
                                            src="{{ asset('img/devicon.png') }}" alt=""></a>
                                </div>
                            </div>
                            <div class="col-xl-9 col-lg-9 col-md-9">
                                <div class="header-banner f-right ">
                                    <img src="{{ asset('img/secdes/header_card.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="header-bottom header-sticky">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xl-10 col-lg-10 col-md-12 header-flex">
                                <!-- sticky -->
                                <div class="sticky-logo">
                                    <a href="{{ route('home') }}"><img class="logo-img-sm"
                                            src="{{ asset('img/devicon.png') }}" alt=""></a>
                                </div>

                                <!-- Mobile Menu -->
                                <div class="col-12">
                                    <div class="mobile_menu d-block d-md-none"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Header End -->
    </header>

    @yield('content')
    <footer>
        <!-- Footer Start-->
        <div class="footer-area footer-padding fix">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-5 col-lg-5 col-md-7 col-sm-12">
                        <div class="single-footer-caption">
                            <div class="single-footer-caption">
                                <!-- logo -->
                                <div class="footer-logo">
                                    <a href="index.html"><img src="assets/img/logo/logo2_footer.png" alt=""></a>
                                </div>
                                <div class="footer-tittle">
                                    <div class="footer-pera">

                                    </div>
                                </div>
                                <!-- social -->
                                <div class="footer-social">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4  col-sm-6">
                        <div class="single-footer-caption mt-60">
                            <div class="footer-tittle">
                                <h4>Contato</h4>
                                <p>E-mail:eversonfelix_mb@hotmail.com </p>
                                <p>Telefone:(19) 9 9987-7051</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-5 col-sm-6">
                    <div class="single-footer-caption mb-50 mt-60">


                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- footer-bottom aera -->
        <div class="footer-bottom-area">
            <div class="container">
                <div class="footer-border">
                    <div class="row d-flex align-items-center justify-content-between">
                        <div class="col-lg-6">
                            <div class="footer-copy-right">
                                <p>
                                    Copyright &copy;<script>
                                        document.write(new Date().getFullYear());
                                    </script> All rights reserved | Desenvolvido por Everson
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="footer-menu f-right">
                                <ul>
                                    <!-- <li><a href="#">Terms of use</a></li> -->
                                    <!-- <li><a href="#">Privacy Policy</a></li> -->
                                    <!-- <li><a href="#">Contact</a></li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>

    <!-- JS here -->

    <!-- All JS Custom Plugins Link Here here -->
    <script src="{{ asset('js/cli/vendor/modernizr-3.5.0.min.js') }}"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{ asset('js/cli/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('js/cli/popper.min.js') }}"></script>
    <script src="{{ asset('js/cli/bootstrap.min.js') }}"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{ asset('js/cli/jquery.slicknav.min.js') }}"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{ asset('js/cli/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/cli/slick.min.js') }}"></script>
    <!-- Date Picker -->
    <script src="{{ asset('js/cli/gijgo.min.js') }}"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="{{ asset('js/cli/wow.min.js') }}"></script>
    <script src="{{ asset('js/cli/animated.headline.js') }}"></script>
    <script src="{{ asset('js/cli/jquery.magnific-popup.js') }}"></script>

    <!-- Breaking New Pluging -->
    <script src="{{ asset('js/cli/jquery.ticker.js') }}"></script>
    <script src="{{ asset('js/cli/site.js') }}"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="{{ asset('js/cli/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('js/cli/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('js/cli/jquery.sticky.js') }}"></script>

    <!-- contact js -->
    <script src="{{ asset('js/cli/contact.js') }}"></script>
    <script src="{{ asset('js/cli/jquery.form.js') }}"></script>
    <script src="{{ asset('js/cli/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/cli/mail-script.js') }}"></script>
    <script src="{{ asset('js/cli/jquery.ajaxchimp.min.js') }}"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="{{ asset('js/cli/plugins.js') }}"></script>
    <script src="{{ asset('js/cli/main.js') }}"></script>

</body>

</html>