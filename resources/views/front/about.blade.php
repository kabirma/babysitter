@extends('front.layout.app')

@section('content')
@php
    $company=App\Company::first();
@endphp
<style>
    .page-header .header-title{
        background-image:url("{{asset("abou.jpg")}}") ,linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));;
        background-blend-mode: overlay;
    }
</style>


        <!--Page Header-->
        <div class="page-header title-area">
            <div class="header-title">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <h1 class="page-title">About Us</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="breadcrumb-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-sm-12 col-xs-12 site-breadcrumb">
                            <nav class="breadcrumb">
                                <a class="home" href="#"><span>Home</span></a>
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                <span>About Us</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Page Header end-->

<!-- About us sec -->
<section class="aboutsec-2 secpaddbig">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="abotimglft">
                    <img src="{{asset($company->about_image)}}" style="widht:100%;" class="img-responsive" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="abotinforgt">
                    <div class="fh-section-title clearfix  text-left version-dark paddbtm30">
                        <h2>{{$company->about_title}}</h2>
                    </div>
                    <p>
                        <?= $company->about?>

                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About us sec end -->

        <!-- Feature sec -->
        <section class="features-3 bluebg">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="fh-feature-box "><span class="chars">M</span>
                            <h4 class="box-title">Our Mission</h4>
                            <div class="desc">
                                <?= $company->mission ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="fh-feature-box "><span class="chars">V</span>
                            <h4 class="box-title">Our Vision</h4>
                            <div class="desc">
                                <?= $company->vision ?>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </section>
        <!-- Feature sec end -->

   
<!-- About sec-->
<section class="aboutsec-3 secpadd">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="abotimglft">
                    <img src="{{asset($company->why_us_image)}}" class="img-responsive">
                </div>
            </div>
            <div class="col-md-6">
                <div class="abotinforgt">
                    <div class="fh-section-title clearfix  text-left version-dark paddbtm30">
                        <h2>{{$company->why_us}}</h2>
                    </div>
                    <p>
                        <?= $company->why_us_content ?>
                    </p>
                   
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About sec end-->

@endsection