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
                <li class="breadcrumb-item active">Contact Us</li>
              </ol>
              <h2 class="inner-banner-title">Contact us</h2>
            </div>
          </div>
        </div>
      </section>
      <!--=================================
      banner -->
  
      <!--=================================
      map -->
      <section class="space-ptb">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-4">
              <div class="form-dark contact-form">
                <h4>Need assistance? please complete the contact form</h4>
                @if(Session::has('success'))
                <div class="alert alert-success text-center">
                    <i class="fa fa-check"></i> {{ Session::get('success') }}
                </div>
                @endif
                <form method="post" action="{{route('contactsubmit')}}" class="mt-4">
                    <div class="row">
                      <div class="mb-3 col-12">
                        <input type="text" class="form-control" name="name" id="Username" placeholder="Name">
                      </div>
                      <div class="mb-3 col-12">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                      </div>
                      <div class="mb-3 col-12">
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone Number">
                      </div>
                      <div class="col-12 mb-0">
                        <textarea rows="4" class="form-control" name="message" id="sector" placeholder="Message"></textarea>
                      </div>
                      <div class="col-12 mt-4">
                        <div class="d-grid">
                          <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                      </div>
                    </div>
                  </form>
              </div>
            </div>
            <div class="col-md-8">
              <div class="map">
                <iframe src="{{$company->map_link}}" style="border:0;" allowfullscreen=""></iframe>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--=================================
      map -->
  
      <!--=================================
      Service -->
      <section class="space-pb">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12 ">
              <div class="section-title text-center">
                <h2 class="title">Let’s get in touch!</h2>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 mb-4 mb-md-0">
              <div class="feature-info text-center">
                <div class="feature-info-icon">
                  <i class="flaticon-placeholder"></i>
                </div>
                <div class="feature-info-content">
                  <h4 class="feature-info-title">Address</h4>
                  <span>{{$company->location}}</span>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-4 mb-md-0">
              <div class="feature-info text-center">
                <div class="feature-info-icon">
                  <i class="flaticon-phone"></i>
                </div>
                <div class="feature-info-content">
                  <h4 class="feature-info-title">Phone</h4>
                  <span>{{$company->phone}}</span>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="feature-info text-center">
                <div class="feature-info-icon">
                  <i class="flaticon-envelope"></i>
                </div>
                <div class="feature-info-content">
                  <h4 class="feature-info-title">Email</h4>
                  <span>{{$company->email}}</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--=================================
      Service -->
  
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
@endsection