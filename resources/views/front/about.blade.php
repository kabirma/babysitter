@extends('front.layout.app')

@section('content')
 <!--=================================
    banner -->
  <section class="header-inner bg-dark text-center">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 ">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
            <li class="breadcrumb-item active"><span>About us</span></li>
          </ol>
          <h2 class="inner-banner-title">About us</h2>
        </div>
      </div>
    </div>
  </section>
  <!--=================================
    banner -->

  <!--=================================
    Browse properties -->
  <section class="space-ptb">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-5 col-sm-12">
          <div class="section-title">
            <h2 class="title">{{$company->about_title}}</h2>
            <h6>{{$company->about_subtitle}}</h6>
            <p>
                {{$company->about}}
            </p>
          </div>
          
        </div>
        <div class="col-lg-7 mt-lg-0 mt-5 position-relative">
          <div class="counter-section">
            <div class="row position-relative">
              <div class="col-lg-6 col-sm-6">
                <div class="counter">
                  <div class="counter-icon">
                    <i class="flaticon-planet-earth"></i>
                  </div>
                  <div class="counter-content">
                    <span class="timer" data-to="{{$company->about_box_1_no}}" data-speed="1000">{{$company->about_box_1_no}}</span>
                    <label class="form-label">{{$company->about_box_1}}</label>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-sm-6">
                <div class="counter">
                  <div class="counter-icon">
                    <i class="flaticon-miscellaneous"></i>
                  </div>
                  <div class="counter-content">
                    <span class="timer" data-to="{{$company->about_box_2_no}}" data-speed="1000">{{$company->about_box_2_no}}</span>
                    <label class="form-label">{{$company->about_box_2}}</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="row position-relative">
              <div class="col-lg-6 col-sm-6">
                <div class="counter mb-sm-0 mb-4">
                  <div class="counter-icon">
                    <i class="flaticon-conversation"></i>
                  </div>
                  <div class="counter-content">
                    <span class="timer" data-to="{{$company->about_box_3_no}}" data-speed="1000">{{$company->about_box_3_no}}</span>
                    <label class="form-label">{{$company->about_box_3}}</label>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-sm-6">
                <div class="counter mb-0">
                  <div class="counter-icon">
                    <i class="flaticon-care"></i>
                  </div>
                  <div class="counter-content">
                    <span class="timer" data-to="{{$company->about_box_4_no}}" data-speed="1000">{{$company->about_box_4_no}}</span>
                    <label class="form-label">{{$company->about_box_4}}</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--=================================
    Browse properties -->

  <!--=================================
    feature-box -->
  <section class="space-pb">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="info-box text-center bg-dark mb-4 mb-md-0">
            <div class="feature-info-icon text-white">
              <i class="flaticon-target"></i>
            </div>
            <div class="feature-info-content">
              <h4 class="feature-info-title text-white">Our Mission</h4>
              <p class="m-0 text-white">{{$company->mission}}</p>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="info-box text-center">
            <div class="feature-info-icon">
              <i class="flaticon-eye"></i>
            </div>
            <div class="feature-info-content">
              <h4 class="feature-info-title text-dark">Our Vision</h4>
              <p class="m-0">{{$company->vision}}</p>
            </div>
          </div>
        </div>
       
      </div>
    </div>
  </section>
  <!--=================================
    feature-box -->

  <!--=================================
    Action-box -->
  <section class="space-pb">
    <div class="container">
      <div class="callout">
        <div class="row align-items-center">
          <div class="col-xl-8 col-lg-7 col-md-9">
            <div class="callout-title">
              <h3>Are you looking for senior carer or baby sitter just call us!</h3>
            </div>
          </div>
          <div class="col-xl-2 col-lg-2 d-none d-lg-block">
            <img class="img-fluid" src="images/action-box-arrow.png" alt="">
          </div>
          <div class="col-xl-2 col-lg-3 col-md-3">
            <div class="callout-botton">
              <a href="tel:{{$company->phone}}" class="btn btn-md btn-primary"><i class="fas fa-headset"></i>{{$company->phone}}</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--=================================
    Action-box -->

  <!--=================================
    Testimonial -->
  <section>
    <div class="container">
      <div class="row m-0 justify-content-center">
        <div class="col-md-12">
          <div class="owl-carousel testimonial-center owl-nav-bottom-center" data-nav-arrow="true" data-items="1"
            data-md-items="1" data-sm-items="1" data-xs-items="1" data-xx-items="1" data-space="0"
            data-autoheight="true">
            @foreach ($testimonials as $item)
            <div class="item">
                <div class="testimonial">
                
                  <div class="testimonial-info">
                    <div class="testimonial-quote">
                      <i class="flaticon-left-quote"></i>
                    </div>
                    <div class="testimonial-content">
                      {{$item->review}}
                    </div>
                    <div class="testimonial-name">
                      <h6>{{$item->name}}</h6>
                      <span class="text-muted">- {{$item->designation}}</span>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
            
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--=================================
    Testimonial -->
@endsection