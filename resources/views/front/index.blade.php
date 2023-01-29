@extends('front.layout.app')

@section('content')

    <!--=================================
        banner -->
    <section class="bg-light space-ptb bg-holder" style="background-image: url({{asset($company->main_image)}});">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-9">
                    <h1>{{$company->main_content}}</h1>
                    <p class="lead fw-normal">{{$company->main_content_subtitle}}</p>
                    <form class="row g-2 mt-4 align-items-center" method="POST" action="{{route('search')}}">
                        @csrf
                        <div class="mb-3 mt-0 select-border col-md-5">
                            <label class="form-label">Choose your care</label>
                            <select class="form-control" name="service">
                                <option value="1" selected="selected">Babysitter or Nanny</option>
                                <option value="2">Senior Care Sitter</option>
                            </select>
                        </div>
                        <div class="col-md-7 mb-3 mt-0">
                            <label class="form-label">City or postal code</label>
                            <input type="text" name="address" required class="form-control" id="search_input">
                            <input type="hidden" name="latitude" id="latitude">
                            <input type="hidden" name="longitude" id="longitude">
                        </div>
                        <div class="mb-3 mt-0 col-sm-12 mb-0">
                            <button type="submit" class="btn btn-dark">I Find my next caregiver!</button>
                        </div>
                        <a href="{{route('customerlogin')}}" id="care_giver">
                            I'm a care giver
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
          banner -->

    <!--=================================
          Video section-->
    <section class="space-ptb">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-9">
                  
                    <p class="mt-4">The best way is to develop and follow a plan. Start with your goals in mind and then
                        work backward to develop the plan. What steps are required to get you to the goals? Make the plan as
                        detailed as possible. Try to visualize and then plan for, every possible setback. Commit the plan to
                        paper and then keep it with you at all times. Review it regularly and ensure that every step takes
                        you closer to your Vision and Goals. If the plan doesn’t support the vision then change it!</p>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="feature-info text-center">
                        <div class="feature-info-icon">
                            <i class="flaticon-save-money"></i>
                        </div>
                        <div class="feature-info-content">
                            <h4 class="feature-info-title">Affordable Prices</h4>
                            <p>Remind yourself you have nowhere to go except up as you have already been at the bottom.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="feature-info text-center">
                        <div class="feature-info-icon">
                            <i class="flaticon-user"></i>
                        </div>
                        <div class="feature-info-content">
                            <h4 class="feature-info-title">Dedicated Attitude</h4>
                            <p>Give yourself the power Remind yourself the only thing stopping you is yourself.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-info text-center">
                        <div class="feature-info-icon">
                            <i class="flaticon-boosting-potential"></i>
                        </div>
                        <div class="feature-info-content">
                            <h4 class="feature-info-title">Experienced Experts</h4>
                            <p>What drives me? The thing that drives me most is the desire to find my extend them.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
          Video section-->

    <!--=================================
          Challenge-->
    <section class="mt-0 mt-lg-5 bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="space-ptb">
                        <div class="section-title">
                            <h2 class="text-white">Excellent Baby or Senior Care for Extraordinary Families</h2>
                        </div>
                        <ul class="list-unstyled mb-4 mb-lg-0">
                            <li class="text-white mb-3 d-flex"> <i
                                    class="fas fa-check-circle font-xl text-primary me-3"></i> Give yourself the power of
                                responsibility. Remind yourself the only thing stopping you is yourself.</li>
                            <li class="text-white mb-3 d-flex"> <i
                                    class="fas fa-check-circle font-xl text-primary me-3"></i> Make a list of your
                                achievements toward your long-term goal and remind yourself that intentions. </li>
                            <li class="text-white mb-3 d-flex"> <i
                                    class="fas fa-check-circle font-xl text-primary me-3"></i> Let success motivate you.
                                Find a picture of what epitomizes success to you and then pull it out.</li>
                            <li class="text-white d-flex"> <i class="fas fa-check-circle font-xl text-primary me-3"></i>
                                Reflect and experiment until you find the right combination of motivators for your
                                personality.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 pb-5 pb-lg-0">
                    <img class="mt-n5 img-fluid" src="{{asset('front/images/service/service-detail-01.jpg')}}" alt="">
                </div>
            </div>
        </div>
    </section>
    <!--=================================
          Challenge-->

    <!--=================================
          Our Approach -->
    <section class="space-ptb">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="section-title is-sticky-column">
                        <h2>Our Approach</h2>
                        <h6>Remind yourself the only thing stopping you is yourself.</h6>
                        <p>Having clarity of purpose and a clear picture of what you desire, is probably the single most
                            important factor in achievement. Why is Clarity so important?</p>
                        <div class="bg-light p-5 mt-4">
                            <h4>Have a Question?</h4>
                            <p>Check out our frequently asked questions</p>
                            <a href="faqs.html" class="btn btn-primary">Get Quote</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-7 offset-lg-1">
                    <div class="mb-5">
                        <div class="section-title mb-4">
                            <span class="display-4 fw-bold text-primary">01</span>
                            <h3>Let us know your need</h3>
                            <p>Positive pleasure-oriented goals are much more powerful motivators than negative fear-based
                                ones.</p>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="list-unstyled">
                                    <li class="mb-3 d-flex"><i
                                            class="far fa-check-circle font-xl text-primary me-3"></i>Taxation Advisory
                                    </li>
                                    <li class="mb-3 d-flex"><i class="far fa-check-circle font-xl text-primary me-3"></i>Tax
                                        Planning Preparation</li>
                                    <li class="d-flex"><i
                                            class="far fa-check-circle font-xl text-primary me-3"></i>Accounting Outsourcing
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul class="list-unstyled">
                                    <li class="mb-3 d-flex"><i
                                            class="far fa-check-circle font-xl text-primary me-3"></i>Taxation Advisory
                                    </li>
                                    <li class="mb-3 d-flex"><i
                                            class="far fa-check-circle font-xl text-primary me-3"></i>Tax Planning
                                        Preparation</li>
                                    <li class="d-flex"><i
                                            class="far fa-check-circle font-xl text-primary me-3"></i>Accounting
                                        Outsourcing</li>
                                </ul>
                            </div>
                        </div>
                        <img class="img-fluid mt-4" src="{{asset('front/images/service/24.jpg')}}" alt="">
                    </div>
                    <div class="mb-5">
                        <div class="section-title mb-4">
                            <span class="display-4 fw-bold text-primary">02</span>
                            <h3>Meet the team</h3>
                            <p>Positive pleasure-oriented goals are much more powerful motivators than negative fear-based
                                ones.</p>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="list-unstyled">
                                    <li class="mb-3 d-flex"><i
                                            class="far fa-check-circle font-xl text-primary me-3"></i>Taxation Advisory
                                    </li>
                                    <li class="d-flex"><i class="far fa-check-circle font-xl text-primary me-3"></i>Tax
                                        Planning Preparation</li>
                                </ul>
                            </div>
                        </div>
                        <img class="img-fluid mt-4" src="{{asset('front/images/service/25.jpg')}}" alt="">
                    </div>
                    <div class="mb-0">
                        <div class="section-title mb-4">
                            <span class="display-4 fw-bold text-primary">03</span>
                            <h3>Find Your Ideal Sitter</h3>
                            <p>Positive pleasure-oriented goals are much more powerful motivators than negative fear-based
                                ones.</p>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="list-unstyled">
                                    <li class="mb-3 d-flex"><i
                                            class="far fa-check-circle font-xl text-primary me-3"></i>Taxation Advisory
                                    </li>
                                    <li class="d-flex"><i
                                            class="far fa-check-circle font-xl text-primary me-3"></i>Accounting
                                        Outsourcing</li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul class="list-unstyled">
                                    <li class="d-flex"><i
                                            class="far fa-check-circle font-xl text-primary me-3"></i>Accounting
                                        Outsourcing</li>
                                </ul>
                            </div>
                        </div>
                        <img class="img-fluid mt-4" src="{{asset('front/images/service/26.jpg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
          Our Approach -->

    <!--=================================
          Services -->
    <section class="space-pb o-hidden">
        <div class="container-fluid p-0">
            <div class="row g-0 text-center">
                <div class="col-sm-6 col-lg-3 bg-dark p-5">
                    <i class="flaticon-user display-1 text-primary"></i>
                    <h4 class="text-white mt-4">Baby Sitters</h4>
                    <a class="btn btn-primary btn-sm mt-3" href="#">Learn More</a>
                </div>
                <div class="col-sm-6 col-lg-3 bg-primary p-5">
                    <i class="flaticon-user display-1 mb-4"></i>
                    <h4 class="mt-4">Senior BabySitters</h4>
                    <a class="btn btn-light btn-sm mt-3" href="#">Learn More</a>
                </div>
                <div class="col-sm-6 col-lg-3 bg-light p-5">
                    <i class="flaticon-boosting-potential display-1 text-dark"></i>
                    <h4 class="mt-4">Mother's Helpers</h4>
                    <a class="btn btn-dark btn-sm mt-3" href="#">Learn More</a>
                </div>
                <div class="col-sm-6 col-lg-3 bg-overlay-theme-20 p-5">
                    <div class="position-relative">
                        <i class="flaticon-recruitment display-1 text-dark"></i>
                        <h4 class="text-dark mt-4">Personal Care</h4>
                        <a class="btn btn-primary btn-sm mt-3" href="#">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
          Services -->


    <!--=================================
          Clients -->
    <section class="space-sm-pb clients-section-02">
        <div class="container">
            <div class="row our-clients align-items-center">
                <div class="col-lg-3 col-md-5 col-sm-6">
                    <h4>As Featured In...</h4>
                </div>
                <div class="col-lg-9 col-md-7 col-sm-6">
                    <div class="owl-carousel testimonial-center owl-nav-bottom-center" data-nav-arrow="false"
                        data-items="4" data-md-items="3" data-sm-items="2" data-xs-items="2" data-xx-items="1"
                        data-space="40" data-autoheight="true">
                        <div class="item">
                            <img class="img-fluid center-block mx-auto" src="{{asset('front/images/client/01.svg')}}" alt="">
                        </div>
                        <div class="item">
                            <img class="img-fluid center-block mx-auto" src="{{asset('front/images/client/02.svg')}}" alt="">
                        </div>
                        <div class="item">
                            <img class="img-fluid center-block mx-auto" src="{{asset('front/images/client/03.svg')}}" alt="">
                        </div>
                        <div class="item">
                            <img class="img-fluid center-block mx-auto" src="{{asset('front/images/client/04.svg')}}" alt="">
                        </div>
                        <div class="item">
                            <img class="img-fluid center-block mx-auto" src="{{asset('front/images/client/05.svg')}}" alt="">
                        </div>
                        <div class="item">
                            <img class="img-fluid center-block mx-auto" src="{{asset('front/images/client/06.svg')}}" alt="">
                        </div>
                        <div class="item">
                            <img class="img-fluid center-block mx-auto" src="{{asset('front/images/client/07.svg')}}" alt="">
                        </div>
                        <div class="item">
                            <img class="img-fluid center-block mx-auto" src="{{asset('front/images/client/05.svg')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
          Clients -->

    <!--=================================
          blog -->
    <section class="space-pb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-12 ">
                    <div class="section-title text-center">
                        <h2 class="title">More articles from resource library</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="owl-carousel owl-nav-bottom-center" data-nav-dots="true" data-nav-arrow="false"
                        data-items="3" data-md-items="3" data-sm-items="2" data-xs-items="1" data-space="30"
                        data-autoheight="true">
                        <div class="item">
                            <div class="blog-post">
                                <div class="blog-post-image">
                                    <img class="img-fluid" src="{{asset('front/images/blog/blog-01.jpg')}}" alt="">
                                </div>
                                <div class="blog-post-content">
                                    <div class="blog-post-date">Oct 06, 2020</div>
                                    <h6 class="blog-post-title"><a href="blog-detail.html">Fun things to do during your
                                            summer vacation</a></h6>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="blog-post">
                                <div class="blog-post-image">
                                    <img class="img-fluid" src="{{asset('front/images/blog/blog-04.jpg')}}" alt="">
                                </div>
                                <div class="blog-post-content">
                                    <div class="blog-post-date">Oct 08, 2020</div>
                                    <h6 class="blog-post-title"><a href="blog-detail.html">When kids won’t listen while
                                            you’re babysitting</a></h6>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="blog-post">
                                <div class="blog-post-image">
                                    <img class="img-fluid" src="{{asset('front/images/blog/blog-08.jpg')}}" alt="">
                                </div>
                                <div class="blog-post-content">
                                    <div class="blog-post-date">Oct 10, 2020</div>
                                    <h6 class="blog-post-title"><a href="blog-detail.html">How to find a babysitter for
                                            new year’s eve</a></h6>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="blog-post">
                                <div class="blog-post-image">
                                    <img class="img-fluid" src="{{asset('front/images/blog/blog-05.jpg')}}" alt="">
                                </div>
                                <div class="blog-post-content">
                                    <div class="blog-post-date">Oct 12, 2020</div>
                                    <h6 class="blog-post-title"><a href="blog-detail.html">Top 10 best babysitting website
                                            in the UK</a></h6>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="blog-post">
                                <div class="blog-post-image">
                                    <img class="img-fluid" src="{{asset('front/images/blog/blog-10.jpg')}}" alt="">
                                </div>
                                <div class="blog-post-content">
                                    <div class="blog-post-date">Oct 15, 2020</div>
                                    <h6 class="blog-post-title"><a href="blog-detail.html">Hotel babysitting options when
                                            you’re on holiday</a></h6>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="blog-post">
                                <div class="blog-post-image">
                                    <img class="img-fluid" src="{{asset('front/images/blog/blog-09.jpg')}}" alt="">
                                </div>
                                <div class="blog-post-content">
                                    <div class="blog-post-date">Oct 20, 2020</div>
                                    <h6 class="blog-post-title"><a href="blog-detail.html">Find the best indoor activities
                                            for kids near me</a></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
          blog -->
@endsection
