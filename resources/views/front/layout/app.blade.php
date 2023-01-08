@php
    $company = App\Company::first();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="keywords" content="{{ $company->meta_keyword }}" />
    <meta name="description" content="{{ $company->meta_description }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $company->name }}|{{ $company->meta_title }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset($company->favicon) }}" />

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,600,700&amp;display=swap">

    <!-- CSS Global Compulsory (Do not remove)-->
    <link rel="stylesheet" href="{{ asset('front/css/font-awesome/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/flaticon/flaticon.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap/bootstrap.min.css') }}" />

    <!-- Page CSS Implementing Plugins (Remove the plugin CSS here if site does not use that feature)-->
    <link rel="stylesheet" href="{{ asset('front/css/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/range-slider/ion.rangeSlider.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/owl-carousel/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/magnific-popup/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/swiper/swiper.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/animate/animate.min.css') }}" />

    <!-- Template Style -->
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}" />
</head>

<body>

    <!--=================================
    preloader -->
    <div id="pre-loader">
        <img src="{{ asset($company->logo) }}" style="height:100px" alt="{{ $company->name }}">
    </div>
    <!--=================================
    preloader -->

    <!--=================================
    header -->


    <header class="header header-03 ">
        <nav class="navbar navbar-static-top navbar-expand-lg header-sticky">
            <div class="container-fluid">
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse"
                    data-bs-target=".navbar-collapse"><i class="fas fa-align-left"></i></button>
                <a class="navbar-brand" href="{{ route('index') }}">
                    <img class="img-fluid" src="{{ asset($company->logo) }}" alt="logo">
                </a>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="contact-us.html">Home</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="contact-us.html">Offers</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="contact-us.html">About Us</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="contact-us.html">Why Choose Us</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="contact-us.html">FAQ's</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="contact-us.html">Contact Us</a>
                        </li>
                    </ul>
                </div>
                <div class="add-listing">
                    <a class="phone align-middle" href="tel:7042791249"><i
                            class="fa fa-phone me-2 fa fa-flip-horizontal"></i>{{ $company->phone }}</a>
                    <a class="login d-inline-block align-middle" href="login.html"><i
                            class="far fa-user-circle px-md-4 pe-2"></i></a>
                    {{-- <a class="btn btn-primary btn-sm" href="book-a-sitter.html">Book Sitter</a> --}}
                </div>
            </div>
        </nav>
    </header>
    <!--=================================
    header -->

    @yield('content')



    <!--=================================
    footer-->
    <footer class="footer bg-dark space-pt">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-contact-info">
                        <h5 class="text-primary">Contact Information</h5>
                        <p class="text-white">{{ $company->short_desc }}</p>
                        <ul class="list-unstyled mb-0"
                            style="background-image: url({{ asset('front/images/google-map.png') }});">
                            <li><i class="fa fa-map-signs"></i><span>{{ $company->location }}</span>
                            </li>
                            <li><i class="fa fa-microphone"></i><span>{{ $company->phone }}</span></li>
                            <li><i class="fa fa-headphones"></i><span>{{ $company->email }}</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mt-4 mt-md-0">
                    <div class="footer-link">
                        <h5 class="text-primary">Need help?</h5>
                        <ul class="list-unstyled mb-0">
                            <li><a href="faqs.html">FAQs</a></li>
                            <li><a href="about-us.html">About Us </a></li>
                            <li><a href="contact-us.html">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mt-4 mt-md-0">
                    <div class="footer-link">
                        <h5 class="text-primary">Services</h5>
                        <ul class="list-unstyled mb-0">
                            <li><a href="service-detail.html">Baby Sitters</a></li>
                            <li><a href="service-detail.html">Old Age Carer</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                    <h5 class="text-primary">Subscribe Us</h5>
                    <div class="footer-subscribe">
                        <p class="text-white">Sign up to our newsletter to get the latest news and offers.</p>
                        <form>
                            <div class="mb-3">
                                <input type="email" class="form-control" placeholder="Email*">
                            </div>
                            <button type="submit" class="btn btn-white">Get Notified</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-5 text-center text-md-start">
                        <a href="{{ route('index') }}"><img class="img-fluid footer-logo"
                                src="{{ asset($company->logo) }}" style="height:50px" alt="{{$company->name}}"></a>
                    </div>
                    <div class="col-md-2 text-center my-3 mt-md-0 mb-md-0">
                        <a id="back-to-top" class="back-to-top" href="#"><i class="fas fa-angle-up"></i></a>
                    </div>
                    <div class="col-md-5 text-center copyright text-md-end">
                        <p class="mb-0 text-white"> &copy; Copyright <span id="copyright">
                                <script>
                                    document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
                                </script>
                            </span> <a href="{{ route('index') }}"> Sitters </a> All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--=================================
        footer-->

    <!--=================================
        Javascript -->

    <!-- JS Global Compulsory (Do not remove)-->
    <script src="{{ asset('front/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('front/js/popper/popper.min.js') }}"></script>
    <script src="{{ asset('front/js/bootstrap/bootstrap.min.js') }}"></script>

    <!-- Page JS Implementing Plugins (Remove the plugin script here if site does not use that feature)-->
    <script src="{{ asset('front/js/jquery.appear.js') }}"></script>
    <script src="{{ asset('front/js/counter/jquery.countTo.js') }}"></script>
    <script src="{{ asset('front/js/select2/select2.full.js') }}"></script>
    <script src="{{ asset('front/js/range-slider/ion.rangeSlider.min.js') }}"></script>
    <script src="{{ asset('front/js/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('front/js/jarallax/jarallax.min.js') }}"></script>
    <script src="{{ asset('front/js/jarallax/jarallax-video.min.js') }}"></script>
    <script src="{{ asset('front/js/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('front/js/swiper/swiper.min.js') }}"></script>
    <script src="{{ asset('front/js/swiperanimation/SwiperAnimation.min.js') }}"></script>
    <script src="{{ asset('front/js/shuffle/shuffle.min.js') }}"></script>

    <!-- Template Scripts (Do not remove)-->
    <script src="{{ asset('front/js/custom.js') }}"></script>
    @yield('js')

</body>

</html>
