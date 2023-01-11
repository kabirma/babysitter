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
            <li class="breadcrumb-item active"><span>Why Choose Us</span></li>
          </ol>
          <h2 class="inner-banner-title">Why Choose Us</h2>
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
        
        <div class="col-lg-8 col-sm-12">
          <div class="section-title">
            <h2 class="title">{{$company->why_us}}</h2>
            <h6>{{$company->why_us_subtitle}}</h6>
            <p>
                {{$company->why_us_content}}
            </p>
          </div>
          
        </div>
        <div class="col-lg-4 col-sm-12">
            <img src="{{asset($company->why_us_image)}}" style="width: 100%" alt="{{$company->name}}">
        </div>
      </div>
    </div>
  </section>
  <!--=================================
    Browse properties -->


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