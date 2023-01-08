@extends('front.layout.app')

@section('content')
@php
    $company=App\Company::first();
@endphp

<style>
    .page-header .header-title{
        background-image:url("{{asset("service.jpg")}}"),linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));;
        background-blend-mode: overlay;
    }
</style>
 <!--Page Header-->
 <div class="page-header title-area">
    <div class="header-title">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h1 class="page-title">Services</h1>
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
                        <span>Services</span>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

  <!-- services sec -->
  <div class="allservsec" style="margin-top:5%">
    <div class="container">
        <div class="fh-service  style-bordered">
            <div class="service-list row">
               @foreach (App\Service::get() as $item)
                    <div class="item-service  col-xs-12 col-sm-6 col-md-4">
                        <a href='{{$item->link}}'>
                        <div class="service-content">
                            <div class="entry-thumbnail">
                                
                                <img src="{{asset($item->image)}}" style="height:350px;width:100%;object-fit:cover" alt="">
                            </div>
                            <div class="summary">
                                <h2 class="entry-title"><a href="#">{{$item->title}}</a></h2>
                                <p>
                                    {{$item->description}}
                                </p>
                                
                            </div>
                        </div>
                        </a>
                    </div>
               @endforeach
              
            </div>
        </div>
    </div>
</div>
<!-- services sec end -->
@endsection